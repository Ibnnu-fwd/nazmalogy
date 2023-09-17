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
                                            class="flex rounded-lg items-center {{ $chapter->id == $chapter_id ? 'bg-gray-100' : 'bg-white' }} justify-start text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($chapter->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <a
                                                @if ($chapter->is_finished) href="{{ route('user.learn.chapter', [$playlist->id, $chapter->id]) }}" @endif>{{ $chapter->title }}</a>
                                        </div>
                                    @endforeach

                                    @if ($playlist->quiz != null)
                                        <div
                                            class="flex items-center justify-start text-xs 2xl:text-sm gap-x-3 py-2 px-4">
                                            @if ($playlist->quiz->is_finished)
                                                <ion-icon name="checkmark-circle"
                                                    class="w-5 h-5 text-primary"></ion-icon>
                                            @else
                                                <ion-icon name="radio-button-off"
                                                    class="w-5 h-5 text-gray-400"></ion-icon>
                                            @endif
                                            <a
                                                @if ($playlist->quiz->is_finished) href="{{ route('user.learn.quiz', [$playlist->id, $playlist->quiz->id]) }}" @endif>
                                                {{ $playlist->quiz->title }}
                                                ({{ $playlist->quiz->questions->count() }} Soal )
                                            </a>
                                        </div>
                                    @endif
                                    {{-- Akhir dari isi accordion --}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
            <a href="{{ route('generatePDF') }}"
                class="inline-flex items-center justify-center py-2 mt-5 mr-2  w-full text-xs 2xl:text-sm font-medium text-center text-white rounded-full bg-primary hover:bg-purple-800 focus:ring-4 focus:ring-orange-300">
                Cetak Sertifikat
            </a>
        </div>

        {{-- Video Player --}}
        <div class="col-span-2 lg:col-span-2">
            <div class="rounded-lg">
                @php
                    $video_url = $course->playlists
                        ->where('id', $playlist_id)
                        ->first()
                        ->chapters->where('id', $chapter_id)
                        ->first()->video_url;
                    $pattern = '/\?v=([a-zA-Z0-9_-]+)/';
                    preg_match($pattern, $video_url, $matches);
                    if (count($matches) > 1) {
                        $videoId = $matches[1];
                        // Hasilnya adalah ID video YouTube
                        $video_url = 'https://www.youtube.com/embed/' . $videoId;
                    } else {
                        echo 'Tautan YouTube tidak valid.';
                    }
                @endphp

                <div id="player" class="w-full h-[480px] rounded-xl "></div>
            </div>

            {{-- About Course --}}
            <div class="mt-6">
                <p class="font-bold text-lg lg:mt-8">Tentang Kursus Ini</p>
                <p class="font-normal mt-4 text-sm max-w-xl leading-7">
                    {{ $course->playlists->where('id', $playlist_id)->first()->chapters->where('id', $chapter_id)->first()->description }}
                </p>
            </div>

            <textarea type="text" name="comment" id="comment" rows="3"
                class="w-full mt-4 py-2 px-4 border text-xs 2xl:text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-[#757575]"
                placeholder="Jadilah yang pertama berkomentar"></textarea>


            {{-- Testimonial Comment --}}
            <div class="bg-white mt-6 rounded-lg p-6">
                @forelse ($chapter->reviews as $review)
                    <div>
                        <figcaption class="relative flex items-center gap-x-3 mt-5">
                            <img alt=""
                                src="{{ $review->user->avatar ? asset('storage/avatar/' . $review->user->avatar) : asset('assets/noimage.svg') }}"
                                decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full"
                                loading="lazy" style="color: transparent" />
                            <div>
                                <div class="text-xs 2xl:text-sm font-semibold text-black">
                                    {{ $review->user->fullname }}
                                </div>
                                <div class="text-xs 2xl:text-sm text-gray-500">
                                    {{ \Carbon::parse($review->created_at)->locale('id')->diffForHumans() }}
                                </div>
                            </div>
                        </figcaption>
                        <p class="font-normal text-sm text-black mt-4">
                            {{ $review->content }}
                        </p>
                        @for ($i = 1; $i <= $review->rating; $i++)
                            <ion-icon name="star" class="w-7 h-7 mt-4 text-yellow-500"></ion-icon>
                        @endfor
                    </div>
                @empty
                    <p class="text-sm text-center">Belum ada komentar</p>
                @endforelse
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            let tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";

            let firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            let player;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    videoId: '{{ $videoId }}',
                    host: 'https://www.youtube-nocookie.com',
                    playerVars: {
                        'mute': 1,
                        'autoplay': 1,
                        'controls': 0,
                        'disablekb': 1,
                        'modestbranding': 1,
                        'rel': 0,
                        'showinfo': 0,
                        'fs': 1,
                        'enablejsapi': 1,
                    },
                    events: {
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.ENDED) {
                    // set autoplay to false
                    player.stopVideo();
                    window.location.href = '{{ route('user.learn.complete', [$playlist_id, $chapter_id]) }}';
                }
            }
        </script>
    @endpush
</x-guest-layout>
