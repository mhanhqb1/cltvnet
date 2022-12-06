@extends('layouts.admin_master')

@push('before_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.static_page.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="name" value="{{ $name }}"/>
                    <div class="form-group">
                        <label for="summernote">{{ __('Detail') }}</label>
                        <textarea id="summernote" class="form-control" name="content" rows="10">{{ !empty($item->content) ? $item->content : '' }}</textarea>
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
        $('#summernote').summernote({
            height: 450,
        });
    });
</script>

@endpush
