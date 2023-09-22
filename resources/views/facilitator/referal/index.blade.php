<x-app-layout>

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => null], ['text' => 'Referal', 'link' => null]]" />
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
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <x-button text="Tambah Referal" icon="add" backgroundColor="primary" hoverColor="primary"
                        fontSize="text-tiny" id="add-referal-button" onclick="add()" modalTarget="create-referal" />
                    <x-button-delete-all text="Hapus Referal Kadaluarsa" icon="trash" backgroundColor="primary" hoverColor="danger"
                        fontSize="text-tiny" id="delete-referal-button" onclick="destroy()" modalTarget="delete-modal" />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500 ">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Kode</th>
                            <th scope="col" class="px-4 py-3">Tgl. Kadaluarsa</th>
                            <th scope="col" class="px-4 py-3">Jumlah Pengguna</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($referals as $data)
                            @php
                                $isExpired = \Carbon\Carbon::now()->isAfter($data->expire_at);
                            @endphp
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <td class="px-4 py-3">
                                    {{ $data->ref_code }}
                                </td>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($data->expire_at)->locale('id')->isoFormat('LL') }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ \App\Models\AttemptReferal::where('ref_code', $data->ref_code)->where('is_success', true)->count()}}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        @if ($isExpired)
                                            <span class="text-gray-500">Kadaluarsa</span>
                                        @elseif ($data->is_active)
                                            <x-button-edit id="edit-referal-button-{{ $data->id }}"
                                                modalTarget="create-referal" onclick="edit({{ $data->id }})" />
                                        @else
                                            <x-button text="Aktifkan" onclick="restore('{{ $data->id }}')"
                                                icon="checkmark" backgroundColor="primary" hoverColor="primary"
                                                fontSize="text-tiny" />
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

    <!-- Main modal -->
    <div id="create-referal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-xs 2xl:text-sm font-semibold text-gray-900">
                        Tambah Referal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-tiny w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="create-referal">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST">
                    @csrf
                    <div class="p-6 space-y-6 text-tiny">
                        <x-input label="Tanggal Kadaluarsa" id="expire_at" name="expire_at" type="date" required />
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <x-button text="Simpan" type="submit" />
                        <button data-modal-hide="create-referal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-lg border border-gray-200 text-tiny font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete modal -->
    <div id="delete-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center "
                    data-modal-hide="delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-tiny font-normal text-gray-500 dark:text-gray-400">
                        Apakah anda yakin ingin menghapus data ini?
                    </h3>
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 ">
                            Ya
                        </button>
                        <button data-modal-hide="delete-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Tidak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            function restore(id) {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda akan mengaktifkan kembali referal ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Aktifkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('facilitator.referal.restore', ':id') }}".replace(':id', id),
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Referal berhasil diaktifkan',
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            }

            function add() {
                $('#create-referal form').trigger('reset');
                let url = "{{ route('facilitator.referal.store') }}";
                $('#create-referal form').attr('action', url);
            }

            function edit(id) {
                $('#create-referal form').trigger('reset');
                let url = "{{ route('facilitator.referal.update', ':id') }}";
                url = url.replace(':id', id);
                $('#create-referal form').attr('action', url);
                $('#create-referal form').append('<input type="hidden" name="_method" value="PUT">');
                $.ajax({
                    url: "{{ route('facilitator.referal.show', ':id') }}".replace(':id', id),
                    method: 'GET',
                    success: function(result) {
                        $('#expire_at').val(new Date(result.expire_at).toISOString().substr(0, 10)); // aproved date
                    }
                });
            }

            function destroy(id) {
                $('#delete-modal form').attr('action', "{{ route('facilitator.referal.destroy', ':id') }}".replace(':id',
                    id));
            }

            $('#search').on('keyup', function() {
                let value = $(this).val().toLowerCase();
                $('tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            function parseDuration(duration) {
                var matches = duration.match(/[0-9]+[HMS]/g);
                var hours = 0,
                    minutes = 0,
                    seconds = 0;

                if (matches) {
                    for (var i = 0; i < matches.length; i++) {
                        var match = matches[i];
                        var value = parseInt(match, 10);
                        if (match.indexOf('H') !== -1) {
                            hours = value;
                        } else if (match.indexOf('M') !== -1) {
                            minutes = value;
                        } else if (match.indexOf('S') !== -1) {
                            seconds = value;
                        }
                    }
                }

                return (hours > 0 ? hours + ':' : '') +
                    (minutes < 10 && hours > 0 ? '0' + minutes : minutes) + ':' +
                    (seconds < 10 ? '0' + seconds : seconds);
            }

            $('#video_url').on('input', function() {
                var apiKey = 'AIzaSyA9GY2fJCrkiRfvPoQuNlTmYnAfVZuBmJE';
                var videoId = $(this).val().split('v=')[1];

                $.ajax({
                    url: "https://www.googleapis.com/youtube/v3/videos?id=" + videoId +
                        "&key=" + apiKey + "&part=snippet,contentDetails,statistics,status",
                    method: 'GET',
                    success: function(result) {
                        if (result['items'][0] == undefined && $('#video_url').val() != '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Video tidak ditemukan',
                            });
                            return;
                        }

                        $('#title').val(result.items[0].snippet.title);
                        $('#description').val(result.items[0].snippet.description);
                        $('#duration').val(parseDuration(result.items[0].contentDetails.duration));
                    }
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
