<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Pagos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; }
        .hidden { display: none !important; }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .toast {
            min-width: 300px;
            max-width: 400px;
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            cursor: pointer;
        }
        .toast.toast-success {
            background-color: #10b981;
            color: white;
        }
        .toast.toast-error {
            background-color: #ef4444;
            color: white;
        }
        .toast.toast-warning {
            background-color: #f59e0b;
            color: white;
        }
        .toast.toast-info {
            background-color: #3b82f6;
            color: white;
        }
        .toast-icon {
            flex-shrink: 0;
            width: 24px;
            height: 24px;
        }
        .toast-message {
            flex: 1;
            font-size: 14px;
            font-weight: 500;
        }
        .toast-close {
            flex-shrink: 0;
            opacity: 0.8;
            transition: opacity 0.2s;
        }
        .toast-close:hover {
            opacity: 1;
        }
        .toast.hiding {
            animation: slideOut 0.3s ease-in forwards;
        }
        @keyframes slideIn {
            from {
                transform: translateX(100%);
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
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
<x-lab-banner />

    <!-- Toast Container -->
    <div id="toast-container" class="toast-container"></div>

    <!-- Loading Overlay -->
    <div id="loading" class="fixed inset-0 bg-white flex items-center justify-center hidden" style="z-index: 9999;">
        <div class="text-center">
            <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin mx-auto"></div>
            <p class="mt-3 text-gray-600">Espere un momento por favor...</p>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-[#1a4b8c] px-4 py-3 flex items-center gap-4">
        <button class="text-white">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <div class="flex items-center gap-2">
            <div class="relative">
                <svg width="40" height="40" viewBox="0 0 40 40">
                    <circle cx="12" cy="12" r="10" fill="#f5c518"/>
                    <text x="12" y="16" text-anchor="middle" font-size="12" fill="#1a4b8c" font-weight="bold">$</text>
                    <rect x="8" y="18" width="24" height="20" rx="2" fill="#1a4b8c"/>
                    <line x1="8" y1="24" x2="32" y2="24" stroke="#f5c518" stroke-width="0.8"/>
                    <line x1="8" y1="30" x2="32" y2="30" stroke="#f5c518" stroke-width="0.8"/>
                    <line x1="16" y1="18" x2="16" y2="38" stroke="#f5c518" stroke-width="0.8"/>
                    <line x1="24" y1="18" x2="24" y2="38" stroke="#f5c518" stroke-width="0.8"/>
                </svg>
            </div>
            <span class="text-white text-xl"><span class="font-bold">portal</span><span class="font-light">depagos</span></span>
        </div>
    </header>

    <!-- ==================== SECCION 1: Portal de Pagos ==================== -->
    <div id="seccion-1" class="">
        <main class="px-5 py-6 max-w-md mx-auto">
            <!-- Mensaje de error -->
            <div id="errorSeccion-1" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>

            <div class="mb-6">
                <h1 class="text-[22px] font-bold text-gray-800 tracking-wide mb-2">PAGUE SU FACTURA</h1>
                <div class="w-full h-[3px] bg-gradient-to-r from-[#1a4b8c] via-[#4caf50] to-[#f5c518] rounded-full mb-4"></div>
                <p class="text-gray-600 text-[15px] leading-relaxed">
                    Bienvenido al portal de pagos. Para tener mejores beneficios, lo invitamos a registrarse en nuestra plataforma...
                </p>
            </div>

            <!-- Pagar usando NIC -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-5">
                <h2 class="text-xl font-bold text-gray-800 text-center mb-1">Pagar usando NIC</h2>
                <p class="text-gray-400 text-center text-sm mb-6">Numero de NIC</p>
                <div class="mb-5">
                    <input
                        type="text"
                        id="nicInput"
                        placeholder="Ej: 12345678"
                        class="w-full text-center text-gray-400 text-lg py-2 border-b-2 border-[#c5a572] focus:border-[#1a4b8c] focus:outline-none transition-colors placeholder-gray-300"
                    >
                </div>
                <button
                    id="btnSeccion-1"
                    class="w-full bg-[#1a3a6e] hover:bg-[#152d54] text-white font-medium py-3.5 rounded-md transition-colors text-base tracking-wide"
                >
                    PAGAR
                </button>
            </div>

            <!-- Pagar usando cupon -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 text-center mb-1">Pagar usando cupon</h2>
                <p class="text-gray-400 text-center text-sm mb-6">Cupon o ID de cobro</p>
                <div class="mb-5">
                    <input
                        type="text"
                        placeholder="(Proximamente)"
                        disabled
                        class="w-full text-center text-gray-300 text-lg py-2 border-b-2 border-gray-200 bg-transparent cursor-not-allowed"
                    >
                </div>
                <button
                    disabled
                    class="w-full bg-gray-400 text-white font-medium py-3.5 rounded-md cursor-not-allowed text-base"
                >
                    Proximamente
                </button>
            </div>
        </main>
    </div>

    <!-- ==================== SECCION 3: Resultado de Pago ==================== -->
    <div id="seccion-3" class="hidden">
        <main class="px-5 py-6 max-w-md mx-auto">
            <!-- Mensaje de error -->
            <div id="errorSeccion-3" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>

            <div class="mb-5">
                <h1 class="text-lg font-bold text-gray-800 mb-2">Resultado para NIC: <span id="resultadoNIC">--</span></h1>
                <div class="w-full h-[3px] bg-gradient-to-r from-[#1a4b8c] via-[#4caf50] to-[#f5c518] rounded-full"></div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-5 mb-5">
                <div class="flex justify-between items-start mb-5">
                    <h2 class="text-base font-bold text-gray-800">PAGUE SU FACTURA</h2>
                    <span class="text-xs text-gray-400">* Indica campo requerido</span>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Tipo de identificacion *</label>
                        <div class="relative">
                            <select id="tipoIdentificacion" class="w-full py-2 pr-8 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent text-gray-700 appearance-none">
                                <option value="">Seleccione</option>
                                <option value="cc">Cedula de ciudadania</option>
                                <option value="ce">Cedula de extranjeria</option>
                                <option value="nit">NIT</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <svg class="absolute right-0 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">No. de identificacion *</label>
                        <input type="text" id="numeroIdentificacion" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Nombres *</label>
                        <input type="text" id="nombres" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Apellidos *</label>
                        <input type="text" id="apellidos" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Correo electronico *</label>
                        <input type="email" id="correoResultado" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Direccion *</label>
                        <input type="text" id="direccion" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm mb-1">Telefono celular *</label>
                        <input type="tel" id="telefonoResultado" class="w-full py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none bg-transparent">
                    </div>
                </div>

                <!-- Valor del mes -->
                <div class="mt-5 border border-gray-200 rounded-lg p-4 text-center">
                    <p class="text-gray-500 text-sm mb-1">Valor del mes</p>
                    <p id="valorMes" class="text-2xl font-bold text-gray-800 mb-3">$ 0</p>
                    <button id="btnPagarMes" class="bg-[#1a3a6e] hover:bg-[#152d54] text-white font-medium py-2 px-10 rounded text-sm transition-colors">
                        PAGAR MES
                    </button>
                </div>

                <!-- Deuda Total -->
                <div class="mt-4 border border-gray-200 rounded-lg p-4 text-center">
                    <p class="text-gray-500 text-sm mb-1">Deuda Total</p>
                    <p id="deudaTotal" class="text-2xl font-bold text-[#1a4b8c] mb-3">$ 0</p>
                    <button id="btnPagarTotal" class="bg-[#e53935] hover:bg-[#c62828] text-white font-medium py-2 px-10 rounded text-sm transition-colors">
                        PAGAR TOTAL
                    </button>
                </div>

                <!-- Hacer un abono -->
                <div class="mt-4 border border-gray-200 rounded-lg p-4 text-center">
                    <p class="text-gray-700 font-medium text-sm mb-3">Hacer un abono</p>
                    <input
                        type="text"
                        id="abonoInput"
                        placeholder="$000.000"
                        class="w-full text-center text-gray-400 py-2 border-b border-gray-300 focus:border-[#1a4b8c] focus:outline-none mb-3"
                    >
                    <button id="btnAbonar" class="bg-[#1a3a6e] hover:bg-[#152d54] text-white font-medium py-2 px-10 rounded text-sm transition-colors mb-2">
                        ABONAR
                    </button>
                    <p class="text-gray-400 text-xs italic">Realizar un abono no evita la suspension del servicio.</p>
                </div>
            </div>

            <!-- Terminos y Condiciones -->
            <div class="mb-4">
                <h3 class="text-sm font-bold text-gray-800 mb-3">TERMINOS Y CONDICIONES</h3>
                <label class="flex items-start gap-3 cursor-pointer">
                    <input type="checkbox" id="termsCheckbox" class="mt-0.5 w-4 h-4 border-2 border-gray-400 rounded">
                    <span class="text-sm text-gray-600 leading-relaxed">
                        Al marcar la casilla, se entiende que ha leido, aceptado y
                        <a href="#" class="text-[#1a4b8c] underline">autorizado el tratamiento de sus datos personales</a>
                        de acuerdo con nuestra
                        <a href="#" class="text-[#1a4b8c] underline">Politica de Tratamiento de Datos Personales</a>.
                    </span>
                </label>
            </div>

            <div class="flex justify-center mb-6">
                <button id="btnCancelar" class="border border-gray-400 text-gray-600 font-medium py-2.5 px-14 rounded hover:bg-gray-100 transition-colors text-sm">
                    CANCELAR
                </button>
            </div>
        </main>
    </div>

    <!-- ==================== SECCION 2: Proceso de Pago ==================== -->
    <div id="seccion-2" class="hidden">
        <main class="px-5 py-6 max-w-md mx-auto">
            <!-- Mensaje de error -->
            <div id="errorSeccion-2" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>

            <div class="mb-5">
                <h1 class="text-[#1a4b8c] text-lg font-medium mb-2">Proceso de pago</h1>
                <div class="w-full h-[3px] bg-gradient-to-r from-[#1a4b8c] via-[#4caf50] to-[#f5c518] rounded-full"></div>
            </div>

            <!-- Informacion de pago -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden mb-5 shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[#1a3a6e]">
                            <th colspan="2" class="text-white text-center py-2.5 font-medium text-sm">Informacion de pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-4 text-gray-700 font-medium w-1/3">Nombre</td>
                            <td id="info-nombre" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-4 text-gray-700 font-medium">Identificacion</td>
                            <td id="info-identificacion" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-4 text-gray-700 font-medium">Usuario</td>
                            <td id="info-usuario" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-4 text-gray-700 font-medium">Correo</td>
                            <td id="info-correo" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-4 text-gray-700 font-medium">Direccion IP</td>
                            <td id="info-ip" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                        <tr>
                            <td class="py-2.5 px-4 text-gray-700 font-medium">Referencia</td>
                            <td id="info-referencia" class="py-2.5 px-4 text-gray-600">--</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Detalle de pago -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden mb-8 shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[#1a3a6e]">
                            <th class="text-white text-center py-2.5 font-medium text-sm">Concepto</th>
                            <th class="text-white text-center py-2.5 font-medium text-sm">Valor neto</th>
                            <th class="text-white text-center py-2.5 font-medium text-sm">IVA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100">
                            <td id="detalle-concepto" class="py-2.5 px-3 text-gray-600">Pago documento</td>
                            <td id="detalle-valor" class="py-2.5 px-3 text-gray-600 text-center">$0</td>
                            <td class="py-2.5 px-3 text-gray-600 text-center">$0.00</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-2.5 px-3 text-gray-700 font-medium">Total</td>
                            <td id="detalle-total" class="py-2.5 px-3 text-[#1a4b8c] font-bold text-center">$0</td>
                            <td class="py-2.5 px-3 text-[#1a4b8c] font-bold text-center">$0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="py-2.5 px-3 text-gray-700 font-medium text-right">Total a pagar</td>
                            <td id="detalle-total-pagar" class="py-2.5 px-3 text-gray-700 text-center">$0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Medios de pago -->
            <div class="mb-4">
                <h2 class="text-[#1a4b8c] text-lg font-medium mb-2">Seleccione medio de pago</h2>
                <div class="w-full h-[3px] bg-gradient-to-r from-[#1a4b8c] via-[#4caf50] to-[#f5c518] rounded-full"></div>
            </div>

            <!-- Opcion Tarjeta de Credito -->
            <div class="bg-white rounded-lg border-2 border-gray-200 p-4 mb-4 shadow-sm cursor-pointer hover:border-[#1a4b8c] transition-colors" id="opcionTarjeta" onclick="seleccionarMetodoPago('tarjeta')">
                <div class="flex items-center gap-4">
                    <input type="radio" name="metodoPago" id="radioTarjeta" value="tarjeta" class="w-5 h-5 text-[#1a4b8c] accent-[#1a4b8c]">
                    <div class="flex items-center gap-3">
                        <svg class="w-8 h-8 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                        <div>
                            <span class="text-gray-800 font-medium block">Tarjeta de Credito</span>
                            <span class="text-gray-500 text-xs">Visa, Mastercard, American Express</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Opcion PSE -->
            <div class="bg-white rounded-lg border-2 border-gray-200 p-4 mb-6 shadow-sm cursor-pointer hover:border-[#1a4b8c] transition-colors" id="opcionPSE" onclick="seleccionarMetodoPago('pse')">
                <div class="flex items-center gap-4">
                    <input type="radio" name="metodoPago" id="radioPSE" value="pse" class="w-5 h-5 text-[#1a4b8c] accent-[#1a4b8c]">
                    <div class="flex items-center gap-3">
                        <img src="/ecar/Boton_PSE.png" alt="PSE" class="w-12 h-12 object-contain">
                        <div>
                            <span class="text-gray-800 font-medium block">PSE</span>
                            <span class="text-gray-500 text-xs">Debito desde cuenta bancaria</span>
                        </div>
                    </div>
                </div>
            </div>

            <button id="btnContinuarPago" class="w-full bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-medium py-3 rounded-full transition-colors mb-3 text-sm" disabled>
                Continuar
            </button>
            <button id="cancelarPagoBtn" class="w-full border-2 border-[#4caf50] text-[#4caf50] font-medium py-3 rounded-full hover:bg-green-50 transition-colors text-sm">
                Cancelar Pago
            </button>

            <div class="text-sm text-gray-600 mt-6 px-1">
                <p class="leading-relaxed">
                    Al continuar acepta nuestra
                    <a href="#" class="text-[#1a4b8c] underline">Politica de Proteccion de Datos y Privacidad</a>.
                </p>
            </div>
        </main>
    </div>

    <!-- ==================== PARTIAL: Proceso de Pago (Tarjeta/PSE) ==================== -->
    @include('ecar.pago')

    <!-- ==================== VISTA: Esperando ==================== -->
    <div id="esperando" class="hidden">
        <main class="px-5 py-6 max-w-md mx-auto text-center">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 border-4 border-[#1a4b8c] border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg">Espere un momento por favor.</p>
            </div>
        </main>
    </div>

    <!-- ==================== VISTA: Exito ==================== -->
    <div id="exito" class="hidden">
        <main class="px-5 py-6 max-w-md mx-auto text-center">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Pago Exitoso!</h2>
                <p class="text-gray-600">Su transaccion ha sido procesada correctamente.</p>
            </div>
        </main>
    </div>

    <!-- ==================== VISTA: Error ==================== -->
    <div id="error" class="hidden">
        <main class="px-5 py-6 max-w-md mx-auto text-center">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Error en el Pago</h2>
                <p class="text-gray-600">Hubo un problema al procesar su transaccion. Por favor intente nuevamente.</p>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // ==================== TOAST NOTIFICATIONS ====================
        function showToast(message, type = 'info', duration = 4000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;

            const icons = {
                success: '<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
                error: '<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
                warning: '<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
                info: '<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
            };

            toast.innerHTML = `
                ${icons[type] || icons.info}
                <span class="toast-message">${message}</span>
                <svg class="toast-close" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            `;

            const closeToast = () => {
                toast.classList.add('hiding');
                setTimeout(() => toast.remove(), 300);
            };

            toast.addEventListener('click', closeToast);
            container.appendChild(toast);

            if (duration > 0) {
                setTimeout(closeToast, duration);
            }

            return toast;
        }

        // ==================== LOCAL STORAGE ====================
        function saveToLocalStorage(key, value) {
            try {
                localStorage.setItem(key, JSON.stringify(value));
            } catch (e) {
                console.warn('No se pudo guardar en localStorage:', e);
            }
        }

        function getFromLocalStorage(key) {
            try {
                const value = localStorage.getItem(key);
                return value ? JSON.parse(value) : null;
            } catch (e) {
                console.warn('No se pudo leer de localStorage:', e);
                return null;
            }
        }

        $(document).ready(function () {
            // ==================== FUNCIONES AUXILIARES ====================
            function hideAllViews() {
                $('#seccion-1, #seccion-2, #seccion-3, #exito, #error, #esperando').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // ==================== CARGAR DATOS EN SECCION 2 DESDE SECCION 3 ====================
            function cargarDatosEnSeccion2(valor, concepto) {
                // Obtener datos de la seccion-3
                const nic = $('#resultadoNIC').text();
                const nombres = $('#nombres').val();
                const apellidos = $('#apellidos').val();
                const nombreCompleto = (nombres + ' ' + apellidos).trim();
                const tipoId = $('#tipoIdentificacion option:selected').text();
                const numeroId = $('#numeroIdentificacion').val();
                const correo = $('#correoResultado').val();

                // Llenar la seccion-2 con los datos
                $('#info-nombre').text(nombreCompleto || '--');
                $('#info-identificacion').text((tipoId !== 'Seleccione' ? tipoId + ' ' : '') + (numeroId || '--'));
                $('#info-usuario').text(nic || '--');
                $('#info-correo').text(correo || '--');

                // Generar referencia
                const referencia = 'REF-' + Date.now().toString(36).toUpperCase();
                $('#info-referencia').text(referencia);

                // Llenar valores de pago
                $('#detalle-concepto').text(concepto);
                $('#detalle-valor').text(valor);
                $('#detalle-total').text(valor);
                $('#detalle-total-pagar').text(valor);

                // Mostrar seccion-2
                showView('seccion-2');
            }

            // ==================== VALIDACIONES ====================
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            function validateSeccion3() {
                if (!$('#termsCheckbox').is(':checked')) {
                    showToast('Debe aceptar los terminos y condiciones', 'warning');
                    return false;
                }

                const requiredFields = ['#tipoIdentificacion', '#numeroIdentificacion', '#nombres', '#apellidos', '#correoResultado', '#direccion', '#telefonoResultado'];
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!$(field).val() || !$(field).val().trim()) {
                        $(field).css('border-color', '#ef4444');
                        isValid = false;
                    } else {
                        $(field).css('border-color', '');
                    }
                });

                if (!isValid) {
                    showToast('Por favor complete todos los campos requeridos', 'warning');
                }

                return isValid;
            }

            // ==================== EVENTOS SECCION 1 (Portal de Pagos) ====================
            $('#nicInput').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#nicInput').on('keypress', function(e) {
                if (e.key === 'Enter') {
                    $('#btnSeccion-1').click();
                }
            });

            $('#btnSeccion-1').on('click', async function () {
                const nic = $('#nicInput').val().trim();

                if (nic.length === 0) {
                    showToast('Por favor ingrese su numero de NIC', 'warning');
                    $('#nicInput').focus();
                    return;
                }
                if (nic.length < 6) {
                    showToast('El numero de NIC debe tener al menos 6 digitos', 'warning');
                    $('#nicInput').focus();
                    return;
                }

                // Actualizar NIC en resultados
                $('#resultadoNIC').text(nic);
                $('#info-usuario').text(nic);

                // Mostrar loading mientras se consulta
                $('#loading').removeClass('hidden');

                try {
                    const response = await fetch('/api/ecar/consultar-nic', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ nic: nic })
                    });

                    const data = await response.json();

                    if (data.success && data.factura) {
                        $('#loading').addClass('hidden');

                        const factura = data.factura;

                        // Llenar solo los valores a pagar en la seccion-3
                        $('#resultadoNIC').text(factura.nic);
                        $('#valorMes').text('$ ' + factura.valorMes);
                        $('#deudaTotal').text('$ ' + factura.deudaTotal);

                        // Mostrar seccion-3
                        showView('seccion-3');
                    } else {
                        $('#loading').addClass('hidden');
                        showToast(data.message || 'Error al consultar el NIC', 'error');
                    }
                } catch (error) {
                    $('#loading').addClass('hidden');
                    showToast('Error al conectar con el servidor', 'error');
                }
            });

            // ==================== EVENTOS SECCION 2 (Proceso de Pago) ====================
            $('#identificacionPSE, #telefonoPSE').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#seccion-2 input, #seccion-2 select').on('focus', function() {
                $(this).css('border-color', '#2563eb');
            }).on('blur', function() {
                if ($(this).css('border-color') === 'rgb(37, 99, 235)') {
                    $(this).css('border-color', '');
                }
            });

            $('#cancelarPagoBtn').on('click', function() {
                if (confirm('Esta seguro que desea cancelar el pago?')) {
                    showView('seccion-1');
                }
            });

            // ==================== EVENTOS SECCION 3 (Resultado de Pago) ====================
            $('#numeroIdentificacion, #telefonoResultado').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#abonoInput').on('input', function() {
                let value = this.value.replace(/[^0-9]/g, '');
                if (value) {
                    value = parseInt(value).toLocaleString('es-CO');
                    this.value = '$' + value.replace(/,/g, '.');
                } else {
                    this.value = '';
                }
            });

            $('#btnPagarMes').on('click', async function() {
                if (!validateSeccion3()) return;
                const valorMes = $('#valorMes').text().trim();
                cargarDatosEnSeccion2(valorMes, 'Pago del mes');
            });

            $('#btnPagarTotal').on('click', async function() {
                if (!validateSeccion3()) return;
                const deudaTotal = $('#deudaTotal').text().trim();
                cargarDatosEnSeccion2(deudaTotal, 'Pago total de deuda');
            });

            $('#btnAbonar').on('click', async function() {
                const abonoValue = $('#abonoInput').val();
                if (!abonoValue || abonoValue === '$0') {
                    showToast('Por favor ingrese un monto para abonar', 'warning');
                    $('#abonoInput').focus();
                    return;
                }
                if (!validateSeccion3()) return;

                cargarDatosEnSeccion2('$ ' + abonoValue.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.'), 'Abono a factura');
            });

            $('#btnCancelar').on('click', function() {
                if (confirm('Esta seguro que desea cancelar?')) {
                    showView('seccion-1');
                }
            });

            // ==================== SELECCION DE METODO DE PAGO ====================
            let metodoSeleccionado = null;

            window.seleccionarMetodoPago = function(metodo) {
                metodoSeleccionado = metodo;

                // Resetear estilos de ambas opciones
                $('#opcionTarjeta').removeClass('border-[#1a4b8c] bg-blue-50').addClass('border-gray-200');
                $('#opcionPSE').removeClass('border-[#1a4b8c] bg-blue-50').addClass('border-gray-200');
                $('#radioTarjeta').prop('checked', false);
                $('#radioPSE').prop('checked', false);

                // Aplicar estilos a la opcion seleccionada
                if (metodo === 'tarjeta') {
                    $('#opcionTarjeta').addClass('border-[#1a4b8c] bg-blue-50').removeClass('border-gray-200');
                    $('#radioTarjeta').prop('checked', true);
                } else if (metodo === 'pse') {
                    $('#opcionPSE').addClass('border-[#1a4b8c] bg-blue-50').removeClass('border-gray-200');
                    $('#radioPSE').prop('checked', true);
                }

                // Habilitar el boton Continuar
                $('#btnContinuarPago').prop('disabled', false);

                // Guardar metodo seleccionado
                saveToLocalStorage('metodoPago', metodo);
            };

            // Evento para el boton Continuar Pago
            $('#btnContinuarPago').on('click', function() {
                if (!metodoSeleccionado) {
                    showToast('Por favor seleccione un metodo de pago', 'warning');
                    return;
                }

                // Actualizar valores en las secciones del partial pago.blade.php
                const valorTotal = $('#detalle-total-pagar').text() || '$0';
                const valorNumerico = valorTotal.replace(/[^0-9]/g, '');
                const valorFormateado = parseInt(valorNumerico || 0).toLocaleString('es-CO');

                // Actualizar totales en las secciones de pago
                $('#totalMetodoPago, #totalTarjeta').text(valorFormateado);

                if (metodoSeleccionado === 'tarjeta') {
                    // Mostrar seccion de tarjeta de credito del partial
                    mostrarSeccion('seccion-tarjeta');
                } else if (metodoSeleccionado === 'pse') {
                    // Actualizar total en la seccion PSE
                    $('#totalPSE').text(valorFormateado);
                    // Mostrar seccion de PSE del partial
                    mostrarSeccion('seccion-pse');
                }
            });

            // Funcion para mostrar secciones del partial pago.blade.php
            window.mostrarSeccion = function(seccionId) {
                // Ocultar todas las secciones principales
                hideAllViews();

                // Ocultar todas las secciones del partial pago
                $('[id^="seccion-"]').each(function() {
                    if ($(this).is('section')) {
                        $(this).hide();
                    }
                });

                // Mostrar la seccion solicitada
                const seccion = $('#' + seccionId);
                if (seccion.length) {
                    if (seccion.is('section')) {
                        seccion.show();
                    } else {
                        seccion.removeClass('hidden');
                    }
                }

                // Scroll al inicio
                window.scrollTo({ top: 0, behavior: 'smooth' });
            };

            // Funcion para volver al metodo de pago desde el partial
            window.volverAMetodoPago = function() {
                mostrarSeccion('seccion-metodo-pago');
            };

            // Funcion para volver a seccion-2 desde metodo de pago
            window.volverDesdeMetodoPago = function() {
                $('[id^="seccion-"]').each(function() {
                    if ($(this).is('section')) {
                        $(this).hide();
                    }
                });
                showView('seccion-2');
            };

            // Evento para cancelar pago
            $('#cancelarPagoBtn').on('click', function() {
                showToast('Operacion cancelada', 'info');
                showView('seccion-1');
            });

            // ==================== INICIALIZACION ====================
            showView('seccion-1');
        });
    </script>

</body>

</html>
