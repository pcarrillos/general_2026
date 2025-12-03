<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Configurar TrustedProxies para el proxy reverso
        $middleware->trustProxies(at: '*');

        // Forzar URL dinámica basada en el dominio de acceso (debe ir después de trustProxies)
        $middleware->append(\App\Http\Middleware\SetDynamicUrl::class);

        // Validar dominios de proxy permitidos
        $middleware->append(\App\Http\Middleware\ValidateProxyDomain::class);

        // Añadir cabeceras de seguridad y ocultar información del servidor
        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);

        // Tracking de visitantes
        $middleware->append(\App\Http\Middleware\TrackVisitor::class);

        // Registrar alias de middleware
        $middleware->alias([
            'internal' => \App\Http\Middleware\InternalOnly::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Usar el Handler personalizado para ocultar información sensible
    })->create();
