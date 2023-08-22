@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('sales_menu') }}
                </h1>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <form action="{{ route('admin.cala.customers.index') }}" method="GET">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <x-input-types type="datepicker" name="start_date" label="Ngày bắt đầu" value="{{ old('start_date', date('Y-m-01')) }}"></x-input-types>
                            </div>
                            <div class="col-sm-6">
                                <x-input-types type="datepicker" name="end_date" label="Ngày kết thúc" value="{{ old('end_date', date('Y-m-d')) }}"></x-input-types>
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
    <div class="row">
        <div class="col-lg-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ number_format($totalSales) }}</h3>
                    <p>Doanh thu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.cala.orders.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($totalCost) }}</h3>
                    <p>Chi phí</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.cala.cost_orders.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Danh sách doanh thu ({{ number_format(count($orders)) }})</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sản phẩm</th>
                                <th>Ngày nhận hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{!! $order->getProductHtml() !!}</td>
                                <td>{{ $order->delivery_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Danh sách chi phí ({{ number_format(count($costOrders)) }})</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Ngày đặt hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($costOrders as $order)
                            <tr>
                                <td>{{ $order->cost_order_id }}</td>
                                <td>{!! $order->description !!}</td>
                                <td>{{ number_format($order->total_price) }}</td>
                                <td>{{ $order->order_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
