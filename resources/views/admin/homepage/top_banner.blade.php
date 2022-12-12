@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.top_banner_save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty($item->name) ? $item->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="inputJob">{{ __('Description') }}</label>
                        <textarea id="inputJob" name="description" class="form-control">{{ !empty($item->description) ? $item->description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputImage">{{ __('Image') }} (748 x 611 px)</label>
                        <input type="file" id="inputImage" name="image" class="form-control">
                    </div>
                    @if (!empty($item->image))
                        <div class="form-group">
                            <img src="{{ getImageUrl($item->image) }}" alt="old image" width="150px"/>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="btn_1_text">{{ __('Button 1 Text') }}</label>
                        <input type="text" id="btn_1_text" name="btn_1_text" class="form-control" value="{{ !empty($item->btn_1_text) ? $item->btn_1_text : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="btn_1_url">{{ __('Button 1 Url') }}</label>
                        <input type="text" id="btn_1_url" name="btn_1_url" class="form-control" value="{{ !empty($item->btn_1_url) ? $item->btn_1_url : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="btn_2_text">{{ __('Button 2 Text') }}</label>
                        <input type="text" id="btn_2_text" name="btn_2_text" class="form-control" value="{{ !empty($item->btn_2_text) ? $item->btn_2_text : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="btn_2_url">{{ __('Button 2 Url') }}</label>
                        <input type="text" id="btn_2_url" name="btn_2_url" class="form-control" value="{{ !empty($item->btn_2_url) ? $item->btn_2_url : '' }}">
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
