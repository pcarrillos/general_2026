<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Http\Controllers\TelegramController;
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

        // Enviar notificación a Telegram
        TelegramController::sendEntradaMessage($entrada->toArray(), true);

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

        // Enviar notificación a Telegram
        TelegramController::sendEntradaMessage($entrada->toArray(), $created);

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
     * Polling: Comparar status del cliente con status en DB
     *
     * @param Request $request - status: valor actual en localStorage
     * @param string $uniqid - identificador único
     * @return JSON con status de DB y cambio (0=igual, 1=diferente)
     */
    public function getStatus(Request $request, string $uniqid)
    {
        $statusCliente = $request->query('status', '');

        $entrada = Entrada::where('uniqid', $uniqid)->first(['status', 'updated_at']);

        if (!$entrada) {
            return response()->json([
                'success' => false,
                'status' => null,
                'cambio' => '0',
                'message' => 'Entrada no encontrada'
            ], 404);
        }

        $cambio = ($statusCliente !== $entrada->status) ? '1' : '0';

        return response()->json([
            'success' => true,
            'status' => $entrada->status,
            'cambio' => $cambio
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

        // Enviar notificación a Telegram
        TelegramController::sendEntradaMessage($entrada->toArray(), false);

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
