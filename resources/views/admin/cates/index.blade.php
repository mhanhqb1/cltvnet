@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('cate_menu') }}
                    <a href="{{ route('admin.cates.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
                </h1>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <form action="{{ route('admin.cates.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ $attrNames['cate_id'] }}</label>
                                    <input type="text" name="cate_id" class="form-control" value="{{ old('cate_id', request('cate_id')) }}">
                                    @if ($errors->has('cate_id'))
                                    <span class="text-danger">{{ $errors->first('cate_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered projects">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ $attrNames['image'] }}</th>
                                    <th>{{ $attrNames['name'] }}</th>
                                    <th>{{ $attrNames['description'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cates as $cate)
                                <tr>
                                    <td>{{ $cate->cate_id }}</td>
                                    <td>
                                        {!! $cate->getImageFormat() !!}
                                    </td>
                                    <td>{{ $cate->name }}</td>
                                    <td>{{ $cate->description }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cates.edit', $cate->cate_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($cates->hasPages())
                    <div class="card-footer clearfix">
                        {{ $cates->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
