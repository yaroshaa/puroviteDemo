@php
    $classes =  'inline-block text-white align-center font-medium text-2xl py-2 px-4 rounded-3xl bg-blue-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

