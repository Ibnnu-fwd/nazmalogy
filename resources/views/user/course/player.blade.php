<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 max-w-7xl mx-auto py-6 sm:py-12 lg:py-24 px-4 sm:px-6 lg:px-8">
        {{-- Course Material --}}
        <div>
            <div id="course-material" class="w-full max-w-md h-fit sm:justify-center sm:text-justify bg-white border border-gray-200 rounded-lg shadow sm:p-6">
                <div class="dasar-dasar-project-network-planning text-base text-black text-left font-normal">
                    <p class="font-bold text-base">Dasar-dasar Project Network Planning</p>
                    <p class="font-normal text-sm text-[#757575]">10 Materi Siap Dipelajari</p>
                </div>
                <div class="text-sm mt-9 my-5 text-black">
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
        <div class="col-span-2 lg:col-span-2">
            {{-- Video Player --}}
            <div class="rounded-lg">
                <iframe width="100%" height="430" src="https://www.youtube.com/embed/QQgIHQE5psA" frameborder="0"
                    allowfullscreen class="rounded-2xl"></iframe>
            </div>

            {{-- About Course --}}
            <div>
                <p class="font-bold text-2xl mt-6 lg:mt-8">Tentang Kursus Ini</p>
                <p class="font-normal mt-4 text-sm max-w-xl leading-7">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ab rerum dolore, neque aliquam
                    alias, esse dignissimos odio impedit illo nobis. Assumenda minima ab porro reiciendis blanditiis
                    deleniti maiores itaque veniam consequuntur quis cumque nisi ipsum fuga veritatis fugiat nihil,
                    ullam iure rem possimus rerum omnis cupiditate amet. Modi, cumque!
                </p>
            </div>
            {{-- Comment Area --}}
            <textarea type="text" name="comment" id="comment" rows="3"
                class="w-full mt-4 py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-[#757575]"
                placeholder="Jadilah yang pertama berkomentar"></textarea>

            {{-- Testimonial Comment --}}
            <div class="mt-6 bg-white border border-gray-200 rounded-lg shadow p-6">
                <figcaption class="relative flex items-center gap-x-3 mt-5">
                    <img alt=""
                        src="https://images.unsplash.com/photo-1577202214328-c04b77cefb5d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2073&amp;q=80"
                        decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full" loading="lazy"
                        style="color: transparent" />
                    <div>
                        <div class="text-xs font-semibold text-black">
                            Jordan Pettersson
                        </div>
                        <div class="text-xs text-gray-500">
                            Mahasiswa
                        </div>
                    </div>
                </figcaption>
                <p class="font-normal text-sm text-black mt-4">
                    NaZMaLogy adalah Learning Management System (LMS) yang dibangun oleh NaZMa Office yang memudahkan pengguna dalam pembelajaran jarak jauh. Dengan platform media pembelajaran berbasis website
                </p>
                @for ($i = 1; $i <= 5; $i++)
                <ion-icon name="star" class="w-7 h-7 mt-4 text-yellow-500"></ion-icon>
                @endfor
            </div>
        </div>
    </div>
</x-guest-layout>
