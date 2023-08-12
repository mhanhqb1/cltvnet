@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('menu_menu') }}
                    <a href="{{ route('admin.menus.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.menus.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="menu_id" label="{{ $attrNames['menu_id'] }}" value="{{ old('menu_id', request('menu_id')) }}"></x-input-types>
                                    @if ($errors->has('menu_id'))
                                    <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <x-input-types type="select" name="cate_id" label="{{ $attrNames['cate_id'] }}" value="" :options="$options['cate_id']"></x-input-types>
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
                                    <th>{{ $attrNames['cate'] }}</th>
                                    <th>{{ $attrNames['description'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $menu->menu_id }}</td>
                                    <td>
                                        {!! $menu->getImageFormat() !!}
                                    </td>
                                    <td>{{ $menu->name }}</td>
                                    <td></td>
                                    <td>{{ $menu->description }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.menus.edit', $menu->menu_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($menus->hasPages())
                    <div class="card-footer clearfix">
                        {{ $menus->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
