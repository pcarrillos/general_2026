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

        // Middleware global para manejar URLs dinámicas de túneles
        $middleware->prepend(\App\Http\Middleware\DynamicUrlMiddleware::class);

        // Configurar redirección para usuarios no autenticados
        $middleware->redirectGuestsTo('/auth/login');

        // Registrar alias de middleware
        $middleware->alias([
            'user.approved' => \App\Http\Middleware\CheckUserApproved::class,
            'admin' => \App\Http\Middleware\CheckAdmin::class,
            'validate.directory' => \App\Http\Middleware\ValidateDirectoryByDomain::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Usar el Handler personalizado para ocultar información sensible
    })->create();
