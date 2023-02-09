@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Hình ảnh</td>
                    <td>Tên</td>
                    <td>Mô tả</td>
                    <td>Tổng view</td>
                    <td style="width: 180px;"></td>
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
        ajax: '{!! route('admin.movies.indexData') !!}',
        searching: false,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'total_view', name: 'total_view' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
