@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'class' => ''
])

@php
    $baseClass = 'btn';
    $variantClass = 'btn-' . $variant;
    $sizeClass = 'btn-' . $size;
    $classes = $baseClass . ' ' . $variantClass . ' ' . $sizeClass . ' ' . $class;
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
    {{ $slot }}
</button> 