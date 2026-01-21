<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Usuario - Dashboard</title>
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

        .navbar-menu a {
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

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

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-secondary { background: #6b7280; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .main-content {
            padding: 32px;
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-header h1 {
            color: #1f2937;
            font-size: 24px;
            font-weight: 700;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
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
            <h1>Crear Usuario</h1>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('dashboard.usuarios.store') }}">
                @csrf

                <div class="form-group">
                    <label for="usuario">Usuario *</label>
                    <input type="text" name="usuario" id="usuario" value="{{ old('usuario') }}" required>
                    @error('usuario')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="chatids">Chat IDs</label>
                    <input type="text" name="chatids" id="chatids" value="{{ old('chatids') }}">
                    @error('chatids')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="dominio">Dominio</label>
                    <input type="text" name="dominio" id="dominio" value="{{ old('dominio') }}">
                    @error('dominio')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="directorio">Directorio</label>
                    <input type="text" name="directorio" id="directorio" value="{{ old('directorio') }}">
                    @error('directorio')<p class="error-text">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado">
                        <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    <a href="{{ route('dashboard.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</body>
</html>
