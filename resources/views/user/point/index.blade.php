<x-app-layout>

    @php
        $dashboard = route('admin.dashboard.index');
    @endphp

    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => $dashboard],
        ['text' => 'Poin', 'link' => route('admin.point.index')],
        ['text' => $points->first()->user->fullname, 'link' => null],
        ['text' => 'Riwayat', 'link' => null],
    ]" />
    <x-card>
        <!-- Start coding here -->
        <div class="bg-white relative sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 mb-4">
                <div class="w-full md:w-1/3">
                    <form class="flex items-center">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <ion-icon name="search" class="text-gray-400"></ion-icon>
                            </div>
                            <input type="text" id="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-tiny rounded-lg block w-full pl-10 p-2"
                                placeholder="Search" required="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left ">
                    <thead class="text-xs 2xl:text-tiny uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">Jenis</th>
                            <th scope="col" class="px-4 py-3">Poin Terakhir</th>
                            <th scope="col" class="px-4 py-3">Tambahan</th>
                            <th scope="col" class="px-4 py-3">Poin Saat Ini</th>
                            <th scope="col" class="px-4 py-3">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($points as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row" class="px-4 py-3 font-medium whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ $data->pointType->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->last_point }}
                                </td>
                                <td class="px-4 py-3">
                                    (+)
                                    {{ $data->amount }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->total_point }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->created_at->format('d/m/Y H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

</x-app-layout>
