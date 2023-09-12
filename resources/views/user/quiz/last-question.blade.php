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
                        <div class="grid grid-flow-col my-5 justify-between">
                            <p class="col-span-4">{{$i}}. Dasar-dasar Project Network Planning
                            </p>
                            <p class="items-center justify-end">12:00
                                <ion-icon name="lock-closed-outline" class="text-[#757575]"></ion-icon>
                            </p>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="col-span-2 lg:col-span-2 bg-white border border-gray-200 rounded-lg shadow p-6 h-fit">
            {{-- About Quiz --}}
            <div class="">
                <p class="font-bold text-2xl">Knowledge Check: Meningkatkan Kemampuan Analisis</p>
                <p class="font-normal text-sm text-black mt-9">Apa yang dimaksud dengan istilah "Scope Creep" dalam
                    konteks manajemen proyek?</p>

            </div>

            <div class="mt-7 text-black text-sm">

                <label for="A" class="flex items-center cursor-pointer">
                    <input type="radio" id="A" name="hosting" value="A" class="hidden peer" required>
                    <div class="w-8 h-8 border flex border-gray-400 rounded-lg items-center justify-center mr-4 peer-checked:bg-blue-900 peer-checked:text-white">
                        <span class="block mx-auto">A</span>
                    </div>
                    <div class="flex-1">Sebuah teknik untuk memperpanjang tenggat waktu proyek.</div>
                </label>
                

                <label for="B" class="flex items-center cursor-pointer mt-3">
                    <input type="radio" id="B" name="hosting" value="B" class="hidden peer"
                        required>
                    <div class="w-8 h-8 border border-gray-400 rounded-lg flex items-center justify-center mr-4  peer-checked:bg-blue-900 peer-checked:text-white">
                        <span>B</span>
                    </div>
                    <div class="flex-1">Peningkatan biaya proyek yang disetujui.</div>
                </label>

                <label for="C" class="flex items-center cursor-pointer mt-3">
                    <input type="radio" id="C" name="hosting" value="C" class="hidden peer"
                        required>
                    <div class="w-8 h-8 border border-gray-400 rounded-lg flex items-center justify-center mr-4  peer-checked:bg-blue-900 peer-checked:text-white">
                        <span>C</span>
                    </div>
                    <div class="flex-1">Perubahan atau penambahan tugas, fitur, atau persyaratan proyek yang tidak terkendali.</div>
                </label>

                <label for="D" class="flex items-center cursor-pointer mt-3">
                    <input type="radio" id="D" name="hosting" value="D" class="hidden peer"
                        required>
                    <div class="w-8 h-8 border border-gray-400 rounded-lg flex items-center justify-center mr-4  peer-checked:bg-blue-900 peer-checked:text-white">
                        <span>D</span>
                    </div>
                    <div class="flex-1">Proses mengurangi lingkup proyek untuk menghemat waktu dan anggaran.</div>
                </label>

            </div>

            {{-- Start Quiz --}}
            <button type="button"
                class="mt-14  text-white bg-primary hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm 2xl:text-sm px-14 py-3 text-center mr-3 md:mr-0">
                Selesai
            </button>
        </div>

        {{-- Course Material When Below XL --}}
        <div class="col-span-1 md:col-span-1 mt-8 lg:hidden">
            <div id="course-material" class="w-100 h-fit bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="text-base my-5 text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">10 Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 text-black">
                    @for ($i = 1; $i <= 7; $i++)
                        <p class="my-5">{{ $i }}. Dasar-dasar Project Network Planning
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
