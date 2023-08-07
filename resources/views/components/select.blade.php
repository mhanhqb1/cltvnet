@php
$values = explode(',', $value);
@endphp
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ !empty($multi) ? $name.'[]' : $name }}" id="{{ $name }}" class="form-control" {{ !empty($multi) ? 'multiple' : '' }}>
        <option></option>
        @foreach ($options as $k => $option)
        <option value="{{ $k }}" {{ in_array($k, $values) ? 'selected = "selected"' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
