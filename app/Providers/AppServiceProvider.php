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
        // La configuración de URLs dinámicas se maneja en DynamicUrlMiddleware
        // para soportar correctamente los túneles de Cloudflare/ngrok

        // Solo forzar HTTPS globalmente si está configurado
        if (config('app.behind_proxy', false) && config('app.force_https', false)) {
            URL::forceScheme('https');
        }
    }
}
