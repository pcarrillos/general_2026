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
            'gclid' => $request->query('gclid'),
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
     *
     * Orden de prioridad:
     * 1. X-Forwarded-For (primera IP = IP real del usuario)
     * 2. CF-Connecting-IP (Cloudflare, pero puede tener IP del proxy intermedio)
     * 3. X-Real-IP
     * 4. request->ip() como fallback
     */
    private function getRealIp(Request $request): string
    {
        // X-Forwarded-For tiene la cadena completa de IPs
        // La primera IP es la del usuario real
        if ($forwarded = $request->header('X-Forwarded-For')) {
            $ips = explode(',', $forwarded);
            $realIp = trim($ips[0]);

            // Validar que sea una IP pública válida
            if (filter_var($realIp, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $realIp;
            }
        }

        // CF-Connecting-IP de Cloudflare (puede tener IP del proxy Render)
        if ($cf = $request->header('CF-Connecting-IP')) {
            // Verificar que no sea una IP de Render (74.220.x.x)
            if (!str_starts_with($cf, '74.220.')) {
                return $cf;
            }
        }

        // X-Real-IP (nginx)
        if ($realIp = $request->header('X-Real-IP')) {
            if (!str_starts_with($realIp, '74.220.') && !str_starts_with($realIp, '104.')) {
                return $realIp;
            }
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
