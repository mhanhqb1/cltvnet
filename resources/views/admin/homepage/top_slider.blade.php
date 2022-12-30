@extends('layouts.admin_master')

@section('content')
<div class="row" style="margin-bottom: 24px;">
    <div class="col-md-12">
        <a href="{{ route('admin.setting.top_slider_add') }}" class="btn btn-primary">{{ __('Add New') }}</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <td style="width: 30px;">#</td>
                    <td>{{ __('Image') }}</td>
                    <td>{{ __('Text') }}</td>
                    <td>{{ __('Number') }}</td>
                    <td>{{ __('Priority') }}</td>
                    <td style="width: 150px;">{{ __('Created At') }}</td>
                    <td style="width: 50px; text-align: center"></td>
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
        ajax: '{!! route('admin.setting.top_slider_indexData') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'text', name: 'text' },
            { data: 'number', name: 'number' },
            { data: 'priority', name: 'priority' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
