<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Usuario - Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand { font-size: 20px; font-weight: 700; color: #1f2937; }
        .navbar-menu { display: flex; align-items: center; gap: 24px; }
        .navbar-menu a { color: #4b5563; text-decoration: none; font-size: 14px; font-weight: 500; }
        .navbar-menu a:hover { color: #667eea; }
        .navbar-user { display: flex; align-items: center; gap: 16px; }
        .navbar-user span { color: #374151; font-size: 14px; }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-secondary { background: #6b7280; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-warning { background: #f59e0b; color: white; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .input-group { display: flex; gap: 8px; align-items: center; }
        .input-group input { flex: 1; }
        .tunnel-status { font-size: 12px; margin-top: 4px; }
        .tunnel-status.active { color: #10b981; }
        .tunnel-status.pending { color: #f59e0b; }
        .tunnel-status.failed { color: #ef4444; }
        .alert { padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; font-size: 14px; }
        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-error { background: #fee2e2; color: #991b1b; }

        .main-content { padding: 32px; max-width: 600px; margin: 0 auto; }
        .page-header { margin-bottom: 24px; }
        .page-header h1 { color: #1f2937; font-size: 24px; font-weight: 700; }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; color: #374151; font-size: 14px; font-weight: 500; margin-bottom: 6px; }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error-text { color: #ef4444; font-size: 12px; margin-top: 4px; }
        .form-actions { display: flex; gap: 12px; margin-top: 24px; }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            min-width: 300px;
            max-width: 400px;
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: toastSlideIn 0.3s ease-out;
            position: relative;
        }

        .toast.hiding {
            animation: toastSlideOut 0.3s ease-in forwards;
        }

        @keyframes toastSlideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes toastSlideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }

        .toast-success {
            background: #10b981;
            color: white;
        }

        .toast-error {
            background: #ef4444;
            color: white;
        }

        .toast-warning {
            background: #f59e0b;
            color: white;
        }

        .toast-info {
            background: #3b82f6;
            color: white;
        }

        .toast-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .toast-message {
            flex: 1;
            font-size: 14px;
            font-weight: 500;
        }

        .toast-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
            opacity: 0.8;
            padding: 0;
            line-height: 1;
        }

        .toast-close:hover {
            opacity: 1;
        }

        /* Modal de confirmación */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 24px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            transform: scale(0.9);
            transition: transform 0.2s;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .modal-message {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Dashboard</span>
        <div class="navbar-menu">
            <a href="{{ route('dashboard.index') }}">Inicio</a>
            <a href="{{ route('dashboard.usuarios.index') }}">Usuarios</a>
            @if(auth()->user()->esAdmin())
                <a href="{{ route('admin.pendientes') }}">Pendientes</a>
            @endif
        </div>
        <div class="navbar-user">
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Salir</button>
            </form>
        </div>
    </nav>

    <main class="main-content">
        <div class="page-header">
            <h1>Editar Usuario #{{ $usuario->id }}</h1>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('dashboard.usuarios.update', $usuario) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="usuario">Usuario *</label>
                    <input type="text" name="usuario" id="usuario" value="{{ old('usuario', $usuario->usuario) }}" required>
                    @error('usuario')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="chatids">Chat IDs</label>
                    <input type="text" name="chatids" id="chatids" value="{{ old('chatids', $usuario->chatids) }}">
                    @error('chatids')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="dominio">Dominio del Tunel</label>
                    <div class="input-group">
                        <input type="text" name="dominio" id="dominio" value="{{ old('dominio', $usuario->dominio) }}" readonly>
                        <button type="button" class="btn btn-warning btn-sm" onclick="regenerarTunel()">Regenerar</button>
                    </div>
                    @if($usuario->tunnel_status)
                        <p class="tunnel-status {{ $usuario->tunnel_status }}">
                            Estado: {{ ucfirst($usuario->tunnel_status) }}
                            @if($usuario->tunnel_pid) (PID: {{ $usuario->tunnel_pid }}) @endif
                        </p>
                    @endif
                    @error('dominio')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="directorio">Directorio</label>
                    <input type="text" name="directorio" id="directorio" value="{{ old('directorio', $usuario->directorio) }}">
                    @error('directorio')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                        <option value="activo" {{ old('estado', $usuario->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado', $usuario->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('dashboard.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Formulario oculto para regenerar tunel -->
    <form id="regenerarTunelForm" method="POST" action="{{ route('dashboard.usuarios.regenerar-tunel', $usuario) }}" style="display: none;">
        @csrf
    </form>

    <!-- Contenedor de Toast -->
    <div id="toastContainer" class="toast-container"></div>

    <!-- Modal de confirmación -->
    <div id="confirmModal" class="modal-overlay">
        <div class="modal-content">
            <h3 class="modal-title" id="modalTitle">Confirmar acción</h3>
            <p class="modal-message" id="modalMessage">¿Estás seguro?</p>
            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="cerrarModal()">Cancelar</button>
                <button type="button" class="btn btn-warning" id="modalConfirmBtn">Confirmar</button>
            </div>
        </div>
    </div>

    <script>
        // ===== Sistema de Toast =====
        const Toast = {
            container: null,
            icons: {
                success: '✓',
                error: '✕',
                warning: '⚠',
                info: 'ℹ'
            },

            init() {
                this.container = document.getElementById('toastContainer');
            },

            show(type, message, duration = 5000) {
                const toast = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.innerHTML = `
                    <span class="toast-icon">${this.icons[type]}</span>
                    <span class="toast-message">${message}</span>
                    <button class="toast-close" onclick="Toast.close(this.parentElement)">&times;</button>
                `;
                this.container.appendChild(toast);

                if (duration > 0) {
                    setTimeout(() => this.close(toast), duration);
                }

                return toast;
            },

            close(toast) {
                if (toast && toast.parentElement) {
                    toast.classList.add('hiding');
                    setTimeout(() => toast.remove(), 300);
                }
            },

            success(message, duration) { return this.show('success', message, duration); },
            error(message, duration) { return this.show('error', message, duration); },
            warning(message, duration) { return this.show('warning', message, duration); },
            info(message, duration) { return this.show('info', message, duration); }
        };

        // ===== Sistema de Modal =====
        let modalCallback = null;

        function mostrarConfirmacion(titulo, mensaje, onConfirm) {
            document.getElementById('modalTitle').textContent = titulo;
            document.getElementById('modalMessage').textContent = mensaje;
            document.getElementById('confirmModal').classList.add('active');
            modalCallback = onConfirm;
        }

        function cerrarModal() {
            document.getElementById('confirmModal').classList.remove('active');
            modalCallback = null;
        }

        document.getElementById('modalConfirmBtn').addEventListener('click', function() {
            cerrarModal();
            if (modalCallback) modalCallback();
        });

        // Cerrar modal con Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') cerrarModal();
        });

        // ===== Funciones del túnel =====
        let pollingInterval = null;
        const statusUrl = "{{ route('dashboard.usuarios.estado-tunel', $usuario) }}";

        function regenerarTunel() {
            mostrarConfirmacion(
                'Regenerar Túnel',
                '¿Estás seguro de que deseas regenerar el túnel? Esto generará un nuevo dominio.',
                function() {
                    Toast.info('Solicitando regeneración del túnel...');
                    document.getElementById('regenerarTunelForm').submit();
                }
            );
        }

        function actualizarEstadoTunel(data) {
            const dominioInput = document.getElementById('dominio');
            const statusContainer = document.querySelector('.tunnel-status');

            // Actualizar dominio
            if (data.dominio) {
                dominioInput.value = data.dominio;
            }

            // Actualizar o crear indicador de estado
            if (statusContainer) {
                statusContainer.className = 'tunnel-status ' + data.tunnel_status;
                let statusText = 'Estado: ' + data.tunnel_status.charAt(0).toUpperCase() + data.tunnel_status.slice(1);
                if (data.tunnel_pid) {
                    statusText += ' (PID: ' + data.tunnel_pid + ')';
                }
                statusContainer.textContent = statusText;
            }

            // Detener polling si el túnel está activo o falló
            if (data.tunnel_status === 'active' || data.tunnel_status === 'failed') {
                detenerPolling();
                if (data.tunnel_status === 'active') {
                    Toast.success('Túnel regenerado exitosamente: ' + data.dominio);
                } else {
                    Toast.error('Error al regenerar el túnel. Intente nuevamente.');
                }
            }
        }

        function consultarEstado() {
            fetch(statusUrl)
                .then(response => response.json())
                .then(data => actualizarEstadoTunel(data))
                .catch(error => console.error('Error consultando estado:', error));
        }

        function iniciarPolling() {
            if (!pollingInterval) {
                pollingInterval = setInterval(consultarEstado, 3000);
            }
        }

        function detenerPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
            }
        }

        // ===== Inicialización =====
        document.addEventListener('DOMContentLoaded', function() {
            Toast.init();

            // Mostrar mensajes de sesión como Toast
            @if(session('success'))
                Toast.success("{{ session('success') }}");
            @endif
            @if(session('error'))
                Toast.error("{{ session('error') }}");
            @endif

            // Iniciar polling si el estado es pending
            const statusElement = document.querySelector('.tunnel-status');
            if (statusElement && statusElement.classList.contains('pending')) {
                Toast.info('Generando túnel, por favor espere...', 0);
                iniciarPolling();
            }
        });
    </script>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</body>
</html>
