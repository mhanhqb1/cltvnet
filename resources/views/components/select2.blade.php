@php
$values = explode(',', $value);
@endphp
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select autocomplete="off" name="{{ !empty($multi) ? $name.'[]' : $name }}" id="{{ $name }}" class="form-control select2" {{ !empty($multi) ? 'multiple' : '' }} style="width: 100%;">
        @foreach ($options as $k => $option)
        <option value="{{ $k }}" {{ in_array($k, $values) ? 'selected = "selected"' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
