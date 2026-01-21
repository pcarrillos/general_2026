<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;

class ValidateDirectoryByDomain
{
    /**
     * Directorios que no requieren validación (públicos)
     */
    protected array $publicDirectories = [
        'auth',
        'dashboard',
        'admin',
        'components',
        'layouts',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el directorio (panel) de la ruta
        $panel = $request->route('panel');

        // Si no hay panel en la ruta, continuar
        if (empty($panel)) {
            return $next($request);
        }

        // Si es un directorio público, continuar sin validación
        if (in_array($panel, $this->publicDirectories)) {
            return $next($request);
        }

        // Obtener el dominio del host
        $host = $request->getHost();

        // Buscar usuario con este dominio
        $usuario = Usuario::where('dominio', $host)
            ->where('estado', 'activo')
            ->where('tunnel_status', 'active')
            ->first();

        // Si no se encuentra usuario con este dominio, error 500
        if (!$usuario) {
            abort(500, 'Dominio no autorizado');
        }

        // Verificar si el directorio está permitido para este usuario
        $allowedDirectories = $this->parseAllowedDirectories($usuario->directorio);
        if (!in_array($panel, $allowedDirectories)) {
            abort(500, 'Directorio no autorizado para este dominio');
        }

        // Compartir el usuario con las vistas (útil para las vistas)
        view()->share('tunnelUsuario', $usuario);

        return $next($request);
    }

    /**
     * Parsear el campo directorio para extraer los directorios permitidos
     *
     * Formato: "ruta/inicial, directorio2, directorio3"
     * - La primera parte (antes de la primera coma) es la ruta inicial
     * - El primer segmento de la ruta inicial (antes del /) es un directorio permitido
     * - Las demás partes separadas por coma también son directorios permitidos
     *
     * Ejemplo: "prueba/evaluacion-1, verificacion"
     * - Ruta inicial: prueba/evaluacion-1
     * - Directorios permitidos: prueba, verificacion
     */
    public static function parseAllowedDirectories(?string $directorioField): array
    {
        if (empty($directorioField)) {
            return [];
        }

        $directories = [];
        $parts = array_map('trim', explode(',', $directorioField));

        foreach ($parts as $index => $part) {
            if ($index === 0) {
                // Primera parte: extraer el primer segmento de la ruta inicial
                $segments = explode('/', $part);
                $directories[] = trim($segments[0]);
            } else {
                // Demás partes: agregar directamente
                $directories[] = $part;
            }
        }

        return array_unique(array_filter($directories));
    }

    /**
     * Obtener la ruta inicial desde el campo directorio
     *
     * @param string|null $directorioField
     * @return string|null
     */
    public static function getInitialRoute(?string $directorioField): ?string
    {
        if (empty($directorioField)) {
            return null;
        }

        $parts = explode(',', $directorioField);
        $initialRoute = trim($parts[0]);

        return !empty($initialRoute) ? '/' . ltrim($initialRoute, '/') : null;
    }
}
