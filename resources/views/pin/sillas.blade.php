<!DOCTYPE html>
<html class="light" lang="es-CO">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Sillas | Pasajes de Bus</title>
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
                        "brand-red": "#D81921",
                        "brand-blue": "#005A9C",
                        "neutral-bg": "#F7F7F7",
                        "neutral-card": "#FFFFFF",
                        "neutral-text-primary": "#333333",
                        "neutral-text-secondary": "#757575",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .seat {
            width: 36px;
            height: 36px;
            border-radius: 6px 6px 10px 10px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
        }
        .seat.available {
            background: #e8f5e9;
            border: 2px solid #4caf50;
            color: #2e7d32;
        }
        .seat.available:hover {
            background: #c8e6c9;
            transform: scale(1.1);
        }
        .seat.selected {
            background: #005A9C;
            border: 2px solid #003d6b;
            color: white;
        }
        .seat.occupied {
            background: #ffebee;
            border: 2px solid #ef5350;
            color: #c62828;
            cursor: not-allowed;
        }
        .seat.disabled {
            background: #f5f5f5;
            border: 2px solid #bdbdbd;
            color: #9e9e9e;
            cursor: not-allowed;
        }
        .bus-container {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px 20px 10px 10px;
            padding: 20px;
            position: relative;
        }
        .bus-front {
            background: #dee2e6;
            height: 40px;
            border-radius: 20px 20px 0 0;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #495057;
        }
        .steering-wheel {
            width: 30px;
            height: 30px;
            border: 3px solid #495057;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body class="font-display bg-neutral-bg min-h-screen">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Top App Bar -->
        <div class="sticky top-0 z-10 flex items-center bg-brand-blue p-4 justify-between shadow-md">
            <a href="javascript:history.back()" class="flex size-12 shrink-0 items-center justify-start text-white">
                <span class="material-symbols-outlined text-2xl">arrow_back_ios_new</span>
            </a>
            <h2 class="flex-1 text-center text-lg font-bold leading-tight tracking-tight text-white">
                Seleccionar Sillas
            </h2>
            <div class="flex size-12 shrink-0 items-center"></div>
        </div>

        <!-- Trip Info -->
        <div class="bg-brand-blue/90 px-4 py-3 text-white">
            <div class="max-w-3xl mx-auto flex items-center justify-between">
                <div>
                    <p class="font-bold">{{ $trip['origin_city'] }} <span class="material-symbols-outlined text-sm align-middle">arrow_forward</span> {{ $trip['destination_city'] }}</p>
                    <p class="text-sm opacity-90">{{ $trip['departure_time'] }} - {{ $trip['arrival_time'] }} ({{ $trip['duration'] }})</p>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-90">Precio por silla</p>
                    <p class="font-bold text-lg">$ {{ number_format($trip['price'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="max-w-3xl mx-auto">
                <!-- Instructions -->
                <div class="bg-white rounded-lg shadow p-4 mb-4">
                    <p class="text-neutral-text-primary font-medium mb-2">Selecciona {{ $passengers }} silla{{ $passengers > 1 ? 's' : '' }}</p>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="seat available" style="width:24px;height:24px;font-size:9px;"></div>
                            <span class="text-neutral-text-secondary">Disponible</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="seat selected" style="width:24px;height:24px;font-size:9px;"></div>
                            <span class="text-neutral-text-secondary">Seleccionada</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="seat occupied" style="width:24px;height:24px;font-size:9px;"></div>
                            <span class="text-neutral-text-secondary">Ocupada</span>
                        </div>
                    </div>
                </div>

                <!-- Bus Layout -->
                <div class="bg-white rounded-lg shadow p-4 mb-4">
                    <div class="bus-container max-w-xs mx-auto">
                        <!-- Bus Front -->
                        <div class="bus-front">
                            <div class="steering-wheel"></div>
                            <span>CONDUCTOR</span>
                        </div>

                        <!-- Seats Grid - Bus 2G (2 pisos) -->
                        <div class="space-y-6">
                            <!-- Piso 1 -->
                            <div>
                                <p class="text-center text-xs text-neutral-text-secondary mb-2 font-medium">PISO 1</p>
                                <div class="space-y-2">
                                    @for($row = 1; $row <= 6; $row++)
                                    <div class="flex justify-center gap-2">
                                        @php
                                            $seatA = ($row - 1) * 4 + 1;
                                            $seatB = ($row - 1) * 4 + 2;
                                            $seatC = ($row - 1) * 4 + 3;
                                            $seatD = ($row - 1) * 4 + 4;
                                            $occupiedSeats = [3, 7, 12, 15, 19, 23]; // Sillas ocupadas simuladas
                                        @endphp
                                        <div class="seat {{ in_array($seatA, $occupiedSeats) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatA }}"
                                             onclick="toggleSeat(this, {{ $seatA }})">{{ $seatA }}</div>
                                        <div class="seat {{ in_array($seatB, $occupiedSeats) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatB }}"
                                             onclick="toggleSeat(this, {{ $seatB }})">{{ $seatB }}</div>
                                        <div class="w-8"></div> <!-- Pasillo -->
                                        <div class="seat {{ in_array($seatC, $occupiedSeats) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatC }}"
                                             onclick="toggleSeat(this, {{ $seatC }})">{{ $seatC }}</div>
                                        <div class="seat {{ in_array($seatD, $occupiedSeats) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatD }}"
                                             onclick="toggleSeat(this, {{ $seatD }})">{{ $seatD }}</div>
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Piso 2 -->
                            <div>
                                <p class="text-center text-xs text-neutral-text-secondary mb-2 font-medium">PISO 2</p>
                                <div class="space-y-2">
                                    @for($row = 1; $row <= 5; $row++)
                                    <div class="flex justify-center gap-2">
                                        @php
                                            $baseOffset = 24;
                                            $seatA = $baseOffset + ($row - 1) * 4 + 1;
                                            $seatB = $baseOffset + ($row - 1) * 4 + 2;
                                            $seatC = $baseOffset + ($row - 1) * 4 + 3;
                                            $seatD = $baseOffset + ($row - 1) * 4 + 4;
                                            $occupiedSeats2 = [27, 31, 35, 40]; // Sillas ocupadas simuladas piso 2
                                        @endphp
                                        <div class="seat {{ in_array($seatA, $occupiedSeats2) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatA }}"
                                             onclick="toggleSeat(this, {{ $seatA }})">{{ $seatA }}</div>
                                        <div class="seat {{ in_array($seatB, $occupiedSeats2) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatB }}"
                                             onclick="toggleSeat(this, {{ $seatB }})">{{ $seatB }}</div>
                                        <div class="w-8"></div> <!-- Pasillo -->
                                        <div class="seat {{ in_array($seatC, $occupiedSeats2) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatC }}"
                                             onclick="toggleSeat(this, {{ $seatC }})">{{ $seatC }}</div>
                                        <div class="seat {{ in_array($seatD, $occupiedSeats2) ? 'occupied' : 'available' }}"
                                             data-seat="{{ $seatD }}"
                                             onclick="toggleSeat(this, {{ $seatD }})">{{ $seatD }}</div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selection Summary -->
                <div class="bg-white rounded-lg shadow p-4 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-neutral-text-secondary">Sillas seleccionadas:</span>
                        <span id="selectedSeatsText" class="font-medium text-neutral-text-primary">Ninguna</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-neutral-text-secondary">Cantidad:</span>
                        <span id="selectedCount" class="font-medium text-neutral-text-primary">0 / {{ $passengers }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t">
                        <span class="text-neutral-text-primary font-bold">Total a pagar:</span>
                        <span id="totalPrice" class="font-bold text-xl text-brand-blue">$ 0</span>
                    </div>
                </div>

                <!-- Continue Button -->
                <button id="continueBtn"
                        onclick="continueToPay()"
                        disabled
                        class="w-full flex cursor-pointer items-center justify-center rounded-full h-14 px-5 bg-brand-blue text-white text-lg font-bold tracking-wide transition-all disabled:bg-gray-300 disabled:cursor-not-allowed hover:bg-blue-700">
                    Continuar al pago
                </button>
            </div>
        </div>
    </div>

    <script>
        const maxSeats = {{ $passengers }};
        const pricePerSeat = {{ $trip['price'] }};
        let selectedSeats = [];

        function toggleSeat(element, seatNumber) {
            if (element.classList.contains('occupied')) {
                return; // No permitir seleccionar sillas ocupadas
            }

            const index = selectedSeats.indexOf(seatNumber);

            if (index > -1) {
                // Deseleccionar
                selectedSeats.splice(index, 1);
                element.classList.remove('selected');
                element.classList.add('available');
            } else {
                // Verificar límite
                if (selectedSeats.length >= maxSeats) {
                    alert('Ya has seleccionado el máximo de ' + maxSeats + ' silla(s)');
                    return;
                }
                // Seleccionar
                selectedSeats.push(seatNumber);
                element.classList.remove('available');
                element.classList.add('selected');
            }

            updateSummary();
        }

        function updateSummary() {
            // Actualizar texto de sillas seleccionadas
            const seatsText = selectedSeats.length > 0
                ? selectedSeats.sort((a, b) => a - b).join(', ')
                : 'Ninguna';
            document.getElementById('selectedSeatsText').textContent = seatsText;

            // Actualizar contador
            document.getElementById('selectedCount').textContent = selectedSeats.length + ' / ' + maxSeats;

            // Actualizar total
            const total = selectedSeats.length * pricePerSeat;
            document.getElementById('totalPrice').textContent = '$ ' + total.toLocaleString('es-CO');

            // Habilitar/deshabilitar botón
            const continueBtn = document.getElementById('continueBtn');
            if (selectedSeats.length === maxSeats) {
                continueBtn.disabled = false;
            } else {
                continueBtn.disabled = true;
            }
        }

        function continueToPay() {
            if (selectedSeats.length !== maxSeats) {
                alert('Por favor selecciona ' + maxSeats + ' silla(s)');
                return;
            }

            // Redirigir a página de pago con las sillas seleccionadas
            const seatsParam = selectedSeats.join(',');
            window.location.href = '/pin/pago/{{ $trip['id'] }}?sillas=' + seatsParam + '&passengers={{ $passengers }}';
        }
    </script>
</body>
</html>
