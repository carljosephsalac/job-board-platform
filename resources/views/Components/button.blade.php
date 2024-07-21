@props(['type' => 'a', 'color' => 'gray'])

@if ($type === 'a')
    @if ($color === 'green')
        <a
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-green-700 transition duration-150 ease-in-out bg-green-50 border border-green-300 rounded-md hover:text-green-500 focus:outline-none focus:ring ring-green-300 focus:border-blue-300 active:bg-green-100 active:text-green-700 dark:bg-green-800 dark:border-green-600 dark:text-green-300 dark:focus:border-blue-700 dark:active:bg-green-700 dark:active:text-green-300']) }}>
            {{ $slot }}
        </a>
    @elseif ($color === 'blue')
        <a
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-blue-700 transition duration-150 ease-in-out bg-blue-50 border border-blue-300 rounded-md hover:text-blue-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-blue-100 active:text-blue-700 dark:bg-blue-800 dark:border-blue-600 dark:text-blue-300 dark:focus:border-blue-700 dark:active:bg-blue-700 dark:active:text-blue-300']) }}>
            {{ $slot }}
        </a>
    @elseif ($color === 'gray')
        <a
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300']) }}>
            {{ $slot }}
        </a>
    @endif
@elseif ($type === 'submit')
    @if ($color === 'green')
        <button type="submit"
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-green-700 transition duration-150 ease-in-out bg-green-50 border border-green-300 rounded-md hover:text-green-500 focus:outline-none focus:ring ring-green-300 focus:border-blue-300 active:bg-green-100 active:text-green-700 dark:bg-green-800 dark:border-green-600 dark:text-green-300 dark:focus:border-blue-700 dark:active:bg-green-700 dark:active:text-green-300 hover:cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @elseif ($color === 'blue')
        <button type="submit"
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-blue-700 transition duration-150 ease-in-out bg-blue-50 border border-blue-300 rounded-md hover:text-blue-500 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-blue-100 active:text-blue-700 dark:bg-blue-800 dark:border-blue-600 dark:text-blue-300 dark:focus:border-blue-700 dark:active:bg-blue-700 dark:active:text-blue-300 hover:cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @elseif ($color === 'red')
        <button type="submit"
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-red-700 transition duration-150 ease-in-out bg-red-50 border border-red-300 rounded-md hover:text-red-500 focus:outline-none focus:ring ring-red-300 focus:border-blue-300 active:bg-red-100 active:text-red-700 dark:bg-red-800 dark:border-red-600 dark:text-red-300 dark:focus:border-blue-700 dark:active:bg-red-700 dark:active:text-red-300 hover:cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @elseif ($color === 'gray')
        <button type="submit"
            {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300 hover:cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @endif
@endif
