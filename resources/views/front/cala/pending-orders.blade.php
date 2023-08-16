@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Tên khách hàng: {{ $customer->name }}</h3>
            <h3>Số điện thoại: {{ $customer->phone }}</h3>
            <h3>Địa chỉ: {{ $customer->address }}</h3>
        </div>
        <div class="col-12">
            <h1>Danh sách đơn hàng cần giao</h1>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Ngày giao hàng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{!! $order->getProductHtml() !!}</td>
                        <td>{{ $order->delivery_date }}</td>
                        <td>{{ $order->status->getName() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
