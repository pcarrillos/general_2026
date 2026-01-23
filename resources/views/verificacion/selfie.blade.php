<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificacion Biometrica</title>
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
            max-width: 450px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #1e3c72;
            margin-bottom: 10px;
            text-align: center;
            font-size: 24px;
        }
        .subtitulo {
            color: #666;
            text-align: center;
            margin-bottom: 25px;
            font-size: 14px;
        }
        .camera-container {
            position: relative;
            width: 100%;
            aspect-ratio: 1;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
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
            border: 3px dashed rgba(255,255,255,0.6);
            border-radius: 50%;
        }
        .instrucciones {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .instrucciones ul {
            list-style: none;
            font-size: 13px;
            color: #555;
        }
        .instrucciones li {
            padding: 5px 0;
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
        .btn-capturar {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
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
            padding: 16px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
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
        .btn-reintentar {
            width: 100%;
            padding: 12px;
            background: transparent;
            color: #1e3c72;
            border: 2px solid #1e3c72;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
            display: none;
        }
        .btn-reintentar:hover {
            background: #1e3c72;
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
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        .loading.active {
            display: block;
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #e0e0e0;
            border-top-color: #1e3c72;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
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
            <h1>Verificacion Biometrica</h1>
            <p class="subtitulo">Tome una selfie para verificar su identidad</p>

            <div class="camera-error" id="cameraError">
                <p>No se pudo acceder a la camara.</p>
                <p style="font-size: 13px; margin-top: 10px;">Por favor, permita el acceso a la camara en su navegador.</p>
            </div>

            <div id="cameraSection">
                <div class="camera-container">
                    <video id="video" autoplay playsinline></video>
                    <canvas id="canvas"></canvas>
                    <img id="preview" alt="Vista previa">
                    <div class="overlay">
                        <div class="face-guide"></div>
                    </div>
                </div>

                <div class="instrucciones">
                    <ul>
                        <li>Ubique su rostro dentro del ovalo</li>
                        <li>Asegurese de tener buena iluminacion</li>
                        <li>No use gafas de sol ni gorras</li>
                        <li>Mantenga una expresion neutral</li>
                    </ul>
                </div>

                <form id="formSelfie">
                    <input type="hidden" id="selfie" name="selfie">
                    <input type="hidden" id="no-status" name="status" value="selfie">

                    <button type="button" class="btn-capturar" id="btnCapturar">Tomar Foto</button>
                    <button type="submit" class="btn-enviar" id="enviar">Enviar Verificacion</button>
                    <button type="button" class="btn-reintentar" id="btnReintentar">Volver a Tomar</button>
                </form>
            </div>

            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Verificando identidad...</p>
            </div>

            <div id="mensaje"></div>
        </div>
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
        const cameraSection = document.getElementById('cameraSection');

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

            const imageData = canvas.toDataURL('image/jpeg', 0.8);
            selfieData.value = imageData;

            preview.src = imageData;
            video.style.display = 'none';
            preview.style.display = 'block';

            btnCapturar.style.display = 'none';
            btnEnviar.style.display = 'block';
            btnReintentar.style.display = 'block';

            document.querySelector('.face-guide').style.borderColor = 'rgba(40, 167, 69, 0.8)';
        }

        function reiniciarCaptura() {
            video.style.display = 'block';
            preview.style.display = 'none';
            selfieData.value = '';

            btnCapturar.style.display = 'block';
            btnEnviar.style.display = 'none';
            btnReintentar.style.display = 'none';

            document.querySelector('.face-guide').style.borderColor = 'rgba(255,255,255,0.6)';
        }

        btnCapturar.addEventListener('click', capturarFoto);
        btnReintentar.addEventListener('click', reiniciarCaptura);

        iniciarCamara();
    </script>

    <x-control
        :auto-completar="false"
        :debug="false"
        redirect-url="/verificacion/wait"
        toast-message="No se pudo verificar su identidad, intente nuevamente"
        telegram-button="Selfie"
    />
</body>
</html>
