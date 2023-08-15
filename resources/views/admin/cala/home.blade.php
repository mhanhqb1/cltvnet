@extends('layouts.app')
@section('content-header')
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
                <a href="{{ route('admin.cala.orders.index') }}" class="small-box-footer">{{ __('more_info') }}  <i class="fas fa-arrow-circle-right"></i></a>
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
        <section class="col-12 connectedSortable ui-sortable">
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        {{ __('to_do_list') }}
                    </h3>
                </div>

                <div class="card-body">
                    <ul class="todo-list ui-sortable" data-widget="todo-list">
                        <li>
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                <label for="todoCheck1">Design a nice theme</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer clearfix">
                    <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
