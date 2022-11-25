@extends('layouts.admin_master')

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
                    <select id="inputCategory" class="form-control custom-select">
                        <option selected="" disabled="">Select one</option>
                        <option>On Hold</option>
                        <option>Canceled</option>
                        <option>Success</option>
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
