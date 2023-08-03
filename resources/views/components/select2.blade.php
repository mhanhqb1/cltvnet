<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ !empty($multi) ? $name.'[]' : $name }}" id="{{ $name }}" class="form-control select2" {{ !empty($multi) ? 'multiple' : '' }} style="width: 100%;">
        @foreach ($options as $k => $option)
        <option value="{{ $k }}" {{ $value == $k ? 'selected = "selected"' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
