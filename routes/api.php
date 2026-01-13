<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KassioSessionController;

/*
|--------------------------------------------------------------------------
| API Routes - Kassio Session Management
|--------------------------------------------------------------------------
|
| Endpoints para gestionar sesiones de Kassio usando Redis/Cache
|
*/

Route::prefix('kassio')->group(function () {
    // Guardar nueva sesión
    Route::post('/session', [KassioSessionController::class, 'store']);

    // Obtener datos de sesión
    Route::get('/session/{sessionId}', [KassioSessionController::class, 'show']);

    // Actualizar datos de sesión
    Route::patch('/session/{sessionId}', [KassioSessionController::class, 'update']);

    // Eliminar sesión
    Route::delete('/session/{sessionId}', [KassioSessionController::class, 'destroy']);

    // Listar todas las sesiones (monitoreo)
    Route::get('/sessions', [KassioSessionController::class, 'index']);

    // Eliminar todas las sesiones
    Route::delete('/sessions', [KassioSessionController::class, 'destroyAll']);
});
