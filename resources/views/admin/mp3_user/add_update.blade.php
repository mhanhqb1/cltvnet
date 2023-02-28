@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.mp3_user.save') }}" method="POST">
                    @csrf
                    @if (!empty($item->id))
                    <input type="hidden" name="id" value="{{ $item->id }}"/>
                    @endif
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty($item->name) ? $item->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="mp3_user_name">{{ __('Mp3 User') }}</label>
                        <input type="text" id="mp3_user_name" name="mp3_user_name" class="form-control" value="{{ !empty($item->mp3_user_name) ? $item->mp3_user_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="mp3_cookie">{{ __('Mp3 Cookie') }}</label>
                        <textarea name="mp3_cookie" id="mp3_cookie" rows="10" class="form-control">{{ !empty($item->mp3_cookie) ? $item->mp3_cookie : '' }}</textarea>
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
