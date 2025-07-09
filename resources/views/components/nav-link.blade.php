@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 w-full px-4 py-2 rounded-lg bg-purple-600 text-white font-semibold shadow-md transition-colors duration-200'
            : 'flex items-center gap-3 w-full px-4 py-2 rounded-lg text-gray-600 hover:bg-purple-100 hover:text-purple-700 transition-colors duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>