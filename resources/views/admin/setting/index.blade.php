@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.save') }}" method="POST">
                    @csrf
                    @foreach ($settings as $k => $v)
                    <div class="form-group">
                        <label for="{{ $k }}">{{ __($v) }}</label>
                        <input type="text" id="{{ $k }}" name="{{ $k }}" class="form-control" value="{{ !empty($$k) ? $$k : '' }}">
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