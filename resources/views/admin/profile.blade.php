@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.admin.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" disabled value="{{ $item->email }}"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('New Pass') }}</label>
                        <input type="password" name="new_pass" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
