<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    {{-- koding disini loginnya --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <div class="md:col-span-7 mx-auto max-w-md px-4 py-4 md:py-2">
            <h1 class="font-bold text-2xl md:text-4xl text-black text-center mt-24">Silakan Masuk</h1>
            <input type="email" name="" id=""
                class="rounded-full w-full bg-white border-none shadow-sm mt-16 h-14 p-4" placeholder="Alamat Email">
            <input type="password" class="w-full mt-5 bg-white border-none shadow-sm rounded-full h-14 p-4"
                placeholder="Kata Sandi">
            <a href="#" class="text-[#8E8E8E] font-normal text-sm float-right mt-4">Lupa Sandi?</a>
            <button class="w-full h-14 bg-[#2C2F75] text-white rounded-full mt-9">Masuk Sekarang</button>
            <p class="font-medium text-sm text-black text-center mt-7">Belum Punya Akun? <span
                    class="font-bold text-sm text-[#ED7F22]"><a href="#">Daftar Sekarang</a></span></p>
        </div>
        <div class="col-span-5 invisible md:visible">
            <img class="w-full object-cover object-left" src="{{ asset('assets/images/bg_side.png') }}" alt="side">
        </div>
    </div>

</x-auth-layout>
