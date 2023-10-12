@props([
    'fontSize' => 'text-tiny',
    'text' => 'Ubah',
    'id' => '',
    'onclick' => '',
    'modalTarget' => '',
    'type' => 'button',
])

<button @if ($id) id="{{ $id }}" @endif
    @if ($onclick) onclick="{{ $onclick }}" @endif
    @if ($type) type="{{ $type }}" @endif
    @if ($modalTarget) data-modal-target="{{ $modalTarget }}" data-modal-toggle="{{ $modalTarget }}" @endif
    class="block items-center md:flex text-white bg-orange-500 hover:bg-orange-700 text-xs 2xl:text-tiny font-medium rounded-lg {{ $fontSize }} px-5 py-2.5 text-center"
    type="button">
    {{ $text }}
</button>
