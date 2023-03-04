@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.album.save') }}" method="POST">
                    @csrf
                    @if (!empty($item->id))
                    <input type="hidden" name="id" value="{{ $item->id }}"/>
                    @endif
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty($item->name) ? $item->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="mp3_id">{{ __('Mp3 ID') }}</label>
                        <input type="text" id="mp3_id" name="mp3_id" class="form-control" value="{{ !empty($item->mp3_id) ? $item->mp3_id : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control">{{ !empty($item->description) ? $item->description : '' }}</textarea>
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
