<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Estadisticas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        h1 {
            font-size: 1.8rem;
            color: #f8fafc;
        }

        .period-selector {
            display: flex;
            gap: 10px;
        }

        .period-btn {
            padding: 8px 16px;
            background: #1e293b;
            border: 1px solid #334155;
            color: #94a3b8;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .period-btn:hover, .period-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .grid {
            display: grid;
            gap: 20px;
            margin-bottom: 30px;
        }

        .grid-4 {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        }

        .card {
            background: #1e293b;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #334155;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card h2 {
            font-size: 0.9rem;
            color: #94a3b8;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #f8fafc;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
        }

        .stat-change {
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .stat-change.positive { color: #22c55e; }
        .stat-change.negative { color: #ef4444; }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-green { background: #166534; color: #86efac; }
        .badge-red { background: #991b1b; color: #fca5a5; }
        .badge-blue { background: #1e40af; color: #93c5fd; }
        .badge-yellow { background: #854d0e; color: #fde047; }
        .badge-gray { background: #374151; color: #9ca3af; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #334155;
        }

        th {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        td {
            font-size: 0.9rem;
        }

        tr:hover {
            background: #334155;
        }

        .progress-bar {
            height: 8px;
            background: #334155;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s;
        }

        .progress-fill.green { background: #22c55e; }
        .progress-fill.blue { background: #3b82f6; }
        .progress-fill.red { background: #ef4444; }

        .funnel {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .funnel-step {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .funnel-label {
            width: 100px;
            font-size: 0.85rem;
            color: #94a3b8;
        }

        .funnel-bar {
            flex: 1;
            height: 30px;
            background: #334155;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .funnel-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .hourly-chart {
            display: flex;
            align-items: flex-end;
            gap: 4px;
            height: 120px;
            padding-top: 20px;
        }

        .hour-bar {
            flex: 1;
            background: #334155;
            border-radius: 3px 3px 0 0;
            position: relative;
            min-height: 4px;
            transition: all 0.2s;
        }

        .hour-bar:hover {
            background: #3b82f6;
        }

        .hour-bar .tooltip {
            display: none;
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #0f172a;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 10;
        }

        .hour-bar:hover .tooltip {
            display: block;
        }

        .ip-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .ip-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #334155;
        }

        .ip-item:last-child {
            border-bottom: none;
        }

        .ip-address {
            font-family: monospace;
            color: #f8fafc;
        }

        .score-bar {
            width: 60px;
            height: 6px;
            background: #334155;
            border-radius: 3px;
            overflow: hidden;
        }

        .score-fill {
            height: 100%;
            border-radius: 3px;
        }

        .visits-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .visit-item {
            padding: 12px 0;
            border-bottom: 1px solid #334155;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 10px;
        }

        .visit-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .visit-path {
            color: #f8fafc;
            font-size: 0.9rem;
        }

        .visit-meta {
            font-size: 0.8rem;
            color: #64748b;
        }

        .visit-badges {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }

        @media (max-width: 768px) {
            .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div style="display: flex; align-items: center; gap: 15px;">
                <h1>Dashboard de Estadisticas</h1>
                <span id="live-indicator" style="display: flex; align-items: center; gap: 5px; font-size: 0.8rem; color: #22c55e;">
                    <span style="width: 8px; height: 8px; background: #22c55e; border-radius: 50%; animation: pulse 2s infinite;"></span>
                    EN VIVO
                </span>
            </div>
            <div class="period-selector">
                <a href="?period=today" class="period-btn {{ $period === 'today' ? 'active' : '' }}" data-period="today">Hoy</a>
                <a href="?period=24h" class="period-btn {{ $period === '24h' ? 'active' : '' }}" data-period="24h">24h</a>
                <a href="?period=7d" class="period-btn {{ $period === '7d' ? 'active' : '' }}" data-period="7d">7 dias</a>
                <a href="?period=30d" class="period-btn {{ $period === '30d' ? 'active' : '' }}" data-period="30d">30 dias</a>
            </div>
        </header>

        <!-- Resumen General -->
        <div class="grid grid-4">
            <div class="card">
                <h2>Visitas Totales</h2>
                <div class="stat-number" id="stat-total">{{ number_format($stats['total_visits']) }}</div>
                <div class="stat-label"><span id="stat-unique-ips">{{ $stats['unique_ips'] }}</span> IPs unicas</div>
            </div>

            <div class="card">
                <h2>Usuarios Reales</h2>
                <div class="stat-number" style="color: #22c55e;" id="stat-humans">{{ number_format($stats['humans']) }}</div>
                <div class="stat-label"><span id="stat-humans-pct">{{ 100 - $stats['bot_percentage'] }}</span>% del trafico</div>
            </div>

            <div class="card">
                <h2>Bots Detectados</h2>
                <div class="stat-number" style="color: #ef4444;" id="stat-bots">{{ number_format($stats['bots']) }}</div>
                <div class="stat-label"><span id="stat-bots-pct">{{ $stats['bot_percentage'] }}</span>% del trafico</div>
            </div>

            <div class="card">
                <h2>Desde Facebook</h2>
                <div class="stat-number" style="color: #3b82f6;" id="stat-facebook">{{ number_format($stats['from_facebook']) }}</div>
                <div class="stat-label"><span id="stat-fb-humans">{{ $stats['facebook_humans'] }}</span> humanos / <span id="stat-fb-bots">{{ $stats['facebook_bots'] }}</span> bots</div>
            </div>
        </div>

        <!-- Funnel y Trafico por hora -->
        <div class="grid grid-2">
            <div class="card">
                <h2>Funnel de Conversion (Solo Humanos)</h2>
                <div class="funnel">
                    @php
                        $maxFunnel = max($funnel['inicio'], 1);
                    @endphp
                    <div class="funnel-step">
                        <span class="funnel-label">Inicio</span>
                        <div class="funnel-bar">
                            <div class="funnel-fill" style="width: {{ ($funnel['inicio'] / $maxFunnel) * 100 }}%">
                                {{ number_format($funnel['inicio']) }}
                            </div>
                        </div>
                    </div>
                    <div class="funnel-step">
                        <span class="funnel-label">Busqueda</span>
                        <div class="funnel-bar">
                            <div class="funnel-fill" style="width: {{ ($funnel['busqueda'] / $maxFunnel) * 100 }}%">
                                {{ number_format($funnel['busqueda']) }}
                            </div>
                        </div>
                    </div>
                    <div class="funnel-step">
                        <span class="funnel-label">Seleccion</span>
                        <div class="funnel-bar">
                            <div class="funnel-fill" style="width: {{ ($funnel['seleccion'] / $maxFunnel) * 100 }}%">
                                {{ number_format($funnel['seleccion']) }}
                            </div>
                        </div>
                    </div>
                    <div class="funnel-step">
                        <span class="funnel-label">Pago</span>
                        <div class="funnel-bar">
                            <div class="funnel-fill" style="width: {{ ($funnel['pago'] / $maxFunnel) * 100 }}%">
                                {{ number_format($funnel['pago']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2>Trafico por Hora (Ultimas 24h)</h2>
                @php
                    $maxHourly = max(array_column($hourlyTraffic, 'total') ?: [1]);
                @endphp
                <div class="hourly-chart">
                    @for($h = 0; $h < 24; $h++)
                        @php
                            $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                            $data = collect($hourlyTraffic)->firstWhere('hour', $hour);
                            $total = $data['total'] ?? 0;
                            $humans = $data['humans'] ?? 0;
                            $height = $maxHourly > 0 ? ($total / $maxHourly) * 100 : 0;
                        @endphp
                        <div class="hour-bar" style="height: {{ max($height, 4) }}%">
                            <div class="tooltip">{{ $hour }}:00 - {{ $total }} visitas ({{ $humans }} humanos)</div>
                        </div>
                    @endfor
                </div>
                <div style="display: flex; justify-content: space-between; margin-top: 10px; font-size: 0.75rem; color: #64748b;">
                    <span>00:00</span>
                    <span>06:00</span>
                    <span>12:00</span>
                    <span>18:00</span>
                    <span>23:00</span>
                </div>
            </div>
        </div>

        <!-- Fuentes y Paneles -->
        <div class="grid grid-3">
            <div class="card">
                <h2>Fuentes de Trafico</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Fuente</th>
                            <th>Total</th>
                            <th>Humanos</th>
                            <th>Bots</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trafficSources as $source)
                            <tr>
                                <td>
                                    @switch($source['traffic_source'])
                                        @case('facebook')
                                            <span class="badge badge-blue">Facebook</span>
                                            @break
                                        @case('google')
                                            <span class="badge badge-green">Google</span>
                                            @break
                                        @case('direct')
                                            <span class="badge badge-gray">Directo</span>
                                            @break
                                        @case('internal')
                                            <span class="badge badge-yellow">Interno</span>
                                            @break
                                        @default
                                            <span class="badge badge-gray">{{ $source['traffic_source'] ?? 'Desconocido' }}</span>
                                    @endswitch
                                </td>
                                <td>{{ number_format($source['total']) }}</td>
                                <td style="color: #22c55e;">{{ number_format($source['humans']) }}</td>
                                <td style="color: #ef4444;">{{ number_format($source['bots']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">Sin datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>Trafico por Panel</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Panel</th>
                            <th>Total</th>
                            <th>Humanos</th>
                            <th>Bots</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trafficByPanel as $panel)
                            <tr>
                                <td><strong>{{ $panel['panel'] }}</strong></td>
                                <td>{{ number_format($panel['total']) }}</td>
                                <td style="color: #22c55e;">{{ number_format($panel['humans']) }}</td>
                                <td style="color: #ef4444;">{{ number_format($panel['bots']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">Sin datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card">
                <h2>Paises (Solo Humanos)</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Pais</th>
                            <th>Visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trafficByCountry as $country)
                            <tr>
                                <td>
                                    {{ $country['country_code'] ? $country['country_name'] ?? $country['country_code'] : 'Desconocido' }}
                                </td>
                                <td>{{ number_format($country['humans']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="empty-state">Sin datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dispositivos y Campañas -->
        <div class="grid grid-2">
            <div class="card">
                <h2>Dispositivos (Solo Humanos)</h2>
                @php
                    $totalDevices = array_sum(array_column($devices, 'total')) ?: 1;
                @endphp
                @forelse($devices as $device)
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <span>{{ ucfirst($device['device_type'] ?? 'Desconocido') }}</span>
                            <span>{{ number_format($device['total']) }} ({{ round(($device['total'] / $totalDevices) * 100) }}%)</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill blue" style="width: {{ ($device['total'] / $totalDevices) * 100 }}%"></div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">Sin datos de dispositivos</div>
                @endforelse
            </div>

            <div class="card">
                <h2>Campañas UTM</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Fuente / Campaña</th>
                            <th>Visitas</th>
                            <th>IPs Unicas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($campaigns as $campaign)
                            <tr>
                                <td>
                                    <div>{{ $campaign['utm_source'] }}</div>
                                    <div style="font-size: 0.75rem; color: #64748b;">{{ Str::limit($campaign['utm_campaign'], 30) }}</div>
                                </td>
                                <td>{{ number_format($campaign['total']) }}</td>
                                <td>{{ number_format($campaign['unique_ips']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-state">Sin campañas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- IPs Sospechosas y Visitas Recientes -->
        <div class="grid grid-2">
            <div class="card">
                <h2>IPs Sospechosas (Bot Score >= 50)</h2>
                <div class="ip-list">
                    @forelse($suspiciousIps as $ip)
                        <div class="ip-item">
                            <div>
                                <div class="ip-address">{{ $ip['ip'] }}</div>
                                <div style="font-size: 0.75rem; color: #64748b;">
                                    {{ $ip['visits'] }} visitas - {{ Str::limit($ip['reasons'], 50) }}
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <div class="badge {{ $ip['max_score'] >= 80 ? 'badge-red' : 'badge-yellow' }}">
                                    Score: {{ $ip['max_score'] }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">No hay IPs sospechosas</div>
                    @endforelse
                </div>
            </div>

            <div class="card">
                <h2>Ultimas Visitas</h2>
                <div class="visits-list" id="recent-visits">
                    @forelse($recentVisits as $visit)
                        <div class="visit-item">
                            <div class="visit-info">
                                <div class="visit-path">{{ Str::limit($visit->path, 40) }}</div>
                                <div class="visit-meta">
                                    {{ $visit->ip }} | {{ $visit->browser }} | {{ $visit->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="visit-badges">
                                @if($visit->is_bot)
                                    <span class="badge badge-red">Bot</span>
                                @else
                                    <span class="badge badge-green">Humano</span>
                                @endif
                                @if($visit->traffic_source === 'facebook')
                                    <span class="badge badge-blue">FB</span>
                                @endif
                                @if($visit->country_code)
                                    <span class="badge badge-gray">{{ $visit->country_code }}</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Sin visitas recientes</div>
                    @endforelse
                </div>
            </div>
        </div>

        <footer style="text-align: center; padding: 30px; color: #64748b; font-size: 0.85rem;">
            Actualizado: <span id="last-update">{{ now()->format('d/m/Y H:i:s') }}</span> |
            <a href="?period={{ $period }}" style="color: #3b82f6;">Refrescar</a> |
            <span id="polling-status">Actualizando cada 5s</span>
        </footer>
    </div>

    <script>
        // Configuracion
        const POLLING_INTERVAL = 5000; // 5 segundos
        let currentPeriod = '{{ $period }}';
        let pollingTimer = null;

        // Formatear numeros
        function formatNumber(num) {
            return new Intl.NumberFormat('es-CO').format(num);
        }

        // Limitar texto
        function limitText(text, max) {
            if (!text) return '';
            return text.length > max ? text.substring(0, max) + '...' : text;
        }

        // Actualizar estadisticas principales
        function updateStats(stats) {
            document.getElementById('stat-total').textContent = formatNumber(stats.total_visits);
            document.getElementById('stat-unique-ips').textContent = formatNumber(stats.unique_ips);
            document.getElementById('stat-humans').textContent = formatNumber(stats.humans);
            document.getElementById('stat-humans-pct').textContent = (100 - stats.bot_percentage).toFixed(1);
            document.getElementById('stat-bots').textContent = formatNumber(stats.bots);
            document.getElementById('stat-bots-pct').textContent = stats.bot_percentage;
            document.getElementById('stat-facebook').textContent = formatNumber(stats.from_facebook);
            document.getElementById('stat-fb-humans').textContent = formatNumber(stats.facebook_humans);
            document.getElementById('stat-fb-bots').textContent = formatNumber(stats.facebook_bots);
        }

        // Actualizar lista de visitas recientes
        function updateRecentVisits(visits) {
            const container = document.getElementById('recent-visits');
            if (!visits || visits.length === 0) {
                container.innerHTML = '<div class="empty-state">Sin visitas recientes</div>';
                return;
            }

            container.innerHTML = visits.map(visit => `
                <div class="visit-item">
                    <div class="visit-info">
                        <div class="visit-path">${limitText(visit.path, 40)}</div>
                        <div class="visit-meta">
                            ${visit.ip} | ${visit.browser || 'Desconocido'} | ${visit.created_at}
                        </div>
                    </div>
                    <div class="visit-badges">
                        ${visit.is_bot
                            ? '<span class="badge badge-red">Bot</span>'
                            : '<span class="badge badge-green">Humano</span>'}
                        ${visit.traffic_source === 'facebook'
                            ? '<span class="badge badge-blue">FB</span>'
                            : ''}
                        ${visit.country_code
                            ? `<span class="badge badge-gray">${visit.country_code}</span>`
                            : ''}
                    </div>
                </div>
            `).join('');
        }

        // Obtener datos del API
        async function fetchData() {
            try {
                const response = await fetch(`/stats/api?period=${currentPeriod}`);
                if (!response.ok) throw new Error('Error en la respuesta');

                const data = await response.json();

                // Actualizar elementos
                updateStats(data.stats);
                updateRecentVisits(data.recentVisits);

                // Actualizar timestamp
                document.getElementById('last-update').textContent = data.updated_at;
                document.getElementById('polling-status').textContent = 'Actualizando cada 5s';
                document.getElementById('polling-status').style.color = '#64748b';

            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('polling-status').textContent = 'Error de conexion';
                document.getElementById('polling-status').style.color = '#ef4444';
            }
        }

        // Iniciar polling
        function startPolling() {
            fetchData(); // Primera carga inmediata
            pollingTimer = setInterval(fetchData, POLLING_INTERVAL);
        }

        // Manejar cambio de periodo sin recargar
        document.querySelectorAll('.period-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // Actualizar periodo
                currentPeriod = this.dataset.period;

                // Actualizar clases
                document.querySelectorAll('.period-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Actualizar URL sin recargar
                history.pushState({}, '', `?period=${currentPeriod}`);

                // Obtener datos inmediatamente
                fetchData();
            });
        });

        // Iniciar cuando cargue la pagina
        document.addEventListener('DOMContentLoaded', startPolling);

        // Pausar polling cuando la ventana no esta visible
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                clearInterval(pollingTimer);
                document.getElementById('polling-status').textContent = 'Pausado';
            } else {
                startPolling();
            }
        });
    </script>
</body>
</html>
