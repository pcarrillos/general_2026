<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PinbusScraperService
{
    /**
     * Empresas de transporte simuladas
     */
    private array $empresas = [
        ['nombre' => 'Expreso Brasilia', 'logo' => '/pin/logos/brasilia.png'],
        ['nombre' => 'Copetran', 'logo' => '/pin/logos/copetran.png'],
        ['nombre' => 'Berlinas del Fonce', 'logo' => '/pin/logos/berlinas.png'],
        ['nombre' => 'Rápido Ochoa', 'logo' => '/pin/logos/ochoa.png'],
        ['nombre' => 'Expreso Bolivariano', 'logo' => '/pin/logos/bolivariano.png'],
        ['nombre' => 'Omega', 'logo' => '/pin/logos/omega.png'],
        ['nombre' => 'Coomotor', 'logo' => '/pin/logos/coomotor.png'],
        ['nombre' => 'Flota Magdalena', 'logo' => '/pin/logos/magdalena.png'],
    ];

    /**
     * Tipos de servicio
     */
    private array $servicios = [
        ['tipo' => 'Ejecutivo', 'multiplicador' => 1.0],
        ['tipo' => 'Preferencial', 'multiplicador' => 1.3],
        ['tipo' => 'VIP', 'multiplicador' => 1.6],
        ['tipo' => '2G', 'multiplicador' => 1.8],
    ];

    /**
     * Buscar viajes (genera datos simulados)
     */
    public function searchTrips(string $origin, string $destination, string $date): array
    {
        $ciudades = $this->getCities();

        // Buscar información de origen y destino
        $originCity = $this->findCity($ciudades, $origin);
        $destinationCity = $this->findCity($ciudades, $destination);

        if (!$originCity || !$destinationCity) {
            return [
                'success' => false,
                'error' => 'Ciudad de origen o destino no encontrada',
                'trips' => []
            ];
        }

        // Generar viajes simulados
        $trips = $this->generateTrips($originCity, $destinationCity, $date);

        return [
            'success' => true,
            'origin' => $originCity,
            'destination' => $destinationCity,
            'date' => $date,
            'trips' => $trips,
            'count' => count($trips)
        ];
    }

    /**
     * Generar viajes simulados
     */
    private function generateTrips(array $origin, array $destination, string $date): array
    {
        $trips = [];

        // Obtener duración real del viaje desde OSRM
        $routeInfo = $this->getRouteFromOSRM($origin, $destination);
        $baseDurationMinutes = $routeInfo['duration_minutes'];
        $distanceKm = $routeInfo['distance_km'];

        // Calcular precio base según distancia real
        $basePrice = $this->calculateBasePriceByDistance($distanceKm);

        // Generar entre 8 y 15 viajes
        $numTrips = rand(8, 15);

        // Horas de salida distribuidas durante el día
        $departureHours = $this->generateDepartureHours($numTrips);

        foreach ($departureHours as $index => $hour) {
            $empresa = $this->empresas[array_rand($this->empresas)];
            $servicio = $this->servicios[array_rand($this->servicios)];

            // Variación de duración según tipo de servicio y paradas
            $stops = rand(0, 2);
            $extraMinutes = $stops * rand(15, 30); // Tiempo extra por paradas
            $totalDurationMinutes = $baseDurationMinutes + $extraMinutes;

            $durationHours = intval($totalDurationMinutes / 60);
            $durationMinutes = $totalDurationMinutes % 60;

            // Calcular hora de llegada
            $departureTime = sprintf('%02d:%02d', $hour, rand(0, 59));
            $arrivalTime = $this->calculateArrivalTime($departureTime, $durationHours, $durationMinutes);

            // Precio con variación según servicio
            $price = $this->calculatePrice($basePrice, $servicio['multiplicador']);

            // Asientos disponibles
            $availableSeats = rand(5, 42);

            $trips[] = [
                'id' => uniqid('trip_'),
                'company' => $empresa['nombre'],
                'company_logo' => $empresa['logo'],
                'service_type' => $servicio['tipo'],
                'departure_time' => $departureTime,
                'arrival_time' => $arrivalTime,
                'duration' => sprintf('%dh %02dm', $durationHours, $durationMinutes),
                'duration_minutes' => $totalDurationMinutes,
                'distance_km' => $distanceKm,
                'origin_terminal' => 'Terminal de ' . $origin['display'],
                'destination_terminal' => 'Terminal de ' . $destination['display'],
                'origin_city' => $origin['display'] ?? $origin['slug'],
                'origin_department' => $origin['state'] ?? '',
                'destination_city' => $destination['display'] ?? $destination['slug'],
                'destination_department' => $destination['state'] ?? '',
                'price' => $price,
                'original_price' => rand(0, 1) ? round($price * 1.15, -3) : null,
                'available_seats' => $availableSeats,
                'amenities' => $this->generateAmenities($servicio['tipo']),
                'bus_type' => $this->getBusType($servicio['tipo']),
                'stops' => $stops,
            ];
        }

        // Ordenar por hora de salida
        usort($trips, function($a, $b) {
            return strcmp($a['departure_time'], $b['departure_time']);
        });

        return $trips;
    }

    /**
     * Obtener información de ruta desde OSRM (Open Source Routing Machine)
     */
    private function getRouteFromOSRM(array $origin, array $destination): array
    {
        $originLat = floatval($origin['lat'] ?? 0);
        $originLong = floatval($origin['long'] ?? 0);
        $destLat = floatval($destination['lat'] ?? 0);
        $destLong = floatval($destination['long'] ?? 0);

        // Si no hay coordenadas válidas, usar valores por defecto
        if ($originLat == 0 || $destLat == 0) {
            return [
                'duration_minutes' => rand(180, 720), // 3-12 horas
                'distance_km' => rand(100, 800),
            ];
        }

        // Crear clave de cache para esta ruta
        $cacheKey = "osrm_route_{$origin['slug']}_{$destination['slug']}";

        // Intentar obtener de cache (válido por 24 horas)
        return Cache::remember($cacheKey, 86400, function () use ($originLong, $originLat, $destLong, $destLat) {
            try {
                // API de OSRM (servidor público demo)
                $url = "https://router.project-osrm.org/route/v1/driving/{$originLong},{$originLat};{$destLong},{$destLat}?overview=false";

                $response = Http::timeout(10)->get($url);

                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['routes'][0])) {
                        $route = $data['routes'][0];
                        return [
                            'duration_minutes' => intval($route['duration'] / 60),
                            'distance_km' => intval($route['distance'] / 1000),
                        ];
                    }
                }
            } catch (\Exception $e) {
                // Log del error si es necesario
            }

            // Valores por defecto si falla la API
            return [
                'duration_minutes' => rand(180, 720),
                'distance_km' => rand(100, 800),
            ];
        });
    }

    /**
     * Calcular precio base según distancia en km
     */
    private function calculateBasePriceByDistance(int $distanceKm): int
    {
        // Precio base: ~100 COP por km (ajustable)
        $pricePerKm = 120;
        $basePrice = $distanceKm * $pricePerKm;

        // Mínimo 40,000 COP, máximo 350,000 COP
        $basePrice = max(40000, min(350000, $basePrice));

        // Redondear a miles
        return round($basePrice, -3);
    }

    /**
     * Calcular precio base
     */
    private function calculateBasePrice(array $origin, array $destination): int
    {
        // Precio base entre 50,000 y 200,000 COP
        $minPrice = 50000;
        $maxPrice = 200000;

        // Usar popularidad para variar el precio
        $originPop = floatval($origin['popularity'] ?? 0.5);
        $destPop = floatval($destination['popularity'] ?? 0.5);

        $factor = ($originPop + $destPop) / 2;
        $basePrice = $minPrice + (($maxPrice - $minPrice) * (1 - $factor));

        // Redondear a miles
        return round($basePrice, -3);
    }

    /**
     * Calcular precio final
     */
    private function calculatePrice(int $basePrice, float $multiplicador): int
    {
        $price = $basePrice * $multiplicador;
        // Agregar variación aleatoria de ±10%
        $variation = $price * (rand(-10, 10) / 100);
        return round($price + $variation, -3);
    }

    /**
     * Generar horas de salida
     */
    private function generateDepartureHours(int $count): array
    {
        $hours = [];
        // Distribuir entre 4am y 11pm
        for ($i = 0; $i < $count; $i++) {
            $hours[] = rand(4, 23);
        }
        sort($hours);
        return $hours;
    }

    /**
     * Calcular hora de llegada
     */
    private function calculateArrivalTime(string $departure, int $hours, int $minutes): string
    {
        $parts = explode(':', $departure);
        $depHour = intval($parts[0]);
        $depMin = intval($parts[1]);

        $arrMin = $depMin + $minutes;
        $arrHour = $depHour + $hours + floor($arrMin / 60);
        $arrMin = $arrMin % 60;
        $arrHour = $arrHour % 24;

        return sprintf('%02d:%02d', $arrHour, $arrMin);
    }

    /**
     * Generar amenidades según tipo de servicio
     */
    private function generateAmenities(string $serviceType): array
    {
        $base = ['wifi', 'aire_acondicionado'];

        switch ($serviceType) {
            case 'VIP':
            case '2G':
                return array_merge($base, ['enchufes', 'pantalla_individual', 'snacks', 'cobija', 'asientos_reclinables_180']);
            case 'Preferencial':
                return array_merge($base, ['enchufes', 'pantalla_compartida', 'asientos_reclinables_140']);
            default:
                return array_merge($base, ['asientos_reclinables_120']);
        }
    }

    /**
     * Obtener tipo de bus
     */
    private function getBusType(string $serviceType): string
    {
        $types = [
            'Ejecutivo' => 'Bus Estándar - 42 asientos',
            'Preferencial' => 'Bus Preferencial - 36 asientos',
            'VIP' => 'Bus VIP - 24 asientos',
            '2G' => 'Bus Doble Piso - 48 asientos',
        ];

        return $types[$serviceType] ?? 'Bus Estándar';
    }

    /**
     * Buscar ciudad por slug
     */
    private function findCity(array $cities, string $slug): ?array
    {
        foreach ($cities as $city) {
            if ($city['slug'] === $slug || strtolower($city['display']) === strtolower($slug)) {
                return $city;
            }
        }
        return null;
    }

    /**
     * Obtener ciudades disponibles
     */
    public function getCities(): array
    {
        $jsonPath = public_path('pin/ciudades.json');

        if (file_exists($jsonPath)) {
            $content = file_get_contents($jsonPath);
            return json_decode($content, true) ?? [];
        }

        return [];
    }
}
