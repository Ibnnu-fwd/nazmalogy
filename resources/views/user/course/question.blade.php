<x-guest-layout>
    <div
        class="grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-8 max-w-7xl mx-auto py-6 sm:py-12 lg:py-24 px-7 sm:px-6 lg:px-8">
        {{-- Course Material --}}
        <div class="col-span-1 hidden xl:block">
            <div id="course-material" class="w-100 h-fit bg-white  rounded-lg p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">{{ $course->lesson_count }} Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 text-black">
                    <div id="accordion-collapse" data-accordion="collapse">
                        @foreach ($course->playlists as $key => $playlist)
                            <h2 id="accordion-collapse-heading-{{ $key + 1 }}">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-3 px-5 font-medium text-left border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 focus:text-black rounded-lg mb-4"
                                    data-accordion-target="#accordion-collapse-body-{{ $key + 1 }}"
                                    aria-expanded="{{ $playlist->id == $playlist_id ? 'true' : 'false' }}"
                                    aria-controls="accordion-collapse-body-{{ $key + 1 }}">
                                    <span>{{ $playlist->title }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-{{ $key + 1 }}"
                                class="{{ $playlist->id == $playlist_id ? 'block' : 'hidden' }}"
                                aria-labelledby="accordion-collapse-heading-{{ $key + 1 }}">
                                <div class="p-2 border border-b-1 border-gray-200 rounded-lg mb-4">
                                    {{-- Isi accordion disini --}}
                                    @foreach ($playlist->chapters as $chapter)
                                        <div
                                            class="flex rounded-lg items-center bg-white justify-start text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($chapter->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <a
                                                @if ($chapter->is_finished) href="{{ route('user.learn.chapter', [$playlist->id, $chapter->id]) }}" @endif>{{ $chapter->title }}
                                            </a>
                                        </div>
                                    @endforeach

                                    @if ($playlist->quiz != null)
                                        <div
                                            class="rounded-lg flex items-center justify-start {{ $playlist->quiz->id == $quiz_id ? 'bg-gray-100' : 'bg-white' }} text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($playlist->quiz->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <span>
                                                {{ $playlist->quiz->title }}
                                                ({{ $playlist->quiz->questions->count() }} Soal )
                                            </span>
                                        </div>
                                    @endif
                                    {{-- Akhir dari isi accordion --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Question --}}
        <div class="col-span-2 bg-white rounded-xl p-6 h-fit">
            @if (session()->get('errors'))
                <div class="bg-red-100 text-xs 2xl:text-sm border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">
                        Jawaban Anda Salah!
                    </strong>
                    <p>
                        Perhatikan kembali jawaban Anda. Berikut adalah jawaban yang salah:
                    </p>
                    {{-- list all incorect answer --}}
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error => $value)
                            {{-- show index --}}
                            <li>
                                {{ $value }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 class="font-semibold text-lg">
                Selamat Mengerjakan!
            </h3>
            <div class="text-xs 2xl:text-sm mt-4 text-gray-500">
                <p>
                    {{ $quiz->title }}
                </p>
                <p>
                    {{ $quiz->description }}
                </p>
            </div>
            <form action="{{ route('user.learn.answer', [$playlist_id, $quiz_id]) }}" method="POST">
                @csrf
                @foreach ($questions as $question)
                    <div class="mb-6">
                        <div class="text-black text-xs 2xl:text-sm mt-5" id="question-{{ $question->id }}">
                            <p class="font-normal text-sm text-black">
                                {{ $question->description }}
                            </p>
                            <div class="mt-7 text-black text-sm">
                                @foreach (['A', 'B', 'C', 'D'] as $option)
                                    <label for="{{ $question->id }}_{{ $option }}"
                                        class="flex items-center cursor-pointer mt-3">
                                        <input type="radio" id="{{ $question->id }}_{{ $option }}"
                                            name="question_{{ $question->id }}" value="{{ $option }}"
                                            class="hidden peer" required>
                                        <div
                                            class="w-8 h-8 border border-gray-400 rounded-lg flex items-center justify-center mr-4 peer-checked:bg-blue-900 peer-checked:text-white">
                                            <span>{{ $option }}</span>
                                        </div>
                                        <div class="flex-1">
                                            @if ($option === 'A')
                                                {{ $question->option_1 }}
                                            @elseif ($option === 'B')
                                                {{ $question->option_2 }}
                                            @elseif ($option === 'C')
                                                {{ $question->option_3 }}
                                            @else
                                                {{ $question->option_4 }}
                                            @endif
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-8">
                    <x-button type="submit" text="Kirim Jawaban" />
                </div>
            </form>
        </div>
    </div>

    @push('js-internal')
        <script></script>
    @endpush
</x-guest-layout>
