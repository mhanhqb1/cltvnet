@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($settings as $k => $v)
                    <div class="form-group">
                        <label for="{{ $k }}">{{ __($v) }}</label>
                        @if ($k == 'web_description')
                        <textarea id="{{ $k }}" class="form-control" name="{{ $k }}" rows="4">{{ !empty($$k) ? $$k : '' }}</textarea>
                        @elseif (in_array($k, ['file_header_logo', 'file_footer_logo']))
                        <input type="file" id="{{ $k }}" name="{{ $k }}" class="form-control">
                        @if (!empty($$k))
                        <img src="{{ getImageUrl($$k) }}" width="200px"/>
                        @endif
                        @else
                        <input type="text" id="{{ $k }}" name="{{ $k }}" class="form-control" value="{{ !empty($$k) ? $$k : '' }}">
                        @endif
                    </div>
                    @endforeach
                    <div class="form-group">
                        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
