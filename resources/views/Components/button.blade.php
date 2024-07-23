@props(['type' => 'a', 'color' => 'gray'])

@if ($type === 'a')
    <a
        {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-' . $color . '-700 transition duration-150 ease-in-out bg-' . $color . '-50 border border-' . $color . '-300 rounded-md hover:text-' . $color . '-500 focus:outline-none focus:ring ring-' . $color . '-300 focus:border-blue-300 active:bg-' . $color . '-100 active:text-' . $color . '-700 dark:bg-' . $color . '-800 dark:border-' . $color . '-600 dark:text-' . $color . '-300 dark:focus:border-blue-700 dark:active:bg-' . $color . '-700 dark:active:text-' . $color . '-300']) }}>
        {{ $slot }}
    </a>
@elseif ($type === 'submit')
    <button type="submit"
        {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-' . $color . '-700 transition duration-150 ease-in-out bg-' . $color . '-50 border border-' . $color . '-300 rounded-md hover:text-' . $color . '-500 focus:outline-none focus:ring ring-' . $color . '-300 focus:border-blue-300 active:bg-' . $color . '-100 active:text-' . $color . '-700 dark:bg-' . $color . '-800 dark:border-' . $color . '-600 dark:text-' . $color . '-300 dark:focus:border-blue-700 dark:active:bg-' . $color . '-700 dark:active:text-' . $color . '-300']) }}>
        {{ $slot }}
    </button>
@endif
