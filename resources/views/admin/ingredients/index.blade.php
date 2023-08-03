@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('ingredient_menu') }}
                    <a href="{{ route('admin.ingredients.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.ingredients.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="ingredient_id" label="{{ $attrNames['ingredient_id'] }}" value="{{ old('ingredient_id', request('ingredient_id')) }}"></x-input-types>
                                    @if ($errors->has('ingredient_id'))
                                    <span class="text-danger">{{ $errors->first('ingredient_id') }}</span>
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
                                    <th>{{ $attrNames['description'] }}</th>
                                    <th>{{ $attrNames['unit'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingredients as $ingredient)
                                <tr>
                                    <td>{{ $ingredient->ingredient_id }}</td>
                                    <td>
                                        {!! $ingredient->getImageFormat() !!}
                                    </td>
                                    <td>{{ $ingredient->name }}</td>
                                    <td>{{ $ingredient->description }}</td>
                                    <td>{{ $ingredient->unit?->getName() }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.ingredients.edit', $ingredient->ingredient_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($ingredients->hasPages())
                    <div class="card-footer clearfix">
                        {{ $ingredients->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
