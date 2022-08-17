<?php
$cateName = [];
if (empty($movie->is_series)) {
    $cateName[] = '<a href="' . route('home.not_series') . '">Phim lẻ</a>';
} else {
    $cateName[] = '<a href="' . route('home.series') . '">Phim bộ</a>';
}
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
                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;" itemscope itemtype="https://schema.org/VideoObject">
                    <?php
                        $iframeUrl = 'https://geo.dailymotion.com/player/x9pog.html?video='.$movie->videos[0]->source_urls;
                        if (!empty($movie->videos[0]->source_type)) {
                            $iframeUrl = '//ok.ru/videoembed/'.$movie->videos[0]->source_urls;
                        }
                    ?>
                    <meta itemprop="name" content="{{ $pageTitle }}" />
                    <meta itemprop="description" content="{{ $movie->description }}" />
                    <meta itemprop="uploadDate" content="{{ date('Y-m-d\TH:i:s\Z', strtotime($movie->videos[0]->updated_at)) }}" />
                    <meta itemprop="thumbnailUrl" content="{{ getImageUrl($movie->image) }}" />
                    <meta itemprop="embedUrl" content="{{ $iframeUrl }}" />
                    <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="{{ $iframeUrl }}" width="100%" height="100%" allow="fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        @if(!$relatedMovies->isEmpty())
        <div class="inner-box category-content" style="padding-bottom: 15px;">
            <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
                <i class="fa fa-star"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> Có thể bạn sẽ thích</font>
                </font>
            </h2>
            <div class="faq-content">
                <ul class="related-movies">
                    @foreach($relatedMovies as $v)
                    <li>
                        <div class="movie-image">
                            <a href="{{ route('home.movie_detail', $v->slug) }}" target="_blank" title="{{ $v->name }}">
                                <img src="{{ getImageUrl($v->image) }}" alt="{{ $v->name }}"/>
                            </a>
                        </div>
                        <div class="movie-info">
                            <h4><a href="{{ route('home.movie_detail', $v->slug) }}" target="_blank">{{ $v->name }}</a></h4>
                            @if(!empty($v->cates))
                                <p>
                                    <a href="{{ route('home.country.index', $v->country->slug) }}" title="Review phim {{ $v->country->name }}">{{ $v->country->name }}</a>
                                    @foreach($v->cates as $c)
                                    - <a href="{{ route('home.cate.index', $c->slug) }}" target="_blank" title="Review phim {{ $c->name }}">{{ $c->name }}</a>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        @endif
        <div class="inner-box category-content" style="padding-bottom:20px;">
            <h1 class="title-2" style="color:#cd1d1f; font-weight:bold;"> <i class="fa fa-video-camera"></i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> {{ $movie->name }}</font>
                </font>
            </h1>
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
                    <font style="vertical-align: inherit;">Thông tin chi tiết</font>
                </font>
            </h2>
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Tên phim:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{ $movie->name }}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Quốc gia:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {!! !empty($movie->country->name) ? '<a href="'.route('home.country.index', $movie->country->slug).'">'.$movie->country->name.'</a>' : '-' !!}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Năm sản xuất:</font>
                            </font>
                        </b>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> {{ !empty($movie->year) ? $movie->year : '-' }}</font>
                        </font>
                    </p>
                    <p>
                        <b>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Thể loại:</font>
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
                    <font style="vertical-align: inherit;">Danh sách tập phim</font>
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
                                            <font style="vertical-align: inherit;">Danh sách tập phim</font>
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
