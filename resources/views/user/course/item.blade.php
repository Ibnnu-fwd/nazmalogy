@if (count($courses) > 0)
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
                        <ion-icon name="star" class="text-[#F3AB1D] rounded mr-1 w-[12] h-[12]"></ion-icon>
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
                            <ion-icon name="checkmark-circle" class="text-purple-500 text-xl ml-2"></ion-icon>
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach
@else
    <div class="h-fit">
        <img src="{{ asset('assets/ilustration_big/course_not_found.png') }}" alt="No Courses Available">
        <p class="text-dark text-lg mt-4">Tidak ada kursus yang tersedia saat ini.</p>
    </div>
@endif
