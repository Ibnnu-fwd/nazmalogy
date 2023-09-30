<x-app-layout>
    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => route('admin.dashboard.index')],
        ['text' => 'Pengumpulan Tugas', 'link' => null],
    ]" />

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
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500 ">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Kursus</th>
                            <th scope="col" class="px-4 py-3">Pengguna</th>
                            <th scope="col" class="px-4 py-3">File</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 w-1/3">
                                    {{ $data->course_last_task->title }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ $data->submission->user->fullname }}
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ asset('storage/submissions/' . $data->attachment) }}" target="_blank"
                                        class="text-primary hover:underline">
                                        Lihat File
                                    </a>
                                </td>
                                <td
                                    class="px-4 py-3 uppercase {{ $data->status == 'pending'
                                        ? 'text-yellow-600'
                                        : ($data->status == 'approved'
                                            ? 'text-green-600'
                                            : ($data->status == 'rejected'
                                                ? 'text-red-600'
                                                : 'text-gray-600')) }}">
                                    {{ $data->status }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        <x-button text="Ubah Status" backgroundColor="black" hoverColor="black"
                                            id="edit-submission-button-{{ $data->id }}"
                                            modalTarget="create-submission" onclick="edit({{ $data->id }})" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

    <!-- Main modal -->
    <div id="create-submission" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-xs 2xl:text-sm font-semibold text-gray-900">
                        Ubah Status
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-tiny w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="create-submission">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST">
                    @csrf
                    <div class="p-6 space-y-6 text-tiny">
                        <x-select label="Status" id="status" name="status" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                            {{-- <option value="pending">Menunggu</option> --}}
                        </x-select>
                        <x-textarea label="Umpan balik" id="feedback" name="feedback" required value="" />
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <x-button text="Simpan" type="submit" />
                        <button data-modal-hide="create-submission" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-lg border border-gray-200 text-tiny font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            function edit(id) {
                $('#create-submission form').trigger('reset');
                let url = "{{ route('admin.submission.change-status', ':id') }}";
                url = url.replace(':id', id);
                $('#create-submission form').attr('action', url);
                $.ajax({
                    url: "{{ route('admin.submission.show', ':id') }}".replace(':id', id),
                    method: 'GET',
                    success: function(result) {
                        $('#create-submission #status').val(result.status);
                        $('#create-submission #feedback').val(result.feedback);
                    }
                });
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
