<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    {{-- Login page --}}
    <div class="grid grid-cols-1 max-h-screen md:grid-cols-12 md:gap-8">

        {{-- Login form --}}
        <div class="md:col-span-7 mx-auto max-w-md px-4 py-4 mt-20">
            <h1 class="font-bold text-2xl md:text-4xl text-black text-center mt-24">Lupa Password</h1>
            <input type="email" name="" id=""
            class="rounded-full w-full text-xs 2xl:text-sm bg-white border-none shadow-sm mt-16 h-14 p-4"
            placeholder="Alamat Email">
            <button class="w-full h-14 bg-[#2C2F75] text-white rounded-full mt-9">Reset Password</button>
            <p class="font-medium text-sm text-black text-center mt-7">Link Reset Password Akan Dikirim Ke Email Anda.
</p>
        </div>

        {{-- Side image --}}
        <div class="col-span-5 hidden md:block">
            <img class="w-full h-screen object-cover object-left" src="{{ asset('assets/images/bg_side.png') }}" alt="side">
        </div>
    </div>

</x-auth-layout>
