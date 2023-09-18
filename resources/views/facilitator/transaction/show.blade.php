<x-app-layout>
    @php
        $dashboard = route('admin.dashboard.index');
        $transactionUrl = route('admin.transaction.index');
    @endphp

    <x-breadcrumb :items="[
        ['text' => 'Dashboard', 'link' => $dashboard],
        ['text' => 'Transaksi', 'link' => $transactionUrl],
        ['text' => 'Invoice', 'link' => null],
    ]" />

    <div class="max-w-xl mx-auto">
        <x-card>
            <div>
                <p class="text-xs 2xl:text-tiny font-medium">
                    Invoice
                </p>
                <span class="text-gray-600">#{{ uniqid() }}</span>
            </div>

            {{-- Detail --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 mt-6 space-y-4">
                <div>
                    <p class="mb-3 text-gray-400">Status</p>
                    <span class="bg-gray-100 text-primary text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full">
                        {{ ucwords($transaction->status) }}
                    </span>
                </div>
                <div>
                    <p class="mb-3 text-gray-400">Tanggal</p>
                    <p>
                        {{ $transaction->created_at->format('d F Y') }}
                    </p>
                </div>
                <div>
                    <p class="mb-3 text-gray-400">Dari</p>
                    <strong>CV NaZMa Office</strong>
                    <div class="text-gray-500">
                        <p>
                            Sleman, Yogyakarta
                        </p>
                        <p>(0274) 542850</p>
                        <p>nazmalogy.com</p>
                    </div>
                </div>
                <div>
                    <p class="mb-3 text-gray-400">Kepada</p>
                    <strong>{{ $transaction->user->fullname }}</strong>
                    <p class="text-gray-500">
                        {{ $transaction->user->email }}
                        <br>
                        {{ $transaction->user->phone }}
                    </p>
                </div>
            </div>

            {{-- Items --}}
            <p class="text-gray-500 mt-8 mb-3">Item</p>
            <hr class="mb-3">
            <div class="flex items-center justify-between">
                <p>
                    {{ $transaction->course->name }}
                </p>
                <p>
                    Rp{{ number_format($transaction->sub_total, 0, ',', '.') }}
                </p>
            </div>

            {{-- Total --}}
            <hr class="mt-4 mb-3">
            <div class="flex items-center justify-between">
                <p class="text-gray-500">
                    Total
                </p>
                <p class="font-semibold">
                    Rp{{ number_format($transaction->total_payment, 0, ',', '.') }}
                </p>
            </div>

            {{-- Payment Proof --}}
            <hr class="mt-4 mb-6">
            <div>
                <a href="{{ asset('storage/payment_proof/' . $transaction->payment_proof_file) }}" target="_blank"
                    class="bg-gray-100 text-black text-tiny font-medium mr-2 px-2.5 py-0.5 rounded-full flex items-center w-fit">
                    <ion-icon name="document-text" class="text-gray-500 mr-2"></ion-icon>
                    Bukti Pembayaran
                </a>
            </div>

            {{-- Action --}}
            <div class="mt-6 flex gap-x-2">
                @if ($transaction->status == 'paid')
                    <form action="{{ route('admin.transaction.change-status', $transaction->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="confirm">
                        <x-button type="submit" text="Approve" color="primary" />
                    </form>

                    <form action="{{ route('admin.transaction.change-status', $transaction->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="cancel">
                        <x-button type="submit" text="Reject" backgroundColor="red-500" hoverColor="red-600" />
                    </form>
                @endif
            </div>
        </x-card>
    </div>

    @push('js-internal')
        <script>
            $(function() {
                $('button[type=submit]').click(function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Status akan diubah, dan tidak dapat dikembalikan lagi!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, ubah!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent().submit();
                        }
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
