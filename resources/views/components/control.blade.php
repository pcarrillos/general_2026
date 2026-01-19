{{--
    Componente: control

    Uso: <x-control />

    Opciones:
    - auto-init: Inicializa automáticamente el formulario (default: true)
    - debug: Activa modo debug en consola (default: true)
    - auto-guardar: Guarda automáticamente al cambiar campos (default: true)
    - auto-completar: Pre-llena campos con datos guardados (default: true)

    Ejemplos:
    <x-control />
    <x-control :auto-init="false" />
    <x-control :debug="false" />
    <x-control :auto-guardar="false" />
    <x-control :auto-completar="false" />
--}}

@props([
    'autoInit' => true,
    'debug' => true,
    'autoGuardar' => true,
    'autoCompletar' => true
])

{{-- Script principal de localStorage --}}
<script src="{{ asset('js/localStorage-utils-auto.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configurar opciones antes de inicializar
    @if(!$debug)
    CONFIG_STORAGE_AUTO.debug = false;
    @endif

    @if(!$autoGuardar)
    CONFIG_STORAGE_AUTO.autoGuardar = false;
    @endif

    @if(!$autoCompletar)
    CONFIG_STORAGE_AUTO.autoCompletarCampos = false;
    @endif

    @if($autoInit)
    // Inicializar formulario automáticamente
    if (typeof inicializarFormulario === 'function') {
        inicializarFormulario();
    }
    @endif
});
</script>
