@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">{{ __('menu_edit') }}</h1>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
    <form action="{{ $menu->menu_id ? route('admin.menus.update', $menu->menu_id) : route('admin.menus.store') }}" id="registerForm" method="POST" enctype="multipart/form-data">
        @csrf
        @if($menu->menu_id)
            @method('PUT')
            <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}" />
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
                        @php
                            $oldVal = old($attr, $menu->$attr);
                            if (is_array($oldVal)) {
                                $oldVal = implode(',', $oldVal);
                            }
                        @endphp
                        <x-input-types
                            name="{{ $attr }}"
                            type="{{ $inputType }}"
                            label="{{ $attrNames[$attr] }}"
                            value="{{ $oldVal }}"
                            :options="!empty($options[$attr]) ? $options[$attr] : []"
                            :multi="!empty($multi[$attr]) ? $multi[$attr] : false"
                            ></x-input-types>
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
                <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">{{ __('cancel') }}</a>
                <input type="submit" value="{{ __('save') }}" class="btn btn-primary float-right">
                @if ($menu->menu_id)
                    <button type="button" data-toggle="modal" data-target="#modalDelete" class="btn btn-danger mr-2 float-right">{{ __('delete') }}</button>
                @endif
            </div>
        </div>
    </form>
    </div>
</section>
@if ($menu->menu_id)
<x-delete-modal id="{{ $menu->menu_id }}" url="{{ route('admin.menus.destroy', $menu->menu_id) }}"></x-delete-modal>
@endif
@endsection
