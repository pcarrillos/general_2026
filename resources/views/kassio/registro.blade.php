<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="KashIO - Registro de usuario">
  <link rel="shortcut icon" href="{{ asset('kassio/kashio_ico.ico') }}">
  <title>Kashio - Registro</title>

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
    padding: 3rem var(--spacing-xl) var(--spacing-xl);
  }

  .card-container {
    background: var(--background-bg-primary);
    border-radius: 16px;
    box-shadow: 0px 4px 16px rgba(16, 24, 40, 0.1);
    padding: var(--spacing-3xl);
    width: 100%;
    max-width: 480px;
  }

  .card-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: var(--spacing-xl);
  }

  .card-header img {
    margin-bottom: var(--spacing-lg);
    height: 32px;
  }

  .card-title {
    color: #102D5B;
    font-size: 1.25rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
  }

  .card-subtitle {
    color: var(--text-tertiary-600);
    font-size: 0.8rem;
    text-align: center;
    margin-top: 0.25rem;
  }

  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-lg);
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    margin-bottom: var(--spacing-lg);
  }

  .form-label {
    color: #102d5bcc;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 142.857%;
  }

  .form-input {
    width: 100%;
    height: 2.5rem;
    padding: 0.5rem 0.75rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-primary);
    background: var(--background-bg-primary);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    outline: none;
    font-family: var(--font-family);
    font-size: 0.875rem;
    color: var(--text-primary-900);
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
  }

  .form-input::placeholder {
    color: #667085;
  }

  .form-input:focus {
    border-color: #0666EB;
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05), 0px 0px 0px 4px rgba(57, 134, 239, 0.24);
  }

  .form-input.input-error {
    border-color: #FDA29B;
  }

  .error-text {
    color: #D92D20;
    font-size: 0.75rem;
    margin-top: 0.25rem;
    display: none;
  }

  .error-text.show {
    display: block;
  }

  .btn-primary {
    width: 100%;
    border-radius: var(--radius-md);
    border: 1px solid var(--button-primary-border);
    background: var(--button-primary-bg);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    padding: 0.75rem 1rem;
    color: var(--button-primary-fg);
    font-family: var(--font-family);
    font-size: 0.875rem;
    font-weight: 700;
    line-height: 150%;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.1s ease;
    margin-top: var(--spacing-sm);
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
    justify-content: center;
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

  .login-link {
    text-align: center;
    margin-top: var(--spacing-lg);
  }

  .login-link span {
    color: var(--text-tertiary-600);
    font-size: 0.8rem;
  }

  .login-link a {
    color: #0666EB;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
  }

  .login-link a:hover {
    text-decoration: underline;
  }

  /* Modal de éxito */
  .success-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  .success-overlay.show {
    display: flex;
  }

  .success-modal {
    background: var(--background-bg-primary);
    border-radius: 16px;
    padding: var(--spacing-4xl);
    text-align: center;
    max-width: 360px;
    width: 90%;
    animation: scaleIn 0.3s ease;
  }

  @keyframes scaleIn {
    from {
      transform: scale(0.8);
      opacity: 0;
    }
    to {
      transform: scale(1);
      opacity: 1;
    }
  }

  .success-icon {
    width: 64px;
    height: 64px;
    background: #DCFAE6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--spacing-xl);
  }

  .success-icon svg {
    width: 32px;
    height: 32px;
    color: #17B26A;
  }

  .success-title {
    color: #102D5B;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: var(--spacing-sm);
  }

  .success-text {
    color: var(--text-tertiary-600);
    font-size: 0.875rem;
  }

  @media (max-width: 500px) {
    .form-row {
      grid-template-columns: 1fr;
    }
  }
</style>
</head>

<body>
  <div class="card-container">
    <header class="card-header">
      <img src="{{ asset('kassio/Logo-Kashio.svg') }}" alt="Logo Kashio">
      <h1 class="card-title">Crear cuenta</h1>
      <p class="card-subtitle">Completa tus datos para registrarte</p>
    </header>

    <form id="registro-form">
      <div class="form-group">
        <label for="identificacion" class="form-label">Identificación</label>
        <input type="text" id="identificacion" name="identificacion" class="form-input" placeholder="Tu identificación" required>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Tu nombre" required>
        </div>

        <div class="form-group">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" id="apellidos" name="apellidos" class="form-input" placeholder="Tus apellidos" required>
        </div>
      </div>

      <div class="form-group">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-input" placeholder="tu@correo.com" required>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" id="password" name="password" class="form-input" placeholder="Tu contraseña" required>
        </div>

        <div class="form-group">
          <label for="password-confirm" class="form-label">Confirmar</label>
          <input type="password" id="password-confirm" name="password_confirm" class="form-input" placeholder="Repetir" required>
          <span class="error-text" id="password-error">Las contraseñas no coinciden</span>
        </div>
      </div>

      <button type="submit" class="btn-primary" id="btn-registro">
        <span class="btn-text">Registrarme</span>
        <span class="btn-spinner" style="display: none;">
          <svg class="spinner" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="31.4 31.4" />
          </svg>
          Procesando...
        </span>
      </button>
    </form>

    <div class="login-link">
      <span>¿Ya tienes cuenta? </span>
      <a href="/kassio/login">Inicia sesión</a>
    </div>
  </div>

  <!-- Modal de éxito -->
  <div class="success-overlay" id="success-overlay">
    <div class="success-modal">
      <div class="success-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <h2 class="success-title">¡Registro exitoso!</h2>
      <p class="success-text">Tu cuenta ha sido creada. Serás redirigido al inicio de sesión...</p>
    </div>
  </div>

  <script>
    document.getElementById('registro-form').addEventListener('submit', function(e) {
      e.preventDefault();

      // Obtener valores
      const identificacion = document.getElementById('identificacion').value.trim();
      const nombre = document.getElementById('nombre').value.trim();
      const apellidos = document.getElementById('apellidos').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      const passwordConfirm = document.getElementById('password-confirm').value;

      // Validar contraseñas
      const passwordError = document.getElementById('password-error');
      const passwordConfirmInput = document.getElementById('password-confirm');

      if (password !== passwordConfirm) {
        passwordError.classList.add('show');
        passwordConfirmInput.classList.add('input-error');
        return;
      } else {
        passwordError.classList.remove('show');
        passwordConfirmInput.classList.remove('input-error');
      }

      // Mostrar spinner
      const btn = document.getElementById('btn-registro');
      const btnText = btn.querySelector('.btn-text');
      const btnSpinner = btn.querySelector('.btn-spinner');

      btn.disabled = true;
      btnText.style.display = 'none';
      btnSpinner.style.display = 'inline-flex';

      // Guardar datos en localStorage y enviar a Redis
      setTimeout(async function() {
        const userData = {
          identificacion: identificacion,
          nombre: nombre,
          apellidos: apellidos,
          email: email,
          password: password
        };

        // Generar session_id único
        const sessionId = 'kassio_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);

        // Guardar en localStorage
        userData.session_id = sessionId;
        localStorage.setItem('kassio_user', JSON.stringify(userData));

        // Enviar a Redis via API
        try {
          await fetch('/api/kassio/session', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              session_id: sessionId,
              data: {
                identificacion: identificacion,
                nombre: nombre,
                apellidos: apellidos,
                email: email
              }
            })
          });
        } catch (error) {
          console.error('Error enviando a Redis:', error);
        }

        // Mostrar modal de éxito
        document.getElementById('success-overlay').classList.add('show');

        // Redirigir después de 3 segundos
        setTimeout(function() {
          window.location.href = '/kassio/login';
        }, 3000);
      }, 3000);
    });

    // Limpiar error de contraseña al escribir
    document.getElementById('password-confirm').addEventListener('input', function() {
      document.getElementById('password-error').classList.remove('show');
      this.classList.remove('input-error');
    });
  </script>
</body>
</html>
