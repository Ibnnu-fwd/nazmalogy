<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 max-w-7xl mx-auto py-6 sm:py-12 lg:py-24 px-4 sm:px-6 lg:px-8">
        {{-- Course Material --}}
        <div class="col-span-1 hidden lg:block">
            <div id="course-material" class="w-100 h-fit bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">10 Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 text-black">
                    @for ($i = 1; $i <= 7; $i++)
                        <p class="my-5">{{$i}}. Dasar-dasar Project Network Planning
                            <span class="float-right">12:00
                                <ion-icon name="lock-closed-outline" class="text-[#757575]"></ion-icon>
                            </span>
                        </p>
                    @endfor
                </div>
            </div>
        </div>

        <div class="col-span-2 lg:col-span-2 bg-white border border-gray-200 rounded-lg shadow p-6">
            {{-- About Quiz --}}
            <div class="">
                <p class="font-bold text-2xl">Knowledge Check</p>
                <p class="mt-4 text-sm">
                    Ini adalah modul terakhir dari materi Kemampuan analisis. Terdapat 10 pertanyaan untuk menguji wawasan anda. Silahkan kerjakan dengan hati - hati. 
                </p>
            </div>

            {{-- Rules --}}
            <div class="">
                <p class="mt-6 text-sm">
                    Berikut adalah aturan pengerjaan kuis: 
                </p>
                <ul class="mt-6 mx-8 text-sm  list-disc"> 
                    <li> Skor minimal lulus: 80% </li>
                </ul>
                <p class="mt-6 text-sm">
                    Apabila anda tidak memenuhi syarat kelulusan, maka anda harus melakukan pengerjaan kuis kembali. 
                </p>
                <p class="mt-6 text-sm">
                    Selamat mengerjakan!
                </p>
            </div>

            {{-- Start Quiz --}}
            <button type="button"
                class="mt-16  text-white bg-primary hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm 2xl:text-sm px-14 py-3 text-center mr-3 md:mr-0">
            Mulai
            </button>
        </div>

        {{-- Course Material When Below XL--}}
        <div class="col-span-1 md:col-span-1 mt-8 lg:hidden">
            <div id="course-material" class="w-100 h-fit bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">10 Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 text-black">
                    @for ($i = 1; $i <= 7; $i++)
                        <p class="my-5">{{$i}}. Dasar-dasar Project Network Planning
                            <span class="float-right">12:00
                                <ion-icon name="lock-closed-outline" class="text-[#757575]"></ion-icon>
                            </span>
                        </p>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
