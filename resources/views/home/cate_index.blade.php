@extends('layouts.front_master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-list"></i>
                {{ 'Categoría: '.$pageTitle }}
            </h2>
            @include('layouts.ads.native_ads')
            <div class="row">
                @if (!$movies->isEmpty())
                <div class="cat-wrap">
                    @foreach ($movies as $item)
                        @include('layouts.cate_movie', ['item' => $item])
                    @endforeach
                </div>
                @endif
            </div>
            @include('layouts.ads.mid_ads')
            <div class="row">
                <center>
                {{ $movies->links('pagination::bootstrap-4') }}
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
