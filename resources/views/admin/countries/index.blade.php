@extends('layouts.admin_master')

@section('content')
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <a href="{{ route('admin.countries.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td></td>
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
        ajax: '{!! route('admin.countries.indexData') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
