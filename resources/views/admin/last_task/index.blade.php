<x-app-layout>

    @php
        $dashboard = route('admin.dashboard.index');
    @endphp

    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => $dashboard],
        ['text' => 'Kursus', 'link' => route('admin.course.index')],
        ['text' => 'Tugas Akhir', 'link' => null],
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
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <x-button text="Tambah Tugas" icon="add" backgroundColor="primary" hoverColor="primary"
                        fontSize="text-tiny" id="add-course-last-task-button" onclick="add()"
                        modalTarget="create-course-last-task" />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500 ">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Judul</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseLastTasks as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ Str::limit($data->title, 50) }}
                                </th>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        @if ($data->is_active)
                                            <x-button-edit id="edit-course-last-task-button-{{ $data->id }}"
                                                modalTarget="create-course-last-task"
                                                onclick="edit({{ $data->id }})" />
                                            <x-button-delete id="delete-course-last-task-button-{{ $data->id }}"
                                                modalTarget="delete-modal" onclick="destroy({{ $data->id }})" />
                                        @else
                                            <form action="{{ route('admin.course-last-task.restore', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                <x-button-restore type="submit" />
                                            </form>
                                        @endif
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
    <div id="create-course-last-task" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-xs 2xl:text-sm font-semibold text-gray-900">
                        Tambah Kursus
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-tiny w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="create-course-last-task">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST">
                    @csrf
                    <div class="p-6 space-y-6 text-tiny">
                        <x-input label="Judul" id="title" name="title" type="text" required value="" />
                        <x-textarea label="Deskripsi" id="description" name="description" required value="" />
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <x-button text="Simpan" type="submit" />
                        <button data-modal-hide="create-course-last-task" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-lg border border-gray-200 text-tiny font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
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
        {{-- ckeditor4 --}}
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description');

            function add() {
                $('#create-course-last-task form').trigger('reset');
                let url = "{{ route('admin.course-last-task.store', $course_id) }}";
                $('#create-course-last-task form').attr('action', url);
                // remove method put
                $('#create-course-last-task form input[name="_method"]').remove();
            }

            function edit(id) {
                $('#create-course-last-task form').trigger('reset');
                let url = "{{ route('admin.course-last-task.update', ':id') }}";
                url = url.replace(':id', id);
                $('#create-course-last-task form').attr('action', url);
                $('#create-course-last-task form').append('<input type="hidden" name="_method" value="PUT">');
                $.ajax({
                    url: "{{ route('admin.course-last-task.show', ':id') }}".replace(':id', id),
                    method: 'GET',
                    success: function(result) {
                        $('#create-course-last-task #title').val(result.title);
                        CKEDITOR.instances['description'].setData(result.description);
                    }
                });
            }

            function destroy(id) {
                $('#delete-modal form').attr('action', "{{ route('admin.course-last-task.destroy', ':id') }}".replace(':id',
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
