<?php
$params = $_GET;
$params['type'] = $postType;
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
        <a href="{{ !empty($postType) ? route('admin.product_category.add') : route('admin.category.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
    </div>
</div>
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <form action="" method="GET" class="form-inline">
            <div class="form-group form-inline">
                <label>{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ !empty($_GET['name']) ? $_GET['name'] : '' }}" />
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
                    <td style="width: 30px;">#</td>
                    <td>{{ __('Name') }}</td>
                    <td style="width: 150px;">{{ __('Created At') }}</td>
                    <td style="width: 150px; text-align: center"></td>
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
        ajax: '{!! route('admin.category.indexData', $params) !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
