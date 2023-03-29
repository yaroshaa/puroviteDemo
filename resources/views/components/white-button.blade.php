@php
    $classes =  'inline-block text-gray-400 hover:text-gray-600 align-center font-medium text-xl py-2 px-4 rounded-3xl bg-white fixed bottom-6 right-4 border-2 border-gray-400 hover:border-gray-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

