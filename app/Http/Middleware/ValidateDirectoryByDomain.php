<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;

class ValidateDirectoryByDomain
{
    /**
     * Directorios que no requieren validación (públicos)
     */
    protected array $publicDirectories = [
        'auth',
        'dashboard',
        'admin',
        'components',
        'layouts',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el directorio (panel) de la ruta
        $panel = $request->route('panel');

        // Si no hay panel en la ruta, continuar
        if (empty($panel)) {
            return $next($request);
        }

        // Si es un directorio público, continuar sin validación
        if (in_array($panel, $this->publicDirectories)) {
            return $next($request);
        }

        // Obtener el dominio del host
        $host = $request->getHost();

        // Buscar usuario con este dominio
        $usuario = Usuario::where('dominio', $host)
            ->where('estado', 'activo')
            ->where('tunnel_status', 'active')
            ->first();

        // Si no se encuentra usuario con este dominio, error 500
        if (!$usuario) {
            abort(500, 'Dominio no autorizado');
        }

        // Verificar si el directorio está permitido para este usuario
        if (!$this->isDirectoryAllowed($usuario->directorio, $panel)) {
            abort(500, 'Directorio no autorizado para este dominio');
        }

        // Compartir el usuario con las vistas (útil para las vistas)
        view()->share('tunnelUsuario', $usuario);

        return $next($request);
    }

    /**
     * Verificar si el directorio está en la lista de directorios permitidos
     */
    protected function isDirectoryAllowed(?string $allowedDirectories, string $panel): bool
    {
        if (empty($allowedDirectories)) {
            return false;
        }

        // Separar directorios por coma y limpiar espacios
        $directories = array_map('trim', explode(',', $allowedDirectories));

        return in_array($panel, $directories);
    }
}
