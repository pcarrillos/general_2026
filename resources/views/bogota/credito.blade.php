<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito Bogotá</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white">
    <div class="w-full">
        <img
            src="/bogota/creditobogota.png"
            alt="Crédito Bogotá"
            class="w-full h-auto"
        >
    </div>

    <button
        onclick="solicitarDesembolso()"
        class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-gradient-to-r from-blue-600 to-blue-800 text-white px-8 py-4 rounded-full font-bold text-lg uppercase tracking-wide shadow-lg hover:from-blue-500 hover:to-blue-700 hover:shadow-xl hover:-translate-y-1 hover:-translate-x-1/2 transition-all duration-300 z-50"
    >
        Solicitar Desembolso
    </button>

    <script>
        function solicitarDesembolso() {
            alert('Solicitud de desembolso iniciada');
        }
    </script>
</body>
</html>
