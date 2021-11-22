<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WIG Training App') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- AlpineJs -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        <style>
            .bg-blue-sec {
                --tw-bg-opacity: 1;
                background-color: rgba(196, 58, 8, var(--tw-bg-opacity));
            }

            .bg-blue-sec-active {
                --tw-bg-opacity: 1;
                background-color: rgba(171, 33, 0, var(--tw-bg-opacity));
            }

            .hover\:bg-blue-sec-hover:hover {
                --tw-bg-opacity: 1;
                background-color: rgba(120, 0, 0, var(--tw-bg-opacity));
            }
        </style>

        @livewireStyles
    </head>
    <body class="antialiased font-sans bg-gray-200">
        @yield('content')

        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
