@extends('layouts.admin_master')

@push('before_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputName">{{ __('Name') }}</label>
                    <input type="text" id="inputName" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputCategory">{{ __('Category') }}</label>
                    <select id="inputCategory" class="select2 form-control" multiple="multiple">
                        @if (!empty($cates))
                        @foreach ($cates as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputImage">{{ __('Image') }}</label>
                    <input type="file" id="inputImage" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">{{ __('Description') }}</label>
                    <textarea id="inputDescription" class="form-control" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputDetail">{{ __('Detail') }}</label>
                    <textarea id="inputDetail" class="form-control" name="detail" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputSeoKeywords">{{ __('Seo Keywords') }}</label>
                    <input type="text" id="inputSeoKeywords" name="seo_keywords" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('document').ready(function() {
        $('.select2').select2();
    });
</script>

@endpush
