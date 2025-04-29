@props([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => null,
    'required' => false,
    'error' => null,
    'class' => ''
])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="required">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-input ' . $class]) }}
    >

    @if($error)
        <p class="error-message">{{ $error }}</p>
    @endif
</div> 