<?php

/**
 * Configuración de botones de Telegram por directorio de vistas
 *
 * Los botones se generan automáticamente escaneando las vistas que contengan
 * el marcador: {{-- @telegram-button: Texto del botón --}}
 *
 * Aquí solo se configuran opciones adicionales por directorio.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Directorio: prueba
    |--------------------------------------------------------------------------
    */
    'prueba' => [
        'botones_por_fila' => 3,
    ],

];
