@extends('layouts.admin_master')

@push('before_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.post.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($item->id))
                        <input type="hidden" value="{{ $item->id }}" name="id"/>
                    @endif
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty($item->name) ? $item->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">{{ __('Category') }}</label>
                        <select id="inputCategory" class="select2 form-control" name="cates" multiple="multiple">
                            @if (!empty($cates))
                            @foreach ($cates as $cate)
                            <option value="{{ $cate->id }}" {{ in_array($cate->id, $postCates) ? "selected='selected'" : '' }}>{{ $cate->name }}</option>
                            @endforeach
                            @endif
                        </select>
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
                        <label for="inputDescription">{{ __('Description') }}</label>
                        <textarea id="inputDescription" class="form-control" name="description" rows="4">{{ !empty($item->description) ? $item->description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="summernote">{{ __('Detail') }}</label>
                        <textarea id="summernote" class="form-control" name="detail" rows="10">{{ !empty($item->detail) ? $item->detail : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSeoKeywords">{{ __('Seo Keywords') }}</label>
                        <input type="text" id="inputSeoKeywords" name="seo_keywords" class="form-control" value="{{ !empty($item->meta_keyword) ? $item->meta_keyword : '' }}"/>
                    </div>
                    <div class="form-group">
                        <label for="postStatus">{{ __('Status') }}</label>
                        <select name="status" class="form-control">
                            @foreach ($postStatus as $v)
                                <option value="{{ $v->value }}" {{ isset($item->status) && $item->status == $v->value ? 'selected="selected"' : '' }}>{{ __($v->key) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ __('Save') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js" integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('document').ready(function() {
        $('.select2').select2();
        $('#summernote').summernote({
            height: 450,
        });
    });
</script>

@endpush
