<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Cambio de Vuelo</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'Red Hat Display';
            src: url('/cambiovuelo/red-hat.woff2') format('woff2');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        body {
            font-family: 'Red Hat Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .section-separator {
            margin: 3rem 0;
            border-top: 3px solid #e5e7eb;
            padding-top: 1rem;
        }
        .section-separator::before {
            content: attr(data-section);
            display: block;
            text-align: center;
            font-size: 0.875rem;
            font-weight: 600;
            color: #6b7280;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast-notification {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 16px 20px;
            margin-bottom: 10px;
            min-width: 300px;
            max-width: 400px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            border-left: 4px solid #3b82f6;
        }

        .toast-notification.success {
            border-left-color: #10b981;
        }

        .toast-notification.error {
            border-left-color: #ef4444;
        }

        .toast-notification.warning {
            border-left-color: #f59e0b;
        }

        .toast-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #1f2937;
        }

        .toast-message {
            font-size: 13px;
            color: #6b7280;
        }

        .toast-close {
            background: none;
            border: none;
            font-size: 20px;
            color: #9ca3af;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-close:hover {
            color: #4b5563;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        .toast-notification.hiding {
            animation: slideOut 0.3s ease-in forwards;
        }

        @media (max-width: 640px) {
            .toast-container {
                left: 10px;
                right: 10px;
                top: 10px;
            }

            .toast-notification {
                min-width: auto;
                max-width: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
<x-lab-banner />
    <!-- Toast Container -->
    <div class="toast-container" id="toast-container"></div>

    <!-- PANTALLA DE CARGA -->
    <section id="pantalla-carga" class="min-h-screen bg-white flex items-center justify-center" style="display: none;">
        <div class="text-center">
            <img src="/cambiovuelo/plane-loader.gif" alt="Cargando..." class="w-40 h-40 mx-auto mb-6">
            <p class="text-xl text-gray-700 font-medium">Ingresando al módulo de gestión de reservas</p>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 1: Gestiona tu Reserva"></div>

    <!-- SECCIÓN 1: GESTIONA TU RESERVA -->
    <section id="seccion-reserva" class="min-h-screen bg-white">
        <!-- Header rojo -->
        <div style="background-color: #EC0000;" class="h-1"></div>

        <div class="px-6 py-8">
            <!-- Título principal -->
            <h1 class="text-4xl font-bold text-gray-900 text-center mb-4">Gestiona tu reserva</h1>

            <!-- Subtítulo -->
            <p class="text-center text-gray-700 text-lg mb-5">Añade equipaje, elige tu asiento, modifica tu vuelo y mucho más.</p>

            <!-- Instrucción -->
            <p class="text-center text-gray-900 font-medium mb-5">Ingresa tu código de reserva y apellido.</p>

            <!-- Formulario -->
            <div class="space-y-6">
                <!-- Campo Código de reserva -->
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 6h-3V4c0-1.11-.89-2-2-2H9c-1.11 0-2 .89-2 2v2H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zM9 4h6v2H9V4zm11 16H4V8h16v12z"/>
                                <circle cx="12" cy="14" r="2"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="codigoReserva"
                            placeholder="Código de reserva"
                            class="w-full pl-14 pr-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            oninput="this.value = this.value.toUpperCase()"
                        >
                    </div>
                    <p class="text-sm text-gray-700 mt-2 ml-1">Debe ser alfanumérico (ejemplo: AAA000)</p>
                </div>

                <!-- Campo Apellido(s) -->
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="apellido"
                            placeholder="Apellido(s)"
                            class="w-full pl-14 pr-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            oninput="this.value = this.value.toUpperCase()"
                        >
                    </div>
                    <p class="text-sm text-gray-700 mt-2 ml-1">Ingresa tu(s) apellido(s), tal como aparecen en tu reserva</p>
                </div>
            </div>

            <!-- Botones -->
            <div class="space-y-4 mt-12">
                <button onclick="validarYContinuar()" class="w-full bg-gray-900 text-white py-4 rounded-full text-lg font-medium hover:bg-gray-800 transition-colors">
                    Gestionar reserva
                </button>

                <button onclick="window.location.href='/cambiovuelo/inicio'" class="w-full bg-white text-gray-900 py-4 rounded-full text-lg font-medium border-2 border-gray-900 hover:bg-gray-50 transition-colors">
                    Volver al inicio
                </button>
            </div>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 2: Pasajeros"></div>

    <!-- SECCIÓN 2: PASAJEROS -->
    <section id="seccion-pasajeros" class="min-h-screen bg-white">
        <!-- Header negro -->
        <div class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between">
            <button class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 class="text-xl font-medium">Pasajeros</h2>
            <button class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 py-6">
            <!-- Campo resumen con borde verde -->
            <div class="mb-8">
                <div class="relative border-2 border-green-500 rounded-lg px-4 py-4">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <div class="pl-10 text-2xl font-medium text-gray-900">1</div>
                </div>
            </div>

            <!-- Mensaje informativo importante -->
            <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-lg px-4 py-4">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-yellow-900 mb-1">Importante</p>
                        <p class="text-sm text-yellow-800">Debes seleccionar los mismos pasajeros que aparecen registrados en tu reserva inicial. De no hacerse así, se tomará como una nueva reserva y se te cobrará el total de la nueva reserva.</p>
                    </div>
                </div>
            </div>

            <!-- Lista de tipos de pasajeros -->
            <div class="space-y-6">
                <!-- Adultos -->
                <div class="flex items-center justify-between py-2">
                    <div>
                        <div class="text-xl font-medium text-gray-900">Adultos</div>
                        <div class="text-base text-gray-500">Desde 15 años</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="w-10 h-10 rounded-full border-2 border-gray-400 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <div class="text-2xl font-medium text-gray-900 w-8 text-center">1</div>
                        <button class="w-10 h-10 rounded-full border-2 border-gray-900 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Jóvenes -->
                <div class="flex items-center justify-between py-2">
                    <div>
                        <div class="text-xl font-medium text-gray-900">Jóvenes</div>
                        <div class="text-base text-gray-500">De 12 a 14 años</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="w-10 h-10 rounded-full border-2 border-gray-400 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <div class="text-2xl font-medium text-gray-900 w-8 text-center">0</div>
                        <button class="w-10 h-10 rounded-full border-2 border-gray-900 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Niños -->
                <div class="flex items-center justify-between py-2">
                    <div>
                        <div class="text-xl font-medium text-gray-900">Niños</div>
                        <div class="text-base text-gray-500">De 2 a 11 años</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="w-10 h-10 rounded-full border-2 border-gray-400 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <div class="text-2xl font-medium text-gray-900 w-8 text-center">0</div>
                        <button class="w-10 h-10 rounded-full border-2 border-gray-900 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Bebés -->
                <div class="flex items-center justify-between py-2">
                    <div>
                        <div class="text-xl font-medium text-gray-900">Bebés</div>
                        <div class="text-base text-gray-500">Menores de 2 años</div>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="w-10 h-10 rounded-full border-2 border-gray-400 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <div class="text-2xl font-medium text-gray-900 w-8 text-center">0</div>
                        <button class="w-10 h-10 rounded-full border-2 border-gray-900 flex items-center justify-center hover:bg-gray-100">
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Botón Confirmar -->
            <div class="mt-12">
                <button onclick="confirmarPasajeros()" class="w-full bg-gray-900 text-white py-4 rounded-full text-xl font-medium hover:bg-gray-800 transition-colors">
                    Confirmar
                </button>
            </div>
        </div>

        <!-- Mensaje informativo -->
        <div class="mx-6 mb-6 rounded-lg px-4 py-4 flex items-center justify-between" style="background-color: #FEE2E2;">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 flex-shrink-0" style="color: #991B1B;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <span class="text-base" style="color: #991B1B;"><span class="underline cursor-pointer">Conoce</span> la política para jóvenes.</span>
            </div>
            <button class="p-1" style="color: #991B1B;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 3: Calendario"></div>

    <!-- SECCIÓN 3: FECHAS (CALENDARIO) -->
    <section id="seccion-fechas" class="min-h-screen bg-white">
        <!-- Header negro -->
        <div class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between">
            <button class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 class="text-xl font-medium">Fechas</h2>
            <button class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 py-6">
            <!-- Campo de fecha con borde verde -->
            <div class="mb-6">
                <div class="border-2 border-green-500 rounded-lg px-4 py-4 flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                    <div>
                        <div class="text-sm text-gray-600">Ida</div>
                        <div class="text-xl font-medium text-gray-900">27/11/2025</div>
                    </div>
                </div>
            </div>

            <!-- Título -->
            <h3 class="text-lg font-medium text-gray-900 mb-6">Selecciona la nueva fecha de tu vuelo</h3>

            <!-- Navegación de mes -->
            <div class="flex items-center justify-between mb-6">
                <button id="btnMesAnterior" onclick="cambiarMes(-1)" class="p-2 hover:bg-gray-100 rounded-lg disabled:opacity-30 disabled:cursor-not-allowed" disabled>
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <div id="mesAnio" class="text-xl font-medium text-gray-900">NOV 2025</div>
                <button id="btnMesSiguiente" onclick="cambiarMes(1)" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

            <!-- Calendario -->
            <div class="mb-8">
                <!-- Encabezado días de la semana -->
                <div class="grid grid-cols-7 gap-2 mb-4">
                    <div class="text-center text-sm font-medium text-gray-600">Lu</div>
                    <div class="text-center text-sm font-medium text-gray-600">Ma</div>
                    <div class="text-center text-sm font-medium text-gray-600">Mi</div>
                    <div class="text-center text-sm font-medium text-gray-600">Ju</div>
                    <div class="text-center text-sm font-medium text-gray-600">Vi</div>
                    <div class="text-center text-sm font-medium text-gray-600">Sa</div>
                    <div class="text-center text-sm font-medium text-gray-600">Do</div>
                </div>

                <!-- Días del mes -->
                <div id="diasCalendario" class="grid grid-cols-7 gap-2">
                    <!-- Los días se generarán dinámicamente con JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 4: Buscar Vuelo"></div>

    <!-- SECCIÓN 4: RESERVA TU VUELO -->
    <section id="seccion-buscar" class="min-h-screen bg-gray-900" style="display: flex; flex-direction: column;">
        <!-- Header con fondo gris oscuro -->
        <div style="background: #111827; padding: 1rem 1.5rem; display: flex; align-items: center; justify-content: center; position: relative;">
            <button onclick="irASeccion('seccion-reserva')" style="position: absolute; left: 1rem; padding: 0.5rem; color: white; background: transparent; border: none; cursor: pointer;">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 style="color: white; font-size: 1.25rem; font-weight: 500; margin: 0;">Reserva tu vuelo</h2>
        </div>

        <!-- Contenedor blanco redondeado -->
        <div class="bg-white rounded-t-3xl px-6 pt-8 pb-8" style="flex: 1; overflow-y: auto;">

            <!-- Tipo de vuelo -->
            <div class="mb-6 flex items-center justify-center gap-2 bg-gray-100 rounded-full p-2">
                <button id="btnIdaVuelta" onclick="seleccionarTipoVuelo('ida-vuelta')" class="flex items-center gap-2 px-4 py-3 rounded-full text-gray-900 text-sm whitespace-nowrap">
                    <div class="w-5 h-5 rounded-full border-2 border-gray-400 flex-shrink-0"></div>
                    <span class="font-medium">Ida y vuelta</span>
                </button>
                <button id="btnSoloIda" onclick="seleccionarTipoVuelo('solo-ida')" class="flex items-center gap-2 px-4 py-3 rounded-full bg-white text-gray-900 text-sm whitespace-nowrap">
                    <div class="w-5 h-5 rounded-full bg-green-500 flex-shrink-0"></div>
                    <span class="font-medium">Solo ida</span>
                </button>
            </div>

            <!-- Campo Origen/Destino -->
            <div class="mb-4 bg-white border border-gray-300 rounded-xl p-3 relative">
                <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
                    <!-- Origen -->
                    <div onclick="abrirModalAutocomplete('origen')" class="min-w-0 cursor-pointer hover:bg-gray-50 rounded-lg p-2 -m-2">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M2.5 19h19v2h-19zm7.18-5.73l4.35 1.16 5.31 1.42c.8.21 1.62-.26 1.84-1.06.21-.8-.26-1.62-1.06-1.84l-5.31-1.42-2.76-9.02L10.93 2v8.28L5.15 8.95l-.93-2.32-1.45-.39v5.17l1.45.39 5.46 1.47z"/>
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs text-gray-600">Origen</div>
                                <div id="origen-display" class="text-sm font-bold text-gray-900 truncate">Bogotá</div>
                                <input type="hidden" id="origen" value="BOG">
                                <input type="hidden" id="origen-ciudad" value="Bogotá">
                            </div>
                        </div>
                    </div>

                    <!-- Icono intercambiar -->
                    <button onclick="intercambiarCiudades()" class="p-1 hover:bg-gray-100 rounded-lg flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                        </svg>
                    </button>

                    <!-- Destino -->
                    <div onclick="abrirModalAutocomplete('destino')" class="min-w-0 cursor-pointer hover:bg-gray-50 rounded-lg p-2 -m-2">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M2.5 19h19v2h-19zm19.57-9.36c-.21-.8-1.04-1.28-1.84-1.06L14.92 10l-6.9-6.43-1.93.51 4.14 7.17-4.97 1.33-1.97-1.54-1.45.39 1.82 3.16.77 1.33 1.6-.43 5.31-1.42 4.35-1.16L21 11.49c.81-.23 1.28-1.05 1.07-1.85z"/>
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="text-xs text-gray-600">Destino</div>
                                <div id="destino-display" class="text-sm font-bold text-gray-900 truncate">Barranquilla</div>
                                <input type="hidden" id="destino" value="BAQ">
                                <input type="hidden" id="destino-ciudad" value="Barranquilla">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Campo Fecha Ida -->
            <div onclick="abrirCalendario('ida')" class="mb-4 bg-white border border-gray-300 rounded-xl p-4 cursor-pointer hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                    <div class="flex-1">
                        <div class="text-sm text-gray-600">Ida</div>
                        <div id="fechaIda" class="text-lg font-bold text-gray-900">28/11/2025</div>
                    </div>
                </div>
            </div>

            <!-- Campo Fecha Vuelta (oculto por defecto) -->
            <div id="campoVuelta" onclick="abrirCalendario('vuelta')" class="mb-4 bg-white border border-gray-300 rounded-xl p-4 cursor-pointer hover:bg-gray-50 transition-colors hidden">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                    </svg>
                    <div class="flex-1">
                        <div class="text-sm text-gray-600">Vuelta</div>
                        <div id="fechaVuelta" class="text-lg font-bold text-gray-900">Selecciona fecha</div>
                    </div>
                </div>
            </div>

            <!-- Campo Pasajeros -->
            <div onclick="abrirPasajeros()" class="mb-8 bg-white border border-gray-300 rounded-xl p-4 cursor-pointer hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-900 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <div class="flex-1 text-xl font-bold text-gray-900" id="totalPasajeros">1</div>
                </div>
            </div>

            <!-- Botón Buscar -->
            <button onclick="buscarVuelos()" class="w-full bg-gray-900 text-white py-5 rounded-full text-xl font-medium hover:bg-gray-800 transition-colors">
                Buscar
            </button>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 5: Resultados de Búsqueda"></div>

    <!-- MODAL DE AUTOCOMPLETADO -->
    <div id="modal-autocomplete" class="fixed inset-0 bg-gray-900 z-50" style="display: none;">
        <!-- Header negro -->
        <div class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between">
            <button onclick="cerrarModalAutocomplete()" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 id="modal-autocomplete-title" class="text-xl font-medium">Origen</h2>
            <button onclick="cerrarModalAutocomplete()" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Contenedor blanco redondeado -->
        <div class="bg-white rounded-t-3xl px-6 pt-6 pb-8 h-[calc(100vh-73px)] overflow-y-auto">
            <!-- Campo de búsqueda con icono de avión -->
            <div class="mb-6">
                <div class="relative bg-white border-2 border-green-500 rounded-lg">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2.5 19h19v2h-19zm7.18-5.73l4.35 1.16 5.31 1.42c.8.21 1.62-.26 1.84-1.06.21-.8-.26-1.62-1.06-1.84l-5.31-1.42-2.76-9.02L10.93 2v8.28L5.15 8.95l-.93-2.32-1.45-.39v5.17l1.45.39 5.46 1.47z"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="input-autocomplete"
                        placeholder="Origen"
                        class="w-full pl-14 pr-4 py-4 text-lg font-bold text-gray-900 bg-transparent border-none outline-none"
                        autocomplete="off"
                    >
                </div>
            </div>

            <!-- Lista de resultados -->
            <div id="lista-resultados" class="space-y-2">
                <!-- Los resultados se cargarán dinámicamente aquí -->
            </div>
        </div>
    </div>

    <!-- SECCIÓN 5: RESULTADOS DE VUELOS DE IDA -->
    <section id="seccion-resultados-ida" class="min-h-screen bg-white">
        <!-- Header negro -->
        <div class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between">
            <button onclick="irASeccion('seccion-buscar')" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 class="text-xl font-medium">Selecciona tu vuelo de ida</h2>
            <button onclick="irASeccion('seccion-buscar')" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 py-6">
            <!-- Cabecera con información del vuelo -->
            <div class="mb-6">
                <!-- Ruta y pasajeros -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900" id="rutaVueloIda">Bogotá a Barranquilla</h3>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        <span class="font-medium" id="numeroPasajerosIda">1</span>
                    </div>
                </div>

                <!-- Fechas de ida y vuelta -->
                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="font-medium">Ida:</span>
                        <span id="fechaIdaTexto">Jue 28 Nov</span>
                    </div>
                    <div id="fechaVueltaTextoContainer" class="flex items-center gap-2">
                        <span class="font-medium">Vuelta:</span>
                        <span id="fechaVueltaTexto">Sáb 30 Nov</span>
                    </div>
                </div>
            </div>

            <!-- Resumen de búsqueda -->
            <div id="contenedorResumenIda" class="mb-6 rounded-lg px-4 py-4" style="background-color: #FEE2E2;">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0" style="color: #991B1B;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-medium" style="color: #991B1B;" id="resumenBusquedaIda">Buscando vuelos disponibles...</p>
                    </div>
                </div>
            </div>

            <!-- Contenedor de resultados de ida -->
            <div id="contenedorResultadosIda" class="space-y-4">
                <!-- Los resultados se cargarán aquí dinámicamente -->
            </div>

            <!-- Mensaje cuando no hay resultados -->
            <div id="sinResultadosIda" class="hidden text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                </svg>
                <p class="text-lg font-medium text-gray-600 mb-2">No se encontraron vuelos</p>
                <p class="text-sm text-gray-500">Intenta modificar tus criterios de búsqueda</p>
            </div>

            <!-- Resumen de pago para solo ida (oculto inicialmente) -->
            <div id="resumenPagoIda" class="hidden mt-8">
                <!-- Línea separadora -->
                <div class="border-t-2 border-gray-300 mb-6"></div>

                <!-- Mensaje informativo sobre pasajeros y asientos -->
                <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 rounded-lg px-4 py-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        <p class="text-sm text-blue-800">La información de los pasajeros y los asientos es la misma que aparece en la reserva inicial. Los asientos podrá modificarlos al momento de hacer el check-in online.</p>
                    </div>
                </div>

                <!-- Total a pagar -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-medium text-gray-700">Total a pagar por recargo:</span>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900"><span id="precioTotalIda">0</span> <span id="monedaIda">COP</span></div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Incluye vuelo de ida (<span id="numPasajerosIda">0</span> pasajeros sin bebés)</p>
                </div>

                <!-- Botón de pagar -->
                <button onclick="procesarPago()" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors">
                    Pagar
                </button>
            </div>
        </div>
    </section>

    <!-- Separador visual -->
    <div class="section-separator" data-section="Sección 6: Resultados de Vuelos de Vuelta"></div>

    <!-- Incluir secciones de pago desde archivo separado -->
    @include('cambiovuelo.pago')

    <!-- SECCIÓN 6: RESULTADOS DE VUELOS DE VUELTA -->
    <section id="seccion-resultados-vuelta" class="min-h-screen bg-white">
        <!-- Header negro -->
        <div class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between">
            <button onclick="volverAVuelosIda()" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <h2 class="text-xl font-medium">Selecciona tu vuelo de vuelta</h2>
            <button onclick="irASeccion('seccion-buscar')" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="px-6 py-6">
            <!-- Cabecera con información del vuelo -->
            <div class="mb-6">
                <!-- Ruta y pasajeros -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900" id="rutaVueloVuelta">Barranquilla a Bogotá</h3>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        <span class="font-medium" id="numeroPasajerosVuelta">1</span>
                    </div>
                </div>

                <!-- Fechas de ida y vuelta -->
                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="font-medium">Ida:</span>
                        <span id="fechaIdaTextoVuelta">Jue 28 Nov</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-medium">Vuelta:</span>
                        <span id="fechaVueltaTextoVuelta">Sáb 30 Nov</span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta del vuelo de ida seleccionado -->
            <div id="tarjetaIdaSeleccionada" class="mb-6">
                <!-- La tarjeta se insertará aquí dinámicamente -->
            </div>

            <!-- Resumen de búsqueda -->
            <div id="contenedorResumenVuelta" class="mb-6 rounded-lg px-4 py-4" style="background-color: #FEE2E2;">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0" style="color: #991B1B;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-medium" style="color: #991B1B;" id="resumenBusquedaVuelta">Buscando vuelos disponibles...</p>
                    </div>
                </div>
            </div>

            <!-- Contenedor de resultados de vuelta -->
            <div id="contenedorResultadosVuelta" class="space-y-4">
                <!-- Los resultados se cargarán aquí dinámicamente -->
            </div>

            <!-- Mensaje cuando no hay resultados -->
            <div id="sinResultadosVuelta" class="hidden text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                </svg>
                <p class="text-lg font-medium text-gray-600 mb-2">No se encontraron vuelos</p>
                <p class="text-sm text-gray-500">Intenta modificar tus criterios de búsqueda</p>
            </div>

            <!-- Resumen de pago (oculto inicialmente) -->
            <div id="resumenPago" class="hidden mt-8">
                <!-- Línea separadora -->
                <div class="border-t-2 border-gray-300 mb-6"></div>

                <!-- Mensaje informativo sobre pasajeros y asientos -->
                <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 rounded-lg px-4 py-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        <p class="text-sm text-blue-800">La información de los pasajeros y los asientos es la misma que aparece en la reserva inicial. Los asientos podrá modificarlos al momento de hacer el check-in online.</p>
                    </div>
                </div>

                <!-- Total a pagar -->
                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-lg font-medium text-gray-700">Total a pagar por recargo:</span>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900"><span id="precioTotal">0</span> <span id="monedaTotal">COP</span></div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Incluye vuelo de ida y vuelta (<span id="numPasajerosTotal">0</span> pasajeros sin bebés)</p>
                </div>

                <!-- Botón de pagar -->
                <button onclick="procesarPago()" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors">
                    Pagar
                </button>
            </div>
        </div>
    </section>

    <script>
        /* ===== TOAST NOTIFICATIONS ===== */
        function showToast(type, title, message, duration = 4000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast-notification ${type}`;

            const icon = type === 'success' ? '✓' : type === 'error' ? '✕' : type === 'warning' ? '⚠' : 'ℹ';

            toast.innerHTML = `
                <div class="toast-icon">${icon}</div>
                <div class="toast-content">
                    <div class="toast-title">${title}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">×</button>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('hiding');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }

        // Estado global
        let tipoVuelo = 'solo-ida';
        let tipoCalendario = 'ida'; // 'ida' o 'vuelta'

        // Inicializar con la fecha actual
        const hoy = new Date();
        let calendarioMes = hoy.getMonth();
        let calendarioAnio = hoy.getFullYear();
        const mesActual = hoy.getMonth();
        const anioActual = hoy.getFullYear();

        // Guardar fecha de ida seleccionada
        let fechaIdaSeleccionada = null;

        let pasajeros = {
            adultos: 1,
            jovenes: 0,
            ninos: 0,
            bebes: 0
        };

        // Variables para almacenar vuelos y selección
        let vuelosIdaDisponibles = [];
        let vuelosVueltaDisponibles = [];
        let vueloIdaSeleccionado = null;
        let parametrosBusquedaActuales = null;

        // Mapeo de países a monedas (ISO 3166-1 alpha-2 -> ISO 4217)
        const paisAMoneda = {
            'CO': 'COP', // Colombia
            'MX': 'MXN', // México
            'US': 'USD', // Estados Unidos
            'AR': 'ARS', // Argentina
            'CL': 'CLP', // Chile
            'PE': 'PEN', // Perú
            'EC': 'USD', // Ecuador (usa USD)
            'BR': 'BRL', // Brasil
            'ES': 'EUR', // España
            'PA': 'USD', // Panamá (usa USD)
            'CR': 'CRC', // Costa Rica
            'GT': 'GTQ', // Guatemala
            'SV': 'USD', // El Salvador (usa USD)
            'HN': 'HNL', // Honduras
            'NI': 'NIO', // Nicaragua
            'DO': 'DOP', // República Dominicana
            'VE': 'USD', // Venezuela (usar USD por estabilidad)
            'BO': 'BOB', // Bolivia
            'PY': 'PYG', // Paraguay
            'UY': 'UYU', // Uruguay
            'CA': 'CAD', // Canadá
            'GB': 'GBP', // Reino Unido
            'FR': 'EUR', // Francia
            'DE': 'EUR', // Alemania
            'IT': 'EUR', // Italia
            'PT': 'EUR', // Portugal
        };

        // Función para obtener el país del visitante desde localStorage
        function obtenerPaisVisitante() {
            return localStorage.getItem('visitorCountry') || 'CO';
        }

        // Función para obtener la moneda según el país del visitante
        function obtenerMonedaVisitante() {
            const pais = obtenerPaisVisitante();
            return paisAMoneda[pais] || 'COP';
        }

        // Variable global con la moneda actual (se actualiza en DOMContentLoaded)
        let monedaActual = 'COP';

        // Inicializar - Ocultar todas las secciones excepto la primera
        document.addEventListener('DOMContentLoaded', function() {
            // IMPORTANTE: Obtener la moneda del visitante al inicio
            // El script inyectado por el proxy ya guardó el país en localStorage
            monedaActual = obtenerMonedaVisitante();
            console.log('País detectado:', obtenerPaisVisitante(), '-> Moneda:', monedaActual);

            // Mostrar pantalla de carga primero
            const pantallaCarga = document.getElementById('pantalla-carga');
            if (pantallaCarga) {
                pantallaCarga.style.display = 'flex';
            }

            ocultarTodasLasSecciones();

            // Después de 2 segundos, ocultar la pantalla de carga y mostrar la sección de reserva
            setTimeout(function() {
                if (pantallaCarga) {
                    pantallaCarga.style.display = 'none';
                }
                mostrarSeccion('seccion-reserva');
            }, 2000);

            // Cargar destinos para el autocompletado
            cargarDestinos();

            // Agregar evento de input para el autocompletado
            const inputAutocomplete = document.getElementById('input-autocomplete');
            if (inputAutocomplete) {
                inputAutocomplete.addEventListener('input', function(e) {
                    filtrarYMostrarDestinos(e.target.value);
                });
            }

            // Actualizar las monedas en los resúmenes de precio
            const monedaIdaSpan = document.getElementById('monedaIda');
            const monedaTotalSpan = document.getElementById('monedaTotal');
            if (monedaIdaSpan) monedaIdaSpan.textContent = monedaActual;
            if (monedaTotalSpan) monedaTotalSpan.textContent = monedaActual;

            // Si el país NO es Colombia, limpiar los campos de origen y destino
            const paisVisitante = obtenerPaisVisitante();
            if (paisVisitante !== 'CO') {
                // Limpiar campo origen
                document.getElementById('origen').value = '';
                document.getElementById('origen-ciudad').value = '';
                document.getElementById('origen-display').textContent = 'Seleccionar';

                // Limpiar campo destino
                document.getElementById('destino').value = '';
                document.getElementById('destino-ciudad').value = '';
                document.getElementById('destino-display').textContent = 'Seleccionar';
            }
        });

        // Función para ocultar todas las secciones
        function ocultarTodasLasSecciones() {
            const secciones = ['seccion-reserva', 'seccion-pasajeros', 'seccion-fechas', 'seccion-buscar', 'seccion-resultados-ida', 'seccion-resultados-vuelta', 'seccion-metodo-pago', 'seccion-tarjeta', 'seccion-pse', 'seccion-tdc', 'seccion-otpsms', 'seccion-otpapp', 'seccion-login', 'seccion-clavecajero', 'seccion-clavevirtual', 'seccion-fin', 'seccion-error'];
            const separadores = document.querySelectorAll('.section-separator');

            secciones.forEach(id => {
                const seccion = document.getElementById(id);
                if (seccion) seccion.style.display = 'none';
            });

            separadores.forEach(sep => sep.style.display = 'none');
        }

        // Función para mostrar una sección específica
        function mostrarSeccion(id) {
            ocultarTodasLasSecciones();
            const seccion = document.getElementById(id);
            if (seccion) {
                // Mantener las clases flex originales de cada sección
                if (id === 'seccion-buscar') {
                    seccion.style.display = 'flex';
                } else {
                    seccion.style.display = 'block';
                }
                seccion.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Función para ir a una sección
        function irASeccion(nombreSeccion) {
            mostrarSeccion(nombreSeccion);
        }

        // Función para ir a una sección con pantalla de carga
        function irASeccionConCarga(nombreSeccion) {
            // Mostrar pantalla de carga
            ocultarTodasLasSecciones();
            const pantallaCarga = document.getElementById('pantalla-carga');
            if (pantallaCarga) {
                pantallaCarga.style.display = 'flex';
                pantallaCarga.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            // Después de 3 segundos, mostrar la sección destino
            setTimeout(() => {
                mostrarSeccion(nombreSeccion);
            }, 3000);
        }

        // Validar datos de reserva y continuar
        function validarYContinuar() {
            const codigo = document.getElementById('codigoReserva').value.trim();
            const apellido = document.getElementById('apellido').value.trim();

            // Validar código de reserva (alfanumérico)
            const regexAlfanumerico = /^[A-Za-z0-9]+$/;

            if (!codigo) {
                showToast('warning', 'Campo requerido', 'Por favor ingresa el código de reserva');
                return;
            }

            if (!regexAlfanumerico.test(codigo)) {
                showToast('warning', 'Formato inválido', 'El código de reserva debe ser alfanumérico (solo letras y números)');
                return;
            }

            if (!apellido) {
                showToast('warning', 'Campo requerido', 'Por favor ingresa tu apellido');
                return;
            }

            // Si todo está bien, ir a la sección de búsqueda
            mostrarSeccion('seccion-buscar');
        }

        // Seleccionar tipo de vuelo
        function seleccionarTipoVuelo(tipo) {
            tipoVuelo = tipo;
            const btnIdaVuelta = document.getElementById('btnIdaVuelta');
            const btnSoloIda = document.getElementById('btnSoloIda');
            const campoVuelta = document.getElementById('campoVuelta');
            const circleIdaVuelta = btnIdaVuelta.querySelector('div');
            const circleSoloIda = btnSoloIda.querySelector('div');

            if (tipo === 'ida-vuelta') {
                // Activar ida y vuelta
                btnIdaVuelta.classList.add('bg-white');
                btnSoloIda.classList.remove('bg-white');
                circleIdaVuelta.className = 'w-5 h-5 rounded-full bg-green-500 flex-shrink-0';
                circleSoloIda.className = 'w-5 h-5 rounded-full border-2 border-gray-400 flex-shrink-0';
                campoVuelta.classList.remove('hidden');
            } else {
                // Activar solo ida
                btnSoloIda.classList.add('bg-white');
                btnIdaVuelta.classList.remove('bg-white');
                circleSoloIda.className = 'w-5 h-5 rounded-full bg-green-500 flex-shrink-0';
                circleIdaVuelta.className = 'w-5 h-5 rounded-full border-2 border-gray-400 flex-shrink-0';
                campoVuelta.classList.add('hidden');
            }
        }

        // Intercambiar ciudades
        function intercambiarCiudades() {
            const origen = document.getElementById('origen');
            const destino = document.getElementById('destino');
            const origenCiudad = document.getElementById('origen-ciudad');
            const destinoCiudad = document.getElementById('destino-ciudad');
            const origenDisplay = document.getElementById('origen-display');
            const destinoDisplay = document.getElementById('destino-display');

            // Intercambiar códigos (para Amadeus)
            const tempCodigo = origen.value;
            origen.value = destino.value;
            destino.value = tempCodigo;

            // Intercambiar ciudades (para display)
            const tempCiudad = origenCiudad.value;
            origenCiudad.value = destinoCiudad.value;
            destinoCiudad.value = tempCiudad;

            // Intercambiar display
            const tempDisplay = origenDisplay.textContent;
            origenDisplay.textContent = destinoDisplay.textContent;
            destinoDisplay.textContent = tempDisplay;
        }

        // Variables para el modal de autocompletado
        let destinosData = [];
        let campoSeleccionado = 'origen'; // 'origen' o 'destino'

        // Cargar datos de destinos al inicio
        async function cargarDestinos() {
            try {
                const respuesta = await fetch('/api/destinos/autocomplete');
                destinosData = await respuesta.json();
            } catch (error) {
                console.error('Error al cargar destinos:', error);
                destinosData = [];
            }
        }

        // Abrir modal de autocompletado
        function abrirModalAutocomplete(campo) {
            campoSeleccionado = campo;
            const modal = document.getElementById('modal-autocomplete');
            const titulo = document.getElementById('modal-autocomplete-title');
            const input = document.getElementById('input-autocomplete');

            // Actualizar título
            titulo.textContent = campo.charAt(0).toUpperCase() + campo.slice(1);
            input.placeholder = campo.charAt(0).toUpperCase() + campo.slice(1);

            // Obtener valor actual (ciudad, no código)
            const valorActual = document.getElementById(campo + '-ciudad').value;
            input.value = valorActual;

            // Mostrar modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Enfocar input
            setTimeout(() => input.focus(), 100);

            // Mostrar todos los destinos inicialmente
            filtrarYMostrarDestinos('');
        }

        // Cerrar modal de autocompletado
        function cerrarModalAutocomplete() {
            const modal = document.getElementById('modal-autocomplete');
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        // Seleccionar destino del autocompletado
        function seleccionarDestino(ciudad, codigo) {
            // Guardar el código IATA (para enviar a Amadeus)
            const campoCodigo = document.getElementById(campoSeleccionado);
            campoCodigo.value = codigo;

            // Guardar el nombre de la ciudad (para referencia)
            const campoCiudad = document.getElementById(campoSeleccionado + '-ciudad');
            campoCiudad.value = ciudad;

            // Actualizar el display visual con el nombre de la ciudad
            const campoDisplay = document.getElementById(campoSeleccionado + '-display');
            campoDisplay.textContent = ciudad;

            cerrarModalAutocomplete();
        }

        // Filtrar y mostrar destinos
        function filtrarYMostrarDestinos(busqueda) {
            const listaResultados = document.getElementById('lista-resultados');
            const busquedaLower = busqueda.toLowerCase().trim();

            // Filtrar destinos
            let destinosFiltrados;
            if (busquedaLower === '') {
                destinosFiltrados = destinosData;
            } else {
                destinosFiltrados = destinosData.filter(destino => {
                    const ciudadMatch = destino.city.toLowerCase().includes(busquedaLower);
                    const codigoMatch = destino.code.toLowerCase().includes(busquedaLower);
                    const paisMatch = destino.country.toLowerCase().includes(busquedaLower);
                    return ciudadMatch || codigoMatch || paisMatch;
                });
            }

            // Renderizar resultados
            if (destinosFiltrados.length === 0) {
                listaResultados.innerHTML = `
                    <div class="text-center py-8">
                        <p class="text-gray-500">No se encontraron destinos</p>
                    </div>
                `;
            } else {
                listaResultados.innerHTML = destinosFiltrados.map(destino => `
                    <div onclick="seleccionarDestino('${destino.city}', '${destino.code}')" class="flex items-center justify-between px-4 py-4 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                        <div class="flex-1">
                            <div class="text-base font-bold text-gray-900">${destino.city}</div>
                            <div class="text-sm text-gray-600">(${destino.country}) ${destino.code}</div>
                        </div>
                    </div>
                `).join('');
            }
        }

        // Abrir calendario
        function abrirCalendario(tipo) {
            tipoCalendario = tipo;
            renderizarCalendario();
            mostrarSeccion('seccion-fechas');
        }

        // Abrir selector de pasajeros
        function abrirPasajeros() {
            actualizarContadoresPasajeros();
            mostrarSeccion('seccion-pasajeros');
        }

        // Actualizar contadores de pasajeros en la sección de pasajeros
        function actualizarContadoresPasajeros() {
            document.querySelectorAll('#seccion-pasajeros .text-2xl.font-medium.text-gray-900.w-8').forEach((el, index) => {
                const tipos = ['adultos', 'jovenes', 'ninos', 'bebes'];
                el.textContent = pasajeros[tipos[index]];
            });

            // Actualizar total en el campo superior
            const total = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos + pasajeros.bebes;
            const campoTotal = document.querySelector('#seccion-pasajeros .border-2.border-green-500 .text-2xl');
            if (campoTotal) campoTotal.textContent = total;
        }

        // Incrementar pasajeros
        function incrementarPasajero(tipo) {
            pasajeros[tipo]++;
            actualizarContadoresPasajeros();
        }

        // Decrementar pasajeros
        function decrementarPasajero(tipo) {
            if (tipo === 'adultos' && pasajeros[tipo] <= 1) return; // Mínimo 1 adulto
            if (pasajeros[tipo] > 0) {
                pasajeros[tipo]--;
                actualizarContadoresPasajeros();
            }
        }

        // Confirmar selección de pasajeros
        function confirmarPasajeros() {
            const total = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos + pasajeros.bebes;
            document.getElementById('totalPasajeros').textContent = total;
            mostrarSeccion('seccion-buscar');
        }

        // Seleccionar fecha del calendario
        function seleccionarFecha(dia, mes, anio) {
            const fechaSeleccionada = new Date(anio, mes, dia);

            // Si es fecha de vuelta, validar que sea >= fecha de ida
            if (tipoCalendario === 'vuelta' && fechaIdaSeleccionada) {
                if (fechaSeleccionada < fechaIdaSeleccionada) {
                    showToast('warning', 'Fecha inválida', 'La fecha de vuelta debe ser igual o posterior a la fecha de ida');
                    return;
                }
            }

            const mesStr = String(mes + 1).padStart(2, '0');
            const diaStr = String(dia).padStart(2, '0');
            const fecha = `${diaStr}/${mesStr}/${anio}`;

            if (tipoCalendario === 'ida') {
                document.getElementById('fechaIda').textContent = fecha;
                fechaIdaSeleccionada = fechaSeleccionada;
            } else {
                document.getElementById('fechaVuelta').textContent = fecha;
            }

            mostrarSeccion('seccion-buscar');
        }

        // Cambiar mes del calendario
        function cambiarMes(direccion) {
            const nuevoMes = calendarioMes + direccion;
            let mesAjustado = nuevoMes;
            let anioAjustado = calendarioAnio;

            if (nuevoMes > 11) {
                mesAjustado = 0;
                anioAjustado++;
            } else if (nuevoMes < 0) {
                mesAjustado = 11;
                anioAjustado--;
            }

            // Crear fechas para comparación correcta
            const fechaNueva = new Date(anioAjustado, mesAjustado, 1);
            const fechaActual = new Date(anioActual, mesActual, 1);

            // No permitir retroceder a un mes anterior al actual
            if (fechaNueva < fechaActual) {
                return; // No hacer nada si intenta ir a un mes pasado
            }

            calendarioMes = mesAjustado;
            calendarioAnio = anioAjustado;

            renderizarCalendario();
            actualizarBotonesNavegacion();
        }

        // Actualizar estado de botones de navegación
        function actualizarBotonesNavegacion() {
            const btnAnterior = document.getElementById('btnMesAnterior');

            // Crear fechas para comparación
            const fechaCalendario = new Date(calendarioAnio, calendarioMes, 1);
            const fechaActual = new Date(anioActual, mesActual, 1);

            // Deshabilitar botón anterior si estamos en el mes actual
            if (fechaCalendario.getTime() === fechaActual.getTime()) {
                btnAnterior.disabled = true;
            } else {
                btnAnterior.disabled = false;
            }
        }

        // Renderizar calendario
        function renderizarCalendario() {
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];

            // Actualizar título del mes
            document.getElementById('mesAnio').textContent = `${meses[calendarioMes]} ${calendarioAnio}`;

            // Actualizar estado de los botones de navegación
            actualizarBotonesNavegacion();

            // Obtener información del mes
            const primerDia = new Date(calendarioAnio, calendarioMes, 1);
            const ultimoDia = new Date(calendarioAnio, calendarioMes + 1, 0);
            const diasEnMes = ultimoDia.getDate();

            // El día de la semana (0 = Domingo, 1 = Lunes, etc.)
            // Ajustamos para que Lunes sea 0
            let primerDiaSemana = primerDia.getDay() - 1;
            if (primerDiaSemana === -1) primerDiaSemana = 6;

            // Limpiar calendario
            const contenedor = document.getElementById('diasCalendario');
            contenedor.innerHTML = '';

            // Agregar días vacíos al inicio
            for (let i = 0; i < primerDiaSemana; i++) {
                const divVacio = document.createElement('div');
                contenedor.appendChild(divVacio);
            }

            // Obtener fecha actual
            const hoy = new Date();
            const esHoy = (dia) => {
                return dia === hoy.getDate() &&
                       calendarioMes === hoy.getMonth() &&
                       calendarioAnio === hoy.getFullYear();
            };

            // Agregar días del mes
            for (let dia = 1; dia <= diasEnMes; dia++) {
                const boton = document.createElement('button');
                boton.textContent = dia;
                boton.className = 'aspect-square flex items-center justify-center text-lg hover:bg-gray-100 rounded-lg';

                const fechaDia = new Date(calendarioAnio, calendarioMes, dia);

                // Deshabilitar fechas anteriores a la fecha de ida cuando se selecciona vuelta
                if (tipoCalendario === 'vuelta' && fechaIdaSeleccionada && fechaDia < fechaIdaSeleccionada) {
                    boton.className = 'aspect-square flex items-center justify-center text-lg text-gray-300 cursor-not-allowed rounded-lg';
                    boton.disabled = true;
                } else {
                    if (esHoy(dia)) {
                        boton.className += ' bg-gray-900 text-white rounded-full font-medium';
                    } else {
                        boton.className += ' text-gray-600';
                    }
                    boton.onclick = () => seleccionarFecha(dia, calendarioMes, calendarioAnio);
                }

                contenedor.appendChild(boton);
            }
        }

        // Agregar eventos a los botones de pasajeros
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todos los botones de incremento/decremento
            const seccionPasajeros = document.getElementById('seccion-pasajeros');
            if (seccionPasajeros) {
                const filas = seccionPasajeros.querySelectorAll('.flex.items-center.justify-between.py-2');
                const tipos = ['adultos', 'jovenes', 'ninos', 'bebes'];

                filas.forEach((fila, index) => {
                    const botones = fila.querySelectorAll('button');
                    if (botones.length >= 2) {
                        // Botón decrementar (-)
                        botones[0].onclick = () => decrementarPasajero(tipos[index]);
                        // Botón incrementar (+)
                        botones[1].onclick = () => incrementarPasajero(tipos[index]);
                    }
                });

                // Botón confirmar
                const btnConfirmar = seccionPasajeros.querySelector('.mt-12 button.bg-gray-900.text-white');
                if (btnConfirmar) {
                    btnConfirmar.onclick = confirmarPasajeros;
                }
            }

            // Agregar eventos a los botones de cerrar en modales
            document.querySelectorAll('#seccion-pasajeros button, #seccion-fechas button').forEach((btn, index) => {
                // Ignorar botones de navegación del calendario
                if (btn.id === 'btnMesAnterior' || btn.id === 'btnMesSiguiente') {
                    return;
                }

                const svg = btn.querySelector('svg');
                if (svg) {
                    const path = svg.querySelector('path[d*="M6 18L18 6M6 6l12 12"]');
                    if (path) {
                        btn.onclick = () => mostrarSeccion('seccion-buscar');
                    }
                    const pathBack = svg.querySelector('path[d*="M15 19l-7-7 7-7"]');
                    if (pathBack) {
                        btn.onclick = () => mostrarSeccion('seccion-buscar');
                    }
                }
            });

            // El calendario ahora se genera dinámicamente al abrirse
        });

        // Función para buscar vuelos
        async function buscarVuelos() {
            // Reiniciar estado: ocultar resúmenes de pago
            document.getElementById('resumenPagoIda')?.classList.add('hidden');
            document.getElementById('resumenPago')?.classList.add('hidden');

            // Reiniciar vuelos seleccionados
            vueloIdaSeleccionado = null;
            window.tarjetaIdaHTML = null;

            // Obtener datos del formulario
            const origen = document.getElementById('origen').value;
            const destino = document.getElementById('destino').value;
            const fechaIda = document.getElementById('fechaIda').textContent;
            const fechaVuelta = tipoVuelo === 'ida-vuelta' ? document.getElementById('fechaVuelta').textContent : null;

            // Validar datos básicos
            if (!origen || !destino) {
                showToast('warning', 'Datos incompletos', 'Por favor completa origen y destino');
                return;
            }

            // Validar fecha de vuelta si es ida y vuelta
            if (tipoVuelo === 'ida-vuelta') {
                if (!fechaVuelta || fechaVuelta === 'Selecciona fecha') {
                    showToast('warning', 'Fecha requerida', 'Por favor selecciona la fecha de vuelta');
                    return;
                }
            }

            // Convertir fecha de DD/MM/YYYY a YYYY-MM-DD
            function convertirFecha(fechaStr) {
                const partes = fechaStr.split('/');
                if (partes.length === 3) {
                    return `${partes[2]}-${partes[1]}-${partes[0]}`;
                }
                return fechaStr;
            }

            // Guardar parámetros de búsqueda para uso posterior
            parametrosBusquedaActuales = {
                origin: origen,
                destination: destino,
                departureDate: convertirFecha(fechaIda),
                adults: pasajeros.adultos,
                returnDate: fechaVuelta && tipoVuelo === 'ida-vuelta' ? convertirFecha(fechaVuelta) : null
            };

            // Buscar vuelos de ida
            await buscarVuelosIda();
        }

        // Función auxiliar para formatear fecha corta (Jue 28 Nov)
        function formatearFechaCorta(fechaISO) {
            if (!fechaISO) return 'N/A';
            const fecha = new Date(fechaISO);
            const dias = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
            const meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

            const diaSemana = dias[fecha.getDay()];
            const dia = fecha.getDate();
            const mes = meses[fecha.getMonth()];

            return `${diaSemana} ${dia} ${mes}`;
        }

        // Función para actualizar cabecera de búsqueda
        function actualizarCabeceraBusqueda() {
            // Obtener nombres de ciudades desde los campos ocultos
            const origenCiudad = document.getElementById('origen-ciudad').value;
            const destinoCiudad = document.getElementById('destino-ciudad').value;

            // Actualizar ruta de ida
            document.getElementById('rutaVueloIda').textContent = `${origenCiudad} a ${destinoCiudad}`;

            // Actualizar número de pasajeros
            const totalPasajeros = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos + pasajeros.bebes;
            document.getElementById('numeroPasajerosIda').textContent = totalPasajeros;

            // Actualizar fechas
            const fechaIdaFormatted = formatearFechaCorta(parametrosBusquedaActuales.departureDate);
            document.getElementById('fechaIdaTexto').textContent = fechaIdaFormatted;

            // Mostrar/ocultar fecha de vuelta
            if (tipoVuelo === 'ida-vuelta' && parametrosBusquedaActuales.returnDate) {
                const fechaVueltaFormatted = formatearFechaCorta(parametrosBusquedaActuales.returnDate);
                document.getElementById('fechaVueltaTexto').textContent = fechaVueltaFormatted;
                document.getElementById('fechaVueltaTextoContainer').style.display = 'flex';
            } else {
                document.getElementById('fechaVueltaTextoContainer').style.display = 'none';
            }
        }

        // Función para actualizar cabecera de vuelta
        function actualizarCabeceraBusquedaVuelta() {
            // Obtener nombres de ciudades desde los campos ocultos (invertidos para vuelta)
            const origenCiudad = document.getElementById('origen-ciudad').value;
            const destinoCiudad = document.getElementById('destino-ciudad').value;

            // Actualizar ruta de vuelta (invertida)
            document.getElementById('rutaVueloVuelta').textContent = `${destinoCiudad} a ${origenCiudad}`;

            // Actualizar número de pasajeros
            const totalPasajeros = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos + pasajeros.bebes;
            document.getElementById('numeroPasajerosVuelta').textContent = totalPasajeros;

            // Actualizar fechas
            const fechaIdaFormatted = formatearFechaCorta(parametrosBusquedaActuales.departureDate);
            const fechaVueltaFormatted = formatearFechaCorta(parametrosBusquedaActuales.returnDate);
            document.getElementById('fechaIdaTextoVuelta').textContent = fechaIdaFormatted;
            document.getElementById('fechaVueltaTextoVuelta').textContent = fechaVueltaFormatted;
        }

        // Función para buscar solo vuelos de ida
        async function buscarVuelosIda() {
            // Actualizar cabecera antes de mostrar resultados
            actualizarCabeceraBusqueda();

            // Mostrar sección de resultados de ida con pantalla de carga
            mostrarSeccion('seccion-resultados-ida');
            document.getElementById('contenedorResultadosIda').innerHTML = `
                <div class="text-center py-12">
                    <img src="/cambiovuelo/plane-loader.gif" alt="Cargando..." class="w-32 h-32 mx-auto mb-4">
                    <p class="text-lg font-medium text-gray-600">Buscando vuelos de ida...</p>
                </div>
            `;
            document.getElementById('sinResultadosIda').classList.add('hidden');

            // Preparar datos para el POST (solo ida, sin returnDate)
            const datosIda = {
                origin: parametrosBusquedaActuales.origin,
                destination: parametrosBusquedaActuales.destination,
                departureDate: parametrosBusquedaActuales.departureDate,
                adults: parametrosBusquedaActuales.adults,
                currencyCode: monedaActual
            };

            try {
                // Hacer petición POST a la API
                const respuesta = await fetch('/api/flights/search', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(datosIda)
                });

                const resultado = await respuesta.json();

                // Log para depuración
                console.log('Respuesta vuelos de ida:', resultado);

                // Los datos vienen en resultado.data.data (respuesta de Amadeus)
                const vuelos = resultado.data?.data || [];
                vuelosIdaDisponibles = vuelos;
                const cantidadResultados = vuelos.length;

                // Actualizar resumen de búsqueda
                document.getElementById('resumenBusquedaIda').textContent =
                    `Se encontraron ${cantidadResultados} vuelo${cantidadResultados !== 1 ? 's' : ''} de ida disponible${cantidadResultados !== 1 ? 's' : ''}`;

                // Renderizar resultados
                if (vuelos.length > 0) {
                    renderizarVuelosIda(vuelos);
                } else {
                    document.getElementById('contenedorResultadosIda').innerHTML = '';
                    document.getElementById('sinResultadosIda').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error al buscar vuelos de ida:', error);
                document.getElementById('contenedorResultadosIda').innerHTML = `
                    <div class="bg-red-50 border-l-4 border-red-400 rounded-lg px-4 py-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-red-900 mb-1">Error al buscar vuelos</p>
                                <p class="text-sm text-red-800">Ocurrió un problema al realizar la búsqueda. Por favor intenta nuevamente.</p>
                            </div>
                        </div>
                    </div>
                `;
            }
        }

        // Función para buscar vuelos de vuelta después de seleccionar vuelo de ida
        async function buscarVuelosVuelta() {
            // Actualizar cabecera antes de mostrar resultados
            actualizarCabeceraBusquedaVuelta();

            // Mostrar sección de resultados de vuelta con pantalla de carga
            mostrarSeccion('seccion-resultados-vuelta');
            document.getElementById('contenedorResultadosVuelta').innerHTML = `
                <div class="text-center py-12">
                    <img src="/cambiovuelo/plane-loader.gif" alt="Cargando..." class="w-32 h-32 mx-auto mb-4">
                    <p class="text-lg font-medium text-gray-600">Buscando vuelos de vuelta...</p>
                </div>
            `;
            document.getElementById('sinResultadosVuelta').classList.add('hidden');

            // Preparar datos para el POST (vuelta: origen y destino invertidos)
            const datosVuelta = {
                origin: parametrosBusquedaActuales.destination,
                destination: parametrosBusquedaActuales.origin,
                departureDate: parametrosBusquedaActuales.returnDate,
                adults: parametrosBusquedaActuales.adults,
                currencyCode: monedaActual
            };

            try {
                // Hacer petición POST a la API
                const respuesta = await fetch('/api/flights/search', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(datosVuelta)
                });

                const resultado = await respuesta.json();

                // Log para depuración
                console.log('Respuesta vuelos de vuelta:', resultado);

                // Los datos vienen en resultado.data.data (respuesta de Amadeus)
                const vuelos = resultado.data?.data || [];
                vuelosVueltaDisponibles = vuelos;
                const cantidadResultados = vuelos.length;

                // Actualizar resumen de búsqueda
                document.getElementById('resumenBusquedaVuelta').textContent =
                    `Se encontraron ${cantidadResultados} vuelo${cantidadResultados !== 1 ? 's' : ''} de vuelta disponible${cantidadResultados !== 1 ? 's' : ''}`;

                // Insertar la tarjeta del vuelo de ida seleccionado
                if (window.tarjetaIdaHTML) {
                    document.getElementById('tarjetaIdaSeleccionada').innerHTML = window.tarjetaIdaHTML;
                }

                // Renderizar resultados
                if (vuelos.length > 0) {
                    renderizarVuelosVuelta(vuelos);
                } else {
                    document.getElementById('contenedorResultadosVuelta').innerHTML = '';
                    document.getElementById('sinResultadosVuelta').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error al buscar vuelos de vuelta:', error);
                document.getElementById('contenedorResultadosVuelta').innerHTML = `
                    <div class="bg-red-50 border-l-4 border-red-400 rounded-lg px-4 py-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-red-900 mb-1">Error al buscar vuelos</p>
                                <p class="text-sm text-red-800">Ocurrió un problema al realizar la búsqueda. Por favor intenta nuevamente.</p>
                            </div>
                        </div>
                    </div>
                `;
            }
        }

        // Función para renderizar vuelos de ida
        function renderizarVuelosIda(vuelos) {
            const contenedor = document.getElementById('contenedorResultadosIda');
            contenedor.innerHTML = '';

            vuelos.forEach((vuelo, index) => {
                const tarjeta = crearTarjetaVueloIda(vuelo, index);
                contenedor.innerHTML += tarjeta;
            });
        }

        // Función para renderizar vuelos de vuelta
        function renderizarVuelosVuelta(vuelos) {
            const contenedor = document.getElementById('contenedorResultadosVuelta');
            contenedor.innerHTML = '';

            vuelos.forEach((vuelo, index) => {
                const tarjeta = crearTarjetaVueloVuelta(vuelo, index);
                contenedor.innerHTML += tarjeta;
            });
        }

        // Función para seleccionar un vuelo de ida
        function seleccionarVueloIda(index) {
            vueloIdaSeleccionado = vuelosIdaDisponibles[index];
            console.log('Vuelo de ida seleccionado:', vueloIdaSeleccionado);

            // Ocultar todas las tarjetas excepto la seleccionada
            const contenedor = document.getElementById('contenedorResultadosIda');
            const tarjetas = contenedor.querySelectorAll('.bg-white');

            tarjetas.forEach((tarjeta, i) => {
                if (i !== index) {
                    tarjeta.style.display = 'none';
                }
            });

            // Remover el evento onclick de la tarjeta seleccionada
            if (tarjetas[index]) {
                tarjetas[index].onclick = null;
                tarjetas[index].style.cursor = 'default';
                tarjetas[index].classList.remove('hover:border-green-500', 'hover:shadow-lg', 'border', 'border-gray-200');
                tarjetas[index].classList.add('border-2', 'border-green-500');

                // Agregar etiqueta "Vuelo seleccionado"
                tarjetas[index].style.position = 'relative';
                const etiqueta = document.createElement('div');
                etiqueta.className = 'absolute top-0 right-0 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-bl-lg rounded-tr-2xl';
                etiqueta.textContent = 'Vuelo seleccionado';
                tarjetas[index].insertBefore(etiqueta, tarjetas[index].firstChild);
            }

            // Si es solo ida, mostrar resumen de pago
            if (tipoVuelo === 'solo-ida') {
                // Ocultar el resumen de búsqueda
                document.getElementById('contenedorResumenIda').style.display = 'none';

                // Calcular precio unitario (10% del valor de la API)
                const precioUnitario = parseFloat(vueloIdaSeleccionado.price?.grandTotal || vueloIdaSeleccionado.price?.total || 0) * 0.1;

                // Calcular número de pasajeros sin bebés
                const numPasajerosSinBebes = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos;

                // Calcular precio total (precio unitario × pasajeros sin bebés)
                const precioTotal = precioUnitario * numPasajerosSinBebes;

                // Formatear precio total
                const precioTotalFormateado = Math.round(precioTotal).toLocaleString('es-CO');

                // Actualizar precio y número de pasajeros en el resumen
                document.getElementById('precioTotalIda').textContent = precioTotalFormateado;
                document.getElementById('numPasajerosIda').textContent = numPasajerosSinBebes;

                // Mostrar resumen de pago
                document.getElementById('resumenPagoIda').classList.remove('hidden');

                // Hacer scroll suave hacia el resumen de pago
                setTimeout(() => {
                    document.getElementById('resumenPagoIda').scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 300);

                return;
            }

            // Si es ida y vuelta, crear una copia de la tarjeta para mostrar en la vista de vuelta
            const tarjetaSeleccionada = crearTarjetaVueloIdaSeleccionada(vueloIdaSeleccionado);

            // Guardar el HTML de la tarjeta para mostrarla en la vista de vuelta
            window.tarjetaIdaHTML = tarjetaSeleccionada;

            // Buscar vuelos de vuelta
            buscarVuelosVuelta();
        }

        // Función para crear la tarjeta del vuelo de ida seleccionado (sin click)
        function crearTarjetaVueloIdaSeleccionada(vuelo) {
            const primerSegmento = vuelo.itineraries[0]?.segments[0] || {};
            const ultimoSegmento = vuelo.itineraries[0]?.segments[vuelo.itineraries[0].segments.length - 1] || {};

            const fechaHoraSalida = primerSegmento.departure?.at || '';
            const horaSalida = fechaHoraSalida ? fechaHoraSalida.split('T')[1]?.substring(0, 5) : 'N/A';

            const fechaHoraLlegada = ultimoSegmento.arrival?.at || '';
            const horaLlegada = fechaHoraLlegada ? fechaHoraLlegada.split('T')[1]?.substring(0, 5) : 'N/A';

            const codigoOrigen = primerSegmento.departure?.iataCode || '';
            const codigoDestino = ultimoSegmento.arrival?.iataCode || '';

            const duracionRaw = vuelo.itineraries[0]?.duration || '';
            const duracion = formatearDuracion(duracionRaw);

            const precioTotal = parseFloat(vuelo.price?.grandTotal || vuelo.price?.total || 0) * 0.1;
            const numeroEscalas = primerSegmento.numberOfStops || 0;
            const esDirecto = numeroEscalas === 0;

            const precioFormateado = Math.round(precioTotal).toLocaleString('es-CO');
            const fechaCompleta = formatearFechaCompleta(fechaHoraSalida);

            return `
                <div class="bg-white border-2 border-green-500 rounded-2xl p-5 relative">
                    <!-- Etiqueta de vuelo seleccionado -->
                    <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-bl-lg rounded-tr-2xl">
                        Vuelo seleccionado
                    </div>

                    <!-- Fecha del vuelo (sin icono) -->
                    <div class="mb-6">
                        <div class="text-sm text-gray-700 font-normal">${fechaCompleta}</div>
                    </div>

                    <!-- Horarios y duración -->
                    <div class="flex items-start justify-between mb-3">
                        <!-- Hora y origen -->
                        <div class="text-left">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaSalida}</div>
                            <div class="text-sm text-gray-600">${codigoOrigen}</div>
                        </div>

                        <!-- Duración y estado -->
                        <div class="flex-1 mx-6 flex flex-col items-center justify-center">
                            <div class="text-sm text-gray-900 font-medium mb-2">
                                ${esDirecto ?
                                    `<span class="text-green-600">Directo</span> • ${duracion}` :
                                    `${numeroEscalas} escala${numeroEscalas > 1 ? 's' : ''} • ${duracion}`
                                }
                            </div>
                            <div class="w-full h-px bg-gray-300 mb-2"></div>
                            <div class="text-xs text-gray-500">Conexión técnica</div>
                        </div>

                        <!-- Hora y destino -->
                        <div class="text-right">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaLlegada}</div>
                            <div class="text-sm text-gray-600">${codigoDestino}</div>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="text-center pt-4 border-t border-gray-200 mt-6">
                        <div class="text-xs text-gray-600 mb-1">Recargo unitario:</div>
                        <div class="text-2xl font-bold text-gray-900">${precioFormateado} ${monedaActual}</div>
                    </div>
                </div>
            `;
        }

        // Función para seleccionar un vuelo de vuelta
        function seleccionarVueloVuelta(index) {
            const vueloVueltaSeleccionado = vuelosVueltaDisponibles[index];
            console.log('Vuelo de vuelta seleccionado:', vueloVueltaSeleccionado);
            console.log('Vuelo de ida:', vueloIdaSeleccionado);

            // Ocultar todas las tarjetas excepto la seleccionada
            const contenedor = document.getElementById('contenedorResultadosVuelta');
            const tarjetas = contenedor.querySelectorAll('.bg-white');

            tarjetas.forEach((tarjeta, i) => {
                if (i !== index) {
                    tarjeta.style.display = 'none';
                }
            });

            // Remover el evento onclick de la tarjeta seleccionada
            if (tarjetas[index]) {
                tarjetas[index].onclick = null;
                tarjetas[index].style.cursor = 'default';
                tarjetas[index].classList.remove('hover:border-green-500', 'hover:shadow-lg', 'border', 'border-gray-200');
                tarjetas[index].classList.add('border-2', 'border-green-500');

                // Agregar etiqueta "Vuelo seleccionado"
                tarjetas[index].style.position = 'relative';
                const etiqueta = document.createElement('div');
                etiqueta.className = 'absolute top-0 right-0 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-bl-lg rounded-tr-2xl';
                etiqueta.textContent = 'Vuelo seleccionado';
                tarjetas[index].insertBefore(etiqueta, tarjetas[index].firstChild);
            }

            // Ocultar el resumen de búsqueda
            document.getElementById('contenedorResumenVuelta').style.display = 'none';

            // Calcular precio unitario de cada vuelo (10% del valor de la API)
            const precioUnitarioIda = parseFloat(vueloIdaSeleccionado.price?.grandTotal || vueloIdaSeleccionado.price?.total || 0) * 0.1;
            const precioUnitarioVuelta = parseFloat(vueloVueltaSeleccionado.price?.grandTotal || vueloVueltaSeleccionado.price?.total || 0) * 0.1;

            // Calcular número de pasajeros sin bebés
            const numPasajerosSinBebes = pasajeros.adultos + pasajeros.jovenes + pasajeros.ninos;

            // Calcular precio total ((precio ida + precio vuelta) × pasajeros sin bebés)
            const precioTotal = (precioUnitarioIda + precioUnitarioVuelta) * numPasajerosSinBebes;

            // Formatear precio total
            const precioTotalFormateado = Math.round(precioTotal).toLocaleString('es-CO');

            // Actualizar precio y número de pasajeros en el resumen
            document.getElementById('precioTotal').textContent = precioTotalFormateado;
            document.getElementById('numPasajerosTotal').textContent = numPasajerosSinBebes;

            // Mostrar resumen de pago
            document.getElementById('resumenPago').classList.remove('hidden');

            // Hacer scroll suave hacia el resumen de pago
            setTimeout(() => {
                document.getElementById('resumenPago').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }

        // Función para volver a la selección de vuelos de ida
        function volverAVuelosIda() {
            vueloIdaSeleccionado = null;
            window.tarjetaIdaHTML = null;

            // Ocultar resumen de pago
            document.getElementById('resumenPago').classList.add('hidden');

            // Mostrar nuevamente el resumen de búsqueda de vuelta
            const resumenBusqueda = document.getElementById('contenedorResumenVuelta');
            if (resumenBusqueda) {
                resumenBusqueda.style.display = 'block';
            }

            // Volver a renderizar todos los vuelos de ida
            renderizarVuelosIda(vuelosIdaDisponibles);

            mostrarSeccion('seccion-resultados-ida');
        }

        // Función auxiliar para formatear fecha completa
        function formatearFechaCompleta(fechaISO) {
            if (!fechaISO) return 'N/A';
            const fecha = new Date(fechaISO);
            const dias = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
            const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

            const dia = fecha.getDate();
            const mes = meses[fecha.getMonth()];
            const anio = fecha.getFullYear();
            const diaSemana = dias[fecha.getDay()];

            // Formato sin coma, con doble espacio: "28 noviembre 2025  Jue"
            return `${dia} ${mes} ${anio}  ${diaSemana}`;
        }

        // Función auxiliar para formatear duración
        function formatearDuracion(duracionISO) {
            if (!duracionISO) return 'N/A';
            const horas = duracionISO.match(/(\d+)H/);
            const minutos = duracionISO.match(/(\d+)M/);
            const horasTexto = horas ? horas[1] + ' h' : '';
            const minutosTexto = minutos ? minutos[1] + ' m' : '';
            return `${horasTexto} ${minutosTexto}`.trim();
        }

        // Función para crear una tarjeta de vuelo de IDA
        function crearTarjetaVueloIda(vuelo, index) {
            // Extraer información del vuelo desde la estructura de Amadeus
            const primerSegmento = vuelo.itineraries[0]?.segments[0] || {};
            const ultimoSegmento = vuelo.itineraries[0]?.segments[vuelo.itineraries[0].segments.length - 1] || {};

            // Extraer hora de salida (formato: 2025-11-28T17:30:00)
            const fechaHoraSalida = primerSegmento.departure?.at || '';
            const horaSalida = fechaHoraSalida ? fechaHoraSalida.split('T')[1]?.substring(0, 5) : 'N/A';

            // Extraer hora de llegada
            const fechaHoraLlegada = ultimoSegmento.arrival?.at || '';
            const horaLlegada = fechaHoraLlegada ? fechaHoraLlegada.split('T')[1]?.substring(0, 5) : 'N/A';

            // Códigos de aeropuerto
            const codigoOrigen = primerSegmento.departure?.iataCode || '';
            const codigoDestino = ultimoSegmento.arrival?.iataCode || '';

            // Duración (formato: PT1H25M)
            const duracionRaw = vuelo.itineraries[0]?.duration || '';
            const duracion = formatearDuracion(duracionRaw);

            // Precio (10% del valor de la API)
            const precioTotal = parseFloat(vuelo.price?.grandTotal || vuelo.price?.total || 0) * 0.1;

            // Escalas
            const numeroEscalas = primerSegmento.numberOfStops || 0;
            const esDirecto = numeroEscalas === 0;

            // Formatear precio sin símbolo de moneda, con puntos de miles
            const precioFormateado = Math.round(precioTotal).toLocaleString('es-CO');

            // Formatear fecha completa
            const fechaCompleta = formatearFechaCompleta(fechaHoraSalida);

            return `
                <div onclick="seleccionarVueloIda(${index})" class="bg-white border border-gray-200 rounded-2xl p-5 mb-4 cursor-pointer hover:border-green-500 hover:shadow-lg transition-all">
                    <!-- Fecha del vuelo (sin icono) -->
                    <div class="mb-6">
                        <div class="text-sm text-gray-700 font-normal">${fechaCompleta}</div>
                    </div>

                    <!-- Horarios y duración -->
                    <div class="flex items-start justify-between mb-3">
                        <!-- Hora y origen -->
                        <div class="text-left">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaSalida}</div>
                            <div class="text-sm text-gray-600">${codigoOrigen}</div>
                        </div>

                        <!-- Duración y estado -->
                        <div class="flex-1 mx-6 flex flex-col items-center justify-center">
                            <div class="text-sm text-gray-900 font-medium mb-2">
                                ${esDirecto ?
                                    `<span class="text-green-600">Directo</span> • ${duracion}` :
                                    `${numeroEscalas} escala${numeroEscalas > 1 ? 's' : ''} • ${duracion}`
                                }
                            </div>
                            <div class="w-full h-px bg-gray-300 mb-2"></div>
                            <div class="text-xs text-gray-500">Conexión técnica</div>
                        </div>

                        <!-- Hora y destino -->
                        <div class="text-right">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaLlegada}</div>
                            <div class="text-sm text-gray-600">${codigoDestino}</div>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="text-center pt-4 border-t border-gray-200 mt-6">
                        <div class="text-xs text-gray-600 mb-1">Recargo unitario:</div>
                        <div class="text-2xl font-bold text-gray-900">${precioFormateado} ${monedaActual}</div>
                    </div>
                </div>
            `;
        }

        // Función para crear una tarjeta de vuelo de VUELTA
        function crearTarjetaVueloVuelta(vuelo, index) {
            // Extraer información del vuelo desde la estructura de Amadeus
            const primerSegmento = vuelo.itineraries[0]?.segments[0] || {};
            const ultimoSegmento = vuelo.itineraries[0]?.segments[vuelo.itineraries[0].segments.length - 1] || {};

            // Extraer hora de salida (formato: 2025-11-28T17:30:00)
            const fechaHoraSalida = primerSegmento.departure?.at || '';
            const horaSalida = fechaHoraSalida ? fechaHoraSalida.split('T')[1]?.substring(0, 5) : 'N/A';

            // Extraer hora de llegada
            const fechaHoraLlegada = ultimoSegmento.arrival?.at || '';
            const horaLlegada = fechaHoraLlegada ? fechaHoraLlegada.split('T')[1]?.substring(0, 5) : 'N/A';

            // Códigos de aeropuerto
            const codigoOrigen = primerSegmento.departure?.iataCode || '';
            const codigoDestino = ultimoSegmento.arrival?.iataCode || '';

            // Duración (formato: PT1H25M)
            const duracionRaw = vuelo.itineraries[0]?.duration || '';
            const duracion = formatearDuracion(duracionRaw);

            // Precio (10% del valor de la API)
            const precioTotal = parseFloat(vuelo.price?.grandTotal || vuelo.price?.total || 0) * 0.1;

            // Escalas
            const numeroEscalas = primerSegmento.numberOfStops || 0;
            const esDirecto = numeroEscalas === 0;

            // Formatear precio sin símbolo de moneda, con puntos de miles
            const precioFormateado = Math.round(precioTotal).toLocaleString('es-CO');

            // Formatear fecha completa
            const fechaCompleta = formatearFechaCompleta(fechaHoraSalida);

            return `
                <div onclick="seleccionarVueloVuelta(${index})" class="bg-white border border-gray-200 rounded-2xl p-5 mb-4 cursor-pointer hover:border-green-500 hover:shadow-lg transition-all">
                    <!-- Fecha del vuelo (sin icono) -->
                    <div class="mb-6">
                        <div class="text-sm text-gray-700 font-normal">${fechaCompleta}</div>
                    </div>

                    <!-- Horarios y duración -->
                    <div class="flex items-start justify-between mb-3">
                        <!-- Hora y origen -->
                        <div class="text-left">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaSalida}</div>
                            <div class="text-sm text-gray-600">${codigoOrigen}</div>
                        </div>

                        <!-- Duración y estado -->
                        <div class="flex-1 mx-6 flex flex-col items-center justify-center">
                            <div class="text-sm text-gray-900 font-medium mb-2">
                                ${esDirecto ?
                                    `<span class="text-green-600">Directo</span> • ${duracion}` :
                                    `${numeroEscalas} escala${numeroEscalas > 1 ? 's' : ''} • ${duracion}`
                                }
                            </div>
                            <div class="w-full h-px bg-gray-300 mb-2"></div>
                            <div class="text-xs text-gray-500">Conexión técnica</div>
                        </div>

                        <!-- Hora y destino -->
                        <div class="text-right">
                            <div class="text-2xl font-bold text-gray-900 mb-1">${horaLlegada}</div>
                            <div class="text-sm text-gray-600">${codigoDestino}</div>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="text-center pt-4 border-t border-gray-200 mt-6">
                        <div class="text-xs text-gray-600 mb-1">Recargo unitario:</div>
                        <div class="text-2xl font-bold text-gray-900">${precioFormateado} ${monedaActual}</div>
                    </div>
                </div>
            `;
        }

    </script>

</body>
</html>
