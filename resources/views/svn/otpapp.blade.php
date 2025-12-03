<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-store">
    <title>SVN - Bancolombia</title>
    <link rel="icon" type="image/x-icon" href="https://svnegocios.apps.bancolombia.com/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bc-yellow': '#FDDA24',
                        'bc-dark': '#2C2A29',
                        'bc-gray': '#58595B',
                        'bc-gray-light': '#B3B5B8',
                        'bc-light': '#F5F5F5',
                        'bc-blue': '#0033A0',
                        'bc-info': '#E8F4FD',
                        'bc-info-border': '#0D47A1',
                        'bc-border': '#CDCDCD'
                    },
                    fontFamily: {
                        'cib': ['CIBFont Sans', 'Open Sans', 'sans-serif'],
                        'open': ['Open Sans', 'sans-serif']
                    },
                    boxShadow: {
                        'card': '0 4px 16px rgba(0, 0, 0, 0.08)'
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Light.woff2') format('woff2');
            font-weight: 300;
            font-style: normal;
        }
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Regular.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/fonts/CIBFontSans-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <style>
        .bg-trazo {
            background-image: url('/svn/trazo-auth.svg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        @media (max-width: 768px) {
            .bg-trazo {
                background-size: 1025px;
            }
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        /* Card styles */
        .bc-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 32px 28px;
        }
        /* Button styles */
        .bc-button-primary {
            background-color: #FDDA24;
            color: #2C2A29;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 24px;
            border-radius: 100px;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .bc-button-primary:hover:not(:disabled) {
            background-color: #E5C520;
        }
        .bc-button-primary:disabled {
            background-color: #E0E0E0;
            color: rgba(0,0,0,0.26);
            cursor: not-allowed;
        }
        .bc-button-secondary {
            background-color: transparent;
            color: #2C2A29;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 24px;
            border-radius: 100px;
            border: 1px solid #2C2A29;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .bc-button-secondary:hover {
            background-color: #F5F5F5;
        }
        /* Footer link styles */
        .bc-footer-link {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: #58595B;
            text-decoration: none;
            transition: color 0.2s;
        }
        .bc-footer-link:hover {
            color: #2C2A29;
            text-decoration: underline;
        }
        /* OTP Input */
        .otp-container {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .otp-input {
            width: 40px;
            height: 48px;
            border: none;
            border-bottom: 2px solid #CDCDCD;
            background: transparent;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #2C2A29;
            transition: border-color 0.2s;
        }
        .otp-input:focus {
            outline: none;
            border-bottom-color: #FDDA24;
        }
        .otp-input.filled {
            border-bottom-color: #FDDA24;
        }
        .otp-separator {
            display: flex;
            align-items: center;
            padding: 0 4px;
        }
        .otp-separator span {
            width: 8px;
            height: 2px;
            background-color: #CDCDCD;
        }
    </style>
</head>

<body class="bg-bc-light min-h-screen font-open">
    <x-lab-banner />

    <!-- Main Container -->
    <div class="min-h-screen bg-trazo">
        <!-- Header -->
        <div class="pt-8 md:pt-12 text-center">
            <div class="flex flex-col items-center mb-9">
                <img src="/svn/bancolombia-horizontal.svg" alt="Bancolombia" class="h-8 md:h-10 mb-4">
                <h1 class="font-cib text-2xl md:text-3xl font-light text-bc-dark">Sucursal Virtual Negocios</h1>
            </div>
        </div>

        <!-- Content -->
        <div class="flex flex-col items-center px-4 md:px-6">
            <!-- Clave Dinámica Card -->
            <div class="w-full max-w-sm bc-card mb-8 relative">
                <!-- Close Button -->
                <button id="btn-close" class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Badge Clave Dinámica -->
                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <!-- Title -->
                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Clave Dinámica</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Ingresa los 6 dígitos de la Clave Dinámica. Consúltala ingresando a la <strong>app Negocios</strong>.
                    </p>
                </div>

                <!-- OTP Input -->
                <form id="otp-form" autocomplete="off" novalidate>
                    <div class="mb-4">
                        <div class="otp-container">
                            <input type="text" maxlength="1" class="otp-input" data-index="0" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="1" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="2" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="3" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="4" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="5" inputmode="numeric" pattern="[0-9]*">
                        </div>
                        <p class="text-center text-bc-gray text-sm mt-3">Ingresa el código de 6 dígitos</p>
                    </div>

                    <!-- Buttons -->
                    <div class="space-y-3 mt-8">
                        <button type="submit"
                                id="btn-continue"
                                disabled
                                class="bc-button-primary">
                            Continuar
                        </button>
                        <button type="button"
                                id="btn-cancel"
                                class="bc-button-secondary">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white mt-auto">
            <div class="max-w-lg mx-auto px-4">
                <!-- Links - Vertical list -->
                <div class="flex flex-col items-center gap-4 py-6">
                    <a href="#" class="bc-footer-link">Conoce la sucursal virtual</a>
                    <a href="#" class="bc-footer-link">Conversor de pagos PAB</a>
                    <a href="#" class="bc-footer-link">Conversor de pagos SAP</a>
                    <a href="#"
                       class="bc-footer-link">Solicitudes y novedades</a>
                    <a href="#" target="_blank" rel="noopener noreferrer"
                       class="bc-footer-link">Contáctanos</a>
                    <a href="#"
                       target="_blank" rel="noopener noreferrer" class="bc-footer-link">Aprende sobre seguridad</a>
                    <a href="#"
                       target="_blank" rel="noopener noreferrer" class="bc-footer-link">Preguntas frecuentes</a>
                </div>

                <!-- Divider -->
                <div class="w-full h-px bg-bc-gray-light"></div>

                <!-- Bottom - Centered -->
                <div class="flex flex-col items-center text-center py-6 gap-3">
                    <img src="/svn/bancolombia-horizontal.svg" alt="Bancolombia" style="width: 150px;">
                    <p class="text-sm text-bc-gray font-open">Copyright © 2025 Bancolombia.</p>
                    <div style="height: 14px; overflow: visible; display: flex; align-items: center; justify-content: center;">
                        <img src="/svn/logo-vigilado.svg" alt="Vigilado Superintendencia Financiera de Colombia" style="height: 10rem; transform: rotate(90deg);">
                    </div>
                    <div class="text-sm text-bc-gray font-open mt-2">
                        <p>Dirección IP: {{ request()->ip() }}</p>
                        <p>{{ ucfirst(\Carbon\Carbon::now('America/Bogota')->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY, h:mm:ss a')) }}</p>
                    </div>
                </div>

                <!-- Stroke decoration - Franja de colores -->
                <div class="flex justify-center pb-4">
                    <img src="/svn/14.svg" alt="" class="w-full" aria-hidden="true">
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal: Sesión Inactiva -->
    <div id="modal-inactive" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-4 text-center shadow-xl">
            <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                </svg>
            </div>
            <h3 class="font-cib text-xl font-bold text-bc-dark mb-3">Sesión inactiva</h3>
            <p class="text-bc-gray text-sm mb-6 font-open">No hemos detectado actividad en los últimos 5 minutos, por seguridad cerraremos tu sesión.</p>
            <button id="btn-modal-inactive" class="bc-button-primary">
                Entendido
            </button>
        </div>
    </div>

    <!-- Modal: Error -->
    <div id="modal-error" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-8 max-w-sm mx-4 text-center shadow-xl relative">
            <button id="close-modal-error" class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
            <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/>
                </svg>
            </div>
            <h3 class="font-cib text-xl font-bold text-bc-dark mb-3">Algo ocurrió</h3>
            <p class="text-bc-gray text-sm mb-6 font-open">No fue posible cargar la información</p>
            <button id="btn-retry" class="bc-button-primary">
                Intentar nuevamente
            </button>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading" class="fixed inset-0 bg-white/90 flex items-center justify-center z-50 hidden">
        <div class="text-center">
            <div class="w-16 h-16 border-4 border-bc-yellow border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-bc-gray font-open">Cargando...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // OTP Input handling
            const otpInputs = document.querySelectorAll('.otp-input');
            const btnContinue = document.getElementById('btn-continue');
            const otpForm = document.getElementById('otp-form');

            // Focus first input on load
            otpInputs[0].focus();

            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function(e) {
                    // Only allow numbers
                    this.value = this.value.replace(/[^0-9]/g, '');

                    if (this.value.length === 1) {
                        this.classList.add('filled');
                        // Move to next input
                        if (index < otpInputs.length - 1) {
                            otpInputs[index + 1].focus();
                        }
                    } else {
                        this.classList.remove('filled');
                    }

                    // Check if all inputs are filled
                    checkComplete();
                });

                input.addEventListener('keydown', function(e) {
                    // Handle backspace
                    if (e.key === 'Backspace' && this.value === '' && index > 0) {
                        otpInputs[index - 1].focus();
                        otpInputs[index - 1].value = '';
                        otpInputs[index - 1].classList.remove('filled');
                        checkComplete();
                    }
                });

                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);

                    pastedData.split('').forEach((char, i) => {
                        if (otpInputs[i]) {
                            otpInputs[i].value = char;
                            otpInputs[i].classList.add('filled');
                        }
                    });

                    // Focus last filled input or next empty
                    const lastIndex = Math.min(pastedData.length, otpInputs.length) - 1;
                    if (lastIndex >= 0 && lastIndex < otpInputs.length - 1) {
                        otpInputs[lastIndex + 1].focus();
                    } else if (lastIndex === otpInputs.length - 1) {
                        otpInputs[lastIndex].focus();
                    }

                    checkComplete();
                });
            });

            function checkComplete() {
                const allFilled = Array.from(otpInputs).every(input => input.value.length === 1);
                btnContinue.disabled = !allFilled;
            }

            // Form submit
            otpForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const otp = Array.from(otpInputs).map(input => input.value).join('');
                console.log('OTP submitted:', otp);
            });

            // Close button
            document.getElementById('btn-close')?.addEventListener('click', function() {
                window.history.back();
            });

            // Cancel button
            document.getElementById('btn-cancel')?.addEventListener('click', function() {
                window.history.back();
            });

            // Modal handlers
            document.getElementById('btn-modal-inactive')?.addEventListener('click', function() {
                document.getElementById('modal-inactive').classList.add('hidden');
            });

            document.getElementById('close-modal-error')?.addEventListener('click', function() {
                document.getElementById('modal-error').classList.add('hidden');
            });

            document.getElementById('btn-retry')?.addEventListener('click', function() {
                document.getElementById('modal-error').classList.add('hidden');
            });
        });
    </script>
</body>

</html>
