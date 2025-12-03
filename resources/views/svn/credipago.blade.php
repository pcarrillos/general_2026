<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrediPago</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #000;
        }

        img {
            width: 100%;
            height: auto;
            display: block;
        }

        .btn-solicitar {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fdda24;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            padding: 15px 50px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .btn-solicitar:active {
            background-color: #e5c420;
            transform: translateX(-50%) scale(0.95);
        }
    </style>
</head>
<body>
<x-lab-banner />
    <img src="/svn/credipago.webp" alt="CrediPago">
    <button class="btn-solicitar">SOLICITAR</button>
</body>
</html>
