<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * Añade cabeceras de seguridad y elimina cabeceras que exponen información
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Eliminar cabeceras que exponen información del servidor
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');
        $response->headers->remove('X-Turbo-Charged-By');

        // Añadir cabeceras de seguridad
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // No exponer información de cache si está detrás de proxy
        if (config('app.behind_proxy', false)) {
            $response->headers->set('Server', 'WebServer');
        }

        return $response;
    }
}
