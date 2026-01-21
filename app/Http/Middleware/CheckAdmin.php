<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->esAdmin()) {
            return redirect()->route('dashboard.index')
                ->with('error', 'No tienes permisos de administrador');
        }

        return $next($request);
    }
}
