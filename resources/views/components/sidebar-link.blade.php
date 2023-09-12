@props(['label' => '', 'icon' => '', 'route' => '#'])

@php
    $isActive = request()->routeIs($route) || request()->routeIs($route . '.*');
@endphp

<li class="group hover:text-primary {{ $isActive ? 'text-primary' : '' }}">
    <a href="{{ $route }}" class="flex items-center p-2 text-gray-900 rounded-lg group">
        @if ($icon)
            <ion-icon name="{{ $icon }}" class="text-gray-300 w-4 h-4 group-hover:text-primary"></ion-icon>
        @endif
        <span class="ml-3 {{ $isActive ? 'text-primary' : '' }}">
            {{ $label }}
        </span>
    </a>
</li>
