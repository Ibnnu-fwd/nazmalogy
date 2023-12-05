{{-- Navbar --}}
<nav class="">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-4 py-8">
        <a href="/" class="flex items-center">
            <img src="{{ asset('assets/logo.svg') }}" class="h-8 mr-3" alt="Flowbite Logo" />
        </a>
        <div class="flex md:order-2 space-x-6">
            @auth
                <button type="button" class="flex mr-3 text-sm rounded-full md:mr-0 " id="user-menu-button"
                    aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-12 h-12 rounded-full object-cover"
                        src="{{ auth()->user()->avatar ? asset('storage/avatar/' . auth()->user()->avatar) : asset('assets/noimage.svg') }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-sm list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 ">
                            {{ auth()->user()->fullname }}
                        </span>
                        <span class="block text-sm text-gray-500 truncate">
                            {{ auth()->user()->email }}
                        </span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        @if (auth()->user()->role == 'user')
                            <li>
                                <a href="{{ route('user.dashboard.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'facilitator')
                            <li>
                                <a href="{{ route('facilitator.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'admin')
                            <li>
                                <a href="{{ route('admin.dashboard.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'user')
                            <li>
                                <a href="{{ route('user.profile.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'facilitator')
                            <li>
                                <a href="{{ route('facilitator.profile.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center text-sm text-black hover:text-gray-700">
                    Masuk
                </a>
                {{-- <a href="{{ route('register') }}"
                    class="text-white bg-primary hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-full text-sm px-4 py-3 text-center mr-3 md:mr-0">Daftar
                    Sekarang</a> --}}
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            @endguest
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-normal text-sm p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-12 md:mt-0 md:border-0">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 text-gray-500 hover:bg-gray-50 rounded md:bg-transparent md:p-0 {{ request()->is('/') ? 'md:text-primary' : 'md:text-gray-900' }}"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('course.index') }}"
                        class="block py-2 pl-3 pr-4 text-gray-500 hover:bg-gray-50 rounded md:bg-transparent md:p-0 {{ request()->routeIs('course.index') || request()->routeIs('course.show')
                            ? 'md:text-primary'
                            : 'md:text-gray-900' }}">Kursus</a>
                </li>
                <li>
                    <a href="{{ route('user.help.index') }}"
                        class="block py-2 pl-3 pr-4 text-gray-500 hover:bg-gray-50 rounded md:bg-transparent md:p-0 {{ request()->routeIs('user.help.index') ? 'md:text-primary' : 'md:text-gray-900' }}">
                        Bantuan
                    </a>
                </li>
                <li>
                    <a href="{{ route('carier.index') }}"
                        class="block py-2 pl-3 pr-4 text-gray-500 hover:bg-gray-50 rounded md:bg-transparent md:p-0 {{ request()->routeIs('carier.index') ? 'md:text-primary' : 'md:text-gray-900' }}">
                        Karir
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
