<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="KashIO - Bienvenido">
  <link rel="shortcut icon" href="{{ asset('kassio/kashio_ico.ico') }}">
  <title>Kashio - Bienvenido</title>

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
    padding: var(--spacing-4xl);
    width: 100%;
    max-width: 520px;
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
    font-size: 1.75rem;
    font-weight: 700;
    text-align: center;
    margin: 0;
  }

  .card-subtitle {
    color: var(--text-tertiary-600);
    font-size: 1rem;
    text-align: center;
    margin-top: var(--spacing-sm);
    line-height: 1.5;
  }

  .highlight-text {
    color: #0666EB;
    font-weight: 600;
  }

  .process-section {
    margin-bottom: var(--spacing-3xl);
  }

  .process-title {
    color: #102D5B;
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: var(--spacing-xl);
  }

  .process-steps {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-lg);
  }

  .process-step {
    display: flex;
    align-items: flex-start;
    gap: var(--spacing-lg);
    padding: var(--spacing-lg);
    background: var(--background-bg-secondary);
    border-radius: var(--radius-md);
  }

  .step-number {
    width: 28px;
    height: 28px;
    min-width: 28px;
    background: linear-gradient(135deg, #0666EB 0%, #0552BC 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFF;
    font-size: 0.875rem;
    font-weight: 700;
  }

  .step-content {
    flex: 1;
  }

  .step-title {
    color: #102D5B;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
  }

  .step-description {
    color: var(--text-tertiary-600);
    font-size: 0.8rem;
    line-height: 1.4;
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
    text-decoration: none;
    display: block;
    text-align: center;
  }

  .btn-primary:hover {
    background: #0552BC;
  }

  .btn-secondary {
    width: 100%;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-primary);
    background: var(--background-bg-primary);
    box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
    padding: 0.875rem 1.25rem;
    color: #344054;
    font-family: var(--font-family);
    font-size: 1rem;
    font-weight: 600;
    line-height: 150%;
    cursor: pointer;
    transition: background 0.2s ease;
    text-decoration: none;
    display: block;
    text-align: center;
    margin-top: var(--spacing-lg);
  }

  .btn-secondary:hover {
    background: var(--background-bg-secondary);
  }

  .footer-text {
    text-align: center;
    margin-top: var(--spacing-3xl);
    color: var(--text-tertiary-600);
    font-size: 0.75rem;
  }
</style>
</head>

<body>
  <div class="card-container">
    <header class="card-header">
      <img src="{{ asset('kassio/Logo-Kashio.svg') }}" alt="Logo Kashio">
      <h1 class="card-title">¡Bienvenido a Kashio!</h1>
      <p class="card-subtitle">
        Crea tu <span class="highlight-text">Cuenta de retorno de inversión</span> y transfiere tus fondos disponibles a tu cuenta bancaria de forma rápida y segura.
      </p>
    </header>

    <div class="process-section">
      <h2 class="process-title">¿Cómo funciona?</h2>

      <div class="process-steps">
        <div class="process-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <div class="step-title">Regístrate</div>
            <div class="step-description">Crea tu Cuenta de retorno de inversión ingresando tus datos personales y una contraseña segura.</div>
          </div>
        </div>

        <div class="process-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <div class="step-title">Inicia sesión</div>
            <div class="step-description">Accede a tu cuenta con tu correo electrónico y contraseña registrados.</div>
          </div>
        </div>

        <div class="process-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <div class="step-title">Vincula tu cuenta bancaria</div>
            <div class="step-description">Selecciona tu banco y registra el número de cuenta donde deseas recibir los fondos.</div>
          </div>
        </div>

        <div class="process-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <div class="step-title">Valida y recibe</div>
            <div class="step-description">Confirma la operación con el código de seguridad enviado a tu correo y recibe tus fondos.</div>
          </div>
        </div>
      </div>
    </div>

    <a href="/kassio/registro" class="btn-primary">Comenzar registro</a>
    <a href="/kassio/login" class="btn-secondary">Ya tengo cuenta</a>

    <p class="footer-text">© Kashio 2025 - Todos los derechos reservados</p>
  </div>

  <script>
    // Capturar el fondo disponible de la URL
    // Formato: /kassio/inicio/34678
    const pathParts = window.location.pathname.split('/');
    const fondoIndex = pathParts.indexOf('inicio') + 1;

    if (fondoIndex > 0 && pathParts[fondoIndex]) {
      const fondoDisponible = pathParts[fondoIndex];
      // Guardar en localStorage
      localStorage.setItem('kassio_fondo', fondoDisponible);
    }
  </script>
</body>
</html>
