@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.home_service_save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($item->id))
                        <input type="hidden" value="{{ $item->id }}" name="id"/>
                    @endif
                    <div class="form-group">
                        <label for="icon">{{ __('Flat Icon') }}</label>
                        <input type="text" id="icon" name="icon" class="form-control" value="{{ !empty($item->icon) ? $item->icon : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty($item->name) ? $item->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="category">{{ __('Category') }}</label>
                        <input type="text" id="category" name="category" class="form-control" value="{{ !empty($item->category) ? $item->category : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputImage">{{ __('Image') }}</label>
                        <input type="file" id="inputImage" name="image" class="form-control">
                    </div>
                    @if (!empty($item->image))
                        <div class="form-group">
                            <img src="{{ getImageUrl($item->image) }}" alt="old image" width="150px"/>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ __('Save') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
