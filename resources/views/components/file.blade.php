@if (!empty($value) && strpos($name, 'image') >= 0)
<div class="form-group">
    <img src="{{ getImageUrl($value) }}" width="200px" />
</div>
@endif
<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="{{ empty($multiLines) ? $name : '' }}" name="{{ !empty($multi) || !empty($multiLines) ? $name.'[]' : $name }}">
            <label class="custom-file-label" for="{{ $name }}">{{ __('choose_file') }}</label>
        </div>
        <!-- <div class="input-group-append">
            <span class="input-group-text">{{ __('upload') }}</span>
        </div> -->
    </div>
</div>
