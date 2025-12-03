<?php

namespace App\Http\Middleware;

use App\Models\Parametro;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ValidateProxyDomain
{
    /**
     * Handle an incoming request.
     *
     * Valida que el dominio de la petición esté en la lista de proxies permitidos.
     * Si el dominio no está permitido, bloquea la petición.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si no está detrás de un proxy, permitir la petición (desarrollo)
        if (!config('app.behind_proxy', false)) {
            return $next($request);
        }

        // Obtener el dominio del proxy
        // Prioridad: X-Proxy-Domain (cuando hay Cloudflare) > Host header
        $host = $request->header('X-Proxy-Domain') ?? $request->getHost();

        if (!$host) {
            Log::error('No se pudo determinar el dominio de la petición', [
                'headers' => $request->headers->all()
            ]);

            return response()->json([
                'error' => 'Bad Request',
                'message' => 'Could not determine request domain'
            ], 400);
        }

        // Obtener la ruta de la petición
        $path = $request->path();

        // Excepciones: rutas del sender no requieren validación en la tabla parametros
        if (str_starts_with($path, 'sender/') || str_starts_with($path, 'sender')) {
            return $next($request);
        }

        // Excepciones: rutas de estadísticas internas
        if (str_starts_with($path, 'stats')) {
            return $next($request);
        }

        // Las rutas /api/ y /health se validan usando el Referer para determinar el panel correcto
        if (str_starts_with($path, 'api/') || $path === 'health' || str_starts_with($path, 'up')) {
            // Intentar obtener el panel desde el Referer
            $referer = $request->header('Referer');

            if ($referer) {
                // Extraer la ruta del referer (ej: https://central.pwm435.space/colpatria/colpatr -> colpatria/colpatr)
                $refererPath = parse_url($referer, PHP_URL_PATH);
                $refererPath = ltrim($refererPath, '/');

                // Intentar buscar por dominio + ruta del referer
                $parametro = Parametro::getByDomainAndPath($host, $refererPath);
            }

            // Si no se encontró por referer, buscar el primer proxy del dominio
            if (!isset($parametro) || !$parametro) {
                $parametro = Parametro::where('Proxy', 'LIKE', $host . '%')->first();
            }
        } else {
            // Rutas normales: validar con dominio + ruta completa
            $parametro = Parametro::getByDomainAndPath($host, $path);
        }

        // Si el dominio no está en la lista, bloquear
        if (!$parametro) {
            Log::warning('Petición bloqueada: dominio no autorizado', [
                'host' => $host,
                'path' => $path,
                'full_url' => $request->fullUrl(),
                'ip' => $request->ip(),
                'method' => $request->method()
            ]);

            return response()->json([
                'error' => 'Forbidden',
                'message' => 'Domain not authorized'
            ], 403);
        }

        // Si el estado está inactivo, retornar error 500
        if (!$parametro->isEstadoActivo()) {
            Log::warning('Petición bloqueada: proxy deshabilitado (Estado Inactivo)', [
                'host' => $host,
                'domain' => $parametro->Proxy,
                'panel' => $parametro->Panel,
                'ip' => $request->ip()
            ]);

            return response()->json([
                'error' => 'Service Unavailable',
                'message' => 'Proxy is currently disabled'
            ], 500);
        }

        // Validar que tenga chat_ids configurados
        $chatIds = $parametro->getChatIdsArray();
        if (empty($chatIds)) {
            Log::error('Proxy sin chat_ids configurados', [
                'host' => $host,
                'domain' => $parametro->Proxy,
                'panel' => $parametro->Panel
            ]);

            return response()->json([
                'error' => 'Configuration error',
                'message' => 'Proxy has no chat IDs configured'
            ], 500);
        }

        // Crear array de información del proxy para compatibilidad
        $proxyInfo = [
            'domain' => $parametro->Proxy,
            'name' => $parametro->Nombre,
            'panel' => $parametro->Panel,
            'enabled' => $parametro->isEstadoActivo(),
            'chat_ids' => $chatIds,
            'servicio_activo' => $parametro->isServicioActivo(),
            'vista' => $parametro->getVista(),
            'vista_inicial' => $parametro->Vista_inicial,
            'vista_final' => $parametro->Vista_final,
        ];

        // Añadir información del proxy a la petición para uso posterior
        $request->merge([
            'proxy_info' => $proxyInfo
        ]);

        // Compartir información del proxy con toda la aplicación
        app()->instance('current_proxy', $proxyInfo);

        Log::info('Petición autorizada desde proxy', [
            'host' => $host,
            'path' => $path,
            'full_url' => $request->fullUrl(),
            'referer' => $request->header('Referer'),
            'domain' => $parametro->Proxy,
            'name' => $parametro->Nombre,
            'panel' => $parametro->Panel,
            'estado' => $parametro->Estado,
            'servicio' => $parametro->Servicio,
            'vista' => $parametro->getVista(),
            'chat_ids_count' => count($chatIds)
        ]);

        return $next($request);
    }
}
