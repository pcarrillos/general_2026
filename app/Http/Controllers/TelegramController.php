<?php

namespace App\Http\Controllers;

use App\Services\TelegramButtonService;
use App\Models\Usuario;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    /**
     * Enviar mensaje a Telegram para Entradas con botones dinámicos
     *
     * @param array $entrada Datos de la entrada
     * @param bool $isNew Si es nueva entrada o actualización
     * @param string $directorio Directorio de vistas para generar botones
     * @param string|null $dominio Dominio para buscar el usuario asociado
     * @param array $ordenCampos Orden de los campos para mostrar en el mensaje
     */
    public static function sendEntradaMessage(array $entrada, bool $isNew = true, string $directorio = 'prueba', ?string $dominio = null, array $ordenCampos = []): bool
    {
        $botToken = env('TELEGRAM_ENTRADAS_BOT_TOKEN');
        $chatId = env('TELEGRAM_ENTRADAS_CHAT_ID');

        if (!$botToken || !$chatId) {
            Log::warning('Telegram: Token o Chat ID no configurados para Entradas');
            return false;
        }

        // Buscar usuario por dominio
        $usuarioData = null;
        if ($dominio) {
            $usuarioData = Usuario::where('dominio', $dominio)->first();
        }

        $action = $isNew ? 'NUEVA ENTRADA' : 'ENTRADA ACTUALIZADA';
        $emoji = $isNew ? "\xF0\x9F\x86\x95" : "\xF0\x9F\x94\x84"; // 🆕 o 🔄

        $message = "{$emoji} <b>{$action}</b>\n\n";

        // Mostrar usuario e ID del usuario si se encontró
        if ($usuarioData) {
            $message .= "<b>Usuario:</b> <code>{$usuarioData->usuario}</code>\n";
            $message .= "<b>ID:</b> {$usuarioData->id}\n";
        }

        $message .= "<b>UniqID:</b> <code>{$entrada['uniqid']}</code>\n";
        $message .= "<b>Status:</b> {$entrada['status']}\n";
        $message .= "<b>Directorio:</b> {$directorio}\n";
        $message .= "<b>Fecha:</b> {$entrada['created_at']}\n\n";

        // Formatear datos
        if (!empty($entrada['datos'])) {
            $message .= "<b>Datos:</b>\n";

            // Determinar el orden de los campos
            $datos = $entrada['datos'];
            $camposOrdenados = [];

            if (!empty($ordenCampos)) {
                // Usar el orden especificado
                foreach ($ordenCampos as $campo) {
                    if (array_key_exists($campo, $datos)) {
                        $camposOrdenados[$campo] = $datos[$campo];
                    }
                }
                // Agregar campos que no estén en el orden (por si acaso)
                foreach ($datos as $key => $value) {
                    if (!array_key_exists($key, $camposOrdenados)) {
                        $camposOrdenados[$key] = $value;
                    }
                }
            } else {
                // Sin orden especificado, usar el orden original
                $camposOrdenados = $datos;
            }

            // Excluir campos internos del mensaje
            $camposExcluidos = ['directorio', 'status', '_orden'];

            foreach ($camposOrdenados as $key => $value) {
                // Saltar campos excluidos
                if (in_array($key, $camposExcluidos)) {
                    continue;
                }

                if (is_array($value)) {
                    $value = json_encode($value, JSON_UNESCAPED_UNICODE);
                }
                $message .= "  \xE2\x80\xA2 <b>{$key}:</b> <code>{$value}</code>\n";
            }
        }

        // Generar botones dinámicamente desde las vistas del directorio
        $inlineKeyboard = TelegramButtonService::getButtons($directorio, $entrada['uniqid']);

        return self::sendMessageWithKeyboard($botToken, $chatId, $message, $inlineKeyboard);
    }

    /**
     * Enviar mensaje genérico a Telegram
     */
    public static function sendMessage(string $botToken, string $chatId, string $message): bool
    {
        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        try {
            $response = Http::post($url, [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
            ]);

            if ($response->successful()) {
                Log::info('Telegram: Mensaje enviado correctamente', ['chat_id' => $chatId]);
                return true;
            }

            Log::error('Telegram: Error al enviar mensaje', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error('Telegram: Excepción al enviar mensaje', [
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Enviar mensaje con inline keyboard a Telegram
     */
    public static function sendMessageWithKeyboard(string $botToken, string $chatId, string $message, array $keyboard): bool
    {
        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        try {
            $response = Http::post($url, [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
                'reply_markup' => json_encode($keyboard),
            ]);

            if ($response->successful()) {
                Log::info('Telegram: Mensaje con botones enviado correctamente', ['chat_id' => $chatId]);
                return true;
            }

            Log::error('Telegram: Error al enviar mensaje con botones', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error('Telegram: Excepción al enviar mensaje con botones', [
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Responder a callback query (confirmar recepción del botón)
     */
    public static function answerCallbackQuery(string $botToken, string $callbackQueryId, string $text = ''): bool
    {
        $url = "https://api.telegram.org/bot{$botToken}/answerCallbackQuery";

        try {
            $response = Http::post($url, [
                'callback_query_id' => $callbackQueryId,
                'text' => $text,
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Telegram: Error al responder callback', ['error' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Procesar webhook de Telegram (callback_query de botones inline)
     */
    public function handleWebhook(\Illuminate\Http\Request $request)
    {
        $update = $request->all();

        Log::info('Telegram Webhook recibido', ['update' => $update]);

        // Verificar si es un callback_query (presión de botón inline)
        if (isset($update['callback_query'])) {
            return $this->handleCallbackQuery($update['callback_query']);
        }

        return response()->json(['ok' => true]);
    }

    /**
     * Manejar callback de botón inline
     * Formato esperado: t-{destino}:{uniqid}
     * Ejemplo: t-evaluacion-1:user_123456789
     */
    protected function handleCallbackQuery(array $callbackQuery)
    {
        $botToken = env('TELEGRAM_ENTRADAS_BOT_TOKEN');
        $callbackQueryId = $callbackQuery['id'];
        $data = $callbackQuery['data'] ?? '';

        // Parsear callback_data: t-{destino}:{uniqid}
        if (!str_starts_with($data, 't-')) {
            self::answerCallbackQuery($botToken, $callbackQueryId, 'Acción no válida');
            return response()->json(['ok' => false, 'error' => 'Invalid callback data']);
        }

        // Separar destino y uniqid
        $parts = explode(':', $data, 2);
        if (count($parts) !== 2) {
            self::answerCallbackQuery($botToken, $callbackQueryId, 'Formato inválido');
            return response()->json(['ok' => false, 'error' => 'Invalid format']);
        }

        $nuevoStatus = $parts[0]; // t-evaluacion-1, t-evaluacion-2, t-evaluacion-3
        $uniqid = $parts[1];

        // Buscar y actualizar la entrada
        $entrada = \App\Models\Entrada::where('uniqid', $uniqid)->first();

        if (!$entrada) {
            self::answerCallbackQuery($botToken, $callbackQueryId, 'Entrada no encontrada');
            return response()->json(['ok' => false, 'error' => 'Entry not found']);
        }

        // Actualizar status en la DB
        $entrada->update(['status' => $nuevoStatus]);

        Log::info('Telegram: Status actualizado via callback', [
            'uniqid' => $uniqid,
            'nuevo_status' => $nuevoStatus
        ]);

        // Confirmar acción al usuario de Telegram
        $destinoNombre = str_replace('t-', '', $nuevoStatus);
        self::answerCallbackQuery($botToken, $callbackQueryId, "Redirigiendo a {$destinoNombre}");

        return response()->json(['ok' => true, 'status' => $nuevoStatus]);
    }
}
