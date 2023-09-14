<x-app-layout>
    {{-- <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => null]]" /> --}}

    <!-- component -->
    <div class="flex flex-col">
        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                    <ion-icon name="file-tray-stacked" class="h-6 w-6 text-blue-400"></ion-icon>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">Kursus</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $courses->count() }}
                    </p>
                </div>
            </div>

            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                    <ion-icon name="people" class="h-6 w-6 text-orange-400"></ion-icon>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">Pengguna</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $users->count() }}
                    </p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
                    <ion-icon name="wallet" class="h-6 w-6 text-red-400"></ion-icon>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">Total Transaksi</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ number_format($totalTransaction, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-indigo-100 bg-indigo-50">
                    <ion-icon name="chatbox" class="h-6 w-6 text-indigo-400"></ion-icon>
                </div>

                <div class="ml-4">
                    <h2 class="font-semibold">Ulasan</h2>
                    <p class="mt-2 text-sm text-gray-500">{{ $totalReview }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
