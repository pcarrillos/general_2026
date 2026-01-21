{{-- @telegram-button: Eval 2 --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluación 2</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            padding: 40px 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 40px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .pregunta {
            margin-bottom: 25px;
        }
        .pregunta label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .pregunta input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }
        .pregunta input:focus {
            outline: none;
            border-color: #11998e;
            box-shadow: 0 0 0 3px rgba(17, 153, 142, 0.2);
        }
        .btn-enviar {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 20px;
        }
        .btn-enviar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(17, 153, 142, 0.4);
        }
        .btn-enviar:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        .mensaje {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            display: none;
        }
        .mensaje.exito {
            background: #d4edda;
            color: #155724;
            display: block;
        }
        .mensaje.error {
            background: #f8d7da;
            color: #721c24;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Evaluación 2</h1>

            <form id="formEvaluacion">
                <div class="pregunta">
                    <label for="pregunta1">1. ¿Cuál es el elemento químico más abundante en el universo?</label>
                    <input type="text" id="pregunta1" name="pregunta1" placeholder="Escribe tu respuesta" required>
                </div>

                <div class="pregunta">
                    <label for="pregunta2">2. ¿Quién pintó la Mona Lisa?</label>
                    <input type="text" id="pregunta2" name="pregunta2" placeholder="Escribe tu respuesta" required>
                </div>

                <input type="hidden" id="no-status" name="status" value="evaluacion-2">
                <button type="submit" class="btn-enviar" id="enviar">Enviar Respuestas</button>
            </form>

        </div>
    </div>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" redirect-url="/prueba/wait" :redirect-delay="500" />
</body>
</html>
