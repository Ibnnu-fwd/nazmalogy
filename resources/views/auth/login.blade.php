<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    {{-- Login page --}}
    <div class="grid grid-cols-1 max-h-screen md:grid-cols-12 md:gap-8">

        {{-- Login form --}}
        <div class="md:col-span-7 mx-auto max-w-md px-4 py-4">
            <h1 class="font-bold text-2xl md:text-4xl text-black text-center mt-24">Silakan Masuk</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" id="email"
                    class="rounded-full w-full text-xs 2xl:text-tiny bg-white border-none shadow-sm mt-16 h-14 p-4"
                    placeholder="Alamat Email">
                <input type="password" name="password"
                    class="w-full text-xs 2xl:text-tiny mt-5 bg-white border-none shadow-sm rounded-full h-14 p-4"
                    placeholder="Kata Sandi">
                {{-- <a href="#" class="text-[#8E8E8E] font-normal text-tiny float-right mt-4">Lupa Sandi?</a> --}}
                <button type="submit"
                    class="w-full h-14 text-xs 2xl:text-sm bg-[#2C2F75] text-white rounded-full mt-9">Masuk
                    Sekarang</button>
                <a href="{{ route('login.google.redirect') }}"
                    class="w-full h-14 text-xs 2xl:text-sm bg-gray-200 text-gray-800 rounded-full mt-3 flex items-center justify-center gap-x-2">
                    <ion-icon name="logo-google" class="text-xl"></ion-icon> Masuk dengan Google
                </a>
            </form>
            <p class="font-medium text-tiny text-black text-center mt-7">Belum Punya Akun? <span
                    class="font-medium text-tiny text-[#ED7F22]"><a href="{{ route('register') }}">Daftar
                        Sekarang</a></span></p>
        </div>

        {{-- Side image --}}
        <div class="col-span-5 hidden md:block">
            <img class="w-full h-screen object-cover object-left" src="{{ asset('assets/images/bg_side.png') }}"
                alt="side">
        </div>
    </div>

    @push('js-internal')
        <script>
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ Session::get('success') }}',
                });
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ Session::get('error') }}',
                });
            @endif
        </script>
    @endpush
</x-auth-layout>
