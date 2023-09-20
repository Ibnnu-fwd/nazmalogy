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
                    <input type="text" id="search"
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
                   
                    
                </div>
            </div>
        </div>
    </section>

    @push('js-internal')
        <script>
            const search = document.getElementById('search');
            const course = document.querySelectorAll('.max-w-sm');

            search.addEventListener('keyup', function(e) {
                const query = e.target.value.toLowerCase();

                course.forEach(course => {
                    const name = course.querySelector('h5').innerText.toLowerCase();
                    const category = course.querySelector('.text-xs').innerText.toLowerCase();

                    if (name.includes(query) || category.includes(query)) {
                        course.style.display = 'block';
                    } else {
                        course.style.display = 'none';
                    }
                })
            })

        </script>
    @endpush
</x-guest-layout>
