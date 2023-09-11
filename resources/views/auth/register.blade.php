<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="grid grid-cols-1 md:grid-cols-12">
        <!-- Kolom form registrasi di tengah pada breakpoint md -->
        <div class="md:col-span-7 mx-auto max-w-md sm:px-0 px-5 md:mx-auto">
            <h1 class="font-bold text-4xl text-black text-center mt-24">Daftar Akun</h1>
            <input type="email" name="" id=""
                class="rounded-3xl w-full bg-white border-none text-xs 2xl:text-sm shadow-sm mt-16 h-14 p-4"
                placeholder="Username">
            <input type="email" name="" id=""
                class="rounded-3xl w-full bg-white border-none text-xs 2xl:text-sm shadow-sm mt-5 h-14 p-4"
                placeholder="Alamat Email">
            <input type="password"
                class="w-full mt-5 bg-white border-none text-xs 2xl:text-sm shadow-sm rounded-3xl h-14 p-4"
                placeholder="Kata Sandi">
            <a href="#" class="text-[#8E8E8E] font-normal text-sm float-right mt-4">Lupa Sandi?</a>
            <button class="w-full h-14 bg-[#2C2F75] text-white rounded-3xl mt-9">Daftar Sekarang</button>
            <p class="font-medium text-sm text-black text-center mt-7">Sudah Punya Akun? <span
                    class="font-bold text-sm text-[#ED7F22]"><a href="{{ route('login') }}">Masuk Sekarang</a></span>
            </p>
        </div>

        <!-- Kolom gambar di samping pada breakpoint md -->
        <div class="col-span-5 hidden lg:block">
            <img class="w-full h-screen" src="{{ asset('assets/images/bg_side.png') }}" alt="side">
        </div>
    </div>
</x-auth-layout>
