@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'inline-block border-gray-300 focus:border-gray-400 focus:ring-gray-400 rounded-md']) !!}>
    {{$slot}}
</textarea>

