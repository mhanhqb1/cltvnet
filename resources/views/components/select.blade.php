<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ !empty($multi) ? $name.'[]' : $name }}" id="{{ $name }}" class="form-control" {{ !empty($multi) ? 'multiple' : '' }}>
        <option></option>
        @foreach ($options as $k => $option)
        <option value="{{ $k }}" {{ $value == $k ? 'selected = "selected"' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
