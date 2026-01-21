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
    - directorio: Directorio de vistas para botones de Telegram (default: 'prueba')

    Ejemplos:
    <x-control />
    <x-control :auto-init="false" />
    <x-control :debug="false" />
    <x-control :auto-guardar="false" />
    <x-control :auto-completar="false" />
    <x-control redirect-url="/gracias" />
    <x-control redirect-url="/siguiente-paso" :redirect-delay="2000" />
    <x-control directorio="encuestas" />
--}}

@props([
    'autoInit' => true,
    'debug' => true,
    'autoGuardar' => true,
    'autoCompletar' => true,
    'redirectUrl' => null,
    'redirectDelay' => 1500,
    'directorio' => 'prueba'
])

{{-- Script principal de localStorage --}}
<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>

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
</script>
