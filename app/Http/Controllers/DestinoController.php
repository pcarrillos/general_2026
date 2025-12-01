<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinoController extends Controller
{
    /**
     * Obtener lista de destinos para autocompletado
     */
    public function autocomplete()
    {
        try {
            // Leer el archivo JSON de destinos
            $jsonContent = Storage::disk('local')->get('destinos_autocomplete.json');
            $destinos = json_decode($jsonContent, true);

            return response()->json($destinos);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No se pudieron cargar los destinos',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
