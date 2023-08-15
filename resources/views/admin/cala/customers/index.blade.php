@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('customer_menu') }}
                    <a href="{{ route('admin.cala.customers.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.cala.customers.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="customer_id" label="{{ $attrNames['customer_id'] }}" value="{{ old('customer_id', request('customer_id')) }}"></x-input-types>
                                    @if ($errors->has('customer_id'))
                                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
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
                                    <th>{{ $attrNames['name'] }}</th>
                                    <th>{{ $attrNames['phone'] }}</th>
                                    <th>{{ $attrNames['address'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->customer_id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cala.customers.edit', $customer->customer_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($customers->hasPages())
                    <div class="card-footer clearfix">
                        {{ $customers->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
