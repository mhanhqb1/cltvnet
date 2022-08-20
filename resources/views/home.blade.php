@extends('layouts.front_master')

@section('content')
<div class="row">
    <div id="ssc" class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-list"></i>
                ÚLTIMOS CAPÍTULOS AGREGADOS
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="row">
                                @if(!$videos->isEmpty())
                                    @foreach ($videos as $item)
                                        @include('layouts.video', ['item' => $item])
                                    @endforeach
                                @endif
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-list"></i>
                ÚLTIMAS NOVELAS AGREGADAS
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- <seri> -->
                            <div class="row">
                                @if(!$movies->isEmpty())
                                    @foreach ($movies as $item)
                                        @include('layouts.movie', ['item' => $item])
                                    @endforeach
                                @endif
                            </div>
                            <center><a class="btn btn-block btn-border btn-post btn-danger" href="{{ route('home.new_movie') }}" target="_blank">VER TODAS LAS NOVELAS</a></center>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-list"></i>
                TV Show
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- <seri> -->
                            <div class="row">
                                @if(!$movies2->isEmpty())
                                    @foreach ($movies2 as $item)
                                        @include('layouts.movie', ['item' => $item])
                                    @endforeach
                                @endif
                            </div>
                            <center><a class="btn btn-block btn-border btn-post btn-danger" href="{{ route('home.new_movie') }}" target="_blank">VER TODAS LAS NOVELAS</a></center>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
