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
}
