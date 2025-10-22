@props([
    'name' => 'search',
    'placeholder' => 'Search...',
    'value' => '',
    'class' => '',
    'containerClass' => '',
])

@php
    $inputId = $name ?: 'search-' . uniqid();
@endphp

<div class="{{ $containerClass }}">
    <input id="{{ $inputId }}" name="{{ $name }}" type="text" placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}" autocomplete="off"
        class="w-full rounded-lg border px-3 py-2 text-gray-900 placeholder:text-gray-400 focus:outline-none placeholder:px-2 focus:ring-4 transition {{ $class }}"
        style="border-color: #C6D870; focus:ring-color: #8FA31E;"
        {{ $attributes->except(['class', 'containerClass']) }} />
</div>
