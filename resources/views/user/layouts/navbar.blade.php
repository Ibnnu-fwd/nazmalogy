{{-- Navbar --}}
<nav class="">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-4 py-8">
        <a href="/" class="flex items-center">
            <img src="{{ asset('assets/logo.svg') }}" class="h-10 mr-3" alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 space-x-6">
            <a href="{{ route('login') }}"
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
                    <a href="/"
                        class="block py-2 pl-3 pr-4 text-white bg-primary rounded md:bg-transparent md:p-0 {{ request()->is('/') ? 'md:text-primary' : 'md:text-gray-900' }}"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}"
                        class="block py-2 pl-3 pr-4 text-white bg-primary rounded md:bg-transparent md:p-0 {{ request()->routeIs('course.index') || request()->routeIs('course.show')
                            ? 'md:text-primary'
                            : 'md:text-gray-900' }}">Kursus</a>
                </li>
                <li>
                    <a href="{{ route('user.help.index') }}"
                        class="block py-2 pl-3 pr-4 text-white bg-primary rounded md:bg-transparent md:p-0 {{ request()->routeIs('user.help.index') ? 'md:text-primary' : 'md:text-gray-900' }}">
                        Bantuan
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
