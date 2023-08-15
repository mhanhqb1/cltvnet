@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('transporter_menu') }}
                    <a href="{{ route('admin.cala.transporters.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.cala.transporters.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="transporter_id" label="{{ $attrNames['transporter_id'] }}" value="{{ old('transporter_id', request('transporter_id')) }}"></x-input-types>
                                    @if ($errors->has('transporter_id'))
                                    <span class="text-danger">{{ $errors->first('transporter_id') }}</span>
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
                                    <th>{{ $attrNames['time_start'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transporters as $transporter)
                                <tr>
                                    <td>{{ $transporter->transporter_id }}</td>
                                    <td>{{ $transporter->name }}</td>
                                    <td>{{ $transporter->phone }}</td>
                                    <td>{{ $transporter->address }}</td>
                                    <td>{{ $transporter->time_start }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.cala.transporters.edit', $transporter->transporter_id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($transporters->hasPages())
                    <div class="card-footer clearfix">
                        {{ $transporters->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
