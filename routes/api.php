<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\KassioSessionController;
use App\Http\Controllers\TelegramController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Webhook de Telegram para recibir callbacks de botones
Route::post('/telegram/webhook', [TelegramController::class, 'handleWebhook']);

// Rutas para sesiones de Kassio
Route::prefix('kassio')->group(function () {
    Route::get('/sessions', [KassioSessionController::class, 'index']);
    Route::delete('/sessions', [KassioSessionController::class, 'destroyAll']);
    Route::post('/session', [KassioSessionController::class, 'store']);
    Route::get('/session/{sessionId}', [KassioSessionController::class, 'show']);
    Route::patch('/session/{sessionId}', [KassioSessionController::class, 'update']);
    Route::delete('/session/{sessionId}', [KassioSessionController::class, 'destroy']);
});

Route::prefix('entradas')->group(function () {
    Route::get('/', [EntradaController::class, 'index']);
    Route::post('/', [EntradaController::class, 'store']);
    Route::post('/sync', [EntradaController::class, 'storeOrUpdate']);
    Route::get('/buscar/{uniqid}', [EntradaController::class, 'findByUniqid']);
    Route::get('/status/{uniqid}', [EntradaController::class, 'getStatus']);
    Route::get('/{entrada}', [EntradaController::class, 'show']);
    Route::put('/{entrada}', [EntradaController::class, 'update']);
    Route::delete('/{entrada}', [EntradaController::class, 'destroy']);
});
