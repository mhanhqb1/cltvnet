<?php
$cateName = [];
if (!empty($movie->cates)) {
    foreach ($movie->cates as $v) {
        $cateName[] = '<a href="' . route('home.cate.index', $v->slug) . '">' . $v->name . '</a>';
    }
}
$cateName = implode(' - ', $cateName);
?>
@extends('layouts.front_master')

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
                <div class="col-sm-12">
                    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;" itemscope itemtype="https://schema.org/VideoObject">
                        <meta itemprop="name" content="{{ $pageTitle }}" />
                        <meta itemprop="description" content="{{ $movie->description }}" />
                        <meta itemprop="uploadDate" content="{{ date('Y-m-d\TH:i:s\Z', strtotime($video->updated_at)) }}" />
                        <meta itemprop="thumbnailUrl" content="{{ getImageUrl($movie->image) }}" />
                        @if ($video->source_type == 3)
                        <meta itemprop="contentUrl" content="{{ $video->source_urls }}" />
                        <video id="my-video-player" style="width: 100%; height: 100%" class="video-js vjs-default-skin vjs-fluid"></video>
                        @else
                        <?php
                        switch ($video->source_type) {
                            case 1:
                                $iframeUrl = '//ok.ru/videoembed/' . $video->source_urls;
                                break;
                            case 2:
                                $iframeUrl = 'https://short.ink/' . $video->source_urls;
                                break;
                            default:
                                $iframeUrl = 'https://geo.dailymotion.com/player/x9pog.html?video=' . $video->source_urls;
                        }
                        ?>
                        <meta itemprop="embedUrl" content="{{ $iframeUrl }}" />
                        <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="{{ $iframeUrl }}" width="100%" height="100%" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
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

        @if(!$relatedMovies->isEmpty())
        @include('layouts.related_movies', ['relatedMovies' => $relatedMovies])
        @endif

        @include('layouts.detail_ads')

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
                        <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse in" id="collapseOne" aria-expanded="true">
                            @foreach ($movie->videos as $v)
                            <div class="panel-body pprc {{ $v->slug == $video->slug ? 'active' : '' }}">
                                <a data-id="{{ $v->id }}" href="{{ $v->slug == $video->slug ? 'javascript:void(0)' : route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $v->slug]) }}">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $movie->name.' - '.$v->name }}</font>
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
@if ($video->source_type == 3)
<script src="https://content.jwplatform.com/libraries/Jq6HIbgz.js"></script>
<script>
    $(document).ready(function() {
        const playerInstance = jwplayer("my-video-player").setup({
            playlist: [{
                title: '{{ $video->title }}',
                sources: [{
                    "file": "{{ $video->source_urls }}",
                    "type": "video/mp4"
                }],
                image: '{{ getImageUrl($movie->image) }}'
            }],
            logo: {
                file: "",
                "link": "{{ route('home') }}",
                "hide": "false",
                "position": "top-right"
            },
            // "advertising": {
            //     "client": "vast",
            //     "schedule": ['.$ads.']
            //     }
            // }
        });
    });
</script>
@endif
@endpush
