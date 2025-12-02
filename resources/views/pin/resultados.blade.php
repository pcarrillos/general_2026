<!DOCTYPE html>
<html class="light" lang="es-CO">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $results['origin']['display'] ?? ucfirst($origin) }} a {{ $results['destination']['display'] ?? ucfirst($destination) }} | Pasajes de Bus</title>
    <link rel="icon" href="https://static.expresobrasilia.com/wp-content/uploads/2020/10/touch-icon-iphone.png" sizes="32x32">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec1313",
                        "background-light": "#f8f6f6",
                        "background-dark": "#221010",
                        "brand-red": "#D81921",
                        "brand-blue": "#005A9C",
                        "neutral-bg": "#F7F7F7",
                        "neutral-card": "#FFFFFF",
                        "neutral-text-primary": "#333333",
                        "neutral-text-secondary": "#757575",
                        "accent-gold": "#FFC107"
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-display bg-neutral-bg dark:bg-background-dark min-h-screen">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Top App Bar -->
        <div class="sticky top-0 z-10 flex items-center bg-brand-blue p-4 justify-between shadow-md">
            <a href="/pin/brasil" class="flex size-12 shrink-0 items-center justify-start text-white">
                <span class="material-symbols-outlined text-2xl">arrow_back_ios_new</span>
            </a>
            <h2 class="flex-1 text-center text-lg font-bold leading-tight tracking-tight text-white">
                {{ $results['origin']['display'] ?? ucfirst($origin) }} → {{ $results['destination']['display'] ?? ucfirst($destination) }}
            </h2>
            <div class="flex size-12 shrink-0 items-center"></div>
        </div>

        <!-- Search Info Bar -->
        <div class="bg-brand-blue/90 px-4 py-3 text-white text-center">
            <p class="text-sm opacity-90">{{ \Carbon\Carbon::parse($date)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }} · {{ $passengers }} {{ $passengers == 1 ? 'pasajero' : 'pasajeros' }}</p>
            @if(isset($results['count']) && $results['count'] > 0)
                <span class="inline-block mt-2 bg-white/20 px-3 py-1 rounded-full text-xs font-medium">{{ $results['count'] }} viajes disponibles</span>
            @endif
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 @container">
            <div class="max-w-3xl mx-auto space-y-4">
                @if(isset($results['trips']) && count($results['trips']) > 0)
                    @foreach($results['trips'] as $trip)
                    <!-- Result Card -->
                    <div class="flex flex-col items-stretch justify-start rounded-lg bg-neutral-card dark:bg-background-dark shadow-lg" data-company="{{ Str::slug($trip['company']) }}" data-service="{{ Str::slug($trip['service_type']) }}">
                        <div class="flex flex-col items-stretch justify-center gap-4 p-4">
                            <!-- Card Header: Logo and Service Type -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img class="h-12 w-auto" alt="PREMIUM Plus Logo" src="/pin/premium-plus-logo.jpg">
                                    <p class="text-neutral-text-secondary dark:text-neutral-300 text-base font-normal leading-normal">{{ $trip['service_type'] }}</p>
                                </div>
                            </div>

                            <!-- Pricing Section -->
                            <div class="flex flex-col items-start gap-1 border-t border-b border-neutral-bg dark:border-neutral-700 py-4">
                                <p class="text-neutral-text-primary dark:text-white text-2xl font-bold leading-tight tracking-tight">$ {{ number_format($trip['price'], 0, ',', '.') }} COP</p>
                                @if($trip['original_price'])
                                <div class="flex items-center gap-3">
                                    <p class="text-neutral-text-secondary dark:text-neutral-400 text-base font-normal leading-normal line-through">$ {{ number_format($trip['original_price'], 0, ',', '.') }} COP</p>
                                </div>
                                @endif
                            </div>

                            <!-- Itinerary Section -->
                            <div class="flex flex-col gap-3">
                                <!-- Departure ListItem -->
                                <div class="flex items-center gap-4">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-neutral-bg dark:bg-gray-700 text-neutral-text-primary dark:text-white">
                                        <span class="material-symbols-outlined text-2xl">wb_sunny</span>
                                    </div>
                                    <div class="flex flex-1 items-center justify-between">
                                        <p class="text-neutral-text-primary dark:text-white text-base font-normal leading-normal">{{ $trip['departure_time'] }}</p>
                                        <p class="text-neutral-text-primary dark:text-white text-base font-bold leading-normal text-right uppercase">{{ $trip['origin_city'] }}-{{ $trip['origin_department'] }}</p>
                                    </div>
                                </div>

                                <!-- Route line with duration -->
                                <div class="flex items-center gap-4">
                                    <div class="flex h-8 w-10 shrink-0 items-center justify-center">
                                        <div class="h-full w-px border-l-2 border-dashed border-neutral-text-secondary/50"></div>
                                    </div>
                                    <div class="flex-1 flex items-center gap-3">
                                        <span class="material-symbols-outlined text-neutral-text-secondary text-lg">schedule</span>
                                        <p class="text-neutral-text-secondary dark:text-neutral-400 text-sm font-medium leading-normal">{{ $trip['duration'] }}</p>
                                        <span class="text-neutral-text-secondary/50">•</span>
                                        <p class="text-neutral-text-secondary dark:text-neutral-400 text-sm font-normal leading-normal">{{ $trip['stops'] == 0 ? 'Directo' : $trip['stops'] . ' parada' . ($trip['stops'] > 1 ? 's' : '') }}</p>
                                    </div>
                                </div>

                                <!-- Arrival ListItem -->
                                <div class="flex items-center gap-4">
                                    <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-neutral-bg dark:bg-gray-700 text-neutral-text-primary dark:text-white">
                                        <span class="material-symbols-outlined text-2xl">location_on</span>
                                    </div>
                                    <div class="flex flex-1 items-center justify-between">
                                        <p class="text-neutral-text-primary dark:text-white text-base font-normal leading-normal">{{ $trip['arrival_time'] }}</p>
                                        <p class="text-neutral-text-primary dark:text-white text-base font-bold leading-normal text-right uppercase">{{ $trip['destination_city'] }}-{{ $trip['destination_department'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button Group -->
                        <div class="flex flex-1 gap-3 flex-wrap p-4 justify-between border-t border-neutral-bg dark:border-neutral-700">
                            <button onclick="showDetails('{{ $trip['id'] }}', '{{ $trip['service_type'] }}', '{{ $trip['bus_type'] }}', {{ json_encode($trip['amenities']) }})" class="flex min-w-[84px] flex-1 cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-brand-red text-white text-base font-bold leading-normal tracking-wide hover:bg-red-700 transition-colors">
                                <span class="truncate">Ver detalles</span>
                            </button>
                            <button onclick="selectTrip('{{ $trip['id'] }}')" class="flex min-w-[84px] flex-1 cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-transparent text-brand-blue border-2 border-brand-blue text-base font-bold leading-normal tracking-wide hover:bg-brand-blue hover:text-white transition-colors">
                                <span class="truncate">Ver sillas</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- No Results -->
                    <div class="flex flex-col items-center justify-center rounded-lg bg-neutral-card shadow-lg p-8 text-center">
                        <span class="material-symbols-outlined text-6xl text-neutral-text-secondary mb-4">search_off</span>
                        <h2 class="text-xl font-bold text-neutral-text-primary mb-2">No se encontraron viajes</h2>
                        <p class="text-neutral-text-secondary mb-6">No hay viajes disponibles para la ruta y fecha seleccionadas. Intenta con otra fecha o destino.</p>
                        <a href="/pin/brasil" class="flex cursor-pointer items-center justify-center rounded-full h-12 px-8 bg-brand-blue text-white text-base font-bold hover:bg-blue-700 transition-colors">
                            Buscar de nuevo
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-neutral-text-primary text-center p-4 mt-auto">
            <img src="/pin/banner-bajo.png" alt="Footer" class="w-full max-w-3xl mx-auto">
        </footer>
    </div>

    <!-- Modal de Detalles -->
    <div id="detailsModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-md w-full max-h-[90vh] overflow-y-auto shadow-2xl">
            <!-- Modal Header -->
            <div class="bg-brand-blue text-white p-4 rounded-t-xl flex items-center justify-between">
                <h3 class="text-lg font-bold">Detalles del Servicio</h3>
                <button onclick="closeModal()" class="text-white hover:bg-white/20 rounded-full p-1 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                <!-- Tipo de Servicio -->
                <div class="mb-4">
                    <p class="text-neutral-text-secondary text-sm mb-1">Tipo de Servicio</p>
                    <p id="modalServiceType" class="text-neutral-text-primary font-bold text-lg"></p>
                </div>
                <!-- Tipo de Bus -->
                <div class="mb-4">
                    <p class="text-neutral-text-secondary text-sm mb-1">Tipo de Bus</p>
                    <p id="modalBusType" class="text-neutral-text-primary font-medium"></p>
                </div>
                <!-- Servicios a bordo -->
                <div class="mb-4">
                    <p class="text-neutral-text-secondary text-sm mb-3">Servicios a bordo</p>
                    <div id="modalAmenities" class="grid grid-cols-2 gap-3">
                        <!-- Amenities se llenan dinámicamente -->
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="p-4 border-t border-neutral-bg">
                <button onclick="closeModal()" class="w-full flex cursor-pointer items-center justify-center rounded-full h-12 px-5 bg-brand-blue text-white text-base font-bold hover:bg-blue-700 transition-colors">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    <script>
        function selectTrip(tripId) {
            window.location.href = '/pin/reservar/' + tripId + '?passengers={{ $passengers }}';
        }

        // Iconos para cada amenidad
        const amenityIcons = {
            'wifi': { icon: 'wifi', label: 'WiFi Gratis' },
            'aire_acondicionado': { icon: 'ac_unit', label: 'Aire Acondicionado' },
            'enchufes': { icon: 'power', label: 'Enchufes USB/220V' },
            'pantalla_individual': { icon: 'personal_video', label: 'Pantalla Individual' },
            'pantalla_compartida': { icon: 'tv', label: 'Pantalla Compartida' },
            'snacks': { icon: 'restaurant', label: 'Snacks incluidos' },
            'cobija': { icon: 'bed', label: 'Cobija y Almohada' },
            'asientos_reclinables_180': { icon: 'airline_seat_flat', label: 'Asientos 180°' },
            'asientos_reclinables_140': { icon: 'airline_seat_recline_extra', label: 'Asientos 140°' },
            'asientos_reclinables_120': { icon: 'airline_seat_recline_normal', label: 'Asientos Reclinables' },
            'bano': { icon: 'wc', label: 'Baño a bordo' },
            'seguro_viaje': { icon: 'health_and_safety', label: 'Seguro de Viaje' },
        };

        function showDetails(tripId, serviceType, busType, amenities) {
            // Llenar datos del modal
            document.getElementById('modalServiceType').textContent = serviceType;
            document.getElementById('modalBusType').textContent = busType;

            // Llenar amenidades
            const amenitiesContainer = document.getElementById('modalAmenities');
            amenitiesContainer.innerHTML = '';

            amenities.forEach(amenity => {
                const amenityInfo = amenityIcons[amenity] || { icon: 'check_circle', label: amenity.replace(/_/g, ' ') };
                const amenityElement = document.createElement('div');
                amenityElement.className = 'flex items-center gap-2 bg-neutral-bg rounded-lg p-3';
                amenityElement.innerHTML = `
                    <span class="material-symbols-outlined text-brand-blue">${amenityInfo.icon}</span>
                    <span class="text-sm text-neutral-text-primary">${amenityInfo.label}</span>
                `;
                amenitiesContainer.appendChild(amenityElement);
            });

            // Mostrar modal
            const modal = document.getElementById('detailsModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('detailsModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Cerrar modal al hacer clic fuera
        document.getElementById('detailsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
