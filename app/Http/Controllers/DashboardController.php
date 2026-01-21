<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_usuarios' => Usuario::count(),
            'usuarios_activos' => Usuario::where('estado', 'activo')->count(),
            'users_pendientes' => User::where('estado', 'pendiente')->count(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
