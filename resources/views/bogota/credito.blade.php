<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Libre Inversión - Banco de Bogotá</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
            background-color: #fff;
            line-height: 1.5;
        }

        .container {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 30px 20px 0;
        }

        .hero h1 {
            color: #0033A0;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero p {
            color: #555;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .hero p strong {
            color: #0033A0;
        }

        .hero-image {
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
        }

        .hero-image img {
            width: 100%;
            height: auto;
        }

        /* Qué ofrecemos Section */
        .ofertas {
            padding: 30px 20px;
        }

        .ofertas h2 {
            color: #0033A0;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .oferta-item {
            border-left: 4px solid #FFCC00;
            padding-left: 15px;
            margin-bottom: 20px;
        }

        .oferta-item .label {
            color: #0033A0;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .oferta-item .value {
            color: #333;
            font-size: 22px;
            font-weight: 300;
        }

        .oferta-item .value-large {
            font-size: 28px;
        }

        .nota {
            font-size: 12px;
            color: #666;
            margin-top: 15px;
            line-height: 1.6;
        }

        .nota strong {
            color: #0033A0;
        }

        .nota a {
            color: #0033A0;
            text-decoration: underline;
        }

        /* Cómo solicitarlo Section */
        .como-solicitar {
            padding: 30px 20px;
            border-top: 1px solid #eee;
        }

        .como-solicitar h2 {
            color: #0033A0;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .como-solicitar p {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .como-solicitar .link {
            color: #0033A0;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
        }

        .como-solicitar .link:hover {
            text-decoration: underline;
        }

        /* Header con logo */
        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }

        .logo-banco {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-banco img {
            height: 30px;
        }

        .logo-banco span {
            font-size: 14px;
            color: #333;
            font-weight: 600;
        }

        .menu-btn {
            color: #0033A0;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .menu-icon {
            font-size: 18px;
        }

        /* Pasos */
        .pasos {
            padding: 0 20px 30px;
        }

        .paso {
            display: flex;
            align-items: flex-start;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .paso:last-child {
            border-bottom: none;
        }

        .paso-numero {
            color: #0033A0;
            font-size: 32px;
            font-weight: 300;
            margin-right: 15px;
            min-width: 40px;
        }

        .paso-texto {
            color: #333;
            font-size: 15px;
            padding-top: 8px;
        }

        /* Footer */
        .footer {
            background-color: #1a1a2e;
            padding: 30px 20px;
            color: #fff;
        }

        .footer-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            margin-bottom: 25px;
        }

        .footer-logos img {
            height: 35px;
            filter: brightness(0) invert(1);
        }

        .footer-info {
            text-align: center;
            font-size: 11px;
            color: #ccc;
            line-height: 1.8;
        }

        .footer-info p {
            margin-bottom: 10px;
        }

        .footer-info strong {
            color: #fff;
        }

        /* Logo SVG Banco de Bogotá */
        .logo-svg {
            width: 120px;
            height: 30px;
        }

        /* Grupo Aval y Fogafín logos placeholder */
        .logo-aval {
            font-family: serif;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            letter-spacing: 1px;
        }

        .logo-fogafin {
            font-size: 14px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-fogafin .dots {
            font-size: 8px;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <h1>Solicita tu crédito sin ir al banco</h1>
            <p>Con el <strong>Crédito Libre Inversión</strong> en minutos tendrás<br>el dinero en tu cuenta</p>
            <div class="hero-image">
                <img src="{{ asset('bogota/hero-pareja.png') }}" alt="Pareja feliz con su crédito aprobado">
            </div>
        </section>

        <!-- Qué ofrecemos -->
        <section class="ofertas">
            <h2>Qué ofrecemos</h2>

            <div class="oferta-item">
                <div class="label">Te prestamos desde</div>
                <div class="value value-large">400.000 pesos<br>hasta 20 Millones</div>
            </div>

            <div class="oferta-item">
                <div class="label">Tasa fija mensual desde</div>
                <div class="value">1.9% Mes vencido</div>
            </div>

            <div class="oferta-item">
                <div class="label">Plazos entre</div>
                <div class="value">12 y 72 Meses</div>
            </div>

            <p class="nota">
                *Para <strong>créditos superiores a 10 millones de pesos</strong>, puede acercarse a una de <a href="#">nuestras oficinas</a>, y tener en cuenta los siguientes <a href="#">requisitos</a>.
            </p>
        </section>

        <!-- Cómo solicitarlo -->
        <section class="como-solicitar">
            <h2>Cómo solicitarlo</h2>
            <p>El proceso es 100% en línea y desde cualquier dispositivo.</p>
            <a href="#" class="link">Calcula tu cuota ›</a>
        </section>

        <!-- Header con logo -->
        <div class="header-bar">
            <div class="logo-banco">
                <svg class="logo-svg" viewBox="0 0 200 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="0" y="35" font-family="Open Sans" font-size="14" font-weight="600" fill="#333">Banco de Bogotá</text>
                    <circle cx="180" cy="25" r="15" fill="#FFCC00"/>
                    <path d="M175 25 L180 20 L185 25 L180 30 Z" fill="#0033A0"/>
                </svg>
            </div>
            <div class="menu-btn">
                Menú <span class="menu-icon">☰</span>
            </div>
        </div>

        <!-- Pasos -->
        <section class="pasos">
            <div class="paso">
                <span class="paso-numero">2.</span>
                <span class="paso-texto">Conoce el monto aprobado en minutos.</span>
            </div>
            <div class="paso">
                <span class="paso-numero">3.</span>
                <span class="paso-texto">Acepta el pagaré digital, no necesitas documentos</span>
            </div>
            <div class="paso">
                <span class="paso-numero">4.</span>
                <span class="paso-texto">Tendrás el dinero en tu cuenta de inmediato</span>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-logos">
                <div class="logo-aval">
                    Grupo<br>AVAL
                </div>
                <div class="logo-fogafin">
                    <span class="dots">:::::</span>
                    <span>Fogafín</span>
                    <small style="font-size: 8px;">Fondo de Garantías de<br>Instituciones Financieras</small>
                </div>
            </div>
            <div class="footer-info">
                <p>Para más información puedes contactarnos en nuestra Servilínea: <strong>Bogotá</strong> 382 0000, <strong>Medellín</strong> 576 4330, <strong>Cali</strong> 898 0077, <strong>Barranquilla</strong> 350 4300, <strong>Nivel nacional</strong> 018000 518 877.</p>
                <p>Banco de Bogotá: Calle 36 # 7 - 47 / Bogotá, Colombia</p>
            </div>
        </footer>
    </div>
</body>
</html>
