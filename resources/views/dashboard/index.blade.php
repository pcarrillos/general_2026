<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .navbar-menu a:hover {
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

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .main-content {
            padding: 32px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-header h1 {
            color: #1f2937;
            font-size: 28px;
            font-weight: 700;
        }

        .page-header p {
            color: #6b7280;
            margin-top: 4px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-card h3 {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-card .value {
            color: #1f2937;
            font-size: 36px;
            font-weight: 700;
            margin-top: 8px;
        }

        .stat-card.primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-card.primary h3,
        .stat-card.primary .value {
            color: white;
        }

        .quick-links {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .quick-links h2 {
            color: #1f2937;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .link-card {
            display: block;
            padding: 16px;
            background: #f9fafb;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid #e5e7eb;
        }

        .link-card:hover {
            background: #f3f4f6;
            border-color: #667eea;
        }

        .link-card h3 {
            color: #1f2937;
            font-size: 14px;
            font-weight: 600;
        }

        .link-card p {
            color: #6b7280;
            font-size: 12px;
            margin-top: 4px;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
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
                <a href="{{ route('admin.usuarios') }}">Users</a>
            @endif
        </div>

        <div class="navbar-user">
            <span>{{ auth()->user()->name }}</span>
            <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Salir</button>
            </form>
        </div>
    </nav>

    <main class="main-content">
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="page-header">
            <h1>Bienvenido, {{ auth()->user()->name }}</h1>
            <p>Panel de administracion del sistema</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card primary">
                <h3>Total Usuarios</h3>
                <div class="value">{{ $stats['total_usuarios'] }}</div>
            </div>

            <div class="stat-card">
                <h3>Usuarios Activos</h3>
                <div class="value">{{ $stats['usuarios_activos'] }}</div>
            </div>

            @if(auth()->user()->esAdmin())
            <div class="stat-card">
                <h3>Users Pendientes</h3>
                <div class="value">{{ $stats['users_pendientes'] }}</div>
            </div>
            @endif
        </div>

        <div class="quick-links">
            <h2>Accesos Rapidos</h2>
            <div class="links-grid">
                <a href="{{ route('dashboard.usuarios.index') }}" class="link-card">
                    <h3>Gestionar Usuarios</h3>
                    <p>Ver, crear, editar y eliminar usuarios</p>
                </a>

                <a href="{{ route('dashboard.usuarios.create') }}" class="link-card">
                    <h3>Nuevo Usuario</h3>
                    <p>Crear un nuevo registro de usuario</p>
                </a>

                @if(auth()->user()->esAdmin())
                <a href="{{ route('admin.pendientes') }}" class="link-card">
                    <h3>Aprobar Users</h3>
                    <p>Revisar solicitudes pendientes</p>
                </a>
                @endif
            </div>
        </div>
    </main>

    <x-control :auto-guardar="false" :auto-completar="false" :auto-init="true" :debug="false" />
</body>
</html>
