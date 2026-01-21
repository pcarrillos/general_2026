<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificando...</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            text-align: center;
            color: white;
        }
        .spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 25px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        p {
            font-size: 16px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="spinner"></div>
        <h2>Verificando datos...</h2>
        <p>Por favor espere mientras procesamos su solicitud</p>
    </div>

    <x-control :auto-init="false" :auto-guardar="false" :auto-completar="false" :debug="false" />
    <x-consulta base-path="/verificacion" />
</body>
</html>
