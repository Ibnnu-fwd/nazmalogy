@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' =>'rounded-full w-full text-xs 2xl:text-sm bg-white border-none mt-2 shadow-sm h-14 p-4']) !!}>
