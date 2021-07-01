@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 text-base font-medium leading-5 text-current focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 border-transparent text-base font-medium leading-5 text-gray-500  hover:text-green-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
