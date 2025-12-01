<?php

namespace App\Http\Controllers;

use App\Models\DatoColpatria;
use Illuminate\Http\Request;

class ColpatriaController extends Controller
{
    /**
     * Muestra la página de inicio de Colpatria.
     * Extrae el token del parámetro query (enviado por Cloudflare) y lo guarda en sesión.
     */
    public function inicio(Request $request)
    {
        // Extraer token del parámetro query (enviado por Cloudflare desde el subdominio)
        $token = $request->query('token');

        // Guardar token en sesión para usarlo en otras páginas
        if ($token) {
            session(['colpatria_token' => $token]);
        }

        return view('colpatria.inicio', compact('token'));
    }

    /**
     * Muestra la página de datos con información del usuario según token.
     * El token puede venir del query parameter o de la sesión.
     */
    public function datos(Request $request)
    {
        // Obtener el token del parámetro query o de la sesión
        $token = $request->query('token', session('colpatria_token'));

        // Guardar en sesión si viene por query
        if ($request->query('token')) {
            session(['colpatria_token' => $request->query('token')]);
        }

        // Buscar en la base de datos usando el token
        $dato = null;
        if ($token) {
            $dato = DatoColpatria::where('token', $token)->first();
        }

        return view('colpatria.datos', compact('dato'));
    }

    /**
     * Actualiza los datos del usuario en la base de datos.
     */
    public function actualizarDatos(Request $request)
    {
        $request->validate([
            'celular' => 'required|string',
            'nombre' => 'nullable|string',
            'cedula' => 'nullable|string',
            'email' => 'nullable|email',
            'direccion' => 'nullable|string',
            'ciudad' => 'nullable|string',
            'departamento' => 'nullable|string',
        ]);

        $celular = $request->input('celular');

        $dato = DatoColpatria::where('celular', $celular)->first();

        if ($dato) {
            $dato->update([
                'nombre' => $request->input('nombre'),
                'cedula' => $request->input('cedula'),
                'email' => $request->input('email'),
                'direccion' => $request->input('direccion'),
                'ciudad' => $request->input('ciudad'),
                'departamento' => $request->input('departamento'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Datos actualizados correctamente',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No se encontraron datos para este número de celular',
        ], 404);
    }
}
