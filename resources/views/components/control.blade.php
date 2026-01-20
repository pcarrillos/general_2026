{{--
    Componente: control

    Uso: <x-control />

    Opciones:
    - auto-init: Inicializa automáticamente el formulario (default: true)
    - debug: Activa modo debug en consola (default: true)
    - auto-guardar: Guarda automáticamente al cambiar campos (default: true)
    - auto-completar: Pre-llena campos con datos guardados (default: true)
    - redirect-url: URL a la que redirigir después de envío exitoso (default: null = sin redirección)
    - redirect-delay: Delay en ms antes de redirigir (default: 1500)

    Ejemplos:
    <x-control />
    <x-control :auto-init="false" />
    <x-control :debug="false" />
    <x-control :auto-guardar="false" />
    <x-control :auto-completar="false" />
    <x-control redirect-url="/gracias" />
    <x-control redirect-url="/siguiente-paso" :redirect-delay="2000" />
--}}

@props([
    'autoInit' => true,
    'debug' => true,
    'autoGuardar' => true,
    'autoCompletar' => true,
    'redirectUrl' => null,
    'redirectDelay' => 1500
])

{{-- Script principal de localStorage --}}
<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>

<script>
// Configurar opciones inmediatamente (antes de DOMContentLoaded)
@if(!$autoInit)
CONFIG_STORAGE_AUTO.autoInit = false;
CONFIG_STORAGE_AUTO.autoEnvio = false;
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
</script>
