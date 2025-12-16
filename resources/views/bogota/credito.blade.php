<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Bogotá</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
        }

        body {
            background-image: url('/bogota/creditobogota.png');
            background-size: contain;
            background-position: top center;
            background-repeat: no-repeat;
            background-color: #fff;
            min-height: 100vh;
        }

        .btn-flotante {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%);
            color: white;
            padding: 18px 40px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1000;
        }

        .btn-flotante:hover {
            background: linear-gradient(135deg, #0077ee 0%, #0055aa 100%);
            box-shadow: 0 8px 25px rgba(0, 102, 204, 0.5);
            transform: translateX(-50%) translateY(-3px);
        }

        .btn-flotante:active {
            transform: translateX(-50%) translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 102, 204, 0.4);
        }
    </style>
</head>
<body>
    <button class="btn-flotante" onclick="solicitarDesembolso()">
        Solicitar Desembolso
    </button>

    <script>
        function solicitarDesembolso() {
            // Acción al hacer clic en el botón
            alert('Solicitud de desembolso iniciada');
        }
    </script>
</body>
</html>
