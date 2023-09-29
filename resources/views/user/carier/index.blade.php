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
    <section class="relative py-20 overflow-hidden bg-gray-50">
        <img class="absolute top-0 left-0 mt-44" src="saturn-assets/images/faq/light-blue-left.png" alt="">
        <img class="absolute top-0 right-0 mt-10" src="saturn-assets/images/faq/star-right.svg" alt="">
        <div class="relative container px-4 mx-auto">
            <div class="max-w-5xl mx-auto">
                <div class="text-center">
                    <span class="inline-block px-3 mb-2 text-xs 2xl:text-sm font-semibold text-orange-500 rounded-full">
                        Sering ditanyakan
                    </span>
                    <h1 class="font-heading text-5xl xs:text-6xl md:text-4xl font-bold text-gray-900">
                        <span>Pertanyaan umum</span>
                    </h1>
                </div>
                <div class="pt-12 sm:pt-12 px-8 sm:px-20 pb-18 mt-12 rounded-4xl">
                    <button
                        class="flex mb-8 pb-6 group w-full items-start justify-between border-b border-gray-100 text-left">
                        <div class="max-w-xl pr-5">
                            <h3 class="text-xs 2xl:text-sm font-normal text-black group-hover:text-orange-900">Apa itu
                                NaZMalogy?</h3>
                            <p class="hidden group-hover:block mt-3 text-xs 2xl:text-sm text-gray-500">Pretium ac auctor
                                NaZMaLogy adalah Learning Management System (LMS) yang dibangun oleh NaZMa Office yang
                                memudahkan pengguna dalam pembelajaran jarak jauh. Dengan platform media pembelajaran
                                berbasis website yang menyediakan video yang inovatif dan interaktif diharapkan
                                memudahkan pengguna mewujudkan impiannya.</p>
                        </div>
                        <div class="pt-1">
                            <span class="hidden group-hover:block">
                                <svg width="17" height="3" viewBox="0 0 17 3" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 0.045166H1.46194C1.19673 0.045166 0.942374 0.150523 0.754838 0.338059C0.567302 0.525596 0.461945 0.77995 0.461945 1.04517C0.461945 1.31038 0.567302 1.56474 0.754838 1.75227C0.942374 1.93981 1.19673 2.04517 1.46194 2.04517H15.4619C15.7272 2.04517 15.9815 1.93981 16.1691 1.75227C16.3566 1.56474 16.4619 1.31038 16.4619 1.04517C16.4619 0.77995 16.3566 0.525596 16.1691 0.338059C15.9815 0.150523 15.7272 0.045166 15.4619 0.045166Z"
                                        fill="#FF460C"></path>
                                </svg>
                            </span>
                            <span class="block group-hover:hidden">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 7H9.46194V1C9.46194 0.734784 9.35659 0.48043 9.16905 0.292893C8.98151 0.105357 8.72716 0 8.46194 0C8.19673 0 7.94237 0.105357 7.75484 0.292893C7.5673 0.48043 7.46194 0.734784 7.46194 1V7H1.46194C1.19673 7 0.942374 7.10536 0.754838 7.29289C0.567302 7.48043 0.461945 7.73478 0.461945 8C0.461945 8.26522 0.567302 8.51957 0.754838 8.70711C0.942374 8.89464 1.19673 9 1.46194 9H7.46194V15C7.46194 15.2652 7.5673 15.5196 7.75484 15.7071C7.94237 15.8946 8.19673 16 8.46194 16C8.72716 16 8.98151 15.8946 9.16905 15.7071C9.35659 15.5196 9.46194 15.2652 9.46194 15V9H15.4619C15.7272 9 15.9815 8.89464 16.1691 8.70711C16.3566 8.51957 16.4619 8.26522 16.4619 8C16.4619 7.73478 16.3566 7.48043 16.1691 7.29289C15.9815 7.10536 15.7272 7 15.4619 7Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </div>
                    </button>
                    <button
                        class="flex mb-8 pb-6 group w-full items-start justify-between border-b border-gray-100 text-left">
                        <div class="max-w-xl pr-5">
                            <h3 class="text-xs 2xl:text-sm font-normal text-black group-hover:text-orange-900">Apa yang
                                saya dapatkan di NaZMalogy?</h3>
                            <p class="hidden group-hover:block mt-3 text-xs 2xl:text-sm text-gray-500">Melalui
                                NaZMalogy, anda dapat mengembangkan skill anda sesuai dengan yang ingin anda pelajari,
                                melalui kursus kursus yang tersedia, baik yang gratis ataupun berbayar.</p>
                        </div>
                        <div class="pt-1">
                            <span class="hidden group-hover:block">
                                <svg width="17" height="3" viewBox="0 0 17 3" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 0.045166H1.46194C1.19673 0.045166 0.942374 0.150523 0.754838 0.338059C0.567302 0.525596 0.461945 0.77995 0.461945 1.04517C0.461945 1.31038 0.567302 1.56474 0.754838 1.75227C0.942374 1.93981 1.19673 2.04517 1.46194 2.04517H15.4619C15.7272 2.04517 15.9815 1.93981 16.1691 1.75227C16.3566 1.56474 16.4619 1.31038 16.4619 1.04517C16.4619 0.77995 16.3566 0.525596 16.1691 0.338059C15.9815 0.150523 15.7272 0.045166 15.4619 0.045166Z"
                                        fill="#FF460C"></path>
                                </svg>
                            </span>
                            <span class="block group-hover:hidden">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 7H9.46194V1C9.46194 0.734784 9.35659 0.48043 9.16905 0.292893C8.98151 0.105357 8.72716 0 8.46194 0C8.19673 0 7.94237 0.105357 7.75484 0.292893C7.5673 0.48043 7.46194 0.734784 7.46194 1V7H1.46194C1.19673 7 0.942374 7.10536 0.754838 7.29289C0.567302 7.48043 0.461945 7.73478 0.461945 8C0.461945 8.26522 0.567302 8.51957 0.754838 8.70711C0.942374 8.89464 1.19673 9 1.46194 9H7.46194V15C7.46194 15.2652 7.5673 15.5196 7.75484 15.7071C7.94237 15.8946 8.19673 16 8.46194 16C8.72716 16 8.98151 15.8946 9.16905 15.7071C9.35659 15.5196 9.46194 15.2652 9.46194 15V9H15.4619C15.7272 9 15.9815 8.89464 16.1691 8.70711C16.3566 8.51957 16.4619 8.26522 16.4619 8C16.4619 7.73478 16.3566 7.48043 16.1691 7.29289C15.9815 7.10536 15.7272 7 15.4619 7Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </div>
                    </button>
                    <button
                        class="flex mb-8 pb-6 group w-full items-start justify-between border-b border-gray-100 text-left">
                        <div class="max-w-xl pr-5">
                            <h3 class="text-xs 2xl:text-sm font-normal text-black group-hover:text-orange-900">
                                Bagaimanma cara mengakses kursus berbayar?</h3>
                            <p class="hidden group-hover:block mt-3 text-xs 2xl:text-sm text-gray-500">Anda dapat
                                membeli kursus tersebut dan mentransfer ke rekening yang tersedia, dan mengunggah bukti
                                transfer ditempat yang telah disediakan.</p>
                        </div>
                        <div class="pt-1">
                            <span class="hidden group-hover:block">
                                <svg width="17" height="3" viewBox="0 0 17 3" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 0.045166H1.46194C1.19673 0.045166 0.942374 0.150523 0.754838 0.338059C0.567302 0.525596 0.461945 0.77995 0.461945 1.04517C0.461945 1.31038 0.567302 1.56474 0.754838 1.75227C0.942374 1.93981 1.19673 2.04517 1.46194 2.04517H15.4619C15.7272 2.04517 15.9815 1.93981 16.1691 1.75227C16.3566 1.56474 16.4619 1.31038 16.4619 1.04517C16.4619 0.77995 16.3566 0.525596 16.1691 0.338059C15.9815 0.150523 15.7272 0.045166 15.4619 0.045166Z"
                                        fill="#FF460C"></path>
                                </svg>
                            </span>
                            <span class="block group-hover:hidden">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 7H9.46194V1C9.46194 0.734784 9.35659 0.48043 9.16905 0.292893C8.98151 0.105357 8.72716 0 8.46194 0C8.19673 0 7.94237 0.105357 7.75484 0.292893C7.5673 0.48043 7.46194 0.734784 7.46194 1V7H1.46194C1.19673 7 0.942374 7.10536 0.754838 7.29289C0.567302 7.48043 0.461945 7.73478 0.461945 8C0.461945 8.26522 0.567302 8.51957 0.754838 8.70711C0.942374 8.89464 1.19673 9 1.46194 9H7.46194V15C7.46194 15.2652 7.5673 15.5196 7.75484 15.7071C7.94237 15.8946 8.19673 16 8.46194 16C8.72716 16 8.98151 15.8946 9.16905 15.7071C9.35659 15.5196 9.46194 15.2652 9.46194 15V9H15.4619C15.7272 9 15.9815 8.89464 16.1691 8.70711C16.3566 8.51957 16.4619 8.26522 16.4619 8C16.4619 7.73478 16.3566 7.48043 16.1691 7.29289C15.9815 7.10536 15.7272 7 15.4619 7Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </div>
                    </button>
                    <button
                        class="flex mb-8 pb-6 group w-full items-start justify-between border-b border-gray-100 text-left">
                        <div class="max-w-xl pr-5">
                            <h3 class="text-xs 2xl:text-sm font-normal text-black group-hover:text-orange-900">
                                Bagaimana
                                saya bisa mengakses kursus yang telah saya beli?</h3>
                            <p class="hidden group-hover:block mt-3 text-xs 2xl:text-sm text-gray-500">
                                Setelah Anda membeli kursus, Anda dapat mengaksesnya dengan masuk ke akun Anda.
                                Kursus dan progress kursus yang Anda beli akan tersedia di halaman dashboard Anda,
                                dan Anda dapat memulai belajar dengan cara mengeklik tombol mulai.</p>
                        </div>
                        <div class="pt-1">
                            <span class="hidden group-hover:block">
                                <svg width="17" height="3" viewBox="0 0 17 3" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 0.045166H1.46194C1.19673 0.045166 0.942374 0.150523 0.754838 0.338059C0.567302 0.525596 0.461945 0.77995 0.461945 1.04517C0.461945 1.31038 0.567302 1.56474 0.754838 1.75227C0.942374 1.93981 1.19673 2.04517 1.46194 2.04517H15.4619C15.7272 2.04517 15.9815 1.93981 16.1691 1.75227C16.3566 1.56474 16.4619 1.31038 16.4619 1.04517C16.4619 0.77995 16.3566 0.525596 16.1691 0.338059C15.9815 0.150523 15.7272 0.045166 15.4619 0.045166Z"
                                        fill="#FF460C"></path>
                                </svg>
                            </span>
                            <span class="block group-hover:hidden">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 7H9.46194V1C9.46194 0.734784 9.35659 0.48043 9.16905 0.292893C8.98151 0.105357 8.72716 0 8.46194 0C8.19673 0 7.94237 0.105357 7.75484 0.292893C7.5673 0.48043 7.46194 0.734784 7.46194 1V7H1.46194C1.19673 7 0.942374 7.10536 0.754838 7.29289C0.567302 7.48043 0.461945 7.73478 0.461945 8C0.461945 8.26522 0.567302 8.51957 0.754838 8.70711C0.942374 8.89464 1.19673 9 1.46194 9H7.46194V15C7.46194 15.2652 7.5673 15.5196 7.75484 15.7071C7.94237 15.8946 8.19673 16 8.46194 16C8.72716 16 8.98151 15.8946 9.16905 15.7071C9.35659 15.5196 9.46194 15.2652 9.46194 15V9H15.4619C15.7272 9 15.9815 8.89464 16.1691 8.70711C16.3566 8.51957 16.4619 8.26522 16.4619 8C16.4619 7.73478 16.3566 7.48043 16.1691 7.29289C15.9815 7.10536 15.7272 7 15.4619 7Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </div>
                    </button>
                    <button class="flex group w-full items-start justify-between text-left">
                        <div class="max-w-xl pr-5">
                            <h3 class="text-xs 2xl:text-sm font-normal text-black group-hover:text-orange-900">Apakah
                                kursus di NaZMalogy memiliki sertifikat?</h3>
                            <p class="hidden group-hover:block mt-3 text-xs 2xl:text-sm text-gray-500">Ya,Semua kursus
                                di NaZMalogy memiliki sertifikat yang anda dapat gunakan untuk mengembangkan portofolio
                                anda.</p>
                        </div>
                        <div class="pt-1">
                            <span class="hidden group-hover:block">
                                <svg width="17" height="3" viewBox="0 0 17 3" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 0.045166H1.46194C1.19673 0.045166 0.942374 0.150523 0.754838 0.338059C0.567302 0.525596 0.461945 0.77995 0.461945 1.04517C0.461945 1.31038 0.567302 1.56474 0.754838 1.75227C0.942374 1.93981 1.19673 2.04517 1.46194 2.04517H15.4619C15.7272 2.04517 15.9815 1.93981 16.1691 1.75227C16.3566 1.56474 16.4619 1.31038 16.4619 1.04517C16.4619 0.77995 16.3566 0.525596 16.1691 0.338059C15.9815 0.150523 15.7272 0.045166 15.4619 0.045166Z"
                                        fill="#FF460C"></path>
                                </svg>
                            </span>
                            <span class="block group-hover:hidden">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4619 7H9.46194V1C9.46194 0.734784 9.35659 0.48043 9.16905 0.292893C8.98151 0.105357 8.72716 0 8.46194 0C8.19673 0 7.94237 0.105357 7.75484 0.292893C7.5673 0.48043 7.46194 0.734784 7.46194 1V7H1.46194C1.19673 7 0.942374 7.10536 0.754838 7.29289C0.567302 7.48043 0.461945 7.73478 0.461945 8C0.461945 8.26522 0.567302 8.51957 0.754838 8.70711C0.942374 8.89464 1.19673 9 1.46194 9H7.46194V15C7.46194 15.2652 7.5673 15.5196 7.75484 15.7071C7.94237 15.8946 8.19673 16 8.46194 16C8.72716 16 8.98151 15.8946 9.16905 15.7071C9.35659 15.5196 9.46194 15.2652 9.46194 15V9H15.4619C15.7272 9 15.9815 8.89464 16.1691 8.70711C16.3566 8.51957 16.4619 8.26522 16.4619 8C16.4619 7.73478 16.3566 7.48043 16.1691 7.29289C15.9815 7.10536 15.7272 7 15.4619 7Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
