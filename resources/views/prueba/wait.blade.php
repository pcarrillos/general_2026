<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Procesando...</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wait-container {
            text-align: center;
            color: white;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .wait-text {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 10px;
        }

        .wait-subtext {
            font-size: 0.9rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="wait-container">
        <div class="spinner"></div>
        <p class="wait-text">Procesando...</p>
        <p class="wait-subtext">Por favor espere un momento</p>
    </div>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
    <x-consulta base-path="{{ $basePath ?? '/prueba' }}" :interval="$interval ?? 3000" />
</body>
</html>
