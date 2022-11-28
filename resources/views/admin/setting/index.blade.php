@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputWebName">{{ __('Web Name') }}</label>
                        <input type="text" id="inputWebName" name="web_name" class="form-control" value="{{ !empty($web_name) ? $web_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputFacebookId">{{ __('Facebook ID') }}</label>
                        <input type="text" id="inputFacebookId" name="facebook_id" class="form-control" value="{{ !empty($facebook_id) ? $facebook_id : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputGAId">{{ __('Google Analytic ID') }}</label>
                        <input type="text" id="inputGAId" name="ga_id" class="form-control" value="{{ !empty($ga_id) ? $ga_id : '' }}">
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
