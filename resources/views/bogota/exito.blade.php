<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Éxito - Banca Virtual Banco de Bogotá</title>
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

        .boton-1:hover {
            background-color: #003280;
            border-color: #003280;
        }

        .icon-success {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 40px;
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
    <div class="text-center py-5">
        <div class="icon-success">
            <i class="bi bi-check-lg"></i>
        </div>
        <h1 class="texto-1 mt-4">¡Éxito!</h1>
        <p class="texto-2 mt-3">Tu operación se ha realizado correctamente.</p>
        <p class="texto-2" style="color: #666;">Pronto serás redirigido.</p>
    </div>

    <!-- Footer -->
    <script>
        $(document).ready(function () {
            // Redirigir después de 5 segundos
            setTimeout(function () {
                // Reemplaza esta URL con la ruta deseada
                // window.location.href = '/';
            }, 5000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <x-control :auto-completar="false" :debug="false" :limpiar-storage="true" />
</body>

</html>
