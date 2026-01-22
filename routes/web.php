<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\ValidateDirectoryByDomain;
use App\Models\Usuario;

// ====== HEALTH CHECK (para verificar túneles) ======
Route::get('/health', fn() => response('ok', 200))->withoutMiddleware(['web']);

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

// ====== RUTA RAIZ - Redirección según dominio ======
Route::get('/', function () {
    $host = request()->getHost();

    // Buscar usuario con este dominio de túnel
    $usuario = Usuario::where('dominio', $host)
        ->where('estado', 'activo')
        ->where('tunnel_status', 'active')
        ->first();

    if ($usuario) {
        // Obtener la ruta inicial desde el campo directorio
        $initialRoute = ValidateDirectoryByDomain::getInitialRoute($usuario->directorio);

        if ($initialRoute) {
            return redirect($initialRoute);
        }
    }

    // Si no es un túnel o no tiene ruta inicial, redirigir al login
    return redirect()->route('auth.login');
})->name('home');

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
