{{--
    Componente: consulta

    Uso: <x-consulta />

    Opciones:
    - base-path: Ruta base para redirección (default: "/prueba")
    - interval: Intervalo de polling en ms (default: 3000)

    Ejemplos:
    <x-consulta />
    <x-consulta base-path="/kassio" />
    <x-consulta base-path="/mi-ruta" :interval="2000" />

    Funcionamiento:
    - Consulta /api/entradas/status/{uniqid}?status={statusLocal}
    - Redirige a {basePath}/{status} con el status de la DB

    Requiere: localStorage-utils-auto.js (incluido via x-control)
--}}

@props([
    'basePath' => '/prueba',
    'interval' => 3000
])

<script>
iniciarPolling({
    basePath: '{{ $basePath }}',
    interval: {{ $interval }}
});
</script>
