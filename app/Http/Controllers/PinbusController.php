<?php

namespace App\Http\Controllers;

use App\Services\PinbusScraperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PinbusController extends Controller
{
    private PinbusScraperService $scraperService;

    private const PRECIO_POR_KM = 125; // $125 COP por kilómetro

    private const SERVICIOS = [
        [
            'nombre' => 'PREMIUM Plus',
            'subtitulo' => 'Preferencial de Lujo',
            'estrellas' => 5,
            'descuento' => 20,
            'tipoBus' => 'Bus 2G - Dos pisos con cama',
            'amenidades' => ['wifi', 'aire_acondicionado', 'enchufes', 'pantalla_individual', 'snacks', 'cobija', 'asientos_reclinables_180', 'bano', 'seguro_viaje']
        ],
        [
            'nombre' => 'Preferencial',
            'subtitulo' => 'Servicio Ejecutivo',
            'estrellas' => 4,
            'descuento' => 15,
            'tipoBus' => 'Bus 2G - Dos pisos ejecutivo',
            'amenidades' => ['wifi', 'aire_acondicionado', 'enchufes', 'pantalla_compartida', 'asientos_reclinables_140', 'bano', 'seguro_viaje']
        ],
        [
            'nombre' => 'Económico',
            'subtitulo' => 'Servicio Estándar',
            'estrellas' => 3,
            'descuento' => 0,
            'tipoBus' => 'Bus estándar',
            'amenidades' => ['aire_acondicionado', 'asientos_reclinables_120', 'seguro_viaje']
        ]
    ];

    private const HORARIOS_SALIDA = [
        ['salida' => '05:30 AM', 'icono' => 'wb_twilight'],
        ['salida' => '06:00 AM', 'icono' => 'wb_sunny'],
        ['salida' => '08:00 AM', 'icono' => 'wb_sunny'],
        ['salida' => '10:00 AM', 'icono' => 'wb_sunny'],
        ['salida' => '11:15 AM', 'icono' => 'wb_sunny'],
        ['salida' => '02:00 PM', 'icono' => 'wb_sunny'],
        ['salida' => '04:00 PM', 'icono' => 'wb_cloudy'],
        ['salida' => '06:00 PM', 'icono' => 'nights_stay'],
        ['salida' => '08:00 PM', 'icono' => 'nights_stay'],
        ['salida' => '10:00 PM', 'icono' => 'bedtime']
    ];

    private const AMENIDADES_INFO = [
        'wifi' => ['icon' => 'wifi', 'label' => 'WiFi Gratis'],
        'aire_acondicionado' => ['icon' => 'ac_unit', 'label' => 'Aire Acondicionado'],
        'enchufes' => ['icon' => 'power', 'label' => 'Enchufes USB/220V'],
        'pantalla_individual' => ['icon' => 'personal_video', 'label' => 'Pantalla Individual'],
        'pantalla_compartida' => ['icon' => 'tv', 'label' => 'Pantalla Compartida'],
        'snacks' => ['icon' => 'restaurant', 'label' => 'Snacks incluidos'],
        'cobija' => ['icon' => 'bed', 'label' => 'Cobija y Almohada'],
        'asientos_reclinables_180' => ['icon' => 'airline_seat_flat', 'label' => 'Asientos Cama 180°'],
        'asientos_reclinables_140' => ['icon' => 'airline_seat_recline_extra', 'label' => 'Asientos 140°'],
        'asientos_reclinables_120' => ['icon' => 'airline_seat_recline_normal', 'label' => 'Asientos Reclinables'],
        'bano' => ['icon' => 'wc', 'label' => 'Baño a bordo'],
        'seguro_viaje' => ['icon' => 'health_and_safety', 'label' => 'Seguro de Viaje']
    ];

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

    /**
     * Buscar viajes disponibles con cálculo de distancia y precio
     */
    public function buscarViajes(Request $request)
    {
        $validated = $request->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fecha' => 'required|string',
            'es_hoy' => 'nullable|boolean'
        ]);

        $origen = $validated['origen'];
        $destino = $validated['destino'];
        $fecha = $validated['fecha'];
        $esHoy = $validated['es_hoy'] ?? false;

        // Cargar ciudades
        $ciudades = $this->cargarCiudades();

        // Obtener coordenadas
        $coordOrigen = $this->obtenerCoordenadas($origen, $ciudades);
        $coordDestino = $this->obtenerCoordenadas($destino, $ciudades);

        // Obtener datos de ruta (distancia y duración)
        $datosRuta = $this->obtenerDatosRuta($coordOrigen, $coordDestino, $origen, $destino);

        // Calcular precio base
        $precioBase = $this->calcularPrecioBase($datosRuta['distancia']);

        // Generar viajes disponibles
        $viajes = $this->generarViajes($origen, $destino, $datosRuta, $precioBase, $esHoy, $ciudades);

        return response()->json([
            'success' => true,
            'datos_ruta' => $datosRuta,
            'precio_base' => $precioBase,
            'viajes' => $viajes,
            'amenidades_info' => self::AMENIDADES_INFO,
            'fecha' => $fecha
        ]);
    }

    /**
     * Cargar ciudades desde el archivo JSON
     */
    private function cargarCiudades(): array
    {
        return Cache::remember('ciudades_colombia', 3600, function () {
            $path = public_path('pin/ciudades.json');
            if (!file_exists($path)) {
                return [];
            }
            $json = file_get_contents($path);
            $data = json_decode($json, true);

            $ciudades = [];
            foreach ($data as $ciudad) {
                $key = $ciudad['ascii_display'] ?? $ciudad['city_ascii_name'] ?? '';
                if ($key) {
                    $ciudades[$key] = [
                        'lat' => (float) $ciudad['lat'],
                        'lon' => (float) $ciudad['long'],
                        'departamento' => $ciudad['state'] ?? ''
                    ];
                }
            }
            return $ciudades;
        });
    }

    /**
     * Obtener coordenadas de una ciudad
     */
    private function obtenerCoordenadas(string $ciudad, array $ciudades): ?array
    {
        $key = $this->normalizarTexto($ciudad);
        return $ciudades[$key] ?? $ciudades[strtolower($ciudad)] ?? null;
    }

    /**
     * Normalizar texto (remover acentos y convertir a minúsculas)
     */
    private function normalizarTexto(string $texto): string
    {
        $texto = mb_strtolower($texto, 'UTF-8');
        $texto = preg_replace('/[áàäâã]/u', 'a', $texto);
        $texto = preg_replace('/[éèëê]/u', 'e', $texto);
        $texto = preg_replace('/[íìïî]/u', 'i', $texto);
        $texto = preg_replace('/[óòöôõ]/u', 'o', $texto);
        $texto = preg_replace('/[úùüû]/u', 'u', $texto);
        $texto = preg_replace('/[ñ]/u', 'n', $texto);
        return trim($texto);
    }

    /**
     * Obtener datos de ruta desde OSRM API
     */
    private function obtenerDatosRuta(?array $coordOrigen, ?array $coordDestino, string $origen, string $destino): array
    {
        $valoresPorDefecto = ['duracion' => 720, 'distancia' => 500];

        if (!$coordOrigen || !$coordDestino) {
            return $valoresPorDefecto;
        }

        // Cache key basado en las coordenadas
        $cacheKey = "ruta_{$coordOrigen['lat']}_{$coordOrigen['lon']}_{$coordDestino['lat']}_{$coordDestino['lon']}";

        return Cache::remember($cacheKey, 86400, function () use ($coordOrigen, $coordDestino, $valoresPorDefecto) {
            try {
                $url = sprintf(
                    'https://router.project-osrm.org/route/v1/driving/%s,%s;%s,%s?overview=false',
                    $coordOrigen['lon'],
                    $coordOrigen['lat'],
                    $coordDestino['lon'],
                    $coordDestino['lat']
                );

                $response = Http::timeout(10)->get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    if (($data['code'] ?? '') === 'Ok' && !empty($data['routes'])) {
                        $ruta = $data['routes'][0];
                        return [
                            'duracion' => (int) round($ruta['duration'] / 60), // segundos a minutos
                            'distancia' => (int) round($ruta['distance'] / 1000) // metros a km
                        ];
                    }
                }
            } catch (\Exception $e) {
                \Log::error('Error al obtener datos de ruta OSRM: ' . $e->getMessage());
            }

            return $valoresPorDefecto;
        });
    }

    /**
     * Calcular precio base según distancia
     */
    private function calcularPrecioBase(int $distanciaKm): int
    {
        $precioPorKm = self::PRECIO_POR_KM;

        if ($distanciaKm > 100) {
            // Reducción logarítmica: máximo 40% de descuento en viajes muy largos
            $factorReduccion = min(0.4, log10($distanciaKm / 100) * 0.2);
            $precioPorKm = (int) round(self::PRECIO_POR_KM * (1 - $factorReduccion));
        }

        return $distanciaKm * $precioPorKm;
    }

    /**
     * Obtener ciudad con departamento
     */
    private function obtenerCiudadConDepartamento(string $ciudad, array $ciudades): string
    {
        $key = $this->normalizarTexto($ciudad);
        $info = $ciudades[$key] ?? $ciudades[strtolower(trim($ciudad))] ?? null;

        if ($info && !empty($info['departamento'])) {
            return strtoupper(trim($ciudad)) . '-' . strtoupper($info['departamento']);
        }

        return strtoupper(trim($ciudad));
    }

    /**
     * Calcular hora de llegada basada en duración
     */
    private function calcularHoraLlegada(string $horaSalida, int $duracionMinutos): string
    {
        if (!preg_match('/(\d{1,2}):(\d{2})\s*(AM|PM)/i', $horaSalida, $match)) {
            return $horaSalida;
        }

        $horas = (int) $match[1];
        $minutos = (int) $match[2];
        $periodo = strtoupper($match[3]);

        // Convertir a formato 24 horas
        if ($periodo === 'PM' && $horas !== 12) {
            $horas += 12;
        }
        if ($periodo === 'AM' && $horas === 12) {
            $horas = 0;
        }

        // Sumar duración
        $totalMinutos = $horas * 60 + $minutos + $duracionMinutos;
        $horasLlegada = ($totalMinutos / 60) % 24;
        $minutosLlegada = $totalMinutos % 60;

        // Convertir a formato 12 horas
        $periodoLlegada = $horasLlegada >= 12 ? 'PM' : 'AM';
        if ($horasLlegada > 12) {
            $horasLlegada -= 12;
        }
        if ($horasLlegada == 0) {
            $horasLlegada = 12;
        }

        return sprintf('%02d:%02d %s', (int) $horasLlegada, (int) $minutosLlegada, $periodoLlegada);
    }

    /**
     * Convertir hora AM/PM a minutos desde medianoche
     */
    private function horaAMinutos(string $horaStr): int
    {
        if (!preg_match('/(\d{1,2}):(\d{2})\s*(AM|PM)/i', $horaStr, $match)) {
            return 0;
        }

        $horas = (int) $match[1];
        $minutos = (int) $match[2];
        $periodo = strtoupper($match[3]);

        if ($periodo === 'PM' && $horas !== 12) {
            $horas += 12;
        }
        if ($periodo === 'AM' && $horas === 12) {
            $horas = 0;
        }

        return $horas * 60 + $minutos;
    }

    /**
     * Generar viajes disponibles
     */
    private function generarViajes(string $origen, string $destino, array $datosRuta, int $precioBase, bool $esHoy, array $ciudades): array
    {
        $duracionMinutos = $datosRuta['duracion'];

        // Generar horarios con hora de llegada calculada
        $horarios = array_map(function ($h) use ($duracionMinutos) {
            return [
                'salida' => $h['salida'],
                'llegada' => $this->calcularHoraLlegada($h['salida'], $duracionMinutos),
                'icono' => $h['icono']
            ];
        }, self::HORARIOS_SALIDA);

        // Si es búsqueda para hoy, filtrar horarios caducados (+ 1 hora de margen)
        if ($esHoy) {
            $ahora = now();
            $minutosActuales = $ahora->hour * 60 + $ahora->minute;
            $margenMinutos = 60;

            $horarios = array_filter($horarios, function ($h) use ($minutosActuales, $margenMinutos) {
                $minutosSalida = $this->horaAMinutos($h['salida']);
                return $minutosSalida >= ($minutosActuales + $margenMinutos);
            });
            $horarios = array_values($horarios); // Re-indexar
        }

        // Si no hay horarios disponibles
        if (empty($horarios)) {
            return [];
        }

        // Seleccionar cantidad aleatoria de viajes (4 a 6, o menos si no hay suficientes)
        $cantidadViajes = min(rand(4, 6), count($horarios));

        // Mezclar y tomar los primeros
        shuffle($horarios);
        $horariosUsados = array_slice($horarios, 0, $cantidadViajes);

        // Generar viajes
        $viajes = [];
        foreach ($horariosUsados as $index => $horario) {
            $servicio = self::SERVICIOS[$index % count(self::SERVICIOS)];
            $precioOriginal = $servicio['descuento'] > 0
                ? (int) round($precioBase * (1 + $servicio['descuento'] / 100))
                : null;

            $viajes[] = [
                'id' => $index + 1,
                'servicio' => $servicio['nombre'],
                'subtitulo' => $servicio['subtitulo'],
                'estrellas' => $servicio['estrellas'],
                'tipoBus' => $servicio['tipoBus'],
                'amenidades' => $servicio['amenidades'],
                'horaSalida' => $horario['salida'],
                'horaLlegada' => $horario['llegada'],
                'iconoHora' => $horario['icono'],
                'precioOriginal' => $precioOriginal,
                'precio' => $precioBase,
                'origen' => $this->obtenerCiudadConDepartamento($origen, $ciudades),
                'destino' => $this->obtenerCiudadConDepartamento($destino, $ciudades)
            ];
        }

        // Ordenar por hora de salida
        usort($viajes, function ($a, $b) {
            return $this->horaAMinutos($a['horaSalida']) - $this->horaAMinutos($b['horaSalida']);
        });

        return $viajes;
    }
}
