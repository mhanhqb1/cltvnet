<?php
$cateName = [];
if (!empty($movie->cates)) {
    foreach ($movie->cates as $v) {
        $cateName[] = '<a href="' . route('home.cate.index', $v->slug) . '">' . $v->name . '</a>';
    }
}
$cateName = implode(' - ', $cateName);
$video = $movie->videos[0];
?>
@extends('layouts.front_master')

@section('content')
<style>
    .related-movies li {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #ccc;
    }

    .related-movies li:first-child {
        padding-top: 0;
    }

    .related-movies li .movie-image img {
        width: 100px;
        margin-right: 24px;
    }
</style>
<div class="row">
    <div class="col-sm-4 hidden-xs">
        @include('layouts.front_left_cates')
    </div>

    <div class="col-sm-8">
        @if (empty($movie->is_series))
        <div class="inner-box category-content" style="padding-bottom: 15px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-play-circle"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> {{ $movie->name }}</font>
                </font>
            </h2>
            <div class="faq-content">
                <video style="width: 100%;" class="video-js vjs-default-skin vjs-fluid" controls>
                        <source src="{{ getImageUrl($video->source_urls) }}" type="video/mp4">
                        Your browser does not support the video tag.
                </video>
                <div style="margin-top: 12px;">
                    View: <strong>{{ number_format($movie->total_view) }}</strong>
                </div>
            </div>
        </div>
        @endif
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h1 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-video-camera"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> {{ $movie->name }}</font>
                </font>
            </h1>
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <div class="add-image" style="max-width:300px; float:left; margin-right:15px; margin-bottom:15px;">
                            <img src="{{ getImageUrl($movie->image) }}" class="xxxx" style="max-width:100%; height: auto; display: block;">
                        </div>

                        <div style="text-align:justify;">
                            {{ $movie->description }}
                        </div>
                    </fieldset>
                </div>
                @if (!empty($movie->is_series) && !empty($movie->videos))
                <?php
                    $preVideo = $movie->videos[0];
                    $nextVideo = $movie->videos[count($movie->videos) - 1];
                ?>
                <div class="col-sm-12">
                    <div class="prev_next">
                        @if (!empty($preVideo))
                        <div class="pn_prev">
                            <a href="{{ route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $preVideo->slug]) }}" title="{{ $movie->name . ' - ' . $preVideo->name }}">{{ $preVideo->name }}</a>
                        </div>
                        @endif

                        @if (!empty($nextVideo))
                        <div class="pn_next">
                            <a href="{{ route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $nextVideo->slug]) }}" title="{{ $movie->name . ' - ' . $nextVideo->name }}">{{ $nextVideo->name }}</a>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @if(!$relatedMovies->isEmpty())
            @include('layouts.related_movies', ['relatedMovies' => $relatedMovies])
        @endif
        @include('layouts.detail_ads')

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
        @if (!empty($movie->is_series))
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
                            @foreach ($movie->videos as $video)
                            <div class="panel-body pprc">
                                <a data-id="{{ $video->id }}" href="{{ route('home.video_detail', ['movieSlug' => $movie->slug, 'videoSlug' => $video->slug]) }}">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $movie->name.' - '.$video->name }}</font>
                                    </font>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
@if ($video->source_type == 99)
<script src="https://content.jwplatform.com/libraries/Jq6HIbgz.js"></script>
<script>
    $(document).ready(function() {
        const playerInstance = jwplayer("my-video-player").setup({
            playlist: [{
                title: '{{ $video->title }}',
                sources: [{
                    "file": "{{ getImageUrl($video->source_urls) }}",
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
