@extends('layouts.admin_master')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<form action="{{ route('admin.dailymotion.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin chung</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Tên</label>
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ !empty(old('name')) ? old('name') : $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="inputSourceID">Dailymotion ID</label>
                        <input type="text" id="inputSourceID" name="source_id" class="form-control" value="{{ !empty(old('source_id')) ? old('source_id') : $item->source_id }}">
                    </div>
                    <div class="form-group">
                        <label for="inputPosition">Thể loại</label>
                        @foreach ($dailyTypes as $k => $v)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="radio{{ $k }}" name="type" value="{{ $k }}" {!! $item->type == $k ? 'checked="checked"' : '' !!}>
                            <label class="form-check-label" for="radio{{ $k }}">{{ $v }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Hủy bỏ</a>
            <input type="submit" value="Chỉnh sửa" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection
