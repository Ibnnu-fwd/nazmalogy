@props([
    'label' => '',
    'name' => '',
    'value' => '',
    'id' => '',
    'checked' => false,
])

<div class="flex items-center mb-4">
    <input id="{{ $id }}" type="radio" value="{{ $value }}" name="{{ $name }}"
        {{ $checked ? 'checked' : '' }}
        class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500">
    <label for="{{ $id }}" class="ml-2 text-xs 2xl:text-tiny font-medium text-gray-900">
        {{ $label }}
    </label>
</div>
