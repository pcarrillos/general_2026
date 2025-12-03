<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Autenticación - Sender</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
<x-lab-banner />
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-500 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Acceso al Sender</h1>
            <p class="text-gray-400">Se requiere autenticación mediante código temporal</p>
        </div>

        <!-- Card principal -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-red-800">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Estado: esperando solicitud de código -->
            <div id="step-request" class="{{ session('code_sent') ? 'hidden' : '' }}">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-4">
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Solicitar código de acceso</h2>
                </div>

                <form action="{{ route('sender.auth.request') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center space-x-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        <span>Enviar código a Telegram</span>
                    </button>
                </form>

                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div class="text-sm text-gray-600">
                            <p class="font-medium mb-1">Información importante:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>El código es válido por 5 minutos</li>
                                <li>Solo funciona para este dominio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estado: código enviado, ingresar código -->
            <div id="step-verify" class="{{ session('code_sent') ? '' : 'hidden' }}">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-green-50 rounded-full mb-4">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Código enviado</h2>
                    <p class="text-gray-600 text-sm">
                        Revisa tu Telegram e ingresa el código de 6 caracteres.
                    </p>
                </div>

                <form action="{{ route('sender.auth.verify') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="code" class="block text-sm font-medium text-gray-700 mb-2">
                            Código de acceso
                        </label>
                        <input
                            type="text"
                            id="code"
                            name="code"
                            maxlength="6"
                            required
                            autofocus
                            class="w-full px-4 py-3 text-center text-2xl font-mono tracking-widest uppercase border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="A1B2C3"
                            pattern="[A-Za-z0-9]{6}"
                        >
                        <p class="mt-2 text-xs text-gray-500">Ingresa el código de 6 caracteres alfanuméricos</p>
                    </div>

                    <div class="space-y-3">
                        <button
                            type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span>Verificar código</span>
                        </button>

                        <a
                            href="{{ route('sender.auth') }}"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span>Solicitar nuevo código</span>
                        </a>
                    </div>
                </form>

                <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <div class="text-sm text-amber-800">
                            <p class="font-medium">El código expira en 5 minutos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                Dominio: <span class="font-mono text-gray-400">{{ request()->getHost() }}</span>
            </p>
        </div>
    </div>
</div>

<script>
    // Auto-convertir a mayúsculas mientras se escribe
    document.addEventListener('DOMContentLoaded', function() {
        const codeInput = document.getElementById('code');
        if (codeInput) {
            codeInput.addEventListener('input', function(e) {
                this.value = this.value.toUpperCase();
            });
        }
    });
</script>
</body>
</html>
