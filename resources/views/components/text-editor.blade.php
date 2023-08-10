<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea id="summernote" name="{{ !empty($multi) || !empty($multiLines) ? $name.'[]' : $name }}" class="form-control text-editor" rows="8">{!! $value !!}</textarea>
</div>
