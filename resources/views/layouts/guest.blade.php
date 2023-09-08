<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">
    {{-- Navbar --}}
    <nav class="">
        <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-4 py-8">
            <a href="/" class="flex items-center">
                <img src="{{ asset('assets/logo.svg') }}" class="h-10 mr-3" alt="Flowbite Logo" />
            </a>
            <div class="flex md:order-2 space-x-6">
                <a href="#"
                    class="inline-flex items-center justify-center text-xs 2xl:text-sm text-black hover:text-gray-700">
                    Masuk
                </a>
                <button type="button"
                    class="text-white bg-primary hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-full text-xs 2xl:text-sm px-4 py-3 text-center mr-3 md:mr-0">Daftar
                    Sekarang</button>
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-xs 2xl:text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-normal text-xs 2xl:text-sm p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-12 md:mt-0 md:border-0">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white nav-active bg-primary rounded md:bg-transparent md:text-primary md:p-0"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-purple-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kursus</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-purple-500  dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Bantuan</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section id="hero">
        <section class="">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <p class="text-md text-orange-500 font-medium mb-2">
                        Pelajari Skill Baru
                    </p>
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-bold tracking-tighter leading-snug md:text-5xl xl:text-6xl ">
                        Pelajari Skills Baru
                        Sesuai Dengan Minatmu
                    </h1>
                    <p class="max-w-2xl mb-6 font-normal text-gray-500 lg:mb-8 text-xs 2xl:text-sm">
                        Membantu Anda belajar lebih mudah dengan efektif
                    </p>
                    <a href="#"
                        class="inline-flex items-center justify-center px-11 py-3.5 mr-3 text-xs 2xl:text-sm font-medium text-center text-white rounded-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300">
                        Ayo Mulai
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center px-8 py-3.5 mr-3 text-xs 2xl:text-sm font-medium text-center text-gray-500 rounded-full bg-slate-100 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300">
                        Daftar Sekarang
                    </a>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('assets/hero.svg') }}" alt="mockup" class="w-full">
                </div>
            </div>
        </section>
    </section>

    {{-- Features --}}
    <section id="feature">
        <div class="grid grid-cols-1 md:grid-cols-3 max-w-7xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">
            <div>
                <h1 class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter  leading-snug">
                    3 Cara Mudah <br>
                    Memulai Pembelajaran
                </h1>
                <p class="text-gray-400 text-xs 2xl:text-sm mt-2">
                    Kami menyediakan layanan untuk mempermudah anda mempelajari skills yang anda inginkan
                </p>
            </div>
            <div class="col-span-2 grid grid-cols-2 md:grid-cols-3 md:ml-16">
                <div>
                    <div class="flex items-center flex-row justify-center w-12 h-12 text-black bg-gray-100 rounded-xl">
                        <img src="{{ asset('assets/play-circle-outline.svg') }}" class="w-8 h-8" />
                        <span class="text-xs 2xl:text-sm font-medium leading-6 text-black w-full">
                            Database with GraphQL
                        </span>
                    </div>
                    <div class="mt-4 text-xs 2xl:text-sm text-gray-500">
                        Define the data model in your database and query data with
                        GraphQL.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    {{-- IonIcon --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
