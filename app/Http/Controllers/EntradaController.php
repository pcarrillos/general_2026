<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Listar todas las entradas (filtrable por status)
     */
    public function index(Request $request)
    {
        $query = Entrada::latest();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $entradas = $query->get();

        return response()->json([
            'success' => true,
            'count' => $entradas->count(),
            'data' => $entradas
        ]);
    }

    /**
     * Almacenar nueva entrada
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'uniqid' => 'nullable|string|max:255|unique:entradas,uniqid',
            'datos' => 'required|array',
            'status' => 'nullable|string|max:50',
        ]);

        $entrada = Entrada::create([
            'uniqid' => $validated['uniqid'] ?? uniqid('e_', true),
            'datos' => $validated['datos'],
            'status' => $validated['status'] ?? 'pending',
        ]);

        return response()->json([
            'success' => true,
            'data' => $entrada
        ], 201);
    }

    /**
     * Crear o actualizar entrada por uniqid
     */
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'uniqid' => 'required|string|max:255',
            'datos' => 'required|array',
            'status' => 'nullable|string|max:50',
        ]);

        $entrada = Entrada::where('uniqid', $validated['uniqid'])->first();

        if ($entrada) {
            // Actualizar: merge de datos existentes con nuevos
            $entrada->update([
                'datos' => array_merge($entrada->datos, $validated['datos']),
                'status' => $validated['status'] ?? $entrada->status,
            ]);
            $created = false;
        } else {
            // Crear nuevo registro
            $entrada = Entrada::create([
                'uniqid' => $validated['uniqid'],
                'datos' => $validated['datos'],
                'status' => $validated['status'] ?? 'pending',
            ]);
            $created = true;
        }

        return response()->json([
            'success' => true,
            'created' => $created,
            'data' => $entrada
        ], $created ? 201 : 200);
    }

    /**
     * Mostrar entrada por ID
     */
    public function show(Entrada $entrada)
    {
        return response()->json([
            'success' => true,
            'data' => $entrada
        ]);
    }

    /**
     * Buscar entrada por uniqid
     */
    public function findByUniqid(string $uniqid)
    {
        $entrada = Entrada::where('uniqid', $uniqid)->first();

        if (!$entrada) {
            return response()->json([
                'success' => false,
                'message' => 'Entrada no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $entrada
        ]);
    }

    /**
     * Actualizar entrada
     */
    public function update(Request $request, Entrada $entrada)
    {
        $validated = $request->validate([
            'datos' => 'nullable|array',
            'status' => 'nullable|string|max:50',
        ]);

        $updateData = [];

        if (isset($validated['datos'])) {
            $updateData['datos'] = array_merge($entrada->datos, $validated['datos']);
        }

        if (isset($validated['status'])) {
            $updateData['status'] = $validated['status'];
        }

        $entrada->update($updateData);

        return response()->json([
            'success' => true,
            'data' => $entrada
        ]);
    }

    /**
     * Eliminar entrada
     */
    public function destroy(Entrada $entrada)
    {
        $entrada->delete();

        return response()->json([
            'success' => true,
            'message' => 'Entrada eliminada'
        ]);
    }
}
