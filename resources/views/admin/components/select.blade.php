@props([
    'name' => '',
    'placeholder' => 'Select an option',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'label' => '',
    'help' => '',
    'error' => '',
    'options' => [],
    'class' => '',
    'containerClass' => '',
    'autoWidth' => false,
    'minWidth' => '',
    'maxWidth' => '',
    'dynamicWidth' => false,
])

@php
    $selectId = $name ?: 'select-' . uniqid();
    $hasError = $error || $errors->has($name);

    // Handle width classes
    $widthClass = $autoWidth ? 'w-auto' : 'w-full';
    if ($minWidth) {
        $widthClass = $minWidth;
    }
    if ($maxWidth) {
        $widthClass .= ' ' . $maxWidth;
    }

    // Get current selected value text for initial width calculation
    $currentValue = old($name, $value);
    $currentText = $placeholder;
    if ($currentValue && isset($options[$currentValue])) {
        $currentText = $options[$currentValue];
    }
@endphp

<div class="{{ $widthClass }} {{ $containerClass }}"
    @if ($dynamicWidth) x-data="{
         selectId: '{{ $selectId }}',
         minWidth: '{{ $minWidth }}',
         maxWidth: '{{ $maxWidth }}',
         init() {
             this.resizeSelect();
             this.$watch('$el.querySelector(\'select\').value', () => this.resizeSelect());
         },
         resizeSelect() {
             const select = this.$el.querySelector('select');
             if (!select) return;

             const selectedOption = select.options[select.selectedIndex];
             const text = selectedOption ? selectedOption.text : '{{ $placeholder }}';

             // Create a temporary element to measure text width
             const temp = document.createElement('span');
             temp.style.visibility = 'hidden';
             temp.style.position = 'absolute';
             temp.style.fontSize = window.getComputedStyle(select).fontSize;
             temp.style.fontFamily = window.getComputedStyle(select).fontFamily;
             temp.style.fontWeight = window.getComputedStyle(select).fontWeight;
             temp.style.padding = '0 12px'; // Account for select padding
             temp.textContent = text;

             document.body.appendChild(temp);
             const textWidth = temp.offsetWidth + 20; // Add some extra space
             document.body.removeChild(temp);

             // Apply min/max width constraints
             let finalWidth = textWidth;
             if (this.minWidth) {
                 const minWidthPx = this.getWidthInPx(this.minWidth);
                 finalWidth = Math.max(finalWidth, minWidthPx);
             }
             if (this.maxWidth) {
                 const maxWidthPx = this.getWidthInPx(this.maxWidth);
                 finalWidth = Math.min(finalWidth, maxWidthPx);
             }

             select.style.width = finalWidth + 'px';
         },
         getWidthInPx(widthClass) {
             // Convert Tailwind width classes to pixels
             const widthMap = {
                 'w-16': 64, 'w-20': 80, 'w-24': 96, 'w-28': 112, 'w-32': 128,
                 'w-36': 144, 'w-40': 160, 'w-44': 176, 'w-48': 192, 'w-52': 208,
                 'w-56': 224, 'w-60': 240, 'w-64': 256, 'w-72': 288, 'w-80': 320
             };
             return widthMap[widthClass] || 100;
         }
     }" @endif>
    @if ($label)
        <label for="{{ $selectId }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select id="{{ $selectId }}" name="{{ $name }}" @if ($required) required @endif
        @if ($disabled) disabled @endif @class([
            $dynamicWidth ? 'w-auto' : ($autoWidth ? 'w-auto' : 'w-full'),
            'rounded-lg border px-3 py-2 text-gray-900 focus:outline-none focus:ring-4 transition',
            'border-gray-300' => !$hasError,
            'border-red-500' => $hasError,
            'bg-gray-50 cursor-not-allowed' => $disabled,
            $class,
        ])
        style="border-color: #C6D870; focus:ring-color: #8FA31E;{{ $dynamicWidth ? ' min-width: ' . ($minWidth ? str_replace('w-', '', $minWidth) * 4 . 'px' : '60px') . ';' : '' }}"
        {{ $attributes->except(['class', 'containerClass', 'options', 'autoWidth', 'minWidth', 'maxWidth', 'dynamicWidth']) }}>
        @if ($placeholder)
            <option value="" disabled {{ old($name, $value) ? '' : 'selected' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach

        {{ $slot }}
    </select>

    @if ($help && !$hasError)
        <p class="mt-1 text-sm text-gray-500">{{ $help }}</p>
    @endif

    @if ($hasError)
        <p class="mt-1 text-sm text-red-600">
            {{ $error ?: $errors->first($name) }}
        </p>
    @endif
</div>
