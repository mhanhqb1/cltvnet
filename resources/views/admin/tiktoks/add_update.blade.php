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
                <form action="{{ route('admin.tiktoks.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!empty($item->id))
                        <input type="hidden" value="{{ $item->id }}" name="id"/>
                    @endif
                    <div class="form-group">
                        <label for="inputName">{{ __('Unique ID') }}</label>
                        <input type="text" id="inputName" name="unique_id" class="form-control" value="{{ !empty($item->unique_id) ? $item->unique_id : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">{{ __('Type') }}</label>
                        <select id="inputCategory" class="select2 form-control" name="type">
                            @if (!empty($types))
                            @foreach ($types as $type => $typeLabel)
                            <option value="{{ $type }}" {{ isset($item->type) && $item->type->value == $type ? "selected='selected'" : '' }}>{{ $typeLabel }}</option>
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
                        <label for="inputDescription">{{ __('Note') }}</label>
                        <textarea id="inputDescription" class="form-control" name="note" rows="4">{{ !empty($item->note) ? $item->note : '' }}</textarea>
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
