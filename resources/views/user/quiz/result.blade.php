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

        <div class="col-span-2 lg:col-span-2 bg-white border border-gray-200 rounded-lg shadow py-6">
            <div class="text-center">
                <p class="font-bold text-2xl">Hasil Kuis</p>

                {{-- Quiz Result --}}
                <div class="grid grid-cols-1 md:grid-cols-3 mt-7">
                    <div class="mt-4">
                        <h1 class="font-semibold text-2xl">8/10</h1>
                        <p class="text-sm">Jawaban Benar</p>
                    </div>

                    <div class="mt-4">
                        <h1 class="font-semibold text-2xl">05.20 <span class="text-md">m</span></h1>
                        <p class="text-sm">Durasi Pengerjaan</p>
                    </div>

                    <div class="mt-4">
                        <h1 class="font-semibold text-2xl">👌 Lulus</h1>
                        <p class="text-sm">Status</p>
                    </div>
                </div>
            </div>

            
            {{-- Start Quiz --}}
            <div class="text-center">
                <button type="button"
                    class="mt-14 text-white bg-primary hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm 2xl:text-sm px-14 py-3 text-center mr-3 md:mr-0">
                Selanjutnya
                </button>
                <p class="mt-3 text-sm">Knowledge Check: Meningkatkan Kemampuan Analisis</p>
            </div>
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
    </div>
</x-guest-layout>
