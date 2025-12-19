<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visit extends Model
{
    protected $fillable = [
        'session_id',
        'ip',
        'fingerprint',
        'method',
        'host',
        'path',
        'full_url',
        'referer',
        'user_agent',
        'traffic_source',
        'fbclid',
        'gclid',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'utm_term',
        'country_code',
        'country_name',
        'city',
        'panel',
        'proxy_domain',
        'bot_score',
        'is_bot',
        'bot_reason',
        'browser',
        'browser_version',
        'platform',
        'device_type',
        'time_on_page',
        'scroll_depth',
        'clicks',
        'last_event',
    ];

    protected $casts = [
        'is_bot' => 'boolean',
        'bot_score' => 'integer',
        'time_on_page' => 'integer',
        'scroll_depth' => 'integer',
        'clicks' => 'integer',
    ];

    // ==================== SCOPES ====================

    public function scopeHumans($query)
    {
        return $query->where('is_bot', false);
    }

    public function scopeBots($query)
    {
        return $query->where('is_bot', true);
    }

    public function scopeFromFacebook($query)
    {
        return $query->where('traffic_source', 'facebook');
    }

    public function scopeFromGoogleAds($query)
    {
        return $query->where('traffic_source', 'google_ads');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeLastHours($query, int $hours)
    {
        return $query->where('created_at', '>=', now()->subHours($hours));
    }

    public function scopeLastDays($query, int $days)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function scopeByPanel($query, string $panel)
    {
        return $query->where('panel', $panel);
    }

    public function scopeByProxyDomain($query, ?string $domain)
    {
        if ($domain) {
            return $query->where('proxy_domain', $domain);
        }
        return $query;
    }

    // ==================== ESTADÍSTICAS ====================

    /**
     * Resumen general de estadísticas
     */
    public static function getStats(string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain);

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        $total = $query->count();
        $bots = (clone $query)->bots()->count();
        $humans = $total - $bots;
        $uniqueIps = (clone $query)->distinct('ip')->count('ip');
        $fromFacebook = (clone $query)->fromFacebook()->count();
        $facebookHumans = (clone $query)->fromFacebook()->humans()->count();
        $fromGoogleAds = (clone $query)->fromGoogleAds()->count();
        $googleAdsHumans = (clone $query)->fromGoogleAds()->humans()->count();

        return [
            'total_visits' => $total,
            'humans' => $humans,
            'bots' => $bots,
            'bot_percentage' => $total > 0 ? round(($bots / $total) * 100, 1) : 0,
            'unique_ips' => $uniqueIps,
            'from_facebook' => $fromFacebook,
            'facebook_humans' => $facebookHumans,
            'facebook_bots' => $fromFacebook - $facebookHumans,
            'from_google_ads' => $fromGoogleAds,
            'google_ads_humans' => $googleAdsHumans,
            'google_ads_bots' => $fromGoogleAds - $googleAdsHumans,
        ];
    }

    /**
     * Tráfico por fuente
     */
    public static function getTrafficSources(string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain);

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        return $query->select('traffic_source', DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'), DB::raw('SUM(CASE WHEN is_bot = 1 THEN 1 ELSE 0 END) as bots'))
            ->groupBy('traffic_source')
            ->orderByDesc('total')
            ->get()
            ->toArray();
    }

    /**
     * Tráfico por panel
     */
    public static function getTrafficByPanel(string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain);

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        return $query->select('panel', DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'), DB::raw('SUM(CASE WHEN is_bot = 1 THEN 1 ELSE 0 END) as bots'))
            ->whereNotNull('panel')
            ->groupBy('panel')
            ->orderByDesc('total')
            ->get()
            ->toArray();
    }

    /**
     * Tráfico por país
     */
    public static function getTrafficByCountry(string $period = 'today', int $limit = 10, ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain);

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        return $query->select('country_code', 'country_name', DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'))
            ->whereNotNull('country_code')
            ->groupBy('country_code', 'country_name')
            ->orderByDesc('total')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    /**
     * Tráfico por hora (últimas 24h)
     */
    public static function getHourlyTraffic(?string $domain = null): array
    {
        return self::query()->byProxyDomain($domain)
            ->select(DB::raw("strftime('%H', created_at) as hour"), DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'), DB::raw('SUM(CASE WHEN is_bot = 1 THEN 1 ELSE 0 END) as bots'))
            ->lastHours(24)
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->toArray();
    }

    /**
     * Últimas visitas
     */
    public static function getRecentVisits(int $limit = 50, bool $onlyHumans = false, ?string $domain = null): \Illuminate\Database\Eloquent\Collection
    {
        $query = self::query()->byProxyDomain($domain)->orderByDesc('created_at')->limit($limit);

        if ($onlyHumans) {
            $query->humans();
        }

        return $query->get();
    }

    /**
     * IPs sospechosas (alto bot_score)
     */
    public static function getSuspiciousIps(int $minScore = 50, string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain)->where('bot_score', '>=', $minScore);

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
        }

        return $query->select('ip', DB::raw('COUNT(*) as visits'), DB::raw('MAX(bot_score) as max_score'), DB::raw('GROUP_CONCAT(DISTINCT bot_reason) as reasons'))
            ->groupBy('ip')
            ->orderByDesc('max_score')
            ->limit(20)
            ->get()
            ->toArray();
    }

    /**
     * Funnel de conversión
     */
    public static function getConversionFunnel(string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain)->humans();

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        $total = (clone $query)->count();
        $inicio = (clone $query)->where('path', 'LIKE', '%/inicio%')->count();
        $busqueda = (clone $query)->where(function ($q) {
            $q->where('path', 'LIKE', '%/api/viajes%')
                ->orWhere('last_event', 'search');
        })->count();
        $seleccion = (clone $query)->where(function ($q) {
            $q->where('path', 'LIKE', '%/reservar%')
                ->orWhere('last_event', 'select_seat');
        })->count();
        $pago = (clone $query)->where(function ($q) {
            $q->where('path', 'LIKE', '%/pago%')
                ->orWhere('last_event', 'payment');
        })->count();

        return [
            'total' => $total,
            'inicio' => $inicio,
            'busqueda' => $busqueda,
            'seleccion' => $seleccion,
            'pago' => $pago,
        ];
    }

    /**
     * Campañas y fuentes de tráfico
     * Incluye UTM campaigns y tráfico de Facebook (fbclid)
     */
    public static function getCampaignStats(string $period = 'today', ?string $domain = null): array
    {
        // Primero obtenemos campañas UTM
        $queryUtm = self::query()->byProxyDomain($domain)->whereNotNull('utm_campaign');

        switch ($period) {
            case 'today':
                $queryUtm->today();
                break;
            case '24h':
                $queryUtm->lastHours(24);
                break;
            case '7d':
                $queryUtm->lastDays(7);
                break;
            case '30d':
                $queryUtm->lastDays(30);
                break;
        }

        $utmCampaigns = $queryUtm->select(
            'utm_source',
            'utm_campaign',
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'),
            DB::raw('COUNT(DISTINCT ip) as unique_ips')
        )
            ->groupBy('utm_source', 'utm_campaign')
            ->orderByDesc('total')
            ->limit(10)
            ->get()
            ->toArray();

        // También obtenemos tráfico por fuente (Facebook, Google, etc.)
        $querySource = self::query()->byProxyDomain($domain)->whereNotNull('traffic_source')
            ->where('traffic_source', '!=', 'internal')
            ->where('traffic_source', '!=', 'direct');

        switch ($period) {
            case 'today':
                $querySource->today();
                break;
            case '24h':
                $querySource->lastHours(24);
                break;
            case '7d':
                $querySource->lastDays(7);
                break;
            case '30d':
                $querySource->lastDays(30);
                break;
        }

        $sourceCampaigns = $querySource->select(
            'traffic_source as utm_source',
            DB::raw("'(tráfico orgánico)' as utm_campaign"),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN is_bot = 0 THEN 1 ELSE 0 END) as humans'),
            DB::raw('COUNT(DISTINCT ip) as unique_ips')
        )
            ->groupBy('traffic_source')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->toArray();

        // Combinar y ordenar por total
        $all = array_merge($utmCampaigns, $sourceCampaigns);
        usort($all, fn($a, $b) => $b['total'] - $a['total']);

        return array_slice($all, 0, 10);
    }

    /**
     * Dispositivos
     */
    public static function getDeviceStats(string $period = 'today', ?string $domain = null): array
    {
        $query = self::query()->byProxyDomain($domain)->humans();

        switch ($period) {
            case 'today':
                $query->today();
                break;
            case '24h':
                $query->lastHours(24);
                break;
            case '7d':
                $query->lastDays(7);
                break;
            case '30d':
                $query->lastDays(30);
                break;
        }

        return $query->select('device_type', DB::raw('COUNT(*) as total'))
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get()
            ->toArray();
    }
}
