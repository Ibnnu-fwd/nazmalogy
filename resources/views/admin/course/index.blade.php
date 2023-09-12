<x-app-layout>

    @php
        $dashboard = route('admin.dashboard.index');
    @endphp

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => $dashboard], ['text' => 'Kursus', 'link' => null]]" />
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
                    <x-button text="Tambah Kursus" icon="add" backgroundColor="primary" hoverColor="primary"
                        fontSize="text-tiny" id="add-course-button" onclick="add()" modalTarget="create-course" />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Judul</th>
                            <th scope="col" class="px-4 py-3">Level</th>
                            <th scope="col" class="px-4 py-3">Bahasa</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                            <th scope="col" class="px-4 py-3">Diskon</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-lg"
                                        src="{{ $data->thumbnail ? asset('storage/courses/' . $data->thumbnail) : asset('assets/noimage.svg') }}"
                                        alt="Jese image">
                                    <div class="pl-3">
                                        <div class="text-tiny font-semibold">
                                            {{ $data->name }}
                                        </div>
                                        <div class="font-normal text-gray-500">
                                            {{ $data->courseCategory->name }}
                                        </div>
                                    </div>
                                </th>
                                <td class="px-4 py-3">
                                    {{ $data->level }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->language }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ number_format($data->price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ number_format($data->discount, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                    @if ($data->is_active)
                                        <x-button-edit id="edit-course-button-{{ $data->id }}"
                                            modalTarget="create-course" onclick="edit({{ $data->id }})" />
                                        <x-button-delete id="delete-course-button-{{ $data->id }}"
                                            modalTarget="delete-modal" onclick="destroy({{ $data->id }})" />
                                    @else
                                        <form action="{{ route('admin.course.recover', $data->id) }}" method="POST">
                                            @csrf
                                            <x-button-restore type="submit" />
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-card>

    <!-- Main modal -->
    <div id="create-course" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xs 2xl:text-sm font-semibold text-gray-900 dark:text-white">
                        Tambah Kursus
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-tiny w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="create-course">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-6 text-tiny">
                        <x-input label="Judul" id="name" name="name" type="text" required value="" />
                        <x-select label="Kategori" id="course_category_id" name="course_category_id" required>
                            @forelse ($courseCategories as $courseCategory)
                                <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                            @empty
                                <option value="">Tidak ada kategori</option>
                            @endforelse
                        </x-select>
                        <x-file-upload label="Thumbnail" id="file_input" name="thumbnail" type="file"
                            help="PNG, JPG (MAX. 1MB)" />
                        <x-input label="Harga" id="price" name="price" type="number" required value="" />
                        <x-textarea label="Deskripsi" id="description" name="description" row="4"
                            placeholder="" required />
                        <x-input label="Bahasa" id="language" name="language" type="text" required
                            value="" />
                        <x-select label="Level" id="level" name="level" required>
                            <option value="beginner">Mudah</option>
                            <option value="intermediate">Menengah</option>
                            <option value="advanced">Sulit</option>
                        </x-select>
                        <x-input label="No. Telepon" id="phone" name="phone" type="text" required
                            value="" placeholder="contoh: 6285xxx" />
                        <x-input label="Diskon" id="discount" name="discount" type="number" value=""
                            placeholder="contoh: 10000" />

                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-tiny px-5 py-2.5 text-center">
                            Simpan
                        </button>
                        <button data-modal-hide="create-course" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-purple-300 rounded-lg border border-gray-200 text-tiny font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Batal
                        </button>
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
            function add() {
                $('#create-course form').trigger('reset');
                let url = '{{ route('admin.course.store') }}';
                $('#create-course form').attr('action', url);
                $('#create-course #file_input').attr('required', true);
                $('#create-course form').find('input[name="_method"]').remove();
            }

            function edit(id) {
                let url = '{{ route('admin.course.update', ':id') }}';
                url = url.replace(':id', id);
                $('#create-course form').append('<input type="hidden" name="_method" value="PUT">');
                $.ajax({
                    url: '{{ route('admin.course.show', ':id') }}'.replace(':id', id),
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#create-course form').attr('action', url);
                        $('#create-course #name').val(data.name);
                        $('#create-course #course_category_id').val(data.course_category_id);
                        $('#create-course #price').val(data.price);
                        $('#create-course #description').val(data.description);
                        $('#create-course #language').val(data.language);
                        $('#create-course #level').val(data.level);
                        $('#create-course #phone').val(data.phone);
                        $('#create-course #file_input').val('');
                        $('#create-course #file_input').attr('required', false);
                        $('#create-course #discount').val(data.discount);
                    }
                });
            };

            function destroy(id) {
                let url = '{{ route('admin.course.destroy', ':id') }}';
                url = url.replace(':id', id);
                $('#delete-modal form').attr('action', url);
            }

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
