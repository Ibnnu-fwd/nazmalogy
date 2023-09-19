<x-app-layout>
    @php
        $dashboard = route('user.dashboard.index');
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
                            <th scope="col" class="px-4 py-3">Kategori</th>
                            <th scope="col" class="px-4 py-3">Tipe Kelas</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                            <th scope="col" class="px-4 py-3">Tanggal</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Kd. Referal</th>
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
                                <td class="px-4 py-3 uppercase">
                                    {{ $data->ref_code == null ? '-' : substr($data->ref_code, 0, 4) . '****' }}
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end space-x-2">
                                        @if ($data->status == 'pending')
                                            @if ($data->ref_code == null)
                                                <x-button text="Masukan Referal"
                                                    id="edit-referal-button-{{ $data->id }}"
                                                    modalTarget="create-referal" onclick="edit({{ $data->id }})" />
                                            @endif
                                            <form action="{{ route('user.transaction.upload-proof', $data->id) }}"
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
                                                onclick="window.open('{{ route('user.transaction.show', $data->id) }}')" />
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
    <div id="create-referal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t">
                    <h3 class="text-xs 2xl:text-sm font-semibold text-gray-900">
                        Masukan Kode Referal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-tiny w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="create-referal">
                        <ion-icon name="close-outline" class="text-gray-600 w-4 h-4"></ion-icon>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div id="referal-list" class="p-6 space-y-4"></div>

                <!-- Modal body -->
                <form action="" method="POST">
                    @csrf
                    <div class="p-6 space-y-6 text-tiny">
                        <x-input label="Kode" id="ref_code" name="ref_code" type="text" required value=""
                            readonly />
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

    @push('js-internal')
        <script>
            function edit(id) {
                let url = '{{ route('user.transaction.detail', ':id') }}';
                url = url.replace(':id', id);

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        // if any, add list of referal
                        let referals = response;

                        if (referals.length > 0) {
                            let html = '';
                            referals.forEach((referal, index) => {
                                html += `
                                <div class="space-y-2">
                                            <label class="block cursor-pointer space-x-2 items-center">
                                                <input type="radio" name="referral" value="${referal.ref_code}" onclick="logReferral(this)">
                                                <span class="text-xs 2xl:text-sm font-semibold text-gray-900">${referal.ref_code}</span> | <span class="text-xs 2xl:text-sm text-gray-400">${referal.expire_at}</span>
                                            </label>
                                        </div>`;
                            });
                            $('#referal-list').html(html);
                        }

                        let formUrl = '{{ route('user.transaction.attempt-referral', ':id') }}';
                        formUrl = formUrl.replace(':id', id);
                        $('form').attr('action', formUrl);
                    }
                });
            }

            function logReferral(e) {
                let ref_code = $(e).val();
                $('#ref_code').val(ref_code);
            }

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
