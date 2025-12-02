<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO Meta Tags -->
  <title>TransPIN Colombia - Transporte de Pasajeros y Encomiendas entre Ciudades</title>
  <meta name="description" content="Servicio de transporte intermunicipal de pasajeros y encomiendas en Colombia. 10 microbuses con conductores experimentados. Viaja seguro entre las principales ciudades del país.">
  <meta name="keywords" content="transporte pasajeros Colombia, encomiendas entre ciudades, microbuses Colombia, transporte intermunicipal, tiquetes de bus, viajes entre ciudades Colombia">
  <meta name="author" content="TransPIN Colombia">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="TransPIN Colombia - Transporte de Pasajeros y Encomiendas">
  <meta property="og:description" content="Servicio de transporte intermunicipal de pasajeros y encomiendas en Colombia. Viaja seguro con conductores experimentados.">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="TransPIN Colombia">
  <meta property="og:locale" content="es_CO">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="TransPIN Colombia - Transporte de Pasajeros y Encomiendas">
  <meta name="twitter:description" content="Servicio de transporte intermunicipal de pasajeros y encomiendas en Colombia.">

  <!-- Additional Meta Tags -->
  <meta name="theme-color" content="#1E40AF">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fuentes corporativas Expreso Brasilia -->
  <link rel="stylesheet" href="/pin/estilos/css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
    }

    /* Encabezados - Oswald (similar a New Order Bold del sitio oficial) */
    h1, h2, h3, h4, h5, h6, .section-title {
      font-family: 'Oswald', Helvetica, Arial, sans-serif;
      font-weight: 700;
    }

    /* Títulos destacados del slider - Alata */
    .highlight-title, .slider-title {
      font-family: 'Alata', Helvetica, Arial, sans-serif;
    }

    /* Botones y elementos interactivos */
    button, .btn, a.btn {
      font-family: 'Oswald', Helvetica, Arial, sans-serif;
      font-weight: 600;
    }

    /* Menú de navegación */
    nav a, .nav-link {
      font-family: 'Oswald', Helvetica, Arial, sans-serif;
      font-weight: 700;
    }

    .gradient-primary {
      background: linear-gradient(135deg, #1E40AF 0%, #3B82F6 100%);
    }

    .gradient-secondary {
      background: linear-gradient(135deg, #059669 0%, #10B981 100%);
    }

    .text-gradient {
      background: linear-gradient(135deg, #1E40AF, #3B82F6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-pattern {
      background-color: #1E40AF;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #3B82F6;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    @media (max-width: 768px) {
      .mobile-menu {
        display: none;
      }
      .mobile-menu.active {
        display: flex;
      }
    }
  </style>
</head>
<body class="bg-gray-50">
<x-lab-banner />

  <!-- Header / Navegación -->
  <header class="bg-white shadow-sm fixed w-full top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <!-- Logo -->
        <a href="#inicio" class="flex items-center space-x-2">
          <div class="w-10 h-10 gradient-primary rounded-lg flex items-center justify-center">
            <i class="fas fa-bus-alt text-white text-xl"></i>
          </div>
          <span class="text-xl font-bold text-gray-800">Trans<span class="text-blue-600">PIN</span></span>
        </a>

        <!-- Menú Desktop -->
        <div class="hidden md:flex items-center space-x-8">
          <a href="#inicio" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Inicio</a>
          <a href="#servicios" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Servicios</a>
          <a href="#rutas" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Rutas</a>
          <a href="#nosotros" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Nosotros</a>
          <a href="#contacto" class="nav-link text-gray-700 hover:text-blue-600 font-medium">Contacto</a>
          <a href="#reservar" class="gradient-primary text-white px-6 py-2 rounded-full font-medium hover:opacity-90 transition">
            Reservar Tiquete
          </a>
        </div>

        <!-- Botón Menú Móvil -->
        <button id="menu-toggle" class="md:hidden text-gray-700">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>

      <!-- Menú Móvil -->
      <div id="mobile-menu" class="mobile-menu md:hidden flex-col mt-4 space-y-4 pb-4">
        <a href="#inicio" class="text-gray-700 hover:text-blue-600 font-medium">Inicio</a>
        <a href="#servicios" class="text-gray-700 hover:text-blue-600 font-medium">Servicios</a>
        <a href="#rutas" class="text-gray-700 hover:text-blue-600 font-medium">Rutas</a>
        <a href="#nosotros" class="text-gray-700 hover:text-blue-600 font-medium">Nosotros</a>
        <a href="#contacto" class="text-gray-700 hover:text-blue-600 font-medium">Contacto</a>
        <a href="#reservar" class="gradient-primary text-white px-6 py-2 rounded-full font-medium text-center">
          Reservar Tiquete
        </a>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="inicio" class="hero-pattern min-h-screen flex items-center pt-20">
    <div class="container mx-auto px-4 py-16">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="text-white">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Viaja seguro por toda Colombia
          </h1>
          <p class="text-xl md:text-2xl text-blue-100 mb-8">
            Transporte de pasajeros y encomiendas entre las principales ciudades del país. Comodidad, puntualidad y experiencia a tu servicio.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#reservar" class="bg-white text-blue-700 px-8 py-4 rounded-full font-bold text-lg hover:bg-blue-50 transition text-center">
              <i class="fas fa-ticket-alt mr-2"></i>Comprar Tiquete
            </a>
            <a href="#contacto" class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-blue-700 transition text-center">
              <i class="fas fa-phone-alt mr-2"></i>Contáctanos
            </a>
          </div>
          <div class="mt-12 flex flex-wrap gap-8">
            <div class="text-center">
              <div class="text-4xl font-bold">10</div>
              <div class="text-blue-200">Microbuses</div>
            </div>
            <div class="text-center">
              <div class="text-4xl font-bold">15+</div>
              <div class="text-blue-200">Años de Experiencia</div>
            </div>
            <div class="text-center">
              <div class="text-4xl font-bold">50k+</div>
              <div class="text-blue-200">Pasajeros Felices</div>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
            <div class="bg-white rounded-2xl p-6 shadow-xl">
              <h3 class="text-xl font-bold text-gray-800 mb-4">Consulta tu viaje</h3>
              <form id="form-consulta" class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad de origen</label>
                  <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona origen</option>
                    <option value="bogota">Bogota</option>
                    <option value="medellin">Medellin</option>
                    <option value="cali">Cali</option>
                    <option value="barranquilla">Barranquilla</option>
                    <option value="cartagena">Cartagena</option>
                    <option value="bucaramanga">Bucaramanga</option>
                    <option value="pereira">Pereira</option>
                    <option value="manizales">Manizales</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad de destino</label>
                  <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona destino</option>
                    <option value="bogota">Bogota</option>
                    <option value="medellin">Medellin</option>
                    <option value="cali">Cali</option>
                    <option value="barranquilla">Barranquilla</option>
                    <option value="cartagena">Cartagena</option>
                    <option value="bucaramanga">Bucaramanga</option>
                    <option value="pereira">Pereira</option>
                    <option value="manizales">Manizales</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de viaje</label>
                  <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <button type="submit" class="w-full gradient-primary text-white py-4 rounded-lg font-bold text-lg hover:opacity-90 transition">
                  Buscar Viajes Disponibles
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Servicios -->
  <section id="servicios" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Servicios</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Ofrecemos soluciones de transporte adaptadas a tus necesidades, con la mejor calidad y al mejor precio.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Servicio 1: Transporte de Pasajeros -->
        <div class="card-hover bg-white border border-gray-100 rounded-2xl p-8 shadow-lg">
          <div class="w-16 h-16 gradient-primary rounded-2xl flex items-center justify-center mb-6">
            <i class="fas fa-users text-white text-2xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Transporte de Pasajeros</h3>
          <p class="text-gray-600 mb-6">
            Viaja comodo y seguro entre las principales ciudades de Colombia. Nuestros microbuses cuentan con aire acondicionado, asientos reclinables y amplio espacio para equipaje.
          </p>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Asientos comodos</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Aire acondicionado</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Seguro de viaje incluido</li>
          </ul>
        </div>

        <!-- Servicio 2: Envio de Encomiendas -->
        <div class="card-hover bg-white border border-gray-100 rounded-2xl p-8 shadow-lg">
          <div class="w-16 h-16 gradient-secondary rounded-2xl flex items-center justify-center mb-6">
            <i class="fas fa-box text-white text-2xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Envio de Encomiendas</h3>
          <p class="text-gray-600 mb-6">
            Enviamos tus paquetes y encomiendas de forma rapida y segura. Servicio puerta a puerta disponible en las principales ciudades.
          </p>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Entrega el mismo dia</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Seguimiento en tiempo real</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Paquetes asegurados</li>
          </ul>
        </div>

        <!-- Servicio 3: Servicio Especial -->
        <div class="card-hover bg-white border border-gray-100 rounded-2xl p-8 shadow-lg">
          <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-purple-400 rounded-2xl flex items-center justify-center mb-6">
            <i class="fas fa-star text-white text-2xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicio Especial</h3>
          <p class="text-gray-600 mb-6">
            Alquiler de vehiculos para grupos, eventos empresariales, excursiones y viajes personalizados. Cotizacion sin compromiso.
          </p>
          <ul class="space-y-2 text-gray-600">
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Grupos hasta 19 personas</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Rutas personalizadas</li>
            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Precios competitivos</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Rutas Principales -->
  <section id="rutas" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Rutas Principales</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Conectamos las principales ciudades de Colombia con salidas diarias y horarios flexibles.
        </p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Ruta 1 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Bogota</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Medellin</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$85.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~8 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 6:00 AM, 2:00 PM, 10:00 PM</p>
        </div>

        <!-- Ruta 2 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Bogota</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Cali</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$95.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~10 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 7:00 AM, 3:00 PM, 9:00 PM</p>
        </div>

        <!-- Ruta 3 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Medellin</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Cartagena</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$120.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~13 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 5:00 AM, 8:00 PM</p>
        </div>

        <!-- Ruta 4 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Bogota</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Bucaramanga</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$75.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~7 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 6:30 AM, 1:00 PM, 11:00 PM</p>
        </div>

        <!-- Ruta 5 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Cali</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Pereira</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$45.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~4 horas</p>
          <p class="text-gray-500 text-sm">Salidas: Cada 2 horas</p>
        </div>

        <!-- Ruta 6 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Medellin</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Manizales</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$55.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~5 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 8:00 AM, 4:00 PM</p>
        </div>

        <!-- Ruta 7 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Barranquilla</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Cartagena</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$35.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~2 horas</p>
          <p class="text-gray-500 text-sm">Salidas: Cada hora</p>
        </div>

        <!-- Ruta 8 -->
        <div class="card-hover bg-white rounded-xl p-6 shadow-md">
          <div class="flex items-center justify-between mb-4">
            <span class="text-blue-600 font-bold">Bogota</span>
            <i class="fas fa-arrow-right text-gray-400"></i>
            <span class="text-blue-600 font-bold">Pereira</span>
          </div>
          <div class="text-3xl font-bold text-gray-800 mb-2">$70.000</div>
          <p class="text-gray-500 text-sm">Duracion: ~6 horas</p>
          <p class="text-gray-500 text-sm">Salidas: 5:00 AM, 12:00 PM, 7:00 PM</p>
        </div>
      </div>

      <div class="text-center mt-12">
        <p class="text-gray-600 mb-4">Los precios pueden variar segun temporada y disponibilidad</p>
        <a href="#contacto" class="inline-block gradient-primary text-white px-8 py-4 rounded-full font-bold hover:opacity-90 transition">
          Consultar otras rutas
        </a>
      </div>
    </div>
  </section>

  <!-- Nosotros -->
  <section id="nosotros" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Sobre Nosotros</h2>
          <p class="text-lg text-gray-600 mb-6">
            Somos un servicio de transporte operado como persona natural con mas de 15 anos de experiencia conectando familias y negocios en toda Colombia.
          </p>
          <p class="text-lg text-gray-600 mb-6">
            Contamos con una flota de 10 microbuses modernos y un equipo de conductores altamente capacitados y con amplia experiencia en las carreteras colombianas. Nuestra prioridad es tu seguridad y comodidad.
          </p>

          <div class="grid grid-cols-2 gap-6 mt-8">
            <div class="flex items-start space-x-3">
              <div class="w-12 h-12 gradient-primary rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-shield-alt text-white"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Seguridad</h4>
                <p class="text-sm text-gray-600">Vehiculos con revision tecnico-mecanica al dia</p>
              </div>
            </div>
            <div class="flex items-start space-x-3">
              <div class="w-12 h-12 gradient-secondary rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-clock text-white"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Puntualidad</h4>
                <p class="text-sm text-gray-600">Cumplimos con los horarios establecidos</p>
              </div>
            </div>
            <div class="flex items-start space-x-3">
              <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-400 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-hand-holding-heart text-white"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Atencion</h4>
                <p class="text-sm text-gray-600">Trato amable y personalizado</p>
              </div>
            </div>
            <div class="flex items-start space-x-3">
              <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-purple-400 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-coins text-white"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Precios Justos</h4>
                <p class="text-sm text-gray-600">Tarifas competitivas y transparentes</p>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-gray-100 rounded-3xl p-8">
          <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
            <div class="flex items-center space-x-4 mb-4">
              <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-blue-600"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Maria Rodriguez</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-600 italic">"Excelente servicio! Viajo frecuentemente de Bogota a Medellin y siempre llego a tiempo. Los conductores son muy amables y profesionales."</p>
          </div>

          <div class="bg-white rounded-2xl p-6 shadow-lg mb-6">
            <div class="flex items-center space-x-4 mb-4">
              <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-green-600"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Carlos Mendez</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-600 italic">"Envio encomiendas regularmente para mi negocio. El servicio es confiable y mis paquetes siempre llegan en perfecto estado."</p>
          </div>

          <div class="bg-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center space-x-4 mb-4">
              <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-purple-600"></i>
              </div>
              <div>
                <h4 class="font-bold text-gray-800">Ana Gutierrez</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-600 italic">"Contrate el servicio especial para una excursion con mi familia. Todo salio perfecto, muy recomendados!"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Reservar Tiquete -->
  <section id="reservar" class="py-20 hero-pattern">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Reserva tu Tiquete</h2>
          <p class="text-xl text-blue-100">
            Completa el formulario y nos comunicaremos contigo para confirmar tu reserva.
          </p>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-2xl">
          <form id="form-reserva" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre completo *</label>
                <input type="text" name="nombre" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tu nombre completo">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Numero de documento *</label>
                <input type="text" name="documento" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Cedula o pasaporte">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefono / WhatsApp *</label>
                <input type="tel" name="telefono" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ej: 3001234567">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo electronico</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="correo@ejemplo.com">
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ciudad de origen *</label>
                <select name="origen" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  <option value="">Selecciona origen</option>
                  <option value="bogota">Bogota</option>
                  <option value="medellin">Medellin</option>
                  <option value="cali">Cali</option>
                  <option value="barranquilla">Barranquilla</option>
                  <option value="cartagena">Cartagena</option>
                  <option value="bucaramanga">Bucaramanga</option>
                  <option value="pereira">Pereira</option>
                  <option value="manizales">Manizales</option>
                  <option value="otra">Otra ciudad</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ciudad de destino *</label>
                <select name="destino" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  <option value="">Selecciona destino</option>
                  <option value="bogota">Bogota</option>
                  <option value="medellin">Medellin</option>
                  <option value="cali">Cali</option>
                  <option value="barranquilla">Barranquilla</option>
                  <option value="cartagena">Cartagena</option>
                  <option value="bucaramanga">Bucaramanga</option>
                  <option value="pereira">Pereira</option>
                  <option value="manizales">Manizales</option>
                  <option value="otra">Otra ciudad</option>
                </select>
              </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Fecha de viaje *</label>
                <input type="date" name="fecha" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Numero de pasajeros *</label>
                <select name="pasajeros" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  <option value="1">1 pasajero</option>
                  <option value="2">2 pasajeros</option>
                  <option value="3">3 pasajeros</option>
                  <option value="4">4 pasajeros</option>
                  <option value="5">5 o mas pasajeros</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de servicio</label>
                <select name="servicio" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                  <option value="pasajeros">Transporte pasajeros</option>
                  <option value="encomienda">Envio de encomienda</option>
                  <option value="especial">Servicio especial</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Comentarios adicionales</label>
              <textarea name="comentarios" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Informacion adicional sobre tu viaje o encomienda..."></textarea>
            </div>

            <div class="flex items-start space-x-3">
              <input type="checkbox" id="terminos" name="terminos" required class="mt-1 w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
              <label for="terminos" class="text-sm text-gray-600">
                He leido y acepto los <a href="#terminos-condiciones" class="text-blue-600 hover:underline">Terminos y Condiciones</a> y la <a href="#politica-privacidad" class="text-blue-600 hover:underline">Politica de Privacidad</a> del servicio. *
              </label>
            </div>

            <button type="submit" class="w-full gradient-primary text-white py-4 rounded-lg font-bold text-lg hover:opacity-90 transition">
              <i class="fas fa-paper-plane mr-2"></i>Enviar Solicitud de Reserva
            </button>

            <p class="text-center text-sm text-gray-500">
              Nos comunicaremos contigo en menos de 2 horas para confirmar disponibilidad y precio final.
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Contacto -->
  <section id="contacto" class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Contactanos</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Estamos disponibles para atenderte. Comunicate con nosotros por cualquiera de estos canales.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
        <div class="card-hover bg-gray-50 rounded-2xl p-8 text-center">
          <div class="w-16 h-16 gradient-primary rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-phone-alt text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Telefono</h3>
          <p class="text-gray-600 mb-4">Llamanos para consultas y reservas</p>
          <a href="tel:+573001234567" class="text-blue-600 font-bold text-lg hover:underline">+57 300 123 4567</a>
        </div>

        <div class="card-hover bg-gray-50 rounded-2xl p-8 text-center">
          <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-400 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fab fa-whatsapp text-white text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">WhatsApp</h3>
          <p class="text-gray-600 mb-4">Escribenos para atencion rapida</p>
          <a href="https://wa.me/573001234567" target="_blank" class="text-green-600 font-bold text-lg hover:underline">+57 300 123 4567</a>
        </div>

        <div class="card-hover bg-gray-50 rounded-2xl p-8 text-center">
          <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-red-400 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-envelope text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Correo</h3>
          <p class="text-gray-600 mb-4">Envianos tus consultas</p>
          <a href="mailto:contacto@transpin.com" class="text-red-600 font-bold text-lg hover:underline">contacto@transpin.com</a>
        </div>
      </div>

      <div class="mt-16 bg-gray-50 rounded-2xl p-8 max-w-4xl mx-auto">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Horario de Atencion</h3>
        <div class="grid md:grid-cols-2 gap-8">
          <div>
            <h4 class="font-bold text-gray-700 mb-3">Oficina Principal</h4>
            <ul class="space-y-2 text-gray-600">
              <li class="flex justify-between"><span>Lunes a Viernes:</span><span class="font-medium">6:00 AM - 9:00 PM</span></li>
              <li class="flex justify-between"><span>Sabados:</span><span class="font-medium">6:00 AM - 8:00 PM</span></li>
              <li class="flex justify-between"><span>Domingos y Festivos:</span><span class="font-medium">7:00 AM - 6:00 PM</span></li>
            </ul>
          </div>
          <div>
            <h4 class="font-bold text-gray-700 mb-3">Linea de Emergencias</h4>
            <p class="text-gray-600 mb-4">Para pasajeros en ruta o emergencias durante el viaje:</p>
            <p class="text-2xl font-bold text-blue-600">+57 300 123 4568</p>
            <p class="text-sm text-gray-500">Disponible 24/7</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Politicas (requeridas por Google Ads) -->
  <section id="politicas" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="max-w-4xl mx-auto">

        <!-- Terminos y Condiciones -->
        <div id="terminos-condiciones" class="bg-white rounded-2xl p-8 shadow-lg mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-file-contract text-blue-600 mr-3"></i>Terminos y Condiciones del Servicio
          </h2>

          <div class="space-y-6 text-gray-600">
            <div>
              <h3 class="font-bold text-gray-800 mb-2">1. Informacion del Prestador</h3>
              <p>Este servicio de transporte es operado por una persona natural dedicada al transporte intermunicipal de pasajeros y encomiendas en la Republica de Colombia. Operamos bajo la normativa colombiana aplicable al transporte terrestre.</p>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">2. Servicios Ofrecidos</h3>
              <p>Ofrecemos servicios de transporte de pasajeros entre ciudades, envio de encomiendas y paquetes, asi como alquiler de vehiculos para servicios especiales. Todos nuestros servicios estan sujetos a disponibilidad.</p>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">3. Reservas y Pagos</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li>Las reservas se confirman unicamente despues de verificar disponibilidad.</li>
                <li>El pago del tiquete debe realizarse antes del abordaje.</li>
                <li>Aceptamos pagos en efectivo, transferencias bancarias y pagos moviles.</li>
                <li>Los precios publicados son referenciales y pueden variar segun temporada.</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">4. Cancelaciones y Reembolsos</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li>Cancelaciones con mas de 24 horas: reembolso del 100%.</li>
                <li>Cancelaciones entre 12 y 24 horas: reembolso del 50%.</li>
                <li>Cancelaciones con menos de 12 horas: sin derecho a reembolso.</li>
                <li>Los cambios de fecha estan sujetos a disponibilidad.</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">5. Equipaje y Encomiendas</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li>Cada pasajero tiene derecho a una maleta de hasta 15 kg.</li>
                <li>El equipaje adicional tiene un costo extra.</li>
                <li>No transportamos sustancias peligrosas, ilegales o perecederos sin refrigeracion.</li>
                <li>Las encomiendas deben declarar su contenido y valor.</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">6. Responsabilidad</h3>
              <p>Nos comprometemos a transportar a los pasajeros de forma segura. Contamos con seguro contra accidentes para todos los pasajeros. No nos hacemos responsables por retrasos causados por condiciones climaticas, cierres de vias u otras causas de fuerza mayor.</p>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">7. Derechos del Pasajero</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li>Recibir un trato digno y respetuoso.</li>
                <li>Viajar en vehiculos en buen estado tecnico-mecanico.</li>
                <li>Conocer previamente el precio del servicio.</li>
                <li>Presentar quejas o sugerencias.</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">8. Obligaciones del Pasajero</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li>Presentarse 15 minutos antes de la hora de salida.</li>
                <li>Portar documento de identidad vigente.</li>
                <li>Mantener un comportamiento adecuado durante el viaje.</li>
                <li>No consumir alimentos ni bebidas alcoholicas en el vehiculo.</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Politica de Privacidad -->
        <div id="politica-privacidad" class="bg-white rounded-2xl p-8 shadow-lg mb-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-shield-alt text-green-600 mr-3"></i>Politica de Privacidad
          </h2>

          <div class="space-y-6 text-gray-600">
            <div>
              <h3 class="font-bold text-gray-800 mb-2">1. Datos que Recopilamos</h3>
              <p>Para prestar nuestros servicios recopilamos los siguientes datos personales:</p>
              <ul class="list-disc list-inside space-y-1 ml-4 mt-2">
                <li>Nombre completo</li>
                <li>Numero de documento de identidad</li>
                <li>Numero de telefono y/o WhatsApp</li>
                <li>Correo electronico (opcional)</li>
                <li>Informacion del viaje (origen, destino, fecha)</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">2. Uso de los Datos</h3>
              <p>Utilizamos tus datos personales unicamente para:</p>
              <ul class="list-disc list-inside space-y-1 ml-4 mt-2">
                <li>Gestionar tu reserva y prestarte el servicio de transporte.</li>
                <li>Comunicarnos contigo sobre tu viaje.</li>
                <li>Cumplir con requisitos legales de registro de pasajeros.</li>
                <li>Enviarte informacion sobre promociones (solo si lo autorizas).</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">3. Proteccion de Datos</h3>
              <p>Tus datos son tratados de forma confidencial. No vendemos ni compartimos tu informacion personal con terceros, excepto cuando sea requerido por autoridades competentes o para cumplir con la ley.</p>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">4. Tus Derechos</h3>
              <p>De acuerdo con la Ley 1581 de 2012 de Proteccion de Datos Personales de Colombia, tienes derecho a:</p>
              <ul class="list-disc list-inside space-y-1 ml-4 mt-2">
                <li>Conocer, actualizar y rectificar tus datos personales.</li>
                <li>Solicitar prueba de la autorizacion otorgada.</li>
                <li>Ser informado sobre el uso de tus datos.</li>
                <li>Revocar la autorizacion y/o solicitar la supresion de tus datos.</li>
                <li>Presentar quejas ante la Superintendencia de Industria y Comercio.</li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">5. Tiempo de Conservacion</h3>
              <p>Conservamos tus datos durante el tiempo necesario para cumplir con la finalidad para la cual fueron recopilados y segun lo exija la normativa aplicable al transporte terrestre.</p>
            </div>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">6. Contacto para Temas de Privacidad</h3>
              <p>Para ejercer tus derechos o resolver dudas sobre el tratamiento de tus datos, contactanos:</p>
              <p class="mt-2"><strong>Correo:</strong> privacidad@transpin.com</p>
              <p><strong>Telefono:</strong> +57 300 123 4567</p>
            </div>
          </div>
        </div>

        <!-- Politica de Cookies -->
        <div id="politica-cookies" class="bg-white rounded-2xl p-8 shadow-lg">
          <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-cookie-bite text-yellow-600 mr-3"></i>Politica de Cookies
          </h2>

          <div class="space-y-6 text-gray-600">
            <p>Este sitio web utiliza cookies para mejorar tu experiencia de navegacion. Las cookies son pequenos archivos de texto que se almacenan en tu dispositivo.</p>

            <div>
              <h3 class="font-bold text-gray-800 mb-2">Tipos de cookies que usamos:</h3>
              <ul class="list-disc list-inside space-y-1 ml-4">
                <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento basico del sitio.</li>
                <li><strong>Cookies de preferencias:</strong> Recuerdan tus preferencias de navegacion.</li>
                <li><strong>Cookies de analisis:</strong> Nos ayudan a entender como usas el sitio.</li>
              </ul>
            </div>

            <p>Puedes configurar tu navegador para rechazar cookies, aunque esto puede afectar la funcionalidad del sitio.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
      <div class="grid md:grid-cols-4 gap-8">
        <!-- Logo e info -->
        <div class="md:col-span-2">
          <a href="#inicio" class="flex items-center space-x-2 mb-4">
            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
              <i class="fas fa-bus-alt text-white text-xl"></i>
            </div>
            <span class="text-xl font-bold">Trans<span class="text-blue-400">PIN</span></span>
          </a>
          <p class="text-gray-400 mb-4">
            Servicio de transporte de pasajeros y encomiendas entre las principales ciudades de Colombia. Mas de 15 anos conectando familias y negocios.
          </p>
          <p class="text-gray-500 text-sm">
            Servicio prestado por persona natural.<br>
            Bogota, Colombia
          </p>
        </div>

        <!-- Enlaces rapidos -->
        <div>
          <h3 class="text-lg font-bold mb-4">Enlaces</h3>
          <ul class="space-y-2">
            <li><a href="#inicio" class="text-gray-400 hover:text-white transition">Inicio</a></li>
            <li><a href="#servicios" class="text-gray-400 hover:text-white transition">Servicios</a></li>
            <li><a href="#rutas" class="text-gray-400 hover:text-white transition">Rutas y Precios</a></li>
            <li><a href="#nosotros" class="text-gray-400 hover:text-white transition">Nosotros</a></li>
            <li><a href="#reservar" class="text-gray-400 hover:text-white transition">Reservar</a></li>
            <li><a href="#contacto" class="text-gray-400 hover:text-white transition">Contacto</a></li>
          </ul>
        </div>

        <!-- Legal -->
        <div>
          <h3 class="text-lg font-bold mb-4">Legal</h3>
          <ul class="space-y-2">
            <li><a href="#terminos-condiciones" class="text-gray-400 hover:text-white transition">Terminos y Condiciones</a></li>
            <li><a href="#politica-privacidad" class="text-gray-400 hover:text-white transition">Politica de Privacidad</a></li>
            <li><a href="#politica-cookies" class="text-gray-400 hover:text-white transition">Politica de Cookies</a></li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 mt-12 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-500 text-sm">
            &copy; 2025 TransPIN Colombia. Todos los derechos reservados.
          </p>
          <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-whatsapp"></i></a>
          </div>
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
            Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. Al continuar navegando, aceptas nuestro uso de cookies segun nuestra
            <a href="#politica-cookies" class="underline hover:text-gray-300">Politica de Cookies</a> y
            <a href="#politica-privacidad" class="underline hover:text-gray-300">Politica de Privacidad</a>.
          </p>
        </div>
        <div class="flex gap-3">
          <button id="cookie-accept" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition">Aceptar</button>
          <button id="cookie-reject" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded-lg text-sm font-medium transition">Rechazar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Boton WhatsApp Flotante -->
  <a href="https://wa.me/573001234567" target="_blank" class="fixed bottom-6 right-6 w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-lg z-40 transition-transform hover:scale-110">
    <i class="fab fa-whatsapp text-white text-3xl"></i>
  </a>

  <script>
    // Menu movil toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
      });
    }

    // Cerrar menu al hacer clic en un enlace
    document.querySelectorAll('#mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
      });
    });

    // Cookie banner
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
        document.getElementById('cookie-banner').classList.add('hidden');
      });
    }

    const cookieReject = document.getElementById('cookie-reject');
    if (cookieReject) {
      cookieReject.addEventListener('click', () => {
        localStorage.setItem('cookie-consent', 'rejected');
        document.getElementById('cookie-banner').classList.add('hidden');
      });
    }

    checkCookieConsent();

    // Form de reserva
    const formReserva = document.getElementById('form-reserva');
    if (formReserva) {
      formReserva.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('¡Gracias por tu solicitud! Nos comunicaremos contigo pronto para confirmar tu reserva.');
        formReserva.reset();
      });
    }

    // Form de consulta
    const formConsulta = document.getElementById('form-consulta');
    if (formConsulta) {
      formConsulta.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Consulta recibida. Redirigiendo a la seccion de reserva...');
        window.location.href = '#reservar';
      });
    }

    // Header scroll effect
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.classList.add('shadow-md');
      } else {
        header.classList.remove('shadow-md');
      }
    });

    // Fecha minima para reservas (hoy)
    const fechaInputs = document.querySelectorAll('input[type="date"]');
    const today = new Date().toISOString().split('T')[0];
    fechaInputs.forEach(input => {
      input.setAttribute('min', today);
    });
  </script>
</body>
</html>
