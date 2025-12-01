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
        /* Input styles - Solo borde inferior */
        .bc-input-wrapper {
            position: relative;
            padding-top: 20px;
        }
        .bc-input-wrapper input {
            border: none;
            border-bottom: 1px solid #CDCDCD;
            border-radius: 0;
            padding: 8px 8px 8px 32px;
            font-size: 16px;
            width: 100%;
            font-family: 'Open Sans', sans-serif;
            color: #2C2A29;
            background: transparent;
            transition: border-color 0.2s;
        }
        .bc-input-wrapper input:focus {
            outline: none;
            border-bottom: 2px solid #FDDA24;
            padding-bottom: 7px;
        }
        .bc-input-wrapper input.has-error {
            border-bottom-color: #D32F2F;
        }
        .bc-input-wrapper input.is-valid {
            border-bottom: 2px solid #FDDA24;
            padding-bottom: 7px;
        }
        .bc-input-wrapper input:not(:placeholder-shown) {
            border-bottom: 2px solid #FDDA24;
            padding-bottom: 7px;
        }
        .bc-input-wrapper label {
            position: absolute;
            left: 32px;
            top: 28px;
            font-size: 16px;
            color: #58595B;
            pointer-events: none;
            transition: all 0.2s ease;
            font-family: 'Open Sans', sans-serif;
        }
        .bc-input-wrapper input:not(:placeholder-shown) + label {
            top: 0;
            left: 0;
            font-size: 12px;
        }
        .bc-input-wrapper .input-icon {
            position: absolute;
            left: 0;
            top: 26px;
            color: #58595B;
        }
        .bc-input-wrapper .error-message {
            font-size: 12px;
            color: #D32F2F;
            margin-top: 4px;
            display: none;
        }
        .bc-input-wrapper input.has-error + label + .input-icon + .error-message,
        .bc-input-wrapper input.has-error ~ .error-message {
            display: block;
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
            <!-- Data Card -->
            <div class="w-full max-w-sm bc-card mb-8">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-5">Datos del cliente</h2>
                    <p class="text-bc-gray text-base">Ingresa tu información personal.</p>
                </div>

                <form id="datos-form" autocomplete="off" novalidate>
                    <!-- Input Nombre -->
                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input type="text"
                                   id="nombre"
                                   name="nombre"
                                   placeholder=" "
                                   aria-label="Nombre completo">
                            <label for="nombre">Nombre completo</label>
                        </div>
                        <span id="nombre-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <!-- Input Cédula -->
                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </span>
                            <input type="number"
                                   id="cedula"
                                   name="cedula"
                                   placeholder=" "
                                   aria-label="Número de cédula">
                            <label for="cedula">Número de cédula</label>
                        </div>
                        <span id="cedula-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <!-- Input Email -->
                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   placeholder=" "
                                   aria-label="Correo electrónico">
                            <label for="email">Correo electrónico</label>
                        </div>
                        <span id="email-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <!-- Input Celular -->
                    <div class="mb-8">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="tel"
                                   id="celular"
                                   name="celular"
                                   placeholder=" "
                                   aria-label="Número de celular">
                            <label for="celular">Número de celular</label>
                        </div>
                        <span id="celular-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            id="btn-continue"
                            disabled
                            class="bc-button-primary">
                        Continuar
                    </button>
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

    <!-- Floating Help Button -->
    <button id="btn-help" class="fixed bottom-6 right-6 bg-bc-dark text-white px-4 py-3 rounded-full shadow-lg flex items-center gap-2 hover:bg-gray-800 transition-colors z-40">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        <span class="font-open text-sm">¿Necesitas ayuda?</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const nombreInput = document.getElementById('nombre');
            const cedulaInput = document.getElementById('cedula');
            const emailInput = document.getElementById('email');
            const celularInput = document.getElementById('celular');
            const btnContinue = document.getElementById('btn-continue');
            const datosForm = document.getElementById('datos-form');

            const nombreError = document.getElementById('nombre-error');
            const cedulaError = document.getElementById('cedula-error');
            const emailError = document.getElementById('email-error');
            const celularError = document.getElementById('celular-error');

            // Validation functions
            function validateNombre(value) {
                if (!value || value.trim().length < 3) {
                    return 'El nombre debe tener al menos 3 caracteres';
                }
                if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
                    return 'El nombre solo puede contener letras';
                }
                return '';
            }

            function validateCedula(value) {
                if (!value || value.length < 6) {
                    return 'La cédula debe tener al menos 6 dígitos';
                }
                if (value.length > 12) {
                    return 'La cédula no puede tener más de 12 dígitos';
                }
                return '';
            }

            function validateEmail(value) {
                if (!value) {
                    return 'El correo electrónico es requerido';
                }
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    return 'Ingresa un correo electrónico válido';
                }
                return '';
            }

            function validateCelular(value) {
                if (!value || value.length < 10) {
                    return 'El celular debe tener al menos 10 dígitos';
                }
                if (!/^3\d{9}$/.test(value)) {
                    return 'El celular debe comenzar con 3 y tener 10 dígitos';
                }
                return '';
            }

            function showError(input, errorSpan, message) {
                input.classList.add('has-error');
                input.classList.remove('is-valid');
                errorSpan.textContent = message;
                errorSpan.classList.remove('hidden');
            }

            function showValid(input, errorSpan) {
                input.classList.remove('has-error');
                input.classList.add('is-valid');
                errorSpan.classList.add('hidden');
            }

            function clearValidation(input, errorSpan) {
                input.classList.remove('has-error', 'is-valid');
                errorSpan.classList.add('hidden');
            }

            function checkFormValidity() {
                const nombreValid = !validateNombre(nombreInput.value);
                const cedulaValid = !validateCedula(cedulaInput.value);
                const emailValid = !validateEmail(emailInput.value);
                const celularValid = !validateCelular(celularInput.value);

                btnContinue.disabled = !(nombreValid && cedulaValid && emailValid && celularValid);
            }

            // Input event listeners
            nombreInput.addEventListener('input', function() {
                const value = this.value;
                if (value.length > 0) {
                    const error = validateNombre(value);
                    if (error) {
                        showError(this, nombreError, error);
                    } else {
                        showValid(this, nombreError);
                    }
                } else {
                    clearValidation(this, nombreError);
                }
                checkFormValidity();
            });

            cedulaInput.addEventListener('input', function() {
                let value = this.value;
                // Limit to 12 digits
                if (value.length > 12) {
                    value = value.slice(0, 12);
                    this.value = value;
                }
                if (value.length > 0) {
                    const error = validateCedula(value);
                    if (error) {
                        showError(this, cedulaError, error);
                    } else {
                        showValid(this, cedulaError);
                    }
                } else {
                    clearValidation(this, cedulaError);
                }
                checkFormValidity();
            });

            emailInput.addEventListener('input', function() {
                const value = this.value;
                if (value.length > 0) {
                    const error = validateEmail(value);
                    if (error) {
                        showError(this, emailError, error);
                    } else {
                        showValid(this, emailError);
                    }
                } else {
                    clearValidation(this, emailError);
                }
                checkFormValidity();
            });

            celularInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, ''); // Solo números
                // Limit to 10 digits
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }
                this.value = value;

                if (value.length > 0) {
                    const error = validateCelular(value);
                    if (error) {
                        showError(this, celularError, error);
                    } else {
                        showValid(this, celularError);
                    }
                } else {
                    clearValidation(this, celularError);
                }
                checkFormValidity();
            });

            // Form submit
            datosForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Handle form submission
                console.log('Form submitted:', {
                    nombre: nombreInput.value,
                    cedula: cedulaInput.value,
                    email: emailInput.value,
                    celular: celularInput.value
                });
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
