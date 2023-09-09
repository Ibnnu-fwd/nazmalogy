<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="grid grid-cols-3 px-4">
        <div class="col-span-2 mx-auto max-w-md">
            <h1 class="font-bold text-4xl text-black text-center mt-24 ">Daftar Akun</h1>
            <input type="email" name="" id=""
                class="rounded-3xl w-full bg-white border-none shadow-sm mt-16 h-14" placeholder="Username">
            <input type="email" name="" id=""
                class="rounded-3xl w-full bg-white border-none shadow-sm mt-5 h-14" placeholder="Alamat Email">
            <input type="password" class="w-full mt-5 bg-white border-none shadow-sm rounded-3xl h-14"
                placeholder="Kata Sandi">
            <a href="#" class="text-[#8E8E8E] font-normal text-sm float-right mt-4">Lupa Sandi?</a>
            <button class="w-full h-14 bg-[#2C2F75] text-white rounded-3xl mt-9">Daftar Sekarang</button>
            <p class="font-medium text-sm text-black text-center mt-7">Sudah Punya Akun? <span
                    class="font-bold text-sm text-[#ED7F22]"><a href="#">Masuk Sekarang</a></span></p>
        </div>
        <div class="">
            <img class="w-auto h-screen" src="{{ asset('assets/images/bg_side.png') }}" alt="sadas">
        </div>
    </div>

</x-auth-layout>
