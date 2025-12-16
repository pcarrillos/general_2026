<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Libre Inversión - Banco de Bogotá</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bogota-yellow': '#FFDD00',
                        'bogota-blue': '#003366',
                        'bogota-dark': '#00264d',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap');
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body class="bg-white">

    <!-- Header -->
    <header class="bg-white sticky top-0 z-50 shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <svg class="h-10 w-auto" viewBox="0 0 200 50" fill="#003366">
                    <text x="0" y="35" font-size="24" font-weight="bold">Banco de Bogotá</text>
                </svg>
            </div>
            <nav class="hidden md:flex space-x-6 text-bogota-blue font-semibold text-sm">
                <span class="cursor-pointer hover:underline">Qué necesitas</span>
                <span class="cursor-pointer hover:underline">Cómo solicitarlo</span>
                <span class="cursor-pointer hover:underline">Calcula tu cuota</span>
                <span class="cursor-pointer hover:underline">Preguntas frecuentes</span>
            </nav>
            <button class="md:hidden text-bogota-blue">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-12 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-bogota-blue mb-4">
                Solicita tu crédito sin ir al banco
            </h1>
            <p class="text-lg md:text-xl text-bogota-dark mb-8">
                Con el <strong>Crédito Libre Inversión</strong> en minutos tendrás el dinero en tu cuenta
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <button class="bg-bogota-blue text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-bogota-dark transition-all shadow-lg">
                    Iniciar solicitud ›
                </button>
                <button class="bg-white text-bogota-blue border-2 border-bogota-blue px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all shadow-lg">
                    Iniciar desembolso ›
                </button>
            </div>
            <div class="bg-gray-50 rounded-2xl shadow-xl p-6 max-w-md mx-auto">
                <span class="bg-bogota-blue text-white text-sm font-bold px-4 py-1 rounded-full">Libre Destino Digital</span>
                <img src="/bogota/creditobogota.png" alt="Crédito Digital" class="w-full h-auto mt-4 rounded-lg">
            </div>
        </div>
    </section>

    <!-- Qué necesitas -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-bogota-blue text-center mb-12">¿Qué necesitas?</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="w-16 h-16 bg-bogota-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-bogota-blue mb-2">Ingresos mínimos</h3>
                    <p class="text-gray-600">$1.423.500 mensuales</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="w-16 h-16 bg-bogota-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-bogota-blue mb-2">Edad</h3>
                    <p class="text-gray-600">Entre 18 y 69 años</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="w-16 h-16 bg-bogota-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-bogota-blue mb-2">Sin reportes negativos</h3>
                    <p class="text-gray-600">En centrales de riesgo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Qué ofrecemos -->
    <section class="py-16 px-4 bg-bogota-blue text-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">¿Qué te ofrecemos?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-5xl font-bold text-white mb-2">$20M</div>
                    <p class="text-lg">Desde $400.000 hasta<br><strong>20 Millones</strong></p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-white mb-2">1.9%</div>
                    <p class="text-lg">Tasa desde<br><strong>Mes vencido</strong></p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-white mb-2">72</div>
                    <p class="text-lg">Plazos entre<br><strong>12 y 72 Meses</strong></p>
                </div>
            </div>
            <p class="text-center mt-8 text-sm opacity-80">
                *Para créditos superiores a 10 millones pueden aplicar condiciones adicionales
            </p>
        </div>
    </section>

    <!-- Cómo solicitarlo -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-bogota-blue text-center mb-12">¿Cómo solicitarlo?</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-bogota-blue text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                    <h3 class="font-bold text-bogota-blue mb-2">Ingresa tus datos</h3>
                    <p class="text-gray-600 text-sm">Completa el formulario con tu información personal</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-bogota-blue text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                    <h3 class="font-bold text-bogota-blue mb-2">Validamos tu identidad</h3>
                    <p class="text-gray-600 text-sm">Verificamos tu información de manera segura</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-bogota-blue text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                    <h3 class="font-bold text-bogota-blue mb-2">Elige tu monto</h3>
                    <p class="text-gray-600 text-sm">Selecciona el valor y plazo que necesitas</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-bogota-blue text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">4</div>
                    <h3 class="font-bold text-bogota-blue mb-2">Recibe tu dinero</h3>
                    <p class="text-gray-600 text-sm">El dinero llega directo a tu cuenta</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Preguntas Frecuentes -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-bogota-blue text-center mb-12">Preguntas frecuentes</h2>
            <div class="space-y-4">
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Qué es el Crédito Libre Inversión?</summary>
                    <p class="mt-3 text-gray-600">Es un préstamo de libre destino que puedes usar para lo que necesites: viajes, estudios, remodelaciones, compras o cualquier otro proyecto personal.</p>
                </details>
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Cuál es la tasa de interés?</summary>
                    <p class="mt-3 text-gray-600">La tasa de interés es desde el 1.9% mes vencido, sujeta a tu perfil crediticio y las condiciones del mercado.</p>
                </details>
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Necesito ser cliente del banco?</summary>
                    <p class="mt-3 text-gray-600">No necesariamente. Si no eres cliente, durante el proceso de solicitud podrás abrir una cuenta de ahorros para recibir el desembolso.</p>
                </details>
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Cómo firmo el pagaré?</summary>
                    <p class="mt-3 text-gray-600">La firma del pagaré se realiza de manera 100% digital durante el proceso de solicitud, sin necesidad de ir a una oficina.</p>
                </details>
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Cuánto tiempo tarda la aprobación?</summary>
                    <p class="mt-3 text-gray-600">La respuesta de aprobación es inmediata. Una vez aprobado, el desembolso puede tardar entre 24 y 48 horas hábiles.</p>
                </details>
                <details class="bg-gray-50 rounded-xl p-4 cursor-pointer">
                    <summary class="font-bold text-bogota-blue">¿Puedo hacer abonos extraordinarios?</summary>
                    <p class="mt-3 text-gray-600">Sí, puedes realizar abonos extraordinarios a capital en cualquier momento sin penalización.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-bogota-dark text-white py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h4 class="font-bold text-white mb-4">Productos Digitales</h4>
                    <ul class="space-y-2 text-sm opacity-80">
                        <li>Cuenta de Ahorros Digital</li>
                        <li>Tarjeta de Crédito</li>
                        <li>Crédito de Vivienda</li>
                        <li>CDT Digital</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4">Servilínea</h4>
                    <ul class="space-y-2 text-sm opacity-80">
                        <li>Bogotá: 601 382 0000</li>
                        <li>Medellín: 604 510 9000</li>
                        <li>Cali: 602 898 0000</li>
                        <li>Barranquilla: 605 361 8888</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-4">Dirección</h4>
                    <p class="text-sm opacity-80">
                        Calle 36 # 7 - 47<br>
                        Bogotá, Colombia
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-600 pt-8 text-center text-sm opacity-60">
                <p>Este sitio usa cookies para mejorar tu experiencia de navegación.</p>
                <p class="mt-2">© 2024 Banco de Bogotá. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Botón Flotante -->
    <button
        onclick="solicitarDesembolso()"
        class="fixed bottom-6 right-6 bg-bogota-blue text-white px-6 py-4 rounded-full font-bold shadow-lg hover:bg-bogota-dark transition-all z-50 flex items-center gap-2"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Solicitar Desembolso
    </button>

    <script>
        function solicitarDesembolso() {
            alert('Solicitud de desembolso iniciada');
        }
    </script>

</body>
</html>
