<x-app-layout>

    @php
        $dashboard = route('facilitator.index');
    @endphp

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => $dashboard], ['text' => 'Riwayat Belajar Member', 'link' => null], ['text' => 'Detail', 'link' => null]]" />
    <x-card>
        <!-- Start coding here -->
        <div class="bg-white relative sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 mb-4">
                <div class="w-full md:w-1/2">
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
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">Riwayat</th>
                            <th scope="col" class="px-4 py-3">Waktu</th>
                            <th scope="col" class="px-4 py-3">Durasi Penyelesaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row"
                                    class="items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->user->fullname }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ $data->courseChapter->title }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ date('d M Y H:i', strtotime($data->finished_at)) }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->finish_time ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

    @push('js-internal')
        <script>
            function add() {
                $('#create-point-type form').trigger('reset');
                let url = "{{ route('admin.point-type.store') }}";
                $('#create-point-type form').attr('action', url);
            }

            function edit(id) {
                $('#create-point-type form').trigger('reset');
                let url = "{{ route('admin.point-type.update', ':id') }}";
                url = url.replace(':id', id);
                $('#create-point-type form').attr('action', url);
                $('#create-point-type form').append('<input type="hidden" name="_method" value="PUT">');
                $.ajax({
                    url: "{{ route('admin.point-type.show', ':id') }}".replace(':id', id),
                    method: 'GET',
                    success: function(result) {
                        $('#create-point-type #name').val(result.name);
                        $('#create-point-type #amount').val(result.amount);
                    }
                });
            }

            function destroy(id) {
                $('#delete-modal form').attr('action', "{{ route('admin.point-type.destroy', ':id') }}".replace(':id',
                    id));
            }

            $('#search').on('keyup', function() {
                let value = $(this).val().toLowerCase();
                $('tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

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
