@props(['active' => false])

<li>
    <a class="{{ $active ? 'bg-secondary-color brightness-100 border-l-4 border-l-accent-color text-accent-color' : 'text-text-primary-color bg-secondary-color' }} hover:brightness-90 rounded-md w-full py-3 text-base flex flex-row gap-2 items-center pl-10"
        {{ $attributes }}>{{ $svg }} {{ $slot }}
    </a>
</li>
