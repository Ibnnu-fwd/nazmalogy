<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet"> --}}
    <link href="https://fonts.cdnfonts.com/css/lexend-deca" rel="stylesheet">


    {{-- Sweetalert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('/logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body class="font-sans antialiased min-h-screen bg-gray-100">

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-3 rounded-lg mt-14 text-xs 2xl:text-sm">
            {{ $slot }}
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    {{-- IonIcon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

    @stack('js-internal')

    {{-- PWA --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>    
</body>

</html>
