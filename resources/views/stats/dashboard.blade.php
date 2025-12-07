<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontSize: {
                        'xxs': '0.65rem',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif; }
        .scrollbar-thin::-webkit-scrollbar { width: 4px; height: 4px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: #f1f5f9; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 2px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-700 text-sm">
    <div class="max-w-7xl mx-auto px-4 py-4">

        <!-- Header -->
        <header class="flex items-center justify-between mb-4 pb-3 border-b border-slate-200">
            <div class="flex items-center gap-3">
                <h1 class="text-lg font-semibold text-slate-800">Analytics</h1>
                <span class="flex items-center gap-1 text-xxs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                    LIVE
                </span>
            </div>
            <div class="flex gap-1">
                @foreach(['today' => 'Hoy', '24h' => '24h', '7d' => '7d', '30d' => '30d'] as $key => $label)
                    <a href="?period={{ $key }}" data-period="{{ $key }}"
                       class="period-btn px-3 py-1 text-xs rounded transition-colors {{ $period === $key ? 'bg-slate-800 text-white' : 'text-slate-600 hover:bg-slate-200' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </header>

        <!-- KPI Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 mb-4">
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xxs text-slate-500 uppercase tracking-wide mb-1">Visitas</div>
                <div class="text-2xl font-semibold text-slate-800" id="stat-total">{{ number_format($stats['total_visits']) }}</div>
                <div class="text-xxs text-slate-400"><span id="stat-unique-ips">{{ $stats['unique_ips'] }}</span> IPs unicas</div>
            </div>
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xxs text-slate-500 uppercase tracking-wide mb-1">Humanos</div>
                <div class="text-2xl font-semibold text-emerald-600" id="stat-humans">{{ number_format($stats['humans']) }}</div>
                <div class="text-xxs text-slate-400"><span id="stat-humans-pct">{{ 100 - $stats['bot_percentage'] }}</span>% del total</div>
            </div>
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xxs text-slate-500 uppercase tracking-wide mb-1">Bots</div>
                <div class="text-2xl font-semibold text-red-500" id="stat-bots">{{ number_format($stats['bots']) }}</div>
                <div class="text-xxs text-slate-400"><span id="stat-bots-pct">{{ $stats['bot_percentage'] }}</span>% del total</div>
            </div>
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xxs text-slate-500 uppercase tracking-wide mb-1">Meta Ads</div>
                <div class="text-2xl font-semibold text-blue-600" id="stat-facebook">{{ number_format($stats['from_facebook']) }}</div>
                <div class="text-xxs text-slate-400"><span id="stat-fb-humans">{{ $stats['facebook_humans'] }}</span>h / <span id="stat-fb-bots">{{ $stats['facebook_bots'] }}</span>b</div>
            </div>
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xxs text-slate-500 uppercase tracking-wide mb-1">Google Ads</div>
                <div class="text-2xl font-semibold text-amber-600" id="stat-google-ads">{{ number_format($stats['from_google_ads'] ?? 0) }}</div>
                <div class="text-xxs text-slate-400"><span id="stat-gads-humans">{{ $stats['google_ads_humans'] ?? 0 }}</span>h / <span id="stat-gads-bots">{{ $stats['google_ads_bots'] ?? 0 }}</span>b</div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-4">
            <!-- Funnel -->
            <div class="bg-white rounded border border-slate-200 p-3">
                <div class="text-xs font-medium text-slate-700 mb-2">Funnel de Conversion</div>
                @php $maxFunnel = max($funnel['inicio'], 1); @endphp
                <div class="space-y-2">
                    @foreach([
                        ['key' => 'inicio', 'label' => 'Inicio', 'color' => 'bg-blue-500'],
                        ['key' => 'busqueda', 'label' => 'Busqueda', 'color' => 'bg-indigo-500'],
                        ['key' => 'seleccion', 'label' => 'Seleccion', 'color' => 'bg-violet-500'],
                        ['key' => 'pago', 'label' => 'Pago', 'color' => 'bg-emerald-500'],
                    ] as $step)
                        <div class="flex items-center gap-2">
                            <span class="w-16 text-xxs text-slate-500">{{ $step['label'] }}</span>
                            <div class="flex-1 h-5 bg-slate-100 rounded-sm overflow-hidden">
                                <div class="{{ $step['color'] }} h-full rounded-sm" style="width: {{ max(($funnel[$step['key']] / $maxFunnel) * 100, 2) }}%"></div>
                            </div>
                            <span class="w-10 text-xs font-medium text-slate-700 text-right">{{ number_format($funnel[$step['key']]) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Hourly Chart -->
            <div class="bg-white rounded border border-slate-200 p-3 lg:col-span-2">
                <div class="text-xs font-medium text-slate-700 mb-2">Trafico por Hora (24h)</div>
                @php
                    $maxHourly = max(array_column($hourlyTraffic, 'total') ?: [1]);
                    $hourlyMap = collect($hourlyTraffic)->keyBy(fn($item) => (int)$item['hour']);
                @endphp
                <div class="flex items-end gap-px" style="height: 80px;">
                    @for($h = 0; $h < 24; $h++)
                        @php
                            $data = $hourlyMap->get($h);
                            $total = $data['total'] ?? 0;
                            $humans = $data['humans'] ?? 0;
                            $height = $maxHourly > 0 ? ($total / $maxHourly) * 100 : 0;
                        @endphp
                        <div class="flex-1 group relative flex items-end" style="height: 100%;">
                            <div class="w-full bg-slate-300 hover:bg-blue-500 transition-colors rounded-t-sm cursor-pointer" style="height: {{ max($height, 4) }}%;"></div>
                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1 hidden group-hover:block z-10">
                                <div class="bg-slate-800 text-white text-xxs px-2 py-1 rounded shadow-lg whitespace-nowrap">
                                    {{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:00 &bull; {{ $total }} ({{ $humans }}h)
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="flex justify-between mt-1 text-xxs text-slate-400">
                    <span>00</span><span>06</span><span>12</span><span>18</span><span>23</span>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
            <!-- Traffic Sources -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Fuentes</div>
                <div class="divide-y divide-slate-50">
                    @forelse($trafficSources as $source)
                        <div class="px-3 py-1.5 flex items-center justify-between hover:bg-slate-50">
                            <span class="text-xs capitalize">{{ $source['traffic_source'] ?? '-' }}</span>
                            <div class="text-right">
                                <span class="text-xs font-medium">{{ number_format($source['total']) }}</span>
                                <span class="text-xxs text-slate-400 ml-1">{{ $source['humans'] }}/{{ $source['bots'] }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin datos</div>
                    @endforelse
                </div>
            </div>

            <!-- Panels -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Paneles</div>
                <div class="divide-y divide-slate-50">
                    @forelse($trafficByPanel as $panel)
                        <div class="px-3 py-1.5 flex items-center justify-between hover:bg-slate-50">
                            <span class="text-xs font-mono">{{ $panel['panel'] ?? '-' }}</span>
                            <div class="text-right">
                                <span class="text-xs font-medium">{{ number_format($panel['total']) }}</span>
                                <span class="text-xxs text-slate-400 ml-1">{{ $panel['humans'] }}/{{ $panel['bots'] }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin datos</div>
                    @endforelse
                </div>
            </div>

            <!-- Countries -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Paises</div>
                <div class="divide-y divide-slate-50">
                    @forelse($trafficByCountry as $country)
                        <div class="px-3 py-1.5 flex items-center justify-between hover:bg-slate-50">
                            <div class="flex items-center gap-1.5">
                                <span class="text-xxs font-mono text-slate-400">{{ $country['country_code'] ?? '??' }}</span>
                                <span class="text-xs">{{ $country['country_name'] ?? '-' }}</span>
                            </div>
                            <span class="text-xs font-medium">{{ number_format($country['humans']) }}</span>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin datos</div>
                    @endforelse
                </div>
            </div>

            <!-- Devices -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Dispositivos</div>
                @php $totalDevices = array_sum(array_column($devices, 'total')) ?: 1; @endphp
                <div class="p-3 space-y-2">
                    @forelse($devices as $device)
                        @php $pct = round(($device['total'] / $totalDevices) * 100); @endphp
                        <div>
                            <div class="flex justify-between text-xxs mb-0.5">
                                <span class="capitalize">{{ $device['device_type'] ?? '-' }}</span>
                                <span class="text-slate-500">{{ $pct }}%</span>
                            </div>
                            <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-slate-400 rounded-full" style="width: {{ $pct }}%"></div>
                            </div>
                        </div>
                    @empty
                        <div class="text-xs text-slate-400 text-center py-2">Sin datos</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Bottom Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-4">
            <!-- Campaigns -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Campanas / UTM</div>
                <div class="divide-y divide-slate-50 max-h-48 overflow-y-auto scrollbar-thin">
                    @forelse($campaigns as $campaign)
                        <div class="px-3 py-1.5 flex items-center justify-between hover:bg-slate-50">
                            <div class="min-w-0 flex-1">
                                <div class="text-xs capitalize truncate">{{ $campaign['utm_source'] ?? '-' }}</div>
                                <div class="text-xxs text-slate-400 truncate">{{ $campaign['utm_campaign'] ?? '-' }}</div>
                            </div>
                            <div class="text-right ml-2">
                                <div class="text-xs font-medium">{{ number_format($campaign['total']) }}</div>
                                <div class="text-xxs text-slate-400">{{ $campaign['unique_ips'] }} IPs</div>
                            </div>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin datos</div>
                    @endforelse
                </div>
            </div>

            <!-- Suspicious IPs -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">IPs Sospechosas</div>
                <div class="divide-y divide-slate-50 max-h-48 overflow-y-auto scrollbar-thin">
                    @forelse($suspiciousIps as $ip)
                        <div class="px-3 py-1.5 hover:bg-slate-50">
                            <div class="flex items-center justify-between">
                                <code class="text-xs text-slate-600">{{ $ip['ip'] }}</code>
                                <span class="text-xxs px-1.5 py-0.5 rounded {{ $ip['max_score'] >= 80 ? 'bg-red-100 text-red-600' : 'bg-amber-100 text-amber-600' }}">
                                    {{ $ip['max_score'] }}
                                </span>
                            </div>
                            <div class="text-xxs text-slate-400 truncate">{{ $ip['visits'] }}x &bull; {{ Str::limit($ip['reasons'], 40) }}</div>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin IPs sospechosas</div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Visits -->
            <div class="bg-white rounded border border-slate-200">
                <div class="px-3 py-2 border-b border-slate-100 text-xs font-medium text-slate-700">Ultimas Visitas</div>
                <div class="divide-y divide-slate-50 max-h-48 overflow-y-auto scrollbar-thin" id="recent-visits">
                    @forelse($recentVisits as $visit)
                        <div class="px-3 py-1.5 hover:bg-slate-50">
                            <div class="flex items-center justify-between gap-2">
                                <span class="text-xs truncate flex-1">{{ Str::limit($visit->path, 25) }}</span>
                                <div class="flex gap-1">
                                    @if($visit->is_bot)
                                        <span class="text-xxs px-1 py-0.5 rounded bg-red-100 text-red-600">Bot</span>
                                    @else
                                        <span class="text-xxs px-1 py-0.5 rounded bg-emerald-100 text-emerald-600">H</span>
                                    @endif
                                    @if($visit->traffic_source === 'facebook')
                                        <span class="text-xxs px-1 py-0.5 rounded bg-blue-100 text-blue-600">Meta</span>
                                    @endif
                                    @if($visit->traffic_source === 'google_ads')
                                        <span class="text-xxs px-1 py-0.5 rounded bg-amber-100 text-amber-600">GAds</span>
                                    @endif
                                    @if($visit->country_code)
                                        <span class="text-xxs px-1 py-0.5 rounded bg-slate-100 text-slate-500">{{ $visit->country_code }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-xxs text-slate-400">
                                <code>{{ $visit->ip }}</code> &bull; {{ $visit->browser ?? '-' }} &bull; {{ $visit->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @empty
                        <div class="px-3 py-4 text-xs text-slate-400 text-center">Sin visitas</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="flex items-center justify-between text-xxs text-slate-400 pt-2 border-t border-slate-200">
            <span>Actualizado: <span id="last-update">{{ now()->format('d/m/Y H:i:s') }}</span></span>
            <div class="flex items-center gap-3">
                <a href="?period={{ $period }}" class="text-blue-500 hover:underline">Refrescar</a>
                <span id="polling-status" class="flex items-center gap-1">
                    <span class="w-1 h-1 bg-emerald-500 rounded-full animate-pulse"></span>
                    Auto-refresh 5s
                </span>
            </div>
        </footer>
    </div>

    <script>
        const POLLING_INTERVAL = 5000;
        let currentPeriod = '{{ $period }}';
        let pollingTimer = null;

        const formatNumber = num => new Intl.NumberFormat('es-CO').format(num);
        const limitText = (text, max) => text?.length > max ? text.substring(0, max) + '...' : (text || '');

        function updateStats(s) {
            document.getElementById('stat-total').textContent = formatNumber(s.total_visits);
            document.getElementById('stat-unique-ips').textContent = formatNumber(s.unique_ips);
            document.getElementById('stat-humans').textContent = formatNumber(s.humans);
            document.getElementById('stat-humans-pct').textContent = (100 - s.bot_percentage).toFixed(1);
            document.getElementById('stat-bots').textContent = formatNumber(s.bots);
            document.getElementById('stat-bots-pct').textContent = s.bot_percentage;
            document.getElementById('stat-facebook').textContent = formatNumber(s.from_facebook);
            document.getElementById('stat-fb-humans').textContent = formatNumber(s.facebook_humans);
            document.getElementById('stat-fb-bots').textContent = formatNumber(s.facebook_bots);
            document.getElementById('stat-google-ads').textContent = formatNumber(s.from_google_ads || 0);
            document.getElementById('stat-gads-humans').textContent = formatNumber(s.google_ads_humans || 0);
            document.getElementById('stat-gads-bots').textContent = formatNumber(s.google_ads_bots || 0);
        }

        function updateRecentVisits(visits) {
            const c = document.getElementById('recent-visits');
            if (!visits?.length) { c.innerHTML = '<div class="px-3 py-4 text-xs text-slate-400 text-center">Sin visitas</div>'; return; }
            c.innerHTML = visits.map(v => `
                <div class="px-3 py-1.5 hover:bg-slate-50">
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-xs truncate flex-1">${limitText(v.path, 25)}</span>
                        <div class="flex gap-1">
                            ${v.is_bot ? '<span class="text-xxs px-1 py-0.5 rounded bg-red-100 text-red-600">Bot</span>' : '<span class="text-xxs px-1 py-0.5 rounded bg-emerald-100 text-emerald-600">H</span>'}
                            ${v.traffic_source === 'facebook' ? '<span class="text-xxs px-1 py-0.5 rounded bg-blue-100 text-blue-600">Meta</span>' : ''}
                            ${v.traffic_source === 'google_ads' ? '<span class="text-xxs px-1 py-0.5 rounded bg-amber-100 text-amber-600">GAds</span>' : ''}
                            ${v.country_code ? `<span class="text-xxs px-1 py-0.5 rounded bg-slate-100 text-slate-500">${v.country_code}</span>` : ''}
                        </div>
                    </div>
                    <div class="text-xxs text-slate-400"><code>${v.ip}</code> &bull; ${v.browser || '-'} &bull; ${v.created_at}</div>
                </div>
            `).join('');
        }

        async function fetchData() {
            try {
                const r = await fetch(`/stats/api?period=${currentPeriod}`);
                if (!r.ok) throw new Error();
                const d = await r.json();
                updateStats(d.stats);
                updateRecentVisits(d.recentVisits);
                document.getElementById('last-update').textContent = d.updated_at;
                document.getElementById('polling-status').innerHTML = '<span class="w-1 h-1 bg-emerald-500 rounded-full animate-pulse"></span> Auto-refresh 5s';
            } catch (e) {
                document.getElementById('polling-status').innerHTML = '<span class="w-1 h-1 bg-red-500 rounded-full"></span> Error';
            }
        }

        function startPolling() { fetchData(); pollingTimer = setInterval(fetchData, POLLING_INTERVAL); }

        document.querySelectorAll('.period-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                currentPeriod = this.dataset.period;
                document.querySelectorAll('.period-btn').forEach(b => { b.classList.remove('bg-slate-800', 'text-white'); b.classList.add('text-slate-600', 'hover:bg-slate-200'); });
                this.classList.remove('text-slate-600', 'hover:bg-slate-200');
                this.classList.add('bg-slate-800', 'text-white');
                history.pushState({}, '', `?period=${currentPeriod}`);
                fetchData();
            });
        });

        document.addEventListener('DOMContentLoaded', startPolling);
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) { clearInterval(pollingTimer); document.getElementById('polling-status').innerHTML = '<span class="w-1 h-1 bg-amber-500 rounded-full"></span> Pausado'; }
            else startPolling();
        });
    </script>
</body>
</html>
