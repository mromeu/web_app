<div class="{{ $col }}">
    @isset($label)
        <label
            for="{{ $id }}"
            class="form-label">{{ $label }}</label>
    @endisset
    <input
        type="{{ $type ?? 'text' }}"
        class="{{ $class ?? 'form-control'}}"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ old($name, $value ?? '') }}"
        />
</div>
