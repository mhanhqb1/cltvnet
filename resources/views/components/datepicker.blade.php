<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-group date" id="{{ $name }}" data-target-input="nearest">
        <input type="text" autocomplete="off" class="form-control datetimepicker-input" name="{{ $name }}" data-target="#{{ $name }}"  value="{{ $value }}">
        <div class="input-group-append" data-target="#{{ $name }}" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
    </div>
</div>
