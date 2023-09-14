@props(['label' => '', 'icon' => '', 'route' => '#', 'onclick' => ''])

@php
    $isActive = url()->current() == $route;
@endphp

<li class="group hover:text-primary {{ $isActive ? 'text-primary' : '' }}">
    <a href="{{ $route }}" onclick="{{ $onclick }}"
        class="flex items-center p-2 {{ $isActive ? 'text-primary' : 'text-gray-900' }} rounded-lg group">
        @if ($icon)
            <ion-icon name="{{ $icon }}"
                class="text-gray-300 w-5 h-5 group-hover:text-primary {{ $isActive ? 'text-primary' : '' }}"></ion-icon>
        @endif
        <span class="ml-3 {{ $isActive ? 'text-primary' : '' }}">
            {{ $label }}
        </span>
    </a>
</li>
