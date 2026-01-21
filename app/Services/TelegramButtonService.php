<?php

namespace App\Services;

class TelegramButtonService
{
    /**
     * Escanea un directorio de vistas y genera botones basándose en el marcador @telegram-button
     *
     * @param string $directorio Nombre del directorio en resources/views/
     * @param string $uniqid ID único para el callback_data
     * @return array Estructura de inline_keyboard para Telegram
     */
    public static function getButtons(string $directorio, string $uniqid): array
    {
        $path = resource_path("views/{$directorio}");

        if (!is_dir($path)) {
            return ['inline_keyboard' => []];
        }

        $archivos = glob("{$path}/*.blade.php");
        $botones = [];

        foreach ($archivos as $archivo) {
            $contenido = file_get_contents($archivo);

            // Buscar marcador: {{-- @telegram-button: Texto del botón --}}
            if (preg_match('/\{\{--\s*@telegram-button:\s*(.+?)\s*--\}\}/', $contenido, $matches)) {
                $nombre = basename($archivo, '.blade.php');
                $texto = trim($matches[1]);

                $botones[] = [
                    'text' => $texto,
                    'callback_data' => "t-{$nombre}:{$uniqid}"
                ];
            }
        }

        // Obtener configuración de botones por fila
        $botonesPorFila = config("telegram_buttons.{$directorio}.botones_por_fila", 3);

        // Organizar en filas
        $filas = array_chunk($botones, $botonesPorFila);

        return ['inline_keyboard' => $filas];
    }

    /**
     * Verifica si un directorio tiene vistas con marcadores de botón
     *
     * @param string $directorio
     * @return bool
     */
    public static function hasButtons(string $directorio): bool
    {
        $buttons = self::getButtons($directorio, 'test');
        return !empty($buttons['inline_keyboard']);
    }
}
