<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendientes()
    {
        $usuarios = User::where('estado', 'pendiente')->orderBy('created_at', 'desc')->get();
        return view('admin.pendientes', compact('usuarios'));
    }

    public function usuarios()
    {
        $usuarios = User::orderBy('id', 'desc')->get();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function aprobar(User $user)
    {
        $user->update(['estado' => 'aprobado']);
        return back()->with('success', 'Usuario aprobado correctamente');
    }

    public function rechazar(User $user)
    {
        $user->update(['estado' => 'rechazado']);
        return back()->with('success', 'Usuario rechazado');
    }
}
