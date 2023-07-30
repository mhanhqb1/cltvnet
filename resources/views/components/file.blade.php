<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="{{ $name }}" name="{{ $name }}">
            <label class="custom-file-label" for="{{ $name }}">{{ __('choose_file') }}</label>
        </div>
        <!-- <div class="input-group-append">
            <span class="input-group-text">{{ __('upload') }}</span>
        </div> -->
    </div>
</div>
