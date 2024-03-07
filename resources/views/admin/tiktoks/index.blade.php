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
        <a href="{{ route('admin.tiktoks.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
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
                <label>{{ __('Type') }}</label>
                <select name="type" class="form-control">
                    <option value="">{{ __('All') }}</option>
                    @foreach($types as $type => $typeLabel)
                    <option value="{{ $type }}" {{ !empty($_GET['type']) && $type == $_GET['type'] ? "selected='selected'" : '' }}>{{ $typeLabel }}</option>
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
                    <td>{{ __('Unique ID') }}</td>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('Note') }}</td>
                    <td style="width: 70px;">{{ __('Type') }}</td>
                    <td style="width: 100px;">{{ __('Crawl At') }}</td>
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
        ajax: '{!! route('admin.tiktoks.indexData', $params) !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'unique_id', name: 'unique_id' },
            { data: 'name', name: 'name' },
            { data: 'note', name: 'note' },
            { data: 'type', name: 'type' },
            { data: 'crawl_at', name: 'crawl_at' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
