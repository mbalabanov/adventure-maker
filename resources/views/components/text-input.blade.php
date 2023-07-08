@props(['disabled' => false, 'field' => ''])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
@error($field)
    <p class="text-red-500 text-xs">{{ $message }}</p>
@enderror