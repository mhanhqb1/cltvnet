@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('cost_order_menu') }}
                    <a href="{{ route('admin.cala.cost_orders.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.cala.cost_orders.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="cost_order_id" label="{{ $attrNames['cost_order_id'] }}" value="{{ old('cost_order_id', request('cost_order_id')) }}"></x-input-types>
                                    @if ($errors->has('cost_order_id'))
                                    <span class="text-danger">{{ $errors->first('cost_order_id') }}</span>
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
                                    <th>{{ $attrNames['description'] }}</th>
                                    <th>{{ $attrNames['order_date'] }}</th>
                                    <th>{{ $attrNames['total_price'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($costOrders as $costOrder)
                                <tr>
                                    <td>{{ $costOrder->cost_order_id }}</td>
                                    <td>{{ $costOrder->description }}</td>
                                    <td>{{ $costOrder->order_date }}</td>
                                    <td>{{ $costOrder->total_price }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cala.cost_orders.edit', $costOrder->cost_order_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($costOrders->hasPages())
                    <div class="card-footer clearfix">
                        {{ $costOrders->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
