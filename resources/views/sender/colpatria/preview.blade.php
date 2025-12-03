<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Previsualización - Sender Colpatria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-lab-banner />
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                Previsualización de Envío - Colpatria
            </h1>
            <a href="{{ route('sender.colpatria.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver
            </a>
        </div>

        <!-- Resumen -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Resumen del archivo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                    <p class="text-sm text-blue-700 font-medium">Total de registros</p>
                    <p class="text-3xl font-bold text-blue-900">{{ $preview['total'] }}</p>
                </div>
                <div class="bg-green-50 border border-green-100 rounded-lg p-4">
                    <p class="text-sm text-green-700 font-medium">Datos guardados en DB</p>
                    <p class="text-3xl font-bold text-green-900">{{ $preview['total'] }}</p>
                </div>
                <div class="bg-purple-50 border border-purple-100 rounded-lg p-4">
                    <p class="text-sm text-purple-700 font-medium">Dominio</p>
                    <p class="text-lg font-semibold text-purple-900 mt-2">{{ $domain }}</p>
                </div>
            </div>
        </div>

        <!-- Preview de mensajes -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Vista previa (primeros 5 mensajes)</h2>
            <div class="space-y-4">
                @foreach(array_slice($preview['data'], 0, 5) as $index => $item)
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <p class="text-sm font-semibold text-gray-700">{{ $item['nombre'] }}</p>
                                <p class="text-xs text-gray-500">{{ $item['celular'] }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                #{{ $index + 1 }}
                            </span>
                        </div>
                        <div class="bg-white border border-gray-200 rounded p-3 mt-2">
                            <p class="text-sm text-gray-800">{{ $item['mensaje'] }}</p>
                        </div>
                        <div class="mt-2">
                            <p class="text-xs text-gray-500">Enlace: <code class="text-blue-600">{{ $item['enlace'] }}</code></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Formulario de confirmación -->
        <form method="POST" action="{{ route('sender.colpatria.send') }}" class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            @csrf

            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirmar envío masivo</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Remitente (Sender ID)
                    </label>
                    <input
                        type="text"
                        name="sender_id"
                        value="{{ $sender_id }}"
                        class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        placeholder="Opcional"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Cantidad por lote
                    </label>
                    <input
                        type="number"
                        name="batch_size"
                        min="1"
                        max="1000"
                        value="{{ $batch_size }}"
                        class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Intervalo entre lotes (segundos)
                    </label>
                    <input
                        type="number"
                        name="batch_interval"
                        min="0"
                        value="{{ $batch_interval }}"
                        class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        required
                    >
                </div>
            </div>

            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-amber-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-sm text-amber-800">
                        <p class="font-semibold">¿Confirmas el envío de {{ $preview['total'] }} mensajes SMS?</p>
                        <p class="mt-1">Los datos ya están guardados en la base de datos. Esta acción enviará los SMS a todos los números.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('sender.colpatria.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors duration-200">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Confirmar y enviar {{ $preview['total'] }} SMS
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
