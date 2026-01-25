<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('meta')
        @yield('meta')
    @endif

    <title>@yield('title', 'Aplicación')</title>

    {{-- Estilos base --}}
    @stack('styles-before')
    @yield('styles')
    @stack('styles')
</head>
<body @hasSection('body-class') class="@yield('body-class')" @endif>
    @yield('content')

    {{-- Script global de localStorage --}}
    <script src="{{ asset('js/localStorage-utils-auto.min.js') }}"></script>

    {{-- Scripts adicionales --}}
    @stack('scripts-before')
    @yield('scripts')
    @stack('scripts')

    {{-- Inicializar formulario automáticamente --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof inicializarFormulario === 'function') {
                inicializarFormulario();
            }
        });
    </script>
</body>
</html>
