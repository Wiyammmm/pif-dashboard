@props([
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'off',
    'label' => '',
    'help' => '',
    'error' => '',
    'icon' => '',
    'iconPosition' => 'left',
    'class' => '',
    'containerClass' => '',
    'size' => 'default', // 'sm', 'default', 'lg'
])

@php
    $inputId = $name ?: 'input-' . uniqid();
    $hasError = $error || $errors->has($name);

    $sizeClass = match ($size) {
        'sm' => 'px-2 py-1 text-sm',
        'lg' => 'px-4 py-3 text-lg',
        default => 'px-3 py-2',
    };

    $iconClass = $icon ? ($iconPosition === 'left' ? 'pl-10' : 'pr-10') : '';
@endphp

<div class="w-full {{ $containerClass }}">
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
                'w-full rounded-lg border text-gray-900 placeholder:text-gray-400 px-2 focus:outline-none focus:ring-4 transition',
                $sizeClass,
                $iconClass,
                'border-gray-300' => !$hasError,
                'border-red-500' => $hasError,
                'bg-gray-50 cursor-not-allowed' => $disabled,
                'bg-gray-50' => $readonly,
                $class,
            ])
            style="border-color: #C6D870; focus:ring-color: #8FA31E;"
            {{ $attributes->except(['class', 'containerClass', 'size', 'icon', 'iconPosition', 'label', 'help', 'error']) }} />

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
