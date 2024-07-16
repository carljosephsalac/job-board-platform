@props(['active' => false, 'type' => 'a'])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-sm font-medium rounded-md"
        aria-current="{{ $active ? 'page' : '' }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@elseif ($type === 'button')
    <button onclick="alert('Button clicked')"
        class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 text-sm font-medium rounded-md"
        aria-current="{{ $active ? 'page' : '' }}" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
