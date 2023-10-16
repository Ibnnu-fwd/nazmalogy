+<x-app-layout>
    @php
        $dashboard = route('user.dashboard.index');
    @endphp

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => $dashboard], ['text' => $courseLastTask->title, 'link' => null]]" />

    <div class="max-w-3xl mx-auto">
        <x-card>

            <ol
                class="flex items-center w-full text-xs font-medium text-center text0xs 2xl:text-tiny text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="flex md:w-full items-center {{ $submission == null ? 'text-primary font-semibold ' : '' }} sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
                    <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                        <span class="hidden sm:inline-flex sm:ml-2">Tugas</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center {{ isset($submission) && $submission->status == 'pending' ? 'text-primary font-semibold ' : '' }}  after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
                    <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                        Pengumpulan
                    </span>
                </li>
                <li
                    class="flex items-center {{ isset($submission) && ($submission->status == 'approved' || $submission->status) == 'rejected' ? 'text-primary' : '' }}">
                    Status
                </li>
            </ol>


            <div class="mt-10">
                @if ($submission == null)
                    {{-- <h3 class="font-semibold text-xs 2xl:text-sm">Tugas</h3> --}}

                    <br>

                    <div class="grid grid-cols-1 lg:grid-cols-3">
                        <div>
                            <span class="text-gray-500">Judul</span>
                            <span>:</span>
                        </div>
                        <span class="col-span-2">
                            {{ $courseLastTask->title }}
                        </span>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-6">
                        <div>
                            <span class="text-gray-500">Deskripsi</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            {!! $courseLastTask->description !!}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-6">
                        <div>
                            <span class="text-gray-500">Unggah Pekerjaan</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            <form action="{{ route('user.last-task.attempt', $courseLastTask->id) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <x-file-upload label="" name="file" id="file"
                                    help="(Image, Dokumen, max.1MB)" />
                                <x-textarea label="Deskripsi" name="description" id="description" rows="3" />
                                <div class="mt-4">
                                    <x-button text="Kirim" type="submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif ($submission != null && $submission->status == 'pending')
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-6">
                        <div>
                            <span class="text-gray-500">File unggahan</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            {{-- check extension of file --}}
                            <a href="{{ asset('storage/submissions/' . $submission->attachment) }}" target="_blank">
                                Lihat file
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-2">
                        <div>
                            <span class="text-gray-500">Status</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            <span
                                class="bg-orange-300 text-orange-900 text-xs 2xl:text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full">Menunggu</span>
                        </div>
                    </div>

                    <div class="flex justify-center mt-10">
                        <img src="{{ asset('assets/ilustration_big/waiting_approval.png') }}"
                            class="w-full h-56 object-contain" alt="">
                    </div>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-6">
                        <div>
                            <span class="text-gray-500">File unggahan</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            {{-- check extension of file --}}
                            <a href="{{ asset('storage/submissions/' . $submission->attachment) }}" target="_blank">
                                Lihat file
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-2">
                        <div>
                            <span class="text-gray-500">Status</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            <span
                                class="
                                {{ $submission->status == 'rejected' ? 'bg-red-300 text-red-900' : ($submission->status == 'approved' ? 'bg-green-300 text-green-900' : 'bg-orange-300 text-orange-900') }}
                                text-xs 2xl:text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full capitalize">
                                {{ $submission->status }}
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 mt-2">
                        <div>
                            <span class="text-gray-500">Feedback</span>
                            <span>:</span>
                        </div>
                        <div class="col-span-2">
                            {{ $submission->feedback }}
                        </div>
                    </div>
                    @if ($submission->status == 'rejected')
                        <div class="grid grid-cols-1 lg:grid-cols-3 mt-8">
                            <div>
                                <span class="text-gray-500">Unggah Pekerjaan</span>
                                <span>:</span>
                            </div>
                            <div class="col-span-2">
                                <form action="{{ route('user.last-task.attempt', $courseLastTask->id) }}"
                                    method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    <x-file-upload label="" name="file" id="file"
                                        help="(Image, Dokumen, max.1MB)" />
                                    <x-textarea label="Deskripsi" name="description" id="description" rows="3" />
                                    <div class="mt-4">
                                        <x-button text="Kirim" type="submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    @elseif ($submission->status == 'approved')
                        <div class="flex justify-center mt-10">
                            <img src="{{ asset('assets/ilustration_big/approved.png') }}"
                                class="w-full h-56 object-contain" alt="">
                        </div>
                        <div class="mt-12">
                            <x-button text="Kembali" backgroundColor="black" hoverColor="black"
                                onclick="window.location.href='{{ route('user.dashboard.index') }}'" />
                        </div>
                    @endif
                @endif
            </div>
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
