<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HealthController extends Controller
{
    /**
     * Health check endpoint
     */
    public function check()
    {
        return response()->json([
            'status' => 'ok',
            'timestamp' => now()->toIso8601String(),
            'service' => 'zcentral'
        ]);
    }

    /**
     * Ping a los proxies de Render para mantenerlos despiertos
     */
    public function pingRenderProxy(Request $request)
    {
        // Validar token opcional para seguridad
        $expectedToken = env('RENDER_PING_TOKEN');

        if ($expectedToken && $request->input('token') !== $expectedToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $proxyUrls = env('RENDER_PROXY_URLS');

        if (!$proxyUrls) {
            return response()->json([
                'error' => 'RENDER_PROXY_URLS no configurado'
            ], 500);
        }

        // Convertir string con URLs separadas por coma en array
        $urls = array_map('trim', explode(',', $proxyUrls));

        $results = [];
        $successCount = 0;
        $errorCount = 0;

        foreach ($urls as $proxyUrl) {
            if (empty($proxyUrl)) {
                continue;
            }

            try {
                $response = Http::timeout(5)->get($proxyUrl);
                $successCount++;

                Log::info('Ping exitoso al proxy de Render', [
                    'url' => $proxyUrl,
                    'status' => $response->status()
                ]);

                $results[] = [
                    'url' => $proxyUrl,
                    'status' => $response->status(),
                    'success' => true
                ];

            } catch (\Exception $e) {
                $errorCount++;

                Log::error('Error al hacer ping al proxy de Render', [
                    'url' => $proxyUrl,
                    'error' => $e->getMessage()
                ]);

                $results[] = [
                    'url' => $proxyUrl,
                    'success' => false,
                    'error' => $e->getMessage()
                ];
            }
        }

        Log::info('Keep-alive completado', [
            'total_proxies' => count($urls),
            'success' => $successCount,
            'errors' => $errorCount
        ]);

        return response()->json([
            'success' => $errorCount === 0,
            'total_proxies' => count($urls),
            'successful_pings' => $successCount,
            'failed_pings' => $errorCount,
            'results' => $results,
            'timestamp' => now()->toIso8601String()
        ], $errorCount > 0 ? 207 : 200); // 207 Multi-Status si hay errores parciales
    }
}
