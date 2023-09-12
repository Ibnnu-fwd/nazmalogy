<x-app-layout>

    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => null],
        ['text' => 'Kursus', 'link' => null],
        ['text' => $playlist->title, 'link' => route('admin.playlist.index', $playlist->course_id)],
        ['text' => 'Materi', 'link' => null],
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
                    <x-button text="Tambah Materi" icon="add" backgroundColor="primary" hoverColor="primary"
                        fontSize="text-tiny" id="add-course-chapter-button" onclick="add()"
                        modalTarget="create-course-chapter" />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs 2xl:text-tiny text-left text-gray-500 ">
                    <thead class="text-xs 2xl:text-tiny text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">Thumbnail</th>
                            <th scope="col" class="px-4 py-3">Judul</th>
                            <th scope="col" class="px-4 py-3">Tautan</th>
                            <th scope="col" class="px-4 py-3">Durasi</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseChapters as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <td class="px-4 py-3">
                                    <?php
                                    $videoUrl = $data->video_url;
                                    $videoId = explode('=', parse_url($videoUrl, PHP_URL_QUERY))[1];
                                    $videoId = explode('&', $videoId)[0];
                                    $thumbnailUrl = "https://i3.ytimg.com/vi/{$videoId}/hqdefault.jpg";
                                    ?>

                                    <img src="<?php echo $thumbnailUrl; ?>"
                                        class="w-20 h-20 rounded-lg object-cover object-center">

                                </td>
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->title }}
                                </th>
                                <td class="px-4
                                py-3">
                                    <a href="https://www.youtube.com/watch?v={{ $data->video_url }}" target="_blank"
                                        class="text-blue-500 hover:text-blue-600">
                                        Lihat
                                    </a>
                                </td>
                                <td class="px-4
                                py-3">
                                    {{ \Carbon\CarbonInterval::seconds($data->duration)->cascade()->locale('id')->forHumans() }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        <x-button-edit id="edit-course-chapter-button-{{ $data->id }}"
                                            modalTarget="create-course-chapter" onclick="edit({{ $data->id }})" />
                                        <x-button-delete id="delete-course-chapter-button-{{ $data->id }}"
                                            modalTarget="delete-modal" onclick="destroy({{ $data->id }})" />
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
    <div id="create-course-chapter" tabindex="-1" aria-hidden="true"
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
                        data-modal-hide="create-course-chapter">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST">
                    @csrf
                    <div class="p-6 space-y-6 text-tiny">
                        <x-input label="Tautan" id="video_url" name="video_url" type="text" required
                            value="" />
                        <x-input label="Judul" id="title" name="title" type="text" required value="" />
                        <x-textarea label="Deskripsi" id="description" name="description" required value="" />
                        <x-input label="Durasi" id="duration" name="duration" type="text" required value="" />
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                        <x-button text="Simpan" type="submit" />
                        <button data-modal-hide="create-course-chapter" type="button"
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
            function add() {
                $('#create-course-chapter form').trigger('reset');
                let url = "{{ route('admin.course-chapter.store', ':playlist_id') }}";
                url = url.replace(':playlist_id', "{{ $playlist->id }}");
                $('#create-course-chapter form').attr('action', url);
            }

            function edit(id) {
                $('#create-course-chapter form').trigger('reset');
                let url = "{{ route('admin.course-chapter.update', ':id') }}";
                url = url.replace(':id', id);
                $('#create-course-chapter form').attr('action', url);
                $('#create-course-chapter form').append('<input type="hidden" name="_method" value="PUT">');
                $.ajax({
                    url: "{{ route('admin.course-chapter.show', ':id') }}".replace(':id', id),
                    method: 'GET',
                    success: function(result) {
                        $('#create-course-chapter #title').val(result.title);
                        $('#create-course-chapter #description').val(result.description);
                        $('#create-course-chapter #video_url').val(result.video_url);
                        $('#create-course-chapter #duration').val(result.duration);
                    }
                });
            }

            function destroy(id) {
                $('#delete-modal form').attr('action', "{{ route('admin.course-chapter.destroy', ':id') }}".replace(':id',
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
