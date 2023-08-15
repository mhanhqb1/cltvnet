<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ empty($multiLines) ? $name : '' }}" name="{{ !empty($multi) || !empty($multiLines) ? $name.'[]' : $name }}" class="form-control" rows="4">{{ $value }}</textarea>
</div>
