<?php

namespace App\Http\Controllers;

use App\Services\PinbusScraperService;
use Illuminate\Http\Request;

class PinbusController extends Controller
{
    private PinbusScraperService $scraperService;

    public function __construct(PinbusScraperService $scraperService)
    {
        $this->scraperService = $scraperService;
    }

    /**
     * Mostrar página de búsqueda (vista de Brasilia clonada)
     */
    public function index()
    {
        return view('pin.brasil');
    }

    /**
     * Buscar viajes
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            'date' => 'required|date',
            'passengers' => 'nullable|integer|min:1|max:10'
        ]);

        $results = $this->scraperService->searchTrips(
            $validated['origin'],
            $validated['destination'],
            $validated['date']
        );

        $results['passengers'] = $validated['passengers'] ?? 1;

        // Si es una petición AJAX, retornar JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($results);
        }

        // Si no, mostrar vista de resultados
        return view('pin.resultados', [
            'results' => $results,
            'origin' => $validated['origin'],
            'destination' => $validated['destination'],
            'date' => $validated['date'],
            'passengers' => $validated['passengers'] ?? 1
        ]);
    }

    /**
     * API para obtener viajes (JSON)
     */
    public function apiSearch(Request $request, string $origin, string $destination, string $date)
    {
        $results = $this->scraperService->searchTrips($origin, $destination, $date);
        $results['passengers'] = $request->get('passengers', 1);

        return response()->json($results);
    }

    /**
     * Buscar viajes por path (formato: /search/{origin}/{destination}/{date})
     */
    public function searchByPath(Request $request, string $origin, string $destination, string $date)
    {
        $results = $this->scraperService->searchTrips($origin, $destination, $date);
        $passengers = $request->get('passengers', 1);

        return view('pin.resultados', [
            'results' => $results,
            'origin' => $origin,
            'destination' => $destination,
            'date' => $date,
            'passengers' => $passengers
        ]);
    }

    /**
     * Obtener ciudades disponibles
     */
    public function cities()
    {
        $cities = $this->scraperService->getCities();
        return response()->json($cities);
    }

    /**
     * Mostrar selección de sillas
     */
    public function selectSeats(Request $request, string $tripId)
    {
        $passengers = $request->get('passengers', 1);

        // Generar datos del viaje simulado basado en el tripId
        $trip = [
            'id' => $tripId,
            'company' => 'Expreso Brasilia',
            'service_type' => 'Preferencial',
            'departure_time' => '10:30',
            'arrival_time' => '18:45',
            'duration' => '8h 15m',
            'origin_city' => session('origin_city', 'BARRANQUILLA'),
            'origin_department' => session('origin_department', 'ATLANTICO'),
            'destination_city' => session('destination_city', 'BOGOTA'),
            'destination_department' => session('destination_department', 'CUNDINAMARCA'),
            'price' => 128000,
            'bus_type' => '2G',
            'total_seats' => 42,
        ];

        return view('pin.sillas', [
            'trip' => $trip,
            'passengers' => $passengers,
        ]);
    }
}
