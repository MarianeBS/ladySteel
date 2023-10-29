<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="imagem/ico" href="img/logos/iconLadySteel.ico">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/main.js') }}"></script>
        @stack('scripts')
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-b from-rose-500 from-3% to-rose-50 to-60% ">
        @include('layouts.navigation-guest')    
        <div class="min-h-screen flex flex-col justify-center items-center pt-0">
            <div>
                {{ $slot }}
            </div>    
        </div>
    </body>
</html>
