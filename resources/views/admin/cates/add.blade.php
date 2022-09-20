<?php
$cateTypes = getCateTypes();
?>

@extends('layouts.admin_master')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<form action="{{ route('admin.cates.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
                        <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputParentId">Danh mục cha</label>
                        <select name="parent_id" id="inputParentId" class="form-control">
                            <option value="0">-</option>
                            @if (!empty($parents))
                            @foreach ($parents as $v)
                                <option value="{{ $v->id }}" {{ old('parent_id') == $v->id ? 'selected="selected"' : '' }}>{{ $v->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputType">Thể loại</label>
                        <select name="type" id="inputType" class="form-control">
                            @if (!empty($cateTypes))
                            @foreach ($cateTypes as $k => $v)
                                <option value="{{ $k }}" {{ old('type') == $k ? 'selected="selected"' : '' }}>{{ $v }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPosition">Vị trí</label>
                        <input type="text" id="inputPosition" name="position" class="form-control" value="{{ old('position') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Hủy bỏ</a>
            <input type="submit" value="Tạo mới" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection
