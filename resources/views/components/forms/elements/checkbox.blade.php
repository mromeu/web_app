<div class="form-check">
    <input
        type="checkbox"
        class="form-check-input"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        value="{{ $value ?? '1' }}"
        {{ $checked ? 'checked' : '' }}
        />
    @isset($label)
        <label
            for="{{ $id }}"
            class="form-check-label">{{ $label }}</label>
    @endisset
</div>