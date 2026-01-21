<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Usuarios - Dashboard</title>
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

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .navbar-menu a {
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .navbar-menu a:hover, .navbar-menu a.active {
            color: #667eea;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-user span {
            color: #374151;
            font-size: 14px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .main-content {
            padding: 32px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h1 {
            color: #1f2937;
            font-size: 24px;
            font-weight: 700;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .table th {
            background: #f9fafb;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            color: #6b7280;
        }

        .table td {
            font-size: 14px;
            color: #374151;
        }

        .table tr:hover {
            background: #f9fafb;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .empty-state {
            text-align: center;
            padding: 48px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Dashboard</span>
        <div class="navbar-menu">
            <a href="{{ route('dashboard.index') }}">Inicio</a>
            <a href="{{ route('dashboard.usuarios.index') }}" class="active">Usuarios</a>
            @if(auth()->user()->esAdmin())
                <a href="{{ route('admin.pendientes') }}">Pendientes</a>
                <a href="{{ route('admin.usuarios') }}">Users</a>
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
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="page-header">
            <h1>Gestion de Usuarios</h1>
            <a href="{{ route('dashboard.usuarios.create') }}" class="btn btn-primary">Nuevo Usuario</a>
        </div>

        <div class="card">
            @if($usuarios->isEmpty())
                <div class="empty-state">
                    <p>No hay usuarios registrados</p>
                    <a href="{{ route('dashboard.usuarios.create') }}" class="btn btn-primary" style="margin-top: 16px;">Crear primer usuario</a>
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Chat IDs</th>
                            <th>Dominio</th>
                            <th>Directorio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->usuario }}</td>
                            <td>{{ $usuario->chatids ?? '-' }}</td>
                            <td>{{ $usuario->dominio ?? '-' }}</td>
                            <td>{{ $usuario->directorio ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $usuario->estado == 'activo' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $usuario->estado }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('dashboard.usuarios.show', $usuario) }}" class="btn btn-secondary btn-sm">Ver</a>
                                    <a href="{{ route('dashboard.usuarios.edit', $usuario) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('dashboard.usuarios.destroy', $usuario) }}" method="POST" style="display: inline;" onsubmit="return confirm('Eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</body>
</html>
