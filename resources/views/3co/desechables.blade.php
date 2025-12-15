<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desechables la Avenida - Bello, Antioquia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        .gradient-bg { background: linear-gradient(135deg, #991B1B 0%, #DC2626 50%, #EA580C 100%); }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 2px; background: #DC2626; transition: width 0.3s; }
        .nav-link:hover::after { width: 100%; }
        .product-img { height: 180px; object-fit: cover; width: 100%; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navegación -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 bg-white shadow-md z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="/3co/assets/logo-avenida.jpg" alt="ARQUI Distribuciones" class="h-12 w-auto mr-2">
                    <div class="hidden sm:block">
                        <span class="text-xl font-bold text-red-700">Desechables</span>
                        <span class="text-xl font-light text-orange-600 ml-1">la Avenida</span>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#inicio" class="nav-link text-gray-700 hover:text-red-600 transition">Inicio</a>
                    <a href="#productos" class="nav-link text-gray-700 hover:text-red-600 transition">Productos</a>
                    <a href="#nosotros" class="nav-link text-gray-700 hover:text-red-600 transition">Nosotros</a>
                    <a href="#pago" class="nav-link text-gray-700 hover:text-red-600 transition">Pago</a>
                    <a href="#contacto" class="nav-link text-gray-700 hover:text-red-600 transition">Contacto</a>
                </div>
                <button id="menu-btn" class="md:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Menú móvil -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-3">
                <a href="#inicio" class="block text-gray-700 hover:text-red-600">Inicio</a>
                <a href="#productos" class="block text-gray-700 hover:text-red-600">Productos</a>
                <a href="#nosotros" class="block text-gray-700 hover:text-red-600">Nosotros</a>
                <a href="#pago" class="block text-gray-700 hover:text-red-600">Pago</a>
                <a href="#contacto" class="block text-gray-700 hover:text-red-600">Contacto</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="gradient-bg min-h-screen flex items-center justify-center pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in">
                Desechables la Avenida
            </h1>
            <p class="text-xl md:text-2xl text-red-100 mb-8 max-w-3xl mx-auto">
                Tu proveedor de confianza en productos desechables para eventos, restaurantes y hogares en Bello, Antioquia
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#productos" class="bg-white text-red-700 px-8 py-4 rounded-full font-semibold hover:bg-red-50 transition transform hover:scale-105 shadow-lg">
                    Ver Productos
                </a>
                <a href="#contacto" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-red-700 transition transform hover:scale-105">
                    Contáctanos
                </a>
            </div>
            <div class="mt-12">
                <svg class="w-8 h-8 text-white mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Nosotros -->
    <section id="nosotros" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        En <strong class="text-red-700">Desechables la Avenida</strong> somos distribuidores mayoristas y minoristas de productos desechables de la más alta calidad. Ubicados en el corazón de Bello, Antioquia, llevamos años siendo el aliado de restaurantes, eventos y hogares.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Ofrecemos precios competitivos, excelente atención y una amplia variedad de productos para satisfacer todas tus necesidades.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <span class="text-3xl font-bold text-red-700">500+</span>
                            <p class="text-gray-600">Productos</p>
                        </div>
                        <div class="text-center p-4 bg-orange-50 rounded-lg">
                            <span class="text-3xl font-bold text-orange-600">1000+</span>
                            <p class="text-gray-600">Clientes felices</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-red-100 to-orange-100 rounded-2xl p-8 text-center">
                    <svg class="w-32 h-32 mx-auto text-red-700 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Calidad Garantizada</h3>
                    <p class="text-gray-600">Productos de las mejores marcas a precios justos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos -->
    <section id="productos" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Productos</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Amplia variedad de productos desechables para todas tus necesidades</p>
            </div>

            <!-- Categorías de productos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Vasos -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1648187618027-3b98343e28c3?w=400&h=200&fit=crop" alt="Vasos desechables" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Vasos</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Vasos plásticos 7oz, 9oz, 12oz, 16oz</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Vasos de cartón para bebidas calientes</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Vasos transparentes PET</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Vasos para cerveza y granizados</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Tapas para vasos (domo y planas)</li>
                        </ul>
                    </div>
                </div>

                <!-- Platos -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1606226459865-be58c137453e?w=400&h=200&fit=crop" alt="Platos desechables" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-900/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Platos y Bandejas</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Platos icopor diversos tamaños</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Platos plásticos blancos y de colores</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Platos de cartón</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Bandejas de icopor</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Charolas para comidas</li>
                        </ul>
                    </div>
                </div>

                <!-- Cubiertos -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1557687790-902ede7ab58c?w=400&h=200&fit=crop" alt="Cubiertos desechables" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-800/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Cubiertos</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Cucharas plásticas grandes y pequeñas</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Tenedores plásticos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Cuchillos plásticos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Cucharitas para postre y café</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Kits de cubiertos empacados</li>
                        </ul>
                    </div>
                </div>

                <!-- Contenedores -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1609915437016-85693e56470f?w=400&h=200&fit=crop" alt="Contenedores para alimentos" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-800/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Contenedores y Envases</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Contenedores de icopor con tapa</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Envases plásticos para domicilios</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Portacomidas de 1, 2 y 3 divisiones</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Contenedores para salsas</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Envases herméticos</li>
                        </ul>
                    </div>
                </div>

                <!-- Bolsas -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1616429368325-d5d7542b0ec3?w=400&h=200&fit=crop" alt="Bolsas de papel" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Bolsas</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Bolsas plásticas de todos los tamaños</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Bolsas de basura</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Bolsas de papel kraft</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Bolsas para domicilios</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Bolsas resellables</li>
                        </ul>
                    </div>
                </div>

                <!-- Servilletas y Papel -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1633504498282-65189dc99557?w=400&h=200&fit=crop" alt="Servilletas" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-900/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Servilletas y Papel</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Servilletas cuadradas y de coctel</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Papel aluminio</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Papel vinipel</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Papel parafinado</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Toallas de cocina</li>
                        </ul>
                    </div>
                </div>

                <!-- Pitillos y Mezcladores -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586558284531-7c43b7da946d?w=400&h=200&fit=crop" alt="Pitillos y mezcladores" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-800/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Pitillos y Mezcladores</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Pitillos rectos y flexibles</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Pitillos gruesos para malteadas</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Pitillos de papel ecológicos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Mezcladores para café</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-700 rounded-full mr-3"></span>Palillos de madera</li>
                        </ul>
                    </div>
                </div>

                <!-- Aseo -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1584813470613-5b1c1cad3d69?w=400&h=200&fit=crop" alt="Productos de aseo" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-800/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Productos de Aseo</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Guantes desechables</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Gorros y tapabocas</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Esponjas y estropajos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Paños multiusos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-600 rounded-full mr-3"></span>Jabón líquido y gel antibacterial</li>
                        </ul>
                    </div>
                </div>

                <!-- Línea de Fiesta -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover transition-all duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1531956531700-dc0ee0f1f9a5?w=400&h=200&fit=crop" alt="Artículos de fiesta" class="product-img">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/80 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Línea de Fiesta</h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Vasos y platos de colores</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Manteles plásticos</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Servilletas decoradas</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Globos y decoración</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-red-600 rounded-full mr-3"></span>Velas para torta</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Método de Pago -->
    <section id="pago" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Método de Pago</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Aceptamos pagos de forma segura y rápida</p>
            </div>

            <div class="max-w-2xl mx-auto">
                <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-3xl p-8 shadow-2xl text-center">
                    <div class="bg-white rounded-2xl p-8 mb-6">
                        <div class="text-4xl font-bold text-yellow-500 mb-4">Bancolombia</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Transferencia Bancolombia</h3>
                        <div class="space-y-3 text-left bg-gray-50 rounded-xl p-6">
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-600">Tipo de cuenta:</span>
                                <span class="font-semibold text-gray-800">Ahorros</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                                <span class="text-gray-600">Titular:</span>
                                <span class="font-semibold text-gray-800">Desechables la Avenida</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Nequi / Bancolombia:</span>
                                <span class="font-semibold text-gray-800">Consultar al vendedor</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-white">
                        <p class="text-lg font-medium mb-2">Envía tu comprobante de pago por WhatsApp</p>
                        <p class="text-yellow-100">para confirmar tu pedido</p>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <div class="inline-flex items-center bg-green-50 text-green-700 px-6 py-3 rounded-full">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Pagos 100% seguros
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Contáctanos</h2>
                <div class="w-24 h-1 bg-red-500 mx-auto mb-4"></div>
                <p class="text-gray-400 max-w-2xl mx-auto">Estamos aquí para atenderte</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Info de contacto -->
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="bg-red-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">Dirección</h4>
                            <p class="text-gray-400">CALLE 52 # 50 A - 15<br>Parque de Bello<br>Bello, Antioquia</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-red-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">Horario de Atención</h4>
                            <p class="text-gray-400">Lunes a Viernes: 8:00 AM - 6:00 PM<br>Sábados: 8:00 AM - 4:00 PM<br>Domingos: Cerrado</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-red-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">WhatsApp</h4>
                            <p class="text-gray-400">Escríbenos para hacer tu pedido</p>
                        </div>
                    </div>

                    <!-- Botón de Facebook -->
                    <a href="https://www.facebook.com/arquidistribucionessas/" target="_blank" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition transform hover:scale-105">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Síguenos en Facebook
                    </a>
                </div>

                <!-- Mapa -->
                <div class="bg-gray-800 rounded-2xl overflow-hidden h-96">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9559048!2d-75.5595!3d6.3378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428dfb80fad05%3A0x42137cfcc7b53b56!2sParque%20de%20Bello!5e0!3m2!1ses!2sco!4v1702000000000!5m2!1ses!2sco"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center text-center md:text-left mb-4 md:mb-0">
                    <img src="/3co/assets/logo-avenida.jpg" alt="ARQUI Distribuciones" class="h-14 w-auto mr-3 rounded-lg">
                    <div>
                        <span class="text-xl font-bold text-red-500">Desechables</span>
                        <span class="text-xl font-light text-orange-400 ml-1">la Avenida</span>
                        <p class="text-gray-500 text-sm mt-1">Bello, Antioquia - Colombia</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/arquidistribucionessas/" target="_blank" class="bg-gray-800 p-3 rounded-full hover:bg-red-600 transition">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-6 pt-6 text-center">
                <p class="text-gray-500 text-sm">&copy; 2024 Desechables la Avenida. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/57" target="_blank" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 z-50">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script>
        // Toggle menú móvil
        document.getElementById('menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Cerrar menú móvil al hacer clic en un enlace
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Efecto de navbar al hacer scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Animación suave para los enlaces de navegación
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
