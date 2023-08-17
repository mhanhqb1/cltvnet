@extends('layouts.front')

@section('content')
<div class="container">
    <div class="invoice p-3 mb-3">
        <div class="row">
            <div class="col-12">
                <div class="invoice-header">
                    <img src="{{ asset('images/logo.jpg') }}" width="100px"/>
                    <div class="invoice-header-info text-center">
                        <h2>
                            MeCaLa
                        </h2>
                        <h6>Liên Thủy - Lệ Thủy - Quảng Bình</h6>
                        <div class="contact-info">
                            <span><a href="tel:0786347795" target="_blank"><i class="fa-solid fa-phone"></i></a></span>
                            <span><a href="https://www.facebook.com/tuyetmai.tran.73" target="_blank"><i class="fa-brands fa-facebook"></i></a></span>
                            <span><a href="https://www.tiktok.com/@bepcala.2020"><i class="fa-brands fa-tiktok" target="_blank"></i></a></span>
                            <span><a href="https://mecala.chotreo.com/" target="_blank"><i class="fa-solid fa-globe"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-3 mb-3">
                <h1>Danh sách đơn hàng cần giao</h1>
            </div>
        </div>

        <div class="row invoice-info">
            <div class="col-12 invoice-col">
                <address>
                    Tên khách hàng: &nbsp;<strong>{{ $customer->name }}</strong><br/>
                    Số điện thoại: &nbsp;<strong>{{ $customer->phone }}</strong><br/>
                    Địa chỉ: &nbsp;<strong>{{ $customer->address }}</strong>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sản phẩm</th>
                            <th>Ngày nhận hàng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{!! $order->getProductHtml() !!}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>{{ $order->status->getName() }}</td>
                        </tr>
                        @php
                            $totalPrice += $order->total_price;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <h5>Mọi chi tiết xin liên hệ</h5>
                <h5>MeCaLa</h5>
                <div class="contact-info">
                    <span><a href="tel:0786347795" target="_blank"><i class="fa-solid fa-phone"></i></a></span>
                    <span><a href="https://www.facebook.com/tuyetmai.tran.73" target="_blank"><i class="fa-brands fa-facebook"></i></a></span>
                    <span><a href="https://www.tiktok.com/@bepcala.2020"><i class="fa-brands fa-tiktok" target="_blank"></i></a></span>
                    <span><a href="https://mecala.chotreo.com/" target="_blank"><i class="fa-solid fa-globe"></i></a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
