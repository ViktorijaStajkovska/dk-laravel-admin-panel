@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-600 focus:ring-gray-600 rounded-md shadow-sm']) !!}>
