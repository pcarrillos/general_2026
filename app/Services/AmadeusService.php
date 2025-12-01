<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class AmadeusService
{
    private string $apiKey;
    private string $apiSecret;
    private string $baseUrl;
    private ?string $accessToken = null;

    public function __construct()
    {
        $this->apiKey = config('services.amadeus.api_key');
        $this->apiSecret = config('services.amadeus.api_secret');
        $environment = config('services.amadeus.environment', 'test');

        $this->baseUrl = $environment === 'production'
            ? 'https://api.amadeus.com'
            : 'https://test.api.amadeus.com';
    }

    /**
     * Obtener token de acceso OAuth2
     */
    private function getAccessToken(): string
    {
        // Intentar obtener el token desde caché
        $cachedToken = Cache::get('amadeus_access_token');

        if ($cachedToken) {
            return $cachedToken;
        }

        // Solicitar nuevo token
        try {
            $response = Http::asForm()->post("{$this->baseUrl}/v1/security/oauth2/token", [
                'grant_type' => 'client_credentials',
                'client_id' => $this->apiKey,
                'client_secret' => $this->apiSecret,
            ]);

            if (!$response->successful()) {
                throw new Exception('Error al obtener token de Amadeus: ' . $response->body());
            }

            $data = $response->json();
            $token = $data['access_token'];
            $expiresIn = $data['expires_in'] ?? 1799; // Por defecto 30 minutos

            // Guardar en caché (restamos 60 segundos para renovar antes de que expire)
            Cache::put('amadeus_access_token', $token, $expiresIn - 60);

            return $token;
        } catch (Exception $e) {
            throw new Exception('Error en autenticación Amadeus: ' . $e->getMessage());
        }
    }

    /**
     * Buscar ofertas de vuelos
     *
     * @param array $params Parámetros de búsqueda
     * @return array Respuesta de la API
     */
    public function searchFlightOffers(array $params): array
    {
        $token = $this->getAccessToken();

        try {
            $response = Http::withToken($token)
                ->get("{$this->baseUrl}/v2/shopping/flight-offers", $params);

            if (!$response->successful()) {
                throw new Exception('Error en búsqueda de vuelos: ' . $response->body());
            }

            return $response->json();
        } catch (Exception $e) {
            throw new Exception('Error al buscar vuelos: ' . $e->getMessage());
        }
    }

    /**
     * Buscar vuelos con parámetros simplificados
     *
     * @param string $origin Código IATA del origen (ej: BOG)
     * @param string $destination Código IATA del destino (ej: MDE)
     * @param string $departureDate Fecha de salida (YYYY-MM-DD)
     * @param int $adults Número de adultos (default: 1)
     * @param string|null $returnDate Fecha de regreso opcional (YYYY-MM-DD)
     * @param string|null $currencyCode Moneda (default: COP)
     * @param int|null $max Número máximo de resultados (default: 10)
     * @return array
     */
    public function searchFlights(
        string $origin,
        string $destination,
        string $departureDate,
        int $adults = 1,
        ?string $returnDate = null,
        ?string $currencyCode = 'COP',
        ?int $max = 10
    ): array {
        $params = [
            'originLocationCode' => strtoupper($origin),
            'destinationLocationCode' => strtoupper($destination),
            'departureDate' => $departureDate,
            'adults' => $adults,
            'currencyCode' => $currencyCode,
            'max' => $max,
        ];

        if ($returnDate) {
            $params['returnDate'] = $returnDate;
        }

        return $this->searchFlightOffers($params);
    }
}
