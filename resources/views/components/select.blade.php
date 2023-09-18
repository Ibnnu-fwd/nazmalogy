<div>
    <label for="{{ $id }}" class="block mb-2 text-tiny font-medium text-gray-900 ">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-tiny rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        {{ $slot }}
    </select>

    @error($name)
        <p class="mt-1 text-tiny text-red-500">{{ $message }}</p>
    @enderror
</div>
