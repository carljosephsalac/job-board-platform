@props([
    'type' => 'a',
    'color' => 'gray',
])

@php
    $colors = [
        'green' =>
            'text-green-700 bg-green-50 border-green-300 hover:text-green-500 focus:ring-green-300 active:bg-green-100 active:text-green-700 dark:bg-green-800 dark:border-green-600 dark:text-green-300 dark:focus:border-blue-700 dark:active:bg-green-700 dark:active:text-green-300 focus:border-green-300',
        'blue' =>
            'text-blue-700 bg-blue-50 border-blue-300 hover:text-blue-500 focus:ring-blue-300 active:bg-blue-100 active:text-blue-700 dark:bg-blue-800 dark:border-blue-600 dark:text-blue-300 dark:focus:border-blue-700 dark:active:bg-blue-700 dark:active:text-blue-300 focus:border-blue-300',
        'red' =>
            'text-red-700 bg-white border-red-300 hover:text-red-500 focus:ring-red-300 active:bg-red-100 active:text-red-700 dark:bg-red-800 dark:border-red-600 dark:text-red-300 dark:focus:border-blue-700 dark:active:bg-red-700 dark:active:text-red-300 focus:border-red-300',
        'gray' =>
            'text-gray-700 bg-white border-gray-300 hover:text-gray-500 focus:ring-gray-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300 focus:border-gray-300',
    ];

    $classes =
        'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out border rounded-md focus:outline-none ' .
        $colors[$color];
@endphp

@if ($type === 'a')
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@elseif ($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => $classes . ' hover:cursor-pointer']) }}>
        {{ $slot }}
    </button>
@elseif ($type === 'button')
    <button type="button" {{ $attributes->merge(['class' => $classes . ' hover:cursor-pointer']) }}>
        {{ $slot }}
    </button>
@endif
