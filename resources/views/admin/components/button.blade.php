@props([
    'variant' => 'primary',
    'label' => 'Button',
    'onclick' => '',
    'type' => 'button',
    'class' => '',
    'alpineClick' => '', // For Alpine.js @click directive
])

@php
    $variantStyles = match ($variant) {
        'primary' => 'text-white',
        'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
        'success' => 'bg-green-500 hover:bg-green-600 text-white',
        'danger' => 'bg-red-500 hover:bg-red-600 text-white',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        'info' => 'bg-blue-500 hover:bg-blue-600 text-white',
        'outline' => 'border text-green-700 hover:bg-green-700 hover:text-white',
        'ghost' => 'text-green-700 hover:bg-gray-100',
        default => 'text-white',
    };

    $variantInlineStyles = match ($variant) {
        'primary' => 'background-color: #556B2F;',
        'outline' => 'border-color: #C6D870;',
        'ghost' => 'color: #556B2F;',
        default => 'background-color: #556B2F;',
    };

    $variantHoverStyles = match ($variant) {
        'primary' => 'hover:opacity-90',
        'outline' => 'hover:bg-green-700 hover:text-white',
        'ghost' => 'hover:bg-gray-100',
        default => 'hover:opacity-90',
    };
@endphp

<button type="{{ $type }}" @if ($onclick) onclick="{{ $onclick }}" @endif
    @if ($alpineClick) @click="{{ $alpineClick }}" @endif
    class="inline-flex items-center justify-center rounded-lg font-medium transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 px-2 py-2 {{ $variantStyles }} {{ $variantHoverStyles }} {{ $class }}"
    style="{{ $variantInlineStyles }}"
    {{ $attributes->except(['class', 'variant', 'label', 'onclick', 'type', 'alpineClick']) }}>
    {{ $label }}
</button>
