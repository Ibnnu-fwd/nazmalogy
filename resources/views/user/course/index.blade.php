<x-guest-layout>
    <section class="">
        <div class="mx-auto px-4 py-8 lg:py-12 max-w-7xl">
            <div class="max-w-xl">
                <span class="font-medium text-orange-600">
                    Upgrade skill anda
                </span>
                <div class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug mt-3">
                    Kursus Populer
                </div>
                <p class="text-gray-500 mt-3 text-xs 2xl:text-sm">
                    Mempelajari Design untuk membangun projek website atau mobile app dari dasar sampai tingkat atas
                    bersama mentor berpengalaman di NaZMalogy.
                </p>
            </div>
        </div>
        <div class="mx-auto px-4 mb-12 max-w-7xl grid grid-cols-1 gap-y-6 lg:gap-6 lg:grid-cols-4">
            <div class="bg-white rounded-xl p-4 h-fit">
                <div class="mb-6">
                    <input type="text" id="default-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-xl focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5"
                        placeholder="Cari">
                </div>

                <h3 class="text-xs 2xl:text-sm font-semibold mb-4">
                    Kategori
                </h3>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Bisnis
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        E-Business
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Marketing
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Manajemen Proyek
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Entrepreneurship
                    </label>
                </div>


                <h3 class="text-xs 2xl:text-sm font-semibold mb-4">
                    Jenis Kursus
                </h3>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Premium
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Gratis
                    </label>
                </div>

                <h3 class="text-xs 2xl:text-sm font-semibold mb-4">
                    Harga
                </h3>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Murah - Mahal
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="default-checkbox" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-normal text-gray-900">
                        Mahal - Murah
                    </label>
                </div>
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-3">

                    @for ($i = 1; $i <= 8; $i++)
                        <div class="max-w-sm bg-white rounded-xl border border-gray-100">
                            <a>
                                <img class="rounded-t-xl h-40 object-center object-cover w-full"
                                    src="{{ asset('assets/noimage.svg') }}" alt="" />
                            </a>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-x-2">
                                        <div class="w-2.5 h-2.5 rounded-full bg-primary"></div>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            E-Bussiness
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <ion-icon name="star"
                                            class="text-[#F3AB1D] rounded mr-1 w-[12] h-[12]"></ion-icon>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            (5.0)
                                        </span>
                                    </div>
                                </div>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-xs 2xl:text-md font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2 hover:line-clamp-none">
                                        Mengenal Project Network Planning
                                    </h5>
                                </a>
                                <div class="flex items-end justify-between mt-4">
                                    <div>
                                        <p class="text-xs 2xl:text-sm line-through text-danger">Rp. 500.000</p>
                                        <p class="text-xs 2xl:text-md font-semibold">Rp. 75.000</p>
                                    </div>
                                    <p class="text-gray-400 text-xs 2xl:text-sm flex items-center">
                                        <ion-icon name="person-circle-outline"
                                            class="text-gray-400 mr-1 w-4 h-4"></ion-icon>
                                        <span>125</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
