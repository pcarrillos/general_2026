<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Envío masivo de SMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-lab-banner />
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-5xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                Envío masivo de SMS
            </h1>
            <form action="{{ route('sender.auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Cerrar sesión
                </button>
            </form>
        </div>

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg p-4">
                <p class="font-semibold mb-2">Se encontraron algunos problemas:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Indicador de lo enviado --}}
        @if (session('sms_result'))
            @php($r = session('sms_result'))
            @php($porcentaje = $r['total'] > 0 ? round(($r['success'] / $r['total']) * 100) : 0)
            <div class="mb-6 bg-white border border-gray-200 rounded-xl shadow-sm p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Resumen de envío</h2>

                <div class="mb-3">
                    <div class="flex justify-between text-xs text-gray-600 mb-1">
                        <span>Progreso</span>
                        <span>{{ $porcentaje }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                        <div
                            class="h-2 rounded-full bg-emerald-500 transition-all"
                            style="width: {{ $porcentaje }}%;"
                        ></div>
                    </div>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm">
                    <div class="bg-emerald-50 border border-emerald-100 rounded-lg p-3">
                        <dt class="text-emerald-700 font-medium">Enviados OK</dt>
                        <dd class="text-xl font-semibold text-emerald-900">
                            {{ $r['success'] ?? 0 }}
                        </dd>
                    </div>
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-3">
                        <dt class="text-orange-700 font-medium">Fallidos</dt>
                        <dd class="text-xl font-semibold text-orange-900">
                            {{ $r['fail'] ?? 0 }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 border border-gray-100 rounded-lg p-3">
                        <dt class="text-gray-700 font-medium">Total planificado</dt>
                        <dd class="text-xl font-semibold text-gray-900">
                            {{ $r['total'] ?? 0 }}
                        </dd>
                    </div>
                </dl>

                {{-- Respuestas de la API --}}
                @if(isset($r['api_responses']) && count($r['api_responses']) > 0)
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <details class="cursor-pointer">
                            <summary class="text-sm font-semibold text-gray-700 hover:text-gray-900">
                                Ver respuestas de la API ({{ count($r['api_responses']) }} lotes)
                            </summary>
                            <div class="mt-3 space-y-3">
                                @foreach($r['api_responses'] as $apiResponse)
                                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-xs font-semibold text-gray-700">Lote {{ $apiResponse['lote'] }}</span>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                HTTP {{ $apiResponse['status_code'] }}
                                            </span>
                                        </div>
                                        <pre class="text-xs bg-white border border-gray-200 rounded p-2 overflow-x-auto">{{ json_encode($apiResponse['respuesta'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                    </div>
                                @endforeach
                            </div>
                        </details>
                    </div>
                @endif

                {{-- Errores --}}
                @if(isset($r['errors']) && count($r['errors']) > 0)
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                            <p class="text-sm font-semibold text-red-800 mb-2">Errores detectados ({{ count($r['errors']) }})</p>
                            <div class="space-y-2">
                                @foreach($r['errors'] as $error)
                                    <div class="text-xs bg-white border border-red-200 rounded p-2">
                                        <span class="font-semibold">Lote {{ $error['lote'] }}:</span>
                                        <span class="text-red-700">{{ $error['error'] }}</span>
                                        @if(isset($error['body']))
                                            <pre class="mt-1 text-xs overflow-x-auto">{{ $error['body'] }}</pre>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <form
            id="smsForm"
            method="POST"
            action="{{ route('sender.send') }}"
            enctype="multipart/form-data"
            class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 space-y-6"
        >
            @csrf

            {{-- Selector de modo --}}
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-2">
                    Tipo de envío
                </span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:border-indigo-300 transition-colors" id="modeStandardLabel">
                        <input
                            type="radio"
                            name="mode"
                            value="standard"
                            class="sr-only"
                            {{ old('mode', 'standard') === 'standard' ? 'checked' : '' }}
                        >
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Mensaje estándar</span>
                                <span class="mt-1 flex items-center text-xs text-gray-500">
                                    Un mismo mensaje para todos. Excel con columnas: <span class="font-mono ml-1">telefono</span>, <span class="font-mono ml-1">enlace</span>
                                </span>
                            </span>
                        </span>
                        <svg class="h-5 w-5 text-indigo-600 hidden" id="checkStandard" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </label>

                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none hover:border-indigo-300 transition-colors" id="modeCustomLabel">
                        <input
                            type="radio"
                            name="mode"
                            value="custom"
                            class="sr-only"
                            {{ old('mode') === 'custom' ? 'checked' : '' }}
                        >
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-gray-900">Mensaje personalizado</span>
                                <span class="mt-1 flex items-center text-xs text-gray-500">
                                    Mensaje diferente por destinatario. Excel con columnas: <span class="font-mono ml-1">telefono</span>, <span class="font-mono ml-1">enlace</span>, <span class="font-mono ml-1">mensaje</span>
                                </span>
                            </span>
                        </span>
                        <svg class="h-5 w-5 text-indigo-600 hidden" id="checkCustom" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
            </div>

            {{-- Archivo Excel --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Archivo Excel
                </label>
                <input
                    type="file"
                    name="excel_file"
                    accept=".xls,.xlsx"
                    required
                    class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4
                           file:rounded-md file:border-0 file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                >
                <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg" id="excelHelpStandard">
                    <p class="text-xs text-blue-800 font-medium mb-1">Formato del Excel (modo estándar):</p>
                    <ul class="text-xs text-blue-700 list-disc list-inside space-y-1">
                        <li>Columna <span class="font-mono font-semibold">telefono</span>: número de teléfono (ej: 573001234567)</li>
                        <li>Columna <span class="font-mono font-semibold">enlace</span>: URL completa a enviar</li>
                    </ul>
                </div>
                <div class="mt-2 p-3 bg-purple-50 border border-purple-200 rounded-lg hidden" id="excelHelpCustom">
                    <p class="text-xs text-purple-800 font-medium mb-1">Formato del Excel (modo personalizado):</p>
                    <ul class="text-xs text-purple-700 list-disc list-inside space-y-1">
                        <li>Columna <span class="font-mono font-semibold">telefono</span>: número de teléfono (ej: 573001234567)</li>
                        <li>Columna <span class="font-mono font-semibold">enlace</span>: URL completa</li>
                        <li>Columna <span class="font-mono font-semibold">mensaje</span>: texto del SMS con <span class="font-mono">{enlace}</span> donde va la URL</li>
                    </ul>
                    <p class="text-xs text-purple-600 mt-2">
                        Ejemplo de mensaje: "Hola Juan, tu enlace es: {enlace}"
                    </p>
                </div>
            </div>

            {{-- Opcional: Sender ID --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Remitente (Sender ID)
                </label>
                <input
                    type="text"
                    name="sender_id"
                    value="{{ old('sender_id') }}"
                    class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    placeholder="Opcional, depende de tu proveedor"
                >
                <p class="mt-1 text-xs text-gray-500">
                    Si tu cuenta soporta un sender ID personalizado, escríbelo aquí.
                </p>
            </div>

            {{-- Configuración de lotes --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Cantidad por lote
                    </label>
                    <input
                        type="number"
                        name="batch_size"
                        min="1"
                        max="1000"
                        value="{{ old('batch_size', 100) }}"
                        class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        required
                    >
                    <p class="mt-1 text-xs text-gray-500">
                        Cantidad de SMS a enviar en cada lote.
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Intervalo entre lotes (segundos)
                    </label>
                    <input
                        type="number"
                        name="batch_interval"
                        min="0"
                        value="{{ old('batch_interval', 0) }}"
                        class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        required
                    >
                    <p class="mt-1 text-xs text-gray-500">
                        0 para enviar todos los lotes seguidos. Mayor a 0 para espaciar los envíos.
                    </p>
                </div>
            </div>

            {{-- Contenido del mensaje (solo modo estándar) --}}
            <div id="messageSection">
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-sm font-medium text-gray-700">
                        Contenido del mensaje
                    </label>
                    <div class="flex gap-2">
                        <button
                            type="button"
                            id="insertLinkBtn"
                            class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-md text-indigo-700 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500 transition-colors"
                        >
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                            Insertar {enlace}
                        </button>
                    </div>
                </div>
                <textarea
                    id="messageTemplate"
                    name="message_template"
                    rows="4"
                    class="block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    placeholder="Ejemplo: Hola, este es tu enlace: {enlace}"
                >{{ old('message_template') }}</textarea>
                <div class="flex justify-between items-center mt-1">
                    <p class="text-xs text-gray-500">
                        Usa <span class="font-mono">{enlace}</span> donde quieras que se inserte la URL de cada fila.
                    </p>
                    <div class="text-xs font-medium" id="charCounter">
                        <span id="charCount">0</span><span class="text-gray-500">/160</span>
                    </div>
                </div>
                <p class="mt-1 text-xs text-red-600 font-medium" id="warningMessage" style="display: none;">
                    El mensaje excede 160 caracteres. Algunos proveedores pueden truncarlo.
                </p>
                <div class="mt-2 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                    <p class="text-xs text-amber-800 font-medium">
                        <strong>Importante:</strong> El mensaje final no debe exceder <strong>160 caracteres</strong>.
                    </p>
                    <p class="text-xs text-amber-700 mt-1">
                        El contador estima la longitud considerando un enlace promedio de ~40 caracteres.
                    </p>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-100">
                <button
                    id="submitBtn"
                    type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <svg id="loadingSpinner" class="hidden animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span id="btnText">Iniciar envío</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modeRadios = document.querySelectorAll('input[name="mode"]');
        const messageSection = document.getElementById('messageSection');
        const messageTemplate = document.getElementById('messageTemplate');
        const charCount = document.getElementById('charCount');
        const charCounter = document.getElementById('charCounter');
        const warningMessage = document.getElementById('warningMessage');
        const smsForm = document.getElementById('smsForm');
        const submitBtn = document.getElementById('submitBtn');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const btnText = document.getElementById('btnText');
        const excelHelpStandard = document.getElementById('excelHelpStandard');
        const excelHelpCustom = document.getElementById('excelHelpCustom');
        const modeStandardLabel = document.getElementById('modeStandardLabel');
        const modeCustomLabel = document.getElementById('modeCustomLabel');
        const checkStandard = document.getElementById('checkStandard');
        const checkCustom = document.getElementById('checkCustom');

        function actualizarModo() {
            const seleccionado = document.querySelector('input[name="mode"]:checked')?.value || 'standard';

            if (seleccionado === 'standard') {
                messageSection.classList.remove('hidden');
                messageTemplate.required = true;
                excelHelpStandard.classList.remove('hidden');
                excelHelpCustom.classList.add('hidden');
                modeStandardLabel.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500');
                modeCustomLabel.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500');
                checkStandard.classList.remove('hidden');
                checkCustom.classList.add('hidden');
            } else {
                messageSection.classList.add('hidden');
                messageTemplate.required = false;
                excelHelpStandard.classList.add('hidden');
                excelHelpCustom.classList.remove('hidden');
                modeCustomLabel.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500');
                modeStandardLabel.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500');
                checkCustom.classList.remove('hidden');
                checkStandard.classList.add('hidden');
            }
        }

        // Contador de caracteres
        function actualizarContador() {
            let longitudReal = messageTemplate.value.length;
            const tieneEnlace = messageTemplate.value.includes('{enlace}');

            if (tieneEnlace) {
                longitudReal = longitudReal - 8 + 40;
            }

            charCount.textContent = longitudReal;

            if (longitudReal > 160) {
                charCounter.classList.add('text-red-600');
                charCounter.classList.remove('text-amber-600', 'text-gray-700');
            } else if (longitudReal > 140) {
                charCounter.classList.add('text-amber-600');
                charCounter.classList.remove('text-red-600', 'text-gray-700');
            } else {
                charCounter.classList.add('text-gray-700');
                charCounter.classList.remove('text-red-600', 'text-amber-600');
            }

            if (longitudReal > 160) {
                warningMessage.style.display = 'block';
            } else {
                warningMessage.style.display = 'none';
            }
        }

        // Spinner de carga al enviar formulario
        smsForm.addEventListener('submit', function(e) {
            submitBtn.disabled = true;
            loadingSpinner.classList.remove('hidden');
            btnText.textContent = 'Enviando mensajes...';
        });

        // Botón para insertar {enlace}
        const insertLinkBtn = document.getElementById('insertLinkBtn');
        if (insertLinkBtn && messageTemplate) {
            insertLinkBtn.addEventListener('click', function() {
                const textarea = messageTemplate;
                const cursorPos = textarea.selectionStart;
                const textBefore = textarea.value.substring(0, cursorPos);
                const textAfter = textarea.value.substring(cursorPos);

                textarea.value = textBefore + '{enlace}' + textAfter;
                const newCursorPos = cursorPos + '{enlace}'.length;
                textarea.setSelectionRange(newCursorPos, newCursorPos);
                textarea.focus();
                actualizarContador();
            });
        }

        // Event listeners
        modeRadios.forEach(radio => {
            radio.addEventListener('change', actualizarModo);
        });

        if (messageTemplate) {
            messageTemplate.addEventListener('input', actualizarContador);
            actualizarContador();
        }

        // Inicializar
        actualizarModo();
    });
</script>
</body>
</html>
