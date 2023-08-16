@extends('layouts.app')
@section('content-header')
<style>
    .todo-order {
        display: flex;
        align-items: center;
    }

    .todo-order>div {
        margin: 5px 12px;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('dashboard') }}
                </h1>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ count($newOrders) }}</h3>
                    <p>{{ __('new_order') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.cala.orders.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalOrder }}</h3>
                    <p>{{ __('total_order_completed') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.cala.orders.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalProduct }}</h3>
                    <p>{{ __('total_product') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.cala.products.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalCustomer }}</h3>
                    <p>{{ __('total_customer') }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.cala.customers.index') }}" class="small-box-footer">{{ __('more_info') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>{{ __('to_do_list') }}</h4>
        </div>
    </div>
    <div class="row">
        <section class="col-12 connectedSortable ui-sortable">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="orderPendingTab" data-toggle="pill" href="#orderPending" role="tab" aria-controls="orderPending" aria-selected="true">{{ __('order_pending').' ('.count($pendingOrders).')' }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orderDoneTab" data-toggle="pill" href="#orderDone" role="tab" aria-controls="orderDone" aria-selected="false">{{ __('order_done').' (Chưa giao)'.' ('.count($doneOrders).')' }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orderDeliveryTab" data-toggle="pill" href="#orderDelivery" role="tab" aria-controls="orderDelivery" aria-selected="false">{{ __('order_delivered').' (Chưa thanh toán)'.' ('.count($deliveredOrders).')' }}</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="orderTabContent">
                        <div class="tab-pane fade active show" id="orderPending" role="tabpanel" aria-labelledby="orderPendingTab">
                            <div class="overlay-wrapper">
                                <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div>
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @foreach($pendingOrders as $order)
                                    <li>
                                        <div class="icheck-primary todo-order ml-2">
                                            <div>
                                                <input type="checkbox" value="{{ $order->order_id }}" data-status="{{ $order->status }}" name="todo" id="todoCheck{{ $order->order_id }}">
                                                <label for="todoCheck{{ $order->order_id }}"></label>
                                            </div>
                                            <div>
                                                {!! $order->getProductHtml() !!}
                                            </div>
                                            @if (!empty($order->note))
                                            <div>{{ $order->note }}</div>
                                            @endif
                                            <div>
                                                <span>{{ $order->customer->name }}</span>
                                            </div>
                                            <div>
                                                <span>{{ $order->delivery_date }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orderDone" role="tabpanel" aria-labelledby="orderDoneTab">
                            <div class="overlay-wrapper">
                                <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div>
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @foreach($doneOrders as $order)
                                    <li>
                                        <div class="icheck-primary todo-order ml-2">
                                            <div>
                                                <input type="checkbox" value="{{ $order->order_id }}" data-status="{{ $order->status }}" name="todo" id="todoCheck{{ $order->order_id }}">
                                                <label for="todoCheck{{ $order->order_id }}"></label>
                                            </div>
                                            <div>
                                                {!! $order->getProductHtml() !!}
                                            </div>
                                            @if (!empty($order->note))
                                            <div>{{ $order->note }}</div>
                                            @endif
                                            <div>
                                                <span>{{ $order->customer->name }}</span>
                                            </div>
                                            <div>
                                                <span>{{ $order->delivery_date }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orderDelivery" role="tabpanel" aria-labelledby="orderDeliveryTab">
                            <div class="overlay-wrapper">
                                <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div>
                                <ul class="todo-list ui-sortable" data-widget="todo-list">
                                    @foreach($deliveredOrders as $order)
                                    <li>
                                        <div class="icheck-primary todo-order ml-2">
                                            <div>
                                                <input type="checkbox" value="{{ $order->order_id }}" data-status="{{ $order->status }}" name="todo" id="todoCheck{{ $order->order_id }}">
                                                <label for="todoCheck{{ $order->order_id }}"></label>
                                            </div>
                                            <div>
                                                {!! $order->getProductHtml() !!}
                                            </div>
                                            @if (!empty($order->note))
                                            <div>{{ $order->note }}</div>
                                            @endif
                                            <div>
                                                <span>{{ $order->customer->name }}</span>
                                            </div>
                                            <div>
                                                <span>{{ $order->delivery_date }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.cala.orders.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> {{ __('add_new_order') }}</a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('page_scripts')
<script>
    const loading = $('.overlay');
    loading.hide();
    $(document).ready(function() {
        updateOrderStatus('orderPending', 'orderDone', 'orderDelivery');
        updateOrderStatus('orderDone', 'orderDelivery', '');
        updateOrderStatus('orderDelivery', '', '');
    });

    function updateOrderStatus(element, newElement, newElement2) {
        $('#' + element + ' input[name="todo"]').on('change', function() {
            const $this = $(this);
            if (this.checked) {
                const orderId = $this.val();
                const status = $this.attr('data-status');
                loading.show();
                $.ajax('{{ route("admin.cala.home.updateOrderStatus") }}', {
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        order_id: orderId,
                        status: status
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.new_status !== '') {
                            $this.attr('data-status', data.new_status);
                            const parent = $this.closest('li');
                            if (newElement != '') {
                                const parentHtml = '<li>' + parent.html() + '</li>';
                                $('#' + newElement + ' .todo-list').prepend(parentHtml);
                                updateOrderStatus(newElement, newElement2, '');
                            }
                            parent.remove();
                        }
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        alert('Lỗi');
                    },
                    complete: function() {
                        loading.hide();
                    }
                });
            }
        });
    }
</script>
@endpush
