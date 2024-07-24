@props(['name'])

@error($name)
    <p class="absolute text-xs italic text-red-600 -bottom-5">{{ $message }}</p>
@enderror
