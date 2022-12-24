<?php
$params = $_GET;
?>
@extends('layouts.admin_master')

@push('css')
<style>
    .form-inline .form-group {
        margin-right: 24px;
    }
    .form-inline .form-group label {
        margin-right: 12px;
    }
</style>
@endpush

@section('content')
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <a href="{{ !empty($postType) ? route('admin.product.add') : route('admin.post.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
    </div>
</div>
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <form action="" method="GET" class="form-inline">
            <div class="form-group form-inline">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ !empty($_GET['name']) ? $_GET['name'] : '' }}" />
            </div>
            <div class="form-group form-inline">
                <label>{{ __('Category') }}</label>
                <select name="cate_id" class="form-control">
                    <option value=""></option>
                    @foreach($cates as $cate)
                    <option value="{{ $cate->id }}" {{ !empty($_GET['cate_id']) && $cate->id == $_GET['cate_id'] ? "selected='selected'" : '' }}>{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="{{ __('Search') }}" />
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td style="width: 20px;">#</td>
                    <td style="width: 130px;">{{ __('Image') }}</td>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('Description') }}</td>
                    <td style="width: 70px;">{{ __('Status') }}</td>
                    <td style="width: 150px;">{{ __('Created At') }}</td>
                    <td style="width: 100px;"></td>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: '{!! route('admin.post.indexData', $params) !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
