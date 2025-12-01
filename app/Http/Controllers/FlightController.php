<?php

namespace App\Http\Controllers;

use App\Services\AmadeusService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Exception;

class FlightController extends Controller
{
    private AmadeusService $amadeusService;

    public function __construct(AmadeusService $amadeusService)
    {
        $this->amadeusService = $amadeusService;
    }

    /**
     * Buscar vuelos
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        try {
            // Validar parámetros requeridos
            $validated = $request->validate([
                'origin' => 'required|string|size:3',
                'destination' => 'required|string|size:3',
                'departureDate' => 'required|date|date_format:Y-m-d',
                'adults' => 'integer|min:1|max:9',
                'returnDate' => 'nullable|date|date_format:Y-m-d|after:departureDate',
                'currencyCode' => 'nullable|string|size:3',
                'max' => 'integer|min:1|max:250',
            ]);

            // Buscar vuelos
            $results = $this->amadeusService->searchFlights(
                origin: $validated['origin'],
                destination: $validated['destination'],
                departureDate: $validated['departureDate'],
                adults: $validated['adults'] ?? 1,
                returnDate: $validated['returnDate'] ?? null,
                currencyCode: $validated['currencyCode'] ?? 'COP',
                max: $validated['max'] ?? 10
            );

            // Filtrar solo vuelos de Avianca
            if (isset($results['data']) && is_array($results['data'])) {
                $results['data'] = array_values(array_filter($results['data'], function($vuelo) {
                    // Verificar si algún segmento del vuelo es operado por Avianca
                    if (isset($vuelo['itineraries']) && is_array($vuelo['itineraries'])) {
                        foreach ($vuelo['itineraries'] as $itinerario) {
                            if (isset($itinerario['segments']) && is_array($itinerario['segments'])) {
                                foreach ($itinerario['segments'] as $segmento) {
                                    $carrierName = $segmento['operating']['carrierName'] ?? '';
                                    if (strtoupper($carrierName) === 'AVIANCA') {
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                    return false;
                }));

                // Actualizar el contador en meta
                if (isset($results['meta'])) {
                    $results['meta']['count'] = count($results['data']);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $results,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $e->errors(),
            ], 422);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Buscar vuelos con parámetros avanzados
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchAdvanced(Request $request): JsonResponse
    {
        try {
            // Validar parámetros
            $validated = $request->validate([
                'originLocationCode' => 'required|string|size:3',
                'destinationLocationCode' => 'required|string|size:3',
                'departureDate' => 'required|date|date_format:Y-m-d',
                'returnDate' => 'nullable|date|date_format:Y-m-d',
                'adults' => 'nullable|integer|min:1|max:9',
                'children' => 'nullable|integer|min:0|max:9',
                'infants' => 'nullable|integer|min:0|max:9',
                'travelClass' => 'nullable|in:ECONOMY,PREMIUM_ECONOMY,BUSINESS,FIRST',
                'nonStop' => 'nullable|boolean',
                'currencyCode' => 'nullable|string|size:3',
                'max' => 'nullable|integer|min:1|max:250',
                'maxPrice' => 'nullable|integer|min:0',
            ]);

            // Buscar con parámetros completos
            $results = $this->amadeusService->searchFlightOffers($validated);

            return response()->json([
                'success' => true,
                'data' => $results,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $e->errors(),
            ], 422);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
