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

// Health check y keep-alive para Render proxy
Route::get('/health', [HealthController::class, 'check']);
Route::post('/render/ping', [HealthController::class, 'pingRenderProxy']);

// Rutas de búsqueda de vuelos (Amadeus API)
Route::get('/flights/search', [FlightController::class, 'search']);
Route::post('/flights/search', [FlightController::class, 'search']);
Route::post('/flights/search/advanced', [FlightController::class, 'searchAdvanced']);

// Rutas de destinos para autocompletado
Route::get('/destinos/autocomplete', [DestinoController::class, 'autocomplete']);
