<x-guest-layout>

    {{-- Hero --}}
    <section class="relative flex items-center w-full">
        <div class="relative items-center w-full px-5 py-24 mx-auto lg:px-0 max-w-7xl">
            <div class="relative flex-col items-start m-auto align-middle">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-24">
                    <div class="relative items-center gap-12 m-auto lg:inline-flex md:order-first">
                        <div class="max-w-xl text-center lg:text-left">
                            <div>
                                <p class="text-2xl font-bold tracking-tight text-black sm:text-6xl leading-none mb-10">
                                    Mari Merevolusi Pembelajaran
                                </p>
                                <p
                                    class="max-w-xl mt-4 text-xs 2xl:text-sm tracking-tight text-gray-600 leading-relaxed">
                                    Secara individu, kami membawa perspektif unik kami untuk menata ulang cara berbagi
                                    pengetahuan. Bersama-sama, kami dapat meningkatkan taraf hidup dengan memberdayakan
                                    karyawan, pelajar, instruktur, dan bisnis kami.
                                </p>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center gap-5 mt-10 lg:flex-row lg:justify-start">
                                <a href="https://forms.gle/DJh3Jttuf7Uq6eoVA" target="_blank"
                                    class="items-center justify-center w-full px-6 py-2.5  text-center text-white duration-200 bg-primary  rounded-full inline-flex focus:outline-none lg:w-auto text-sm focus-visible:ring-primary">
                                    Daftar Sekarang
                                </a>
                                <a href="#why"
                                    class="inline-flex items-center justify-center text-sm font-normal text-black duration-200 hover:text-primary-500 focus:outline-none focus-visible:outline-gray-600">
                                    Selengkapnya &nbsp; →
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="order-first block w-full mt-12 lg:mt-0">
                        <img class="object-cover object-center rounded-xl w-full mx-auto bg-black lg:ml-auto"
                            alt="hero" src="{{ asset('assets/images/partner.JPG') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why? --}}
    <section class="bg-white" id="why">
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-0 max-w-7xl">
            <p class="text-xs 2xl:text-sm text-orange-600 text-center">Benefit</p>
            <p class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug text-center">Mengapa
                harus NaZMalogy?</p>
            <div class="grid w-full grid-cols-1 mx-auto lg:grid-cols-4 mt-24">
                <div class="max-w-md p-6 mx-auto">
                    <div class="flex items-center justify-center w-12 h-12  bg-primary text-white rounded-lg">
                        <ion-icon name="people" class="w-5 h-5"></ion-icon>
                    </div>
                    <p class="mt-5 text-base font-medium leading-6 text-black">
                        Kesempatan Pengembangan Karir
                    </p>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500 line-clamp-3 hover:line-clamp-none">
                        kami menawarkan kesempatan berkelanjutan untuk pengembangan karir Anda. Kami percaya bahwa
                        setiap individu memiliki potensi untuk tumbuh dan berkembang, dan kami akan memberikan dukungan
                        dan peluang yang Anda butuhkan untuk mencapai tujuan karir Anda.
                    </p>
                </div>
                <div class="max-w-md p-6 mx-auto">
                    <div class="flex items-center justify-center w-12 h-12  bg-primary text-white rounded-lg">
                        <ion-icon name="briefcase" class="w-5 h-5"></ion-icon>
                    </div>
                    <p class="mt-5 text-base font-medium leading-6 text-black">
                        Lingkungan Kerja yang Kolaboratif
                    </p>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500 line-clamp-3 hover:line-clamp-none">
                        Kami adalah tim yang berdedikasi untuk bekerja sama dalam mencapai kesuksesan bersama. Di
                        Nazmalogy, Anda akan merasakan atmosfer kerja yang kolaboratif, di mana ide-ide kreatif dihargai
                        dan inovasi didorong.
                    </p>
                </div>
                <div class="max-w-md p-6 mx-auto">
                    <div class="flex items-center justify-center w-12 h-12  bg-primary text-white rounded-lg">
                        <ion-icon name="heart" class="w-6 h-6"></ion-icon>
                    </div>
                    <p class="mt-5 text-base font-medium leading-6 text-black">
                        Keseimbangan Kerja-Hidup
                    </p>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500 line-clamp-3 hover:line-clamp-none">
                        Kami menghargai keseimbangan antara pekerjaan dan kehidupan pribadi. Dengan fleksibilitas kerja
                        dan program-program kesejahteraan karyawan kami, Anda dapat mencapai keseimbangan yang sehat
                        antara pekerjaan dan kehidupan pribadi Anda.
                    </p>
                </div>
                <div class="max-w-md p-6 mx-auto">
                    <div class="flex items-center justify-center w-12 h-12  bg-primary text-white rounded-lg">
                        <ion-icon name="trophy" class="w-5 h-5"></ion-icon>
                    </div>
                    <p class="mt-5 text-base font-medium leading-6 text-black">
                        Pengakuan dan Penghargaan
                    </p>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500 line-clamp-3 hover:line-clamp-none">
                        Di Nazmalogy, kami menghargai kontribusi setiap karyawan. Kami memiliki program pengakuan dan
                        penghargaan yang dirancang untuk menghargai prestasi Anda dan memberikan apresiasi yang layak.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Requirement Process --}}
    <section>
        <div class="relative items-center w-full px-5 pt-24 mx-auto md:px-12 lg:px-0 max-w-7xl lg:py-12">
            <div class="max-w-xl py-12 mx-auto lg:max-w-7xl">
                <div>
                    <p class="text-xs 2xl:text-sm text-orange-600 text-center">Step</p>
                    <p class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug text-center">
                        Proses Rekrutmen</p>
                    <div class="grid grid-cols-2 gap-12 md:grid-cols-6 lg:space-y-0 lg:text-center mt-24">
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="file-tray-full" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    Pendaftaran dan Psikotes
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="browsers" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    CV Screening
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="chatbubble" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    Wawancara dengan HR
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="people" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    Wawanacara dengan User
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="podium" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    Uji Kompetensi
                                </p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div
                                    class="flex items-center justify-center w-12 h-12 text-white bg-primary rounded-xl lg:mx-auto">
                                    <ion-icon name="megaphone" class="w-5 h-5"></ion-icon>
                                </div>
                                <p class="mt-4 text-xs 2xl:text-sm font-bold leading-6 text-black">
                                    Pengumuman
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Question --}}
    <section class="pt-12 pb-24 bg-white">
        <div class="flex flex-col justify-center flex-1 px-4 mx-auto mt-28 lg:flex-none max-w-7x">
            <div class="text-center">

                <p class="text-orange-500 font-medium text-sm 2xl:text-sm mb-0">
                    Bantuan
                </p>
                <h1 class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug max-w-md mx-auto ">
                    Pertanyaan Umum
                </h1>
            </div>
        </div>

        <div class="mt-11 mx-auto max-w-4xl">
            <div class="">
                <div id="accordion-arrow-icon" data-accordion="open" class="mx-4 md:mx-0">

                    <h2 id="accordion-arrow-icon-heading" class="rounded-xl mb-3 bg-gray-50" data-aos="fade-up"
                        data-aos-duration="1000">
                        <button type="button"
                            class="flex items-center text-sm font-medium 2xl:text-sm justify-between w-full p-5 text-left rounded-xl text-black focus:ring-4 focus:ring-gray-200"
                            data-accordion-target="#accordion-arrow-icon-body-1" aria-expanded="false"
                            aria-controls="accordion-arrow-icon-body">
                            <span>Apa Itu NaZMalogy?</span>
                            <ion-icon name="chevron-down-circle-outline" data-accordion-icon
                                class="shrink-0 -mr-0.5 w-6 h-6"></ion-icon>
                        </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-1" class="hidden mb-4"
                        aria-labelledby="accordion-arrow-icon-heading">
                        <div class="p-5 bg-white rounded-xl">
                            <p class="text-[#464646] text-xs 2xl:text-sm leading-6">
                                NaZMaLogy adalah Learning Management System (LMS) yang dibangun oleh NaZMa Office yang
                                memudahkan pengguna dalam pembelajaran jarak jauh. Dengan platform media pembelajaran
                                berbasis website yang menyediakan video yang inovatif dan interaktif diharapkan
                                memudahkan pengguna mewujudkan impiannya.
                            </p>
                        </div>
                    </div>

                    <h2 id="accordion-arrow-icon-heading" class="rounded-xl mb-3 bg-gray-50" data-aos="fade-up"
                        data-aos-duration="1000">
                        <button type="button"
                            class="flex items-center text-sm font-medium 2xl:text-sm justify-between w-full p-5 text-left rounded-xl text-black focus:ring-4 focus:ring-gray-200"
                            data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false"
                            aria-controls="accordion-arrow-icon-body-2">
                            <span>Apa yang saya dapatkan dari NaZMaLogy?</span>
                            <ion-icon name="chevron-down-circle-outline" data-accordion-icon
                                class="shrink-0 -mr-0.5 w-6 h-6"></ion-icon>
                        </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-2" class="hidden mb-4"
                        aria-labelledby="accordion-arrow-icon-heading">
                        <div class="p-5 bg-white rounded-xl">
                            <p class="text-[#464646] text-xs 2xl:text-sm leading-6">
                                Melalui
                                NaZMalogy, anda dapat mengembangkan skill anda sesuai dengan yang ingin anda pelajari,
                                melalui kursus kursus yang tersedia, baik yang gratis ataupun berbayar.
                            </p>
                        </div>
                    </div>

                    <h2 id="accordion-arrow-icon-heading" class="rounded-xl mb-3 bg-gray-50" data-aos="fade-up"
                        data-aos-duration="1000">
                        <button type="button"
                            class="flex items-center text-sm font-medium  2xl:text-sm justify-between w-full p-5 text-left rounded-xl text-black focus:ring-4 focus:ring-gray-200"
                            data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false"
                            aria-controls="accordion-arrow-icon-body">
                            <span>Bagaimana cara mengakses kursus berbayar?</span>
                            <ion-icon name="chevron-down-circle-outline" data-accordion-icon
                                class="shrink-0 -mr-0.5 w-6 h-6"></ion-icon>
                        </button>
                    </h2>
                    <div id="accordion-arrow-icon-body-3" class="hidden mb-4"
                        aria-labelledby="accordion-arrow-icon-heading">
                        <div class="p-5 bg-white rounded-xl">
                            <p class="text-[#464646] text-xs 2xl:text-sm leading-6">
                                Anda dapat
                                membeli kursus tersebut dan mentransfer ke rekening yang tersedia, dan mengunggah bukti
                                transfer ditempat yang telah disediakan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="text-center my-24">
            <h1
                class="font-bold text-2xl mt-20 md:text-3xl xl:text-4xl tracking-tighter leading-snug max-w-md mx-auto ">
                Masih Ada Pertanyaan?
            </h1>
            <button type="button"
                class="text-white bg-[#ED7F22] hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium w-48 rounded-xl text-sm 2xl:text-sm px-4 py-3 text-center mt-4 mr-3 md:mr-0">Kontak
                Kami
            </button>
        </div> --}}



    </section>

</x-guest-layout>
