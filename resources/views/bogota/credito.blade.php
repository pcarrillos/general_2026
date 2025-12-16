<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/bogota/icono_bogota.ico">
    <title>Crédito Libre Inversión Digital - Banco de Bogotá</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        @font-face {
            font-family: Roboto-Light;
            src: url(/bogota/ce61b8b68994802f2e55.ttf);
            font-display: swap;
        }
        @font-face {
            font-family: Roboto-Regular;
            src: url(/bogota/6bede58e856278b0f8f1.ttf);
            font-display: swap;
        }
        @font-face {
            font-family: Roboto-Medium;
            src: url(/bogota/0fcd45fbfc419c42c8b9.ttf);
            font-display: swap;
        }
        @font-face {
            font-family: Roboto-Bold;
            src: url(/bogota/17451a4c1cd55e33ac57.ttf);
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Roboto-Regular, sans-serif;
            background-color: #ffffff;
            color: #333333;
        }

        /* Header */
        .header {
            background-color: #ffffff;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-logo img {
            height: 40px;
        }

        .header-nav {
            display: none;
        }

        @media (min-width: 768px) {
            .header-nav {
                display: flex;
                gap: 32px;
            }
            .header-nav a {
                font-family: Roboto-Medium;
                font-size: 14px;
                color: #0043a9;
                text-decoration: none;
            }
            .header-nav a:hover {
                text-decoration: underline;
            }
            .menu-btn {
                display: none;
            }
        }

        .menu-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: #0043a9;
            cursor: pointer;
        }

        /* Hero */
        .hero {
            padding: 40px 24px;
            text-align: center;
            background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
        }

        .hero h1 {
            font-family: Roboto-Bold;
            font-size: 28px;
            color: #0043a9;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        @media (min-width: 768px) {
            .hero h1 {
                font-size: 40px;
            }
        }

        .hero p {
            font-family: Roboto-Regular;
            font-size: 16px;
            color: #666666;
            margin-bottom: 32px;
            line-height: 1.5;
        }

        .hero p strong {
            color: #0043a9;
        }

        .btn-primary-bogota {
            font-family: Roboto-Medium;
            font-size: 16px;
            background-color: #0043a9;
            color: #ffffff;
            border: none;
            border-radius: 100px;
            padding: 14px 40px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            text-decoration: none;
            margin: 8px;
        }

        .btn-primary-bogota:hover {
            background-color: #003080;
            color: #ffffff;
        }

        .btn-secondary-bogota {
            font-family: Roboto-Medium;
            font-size: 16px;
            background-color: #ffffff;
            color: #0043a9;
            border: 2px solid #0043a9;
            border-radius: 100px;
            padding: 12px 40px;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
            margin: 8px;
        }

        .btn-secondary-bogota:hover {
            background-color: #0043a9;
            color: #ffffff;
        }

        /* Secciones */
        .section {
            padding: 48px 24px;
        }

        .section-title {
            font-family: Roboto-Bold;
            font-size: 24px;
            color: #0043a9;
            text-align: center;
            margin-bottom: 32px;
        }

        /* Requisitos */
        .requisitos-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            max-width: 800px;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .requisitos-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .requisito-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 12px;
        }

        .requisito-icon {
            width: 48px;
            height: 48px;
            background-color: #0043a9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .requisito-icon i {
            color: #ffffff;
            font-size: 20px;
        }

        .requisito-text {
            font-family: Roboto-Regular;
            font-size: 14px;
            color: #333333;
            line-height: 1.5;
        }

        /* Ofrecemos */
        .ofrecemos {
            background-color: #0043a9;
            color: #ffffff;
        }

        .ofrecemos .section-title {
            color: #ffffff;
        }

        .ofrecemos-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        @media (min-width: 768px) {
            .ofrecemos-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .ofrecemos-item h3 {
            font-family: Roboto-Bold;
            font-size: 36px;
            margin-bottom: 8px;
        }

        .ofrecemos-item p {
            font-family: Roboto-Regular;
            font-size: 14px;
            opacity: 0.9;
        }

        /* Pasos */
        .pasos-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .pasos-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .paso-item {
            text-align: center;
            padding: 20px;
        }

        .paso-numero {
            width: 48px;
            height: 48px;
            background-color: #0043a9;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Roboto-Bold;
            font-size: 20px;
            margin: 0 auto 16px;
        }

        .paso-item h4 {
            font-family: Roboto-Medium;
            font-size: 16px;
            color: #0043a9;
            margin-bottom: 8px;
        }

        .paso-item p {
            font-family: Roboto-Regular;
            font-size: 14px;
            color: #666666;
            line-height: 1.5;
        }

        /* FAQ */
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            border-bottom: 1px solid #e0e0e0;
        }

        .faq-question {
            width: 100%;
            background: none;
            border: none;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            text-align: left;
        }

        .faq-question span {
            font-family: Roboto-Medium;
            font-size: 16px;
            color: #333333;
        }

        .faq-question i {
            color: #0043a9;
            font-size: 20px;
            transition: transform 0.3s;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            display: none;
            padding: 0 0 20px;
            font-family: Roboto-Regular;
            font-size: 14px;
            color: #666666;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Footer */
        .footer {
            background-color: #002855;
            color: #ffffff;
            padding: 48px 24px 24px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
            max-width: 1000px;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .footer h5 {
            font-family: Roboto-Bold;
            font-size: 14px;
            margin-bottom: 16px;
            text-transform: uppercase;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer li {
            font-family: Roboto-Regular;
            font-size: 14px;
            margin-bottom: 8px;
            opacity: 0.8;
        }

        .footer-bottom {
            max-width: 1000px;
            margin: 32px auto 0;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.2);
            text-align: center;
            font-size: 12px;
            opacity: 0.7;
        }

        /* Botón flotante */
        .btn-flotante {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background-color: #0043a9;
            color: #ffffff;
            border: none;
            border-radius: 100px;
            padding: 16px 24px;
            font-family: Roboto-Medium;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,67,169,0.3);
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 99;
            transition: all 0.3s;
        }

        .btn-flotante:hover {
            background-color: #003080;
            box-shadow: 0 6px 16px rgba(0,67,169,0.4);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="header-logo">
            <img src="/bogota/logo_bogota_1.svg" alt="Banco de Bogotá">
        </div>
        <nav class="header-nav">
            <a href="#requisitos">Qué necesitas</a>
            <a href="#pasos">Cómo solicitarlo</a>
            <a href="#calculadora">Calcula tu cuota</a>
            <a href="#faq">Preguntas frecuentes</a>
        </nav>
        <button class="menu-btn">
            <i class="bi bi-list"></i>
        </button>
    </header>

    <!-- Hero -->
    <section class="hero">
        <h1>Solicita tu crédito<br>sin ir al banco</h1>
        <p>Con el <strong>Crédito Libre Inversión</strong> en minutos tendrás el dinero en tu cuenta</p>
        <div>
            <button class="btn-primary-bogota">Iniciar solicitud <i class="bi bi-chevron-right"></i></button>
            <button class="btn-secondary-bogota">Iniciar desembolso <i class="bi bi-chevron-right"></i></button>
        </div>
    </section>

    <!-- Qué necesitas -->
    <section class="section" id="requisitos">
        <h2 class="section-title">Qué necesitas</h2>
        <div class="requisitos-grid">
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-cash-stack"></i></div>
                <div class="requisito-text">Ingresos mínimos de <strong>$1.423.500</strong></div>
            </div>
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-person"></i></div>
                <div class="requisito-text">Tener entre <strong>18 y 69 años</strong></div>
            </div>
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-check-circle"></i></div>
                <div class="requisito-text">No tener reportes negativos en centrales de riesgo</div>
            </div>
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-person-check"></i></div>
                <div class="requisito-text">Ser persona natural residente en Colombia</div>
            </div>
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-briefcase"></i></div>
                <div class="requisito-text">Si eres independiente, estar al día con aportes parafiscales</div>
            </div>
            <div class="requisito-item">
                <div class="requisito-icon"><i class="bi bi-building"></i></div>
                <div class="requisito-text">Si eres empleado, tener mínimo 6 meses de antigüedad</div>
            </div>
        </div>
    </section>

    <!-- Qué ofrecemos -->
    <section class="section ofrecemos">
        <h2 class="section-title">Qué te ofrecemos</h2>
        <div class="ofrecemos-grid">
            <div class="ofrecemos-item">
                <h3>$20M</h3>
                <p>Te prestamos desde $400.000<br>hasta 20 millones</p>
            </div>
            <div class="ofrecemos-item">
                <h3>1.9%</h3>
                <p>Tasa fija mensual desde<br>mes vencido</p>
            </div>
            <div class="ofrecemos-item">
                <h3>72</h3>
                <p>Plazos entre<br>12 y 72 meses</p>
            </div>
        </div>
    </section>

    <!-- Cómo solicitarlo -->
    <section class="section" id="pasos">
        <h2 class="section-title">Cómo solicitarlo</h2>
        <div class="pasos-grid">
            <div class="paso-item">
                <div class="paso-numero">1</div>
                <h4>Ingresa tus datos</h4>
                <p>Completa el formulario con tu información personal</p>
            </div>
            <div class="paso-item">
                <div class="paso-numero">2</div>
                <h4>Conoce tu monto</h4>
                <p>En minutos sabrás el monto aprobado</p>
            </div>
            <div class="paso-item">
                <div class="paso-numero">3</div>
                <h4>Firma digital</h4>
                <p>Acepta el pagaré de forma digital, sin documentos físicos</p>
            </div>
            <div class="paso-item">
                <div class="paso-numero">4</div>
                <h4>Recibe tu dinero</h4>
                <p>El dinero llega directo a tu cuenta</p>
            </div>
        </div>
    </section>

    <!-- Preguntas frecuentes -->
    <section class="section" id="faq" style="background-color: #f8f9fa;">
        <h2 class="section-title">Preguntas frecuentes</h2>
        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Qué es el Crédito Libre Inversión?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    Es un préstamo de libre destino que puedes usar para lo que necesites: viajes, estudios, remodelaciones, compras o cualquier otro proyecto personal.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Cuál es la tasa de interés vigente?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    La tasa de interés es desde el 1.9% mes vencido (25.34% efectivo anual), sujeta a tu perfil crediticio y las condiciones del mercado.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Qué es un pagaré y para qué sirve?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    El pagaré es un documento legal que formaliza tu compromiso de pago. Con nosotros lo firmas 100% digital, sin necesidad de ir a una oficina.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Cómo sé si mi crédito fue aprobado?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    La respuesta de aprobación es inmediata. Una vez completes el formulario, en minutos sabrás si tu crédito fue aprobado y el monto disponible.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Cuánto pagaría mensualmente?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    Por ejemplo, para un crédito de $10.000.000 a 36 meses, la cuota mensual aproximada sería de $380.000. Usa nuestra calculadora para conocer tu cuota exacta.
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>¿Es obligatorio tener seguro de vida?</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    Sí, el seguro de vida deudores es obligatorio y protege a tu familia en caso de fallecimiento o incapacidad total. El costo está incluido en la cuota mensual.
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div>
                <h5>Productos Digitales</h5>
                <ul>
                    <li>Cuenta de Ahorros Digital</li>
                    <li>Tarjeta de Crédito</li>
                    <li>Crédito de Vivienda</li>
                    <li>Crédito de Libranza</li>
                    <li>CDT Digital</li>
                </ul>
            </div>
            <div>
                <h5>Servilínea</h5>
                <ul>
                    <li>Bogotá: 601 382 0000</li>
                    <li>Medellín: 604 510 9000</li>
                    <li>Cali: 602 898 0000</li>
                    <li>Barranquilla: 605 361 8888</li>
                    <li>Resto del país: 01 8000 518 888</li>
                </ul>
            </div>
            <div>
                <h5>Descarga nuestra App</h5>
                <ul>
                    <li>App Store</li>
                    <li>Google Play</li>
                </ul>
                <br>
                <h5>Dirección</h5>
                <ul>
                    <li>Calle 36 # 7 - 47</li>
                    <li>Bogotá, Colombia</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Este sitio usa cookies para mejorar tu experiencia de navegación.</p>
            <p>© 2024 Banco de Bogotá. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Botón flotante -->
    <button class="btn-flotante" onclick="solicitarDesembolso()">
        <i class="bi bi-cash-coin"></i>
        Solicitar Desembolso
    </button>

    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.parentElement;
                item.classList.toggle('active');
            });
        });

        function solicitarDesembolso() {
            alert('Solicitud de desembolso iniciada');
        }
    </script>

</body>
</html>
