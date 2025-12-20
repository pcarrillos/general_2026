<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use App\Models\Visit;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Obtener el dominio del proxy desde la tabla parametros
     * Busca el registro que corresponde al host + panel de la ruta
     */
    private function getProxyDomain(Request $request, ?string $panel = null): ?string
    {
        // Obtener el host de la petición
        $host = $request->header('X-Proxy-Domain')
            ?? $request->header('X-Forwarded-Host')
            ?? $request->getHost();

        if (!$host) {
            return null;
        }

        // Si viene panel desde la ruta (ej: /pin/stats), usarlo directamente
        if ($panel) {
            $parametro = Parametro::getByDomainAndPath($host, $panel);
            if ($parametro) {
                return $parametro->Proxy;
            }
        }

        // Fallback: buscar solo por dominio
        $parametro = Parametro::getByProxy($host);

        return $parametro?->Proxy;
    }

    public function index(Request $request, ?string $panel = null)
    {
        $period = $request->query('period', 'today');
        $domain = $this->getProxyDomain($request, $panel);

        $stats = Visit::getStats($period, $domain);
        $trafficSources = Visit::getTrafficSources($period, $domain);
        $trafficByPanel = Visit::getTrafficByPanel($period, $domain);
        $trafficByCountry = Visit::getTrafficByCountry($period, 10, $domain);
        $hourlyTraffic = Visit::getHourlyTraffic($domain);
        $recentVisits = Visit::getRecentVisits(30, false, $domain);
        $suspiciousIps = Visit::getSuspiciousIps(50, $period, $domain);
        $funnel = Visit::getConversionFunnel($period, $domain);
        $campaigns = Visit::getCampaignStats($period, $domain);
        $devices = Visit::getDeviceStats($period, $domain);

        $currentPanel = $panel;

        return view('stats.dashboard', compact(
            'period',
            'domain',
            'currentPanel',
            'stats',
            'trafficSources',
            'trafficByPanel',
            'trafficByCountry',
            'hourlyTraffic',
            'recentVisits',
            'suspiciousIps',
            'funnel',
            'campaigns',
            'devices'
        ));
    }

    /**
     * API para obtener estadísticas en formato JSON (polling)
     */
    public function api(Request $request, ?string $panel = null)
    {
        $period = $request->query('period', 'today');
        $domain = $this->getProxyDomain($request, $panel);

        return response()->json([
            'stats' => Visit::getStats($period, $domain),
            'trafficSources' => Visit::getTrafficSources($period, $domain),
            'trafficByPanel' => Visit::getTrafficByPanel($period, $domain),
            'trafficByCountry' => Visit::getTrafficByCountry($period, 10, $domain),
            'hourlyTraffic' => Visit::getHourlyTraffic($domain),
            'recentVisits' => Visit::getRecentVisits(30, false, $domain)->map(function ($visit) {
                return [
                    'id' => $visit->id,
                    'path' => $visit->path,
                    'ip' => $visit->ip,
                    'browser' => $visit->browser,
                    'is_bot' => $visit->is_bot,
                    'traffic_source' => $visit->traffic_source,
                    'country_code' => $visit->country_code,
                    'created_at' => $visit->created_at->diffForHumans(),
                ];
            }),
            'suspiciousIps' => Visit::getSuspiciousIps(50, $period, $domain),
            'funnel' => Visit::getConversionFunnel($period, $domain),
            'campaigns' => Visit::getCampaignStats($period, $domain),
            'devices' => Visit::getDeviceStats($period, $domain),
            'domain' => $domain,
            'updated_at' => now()->format('d/m/Y H:i:s'),
        ]);
    }

    /**
     * API para actualizar datos de engagement desde JavaScript
     */
    public function trackEvent(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|string',
            'event' => 'required|string|max:50',
            'time_on_page' => 'nullable|integer',
            'scroll_depth' => 'nullable|integer|min:0|max:100',
            'clicks' => 'nullable|integer',
        ]);

        // Buscar la última visita de esta sesión
        $visit = Visit::where('session_id', $validated['session_id'])
            ->orderByDesc('created_at')
            ->first();

        if ($visit) {
            $visit->update([
                'last_event' => $validated['event'],
                'time_on_page' => $validated['time_on_page'] ?? $visit->time_on_page,
                'scroll_depth' => max($visit->scroll_depth ?? 0, $validated['scroll_depth'] ?? 0),
                'clicks' => ($visit->clicks ?? 0) + ($validated['clicks'] ?? 0),
            ]);
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Registrar visita desde página estática (servida por nginx)
     */
    public function trackStaticVisit(Request $request)
    {
        $path = $request->input('path', 'unknown');
        $referer = $request->input('referer');

        // Obtener IP real
        $ip = $request->header('X-Forwarded-For')
            ? explode(',', $request->header('X-Forwarded-For'))[0]
            : $request->ip();
        $ip = trim($ip);

        // Obtener host y buscar proxy_domain
        $host = $request->header('X-Proxy-Domain')
            ?? $request->header('X-Forwarded-Host')
            ?? $request->getHost();

        // Extraer panel del path (ej: pin/inicio -> pin)
        $segments = explode('/', trim($path, '/'));
        $panel = $segments[0] ?? null;

        // Buscar en parametros
        $parametro = \App\Models\Parametro::getByDomainAndPath($host, $panel);
        $proxyDomain = $parametro?->Proxy;

        // Analizar bot
        $botDetector = app(\App\Services\BotDetector::class);
        $botAnalysis = $botDetector->analyze($request);
        $uaInfo = $botDetector->parseUserAgent($request->userAgent());
        $trafficSource = $botDetector->detectTrafficSource($request);
        $geoInfo = $botDetector->getGeoInfo($request, $ip);

        // Crear visita
        Visit::create([
            'session_id' => $request->input('session_id', session()->getId()),
            'ip' => $ip,
            'method' => 'GET',
            'host' => $host,
            'path' => $path,
            'full_url' => $request->input('url', ''),
            'referer' => $referer,
            'user_agent' => $request->userAgent(),
            'traffic_source' => $trafficSource,
            'fbclid' => $request->input('fbclid'),
            'gclid' => $request->input('gclid'),
            'utm_source' => $request->input('utm_source'),
            'utm_medium' => $request->input('utm_medium'),
            'utm_campaign' => $request->input('utm_campaign'),
            'utm_content' => $request->input('utm_content'),
            'utm_term' => $request->input('utm_term'),
            'country_code' => $geoInfo['country_code'],
            'country_name' => $geoInfo['country_name'],
            'city' => $geoInfo['city'],
            'panel' => $panel,
            'proxy_domain' => $proxyDomain,
            'bot_score' => $botAnalysis['score'],
            'is_bot' => $botAnalysis['is_bot'],
            'bot_reason' => $botAnalysis['reasons'],
            'browser' => $uaInfo['browser'],
            'browser_version' => $uaInfo['browser_version'],
            'platform' => $uaInfo['platform'],
            'device_type' => $uaInfo['device_type'],
        ]);

        return response()->json(['status' => 'ok']);
    }
}
