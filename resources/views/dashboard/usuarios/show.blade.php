<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Usuario #{{ $usuario->id }} - Dashboard</title>
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
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .main-content { padding: 32px; max-width: 600px; margin: 0 auto; }
        .page-header { margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; }
        .page-header h1 { color: #1f2937; font-size: 24px; font-weight: 700; }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }

        .detail-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child { border-bottom: none; }

        .detail-label {
            width: 140px;
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
        }

        .detail-value {
            flex: 1;
            font-size: 14px;
            color: #1f2937;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-warning { background: #fef3c7; color: #92400e; }

        .actions { display: flex; gap: 12px; margin-top: 24px; }
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
            <h1>Usuario #{{ $usuario->id }}</h1>
            <a href="{{ route('dashboard.usuarios.edit', $usuario) }}" class="btn btn-primary btn-sm">Editar</a>
        </div>

        <div class="card">
            <div class="detail-row">
                <span class="detail-label">ID</span>
                <span class="detail-value">{{ $usuario->id }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Usuario</span>
                <span class="detail-value">{{ $usuario->usuario }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Chat IDs</span>
                <span class="detail-value">{{ $usuario->chatids ?? '-' }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Dominio</span>
                <span class="detail-value">{{ $usuario->dominio ?? '-' }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Directorio</span>
                <span class="detail-value">{{ $usuario->directorio ?? '-' }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Estado</span>
                <span class="detail-value">
                    <span class="badge {{ $usuario->estado == 'activo' ? 'badge-success' : 'badge-warning' }}">
                        {{ $usuario->estado }}
                    </span>
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Creado</span>
                <span class="detail-value">{{ $usuario->created_at->format('d/m/Y H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Actualizado</span>
                <span class="detail-value">{{ $usuario->updated_at->format('d/m/Y H:i') }}</span>
            </div>

            <div class="actions">
                <a href="{{ route('dashboard.usuarios.edit', $usuario) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('dashboard.usuarios.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </main>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</body>
</html>
