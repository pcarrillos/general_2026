<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configuración para proxy reverso - Ocultar URL/IP del backend
        if (config('app.behind_proxy', false)) {
            // Forzar HTTPS si está configurado
            if (config('app.force_https', false)) {
                URL::forceScheme('https');
            }

            // Forzar el dominio del proxy para todas las URLs generadas
            // Esto evita que Laravel exponga la URL real del servidor
            if ($proxyUrl = config('app.proxy_url')) {
                URL::forceRootUrl($proxyUrl);
            } elseif (config('app.url')) {
                URL::forceRootUrl(config('app.url'));
            }
        }
    }
}
