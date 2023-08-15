@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('product_menu') }}
                    <a href="{{ route('admin.cala.products.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.cala.products.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="product_id" label="{{ $attrNames['product_id'] }}" value="{{ old('product_id', request('product_id')) }}"></x-input-types>
                                    @if ($errors->has('product_id'))
                                    <span class="text-danger">{{ $errors->first('product_id') }}</span>
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
                                    <th>{{ $attrNames['cost'] }}</th>
                                    <th>{{ $attrNames['price'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_id }}</td>
                                    <td>
                                        {!! $product->getImageFormat() !!}
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->cost }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cala.products.edit', $product->product_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($products->hasPages())
                    <div class="card-footer clearfix">
                        {{ $products->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
