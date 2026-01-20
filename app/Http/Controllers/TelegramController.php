<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    /**
     * Enviar mensaje a Telegram para Entradas
     */
    public static function sendEntradaMessage(array $entrada, bool $isNew = true): bool
    {
        $botToken = env('TELEGRAM_ENTRADAS_BOT_TOKEN');
        $chatId = env('TELEGRAM_ENTRADAS_CHAT_ID');

        if (!$botToken || !$chatId) {
            Log::warning('Telegram: Token o Chat ID no configurados para Entradas');
            return false;
        }

        $action = $isNew ? 'NUEVA ENTRADA' : 'ENTRADA ACTUALIZADA';
        $emoji = $isNew ? "\xF0\x9F\x86\x95" : "\xF0\x9F\x94\x84"; // 🆕 o 🔄

        $message = "{$emoji} <b>{$action}</b>\n\n";
        $message .= "<b>ID:</b> {$entrada['id']}\n";
        $message .= "<b>UniqID:</b> <code>{$entrada['uniqid']}</code>\n";
        $message .= "<b>Status:</b> {$entrada['status']}\n";
        $message .= "<b>Fecha:</b> {$entrada['created_at']}\n\n";

        // Formatear datos
        if (!empty($entrada['datos'])) {
            $message .= "<b>Datos:</b>\n";
            foreach ($entrada['datos'] as $key => $value) {
                if (is_array($value)) {
                    $value = json_encode($value, JSON_UNESCAPED_UNICODE);
                }
                $message .= "  \xE2\x80\xA2 <b>{$key}:</b> <code>{$value}</code>\n";
            }
        }

        return self::sendMessage($botToken, $chatId, $message);
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
}
