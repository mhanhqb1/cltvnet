@extends('layouts.admin_master')

@section('content')

<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <a href="{{ route('admin.post.add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
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
        ajax: '{!! route('admin.post.indexData') !!}',
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
