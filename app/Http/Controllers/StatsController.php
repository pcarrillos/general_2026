<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->query('period', 'today');

        $stats = Visit::getStats($period);
        $trafficSources = Visit::getTrafficSources($period);
        $trafficByPanel = Visit::getTrafficByPanel($period);
        $trafficByCountry = Visit::getTrafficByCountry($period);
        $hourlyTraffic = Visit::getHourlyTraffic();
        $recentVisits = Visit::getRecentVisits(30);
        $suspiciousIps = Visit::getSuspiciousIps(50, $period);
        $funnel = Visit::getConversionFunnel($period);
        $campaigns = Visit::getCampaignStats($period);
        $devices = Visit::getDeviceStats($period);

        return view('stats.dashboard', compact(
            'period',
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
    public function api(Request $request)
    {
        $period = $request->query('period', 'today');

        return response()->json([
            'stats' => Visit::getStats($period),
            'trafficSources' => Visit::getTrafficSources($period),
            'trafficByPanel' => Visit::getTrafficByPanel($period),
            'trafficByCountry' => Visit::getTrafficByCountry($period),
            'hourlyTraffic' => Visit::getHourlyTraffic(),
            'recentVisits' => Visit::getRecentVisits(30)->map(function ($visit) {
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
            'suspiciousIps' => Visit::getSuspiciousIps(50, $period),
            'funnel' => Visit::getConversionFunnel($period),
            'campaigns' => Visit::getCampaignStats($period),
            'devices' => Visit::getDeviceStats($period),
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
