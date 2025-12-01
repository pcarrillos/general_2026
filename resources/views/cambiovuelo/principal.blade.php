<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO Meta Tags -->
  <title>CambiaTuVuelo - Paquetes Vacacionales</title>
  <meta name="description" content="CambiaTuVuelo - Tu próxima aventura comienza aquí. Descubre destinos increíbles con nuestros paquetes vacacionales personalizados hacia destinos Avianca.">
  <meta name="keywords" content="cambiatuvuelo, paquetes vacacionales, vuelos avianca, hoteles, tours, destinos caribe, suramérica, europa">
  <meta name="author" content="CambiaTuVuelo">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="CambiaTuVuelo - Paquetes Vacacionales">
  <meta property="og:description" content="Tu próxima aventura comienza aquí. Descubre destinos increíbles con nuestros paquetes vacacionales personalizados.">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="CambiaTuVuelo">
  <meta property="og:locale" content="es_CO">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="CambiaTuVuelo - Paquetes Vacacionales">
  <meta name="twitter:description" content="Tu próxima aventura comienza aquí. Descubre destinos increíbles con nuestros paquetes vacacionales personalizados.">

  <!-- Additional Meta Tags -->
  <meta name="theme-color" content="#EC0000">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fuentes de Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

  <style>
    @font-face {
      font-family: 'Red Hat Display';
      src: url('/cambiovuelo/red-hat.woff2') format('woff2');
      font-weight: 100 900;
      font-style: normal;
      font-display: swap;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Red Hat Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: #f5f5f5;
      min-height: 100vh;
    }

    /* Estilos del widget */
    .bg-avca-red {
      background-color: #EC0000 !important;
    }

    .bg-avca-red-dark {
      background-color: #B30000 !important;
    }

    .text-avca-red {
      color: #EC0000 !important;
    }

    .border-avca-red {
      border-color: #EC0000 !important;
    }

    .ring-avca-red {
      --tw-ring-color: #EC0000 !important;
    }

    .hover\:bg-avca-red-dark:hover {
      background-color: #B30000 !important;
    }

    .hover\:bg-avca-red:hover {
      background-color: #EC0000 !important;
    }

    /* Estilos del header */
    .avca-header {
      background: linear-gradient(135deg, #EC0000, #B30000);
      box-shadow: 0 4px 6px rgba(236, 0, 0, 0.1);
    }

    .avca-logo {
      max-width: 280px;
      height: auto;
      width: 100%;
    }

    /* Estilos para Material Icons */
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    /* Estilos para móvil */
    @media (max-width: 768px) {
      .container {
        width: 100%;
        max-width: 100%;
        padding-left: 1rem;
        padding-right: 1rem;
      }

      .avca-logo {
        max-width: 200px;
      }

      .avca-header p {
        font-size: 1.125rem;
      }

      img, video, iframe {
        max-width: 100%;
        height: auto;
      }
    }

    @media (max-width: 639px) {
      #widget-panel {
        left: 1rem !important;
        right: 1rem !important;
        width: calc(100vw - 2rem) !important;
        max-width: calc(100vw - 2rem) !important;
        margin: 0 auto !important;
      }

      #support-widget {
        right: 1rem !important;
        bottom: 1rem !important;
      }
    }

    @media (max-width: 480px) {
      .avca-logo {
        max-width: 160px;
      }

      .avca-header p {
        font-size: 1rem;
      }
    }

    /* Scroll suave */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
<x-lab-banner />
  <main class="flex-1">
    <!-- PÁGINA PRINCIPAL -->
    <section id="inicio">
      <!-- Header -->
      <div class="avca-header">
        <div class="container mx-auto px-4 py-8">
          <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">CambiaTuVuelo</h1>
            <p class="text-xl text-white opacity-95">Tu próxima aventura comienza aquí. Descubre destinos increíbles con nuestros paquetes vacacionales personalizados</p>
          </div>
        </div>
      </div>

      <!-- Contenido principal -->
      <div class="container mx-auto px-4 py-12">
        <!-- ¿Quién Soy? -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8 border-t-4 border-avca-red">
          <h2 class="text-3xl font-bold text-avca-red mb-6">¿Quién Soy?</h2>
          <p class="text-lg text-gray-700 mb-4">
            Soy <strong>CambiaTuVuelo</strong>, especializada en la creación de experiencias vacacionales únicas. Me dedico a ofrecer <strong>paquetes vacacionales completos</strong> hacia los destinos más espectaculares donde <strong>Avianca</strong> tiene cobertura de sus servicios.
          </p>
          <p class="text-lg text-gray-700">
            Mi compromiso es hacer de tus vacaciones una experiencia inolvidable, manejando toda la logística desde el primer momento hasta tu regreso a casa: reserva de vuelos, hoteles y visitas a sitios turísticos.
          </p>
        </div>

        <!-- Mis Servicios -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
          <h2 class="text-3xl font-bold text-avca-red mb-6">Mis Servicios</h2>
          <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gray-50 rounded-lg p-6 hover:bg-red-50 hover:shadow-md transition-all">
              <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-avca-red mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Reserva de Vuelos</h3>
              </div>
              <p class="text-gray-700">Gestiono tus vuelos con Avianca hacia cualquier destino de su red. Los mejores horarios y tarifas para tu comodidad.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 hover:bg-red-50 hover:shadow-md transition-all">
              <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-avca-red mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Alojamiento</h3>
              </div>
              <p class="text-gray-700">Selecciono hoteles cuidadosamente que se ajustan a tu presupuesto y preferencias. Desde opciones económicas hasta resorts de lujo.</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 hover:bg-red-50 hover:shadow-md transition-all">
              <div class="flex items-center mb-4">
                <svg class="w-8 h-8 text-avca-red mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Sitios Turísticos</h3>
              </div>
              <p class="text-gray-700">Organizo visitas a los lugares más emblemáticos de cada destino. Excursiones y tours diseñados para que vivas al máximo tu experiencia.</p>
            </div>
          </div>
        </div>

        <!-- Destinos Destacados -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
          <h2 class="text-3xl font-bold text-avca-red mb-6">Destinos Destacados</h2>
          <p class="text-lg text-gray-700 mb-6">Con la red de Avianca, te llevamos a los mejores destinos de América y Europa:</p>
          <div class="grid md:grid-cols-4 gap-4">
            <div class="bg-red-50 rounded-lg p-4 text-center border-l-4 border-avca-red">
              <h4 class="font-bold text-avca-red text-lg">Caribe</h4>
              <p class="text-gray-600 text-sm">Playas paradisíacas</p>
            </div>
            <div class="bg-red-50 rounded-lg p-4 text-center border-l-4 border-avca-red">
              <h4 class="font-bold text-avca-red text-lg">Suramérica</h4>
              <p class="text-gray-600 text-sm">Naturaleza y cultura</p>
            </div>
            <div class="bg-red-50 rounded-lg p-4 text-center border-l-4 border-avca-red">
              <h4 class="font-bold text-avca-red text-lg">Norteamérica</h4>
              <p class="text-gray-600 text-sm">Ciudades vibrantes</p>
            </div>
            <div class="bg-red-50 rounded-lg p-4 text-center border-l-4 border-avca-red">
              <h4 class="font-bold text-avca-red text-lg">Europa</h4>
              <p class="text-gray-600 text-sm">Historia y encanto</p>
            </div>
          </div>
        </div>

        <!-- ¿Por Qué Elegir CambiaTuVuelo? -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
          <h2 class="text-3xl font-bold text-avca-red mb-6">¿Por Qué Elegir CambiaTuVuelo?</h2>
          <div class="grid md:grid-cols-2 gap-6">
            <div class="flex items-start">
              <svg class="w-6 h-6 text-avca-red mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <div>
                <h4 class="font-bold text-gray-800 text-lg">Gestión Integral</h4>
                <p class="text-gray-600">Me encargo de todo: vuelos, hoteles y tours. Tú solo disfruta.</p>
              </div>
            </div>
            <div class="flex items-start">
              <svg class="w-6 h-6 text-avca-red mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <div>
                <h4 class="font-bold text-gray-800 text-lg">Cobertura Avianca</h4>
                <p class="text-gray-600">Acceso exclusivo a todos los destinos de la red Avianca, una de las aerolíneas más confiables.</p>
              </div>
            </div>
            <div class="flex items-start">
              <svg class="w-6 h-6 text-avca-red mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <div>
                <h4 class="font-bold text-gray-800 text-lg">Paquetes a tu Medida</h4>
                <p class="text-gray-600">Adapto cada paquete a tus necesidades, presupuesto y preferencias personales.</p>
              </div>
            </div>
            <div class="flex items-start">
              <svg class="w-6 h-6 text-avca-red mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <div>
                <h4 class="font-bold text-gray-800 text-lg">Atención Personalizada</h4>
                <p class="text-gray-600">Estoy siempre disponible para asesorarte y resolver todas tus dudas.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- CTA - ¿Listo para tu Próxima Aventura? -->
        <div class="bg-avca-red text-white rounded-lg shadow-lg p-8 text-center">
          <h3 class="text-2xl font-bold mb-4">¿Listo para tu Próxima Aventura?</h3>
          <p class="text-lg mb-4 opacity-95">Contáctame ahora y déjame diseñar el paquete vacacional perfecto para ti</p>
          <p class="text-base mb-6 opacity-90">Haz clic en el botón de soporte en la esquina inferior derecha para hablar conmigo</p>
          <div class="flex justify-center gap-4 flex-wrap">
            <span class="bg-white text-avca-red px-4 py-2 rounded-lg font-medium">Chat en vivo</span>
            <span class="bg-white text-avca-red px-4 py-2 rounded-lg font-medium">Llamada con asesor</span>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCIÓN POLÍTICA DE PRIVACIDAD -->
    <section id="privacidad" class="bg-gray-100 py-12">
      <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-avca-red">
          <h2 class="text-3xl font-bold text-avca-red mb-6">Política de Privacidad</h2>
          <p class="text-sm text-gray-500 mb-6"><strong>Última actualización:</strong> Noviembre 2025</p>

          <!-- 1. Información General -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">1. Información General</h3>
            <p class="text-gray-700 mb-4">
              En <strong>CambiaTuVuelo</strong>, me comprometo a proteger su privacidad y datos personales. Esta política describe cómo recopilo, uso y protejo su información cuando utiliza mis servicios de asesoría en paquetes vacacionales.
            </p>
            <p class="text-gray-700"><strong>Nombre Comercial:</strong> CambiaTuVuelo</p>
          </div>

          <!-- 2. Información que Recopilo -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">2. Información que Recopilo</h3>
            <p class="text-gray-700 mb-4">Recopilo la siguiente información cuando utiliza mis servicios:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li><strong>Información personal:</strong> Nombre, número de identificación, correo electrónico, teléfono</li>
              <li><strong>Información de viaje:</strong> Preferencias de destinos, fechas, presupuesto</li>
              <li><strong>Información de sesión:</strong> Dirección IP, tipo de navegador, páginas visitadas</li>
              <li><strong>Comunicaciones:</strong> Mensajes de chat y transcripciones de llamadas para mejorar mi servicio</li>
              <li><strong>Cookies y tecnologías similares:</strong> Para mejorar la experiencia del usuario</li>
            </ul>
          </div>

          <!-- 3. Uso de la Información -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">3. Uso de la Información</h3>
            <p class="text-gray-700 mb-4">Utilizo su información para:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Proporcionar servicios de asesoría en paquetes vacacionales</li>
              <li>Gestionar reservas de vuelos, hoteles y visitas turísticas</li>
              <li>Comunicarme con usted sobre sus consultas y solicitudes</li>
              <li>Mejorar mis servicios y experiencia del usuario</li>
              <li>Cumplir con requisitos legales y regulatorios</li>
              <li>Prevenir fraudes y garantizar la seguridad del sistema</li>
            </ul>
          </div>

          <!-- 4. Tecnologías Utilizadas -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">4. Tecnologías Utilizadas</h3>
            <p class="text-gray-700 mb-4">Mi sitio web utiliza las siguientes tecnologías:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li><strong>WebSocket:</strong> Para comunicación en tiempo real a través del chat</li>
              <li><strong>WebRTC:</strong> Para llamadas de voz directas</li>
              <li><strong>Cookies:</strong> Para mantener la sesión y mejorar la experiencia del usuario</li>
              <li><strong>LocalStorage:</strong> Para almacenar preferencias del usuario de forma local</li>
            </ul>
          </div>

          <!-- 5. Cookies -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">5. Cookies</h3>
            <p class="text-gray-700 mb-4">
              Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Las cookies son pequeños archivos de texto que se almacenan en su dispositivo. Puede desactivar las cookies en la configuración de su navegador, aunque esto puede afectar la funcionalidad del sitio.
            </p>
            <p class="text-gray-700 mb-2"><strong>Tipos de cookies que utilizamos:</strong></p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento del sitio</li>
              <li><strong>Cookies de rendimiento:</strong> Para analizar cómo se usa el sitio</li>
              <li><strong>Cookies de funcionalidad:</strong> Para recordar sus preferencias</li>
            </ul>
          </div>

          <!-- 6. Compartir Información -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">6. Compartir Información</h3>
            <p class="text-gray-700 mb-4">No vendo ni comparto su información personal con terceros, excepto en los siguientes casos:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Cuando sea requerido por ley o autoridad competente</li>
              <li>Con proveedores de servicios (aerolíneas, hoteles) necesarios para gestionar su paquete vacacional (bajo acuerdos de confidencialidad)</li>
              <li>Cuando usted me dé su consentimiento explícito</li>
            </ul>
          </div>

          <!-- 7. Seguridad de los Datos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">7. Seguridad de los Datos</h3>
            <p class="text-gray-700 mb-4">
              Implemento medidas de seguridad técnicas y organizativas para proteger su información personal contra acceso no autorizado, pérdida, destrucción o alteración. Esto incluye:
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Cifrado SSL/TLS para todas las comunicaciones</li>
              <li>Almacenamiento seguro de datos</li>
              <li>Acceso restringido a información personal</li>
              <li>Protección de sistemas y datos personales</li>
            </ul>
          </div>

          <!-- 8. Sus Derechos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">8. Sus Derechos</h3>
            <p class="text-gray-700 mb-4">De acuerdo con la Ley 1581 de 2012 de Colombia sobre protección de datos personales, usted tiene derecho a:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Conocer, actualizar y rectificar sus datos personales</li>
              <li>Solicitar prueba de la autorización otorgada</li>
              <li>Ser informado sobre el uso que se le ha dado a sus datos</li>
              <li>Presentar quejas ante la Superintendencia de Industria y Comercio</li>
              <li>Revocar la autorización y/o solicitar la supresión de sus datos</li>
              <li>Acceder de forma gratuita a sus datos personales</li>
            </ul>
          </div>

          <!-- 9. Retención de Datos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">9. Retención de Datos</h3>
            <p class="text-gray-700">
              Conservamos su información personal solo durante el tiempo necesario para cumplir con los fines para los que fue recopilada, o según lo requiera la ley. Las transcripciones de chat y llamadas se conservan por un período de 5 años para fines de auditoría y mejora del servicio.
            </p>
          </div>

          <!-- 10. Menores de Edad -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">10. Menores de Edad</h3>
            <p class="text-gray-700">
              Nuestros servicios no están dirigidos a menores de 18 años. No recopilamos intencionalmente información de menores. Si identificamos que hemos recopilado datos de un menor, procederemos a eliminarlos.
            </p>
          </div>

          <!-- 11. Cambios a esta Política -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">11. Cambios a esta Política</h3>
            <p class="text-gray-700">
              Podemos actualizar esta política de privacidad ocasionalmente. Le notificaremos sobre cambios significativos publicando la nueva política en esta página y actualizando la fecha de "última actualización".
            </p>
          </div>

          <!-- 12. Contacto -->
          <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4">12. Contacto</h3>
            <p class="text-gray-700">
              Si tiene preguntas sobre esta política de privacidad o sobre cómo manejo sus datos personales, contácteme:
            </p>
            <p class="text-gray-700 mt-2"><strong>CambiaTuVuelo</strong></p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCIÓN TÉRMINOS Y CONDICIONES -->
    <section id="terminos" class="bg-white py-12">
      <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-avca-red">
          <h2 class="text-3xl font-bold text-avca-red mb-6">Términos y Condiciones</h2>
          <p class="text-sm text-gray-500 mb-6"><strong>Última actualización:</strong> Noviembre 2025</p>

          <!-- 1. Aceptación de los Términos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">1. Aceptación de los Términos</h3>
            <p class="text-gray-700">
              Bienvenido a <strong>CambiaTuVuelo</strong>. Al acceder y utilizar este sitio web y mis servicios de asesoría en paquetes vacacionales, usted acepta cumplir con estos términos y condiciones. Si no está de acuerdo con alguna parte de estos términos, no debe utilizar mis servicios.
            </p>
          </div>

          <!-- 2. Descripción del Servicio -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">2. Descripción del Servicio</h3>
            <p class="text-gray-700 mb-4">CambiaTuVuelo ofrece servicios de asesoría y gestión de paquetes vacacionales a través de:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Chat en tiempo real mediante tecnología WebSocket</li>
              <li>Llamadas de voz directas mediante WebRTC</li>
              <li>Asesoría personalizada en reservas de vuelos con Avianca</li>
              <li>Gestión de reservas de hoteles</li>
              <li>Organización de visitas a sitios turísticos</li>
              <li>Consultas sobre destinos y paquetes vacacionales</li>
            </ul>
            <p class="text-gray-700 mt-4">
              Mis servicios están diseñados para orientar y asistir a mis clientes en la planificación de sus viajes, pero <strong>no garantizo resultados específicos</strong> en las gestiones realizadas con terceros (aerolíneas, hoteles, proveedores turísticos), ya que estos dependen de la disponibilidad y políticas de dichas empresas.
            </p>
          </div>

          <!-- 3. Requisitos de Uso -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">3. Requisitos de Uso</h3>
            <p class="text-gray-700 mb-4">Para utilizar mis servicios, usted debe:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Ser mayor de 18 años o contar con autorización de un tutor legal</li>
              <li>Proporcionar información veraz y precisa</li>
              <li>Mantener la confidencialidad de sus credenciales de acceso</li>
              <li>Utilizar los servicios de manera legal y apropiada</li>
              <li>No intentar interferir con el funcionamiento del sitio web o servicios</li>
            </ul>
          </div>

          <!-- 4. Registro y Cuenta de Usuario -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">4. Registro y Cuenta de Usuario</h3>
            <p class="text-gray-700 mb-4">Al registrarse en mis servicios, usted se compromete a:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Proporcionar información personal correcta y actualizada</li>
              <li>Mantener sus datos de contacto actualizados</li>
              <li>No compartir su cuenta con terceros</li>
              <li>Notificarme inmediatamente sobre cualquier uso no autorizado de su cuenta</li>
            </ul>
          </div>

          <!-- 5. Uso Aceptable -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">5. Uso Aceptable</h3>
            <p class="text-gray-700 mb-4">Al utilizar mis servicios, usted se compromete a NO:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Proporcionar información falsa o engañosa</li>
              <li>Utilizar los servicios para actividades ilegales o fraudulentas</li>
              <li>Acosar, amenazar o abusar verbalmente</li>
              <li>Intentar acceder a sistemas o datos sin autorización</li>
              <li>Transmitir virus, malware o código malicioso</li>
              <li>Realizar ingeniería inversa de los sistemas</li>
              <li>Utilizar bots o sistemas automatizados sin autorización</li>
            </ul>
          </div>

          <!-- 6. Tarifas y Pagos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">6. Tarifas y Pagos</h3>
            <p class="text-gray-700 mb-4">
              Los servicios de asesoría y gestión de paquetes vacacionales pueden tener costos asociados. Las tarifas serán comunicadas claramente antes de la prestación del servicio. Los pagos deben realizarse a través de los métodos acordados.
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Las tarifas pueden variar según el destino, temporada y tipo de paquete vacacional</li>
              <li>Los pagos deben realizarse en el momento acordado</li>
              <li>No se realizarán reembolsos una vez confirmadas las reservas, salvo casos excepcionales según políticas de proveedores</li>
              <li>Me reservo el derecho de modificar las tarifas con previo aviso</li>
            </ul>
          </div>

          <!-- 7. Propiedad Intelectual -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">7. Propiedad Intelectual</h3>
            <p class="text-gray-700 mb-4">
              Todo el contenido de este sitio web, incluyendo pero no limitado a textos, gráficos, logos, iconos, imágenes, clips de audio, descargas digitales y software, es propiedad de CambiaTuVuelo o de sus proveedores de contenido y está protegido por las leyes de propiedad intelectual de Colombia e internacionales.
            </p>
            <p class="text-gray-700">
              No está permitido copiar, reproducir, distribuir, transmitir, mostrar, vender, licenciar o explotar ningún contenido sin mi autorización expresa por escrito.
            </p>
          </div>

          <!-- 8. Privacidad y Protección de Datos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">8. Privacidad y Protección de Datos</h3>
            <p class="text-gray-700 mb-4">
              El uso de sus datos personales está regido por nuestra <a href="#privacidad" class="text-avca-red hover:underline">Política de Privacidad</a>. Al utilizar nuestros servicios, usted acepta el tratamiento de sus datos según lo descrito en dicha política.
            </p>
            <p class="text-gray-700">
              Las comunicaciones mediante chat y llamadas pueden ser grabadas y almacenadas para fines de calidad, capacitación y cumplimiento legal.
            </p>
          </div>

          <!-- 9. Limitación de Responsabilidad -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">9. Limitación de Responsabilidad</h3>
            <p class="text-gray-700 mb-4">CambiaTuVuelo actúa como asesora y gestora de paquetes vacacionales. Mi responsabilidad se limita a:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Brindar asesoría profesional y veraz sobre destinos y servicios</li>
              <li>Gestionar reservas de acuerdo con las instrucciones del cliente</li>
              <li>Mantener la confidencialidad de la información</li>
              <li>Coordinar servicios con proveedores (aerolíneas, hoteles, tours)</li>
            </ul>
            <p class="text-gray-700 mt-4 mb-4"><strong>CambiaTuVuelo NO se hace responsable por:</strong></p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Decisiones, políticas o cambios de aerolíneas, hoteles y otros proveedores de servicios</li>
              <li>Retrasos, cancelaciones o cambios en vuelos causados por factores externos</li>
              <li>Información incorrecta proporcionada por el cliente</li>
              <li>Cambios en regulaciones, visas o requisitos de viaje de países de destino</li>
              <li>Eventos de fuerza mayor (clima, desastres naturales, pandemias, etc.)</li>
              <li>Daños indirectos o consecuenciales derivados del uso de mis servicios</li>
            </ul>
          </div>

          <!-- 10. Garantías y Declaraciones -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">10. Garantías y Declaraciones</h3>
            <p class="text-gray-700 mb-4">Los servicios se proporcionan "tal cual" y "según disponibilidad". CambiaTuVuelo no garantiza que:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Los servicios estarán disponibles ininterrumpidamente</li>
              <li>Los servicios estarán libres de errores</li>
              <li>Los resultados serán los esperados por el cliente</li>
              <li>Todos los vuelos, hoteles y tours tendrán disponibilidad en todo momento</li>
              <li>Las tarifas de terceros (aerolíneas, hoteles) permanecerán constantes</li>
            </ul>
          </div>

          <!-- 11. Suspensión y Terminación -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">11. Suspensión y Terminación</h3>
            <p class="text-gray-700 mb-4">CambiaTuVuelo se reserva el derecho de suspender o terminar su acceso a los servicios en cualquier momento, sin previo aviso, por:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Violación de estos términos y condiciones</li>
              <li>Comportamiento inapropiado o abusivo</li>
              <li>Actividades fraudulentas o ilegales</li>
              <li>Impago de servicios contratados</li>
              <li>Cualquier otra razón que considere apropiada</li>
            </ul>
          </div>

          <!-- 12. Enlaces a Terceros -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">12. Enlaces a Terceros</h3>
            <p class="text-gray-700">
              Este sitio web puede contener enlaces a sitios de terceros (aerolíneas, hoteles, agencias). CambiaTuVuelo no es responsable del contenido, políticas de privacidad o prácticas de sitios web de terceros. El uso de dichos sitios es bajo su propio riesgo.
            </p>
          </div>

          <!-- 13. Modificaciones a los Términos -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">13. Modificaciones a los Términos</h3>
            <p class="text-gray-700 mb-4">
              CambiaTuVuelo se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Las modificaciones entrarán en vigor al momento de su publicación en este sitio web. Es su responsabilidad revisar periódicamente estos términos.
            </p>
            <p class="text-gray-700">
              El uso continuado de mis servicios después de la publicación de cambios constituye su aceptación de dichos cambios.
            </p>
          </div>

          <!-- 14. Ley Aplicable y Jurisdicción -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">14. Ley Aplicable y Jurisdicción</h3>
            <p class="text-gray-700">
              Estos términos y condiciones se rigen por las leyes de la República de Colombia. Cualquier disputa relacionada con estos términos será resuelta por los tribunales competentes de Bogotá, Colombia.
            </p>
          </div>

          <!-- 15. Indemnización -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">15. Indemnización</h3>
            <p class="text-gray-700 mb-4">Usted acepta indemnizar y eximir de responsabilidad a CambiaTuVuelo de cualquier reclamo, pérdida, responsabilidad, daño, costo o gasto (incluyendo honorarios legales) que surja de:</p>
            <ul class="list-disc list-inside text-gray-700 space-y-2 ml-4">
              <li>Su uso de los servicios</li>
              <li>Su violación de estos términos</li>
              <li>Información falsa o incorrecta que usted proporcione</li>
              <li>Su violación de derechos de terceros</li>
              <li>Su comportamiento durante viajes o uso de servicios contratados</li>
            </ul>
          </div>

          <!-- 16. Divisibilidad -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">16. Divisibilidad</h3>
            <p class="text-gray-700">
              Si alguna disposición de estos términos es declarada inválida o inaplicable, dicha disposición será modificada en la medida necesaria para hacerla válida y aplicable. Las demás disposiciones permanecerán en pleno vigor y efecto.
            </p>
          </div>

          <!-- 17. Contacto -->
          <div class="mb-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4">17. Contacto</h3>
            <p class="text-gray-700">
              Para preguntas sobre estos términos y condiciones, puede contactarme:
            </p>
            <p class="text-gray-700 mt-2"><strong>CambiaTuVuelo</strong></p>
          </div>

          <!-- Aviso importante -->
          <div class="bg-red-50 border-l-4 border-avca-red rounded p-6 mt-8">
            <p class="text-gray-700">
              <strong>Importante:</strong> Al utilizar mis servicios, usted confirma que ha leído, entendido y aceptado estos términos y condiciones en su totalidad.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Widget de soporte flotante -->
    <div id="support-widget" class="fixed bottom-6 right-6 z-50">
      <!-- Botón flotante -->
      <button id="widget-trigger" class="bg-avca-red hover:bg-avca-red-dark text-white rounded-full shadow-lg p-4 transition-transform hover:scale-110">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
        </svg>
      </button>

      <!-- Panel del widget -->
      <div id="widget-panel" class="hidden fixed sm:absolute bottom-20 inset-x-0 sm:inset-x-auto sm:right-0 w-[calc(100%-2rem)] max-w-sm mx-auto sm:mx-0 sm:w-80 bg-white rounded-lg shadow-2xl overflow-hidden">
        <!-- Selector de modo -->
        <div id="mode-selector" class="p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-4">¿Necesitas ayuda?</h3>
          <div class="space-y-3">
            <button id="btn-chat" class="w-full bg-red-50 hover:bg-red-100 text-avca-red font-medium py-3 px-4 rounded-lg transition-colors flex items-center justify-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
              <span>Chat en vivo</span>
            </button>
            <button id="btn-call" disabled class="w-full bg-gray-100 text-gray-400 font-medium py-3 px-4 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2 opacity-50">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
              <span>Llamada con asesor (No disponible)</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Información de la empresa -->
        <div>
          <h3 class="text-2xl font-bold mb-3 text-avca-red">CambiaTuVuelo</h3>
          <p class="text-gray-300 text-sm mb-2">Especialistas en paquetes vacacionales</p>
          <p class="text-gray-400 text-sm">Conectando destinos, creando experiencias</p>
        </div>

        <!-- Enlaces legales -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Información Legal</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#inicio" class="text-gray-300 hover:text-avca-red transition-colors">Inicio</a></li>
            <li><a href="#privacidad" class="text-gray-300 hover:text-avca-red transition-colors">Política de Privacidad</a></li>
            <li><a href="#terminos" class="text-gray-300 hover:text-avca-red transition-colors">Términos y Condiciones</a></li>
          </ul>
        </div>

        <!-- Contacto -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Soporte al Cliente</h3>
          <ul class="space-y-2 text-sm text-gray-300">
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5 text-avca-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
              <span>Chat en vivo disponible</span>
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5 text-avca-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
              <div>
                <p>Atención personalizada</p>
                <p class="text-xs text-gray-400">Lunes a Viernes</p>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <!-- Copyright -->
      <div class="border-t border-gray-700 mt-8 pt-6">
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
          <p>&copy; 2025 CambiaTuVuelo. Todos los derechos reservados.</p>
          <p class="mt-2 md:mt-0 text-xs">Paquetes vacacionales hacia destinos Avianca</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Cookie Banner -->
  <div id="cookie-banner" class="hidden fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50">
    <div class="container mx-auto">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex-1">
          <p class="text-sm">
            Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Al continuar navegando, acepta nuestro uso de cookies según nuestra
            <a href="#privacidad" class="underline hover:text-gray-300">Política de Privacidad</a>.
          </p>
        </div>
        <div class="flex gap-3">
          <button id="cookie-accept" class="bg-avca-red hover:bg-avca-red-dark text-white px-6 py-2 rounded-lg text-sm font-medium transition-colors">Aceptar</button>
          <button id="cookie-reject" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-lg text-sm font-medium transition-colors">Rechazar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Cookie banner functionality
    function checkCookieConsent() {
      const consent = localStorage.getItem('cookie-consent');
      const banner = document.getElementById('cookie-banner');
      if (!consent && banner) {
        banner.classList.remove('hidden');
      }
    }

    const cookieAccept = document.getElementById('cookie-accept');
    if (cookieAccept) {
      cookieAccept.addEventListener('click', () => {
        localStorage.setItem('cookie-consent', 'accepted');
        const banner = document.getElementById('cookie-banner');
        if (banner) banner.classList.add('hidden');
      });
    }

    const cookieReject = document.getElementById('cookie-reject');
    if (cookieReject) {
      cookieReject.addEventListener('click', () => {
        localStorage.setItem('cookie-consent', 'rejected');
        const banner = document.getElementById('cookie-banner');
        if (banner) banner.classList.add('hidden');
      });
    }

    checkCookieConsent();

    // Widget functionality
    const widgetTrigger = document.getElementById('widget-trigger');
    const widgetPanel = document.getElementById('widget-panel');
    const btnChat = document.getElementById('btn-chat');

    // Toggle widget panel
    if (widgetTrigger) {
      widgetTrigger.addEventListener('click', () => {
        if (widgetPanel) {
          widgetPanel.classList.toggle('hidden');
        }
      });
    }

    // Handle chat button - Redirige a la página de chat
    if (btnChat) {
      btnChat.addEventListener('click', () => {
        window.location.href = '/cambiovuelo/chat';
      });
    }
  </script>
</body>
</html>
