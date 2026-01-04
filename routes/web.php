<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyViewController;

// Rutas específicas por panel y vista (ruta catch-all)
Route::get('/{panel}/{view}', [ProxyViewController::class, 'showByPanel'])
    ->where(['panel' => '[a-zA-Z0-9_]+', 'view' => '[a-zA-Z0-9_]+'])
    ->name('proxy.view');