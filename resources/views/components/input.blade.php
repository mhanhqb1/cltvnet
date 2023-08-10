<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text" name="{{ !empty($multi) || !empty($multiLines) ? $name.'[]' : $name }}" id="{{ empty($multiLines) ? $name : '' }}" class="form-control" value="{{ $value }}">
</div>
