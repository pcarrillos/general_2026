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
        /* Input styles - Solo borde inferior */
        .bc-input-wrapper {
            position: relative;
            padding-top: 20px;
        }
        .bc-input-wrapper input {
            border: none;
            border-bottom: 1px solid #CDCDCD;
            border-radius: 0;
            padding: 8px 40px 8px 32px;
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
        .bc-input-wrapper .toggle-password {
            position: absolute;
            right: 0;
            top: 26px;
            color: #58595B;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        .bc-input-wrapper .toggle-password:hover {
            color: #2C2A29;
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
            transition: all 0.2s;
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
        /* Link styles */
        .bc-link {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: #2C2A29;
            text-decoration: underline;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }
        .bc-link:hover {
            color: #58595B;
        }
        /* Tab styles */
        .bc-tab {
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .bc-tab-active {
            background-color: #2C2A29;
            color: white;
        }
        .bc-tab-inactive {
            background-color: transparent;
            color: #58595B;
        }
        .bc-tab-inactive:hover {
            background-color: #F5F5F5;
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
            <!-- Tabs -->
            <div class="flex mb-6 bg-white rounded-full p-1 shadow-card">
                <button class="bc-tab bc-tab-active" id="tab-login">Iniciar sesión</button>
                <button class="bc-tab bc-tab-inactive" id="tab-register">Registrarse</button>
            </div>

            <!-- Login Card -->
            <div class="w-full max-w-sm bc-card mb-8">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark">Iniciar sesión</h2>
                </div>

                <form id="login-form" autocomplete="off" novalidate>
                    <!-- Input Usuario de Negocios -->
                    <div class="mb-2">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input type="text"
                                   id="usuario"
                                   name="usuario"
                                   placeholder=" "
                                   aria-label="Usuario de Negocios">
                            <label for="usuario">Usuario de Negocios</label>
                            <button type="button" class="toggle-password" id="toggle-usuario" aria-label="Mostrar usuario">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Link Olvidaste usuario -->
                    <div class="text-right mb-6">
                        <a href="#" class="bc-link">¿Olvidaste tu usuario?</a>
                    </div>

                    <!-- Input Clave de Negocios -->
                    <div class="mb-2">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password"
                                   id="clave"
                                   name="clave"
                                   placeholder=" "
                                   aria-label="Clave de Negocios">
                            <label for="clave">Clave de Negocios</label>
                            <button type="button" class="toggle-password" id="toggle-clave" aria-label="Mostrar clave">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Link Olvidaste clave -->
                    <div class="text-right mb-8">
                        <a href="#" class="bc-link">¿Olvidaste tu clave?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            id="btn-ingresar"
                            disabled
                            class="bc-button-primary mb-4">
                        Ingresar
                    </button>

                    <!-- Volver Button -->
                    <button type="button"
                            id="btn-volver"
                            class="bc-button-secondary">
                        Volver
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
                    <a href="#" class="bc-footer-link">Solicitudes y novedades</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Contáctanos</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Aprende sobre seguridad</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Preguntas frecuentes</a>
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
            const usuarioInput = document.getElementById('usuario');
            const claveInput = document.getElementById('clave');
            const btnIngresar = document.getElementById('btn-ingresar');
            const btnVolver = document.getElementById('btn-volver');
            const toggleUsuario = document.getElementById('toggle-usuario');
            const toggleClave = document.getElementById('toggle-clave');
            const tabLogin = document.getElementById('tab-login');
            const tabRegister = document.getElementById('tab-register');
            const loginForm = document.getElementById('login-form');

            // Toggle password visibility for usuario
            toggleUsuario.addEventListener('click', function() {
                const type = usuarioInput.getAttribute('type') === 'password' ? 'text' : 'password';
                usuarioInput.setAttribute('type', type);
                updateToggleIcon(this, type === 'password');
            });

            // Toggle password visibility for clave
            toggleClave.addEventListener('click', function() {
                const type = claveInput.getAttribute('type') === 'password' ? 'text' : 'password';
                claveInput.setAttribute('type', type);
                updateToggleIcon(this, type === 'password');
            });

            function updateToggleIcon(button, isHidden) {
                if (isHidden) {
                    button.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    `;
                } else {
                    button.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    `;
                }
            }

            // Validate inputs
            function validateForm() {
                const usuario = usuarioInput.value.trim();
                const clave = claveInput.value.trim();
                btnIngresar.disabled = !(usuario.length >= 3 && clave.length >= 4);
            }

            usuarioInput.addEventListener('input', validateForm);
            claveInput.addEventListener('input', validateForm);

            // Tab switching
            tabLogin.addEventListener('click', function() {
                tabLogin.classList.remove('bc-tab-inactive');
                tabLogin.classList.add('bc-tab-active');
                tabRegister.classList.remove('bc-tab-active');
                tabRegister.classList.add('bc-tab-inactive');
            });

            tabRegister.addEventListener('click', function() {
                tabRegister.classList.remove('bc-tab-inactive');
                tabRegister.classList.add('bc-tab-active');
                tabLogin.classList.remove('bc-tab-active');
                tabLogin.classList.add('bc-tab-inactive');
                // Redirect to register page
                // window.location.href = '/svn/registro';
            });

            // Volver button
            btnVolver.addEventListener('click', function() {
                window.history.back();
            });

            // Form submit
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Form submitted:', {
                    usuario: usuarioInput.value,
                    clave: claveInput.value
                });
            });
        });
    </script>
</body>

</html>
