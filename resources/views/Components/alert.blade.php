@props(['color'])

@php
    if ($color === 'green') {
        $divColor = 'text-green-800 border-green-300 bg-green-50 dark:text-green-400 dark:border-green-800';
        $spanColor = 'text-green-600';
        $buttonColor = 'bg-green-50 text-green-500 focus:ring-green-400 hover:bg-green-200 dark:text-green-400';
    } elseif ($color === 'blue') {
        $divColor = 'text-blue-800 border-blue-300 bg-blue-50 dark:text-blue-400 dark:border-blue-800';
        $spanColor = 'text-blue-600';
        $buttonColor = 'bg-blue-50 text-blue-500 focus:ring-blue-400 hover:bg-blue-200 dark:text-blue-400';
    } elseif ($color === 'red') {
        $divColor = 'text-red-800 border-red-300 bg-red-50 dark:text-red-400 dark:border-red-800';
        $spanColor = 'text-red-600';
        $buttonColor = 'bg-red-50 text-red-500 focus:ring-red-400 hover:bg-red-200 dark:text-red-400';
    }
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-4 p-4 mx-auto mb-4 text-sm border rounded-lg dark:bg-gray-800 w-fit ' . $divColor]) }}
    role="alert">
    <span {{ $attributes->merge(['class' => $spanColor]) }}>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </span>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{ $slot }}</span>
    </div>
    <button onclick="this.parentElement.remove()" type="button"
        {{ $attributes->merge(['class' => 'ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2  p-1.5  inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800  dark:hover:bg-gray-700 ' . $buttonColor]) }}
        data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
