<x-guest-layout>
    <div
        class="grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-3 gap-8 max-w-7xl mx-auto py-6 sm:py-12 lg:py-12 px-7 sm:px-6 lg:px-8">
        {{-- Course Material --}}
        <div class="col-span-1 hidden xl:block">
            <div id="course-material" class="w-100 h-fit bg-white  rounded-lg p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">{{ $course->name }}</p>
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
                                                @if ($chapter->is_finished) href="{{ route('facilitator.learn.chapter', [$playlist->id, $chapter->id]) }}" @endif>{{ $chapter->title }}</a>
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
                                                @if (
                                                    $playlist->quiz->is_finished ||
                                                        // check if all chapter in playlist is finished
                                                        $playlist->chapters->where('is_finished', false)->count() == 0) href="{{ route('facilitator.learn.quiz', [$playlist->id, $playlist->quiz->id]) }}" @endif>
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

            <div class="mt-12">
                <h3 class="mb-3">
                    <span class="font-bold text-lg">Komentar</span>
                    <span class="text-sm text-gray-500">({{ $reviews->count() }})</span>
                </h3>
                @if (!$reviews->where('user_id', auth()->user()->id)->first())
                    <x-select label="Rating" name="rating" id="rating" class="w-1/2 mt-4">
                        <option value="1">(1) ⭐</option>
                        <option value="2">(2) ⭐⭐</option>
                        <option value="3">(3) ⭐⭐⭐</option>
                        <option value="4">(4) ⭐⭐⭐⭐</option>
                        <option value="5">(5) ⭐⭐⭐⭐⭐</option>
                    </x-select>
                    <textarea type="text" name="comment" id="comment" rows="3"
                        class="w-full mt-4 py-2 px-4 border text-xs 2xl:text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-[#757575]"
                        placeholder="Jadilah yang pertama berkomentar"></textarea>
                    <div class="mt-4">
                        <x-button text="Kirim" id="submit-comment" />
                    </div>
                @endif
            </div>


            {{-- Testimonial Comment --}}
            @forelse ($reviews->take(10) as $review)
                <div class="bg-white mt-6 rounded-lg py-2 px-6 h-fit">
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
                                    {{ $review->created_at->locale('id')->diffForHumans() }}
                                </div>
                            </div>
                        </figcaption>
                        <p class="font-normal text-sm text-black mt-4">
                            {{ $review->content }}
                        </p>
                        @for ($i = 1; $i <= $review->rating; $i++)
                            <ion-icon name="star" class="w-4 h-4 mt-4 text-yellow-500"></ion-icon>
                        @endfor
                    </div>
                </div>
            @empty
                <div class="bg-white mt-6 rounded-lg py-2 px-6 h-fit">
                    <p class="text-sm text-gray-500">Belum ada komentar</p>
                </div>
            @endforelse
        </div>
    </div>

    @push('js-internal')
        <script>
            let tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";

            let firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            let player;
            let playTime = 0;

            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    videoId: '{{ $videoId }}',
                    host: 'https://www.youtube-nocookie.com',
                    playerVars: {
                        controls: 1, // Hide all controls
                        showinfo: 0, // Hide video title and player actions (deprecated but still works)
                        modestbranding: 1, // Show a smaller YouTube logo without the YouTube text
                        loop: 0, // Don't loop when complete
                        fs: 1, // Enable fullscreen button
                        iv_load_policy: 3, // Do not show video annotations
                        cc_load_policy: 0, // Do not show closed captions by default
                        autohide: 1, // Autohide video controls when not in use
                        rel: 0, // Do not show related videos at the end
                        enablejsapi: 1, // Enable the JavaScript API
                        disablekb: 1 // Disable keyboard controls
                    },
                    events: {
                        'onStateChange': onPlayerStateChange,
                    }
                });

                // count play time
                setInterval(() => {
                    if (player.getPlayerState() == 1) {
                        playTime++;
                    }
                }, 1000);
            }

            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.ENDED) {
                    player.stopVideo();
                    let url = '{{ route('facilitator.learn.complete', [':playlist_id', ':chapter_id', ':play_time']) }}';
                    url = url.replace(':playlist_id', '{{ $playlist_id }}');
                    url = url.replace(':chapter_id', '{{ $chapter_id }}');
                    url = url.replace(':play_time', JSON.stringify(playTime));

                    window.location.href = url;
                }
            }

            // submit comment
            $('#submit-comment').click(function() {
                let url = '{{ route('facilitator.learn.comment', [':playlist_id', ':chapter_id']) }}';
                url = url.replace(':playlist_id', '{{ $playlist_id }}');
                url = url.replace(':chapter_id', '{{ $chapter_id }}');

                let rating = $('#rating').val();
                let comment = $('#comment').val();

                // check rating and comment is not empty
                if (rating == '' || comment == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Rating dan komentar tidak boleh kosong!',
                    });

                    return;
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        rating: rating,
                        comment: comment
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                            });
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
</x-guest-layout>
