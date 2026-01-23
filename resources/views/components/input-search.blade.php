@props([
    'disabled' => false,
    'id' => '',
    'placeholder' => '',
    'value' => '',
    'name' => '',
    'type' => '',
    'required' => true,
])

<div
    {{ $attributes->merge(['class' => ($disabled ? 'text-inactive-color' : 'text-text-primary-color') . ' bg-secondary-color flex items-center gap-3 placeholder-inactive-color border border-border-color text-sm rounded-lg focus:ring-accent-color outline-accent-color focus:border-accent-color block w-full p-2.5 disabled:text-text-secondary-color disabled:brightness-[.98]']) }}>
    <img src="{{ asset('assets/icons/global/search.svg') }}" alt="">
    <input class="outline-none w-full h-full bg-transparent" {{ $disabled ? 'disabled' : '' }} type="{{ $type }}"
        id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}" name="{{ $name }}"
        {{ $required ? 'required' : '' }} autocomplete="off">
</div>
