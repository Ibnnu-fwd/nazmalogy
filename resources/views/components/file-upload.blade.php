<div>
    <label class="block mb-2 text-tiny font-medium text-gray-900" for="{{ $id }}">{{ $label }}</label>
    <input class="block w-full text-tiny text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
        aria-describedby="{{ $id }}_help" id="{{ $id }}" type="{{ $type }}"
        name="{{ $name }}">

    @if ($help)
        <p class="mt-1 text-tiny text-gray-500" id="{{ $id }}_help">{{ $help }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-tiny text-red-500">{{ $message }}</p>
    @enderror
</div>
