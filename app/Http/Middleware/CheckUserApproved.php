<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserApproved
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')
                ->with('error', 'Debes iniciar sesion');
        }

        $user = Auth::user();

        if ($user->estado === 'pendiente') {
            Auth::logout();
            return redirect()->route('auth.login')
                ->with('error', 'Tu cuenta esta pendiente de aprobacion');
        }

        if ($user->estado === 'rechazado') {
            Auth::logout();
            return redirect()->route('auth.login')
                ->with('error', 'Tu cuenta ha sido rechazada');
        }

        return $next($request);
    }
}
