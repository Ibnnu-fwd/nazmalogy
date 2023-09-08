<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 sm:grid-cols-3 xl:grid-cols-3 max-w-7xl mx-auto py-24 gap-8">
        {{-- Kiri --}}
        <div class="col-span-2">
            {{-- Title --}}
            <p class="text-xs 2xl:text-sm font-medium text-orange-500  mb-2">
                Detail Kursus
            </p>
            <h1 class="max-w-xl mb-2 text-4xl font-bold tracking-tighter leading-snug md:text-4xl xl:text-4xl ">
                Mengenal Project Network
                Planning
            </h1>

            {{-- Author --}}
            <figcaption class="relative flex items-center gap-x-3 mt-5">
                <img alt=""
                    src="https://images.unsplash.com/photo-1577202214328-c04b77cefb5d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2073&amp;q=80"
                    decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full" loading="lazy"
                    style="color: transparent" />
                <div>
                    <div class="text-xs 2xl:text-sm font-semibold text-black">
                        Jordan Pettersson
                    </div>
                    <div class="text-xs 2xl:text-sm text-gray-500">
                        Mahasiswa
                    </div>
                </div>
            </figcaption>

            {{-- Detail --}}
            <div class="mr-auto place-self-center lg:col-span-7 flex items-center mt-5">

                <div class="flex items-end space-x-2 mt-2 mr-4">
                    <ion-icon name="star" class="text-[#F9AE13] w-6 h-6"></ion-icon>
                    <p class="text-md font-bold text-black">5.0</p>
                    <p class="text-gray-500 text-xs 2xl:text-sm">(1.220 Reviews)</p>
                </div>
                <div>
                    <div class="flex items-center space-x-2 mt-2 ml-5 mr-4">
                        <ion-icon name="book-outline" class="text-gray-500"></ion-icon>
                        <p class="text-sm text-black">12 Materi</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 mt-2 ml-5 mr-4">
                    <ion-icon name="document-text-outline" class="text-gray-500"></ion-icon>
                    <p class="text-sm text-black">4 Kuis</p>
                </div>
                <div class="flex items-center space-x-2 mt-2 ml-5 mr-4">
                    <ion-icon name="time-outline" class="text-gray-500"></ion-icon>
                    <p class="text-sm text-black">12 Jam 30 Menit</p>
                </div>
            </div>


            {{-- Video Player --}}
            <div class="rounded-lg mt-8 w-full">
                <iframe
                    width="100%"
                    height="430"
                    src="https://www.youtube.com/embed/QQgIHQE5psA"
                    frameborder="0"
                    
                    allowfullscreen
                ></iframe>
            </div>
            


            {{-- Course Detail --}}
            <div>
                <p class="font-bold text-xl mt-9">Tentang Kursus Ini</p>
                <p class="font-normal text-sm 2xl:text-sm max-w-3xl mt-5 line-clamp-3 hover:line-clamp-none leading-7">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ab rerum dolore, neque aliquam alias, esse dignissimos odio impedit illo nobis. Assumenda minima ab porro reiciendis blanditiis deleniti maiores itaque veniam consequuntur quis cumque nisi ipsum fuga veritatis fugiat nihil, ullam iure rem possimus rerum omnis cupiditate amet. Modi, cumque!
                </p>
            </div>


            {{-- Course Materi --}}
            <div>
                <p class="font-bold text-xl mt-9">Daftar Materi</p>
                {{-- Faq --}}
                <section>
                    <div id="accordion-arrow-icon" data-accordion="open" class="mt-3 mx-4 md:mx-0">
                        <h2 id="accordion-arrow-icon-heading" class="rounded-lg mb-3 bg-white" data-aos="fade-up" data-aos-duration="1000">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 text-left rounded-lg text-black font-medium focus:ring-4 focus:ring-gray-300"
                                data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="false" aria-controls="accordion-arrow-icon-body">
                                <div class="flex items-center space-x-2">
                                    <ion-icon name="chevron-down-outline"></ion-icon>
                                    <span class="text-sm">Dasar-dasar Project Network Planning</span>
                                </div>
                                <ion-icon name="lock-closed-outline" data-accordion-icon class="shrink-0 -mr-0.5 w-5 h-5"></ion-icon>
                            </button>
                        </h2>
                        <div id="accordion-arrow-icon-body-1" class="hidden mb-4" aria-labelledby="accordion-arrow-icon-heading">
                            <div class="p-5 bg-white rounded-lg">
                                <p class="text-black text-xs 2xl:text-sm">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nemo sed eligendi veniam autem accusamus eos mollitia possimus obcaecati quia? Unde ad laborum, est rem aliquam natus facilis maxime laboriosam?
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div id="accordion-arrow-icon" data-accordion="open" class="mt-3 mx-4 md:mx-0">
                        <h2 id="accordion-arrow-icon-heading" class="rounded-lg mb-3 bg-white" data-aos="fade-up" data-aos-duration="1000">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 text-left rounded-lg text-black font-medium focus:ring-4 focus:ring-gray-300"
                                data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body">
                                <div class="flex items-center space-x-2">
                                    <ion-icon name="chevron-down-outline"></ion-icon>
                                    <span class="text-sm">Dasar-dasar Project Network Planning</span>
                                </div>
                                <ion-icon name="lock-closed-outline" data-accordion-icon class="shrink-0 -mr-0.5 w-5 h-5"></ion-icon>
                            </button>
                        </h2>
                        <div id="accordion-arrow-icon-body-2" class="hidden mb-4" aria-labelledby="accordion-arrow-icon-heading">
                            <div class="p-5 bg-white rounded-lg">
                                <p class="text-black text-xs 2xl:text-sm">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nemo sed eligendi veniam autem accusamus eos mollitia possimus obcaecati quia? Unde ad laborum, est rem aliquam natus facilis maxime laboriosam?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-arrow-icon" data-accordion="open" class="mt-3 mx-4 md:mx-0">
                        <h2 id="accordion-arrow-icon-heading" class="rounded-lg mb-3 bg-white" data-aos="fade-up" data-aos-duration="1000">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 text-left rounded-lg text-black font-medium focus:ring-4 focus:ring-gray-300"
                                data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false" aria-controls="accordion-arrow-icon-body">
                                <div class="flex items-center space-x-2">
                                    <ion-icon name="chevron-down-outline"></ion-icon>
                                    <span class="text-sm">Dasar-dasar Project Network Planning</span>
                                </div>
                                <ion-icon name="lock-closed-outline" data-accordion-icon class="shrink-0 -mr-0.5 w-5 h-5"></ion-icon>
                            </button>
                        </h2>
                        <div id="accordion-arrow-icon-body-3" class="hidden mb-4" aria-labelledby="accordion-arrow-icon-heading">
                            <div class="p-5 bg-white rounded-lg">
                                <p class="text-black text-xs 2xl:text-sm">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nemo sed eligendi veniam autem accusamus eos mollitia possimus obcaecati quia? Unde ad laborum, est rem aliquam natus facilis maxime laboriosam?
                                </p>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
        {{-- Benefit Course --}}
        <div id="detail-course" class="w-full max-w-md h-fit mt-8 sm:mt-72 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:shadow-md lg:shadow-lg">

            <ul role="list" class="space-y-5">
                <li class="flex space-x-3">
                    <ion-icon name="flag-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm xl:text-sm font-normal leading-tight text-black dark:text-gray-400">Indonesia</span>
                </li>
                <li class="flex space-x-3">
                    <ion-icon name="bar-chart-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm xl:text-sm  font-normal leading-tight text-black dark:text-gray-400">Pemula dan Menengah</span>
                </li>
                <li class="flex space-x-3 decoration-black">
                    <ion-icon name="phone-portrait-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Akses di Perangkat Apapun</span>
                </li>
                <li class="flex space-x-3 decoration-black">
                    <ion-icon name="layers-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Soal latihan dan kuis</span>
                </li>
                <li class="flex space-x-3 decoration-black">
                    <ion-icon name="flash-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm  xl:text-sm font-normal leading-tight text-black">Akses Selamanya</span>
                </li>
                <li class="flex space-x-3 decoration-black">
                    <ion-icon name="ribbon-outline" class="text-[#2B3176]"></ion-icon>
                    <span class="text-sm md:text-sm  xl:text-sm  font-normal leading-tight text-black">Sertifikat Lulus</span>
                </li>
            </ul>
            <p class="text-base md:text-lg text-danger animate-pulse line-through mt-6 md:mt-12">
                Rp.1.500.000</p>
            <p class="text-black text-xl md:text-2xl font-bold">
                Rp.750.000</p>
            <button type="button"
                class="text-white bg-[#2B3176] focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm md:text-base px-5 mt-4 md:mt-6 py-2.5 inline-flex justify-center w-full text-center">Daftar Sekarang</button>
        </div>
    </div>
        
    {{-- Testimonial --}}
    <section>
        <div class="flex flex-col justify-center flex-1 px-4 py-8 mx-auto lg:py-24 lg:flex-none max-w-7xl">
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
                @for ($j = 1; $j <= 6; $j++)
                    <li>
                        <figure class="relative h-full p-6 bg-white rounded-3xl">
                            <figcaption class="relative flex items-center gap-x-3 mb-6">
                                <img alt=""
                                    src="https://images.unsplash.com/photo-1577202214328-c04b77cefb5d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2073&amp;q=80"
                                    decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full"
                                    loading="lazy" style="color: transparent" />
                                <div>
                                    <div class="text-xs 2xl:text-sm font-semibold text-black">
                                        Jordan Pettersson
                                    </div>
                                    <div class="text-xs 2xl:text-sm text-gray-500">
                                        Mahasiswa
                                    </div>
                                </div>
                            </figcaption>
                            <blockquote class="relative">
                                <p class="text-xs 2xl:text-sm text-black">
                                    Fitur2 yang diajarkan di kelas ini senilai 2.5 juta/lebih, dibuka dengan harga 175
                                    ribu
                                    (promo) aja
                                </p>
                            </blockquote>
                            <div class="mt-3 flex items-center gap-x-0">
                                @for ($i = 1; $i <= 5; $i++)
                                    <ion-icon name="star" class="w-4 h-4 text-yellow-500"></ion-icon>
                                @endfor
                            </div>
                        </figure>
                    </li>
                @endfor
            </ul>
        </div>
    </section>
</x-guest-layout>
