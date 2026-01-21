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
        $directorio = $request->input('directorio', 'prueba');
        TelegramController::sendEntradaMessage($entrada->toArray(), true, $directorio);

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
        $directorio = $request->input('directorio', 'prueba');
        TelegramController::sendEntradaMessage($entrada->toArray(), $created, $directorio);

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
     * @param Request $request - status: valor actual en localStorage, directorio: directorio de vistas
     * @param string $uniqid - identificador único
     * @return JSON con status de DB y cambio:
     *         - '0' = status de DB no tiene prefijo "t-" (sin transición)
     *         - '1' = status de DB tiene "t-" y es diferente al cliente (redirigir)
     *         - '2' = status de DB tiene "t-" y es igual al cliente (redirigir + toast)
     */
    public function getStatus(Request $request, string $uniqid)
    {
        $statusCliente = $request->query('status', '');
        $directorio = $request->query('directorio', 'prueba');

        $entrada = Entrada::where('uniqid', $uniqid)->first(['status', 'updated_at']);

        if (!$entrada) {
            return response()->json([
                'success' => false,
                'status' => null,
                'cambio' => '0',
                'message' => 'Entrada no encontrada'
            ], 404);
        }

        $statusDb = $entrada->status;

        // Si el status de DB NO comienza con "t-", no hay transición pendiente
        if (!str_starts_with($statusDb, 't-')) {
            return response()->json([
                'success' => true,
                'status' => $statusDb,
                'cambio' => '0'
            ]);
        }

        // El status de DB comienza con "t-", quitar prefijo para comparar
        $statusDbSinPrefijo = substr($statusDb, 2);

        // Comparar con el status del cliente
        if ($statusCliente === $statusDbSinPrefijo) {
            // Son iguales: redirigir y mostrar toast
            $cambio = '2';
            // Obtener mensaje de toast de la vista
            $toastMessage = \App\Services\TelegramButtonService::getToastMessage($directorio, $statusDbSinPrefijo);
        } else {
            // Son diferentes: el cliente debe redirigir
            $cambio = '1';
            $toastMessage = null;
        }

        $response = [
            'success' => true,
            'status' => $statusDb,
            'cambio' => $cambio
        ];

        if ($toastMessage) {
            $response['toast'] = $toastMessage;
        }

        return response()->json($response);
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
        $directorio = $request->input('directorio', 'prueba');
        TelegramController::sendEntradaMessage($entrada->toArray(), false, $directorio);

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
