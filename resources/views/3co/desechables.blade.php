<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disproductos Salem - Sirops para Coctelería | Montería</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        .gradient-bg { background: linear-gradient(135deg, #7C3AED 0%, #EC4899 50%, #F97316 100%); }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 2px; background: #EC4899; transition: width 0.3s; }
        .nav-link:hover::after { width: 100%; }
        .product-card { transition: all 0.3s ease; }
        .product-card:hover { transform: scale(1.02); }
        .premium-badge { background: linear-gradient(135deg, #F59E0B 0%, #EF4444 100%); }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navegación -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 bg-white shadow-md z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-lg">DS</span>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-purple-700">Disproductos</span>
                        <span class="text-xl font-light text-pink-500 ml-1">Salem</span>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#inicio" class="nav-link text-gray-700 hover:text-pink-600 transition">Inicio</a>
                    <a href="#productos" class="nav-link text-gray-700 hover:text-pink-600 transition">Productos</a>
                    <a href="#nosotros" class="nav-link text-gray-700 hover:text-pink-600 transition">Nosotros</a>
                    <a href="#contacto" class="nav-link text-gray-700 hover:text-pink-600 transition">Contacto</a>
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
                <a href="#inicio" class="block text-gray-700 hover:text-pink-600">Inicio</a>
                <a href="#productos" class="block text-gray-700 hover:text-pink-600">Productos</a>
                <a href="#nosotros" class="block text-gray-700 hover:text-pink-600">Nosotros</a>
                <a href="#contacto" class="block text-gray-700 hover:text-pink-600">Contacto</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="gradient-bg min-h-screen flex items-center justify-center pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8">
                <span class="bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium">Montería, Córdoba</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                Disproductos Salem
            </h1>
            <p class="text-xl md:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto">
                Sirops y jarabes premium para coctelería y bebidas. Dale sabor a tus creaciones con nuestra amplia variedad de sabores.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#productos" class="bg-white text-purple-700 px-8 py-4 rounded-full font-semibold hover:bg-purple-50 transition transform hover:scale-105 shadow-lg">
                    Ver Catálogo
                </a>
                <a href="https://wa.me/573126115197" target="_blank" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition transform hover:scale-105">
                    Hacer Pedido
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
                <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-500 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        En <strong class="text-purple-700">Disproductos Salem</strong> somos distribuidores especializados en sirops y jarabes para coctelería, ubicados en Montería, Córdoba. Ofrecemos productos de la marca <strong>Drink Mix</strong> con la mejor calidad para bares, restaurantes y amantes de la mixología.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Nuestra amplia variedad de sabores te permite crear cócteles únicos, smoothies deliciosos y bebidas innovadoras que sorprenderán a tus clientes.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="text-center p-4 bg-purple-50 rounded-lg">
                            <span class="text-3xl font-bold text-purple-700">27+</span>
                            <p class="text-gray-600">Sabores</p>
                        </div>
                        <div class="text-center p-4 bg-pink-50 rounded-lg">
                            <span class="text-3xl font-bold text-pink-600">100%</span>
                            <p class="text-gray-600">Calidad</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl p-8 text-center">
                    <svg class="w-32 h-32 mx-auto text-purple-600 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.5 7a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM5 9.5a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0zM16.5 7a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM14 9.5a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0zM12 2a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1zM8 21h8l1-6H7l1 6z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Drink Mix</h3>
                    <p class="text-gray-600">Sirops de alta calidad para profesionales y aficionados</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos -->
    <section id="productos" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Sirops</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-pink-500 mx-auto mb-4"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Amplia variedad de sabores para crear bebidas únicas</p>
            </div>

            <!-- Línea Premium -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="premium-badge text-white px-3 py-1 rounded-full text-sm mr-3">PREMIUM</span>
                    Línea Premium - $25,000 COP
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200">
                        <div class="w-full h-24 bg-gradient-to-br from-pink-400 to-red-400 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-3xl">🌹</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop de Rosas</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200">
                        <div class="w-full h-24 bg-gradient-to-br from-pink-200 to-pink-400 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-3xl">🍑</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop de Lychee</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200">
                        <div class="w-full h-24 bg-gradient-to-br from-red-400 to-purple-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-3xl">🫐</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop Frutos Rojos</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200">
                        <div class="w-full h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-3xl">🥭</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop Passion Fruit</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                    </div>
                </div>
            </div>

            <!-- Línea Clásica -->
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm mr-3">CLÁSICA</span>
                    Línea Clásica - $23,000 COP
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <!-- Fila 1 -->
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍒</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Granadina</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🥝</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Kiwi</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-green-300 to-teal-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🌿</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Menta</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-yellow-400 to-green-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍋</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Lulo</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-green-300 to-green-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍈</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Melón</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🫐</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mora Azul</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <!-- Fila 2 -->
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-pink-400 to-pink-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍬</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Chicle</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-gray-100 to-gray-300 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🥥</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Coco</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🔵</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Curazao</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-red-400 to-red-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍓</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Fresa</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍊</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mandarina</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍇</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Uva</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <!-- Fila 3 -->
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍒</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Cereza</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-orange-300 to-orange-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍊</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Triple Sec</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-red-400 to-green-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍉</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Sandía</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🌱</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Yerbabuena</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🥭</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Maracuyá</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍏</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Manzana Verde</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <!-- Fila 4 -->
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-yellow-300 to-green-400 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🥭</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mango Biche</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-orange-300 to-orange-500 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍑</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Durazno</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🍍</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Piña</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md">
                        <div class="w-full h-20 bg-gradient-to-br from-amber-600 to-amber-800 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">🌰</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Tamarindo</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-purple-200">
                        <div class="w-full h-20 bg-gradient-to-br from-amber-400 to-amber-600 rounded-lg mb-3 flex items-center justify-center">
                            <span class="text-2xl">✨</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-xs">Escarchar</h4>
                        <p class="text-purple-600 font-bold text-sm">$23,000</p>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="https://wa.me/573126115197?text=Hola,%20me%20interesa%20hacer%20un%20pedido%20de%20sirops" target="_blank" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-500 text-white px-8 py-4 rounded-full font-semibold hover:opacity-90 transition transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Hacer Pedido por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Contáctanos</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto mb-4"></div>
                <p class="text-gray-400 max-w-2xl mx-auto">Estamos para atenderte</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Info de contacto -->
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">Ubicación</h4>
                            <p class="text-gray-400">Montería, Córdoba<br>Colombia</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">WhatsApp</h4>
                            <p class="text-gray-400">+57 312 611 5197</p>
                            <a href="https://wa.me/573126115197" target="_blank" class="text-pink-400 hover:text-pink-300 text-sm">Enviar mensaje</a>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-1">Instagram</h4>
                            <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="text-pink-400 hover:text-pink-300">@disproductos_salem</a>
                        </div>
                    </div>

                    <!-- Botón de catálogo -->
                    <a href="https://wa.me/c/573126115197" target="_blank" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition transform hover:scale-105">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Ver Catálogo Completo
                    </a>
                </div>

                <!-- Imagen decorativa -->
                <div class="bg-gradient-to-br from-purple-800 to-pink-800 rounded-2xl p-8 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-8xl mb-4">🍹</div>
                        <h3 class="text-2xl font-bold mb-2">¡Haz tu pedido hoy!</h3>
                        <p class="text-purple-200">Envíos a todo Montería y alrededores</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center text-center md:text-left mb-4 md:mb-0">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-600 to-pink-500 flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-lg">DS</span>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-purple-400">Disproductos</span>
                        <span class="text-xl font-light text-pink-400 ml-1">Salem</span>
                        <p class="text-gray-500 text-sm mt-1">Montería, Córdoba - Colombia</p>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="bg-gray-800 p-3 rounded-full hover:bg-pink-600 transition">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/573126115197" target="_blank" class="bg-gray-800 p-3 rounded-full hover:bg-green-600 transition">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-6 pt-6 text-center">
                <p class="text-gray-500 text-sm">&copy; 2024 Disproductos Salem. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/573126115197" target="_blank" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 z-50">
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
