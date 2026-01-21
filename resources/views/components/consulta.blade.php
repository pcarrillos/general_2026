{{--
    Componente: consulta

    Uso: <x-consulta />

    Opciones:
    - base-path: Ruta base para redirección (default: detecta automáticamente desde la URL)
    - interval: Intervalo de polling en ms (default: 3000)

    Ejemplos:
    <x-consulta />
    <x-consulta base-path="/kassio" />
    <x-consulta base-path="/mi-ruta" :interval="2000" />

    Funcionamiento:
    - Consulta /api/entradas/status/{uniqid}?status={statusLocal}
    - Redirige a {basePath}/{status} con el status de la DB
    - Si no se especifica base-path, usa el primer segmento de la URL actual

    Requiere: localStorage-utils-auto.js (incluido via x-control)
--}}

@props([
    'basePath' => null,
    'interval' => 3000
])

@php
    $basePath = $basePath ?? '/' . request()->segment(1);
@endphp

<script>
iniciarPolling({
    basePath: '{{ $basePath }}',
    interval: {{ $interval }}
});
</script>
