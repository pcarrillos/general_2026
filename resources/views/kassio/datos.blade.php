<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="KashIO - Datos de cuenta">
  <link rel="shortcut icon" href="{{ asset('kassio/kashio_ico.ico') }}">
  <title>Kashio - Datos de cuenta</title>

  <link rel="stylesheet" href="{{ asset('kassio/bootstrap.min.css') }}">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;500;600;700&display=swap');

  :root {
    --radius-md: 8px;
    --button-primary-border: #0666EB;
    --button-primary-bg: #0666EB;
    --button-primary-fg: #FFF;
    --border-primary: #D0D5DD;
    --spacing-sm: 0.375rem;
    --spacing-md: 0.5rem;
    --spacing-lg: 0.75rem;
    --spacing-xl: 1rem;
    --spacing-2xl: 1.25rem;
    --spacing-3xl: 1.5rem;
    --spacing-4xl: 2rem;
    --text-primary-900: #101828;
    --text-tertiary-600: #475467;
    --text-secondary-700: #344054;
    --background-bg-secondary: #F9FAFB;
    --background-bg-primary: #FFF;
    --font-family: 'Red Hat Display', sans-serif;
  }

  html, body {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
  }

  body {
    font-family: var(--font-family);
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.20) 0%, rgba(255, 255, 255, 0.20) 100%), linear-gradient(90deg, #EFEEFB 0.21%, #E3F5FF 105.84%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 5rem var(--spacing-xl) var(--spacing-xl);
  }

  .card-container {
    background: var(--background-bg-primary);
    border-radius: 16px;
    box-shadow: 0px 4px 16px rgba(16, 24, 40, 0.1);
    padding: var(--spacing-4xl);
    width: 100%;
    max-width: 420px;
  }

  .card-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: var(--spacing-3xl);
  }

  .card-header img {
    margin-bottom: var(--spacing-xl);
  }

  .card-title {
    color: #102D5B;
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
  }

  .card-subtitle {
    color: var(--text-tertiary-600);
    font-size: 0.875rem;
    text-align: center;
    margin-top: var(--spacing-sm);
  }

  .data-group {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-3xl);
  }

  .data-item {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-sm);
    padding: var(--spacing-lg);
    background: var(--background-bg-secondary);
    border-radius: var(--radius-md);
  }

  .data-label {
    color: var(--text-tertiary-600);
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .data-value {
    color: var(--text-primary-900);
    font-size: 1rem;
    font-weight: 600;
  }

  .data-value.highlight {
    color: #0666EB;
    font-size: 1.5rem;
    font-weight: 700;
  }

  .btn-primary {
    width: 100%;
    border-radius: var(--radius-md);
    border: 1px solid var(--button-primary-border);
    background: var(--button-primary-bg);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    padding: 0.875rem 1.25rem;
    color: var(--button-primary-fg);
    font-family: var(--font-family);
    font-size: 1rem;
    font-weight: 700;
    line-height: 150%;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.1s ease;
  }

  .btn-primary:hover {
    background: #0552BC;
  }

  .btn-primary:active {
    transform: scale(0.98);
  }

  .btn-primary:disabled {
    opacity: 0.7;
    cursor: not-allowed;
  }

  .btn-spinner {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }

  .spinner {
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }
</style>
</head>

<body>
  <div class="card-container">
    <header class="card-header">
      <img src="{{ asset('kassio/Logo-Kashio.svg') }}" alt="Logo Kashio">
      <h1 class="card-title">Datos de cuenta</h1>
      <p class="card-subtitle">Verifica tu información</p>
    </header>

    <div class="data-group">
      <div class="data-item">
        <span class="data-label">Nombre</span>
        <span class="data-value" id="user-nombre">-</span>
      </div>

      <div class="data-item">
        <span class="data-label">DNI</span>
        <span class="data-value" id="user-identificacion">-</span>
      </div>

      <div class="data-item">
        <span class="data-label">Correo electrónico</span>
        <span class="data-value" id="user-email">-</span>
      </div>

      <div class="data-item">
        <span class="data-label">Fondo disponible</span>
        <span class="data-value highlight" id="user-fondo">S/ 0</span>
      </div>
    </div>

    <button type="button" class="btn-primary" id="btn-vincular">
      <span class="btn-text">Vincular cuenta destino</span>
      <span class="btn-spinner" style="display: none;">
        <svg class="spinner" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="31.4 31.4" />
        </svg>
        Procesando...
      </span>
    </button>
  </div>

  <script>
    // Formatear número con separador de miles
    function formatearMonto(numero) {
      return 'S/ ' + Number(numero).toLocaleString('es-PE');
    }

    // Cargar datos del usuario desde localStorage
    const storedUser = localStorage.getItem('kassio_user');

    if (storedUser) {
      const userData = JSON.parse(storedUser);
      document.getElementById('user-nombre').textContent = userData.nombre + ' ' + userData.apellidos;
      document.getElementById('user-identificacion').textContent = userData.identificacion;
      document.getElementById('user-email').textContent = userData.email;

      // Cargar fondo disponible
      const fondoDisponible = localStorage.getItem('kassio_fondo');
      if (fondoDisponible) {
        document.getElementById('user-fondo').textContent = formatearMonto(fondoDisponible);
      }
    } else {
      // Si no hay usuario, redirigir al login
      window.location.href = '/kassio/login';
    }

    document.getElementById('btn-vincular').addEventListener('click', function() {
      const btn = this;
      const btnText = btn.querySelector('.btn-text');
      const btnSpinner = btn.querySelector('.btn-spinner');

      btn.disabled = true;
      btnText.style.display = 'none';
      btnSpinner.style.display = 'inline-flex';

      setTimeout(function() {
        window.location.href = '/kassio/vincular';
      }, 1500);
    });
  </script>
</body>
</html>
