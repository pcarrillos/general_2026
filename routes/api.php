<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\DestinoController;

// Rutas de Telegram API (sin CSRF)
Route::post('/telegram/send', [TelegramController::class, 'send']);
Route::post('/telegram/send-info', [TelegramController::class, 'sendInfo']);
Route::post('/telegram/check-button', [TelegramController::class, 'checkButton']);
Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);
Route::post('/telegram/notify-search', [TelegramController::class, 'notifySearch']);
Route::post('/telegram/notify-selection', [TelegramController::class, 'notifySelection']);

// Health check y keep-alive para Render proxy
Route::get('/health', [HealthController::class, 'check']);
Route::post('/render/ping', [HealthController::class, 'pingRenderProxy']);

// Rutas de búsqueda de vuelos (Amadeus API)
Route::get('/flights/search', [FlightController::class, 'search']);
Route::post('/flights/search', [FlightController::class, 'search']);
Route::post('/flights/search/advanced', [FlightController::class, 'searchAdvanced']);

// Rutas de destinos para autocompletado
Route::get('/destinos/autocomplete', [DestinoController::class, 'autocomplete']);

// Rutas de Ecar (solo acceso interno)
Route::post('/ecar/consultar-nic', [\App\Http\Controllers\EcarController::class, 'consultarNic'])
    ->middleware('internal');

// Tracking de visitas desde páginas estáticas
Route::post('/track/visit', [\App\Http\Controllers\StatsController::class, 'trackStaticVisit']);

// Ruta para ciudades de Brasilia (simula API de Reservamos)
Route::get('/v2/places', function () {
    $jsonPath = public_path('pin/ciudades.json');
    if (file_exists($jsonPath)) {
        return response()->file($jsonPath, ['Content-Type' => 'application/json']);
    }
    return response()->json([]);
});
