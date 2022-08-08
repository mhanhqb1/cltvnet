@extends('layouts.front_master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-list"></i>
                {{ $pageTitle }}
            </h2>
            <div class="row">
                @if (!$movies->isEmpty())
                <div class="cat-wrap">
                    @foreach ($movies as $item)
                        @include('layouts.cate_movie', ['item' => $item])
                    @endforeach
                </div>
                @endif
            </div>
            <div class="row">
                <center>
                {{ $movies->links() }}
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
