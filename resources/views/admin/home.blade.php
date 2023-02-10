@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ number_format($movieCnt) }}</h3>
                <p>{{ __('Movies') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.movies.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ number_format($cateCnt) }}</h3>
                <p>{{ __('Category') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.cates.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ number_format($countryCnt) }}</h3>
                <p>{{ __('Country') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.countries.index') }}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection
