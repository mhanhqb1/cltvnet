@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>New Chapter</td>
                    <td>Danfra New Chapter</td>
                    <td>Người tạo</td>
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
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'new_chapter', name: 'new_chapter' },
            { data: 'danfra_new_chapter', name: 'danfra_new_chapter' },
            { data: 'user_name', name: 'user_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
