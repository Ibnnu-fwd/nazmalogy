<x-app-layout>

    @php
        $dashboard = route('user.dashboard.index');
    @endphp

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => $dashboard], ['text' => 'Profil', 'link' => null]]" />

    <div class="max-w-md mx-auto">
        <x-card>
            <form action="{{ route('user.profile.update', $user->id) }}" method="POST" class="space-y-4"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <x-file-upload label="Foto Profil" name="avatar" id="avatar" :value="$user->avatar" />
                    @if ($user->avatar)
                        <a href="{{ asset('storage/avatar/' . $user->avatar) }}" target="_blank"
                            class="block hover:text-primary hover:underline">
                            Lihat Foto
                        </a>
                    @else
                        <p class="text-gray-400">Belum ada foto</p>
                    @endif
                </div>
                <x-input label="Nama lengkap" name="fullname" id="fullname" :value="$user->fullname" />
                <x-input label="Email" name="email" id="email" :value="$user->email" />
                <x-select label="Gender" name="gender" id="gender">
                    <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </x-select>
                <x-input label="No. telepon" name="phone" id="phone" :value="$user->phone" />
                <x-input label="Tanggal lahir" name="birth" id="birth" type="date" :value="$user->birth" />

                <x-button text="Simpan perubahan" type="submit" />
            </form>
        </x-card>
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
</x-app-layout>
