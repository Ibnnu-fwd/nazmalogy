@props([
    'text' => 'Button',
    'icon' => '',
    'backgroundColor' => 'primary',
    'hoverColor' => 'primary',
    'fontSize' => 'text-tiny',
    'id' => '',
    'onclick' => '',
    'modalTarget' => '',
    'type' => 'button',
])

<button @if ($id) id                     = "{{ $id }}" @endif
    @if ($onclick) onclick               = "{{ $onclick }}" @endif
    @if ($type) type                     = "{{ $type }}" @endif
    @if ($modalTarget) data-modal-target = "{{ $modalTarget }}" data-modal-toggle = "{{ $modalTarget }}" @endif
    class="block items-center md:flex text-white bg-{{ $backgroundColor }} hover:bg-{{ $hoverColor }} text-xs 2xl:text-tiny font-medium rounded-lg {{ $fontSize }} px-5 py-2.5 text-center"
    type="button">
    @if ($icon)
        <ion-icon name="{{ $icon }}" class="-ml-0.5 mr-2 h-4 w-4"></ion-icon>
    @endif
    {{ $text }}
</button>
