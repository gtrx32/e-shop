@props(['disabled' => false, 'name' => '', 'value' => ''])

<textarea @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
    name="{{ $name }}">{{ $value }}</textarea>
