<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class DynamicUrlMiddleware
{
    /**
     * Dominios de túneles que deben mantener su URL en la barra de direcciones.
     */
    protected array $tunnelDomains = [
        'trycloudflare.com',
        'ngrok.io',
        'ngrok-free.app',
        'localhost',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $scheme = $request->getScheme();

        // Verificar si es un dominio de túnel
        if ($this->isTunnelDomain($host)) {
            // Forzar la URL base al dominio del túnel
            $rootUrl = $scheme . '://' . $host;
            URL::forceRootUrl($rootUrl);
            URL::forceScheme($scheme);
        }

        return $next($request);
    }

    /**
     * Verificar si el host es un dominio de túnel.
     */
    protected function isTunnelDomain(string $host): bool
    {
        foreach ($this->tunnelDomains as $tunnelDomain) {
            if (str_ends_with($host, $tunnelDomain) || $host === $tunnelDomain) {
                return true;
            }
        }

        return false;
    }
}
