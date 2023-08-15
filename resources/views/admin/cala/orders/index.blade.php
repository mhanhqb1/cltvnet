@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('order_menu') }}
                    <a href="{{ route('admin.cala.orders.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.cala.orders.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="order_id" label="{{ $attrNames['order_id'] }}" value="{{ old('order_id', request('order_id')) }}"></x-input-types>
                                    @if ($errors->has('order_id'))
                                    <span class="text-danger">{{ $errors->first('order_id') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <x-input-types type="select" name="customer_id" label="{{ $attrNames['customer_id'] }}" value="{{ old('customer_id', request('customer_id')) }}" :options="$options['customer_id']"></x-input-types>
                                    @if ($errors->has('customer_id'))
                                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="select" name="status" label="{{ $attrNames['status'] }}" value="{{ old('status', request('status')) }}" :options="$options['status']"></x-input-types>
                                    @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
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
                                    <th>{{ __('customer_name') }}</th>
                                    <th>{{ __('product_list') }}</th>
                                    <th>{{ __('total_price') }}</th>
                                    <th>{{ __('order_date') }}</th>
                                    <th>{{ __('delivery_date') }}</th>
                                    <th>{{ __('paid_date') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <th>{{ $order->customer->name }}</th>
                                    <th>{!! $order->getProductHtml() !!}</th>
                                    <th>{{ number_format($order->total_price) }}</th>
                                    <th>{{ $order->order_date }}</th>
                                    <th>{{ $order->delivery_date }}</th>
                                    <th>{{ $order->paid_date }}</th>
                                    <th>{{ $order->status->getName() }}</th>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cala.orders.edit', $order->order_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($orders->hasPages())
                    <div class="card-footer clearfix">
                        {{ $orders->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
