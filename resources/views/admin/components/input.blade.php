@props([
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'off',
    'size' => 'default', // 'sm', 'default', 'lg'
    'variant' => 'default', // 'default', 'error', 'success'
    'label' => '',
    'help' => '',
    'error' => '',
    'icon' => '',
    'iconPosition' => 'left', // 'left', 'right'
    'class' => '',
])

@php
    $inputId = $name ?: 'input-' . uniqid();
    $hasError = $error || $errors->has($name);
    $variantClass = match ($variant) {
        'error' => 'border-red-500 focus:ring-red-500/20',
        'success' => 'border-green-500 focus:ring-green-500/20',
        default => 'border-[#C6D870] focus:ring-[#8FA31E]/20',
    };

    $sizeClass = match ($size) {
        'sm' => 'px-2 py-1 text-sm',
        'lg' => 'px-4 py-3 text-lg',
        default => 'px-3 py-2',
    };

    $iconClass = $icon ? ($iconPosition === 'left' ? 'pl-10' : 'pr-10') : '';
@endphp

<div class="w-full {{ $class }}">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        @if ($icon && $iconPosition === 'left')
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="{{ $icon }} text-gray-400"></i>
            </div>
        @endif

        <input id="{{ $inputId }}" name="{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" autocomplete="{{ $autocomplete }}"
            @if ($required) required @endif @if ($disabled) disabled @endif
            @if ($readonly) readonly @endif @class([
                'w-full rounded-lg border text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-4 transition',
                $sizeClass,
                $variantClass,
                $iconClass,
                'border-gray-300' => !$hasError && $variant === 'default',
                'border-red-500' => $hasError,
                'bg-gray-50 cursor-not-allowed' => $disabled,
                'bg-gray-50' => $readonly,
            ])
            {{ $attributes->except(['class', 'size', 'variant', 'label', 'help', 'error', 'icon', 'iconPosition']) }} />

        @if ($icon && $iconPosition === 'right')
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <i class="{{ $icon }} text-gray-400"></i>
            </div>
        @endif
    </div>

    @if ($help && !$hasError)
        <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif

    @if ($hasError)
        <p class="mt-1 text-sm text-red-600">
            {{ $error ?: $errors->first($name) }}
        </p>
    @endif
</div>
