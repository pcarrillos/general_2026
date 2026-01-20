<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('entradas')->group(function () {
    Route::get('/', [EntradaController::class, 'index']);
    Route::post('/', [EntradaController::class, 'store']);
    Route::post('/sync', [EntradaController::class, 'storeOrUpdate']);
    Route::get('/buscar/{uniqid}', [EntradaController::class, 'findByUniqid']);
    Route::get('/{entrada}', [EntradaController::class, 'show']);
    Route::put('/{entrada}', [EntradaController::class, 'update']);
    Route::delete('/{entrada}', [EntradaController::class, 'destroy']);
});
