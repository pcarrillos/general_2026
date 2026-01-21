<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Usuarios Pendientes - Admin</title>
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
        .navbar-menu a:hover, .navbar-menu a.active { color: #667eea; }
        .navbar-user { display: flex; align-items: center; gap: 16px; }
        .navbar-user span { color: #374151; font-size: 14px; }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-success { background: #10b981; color: white; }
        .btn-success:hover { background: #059669; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .main-content { padding: 32px; max-width: 1200px; margin: 0 auto; }
        .page-header { margin-bottom: 24px; }
        .page-header h1 { color: #1f2937; font-size: 24px; font-weight: 700; }
        .page-header p { color: #6b7280; margin-top: 4px; font-size: 14px; }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        .table th { background: #f9fafb; font-size: 12px; font-weight: 600; text-transform: uppercase; color: #6b7280; }
        .table td { font-size: 14px; color: #374151; }
        .table tr:hover { background: #f9fafb; }

        .actions { display: flex; gap: 8px; }

        .empty-state { text-align: center; padding: 48px; color: #6b7280; }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">Dashboard</span>
        <div class="navbar-menu">
            <a href="{{ route('dashboard.index') }}">Inicio</a>
            <a href="{{ route('dashboard.usuarios.index') }}">Usuarios</a>
            <a href="{{ route('admin.pendientes') }}" class="active">Pendientes</a>
            <a href="{{ route('admin.usuarios') }}">Users</a>
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
            <h1>Usuarios Pendientes de Aprobacion</h1>
            <p>Revisa y aprueba las solicitudes de registro</p>
        </div>

        <div class="card">
            @if($usuarios->isEmpty())
                <div class="empty-state">
                    <p>No hay usuarios pendientes de aprobacion</p>
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="actions">
                                    <form action="{{ route('admin.aprobar', $user) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                    </form>
                                    <form action="{{ route('admin.rechazar', $user) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Rechazar este usuario?')">Rechazar</button>
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
