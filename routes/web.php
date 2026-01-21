<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;

// ====== RUTAS DE AUTENTICACION (publicas) ======
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ====== RUTAS DEL DASHBOARD (protegidas) ======
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'user.approved'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('usuarios', UsuarioController::class);
    Route::post('usuarios/{usuario}/regenerar-tunel', [UsuarioController::class, 'regenerarTunel'])->name('usuarios.regenerar-tunel');
    Route::get('usuarios/{usuario}/estado-tunel', [UsuarioController::class, 'estadoTunel'])->name('usuarios.estado-tunel');
});

// ====== RUTAS DE ADMINISTRACION (solo admins) ======
Route::prefix('admin')->name('admin.')->middleware(['auth', 'user.approved', 'admin'])->group(function () {
    Route::get('/pendientes', [AdminController::class, 'pendientes'])->name('pendientes');
    Route::get('/users', [AdminController::class, 'usuarios'])->name('usuarios');
    Route::patch('/users/{user}/aprobar', [AdminController::class, 'aprobar'])->name('aprobar');
    Route::patch('/users/{user}/rechazar', [AdminController::class, 'rechazar'])->name('rechazar');
});

// ====== RUTAS EXISTENTES (catch-all - deben estar al final) ======
// Rutas de vistas por panel - validación de directorio por dominio
Route::middleware(['validate.directory'])->group(function () {
    // Ruta con parámetro adicional (ej: /kassio/inicio/34678)
    Route::get('/{panel}/{view}/{param}', [ProxyViewController::class, 'showByPanel'])
        ->where(['panel' => '[a-zA-Z0-9_-]+', 'view' => '[a-zA-Z0-9_-]+', 'param' => '[a-zA-Z0-9_-]+'])
        ->name('proxy.view.param');

    // Rutas específicas por panel y vista (ruta catch-all)
    Route::get('/{panel}/{view}', [ProxyViewController::class, 'showByPanel'])
        ->where(['panel' => '[a-zA-Z0-9_-]+', 'view' => '[a-zA-Z0-9_-]+'])
        ->name('proxy.view');
});
