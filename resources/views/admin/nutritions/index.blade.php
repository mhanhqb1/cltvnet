@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="text-black-50">Nutrition</h1>
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
                <form action="{{ route('admin.nutritions.index') }}" method="GET">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ $attrNames['nutrition_id'] }}</label>
                                    <input type="text" name="nutrition_id" class="form-control" value="{{ old('nutrition_id', request('nutrition_id')) }}">
                                    @if ($errors->has('nutrition_id'))
                                    <span class="text-danger">{{ $errors->first('nutrition_id') }}</span>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>{{ $attrNames['image'] }}</th>
                                    <th>{{ $attrNames['name'] }}</th>
                                    <th>{{ $attrNames['description'] }}</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nutritions as $nutrition)
                                <tr>
                                    <td>{{ $nutrition->nutrition_id }}</td>
                                    <td></td>
                                    <td>{{ $nutrition->name }}</td>
                                    <td>{{ $nutrition->description }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ($nutritions->hasPages())
                    <div class="card-footer clearfix">
                        {{ $nutritions->render('partials.pagination') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
