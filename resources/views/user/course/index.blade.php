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
                @foreach ($courseCategories as $category)
                    <div class="flex items-center mb-3">
                        <input id="category-{{ $category->id }}" type="checkbox" name="category[]"
                            value="{{ $category->id }}"
                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                        <label for="category-{{ $category->id }}" class="ml-2 text-sm font-normal text-gray-900">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach


                <h3 class="text-xs 2xl:text-sm font-semibold mb-4">
                    Jenis Kursus
                </h3>
                <div class="flex items-center mb-3">
                    <input id="premium" type="radio" name="type" value="premium"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                    <label for="premium" class="ml-2 text-sm font-normal text-gray-900">
                        Premium
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="free" type="radio" name="type" value="free"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                    <label for="free" class="ml-2 text-sm font-normal text-gray-900">
                        Free
                    </label>
                </div>

                <h3 class="text-xs 2xl:text-sm font-semibold mb-4">
                    Harga
                </h3>
                <div class="flex items-center mb-3">
                    <input id="cheap" type="radio" name="range" value="cheap"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                    <label for="cheap" class="ml-2 text-sm font-normal text-gray-900">
                        Murah - Mahal
                    </label>
                </div>
                <div class="flex items-center mb-3">
                    <input id="exp" type="radio" name="range" value="exp"
                        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500">
                    <label for="exp" class="ml-2 text-sm font-normal text-gray-900">
                        Mahal - Murah
                    </label>
                </div>
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-3" id="course-list">
                    @foreach ($courses as $course)
                        <div class="max-w-sm bg-white rounded-xl border border-gray-100 h-fit">
                            <a href="{{ route('course.show', $course->slug) }}">
                                <img class="rounded-t-xl h-52 object-center object-cover w-full"
                                    src="{{ $course->thumbnail ? asset('storage/courses/' . $course->thumbnail) : asset('assets/noimage.svg') }}"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-x-2">
                                        <div class="w-2.5 h-2.5 rounded-full bg-primary"></div>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            {{ $course->courseCategory->name }}
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <ion-icon name="star"
                                            class="text-[#F3AB1D] rounded mr-1 w-[12] h-[12]"></ion-icon>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            <!-- ini belum dihitung -->
                                            (5.0)
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.show', $course->slug) }}">
                                    <h5
                                        class="mb-2 text-xs 2xl:text-md font-bold tracking-tight text-gray-900 line-clamp-2 hover:line-clamp-none">
                                        {{ ucwords($course->name) }}
                                    </h5>
                                </a>
                                <div class="flex items-end justify-between mt-4">
                                    <div>
                                        @if ($course->discount)
                                            <p class="text-xs 2xl:text-sm line-through text-danger animate-pulse">
                                                {{ 'Rp. ' . number_format($course->price, 0, ',', '.') }}
                                            </p>
                                            <p class="text-xs 2xl:text-md font-semibold">
                                                {{ 'Rp. ' . number_format($course->discount, 0, ',', '.') }}
                                            </p>
                                        @else
                                            <p class="text-xs 2xl:text-md font-semibold">
                                                {{ 'Rp. ' . number_format($course->price, 0, ',', '.') }}
                                            </p>
                                        @endif
                                    </div>
                                    <p class="text-gray-400 text-xs 2xl:text-tiny">
                                        {{ $course->transactions->count() }} peserta
                                    </p>
                                </div>
                                @auth
                                    @if ($course->is_bought)
                                        <a
                                            class="bg-gray-100 text-gray-800 text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300 flex items-center w-fit mt-6">
                                            Diikuti
                                            <ion-icon name="checkmark-circle"
                                                class="text-purple-500 text-xl ml-2"></ion-icon>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
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

            $(function() {
                let categories = [];
                let type;
                let range;

                $('input[name="category[]"]').on('change', function() {
                    // remove range checkbox
                    $('input[name="range"]').prop('checked', false);
                    if ($(this).is(':checked')) {
                        categories.push($(this).val());
                    } else {
                        categories.splice(categories.indexOf($(this).val()), 1);
                    }

                    $.ajax({
                        url: "{{ route('course.filter') }}",
                        method: 'GET',
                        data: {
                            categories: categories,
                            type: type,
                            range: range
                        },
                        success: function(data) {
                            $('#course-list').html(data);
                        }
                    })
                })

                $('input[name="type"]').on('change', function() {
                    type = $(this).val();

                    $.ajax({
                        url: "{{ route('course.filter') }}",
                        method: 'GET',
                        data: {
                            categories: categories,
                            type: type,
                            range: range
                        },
                        success: function(data) {
                            $('#course-list').html(data);
                        }
                    })
                })

                $('input[name="range"]').on('change', function() {
                    range = $(this).val();

                    // remove checked in type
                    $('input[name="type"]').prop('checked', false);

                    $.ajax({
                        url: "{{ route('course.filter') }}",
                        method: 'GET',
                        data: {
                            categories: categories,
                            type: type,
                            range: range
                        },
                        success: function(data) {
                            $('#course-list').html(data);
                        }
                    })
                })


            });
        </script>
    @endpush
</x-guest-layout>
