<x-app-layout>

    @php
    $dashboard = route('admin.dashboard.index');
    @endphp

<x-breadcrumb :items="[
    ['text' => 'Dashboard', 'link' => null],
    ['text' => 'Kursus', 'link' => null],
    ['text' => 'Playlist', 'link' => null],
    ['text' => 'Materi', 'link' => null],
    ['text' => 'Course Chapter Review', 'link' => null],
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
                {{-- <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <x-button text="Tambah course-chapter-review" icon="add" backgroundColor="primary" hoverColor="primary"
                        fontSize="text-tiny" id="add-course-chapter-review-button" onclick="add()" modalTarget="create-course-chapter-review" />
                </div> --}}
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500 ">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama Course</th>
                            <th scope="col" class="px-4 py-3">Pengguna</th>
                            <th scope="col" class="px-4 py-3">Content</th>
                            <th scope="col" class="px-4 py-3">Rating</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseChapterReviews as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    ad
                                </th>
                                <td class="px-4 py-3">
                                    {{$data->user->fullname}}    
                                </td>  
                                <td class="px-4 py-3">
                                    {{ Str::limit($data->content, 60) }}
                                </td>                        
                                </td>
                                <td class="px-4 py-3">
                                    @for ($i = 1; $i <= $data->rating; $i++)
                                    <ion-icon name="star" class="text-yellow-500 w-4 h-4"></ion-icon>
                                    @endfor                                
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                    </div>
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
            $('#search').on('keyup', function() {
                let value = $(this).val().toLowerCase();
                $('tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    content: 'Berhasil',
                    text: '{{ Session::get('success') }}',
                });
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    content: 'Gagal',
                    text: '{{ Session::get('error') }}',
                });
            @endif
        </script>
    @endpush

</x-app-layout>
