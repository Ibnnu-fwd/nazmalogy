<x-app-layout>
    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => null]]" />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-6">
        @foreach ($courses as $course)
            <div class="w-96 rounded-xl shadow-md p-5 border border-gray-50 bg-white">
                <p class="text-gray-700 text-xs 2xl:text-sm font-bold">
                    {{ $course->name }}
                </p>
                <div class="w-full bg-gray-200 rounded-full h-1.5 mt-4">
                    <div class="bg-primary h-1.5 rounded-full" style="width: {{ $course->progressPercentage }}%"></div>
                </div>

                <p class="text-gray-500 text-xs 2xl:text-tiny mt-2">
                    {{ $course->progressPercentage }}% Complete
                </p>

                <div class="flex items-center justify-between text-tiny mt-3 text-gray-500">
                    <p>
                        Materi
                    </p>
                    <p>
                        Status
                    </p>
                </div>

                <div class="text-xs 2xl:text-tiny mt-2 text-gray-600">
                    @foreach ($course->playlists as $index => $playlist)
                        <div class="mb-2">
                            <div class="border rounded-lg">
                                <button
                                    class="w-full text-left px-4 py-2 font-semibold hover:bg-gray-50 focus:outline-none"
                                    onclick="toggleAccordion('{{ $playlist->id }}')">
                                    {{ $playlist->title }}
                                </button>
                                <div id="{{ $playlist->id }}" class="hidden px-4 py-2"
                                    style="display: {{ $loop->iteration === 1 ? 'block' : '' }}">
                                    @foreach ($playlist->chapters as $chapter)
                                        <div class="flex items-center justify-between text-tiny">
                                            <span>{{ $chapter->title }}</span>
                                            @if ($chapter->is_finished)
                                                <ion-icon name="checkmark-circle" class="text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off" class="text-gray-400"></ion-icon>
                                            @endif
                                        </div>
                                    @endforeach

                                    @if ($playlist->quiz != null)
                                        <div class="flex items-center justify-between text-tiny">
                                            <span>{{ $playlist->quiz->title }}
                                                ({{ $playlist->quiz->questions->count() }} Soal)
                                            </span>
                                            @if ($playlist->quiz->is_finished)
                                                <ion-icon name="checkmark-circle" class="text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off" class="text-gray-400"></ion-icon>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        @endforeach
    </div>

    @push('js-internal')
        <script>
            function toggleAccordion(playlistId) {
                const accordion = document.getElementById(playlistId);

                // Get all accordions with class 'hidden' and hide them
                const hiddenAccordions = document.querySelectorAll(".hidden");
                hiddenAccordions.forEach((acc) => {
                    acc.style.display = "none";
                });

                // Toggle the current accordion
                if (accordion.style.display === "block") {
                    accordion.style.display = "none";
                } else {
                    accordion.style.display = "block";
                }
            }

            @if (Session::has('finish'))
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat!',
                    text: '{{ Session::get('finish') }}',
                });
            @endif
        </script>
    @endpush
</x-app-layout>
