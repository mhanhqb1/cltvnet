@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">{{ __('transporter_edit') }}</h1>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
    <form action="{{ $transporter->transporter_id ? route('admin.cala.transporters.update', $transporter->transporter_id) : route('admin.cala.transporters.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($transporter->transporter_id)
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('general_info') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($attrInputTypes as $attr => $inputType)
                        <x-input-types name="{{ $attr }}" type="{{ $inputType }}" label="{{ $attrNames[$attr] }}" value="{{ old($attr, $transporter->$attr) }}" :options="!empty($options[$attr]) ? $options[$attr] : []" ></x-input-types>
                        @if ($errors->has($attr))
                            <div class="text-danger">{{ $errors->first($attr) }}</div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <a href="{{ route('admin.cala.transporters.index') }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ __('save') }}" class="btn btn-primary float-right">
                @if ($transporter->transporter_id)
                    <button type="button" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger mr-2 float-right">{{ __('delete') }}</button>
                @endif
            </div>
        </div>
    </form>
    </div>
</section>
@if ($transporter->transporter_id)
<x-delete-modal id="{{ $transporter->transporter_id }}" url="{{ route('admin.cala.transporters.destroy', $transporter->transporter_id) }}"></x-delete-modal>
@endif
@endsection
