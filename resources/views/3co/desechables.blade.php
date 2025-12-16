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
        .product-card.selected { border-color: #7C3AED !important; box-shadow: 0 0 0 2px #7C3AED; }
        .premium-badge { background: linear-gradient(135deg, #F59E0B 0%, #EF4444 100%); }
        .cart-badge { animation: pulse 2s infinite; }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
        .cart-sidebar { transform: translateX(100%); transition: transform 0.3s ease; }
        .cart-sidebar.open { transform: translateX(0); }
        .qty-btn { transition: all 0.2s; }
        .qty-btn:hover { background-color: #7C3AED; color: white; }
        .qty-btn:active { transform: scale(0.95); }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navegación -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 bg-white shadow-md z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="/3co/assets/salem-logo.jpg" alt="Disproductos Salem" class="h-12 w-auto rounded-lg mr-3">
                    <div>
                        <span class="text-xl font-bold text-purple-700">Disproductos</span>
                        <span class="text-xl font-light text-pink-500 ml-1">Salem</span>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#inicio" class="nav-link text-gray-700 hover:text-pink-600 transition">Inicio</a>
                    <a href="#productos" class="nav-link text-gray-700 hover:text-pink-600 transition">Productos</a>
                    <a href="#instagram" class="nav-link text-gray-700 hover:text-pink-600 transition">Instagram</a>
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
                <a href="#instagram" class="block text-gray-700 hover:text-pink-600">Instagram</a>
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
                <a href="https://wa.me/573026622223" target="_blank" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-purple-700 transition transform hover:scale-105">
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
                        <strong class="text-purple-700">Disproductos Salem</strong> es una tienda especializada en la venta de productos y accesorios para la preparación de bebidas como Jugos, Limonadas, Mix de Frutas, Sodas Micheladas, Malteadas, Granizados y muchos productos más.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Ubicados en <strong>Cl. 54 #11a-80, Montería, Córdoba</strong>. Ofrecemos productos de la marca <strong>Drink Mix</strong> con la mejor calidad para bares, restaurantes y amantes de la mixología.
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
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200" data-product="rosas" data-name="Sirop de Rosas" data-price="25000">
                        <div class="w-full h-24 rounded-lg mb-3 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1598759310798-18f8497d9858?w=400&h=300&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop de Rosas</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                        <div class="flex items-center justify-between mt-2">
                            <button onclick="updateQty('rosas', -1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">-</button>
                            <span id="qty-rosas" class="font-semibold text-gray-800">0</span>
                            <button onclick="updateQty('rosas', 1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200" data-product="lychee" data-name="Sirop de Lychee" data-price="25000">
                        <div class="w-full h-24 rounded-lg mb-3 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1642063412059-faa1c79531ce?w=400&h=300&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop de Lychee</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                        <div class="flex items-center justify-between mt-2">
                            <button onclick="updateQty('lychee', -1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">-</button>
                            <span id="qty-lychee" class="font-semibold text-gray-800">0</span>
                            <button onclick="updateQty('lychee', 1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200" data-product="frutos-rojos" data-name="Sirop Frutos Rojos" data-price="25000">
                        <div class="w-full h-24 rounded-lg mb-3 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1543528176-61b239494933?w=400&h=300&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop Frutos Rojos</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                        <div class="flex items-center justify-between mt-2">
                            <button onclick="updateQty('frutos-rojos', -1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">-</button>
                            <span id="qty-frutos-rojos" class="font-semibold text-gray-800">0</span>
                            <button onclick="updateQty('frutos-rojos', 1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-4 shadow-md border-2 border-amber-200" data-product="passion-fruit" data-name="Sirop Passion Fruit" data-price="25000">
                        <div class="w-full h-24 rounded-lg mb-3 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1550258987-190a2d41a8ba?w=400&h=300&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-sm">Sirop Passion Fruit</h4>
                        <p class="text-amber-600 font-bold">$25,000</p>
                        <div class="flex items-center justify-between mt-2">
                            <button onclick="updateQty('passion-fruit', -1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">-</button>
                            <span id="qty-passion-fruit" class="font-semibold text-gray-800">0</span>
                            <button onclick="updateQty('passion-fruit', 1)" class="qty-btn w-8 h-8 rounded-full border-2 border-purple-600 text-purple-600 font-bold flex items-center justify-center">+</button>
                        </div>
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
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="granadina" data-name="Granadina" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1574709755254-fcd942d09d5a?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Granadina</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('granadina', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-granadina" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('granadina', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="kiwi" data-name="Kiwi" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1521997888043-aa9c827744f8?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Kiwi</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('kiwi', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-kiwi" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('kiwi', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="menta" data-name="Menta" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509822929063-6b6cfc9b42f2?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Menta</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('menta', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-menta" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('menta', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="lulo" data-name="Lulo" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1547514701-42782101795e?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Lulo</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('lulo', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-lulo" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('lulo', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="melon" data-name="Melón" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1571575173700-afb9492e6a50?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Melón</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('melon', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-melon" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('melon', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="mora-azul" data-name="Mora Azul" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1498557850523-fd3d118b962e?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mora Azul</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('mora-azul', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-mora-azul" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('mora-azul', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="chicle" data-name="Chicle" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Chicle</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('chicle', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-chicle" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('chicle', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="coco" data-name="Coco" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1550583724-b2692b85b150?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Coco</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('coco', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-coco" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('coco', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="curazao" data-name="Curazao" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1551538827-9c037cb4f32a?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Curazao</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('curazao', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-curazao" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('curazao', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="fresa" data-name="Fresa" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1566804770468-867f6158bda5?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Fresa</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('fresa', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-fresa" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('fresa', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="mandarina" data-name="Mandarina" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509391618207-32f1fa13c1d2?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mandarina</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('mandarina', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-mandarina" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('mandarina', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="uva" data-name="Uva" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1537640538966-79f369143f8f?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Uva</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('uva', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-uva" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('uva', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="cereza" data-name="Cereza" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1520236060906-9c5ed525b025?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Cereza</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('cereza', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-cereza" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('cereza', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="triple-sec" data-name="Triple Sec" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1546548970-71785318a17b?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Triple Sec</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('triple-sec', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-triple-sec" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('triple-sec', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="sandia" data-name="Sandía" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1622208489373-1fe93e2c6720?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Sandía</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('sandia', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-sandia" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('sandia', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="yerbabuena" data-name="Yerbabuena" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1471943311424-646960669fbc?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Yerbabuena</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('yerbabuena', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-yerbabuena" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('yerbabuena', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="maracuya" data-name="Maracuyá" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1567620832903-9fc6debc209f?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Maracuyá</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('maracuya', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-maracuya" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('maracuya', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="manzana-verde" data-name="Manzana Verde" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1590005354167-6da97870c757?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Manzana Verde</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('manzana-verde', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-manzana-verde" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('manzana-verde', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="mango-biche" data-name="Mango Biche" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1553279768-865429fa0078?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Mango Biche</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('mango-biche', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-mango-biche" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('mango-biche', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="durazno" data-name="Durazno" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1517355352485-3c18847c2f7d?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Durazno</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('durazno', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-durazno" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('durazno', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="pina" data-name="Piña" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1587883012610-e3df17d41270?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Piña</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('pina', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-pina" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('pina', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border border-gray-200" data-product="tamarindo" data-name="Tamarindo" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1584949091598-c31daaaa4aa9?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Tamarindo</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('tamarindo', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-tamarindo" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('tamarindo', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                    <div class="product-card bg-white rounded-xl p-3 shadow-md border-2 border-purple-200" data-product="escarchar" data-name="Escarchar" data-price="23000">
                        <div class="w-full h-16 rounded-lg mb-2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=300&h=200&fit=crop');"></div>
                        <h4 class="font-semibold text-gray-800 text-xs">Escarchar</h4>
                        <p class="text-purple-600 font-bold text-xs">$23,000</p>
                        <div class="flex items-center justify-between mt-1">
                            <button onclick="updateQty('escarchar', -1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">-</button>
                            <span id="qty-escarchar" class="font-semibold text-gray-800 text-xs">0</span>
                            <button onclick="updateQty('escarchar', 1)" class="qty-btn w-6 h-6 rounded-full border border-purple-600 text-purple-600 text-xs font-bold">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-12 text-center">
                <a href="https://wa.me/573026622223?text=Hola,%20me%20interesa%20hacer%20un%20pedido%20de%20sirops" target="_blank" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-500 text-white px-8 py-4 rounded-full font-semibold hover:opacity-90 transition transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Hacer Pedido por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Instagram Feed Embebido -->
    <section id="instagram" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado estilo Instagram -->
            <div class="bg-white border border-gray-200 rounded-t-xl overflow-hidden">
                <!-- Header del widget -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600">
                                <img src="/3co/assets/disproductos_salem/2025-02-13_20-12-41_UTC_profile_pic.jpg" alt="@disproductos_salem" class="w-full h-full rounded-full object-cover border-2 border-white">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-1">
                                <h3 class="font-semibold text-gray-900">disproductos_salem</h3>
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500">Sirops Drink Mix - Montería</p>
                        </div>
                    </div>
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 text-white px-6 py-2 rounded-lg font-medium text-sm hover:opacity-90 transition">
                        Seguir
                    </a>
                </div>

                <!-- Grid de imágenes estilo Instagram -->
                <div class="grid grid-cols-3 gap-0.5 bg-gray-100">
                    <!-- Imagen 1 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-15_17-14-35_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 2 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-13_13-12-39_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 3 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-13_13-10-19_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 4 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-12_13-39-05_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 5 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-12_13-33-56_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 6 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-06_18-14-12_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 7 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-05_16-52-15_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 8 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-05_16-45-23_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 9 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-04_13-30-05_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 10 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-04_13-26-42_UTC_1.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 11 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-12-04_13-26-42_UTC_2.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                    <!-- Imagen 12 -->
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="relative aspect-square group overflow-hidden">
                        <img src="/3co/assets/disproductos_salem/2025-11-29_13-57-00_UTC.jpg" alt="Instagram post" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-4">
                            <span class="text-white flex items-center"><svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>♥</span>
                        </div>
                    </a>
                </div>

                <!-- Footer del widget -->
                <div class="p-4 border-t border-gray-200 bg-gray-50">
                    <a href="https://www.instagram.com/disproductos_salem/" target="_blank" class="flex items-center justify-center space-x-2 text-gray-700 hover:text-pink-600 transition font-medium">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span>Ver más en Instagram</span>
                    </a>
                </div>
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
                            <p class="text-gray-400">Cl. 54 #11a-80<br>Montería, Córdoba, Colombia</p>
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
                            <p class="text-gray-400">+57 302 662 2223</p>
                            <a href="https://wa.me/573026622223" target="_blank" class="text-pink-400 hover:text-pink-300 text-sm">Enviar mensaje</a>
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
                    <a href="https://wa.me/c/573026622223" target="_blank" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition transform hover:scale-105">
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
                    <img src="/3co/assets/salem-logo.jpg" alt="Disproductos Salem" class="h-14 w-auto rounded-lg mr-3">
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
                    <a href="https://wa.me/573026622223" target="_blank" class="bg-gray-800 p-3 rounded-full hover:bg-green-600 transition">
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

    <!-- Carrito Flotante -->
    <div id="cart-button" onclick="toggleCart()" class="fixed bottom-24 right-6 bg-purple-600 hover:bg-purple-700 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 z-50 cursor-pointer hidden">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span id="cart-count" class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center cart-badge">0</span>
    </div>

    <!-- Panel del Carrito -->
    <div id="cart-sidebar" class="cart-sidebar fixed top-0 right-0 h-full w-full md:w-96 bg-white shadow-2xl z-[60] overflow-y-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Tu Pedido</h3>
                <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Lista de productos en el carrito -->
            <div id="cart-items" class="space-y-4 mb-6">
                <p class="text-gray-500 text-center py-8">Tu carrito está vacío</p>
            </div>

            <!-- Cupón de descuento -->
            <div class="border-t border-gray-200 pt-4 mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">¿Tienes un cupón?</label>
                <div class="flex flex-col space-y-2">
                    <input type="text" id="coupon-input" placeholder="Ingresa tu cupón" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent uppercase">
                    <button onclick="aplicarCupon()" class="w-full bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">Aplicar cupón</button>
                </div>
                <div id="coupon-message" class="mt-2 text-sm hidden"></div>
            </div>

            <!-- Resumen -->
            <div class="border-t border-gray-200 pt-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">Subtotal:</span>
                    <span id="cart-subtotal" class="font-semibold text-gray-800">$0</span>
                </div>
                <div id="discount-row" class="flex justify-between items-center mb-2 hidden">
                    <span class="text-green-600">Descuento (NUEVOCLIENTE2025):</span>
                    <span id="cart-discount" class="font-semibold text-green-600">-$0</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-gray-600">IVA (19%):</span>
                    <span id="cart-iva" class="font-semibold text-gray-800">$0</span>
                </div>
                <div class="flex justify-between items-center mb-4 pt-2 border-t border-gray-200">
                    <span class="text-lg font-bold text-gray-800">Total:</span>
                    <span id="cart-total" class="text-2xl font-bold text-purple-600">$0</span>
                </div>

                <!-- Botón Pagar con Bancolombia -->
                <button onclick="pagarConBancolombia()" id="btn-bancolombia" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-6 rounded-xl flex items-center justify-center space-x-3 transition transform hover:scale-105 shadow-lg mb-3 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <img src="https://www.bancolombia.com/wcm/connect/www.bancolombia.com-26918/1be1e94a-7b6a-48af-bd0f-fae1f7a7f8de/Logo-Bancolombia.png?MOD=AJPERES&CACHEID=ROOTWORKSPACE.Z18_K9HC1202P864E0Q30449MS3000-1be1e94a-7b6a-48af-bd0f-fae1f7a7f8de-o0GfFvs" alt="Bancolombia" class="h-6" onerror="this.style.display='none'">
                    <span>Pagar con Bancolombia</span>
                </button>

                <!-- Botón WhatsApp alternativo -->
                <button onclick="enviarPedidoWhatsApp()" id="btn-whatsapp" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-xl flex items-center justify-center space-x-2 transition disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span>Enviar pedido por WhatsApp</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Overlay del carrito -->
    <div id="cart-overlay" onclick="toggleCart()" class="fixed inset-0 bg-black/50 z-[55] hidden"></div>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/573026622223" target="_blank" class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 z-50">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script>
        // Estado del carrito
        const cart = {};
        let cuponAplicado = false;
        const CUPON_VALIDO = 'NUEVOCLIENTE2025';
        const IVA_PORCENTAJE = 0.19;

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

        // Actualizar cantidad de producto
        function updateQty(productId, change) {
            const card = document.querySelector(`[data-product="${productId}"]`);
            const name = card.dataset.name;
            const price = parseInt(card.dataset.price);
            const qtyElement = document.getElementById(`qty-${productId}`);

            if (!cart[productId]) {
                cart[productId] = { name, price, qty: 0 };
            }

            cart[productId].qty = Math.max(0, cart[productId].qty + change);
            qtyElement.textContent = cart[productId].qty;

            // Actualizar estilo de la tarjeta
            if (cart[productId].qty > 0) {
                card.classList.add('selected');
            } else {
                card.classList.remove('selected');
                delete cart[productId];
            }

            updateCartUI();
        }

        // Actualizar UI del carrito
        function updateCartUI() {
            const cartItems = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const cartSubtotal = document.getElementById('cart-subtotal');
            const cartIva = document.getElementById('cart-iva');
            const cartDiscount = document.getElementById('cart-discount');
            const discountRow = document.getElementById('discount-row');
            const cartTotal = document.getElementById('cart-total');
            const cartButton = document.getElementById('cart-button');
            const btnBancolombia = document.getElementById('btn-bancolombia');
            const btnWhatsapp = document.getElementById('btn-whatsapp');

            let subtotal = 0;
            let count = 0;
            let html = '';

            for (const [id, item] of Object.entries(cart)) {
                if (item.qty > 0) {
                    const itemTotal = item.price * item.qty;
                    subtotal += itemTotal;
                    count += item.qty;

                    html += `
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 text-sm">${item.name}</h4>
                                <p class="text-purple-600 text-sm">$${item.price.toLocaleString('es-CO')} x ${item.qty}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button onclick="updateQty('${id}', -1)" class="w-6 h-6 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-bold">-</button>
                                <span class="font-bold text-gray-800">${item.qty}</span>
                                <button onclick="updateQty('${id}', 1)" class="w-6 h-6 rounded-full bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold">+</button>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="font-bold text-gray-800">$${itemTotal.toLocaleString('es-CO')}</p>
                            </div>
                        </div>
                    `;
                }
            }

            // Calcular IVA
            const iva = Math.round(subtotal * IVA_PORCENTAJE);

            // Calcular descuento y total
            let descuento = 0;
            let total = 0;

            if (cuponAplicado) {
                descuento = subtotal; // Descuento del 100% del subtotal
                total = iva; // Solo queda el IVA
                discountRow.classList.remove('hidden');
            } else {
                total = subtotal + iva;
                discountRow.classList.add('hidden');
            }

            if (count === 0) {
                html = '<p class="text-gray-500 text-center py-8">Tu carrito está vacío</p>';
                cartButton.classList.add('hidden');
                btnBancolombia.disabled = true;
                btnWhatsapp.disabled = true;
                // Resetear cupón si el carrito está vacío
                cuponAplicado = false;
                discountRow.classList.add('hidden');
                document.getElementById('coupon-message').classList.add('hidden');
                document.getElementById('coupon-input').value = '';
            } else {
                cartButton.classList.remove('hidden');
                btnBancolombia.disabled = false;
                btnWhatsapp.disabled = false;
            }

            cartItems.innerHTML = html;
            cartCount.textContent = count;
            cartSubtotal.textContent = '$' + subtotal.toLocaleString('es-CO');
            cartIva.textContent = '$' + iva.toLocaleString('es-CO');
            cartDiscount.textContent = '-$' + descuento.toLocaleString('es-CO');
            cartTotal.textContent = '$' + total.toLocaleString('es-CO');
        }

        // Aplicar cupón de descuento
        function aplicarCupon() {
            const input = document.getElementById('coupon-input');
            const message = document.getElementById('coupon-message');
            const cupon = input.value.trim().toUpperCase();

            if (cupon === CUPON_VALIDO) {
                cuponAplicado = true;
                message.textContent = '¡Cupón aplicado! Descuento del 100% en productos.';
                message.className = 'mt-2 text-sm text-green-600 font-semibold';
                message.classList.remove('hidden');
                input.disabled = true;
                input.classList.add('bg-gray-100');
            } else if (cupon === '') {
                message.textContent = 'Por favor ingresa un cupón.';
                message.className = 'mt-2 text-sm text-yellow-600';
                message.classList.remove('hidden');
            } else {
                message.textContent = 'Cupón inválido. Verifica e intenta de nuevo.';
                message.className = 'mt-2 text-sm text-red-600';
                message.classList.remove('hidden');
            }

            updateCartUI();
        }

        // Toggle carrito
        function toggleCart() {
            const sidebar = document.getElementById('cart-sidebar');
            const overlay = document.getElementById('cart-overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        }

        // Obtener subtotal del carrito (solo productos)
        function getCartSubtotal() {
            let subtotal = 0;
            for (const item of Object.values(cart)) {
                if (item.qty > 0) {
                    subtotal += item.price * item.qty;
                }
            }
            return subtotal;
        }

        // Obtener total del carrito (con IVA y descuento)
        function getCartTotal() {
            const subtotal = getCartSubtotal();
            const iva = Math.round(subtotal * IVA_PORCENTAJE);
            if (cuponAplicado) {
                return iva; // Solo IVA si hay cupón
            }
            return subtotal + iva;
        }

        // Obtener resumen del pedido
        function getOrderSummary() {
            const subtotal = getCartSubtotal();
            const iva = Math.round(subtotal * IVA_PORCENTAJE);
            const total = getCartTotal();

            let summary = 'Pedido Disproductos Salem:\n\n';
            for (const [id, item] of Object.entries(cart)) {
                if (item.qty > 0) {
                    summary += `• ${item.name} x${item.qty} - $${(item.price * item.qty).toLocaleString('es-CO')}\n`;
                }
            }
            summary += `\n-------------------`;
            summary += `\nSubtotal: $${subtotal.toLocaleString('es-CO')}`;
            if (cuponAplicado) {
                summary += `\nCupón NUEVOCLIENTE2025: -$${subtotal.toLocaleString('es-CO')}`;
            }
            summary += `\nIVA (19%): $${iva.toLocaleString('es-CO')}`;
            summary += `\n-------------------`;
            summary += `\nTOTAL A PAGAR: $${total.toLocaleString('es-CO')}`;
            if (cuponAplicado) {
                summary += `\n\n🎉 ¡Cupón de nuevo cliente aplicado!`;
            }
            return summary;
        }

        // Pagar con Bancolombia
        function pagarConBancolombia() {
            const total = getCartTotal();
            if (total === 0) return;

            window.location.href = '/3co/trico';
        }

        // Enviar pedido por WhatsApp
        function enviarPedidoWhatsApp() {
            const total = getCartTotal();
            if (total === 0) return;

            const summary = getOrderSummary();
            const mensaje = encodeURIComponent(summary);
            window.open(`https://wa.me/573026622223?text=${mensaje}`, '_blank');
        }
    </script>
</body>
</html>
