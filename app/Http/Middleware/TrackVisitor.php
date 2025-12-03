<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use App\Services\BotDetector;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function __construct(
        private BotDetector $botDetector
    ) {}

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Excluir rutas que no queremos trackear
        $path = $request->path();
        $excludedPaths = [
            'stats', // Dashboard interno
            'health',
            'up',
            'api/track', // Endpoint de tracking JS
            'favicon.ico',
            'robots.txt',
            '_debugbar',
        ];

        foreach ($excludedPaths as $excluded) {
            if (str_starts_with($path, $excluded)) {
                return $next($request);
            }
        }

        // Excluir assets estáticos
        if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|map)$/i', $path)) {
            return $next($request);
        }

        // Capturar datos de la visita
        try {
            $this->trackVisit($request);
        } catch (\Exception $e) {
            // No interrumpir la petición si falla el tracking
            \Log::warning('Error tracking visit: ' . $e->getMessage());
        }

        return $next($request);
    }

    private function trackVisit(Request $request): void
    {
        // Obtener IP real (considerando proxies)
        $ip = $this->getRealIp($request);

        // Analizar bot
        $botAnalysis = $this->botDetector->analyze($request);

        // Parsear User-Agent
        $uaInfo = $this->botDetector->parseUserAgent($request->userAgent());

        // Detectar fuente de tráfico
        $trafficSource = $this->botDetector->detectTrafficSource($request);

        // Obtener geolocalización (pasando la IP real)
        $geoInfo = $this->botDetector->getGeoInfo($request, $ip);

        // Obtener información del proxy si está disponible
        $proxyInfo = $request->input('proxy_info', []);

        // Crear registro de visita
        Visit::create([
            'session_id' => session()->getId(),
            'ip' => $ip,
            'fingerprint' => $request->header('X-Fingerprint'),
            'method' => $request->method(),
            'host' => $request->header('X-Proxy-Domain') ?? $request->getHost(),
            'path' => $request->path(),
            'full_url' => $request->fullUrl(),
            'referer' => $request->header('Referer'),
            'user_agent' => $request->userAgent(),
            'traffic_source' => $trafficSource,
            'fbclid' => $request->query('fbclid'),
            'utm_source' => $request->query('utm_source'),
            'utm_medium' => $request->query('utm_medium'),
            'utm_campaign' => $request->query('utm_campaign'),
            'utm_content' => $request->query('utm_content'),
            'utm_term' => $request->query('utm_term'),
            'country_code' => $geoInfo['country_code'],
            'country_name' => $geoInfo['country_name'],
            'city' => $geoInfo['city'],
            'panel' => $proxyInfo['panel'] ?? $this->extractPanelFromPath($request->path()),
            'proxy_domain' => $proxyInfo['domain'] ?? null,
            'bot_score' => $botAnalysis['score'],
            'is_bot' => $botAnalysis['is_bot'],
            'bot_reason' => $botAnalysis['reasons'],
            'browser' => $uaInfo['browser'],
            'browser_version' => $uaInfo['browser_version'],
            'platform' => $uaInfo['platform'],
            'device_type' => $uaInfo['device_type'],
        ]);
    }

    /**
     * Obtiene la IP real del visitante considerando proxies
     */
    private function getRealIp(Request $request): string
    {
        // Cloudflare
        if ($cf = $request->header('CF-Connecting-IP')) {
            return $cf;
        }

        // X-Real-IP (nginx)
        if ($realIp = $request->header('X-Real-IP')) {
            return $realIp;
        }

        // X-Forwarded-For (puede tener múltiples IPs)
        if ($forwarded = $request->header('X-Forwarded-For')) {
            $ips = explode(',', $forwarded);
            return trim($ips[0]);
        }

        return $request->ip();
    }

    /**
     * Extrae el panel desde la ruta
     */
    private function extractPanelFromPath(string $path): ?string
    {
        $segments = explode('/', trim($path, '/'));
        return $segments[0] ?? null;
    }
}
