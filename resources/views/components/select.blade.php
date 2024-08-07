<select name="{{ $name }}{{ $multiple ? '[]' : '' }}" id="{{ $name }}" class="form-control" {{ $multiple ? 'multiple' : '' }}>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ in_array($value, $selected) ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
