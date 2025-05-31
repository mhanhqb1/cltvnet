<?php
$showAds = env('SHOW_ADS');
$vastUrl = 'https://unwritten-cash.com/d/mAF.z/dyGKNtvyZZGyUQ/Uenmk9/uDZRULlVkpP/TEYGzSOTTKUrwGN/Dng/t-NQj/MF5QNtT/AF0oO/Qv';
$cateName = [];
if (!empty($movie->cates)) {
    foreach ($movie->cates as $v) {
        $cateName[] = '<a href="' . route('home.cate.index', $v->slug) . '">' . $v->name . '</a>';
    }
}
$tokenKey = env('BUNNY_TOKEN_KEY');
$baseUrl = env('BUNNY_CDN_URL');
$cateName = implode(' - ', $cateName);
$path = "/novelas/".$video->source_urls.".m3u8";
// $videoUrl = route('home.bunny_manifest', $video->source_urls.".m3u8");//"https://cdn.vponline.net/novelas/".$video->source_urls.".m3u8";
$videoUrl = "https://cdn.vponline.net/novelas/".$video->source_urls.".m3u8";
?>
@extends('layouts.front_master')

@push('css')
<link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
@if (!empty($showAds))
<!-- <meta http-equiv="Delegate-CH" content="Sec-CH-UA https://s.magsrv.com; Sec-CH-UA-Mobile https://s.magsrv.com; Sec-CH-UA-Arch https://s.magsrv.com; Sec-CH-UA-Model https://s.magsrv.com; Sec-CH-UA-Platform https://s.magsrv.com; Sec-CH-UA-Platform-Version https://s.magsrv.com; Sec-CH-UA-Bitness https://s.magsrv.com; Sec-CH-UA-Full-Version-List https://s.magsrv.com; Sec-CH-UA-Full-Version https://s.magsrv.com;"> -->
@endif
@endpush

@section('content')
<style>
    .panel-body.pprc.active a {
        color: #cd1d1f !important;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h1 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-video-camera"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> {{ $pageTitle }}</font>
                </font>
            </h1>
            <div class="row">
                @if ((!empty($video->twitch_id) || !empty($movie->twitch_id)) && !empty($video->is_pre))
                <div class="col-sm-12">
                    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                        <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" src="https://player.twitch.tv/?channel={{ !empty($video->twitch_id) ? $video->twitch_id : $movie->twitch_id }}&parent=hoynovelas.net" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>
                    </div>
                </div>
                @endif
                <div class="col-sm-12" style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                    <video id="my-video" class="video-js vjs-default-skin" controls style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden">
                        <source src="{!! $videoUrl !!}" type="application/x-mpegURL" />
                    </video>
                </div>
                @include('layouts.share_sns')
                <div class="col-sm-12">
                    <div class="prev_next">
                        @if (!empty($preVideo))
                        <div class="pn_prev">
                            <a href="{{ route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $preVideo->slug]) }}" title="{{ $movie->name . ' - ' . $preVideo->name }}"><i class="fa fa-angle-left" aria-hidden="true"></i> {{ $preVideo->name }}</a>
                        </div>
                        @endif

                        @if (!empty($nextVideo))
                        <div class="pn_next">
                            <a href="{{ route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $nextVideo->slug]) }}" title="{{ $movie->name . ' - ' . $nextVideo->name }}">{{ $nextVideo->name }} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.ads.native_ads')
        @if(!$relatedMovies->isEmpty())
        @include('layouts.related_movies', ['relatedMovies' => $relatedMovies])
        @endif
        @include('layouts.ads.mid_ads')
        <div class="inner-box category-content" style="padding-bottom: 5px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-tags"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">CAPÍTULOS DE {{ $movie->name }}</font>
                </font>
            </h2>
            <div class="faq-content">
                <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group faq-panel">
                    <div class="panel" style="border:1px solid #AAAAAA;">
                        <div id="headingOne" role="tab" class="panel-heading">
                            <h4 class="panel-title">
                                <a aria-controls="collapseOne" aria-expanded="true" href="javascript:void(0)" data-parent="#accordion" data-toggle="collapse" class="collapsed">
                                    <strong style="color:black;">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Ver Capítulos</font>
                                        </font>
                                    </strong>
                                </a>
                            </h4>
                        </div>
                        <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in movie-chapters" id="collapseOne" aria-expanded="true">
                            @foreach ($movie->videos as $v)
                            <div class="panel-body pprc {{ $v->slug == $video->slug ? 'active' : '' }}">
                                <a data-id="{{ $v->id }}" href="{{ $v->slug == $video->slug ? 'javascript:void(0)' : route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $v->slug]) }}">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $v->name }}</font>
                                    </font>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-box category-content" style="padding-bottom: 15px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-tags"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ $movie->name }}</font>
                </font>
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="add-image" style="max-width:300px; float:left; margin-right:15px; margin-bottom:15px;">
                                <img src="{{ getImageUrl($movie->image) }}" class="xxxx" style="max-width:100%; height: auto; display: block;">
                            </div>

                            <div style="text-align:justify;">
                                {{ $movie->description }}
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="inner-box category-content" style="padding-bottom: 10px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-tags"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">FICHA TÉCNICA</font>
                </font>
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{ $movie->name }}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">País:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {!! !empty($movie->country->name) ? '<a href="'.route('home.country.index', $movie->country->slug).'">'.$movie->country->name.'</a>' : '-' !!}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Año:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{ !empty($movie->year) ? $movie->year : '-' }}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Categoría:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {!! $cateName !!}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Tags:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{ !empty($movie->tags) ? $movie->tags : '-' }}</font>
                        </font>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@if ($video->source_type == 1)
<!-- <script src="https://imasdk.googleapis.com/js/sdkloader/ima3.js"></script> -->
<script src="https://vjs.zencdn.net/8.9.0/video.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-ads@6.8.0/dist/videojs-contrib-ads.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/videojs-ima@1.9.0/dist/videojs.ima.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/videojs-vast-plugin@1.1.0/dist/videojs.vast.vpaid.min.js"></script> -->
 <!-- <script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script> -->
<script src="{{ asset('js/jwplayer.js') }}"></script>
<script>
    const manifestUrl = "{!! $videoUrl !!}";
    if (window.innerWidth > 768) {
    @if (!empty($showAds))
        jwplayer.key="3SYLbRo6MN5cBDxwpZh3dl1gb0lMTUOos31M5hoAlf4=";
        jwplayer("my-video").setup({
            file: manifestUrl,
            // image: "https://cdn.yourdomain.com/thumbnail.jpg",
            width: "100%",
            aspectratio: "16:9",
            autostart: false,
            controls: true,
            advertising: {
                client: "vast",
                skipoffset: 5, // Cho phép bỏ qua sau 5s
                vpaidmode: "insecure",
                schedule: [
                    {
                        offset: "pre", // Pre-roll
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "10%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "20%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "30%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "40%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "50%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "60%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "70%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "80%",
                        tag: "{!! $vastUrl !!}"
                    },
                    {
                        offset: "post", // Post-roll
                        tag: "{!! $vastUrl !!}"
                    }
                ]
            }
        });
    @else
        var player = videojs('my-video');
        player.src({ src: manifestUrl, type: 'application/x-mpegURL' });
    @endif
    } else {
        var player = videojs('my-video');
        player.src({ src: manifestUrl, type: 'application/x-mpegURL' });
    }
</script>
@endif
@endpush
