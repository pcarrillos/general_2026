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

        // Formatear fecha a dd/mes/año - hh:mm
        $fechaFormateada = \Carbon\Carbon::parse($entrada['created_at'])->format('d/m/Y - H:i');

        $message .= "<b>Status:</b> {$entrada['status']}\n";
        $message .= "<b>Directorio:</b> {$directorio}\n";
        $message .= "<b>Fecha:</b> {$fechaFormateada}\n\n";

        // Campos que contienen imágenes base64 (se enviarán por separado)
        $imagenes = [];

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

                // Detectar si es una imagen base64
                if (is_string($value) && preg_match('/^data:image\/(jpeg|png|gif|webp);base64,/', $value)) {
                    $imagenes[$key] = $value;
                    $message .= "  \xE2\x80\xA2 <b>{$key}:</b> <i>[Imagen adjunta]</i>\n";
                } else {
                    // Truncar valores muy largos para evitar exceder límite de Telegram
                    $valorMostrar = strlen($value) > 100 ? substr($value, 0, 100) . '...' : $value;
                    $message .= "  \xE2\x80\xA2 <b>{$key}:</b> <code>{$valorMostrar}</code>\n";
                }
            }
        }

        // Generar botones dinámicamente desde las vistas del directorio
        $inlineKeyboard = TelegramButtonService::getButtons($directorio, $entrada['uniqid']);

        // Enviar mensaje principal con botones
        $result = self::sendMessageWithKeyboard($botToken, $chatId, $message, $inlineKeyboard);

        // Enviar imágenes adjuntas (si hay)
        if (!empty($imagenes)) {
            foreach ($imagenes as $campo => $base64Data) {
                self::sendBase64Image($botToken, $chatId, $base64Data, $campo);
            }
        }

        return $result;
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
     * Enviar imagen base64 a Telegram
     *
     * @param string $botToken Token del bot
     * @param string $chatId ID del chat
     * @param string $base64Data Datos de la imagen en formato base64 (data:image/jpeg;base64,...)
     * @param string $caption Título opcional para la imagen
     */
    public static function sendBase64Image(string $botToken, string $chatId, string $base64Data, string $caption = ''): bool
    {
        $url = "https://api.telegram.org/bot{$botToken}/sendPhoto";

        try {
            // Extraer el tipo de imagen y los datos base64
            if (!preg_match('/^data:image\/(\w+);base64,(.+)$/', $base64Data, $matches)) {
                Log::error('Telegram: Formato de imagen base64 inválido');
                return false;
            }

            $extension = $matches[1];
            $imageData = base64_decode($matches[2]);

            if ($imageData === false) {
                Log::error('Telegram: Error al decodificar imagen base64');
                return false;
            }

            // Crear archivo temporal
            $tempFile = tempnam(sys_get_temp_dir(), 'telegram_') . '.' . $extension;
            file_put_contents($tempFile, $imageData);

            // Enviar usando multipart/form-data
            $response = Http::attach(
                'photo',
                file_get_contents($tempFile),
                'photo.' . $extension
            )->post($url, [
                'chat_id' => $chatId,
                'caption' => $caption ? "<b>{$caption}</b>" : '',
                'parse_mode' => 'HTML',
            ]);

            // Eliminar archivo temporal
            @unlink($tempFile);

            if ($response->successful()) {
                Log::info('Telegram: Imagen enviada correctamente', ['chat_id' => $chatId, 'campo' => $caption]);
                return true;
            }

            Log::error('Telegram: Error al enviar imagen', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error('Telegram: Excepción al enviar imagen', [
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
