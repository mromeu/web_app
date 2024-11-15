<div class="{{ $col }}">
    @if($label)
        <label class="form-label" for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        <option></option>
        @foreach($options as $value => $text)
            <option 
            value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div> 