@extends('layouts.admin_master')

@push('before_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.setting.top_banner_save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <textarea id="inputName" name="name" class="form-control summernote" >{{ !empty($item->name) ? $item->name : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputJob">{{ __('Description') }}</label>
                        <textarea id="inputJob" name="description" class="form-control summernote">{{ !empty($item->description) ? $item->description : '' }}</textarea>
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

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js" integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('document').ready(function() {
        $('.summernote').summernote({
            height: 150,
        });
    });
</script>

@endpush
