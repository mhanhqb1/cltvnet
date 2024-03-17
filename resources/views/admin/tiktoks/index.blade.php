@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">
                    {{ __('tiktok_menu') }}
                    <a href="{{ route('admin.tiktoks.create') }}" class="btn btn-primary float-right">{{ __('add_new') }}</a>
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
                <form action="{{ route('admin.tiktoks.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <x-input-types type="text" name="id" label="{{ $attrNames['id'] }}" value="{{ old('id', request('id')) }}"></x-input-types>
                                    @if ($errors->has('id'))
                                    <span class="text-danger">{{ $errors->first('id') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <x-input-types type="select" name="type" label="{{ $attrNames['type'] }}" value="{{ old('type', request('type')) }}" :options="$options['type']"></x-input-types>
                                    @if ($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
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
                                    <th>{{ $attrNames['image'] }}</th>
                                    <th>{{ $attrNames['unique_id'] }}</th>
                                    <th>{{ $attrNames['name'] }}</th>
                                    <th>{{ $attrNames['type'] }}</th>
                                    <th>{{ $attrNames['note'] }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiktoks as $tiktok)
                                <tr>
                                    <td>{{ $tiktok->id }}</td>
                                    <td>
                                        {!! $tiktok->getImageFormat() !!}
                                    </td>
                                    <td>{{ $tiktok->unique_id }}</td>
                                    <td>{{ $tiktok->name }}</td>
                                    <td>{{ $tiktok->type?->getName() }}</td>
                                    <td>{{ $tiktok->note }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-xs" href="{{ route('admin.tiktoks.edit', $tiktok->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($tiktoks->hasPages())
                    <div class="card-footer clearfix">
                        {{ $tiktoks->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
