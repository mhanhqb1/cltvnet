@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Dailymotion ID</td>
                    <td>Type</td>
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
        ajax: '{!! route('admin.dailymotion.indexData') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'source_id', name: 'source_id' },
            { data: 'type', name: 'type' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
