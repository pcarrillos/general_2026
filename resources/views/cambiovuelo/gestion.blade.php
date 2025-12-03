<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestión integral de experiencias turísticas personalizadas. Nos encargamos de toda la logística para que disfrutes tus vacaciones sin preocupaciones.">
    <meta name="keywords" content="turismo, vacaciones personalizadas, gestión turística, experiencias de viaje">
    <title>Tu Viaje Ideal | Gestión de Experiencias Turísticas Personalizadas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#E31837',
                        'primary-dark': '#C41230',
                        'primary-light': '#FF1744',
                        secondary: '#1D1D1B',
                        accent: '#E31837',
                        'gray-warm': '#F5F5F5',
                        'gray-medium': '#757575',
                    },
                    fontFamily: {
                        sans: ['Red Hat Display', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        @font-face {
            font-family: 'Red Hat Display';
            src: url('/cambiovuelo/red-hat.woff2') format('woff2');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Red Hat Display', sans-serif; }
        .gradient-hero {
            background: linear-gradient(135deg, #E31837 0%, #C41230 50%, #8B0000 100%);
        }
        .text-gradient {
            background: linear-gradient(135deg, #E31837, #FF1744);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="text-secondary bg-white">
    <!-- Navegación -->
    <nav class="fixed top-0 w-full bg-white z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">TV</span>
                    </div>
                    <span class="text-2xl font-bold text-secondary">TuViaje<span class="text-primary">Ideal</span></span>
                </a>
                <ul class="hidden md:flex items-center space-x-8">
                    <li><a href="#inicio" class="text-secondary hover:text-primary font-medium transition-colors text-sm">Inicio</a></li>
                    <li><a href="#nosotros" class="text-secondary hover:text-primary font-medium transition-colors text-sm">Nosotros</a></li>
                    <li><a href="#servicios" class="text-secondary hover:text-primary font-medium transition-colors text-sm">Servicios</a></li>
                    <li><a href="#soporte" class="text-secondary hover:text-primary font-medium transition-colors text-sm">Soporte</a></li>
                    <li><a href="#contacto" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-primary-dark transition-all text-sm">Contactar</a></li>
                </ul>
                <button id="menuToggle" class="md:hidden flex flex-col space-y-1.5 p-2">
                    <span class="w-6 h-0.5 bg-secondary"></span>
                    <span class="w-6 h-0.5 bg-secondary"></span>
                    <span class="w-6 h-0.5 bg-secondary"></span>
                </button>
            </div>
            <!-- Mobile Menu -->
            <ul id="mobileMenu" class="hidden md:hidden flex-col space-y-4 pb-6">
                <li><a href="#inicio" class="block text-secondary hover:text-primary font-medium py-2">Inicio</a></li>
                <li><a href="#nosotros" class="block text-secondary hover:text-primary font-medium py-2">Nosotros</a></li>
                <li><a href="#servicios" class="block text-secondary hover:text-primary font-medium py-2">Servicios</a></li>
                <li><a href="#soporte" class="block text-secondary hover:text-primary font-medium py-2">Soporte</a></li>
                <li><a href="#contacto" class="block bg-primary text-white px-6 py-3 rounded-full font-semibold text-center">Contactar</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 gradient-hero"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 right-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <span class="inline-block bg-white/20 backdrop-blur px-4 py-2 rounded-full text-sm font-medium mb-6">Gestión de Experiencias Turísticas</span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                        Tu viaje perfecto,<br>
                        <span class="text-white/90">sin complicaciones</span>
                    </h1>
                    <p class="text-lg md:text-xl mb-8 text-white/80 max-w-xl">
                        Nos encargamos de toda la logística de tus vacaciones. Coordinación de transporte, gestión de reservas y organización completa. Tú solo disfruta.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#contacto" class="bg-white text-primary px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition-all text-center">
                            Planifica tu viaje
                        </a>
                        <a href="#servicios" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-primary transition-all text-center">
                            Ver servicios
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-white/10 rounded-3xl blur-xl"></div>
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800" alt="Destino paradisíaco" class="relative rounded-3xl shadow-2xl w-full h-96 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Banner -->
    <section class="bg-secondary py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-4xl font-bold text-primary mb-2">500+</p>
                    <p class="text-gray-400 text-sm">Viajes gestionados</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary mb-2">98%</p>
                    <p class="text-gray-400 text-sm">Clientes satisfechos</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary mb-2">50+</p>
                    <p class="text-gray-400 text-sm">Destinos coordinados</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-primary mb-2">24h</p>
                    <p class="text-gray-400 text-sm">Respuesta garantizada</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre Nosotros -->
    <section id="nosotros" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-primary/5 rounded-3xl"></div>
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=800" alt="Experiencia de viaje" class="relative rounded-3xl w-full h-[500px] object-cover">
                    <div class="absolute -bottom-6 -right-6 bg-primary text-white p-6 rounded-2xl shadow-xl">
                        <p class="text-3xl font-bold">5+</p>
                        <p class="text-sm">Años de experiencia</p>
                    </div>
                </div>
                <div>
                    <span class="text-primary font-semibold text-sm uppercase tracking-wider">Quiénes somos</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-6">
                        Gestión personalizada para viajeros exigentes
                    </h2>
                    <p class="text-gray-medium mb-6 leading-relaxed">
                        Soy un gestor independiente de experiencias turísticas con una amplia red de contactos en la industria: hoteles, agencias reconocidas, restaurantes y establecimientos en los destinos más atractivos.
                    </p>
                    <p class="text-gray-medium mb-6 leading-relaxed">
                        Mi propuesta es simple: <strong class="text-secondary">me encargo de toda la logística operativa</strong> para que disfrutes tus vacaciones sin estrés. Desde la coordinación del transporte hasta la gestión de entradas a sitios turísticos.
                    </p>
                    <div class="bg-gray-warm p-6 rounded-2xl mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-secondary">Sistema de Reserva Unificado</p>
                                <p class="text-sm text-gray-medium">Un número único que integra toda tu experiencia</p>
                            </div>
                        </div>
                    </div>
                    <a href="#contacto" class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-4 transition-all">
                        Conoce más sobre nuestro proceso
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section id="servicios" class="py-24 bg-gray-warm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Nuestros servicios</span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                    Todo lo que necesitas para viajar
                </h2>
                <p class="text-gray-medium max-w-2xl mx-auto">
                    Servicios de gestión integral para una experiencia de viaje sin complicaciones
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Coordinación de Transporte</h3>
                    <p class="text-gray-medium">Organizamos tu traslado desde tu residencia al aeropuerto y desde el destino hasta tu alojamiento.</p>
                </div>
                <!-- Servicio 2 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Gestión de Reservas</h3>
                    <p class="text-gray-medium">Coordinamos todas las reservaciones: alojamiento, restaurantes y actividades en tu número de reserva único.</p>
                </div>
                <!-- Servicio 3 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Coordinación de Vuelos</h3>
                    <p class="text-gray-medium">Gestionamos la logística completa de tus vuelos, perfectamente coordinados con tu itinerario.</p>
                </div>
                <!-- Servicio 4 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Entradas y Actividades</h3>
                    <p class="text-gray-medium">Organizamos el acceso a sitios turísticos, espectáculos y experiencias locales sin filas.</p>
                </div>
                <!-- Servicio 5 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Itinerario Personalizado</h3>
                    <p class="text-gray-medium">Plan de viaje detallado según tus preferencias, con toda la información en un solo lugar.</p>
                </div>
                <!-- Servicio 6 -->
                <div class="bg-white p-8 rounded-3xl hover:shadow-xl transition-all group">
                    <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Atención Continua</h3>
                    <p class="text-gray-medium">Acompañamiento durante todo el proceso de planificación y ejecución de tu experiencia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cómo Funciona -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Proceso simple</span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                    ¿Cómo funciona?
                </h2>
                <p class="text-gray-medium max-w-2xl mx-auto">
                    Un proceso transparente y sencillo para tu tranquilidad
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">1</div>
                    <h3 class="text-lg font-bold text-secondary mb-3">Cuéntanos tu sueño</h3>
                    <p class="text-gray-medium text-sm">Comparte qué experiencia deseas: destino, fechas y preferencias.</p>
                    <div class="hidden lg:block absolute top-8 left-[60%] w-[80%] h-0.5 bg-gray-200"></div>
                </div>
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">2</div>
                    <h3 class="text-lg font-bold text-secondary mb-3">Diseñamos tu viaje</h3>
                    <p class="text-gray-medium text-sm">Propuesta personalizada con presupuesto detallado y transparente.</p>
                    <div class="hidden lg:block absolute top-8 left-[60%] w-[80%] h-0.5 bg-gray-200"></div>
                </div>
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">3</div>
                    <h3 class="text-lg font-bold text-secondary mb-3">Confirmación</h3>
                    <p class="text-gray-medium text-sm">Procedemos con las gestiones. Recibes tu número de reserva único.</p>
                    <div class="hidden lg:block absolute top-8 left-[60%] w-[80%] h-0.5 bg-gray-200"></div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">4</div>
                    <h3 class="text-lg font-bold text-secondary mb-3">¡A disfrutar!</h3>
                    <p class="text-gray-medium text-sm">Disfruta tu experiencia. Seguimos disponibles para cualquier gestión.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Soporte Post-Venta -->
    <section id="soporte" class="py-24 gradient-hero text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="bg-white/20 backdrop-blur px-4 py-2 rounded-full text-sm font-medium">Lo que nos diferencia</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-6 mb-4">
                    Soporte continuo
                </h2>
                <p class="text-white/80 max-w-2xl mx-auto">
                    No te abandonamos después de la venta. Estamos contigo antes, durante y después de tu viaje.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white/10 backdrop-blur p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Asistencia para Cambios</h3>
                    <p class="text-white/80">Te guiamos paso a paso para modificar horarios de vuelo, cambiar de hotel o ajustar actividades con los proveedores.</p>
                </div>
                <div class="bg-white/10 backdrop-blur p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Gestión de Imprevistos</h3>
                    <p class="text-white/80">Si surge algún inconveniente, te asesoramos sobre los pasos a seguir y te damos la información de contacto necesaria.</p>
                </div>
                <div class="bg-white/10 backdrop-blur p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Coordinación de Modificaciones</h3>
                    <p class="text-white/80">Cuando los cambios afectan múltiples componentes de tu reserva, te ayudamos a coordinar para que todo funcione.</p>
                </div>
                <div class="bg-white/10 backdrop-blur p-8 rounded-3xl border border-white/20 hover:bg-white/20 transition-all">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Canal Directo</h3>
                    <p class="text-white/80">Comunicación directa por WhatsApp o correo electrónico para cualquier consulta sobre tu reserva.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparencia -->
    <section id="transparencia" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Compromiso</span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                    Transparencia y confianza
                </h2>
                <p class="text-gray-medium max-w-2xl mx-auto">
                    Operamos con claridad y honestidad en cada gestión
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-8 border border-gray-200 rounded-3xl hover:border-primary/30 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Sobre Nuestro Servicio</h3>
                    <p class="text-gray-medium mb-4">Somos un servicio de gestión y coordinación turística. No somos aerolínea, hotel ni agencia tradicional.</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Coordinamos todos los componentes de tu experiencia</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Reservas directas con proveedores autorizados</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Cada servicio sujeto a términos del proveedor</li>
                    </ul>
                </div>
                <div class="p-8 border border-gray-200 rounded-3xl hover:border-primary/30 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Presupuestos Claros</h3>
                    <p class="text-gray-medium mb-4">Antes de confirmar, recibes un desglose detallado:</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Costo de cada componente del viaje</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Honorarios de gestión identificados</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Sin cargos ocultos ni sorpresas</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Políticas de cancelación claras</li>
                    </ul>
                </div>
                <div class="p-8 border border-gray-200 rounded-3xl hover:border-primary/30 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Tu Información Segura</h3>
                    <p class="text-gray-medium mb-4">Tratamos tus datos con responsabilidad:</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Información solo para gestionar tu reserva</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Sin compartir con terceros no relacionados</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Comunicaciones solo sobre tu servicio</li>
                    </ul>
                </div>
                <div class="p-8 border border-gray-200 rounded-3xl hover:border-primary/30 hover:shadow-lg transition-all">
                    <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary mb-3">Responsabilidades</h3>
                    <p class="text-gray-medium mb-4">Es importante que sepas:</p>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Actuamos como coordinadores, no proveedores</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Cambios post-venta pueden requerir tu gestión</li>
                        <li class="flex items-start gap-2 text-gray-medium text-sm"><span class="text-primary mt-1">✓</span> Te asesoramos en cualquier proceso</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section class="py-24 bg-gray-warm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Testimonios</span>
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                    Lo que dicen nuestros viajeros
                </h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-lg transition-all">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-medium mb-6">"Excelente servicio. Me ahorraron todo el estrés de planificar las vacaciones familiares. Todo perfectamente coordinado."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold">MC</div>
                        <div>
                            <p class="font-semibold text-secondary">María C.</p>
                            <p class="text-sm text-gray-medium">Viaje familiar a Cancún</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-lg transition-all">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-medium mb-6">"Lo mejor fue el soporte después del viaje. Tuve que cambiar un vuelo y me guiaron en todo el proceso. Muy profesionales."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold">JR</div>
                        <div>
                            <p class="font-semibold text-secondary">José R.</p>
                            <p class="text-sm text-gray-medium">Viaje de negocios</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-lg transition-all">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-medium mb-6">"Primera vez usando este servicio y quedé encantada. El número de reserva único hace todo muy fácil de seguir."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold">AL</div>
                        <div>
                            <p class="font-semibold text-secondary">Ana L.</p>
                            <p class="text-sm text-gray-medium">Luna de miel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <span class="text-primary font-semibold text-sm uppercase tracking-wider">Contacto</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary mt-2 mb-6">
                        Comienza a planificar tu viaje
                    </h2>
                    <p class="text-gray-medium mb-8">
                        Completa el formulario con los detalles de tu viaje ideal y nos pondremos en contacto en menos de 24 horas con una propuesta personalizada.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-medium">Correo electrónico</p>
                                <p class="font-semibold text-secondary">contacto@gestiondeviajes.online</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-medium">WhatsApp</p>
                                <p class="font-semibold text-secondary">+57 317 719 8950</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-medium">Horario de atención</p>
                                <p class="font-semibold text-secondary">Lun-Vie: 9:00-18:00 | Sáb: 9:00-13:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="contactForm" class="bg-gray-warm p-8 rounded-3xl">
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-secondary mb-2">Nombre completo *</label>
                            <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-secondary mb-2">Correo electrónico *</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-secondary mb-2">WhatsApp *</label>
                            <input type="tel" id="telefono" name="telefono" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                        </div>
                        <div>
                            <label for="destino" class="block text-sm font-medium text-secondary mb-2">Destino de interés</label>
                            <input type="text" id="destino" name="destino" placeholder="Ej: Cancún, Europa..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="fechas" class="block text-sm font-medium text-secondary mb-2">Fechas tentativas</label>
                            <input type="text" id="fechas" name="fechas" placeholder="Ej: Diciembre 2025" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                        </div>
                        <div>
                            <label for="viajeros" class="block text-sm font-medium text-secondary mb-2">Viajeros</label>
                            <select id="viajeros" name="viajeros" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all bg-white">
                                <option value="">Seleccionar...</option>
                                <option value="1">1 persona</option>
                                <option value="2">2 personas</option>
                                <option value="3-4">3-4 personas</option>
                                <option value="5+">5 o más</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="mensaje" class="block text-sm font-medium text-secondary mb-2">Cuéntanos sobre tu viaje ideal</label>
                        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Describe qué experiencia buscas..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none transition-all resize-none bg-white"></textarea>
                    </div>
                    <div class="flex items-start gap-3 mb-6">
                        <input type="checkbox" id="consent" name="consent" required class="mt-1 w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                        <label for="consent" class="text-sm text-gray-medium">Acepto la <a href="#" id="openPrivacy" class="text-primary hover:underline font-medium">Política de Privacidad</a> y autorizo el contacto para recibir información. *</label>
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-full font-bold hover:bg-primary-dark transition-all">
                        Enviar solicitud
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="py-16 gradient-hero">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">¿Listo para tu próxima aventura?</h2>
            <p class="text-white/80 mb-8">Déjanos encargarnos de todo. Tú solo preocúpate por disfrutar.</p>
            <a href="#contacto" class="inline-block bg-white text-primary px-10 py-4 rounded-full font-bold hover:bg-gray-100 transition-all">
                Comenzar ahora
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 pb-12 border-b border-white/10">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">TV</span>
                        </div>
                        <span class="text-xl font-bold">TuViajeIdeal</span>
                    </div>
                    <p class="text-gray-400 text-sm">Gestión integral de experiencias turísticas personalizadas.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Enlaces</h4>
                    <ul class="space-y-3">
                        <li><a href="#nosotros" class="text-gray-400 hover:text-white text-sm transition-colors">Sobre Nosotros</a></li>
                        <li><a href="#servicios" class="text-gray-400 hover:text-white text-sm transition-colors">Servicios</a></li>
                        <li><a href="#soporte" class="text-gray-400 hover:text-white text-sm transition-colors">Soporte</a></li>
                        <li><a href="#contacto" class="text-gray-400 hover:text-white text-sm transition-colors">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" id="footerPrivacy" class="text-gray-400 hover:text-white text-sm transition-colors">Política de Privacidad</a></li>
                        <li><a href="#" id="footerTerms" class="text-gray-400 hover:text-white text-sm transition-colors">Términos y Condiciones</a></li>
                        <li><a href="#" id="footerCookies" class="text-gray-400 hover:text-white text-sm transition-colors">Política de Cookies</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Contacto</h4>
                    <p class="text-gray-400 text-sm mb-2">contacto@gestiondeviajes.online</p>
                    <p class="text-gray-400 text-sm">+57 317 719 8950</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center pt-8 gap-4">
                <p class="text-gray-500 text-sm">&copy; 2025 TuViajeIdeal. Todos los derechos reservados.</p>
                <div class="flex gap-6">
                    <a href="#" id="bottomPrivacy" class="text-gray-500 hover:text-white text-sm transition-colors">Privacidad</a>
                    <a href="#" id="bottomTerms" class="text-gray-500 hover:text-white text-sm transition-colors">Términos</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Política de Privacidad -->
    <div id="privacyModal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
        <div class="bg-white max-w-2xl max-h-[80vh] overflow-y-auto p-8 rounded-3xl m-4">
            <span id="closePrivacy" class="float-right text-2xl cursor-pointer text-gray-400 hover:text-secondary">&times;</span>
            <h2 class="text-2xl font-bold text-secondary mb-6">Política de Privacidad</h2>
            <p class="text-gray-medium mb-4"><strong>Última actualización:</strong> Enero 2025</p>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">1. Responsable del Tratamiento</h3>
            <p class="text-gray-medium mb-4">TuViajeIdeal, servicio de gestión turística personalizada, es responsable del tratamiento de los datos personales.</p>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">2. Datos que Recopilamos</h3>
            <ul class="list-disc list-inside text-gray-medium mb-4 space-y-1">
                <li>Nombre y datos de contacto</li>
                <li>Información sobre preferencias de viaje</li>
                <li>Datos necesarios para gestionar reservas</li>
            </ul>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">3. Finalidad</h3>
            <ul class="list-disc list-inside text-gray-medium mb-4 space-y-1">
                <li>Gestionar tu solicitud de servicios</li>
                <li>Coordinar reservas con proveedores</li>
                <li>Proporcionar soporte post-venta</li>
            </ul>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">4. Tus Derechos</h3>
            <p class="text-gray-medium">Puedes ejercer tus derechos contactándonos en contacto@gestiondeviajes.online</p>
        </div>
    </div>

    <!-- Modal Términos -->
    <div id="termsModal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
        <div class="bg-white max-w-2xl max-h-[80vh] overflow-y-auto p-8 rounded-3xl m-4">
            <span id="closeTerms" class="float-right text-2xl cursor-pointer text-gray-400 hover:text-secondary">&times;</span>
            <h2 class="text-2xl font-bold text-secondary mb-6">Términos y Condiciones</h2>
            <p class="text-gray-medium mb-4"><strong>Última actualización:</strong> Enero 2025</p>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">1. Naturaleza del Servicio</h3>
            <p class="text-gray-medium mb-4">TuViajeIdeal es un servicio de gestión y coordinación de experiencias turísticas. Actuamos como intermediarios, no como proveedores directos.</p>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">2. Alcance</h3>
            <ul class="list-disc list-inside text-gray-medium mb-4 space-y-1">
                <li>Coordinación de itinerarios</li>
                <li>Gestión de reservas con proveedores</li>
                <li>Asesoramiento y soporte</li>
            </ul>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">3. Responsabilidades</h3>
            <p class="text-gray-medium mb-4">Los servicios de transporte, alojamiento y actividades son proporcionados por terceros sujetos a sus propios términos.</p>

            <h3 class="text-lg font-semibold text-secondary mt-6 mb-3">4. Soporte Post-Venta</h3>
            <p class="text-gray-medium">Ofrecemos asesoramiento para gestiones posteriores. Ciertas modificaciones pueden requerir tu gestión directa con proveedores.</p>
        </div>
    </div>

    <script>
    // ==========================================
    // TuViajeIdeal - JavaScript Principal
    // ==========================================

    document.addEventListener('DOMContentLoaded', function() {

        // ==========================================
        // Mobile Menu Toggle
        // ==========================================
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
            });

            // Cerrar menú al hacer click en un enlace
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                });
            });
        }

        // ==========================================
        // Smooth Scroll para navegación
        // ==========================================
        const navLinks = document.querySelectorAll('a[href^="#"]');
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const navHeight = document.querySelector('nav').offsetHeight;
                        const targetPosition = target.offsetTop - navHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // ==========================================
        // Modales (Privacidad y Términos)
        // ==========================================
        const privacyModal = document.getElementById('privacyModal');
        const termsModal = document.getElementById('termsModal');

        // Botones para abrir Privacy Modal
        const openPrivacyBtns = [
            document.getElementById('openPrivacy'),
            document.getElementById('footerPrivacy'),
            document.getElementById('bottomPrivacy')
        ];

        // Botones para abrir Terms Modal
        const openTermsBtns = [
            document.getElementById('footerTerms'),
            document.getElementById('bottomTerms')
        ];

        // Botones para cerrar modales
        const closePrivacy = document.getElementById('closePrivacy');
        const closeTerms = document.getElementById('closeTerms');

        // Función para abrir modal
        function openModal(modal) {
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
        }

        // Función para cerrar modal
        function closeModal(modal) {
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }
        }

        // Event listeners para abrir modales
        openPrivacyBtns.forEach(btn => {
            if (btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal(privacyModal);
                });
            }
        });

        openTermsBtns.forEach(btn => {
            if (btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal(termsModal);
                });
            }
        });

        // Event listeners para cerrar modales
        if (closePrivacy) {
            closePrivacy.addEventListener('click', function() {
                closeModal(privacyModal);
            });
        }

        if (closeTerms) {
            closeTerms.addEventListener('click', function() {
                closeModal(termsModal);
            });
        }

        // Cerrar modal al hacer click fuera del contenido
        [privacyModal, termsModal].forEach(modal => {
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal(modal);
                    }
                });
            }
        });

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal(privacyModal);
                closeModal(termsModal);
            }
        });

        // ==========================================
        // Formulario de Contacto
        // ==========================================
        const contactForm = document.getElementById('contactForm');

        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Obtener valores del formulario
                const formData = {
                    nombre: document.getElementById('nombre').value,
                    email: document.getElementById('email').value,
                    telefono: document.getElementById('telefono').value,
                    destino: document.getElementById('destino').value,
                    fechas: document.getElementById('fechas').value,
                    viajeros: document.getElementById('viajeros').value,
                    mensaje: document.getElementById('mensaje').value,
                    consent: document.getElementById('consent').checked
                };

                // Validación básica
                if (!formData.nombre || !formData.email || !formData.telefono) {
                    showNotification('Por favor, completa todos los campos obligatorios.', 'error');
                    return;
                }

                if (!formData.consent) {
                    showNotification('Debes aceptar la Política de Privacidad para continuar.', 'error');
                    return;
                }

                // Validación de email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(formData.email)) {
                    showNotification('Por favor, ingresa un correo electrónico válido.', 'error');
                    return;
                }

                // Simular envío (aquí integrarías con tu backend o servicio de email)
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Enviando...';
                submitBtn.disabled = true;

                // Simulación de envío (2 segundos)
                setTimeout(function() {
                    // Mostrar mensaje de éxito
                    showNotification('¡Gracias por tu interés! Nos pondremos en contacto contigo en menos de 24 horas.', 'success');

                    // Resetear formulario
                    contactForm.reset();

                    // Restaurar botón
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    // Opcional: Enviar datos a un servicio externo
                    // sendToEmailService(formData);

                }, 2000);
            });
        }

        // ==========================================
        // Sistema de Notificaciones
        // ==========================================
        function showNotification(message, type = 'info') {
            // Remover notificación existente si hay
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

            // Crear notificación
            const notification = document.createElement('div');
            notification.className = 'notification fixed top-24 right-4 z-50 max-w-md p-4 rounded-xl shadow-lg transform translate-x-full transition-transform duration-300';

            // Estilos según tipo
            if (type === 'success') {
                notification.classList.add('bg-green-500', 'text-white');
            } else if (type === 'error') {
                notification.classList.add('bg-red-500', 'text-white');
            } else {
                notification.classList.add('bg-blue-500', 'text-white');
            }

            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <span class="text-xl">${type === 'success' ? '✓' : type === 'error' ? '✕' : 'ℹ'}</span>
                    <p>${message}</p>
                    <button class="ml-auto text-white/80 hover:text-white" onclick="this.parentElement.parentElement.remove()">×</button>
                </div>
            `;

            document.body.appendChild(notification);

            // Animar entrada
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Auto-remover después de 5 segundos
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 5000);
        }

        // ==========================================
        // Animaciones al hacer scroll
        // ==========================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeIn');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observar elementos para animación
        const animatedElements = document.querySelectorAll('.service-card, .step, .support-item, .testimonial, .transparency-card');
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Agregar clase de animación
        const style = document.createElement('style');
        style.textContent = `
            .animate-fadeIn {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);

        // ==========================================
        // Navbar transparente al top
        // ==========================================
        const navbar = document.querySelector('nav');

        function updateNavbar() {
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-lg');
                navbar.classList.remove('shadow-md');
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.classList.add('shadow-md');
            }
        }

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();

        // ==========================================
        // Política de Cookies (Banner simple)
        // ==========================================
        const footerCookies = document.getElementById('footerCookies');

        if (footerCookies) {
            footerCookies.addEventListener('click', function(e) {
                e.preventDefault();
                showNotification('Utilizamos cookies esenciales para el funcionamiento del sitio. Al continuar navegando, aceptas su uso.', 'info');
            });
        }

        // Mostrar banner de cookies si no se ha aceptado
        if (!localStorage.getItem('cookiesAccepted')) {
            const cookieBanner = document.createElement('div');
            cookieBanner.className = 'fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 z-50';
            cookieBanner.innerHTML = `
                <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-300">
                        Utilizamos cookies esenciales para mejorar tu experiencia en nuestro sitio.
                        Al continuar navegando, aceptas nuestra <a href="#" class="text-primary hover:underline" id="cookiePolicyLink">Política de Cookies</a>.
                    </p>
                    <button id="acceptCookies" class="bg-primary text-white px-6 py-2 rounded-full text-sm font-semibold hover:bg-primary-dark transition-colors whitespace-nowrap">
                        Aceptar
                    </button>
                </div>
            `;
            document.body.appendChild(cookieBanner);

            document.getElementById('acceptCookies').addEventListener('click', function() {
                localStorage.setItem('cookiesAccepted', 'true');
                cookieBanner.remove();
            });
        }

    });
    </script>
</body>
</html>
