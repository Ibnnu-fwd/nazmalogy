<x-app-layout>
    @php
        $dashboard = route('facilitator.index');
    @endphp

    <x-breadcrumb :items="[['text' => 'Dashboard', 'link' => $dashboard], ['text' => 'Transaksi', 'link' => null]]" />

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
                    <thead class="text-xs 2xl:text-tiny uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">Pengguna</th>
                            <th scope="col" class="px-4 py-3">Kategori</th>
                            <th scope="col" class="px-4 py-3">Tipe Kelas</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                            <th scope="col" class="px-4 py-3">Tanggal</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $data)
                            <tr class="{{ $loop->last ? '' : 'border-b border-gray-200' }}">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $data->course->name }}
                                </th>
                                <td class="px-4 py-3">
                                    {{ $data->user->fullname }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->price == 0 ? 'Gratis' : 'Premium' }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $data->course->courseCategory->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ number_format($data->total_payment, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('D/MM/Y HH:mm') }}
                                </td>
                                <td class="px-4 py-3 uppercase">
                                    {{ $data->status }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        @if ($data->status == 'pending')
                                            <form
                                                action="{{ route('facilitator.transaction.upload-proof', $data->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="payment_proof_file" class="hidden">
                                                <x-button text="Unggah Bukti Pembayaran" color="green"
                                                    id="uploadPayment" />
                                            </form>
                                        @elseif ($data->status == 'paid')
                                            <span>
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif ($data->status == 'confirm')
                                            <x-button text="Invoice" icon="document-outline"
                                                onclick="window.open('{{ route('facilitator.transaction.show', $data->id) }}')" />
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

    @push('js-internal')
        <script>
            $(function() {
                $('#uploadPayment').click(function(e) {
                    e.preventDefault();
                    $('input[name="payment_proof_file"]').click();

                    // check if input file has value and extention is image
                    $('input[name="payment_proof_file"]').change(function() {
                        if ($(this).val() != '') {
                            var ext = $(this).val().split('.').pop().toLowerCase();
                            if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'File yang diunggah harus berupa gambar!',
                                });
                                $(this).val('');
                                return false;
                            }

                            // submit form
                            $(this).parent().submit();
                        }
                    });
                });

                $('#search').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
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
