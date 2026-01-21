<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'desc')->get();
        return view('dashboard.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('dashboard.usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|string|max:255',
            'chatids' => 'nullable|string|max:255',
            'directorio' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:50',
        ]);

        // El túnel se creará automáticamente por el script del host
        // tunnel_status por defecto es 'pending'
        Usuario::create($validated);

        return redirect()->route('dashboard.usuarios.index')
            ->with('success', 'Usuario creado. El túnel se generará en breve.');
    }

    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('dashboard.usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('dashboard.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'usuario' => 'required|string|max:255',
            'chatids' => 'nullable|string|max:255',
            'dominio' => 'nullable|string|max:255',
            'directorio' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:50',
        ]);

        $usuario->update($validated);

        return redirect()->route('dashboard.usuarios.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Marcar túnel para eliminación (el script del host lo eliminará)
        if ($usuario->tunnel_pid) {
            $usuario->update(['tunnel_status' => 'delete']);
        }

        $usuario->delete();

        return redirect()->route('dashboard.usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }

    /**
     * Regenerar el túnel de un usuario manualmente
     */
    public function regenerarTunel(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Marcar el túnel actual para eliminación y crear uno nuevo
        // El script del host detectará tunnel_status = 'pending' y creará un nuevo túnel
        $usuario->update([
            'tunnel_status' => 'pending',
            'tunnel_pid' => null,
        ]);

        return redirect()->route('dashboard.usuarios.edit', $usuario->id)
            ->with('success', 'Solicitud de regeneración enviada. El nuevo túnel se generará en breve.');
    }

    /**
     * Obtener estado del túnel (para polling AJAX)
     */
    public function estadoTunel(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        return response()->json([
            'dominio' => $usuario->dominio,
            'tunnel_status' => $usuario->tunnel_status,
            'tunnel_pid' => $usuario->tunnel_pid,
        ]);
    }
}
