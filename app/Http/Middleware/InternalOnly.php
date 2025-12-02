<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class InternalOnly
{
    /**
     * IPs consideradas internas/locales
     */
    protected array $allowedIps = [
        '127.0.0.1',
        '::1',
        'localhost',
    ];

    /**
     * Handle an incoming request.
     *
     * Solo permite peticiones que vengan desde el mismo servidor (internas).
     * Bloquea cualquier petición externa.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $clientIp = $request->ip();
        $serverIp = $request->server('SERVER_ADDR');

        // Permitir si viene de una IP local
        if ($this->isInternalIp($clientIp)) {
            return $next($request);
        }

        // Permitir si la IP del cliente es la misma del servidor
        if ($clientIp === $serverIp) {
            return $next($request);
        }

        // Permitir peticiones internas de Docker (red interna)
        if ($this->isDockerInternalIp($clientIp)) {
            return $next($request);
        }

        // Verificar header X-Internal-Request (para llamadas desde la propia app)
        if ($request->header('X-Internal-Request') === config('app.internal_key')) {
            return $next($request);
        }

        Log::warning('InternalOnly: Petición externa bloqueada', [
            'client_ip' => $clientIp,
            'server_ip' => $serverIp,
            'path' => $request->path(),
            'method' => $request->method(),
        ]);

        return response()->json([
            'error' => 'Forbidden',
            'message' => 'This endpoint is for internal use only'
        ], 403);
    }

    /**
     * Verifica si la IP es local/interna
     */
    protected function isInternalIp(string $ip): bool
    {
        return in_array($ip, $this->allowedIps) ||
               str_starts_with($ip, '127.') ||
               $ip === '::1';
    }

    /**
     * Verifica si la IP pertenece a la red interna de Docker
     */
    protected function isDockerInternalIp(string $ip): bool
    {
        // Redes Docker comunes: 172.16.0.0/12, 192.168.0.0/16, 10.0.0.0/8
        return str_starts_with($ip, '172.') ||
               str_starts_with($ip, '192.168.') ||
               str_starts_with($ip, '10.');
    }
}
