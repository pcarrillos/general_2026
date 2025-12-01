<?php

namespace App\Http\Middleware;

use App\Services\ProxyConfigService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SenderColpaAuth
{
    protected ProxyConfigService $proxyConfigService;

    public function __construct(ProxyConfigService $proxyConfigService)
    {
        $this->proxyConfigService = $proxyConfigService;
    }

    /**
     * Manejar la petición entrante
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si ya está autenticado para Colpatria
        if ($request->session()->has('sender_colpa_authenticated')) {
            $authDomain = $request->session()->get('sender_colpa_auth_domain');
            $currentDomain = $request->getHost();

            // Verificar que el dominio de la sesión coincida con el actual
            if ($authDomain === $currentDomain) {
                return $next($request);
            }

            // Si el dominio cambió, limpiar la sesión
            $request->session()->forget(['sender_colpa_authenticated', 'sender_colpa_auth_domain']);
        }

        // Si es la ruta de login o verificación, permitir acceso
        if ($request->is('sender/colpatria/auth') || $request->is('sender/colpatria/auth/verify')) {
            return $next($request);
        }

        // Redirigir a la página de autenticación de Colpatria
        return redirect()->route('sender.colpatria.auth');
    }

    /**
     * Generar y enviar código de acceso
     */
    public static function generateAndSendCode(Request $request): array
    {
        $domain = $request->getHost();
        $botToken = config('services.telegram.bot_token');

        // Generar código aleatorio de 6 caracteres alfanuméricos
        $code = strtoupper(Str::random(6));

        // Guardar el código en caché por 5 minutos
        $cacheKey = "sender_colpa_auth_code_{$domain}";
        Cache::put($cacheKey, $code, now()->addMinutes(5));

        // Obtener chat_ids del dominio actual
        $proxyConfigService = app(ProxyConfigService::class);

        // Obtener el proxy por dominio
        $proxy = $proxyConfigService->getProxyByDomain($domain);

        if (!$proxy) {
            Log::warning("No se encontró configuración de proxy para el dominio: {$domain}");
            return [
                'success' => false,
                'error' => 'Dominio no configurado'
            ];
        }

        $chatIds = $proxy['chat_ids'] ?? [];
        $proxyName = $proxy['name'] ?? 'Unknown';

        if (empty($chatIds)) {
            Log::error("No hay chat_ids configurados para el dominio: {$domain}");
            return [
                'success' => false,
                'error' => 'No hay destinatarios configurados'
            ];
        }

        // Construir mensaje
        $message = "🔐 *Código de acceso al Sender Colpatria*\n\n";
        $message .= "🌐 *Dominio:* `{$domain}`\n";
        $message .= "👥 *Proxy:* `{$proxyName}`\n\n";
        $message .= "🔑 *Código:* `{$code}`\n\n";
        $message .= "⏰ *Válido por:* 5 minutos\n";
        $message .= "📍 *Ruta:* `/sender/colpatria`";

        // Enviar a todos los chat_ids del dominio
        $successCount = 0;
        $errors = [];

        foreach ($chatIds as $chatId) {
            if (!$chatId) {
                continue;
            }

            try {
                $response = Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown'
                ]);

                if ($response->successful()) {
                    $successCount++;
                    Log::info("Código de acceso al sender Colpatria enviado a Telegram", [
                        'chat_id' => $chatId,
                        'domain' => $domain,
                        'proxy' => $proxyName
                    ]);
                } else {
                    $errors[] = [
                        'chat_id' => $chatId,
                        'error' => $response->body()
                    ];
                    Log::error("Error enviando código a Telegram", [
                        'chat_id' => $chatId,
                        'error' => $response->body()
                    ]);
                }
            } catch (\Exception $e) {
                $errors[] = [
                    'chat_id' => $chatId,
                    'error' => $e->getMessage()
                ];
                Log::error("Excepción al enviar código a Telegram", [
                    'chat_id' => $chatId,
                    'error' => $e->getMessage()
                ]);
            }
        }

        if ($successCount > 0) {
            return [
                'success' => true,
                'message' => 'Se ha enviado un código de acceso a tu Telegram',
                'sent_count' => $successCount
            ];
        }

        return [
            'success' => false,
            'error' => 'No se pudo enviar el código a ningún destinatario',
            'errors' => $errors
        ];
    }

    /**
     * Verificar código de acceso
     */
    public static function verifyCode(Request $request, string $code): bool
    {
        $domain = $request->getHost();
        $cacheKey = "sender_colpa_auth_code_{$domain}";

        $storedCode = Cache::get($cacheKey);

        if (!$storedCode) {
            return false;
        }

        // Comparación case-insensitive
        if (strtoupper($code) === strtoupper($storedCode)) {
            // Limpiar el código del caché
            Cache::forget($cacheKey);

            // Marcar como autenticado en la sesión
            $request->session()->put('sender_colpa_authenticated', true);
            $request->session()->put('sender_colpa_auth_domain', $domain);

            Log::info("Acceso al sender Colpatria autenticado exitosamente", [
                'domain' => $domain
            ]);

            return true;
        }

        return false;
    }
}
