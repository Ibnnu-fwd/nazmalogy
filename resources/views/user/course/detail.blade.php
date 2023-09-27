<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 xl:px-0 py-12 gap-8">

        <div class="max-w-2xl">
            {{-- Title --}}
            <p class="text-xs 2xl:text-sm font-medium text-orange-500  mb-2">
                Detail Kursus
            </p>
            <h1 class="mb-2 text-4xl font-bold tracking-tighter leading-snug md:text-4xl xl:text-4xl ">
                {{ ucwords($course->name) }}
            </h1>
        </div>

        {{-- Author --}}
        <figcaption class="relative flex items-center gap-x-3 mt-5">
            <img alt=""
                src="{{ $course->author->avatar ? asset('storage/avatar/' . $course->author->avatar) : asset('assets/noimage.svg') }}"
                decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full" loading="lazy"
                style="color: transparent" />
            <div>
                <div class="text-xs 2xl:text-sm font-semibold text-black">
                    {{ $course->author->fullname }}
                </div>
                <div class="text-xs 2xl:text-sm text-gray-500">
                    {{ $course->author->email }}
                </div>
            </div>
        </figcaption>

        {{-- Detail --}}
        <div class="mr-auto place-self-center grid grid-cols-2 md:flex items-center mt-5">
            <div class="flex items-center md:items-end space-x-2 mt-2 mr-4">
                <ion-icon name="star" class="text-[#F9AE13] md:w-6 md:h-6"></ion-icon>
                <p class="text-md font-bold text-black">
                    {{ // show in format 1.0
                        number_format($course->total_rating, 1, ',', '.') }}
                </p>
                <p class="text-gray-500 text-xs 2xl:text-sm">({{ $course->review_count }} Reviews)</p>
            </div>
            <div>
                <div class="flex items-center space-x-2 mt-2 ml-5 mr-4">
                    <ion-icon name="book-outline" class="text-gray-500"></ion-icon>
                    <p class="text-sm text-black">{{ $course->lesson_count }} Materi</p>
                </div>
            </div>
            <div class="flex items-center space-x-2 mt-2 md:ml-5 mr-4">
                <ion-icon name="document-text-outline" class="text-gray-500"></ion-icon>
                <p class="text-sm text-black">{{ $course->quiz_count }} Kuis</p>
            </div>
            <div class="flex items-center space-x-2 mt-2 ml-5 mr-4">
                <ion-icon name="time-outline" class="text-gray-500"></ion-icon>
                <p class="text-sm text-black">
                    {{ $course->duration }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 mt-8 md:mt-12">
            <div class="rounded-lg w-full col-span-2">
                {{-- Video Player --}}
                @php
                    $video_url = $course->playlists->first()->chapters->first()->video_url;
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

                <iframe src="{{ $video_url }}?controls=0&rel=0&showinfo=0" frameborder="0" allowfullscreen
                    class="rounded-2xl w-full aspect-video"></iframe>


                {{-- Course Detail --}}
                <div>
                    <p class="font-bold text-xl mt-9">Tentang Kursus Ini</p>
                    <p class="font-normal text-sm 2xl:text-sm max-w-3xl mt-5 leading-7">
                        {{ $course->description }}
                    </p>
                </div>

                <div>
                    <p class="font-bold text-xl mt-9">Daftar Materi</p>
                    <section>
                        @foreach ($course->playlists as $playlist)
                            <div data-accordion="open" class="mt-{{ $loop->first ? '4' : '4' }} mx-4 md:mx-0">
                                <h2 class="rounded-lg mb-3 bg-white">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 text-left rounded-lg text-black font-medium focus:ring-4 focus:ring-gray-300"
                                        data-accordion-target="#accordion-arrow-icon-body-{{ $playlist->id }}"
                                        aria-expanded="false"
                                        aria-controls="accordion-arrow-icon-body-{{ $playlist->id }}">
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xs 2xl:text-sm">
                                                {{ $loop->iteration . '.' }}
                                            </span>
                                            <span class="text-sm">
                                                {{ ucwords($playlist->title) }}
                                            </span>
                                        </div>
                                        <span class="text-xs 2xl:text-sm">
                                            {{ $playlist->chapters->count() . ' materi' }}
                                        </span>
                                    </button>
                                </h2>
                                <div id="accordion-arrow-icon-body-{{ $playlist->id }}" class="hidden mb-4"
                                    aria-labelledby="accordion-arrow-icon-heading">
                                    <div class="p-5 bg-white rounded-lg space-y-4">
                                        @foreach ($playlist->chapters as $chapter)
                                            <div class="flex justify-between items-center text-xs 2xl:text-sm">
                                                <div class="flex items-center space-x-2">
                                                    <ion-icon name="play-circle"
                                                        class="text-gray-500 w-5 h-5"></ion-icon>
                                                    <span class="text-sm">
                                                        {{ ucwords($chapter->title) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>
                                                        {{ \Carbon\CarbonInterval::seconds($chapter->duration)->cascade()->locale('id')->forHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (isset($playlist->quiz))
                                            <div class="flex justify-between items-center text-xs 2xl:text-sm">
                                                <div class="flex items-center space-x-2">
                                                    <ion-icon name="play-circle"
                                                        class="text-gray-500 w-5 h-5"></ion-icon>
                                                    <span class="text-sm">
                                                        {{ ucwords($playlist->quiz->title) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>
                                                        {{ $playlist->quiz->questions->count() }} Soal
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>

            </div>
            {{-- Detail Course --}}
            <div id="detail-course" class="w-full justify-center mx-auto max-w-md h-fit bg-white rounded-lg p-6">

                <ul role="list" class="space-y-5">
                    <li class="flex space-x-3">
                        <ion-icon name="flag-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm xl:text-sm font-normal leading-tight text-black">
                            {{ $course->language }}
                        </span>
                    </li>
                    <li class="flex space-x-3">
                        <ion-icon name="podium-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm xl:text-sm  font-normal leading-tight text-black">
                            {{ $course->level == 'beginner' ? 'Pemula' : ($course->level == 'intermediate' ? 'Menengah' : 'Lanjutan') }}
                        </span>
                    </li>
                    <li class="flex space-x-3 decoration-black">
                        <ion-icon name="phone-portrait-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Akses di
                            Perangkat
                            Apapun</span>
                    </li>
                    <li class="flex space-x-3 decoration-black">
                        <ion-icon name="layers-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Soal latihan
                            dan
                            kuis</span>
                    </li>
                    <li class="flex space-x-3 decoration-black">
                        <ion-icon name="flash-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Akses
                            Selamanya</span>
                    </li>
                    <li class="flex space-x-3 decoration-black">
                        <ion-icon name="ribbon-outline" class="text-[#2B3176]"></ion-icon>
                        <span class="text-sm md:text-sm  xl:text-sm  font-normal leading-tight text-black">Sertifikat
                            Lulus</span>
                    </li>
                </ul>
                @if ($course->discount)
                    <p class="text-base md:text-lg text-danger animate-pulse line-through mt-6 md:mt-12">
                        Rp.{{ number_format($course->price, 0, ',', '.') }}
                    </p>
                    <p class="text-black text-xl md:text-2xl font-bold">
                        Rp.{{ number_format($course->discount, 0, ',', '.') }}
                    </p>
                @else
                    <p class="text-black text-xl md:text-2xl font-bold mt-12">
                        Rp.{{ number_format($course->price, 0, ',', '.') }}
                    </p>
                @endif
                @guest
                    <button type="button" onclick="checkLogin()"
                        class="text-white bg-[#2B3176] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 mt-6 py-4 inline-flex justify-center w-full text-center">
                        Daftar Sekarang
                    </button>
                @endguest

                @auth
                    @if ($isBought)
                        <a href="{{ route('user.dashboard.index') }}"
                            class="text-white bg-[#2B3176] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 mt-6 py-4 inline-flex justify-center w-full text-center">
                            Mulai Kursus
                        </a>
                    @else
                        <button type="button" onclick="checkLogin()"
                            class="text-white bg-[#2B3176] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 mt-6 py-4 inline-flex justify-center w-full text-center">
                            Daftar Sekarang
                        </button>
                    @endif
                @endauth
            </div>
        </div>

        {{-- Testimonial --}}
        <section>
            <div class="flex flex-col justify-center flex-1 px-4 py-8 mx-auto lg:py-12 lg:flex-none max-w-7xl">
                <div class="text-center">
                    <p class="text-orange-500 font-medium text-xs 2xl:text-sm">
                        Testimoni
                    </p>
                    <p
                        class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug max-w-md mx-auto mt-3">
                        Jadi Bagian <br>
                        Dari NaZMalogy
                    </p>
                </div>
                <ul role="list"
                    class="grid max-w-2xl grid-cols-1 gap-6 mx-auto sm:gap-8 lg:max-w-none lg:grid-cols-3 mt-14">
                    @foreach ($course->reviews as $review)
                        <li>
                            <figure class="relative h-full p-6 bg-white rounded-3xl">
                                <figcaption class="relative flex items-center gap-x-3 mb-6">
                                    <img alt=""
                                        src="{{ $review->user->avatar ? asset('storage/avatar/' . $review->user->avatar) : asset('assets/noimage.svg') }}"
                                        decoding="async" data-nimg="future"
                                        class="object-cover h-14 w-14 rounded-full" loading="lazy"
                                        style="color: transparent" />
                                    <div>
                                        <div class="text-xs 2xl:text-sm font-semibold text-black">
                                            {{ $review->user->fullname }}
                                        </div>
                                        <div class="text-xs 2xl:text-sm text-gray-500">
                                            {{ $review->user->email }}
                                        </div>
                                    </div>
                                </figcaption>
                                <blockquote class="relative">
                                    <p class="text-xs 2xl:text-sm text-black">
                                        {{ $review->content }}
                                    </p>
                                </blockquote>
                                <div class="mt-3 flex items-center gap-x-0">
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        <ion-icon name="star" class="w-4 h-4 text-yellow-500"></ion-icon>
                                    @endfor
                                </div>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        @push('js-internal')
            <script>
                function checkLogin() {
                    // check if user logged in, if not, redirect to login page
                    @auth
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan mendaftar kursus ini",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, daftar',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                            if (result.isConfirmed) {
                                let url = '';
                                @auth
                                @if (auth()->user()->role == 'user')
                                    url = '{{ route('user.transaction.store') }}';
                                @elseif (auth()->user()->role == 'facilitator')
                                    url = '{{ route('facilitator.transaction-member.store') }}';
                                @endif
                            @endauth
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    course_id: "{{ $course->id }}",
                                    user_id: "{{ Auth::user()->id }}",
                                    price: "{{ $course->discount ? $course->discount : $course->price }}",
                                    sub_total: "{{ $course->discount ? $course->discount : $course->price }}",
                                    total_payment: "{{ $course->discount ? $course->discount : $course->price }}",
                                },
                                success: function(response) {
                                    if (response.status) {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: "Anda berhasil mendaftar kursus ini, silahkan unggah bukti pembayaran untuk memulai kursus",
                                            icon: 'success',
                                            confirmButtonColor: '#2B3176',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = response.redirect
                                            }
                                        })
                                    }
                                },
                            });
                        }
                    })
                @else
                    Swal.fire({
                        title: 'Anda belum login',
                        text: "Silahkan login terlebih dahulu untuk mengakses kursus ini",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2B3176',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Login',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}"
                        }
                    })
                @endauth
                }
            </script>
        @endpush
</x-guest-layout>
