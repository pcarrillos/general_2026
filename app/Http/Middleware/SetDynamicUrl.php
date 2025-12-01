<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetDynamicUrl
{
    /**
     * Handle an incoming request.
     *
     * Fuerza la URL de la aplicación a ser el dominio desde donde se accede,
     * evitando exponer el dominio real cuando se accede a través de un proxy.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Solo aplicar si estamos detrás de un proxy
        if (env('BEHIND_PROXY', false)) {
            // Obtener el esquema (http/https)
            $scheme = $request->getScheme();

            // Obtener el host (puede venir de X-Forwarded-Host si TrustProxies está activo)
            $host = $request->getHost();

            // Construir la URL base
            $url = $scheme . '://' . $host;

            // Forzar esta URL para todas las generaciones de rutas y redirecciones
            URL::forceRootUrl($url);
            URL::forceScheme($scheme);
        }

        return $next($request);
    }
}
