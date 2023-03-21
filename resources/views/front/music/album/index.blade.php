@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/music.css') }}" media="all">
@endPush

@section('content')
<section class="features-table wf-section">
    <div class="container">
        <h2 class="centered-heading">{{ $album->name }}</h2>
        <div class="album-left">
            <center>
                <img src="{{ getImageUrl($album->image, 'playlist') }}" loading="lazy" width="90%" alt="{{ $album->name }}" />
                <button onclick="return albumPlayer({{ $album->id }})" class="button-primary w-button">{{ __('Play all') }}</button>
            </center>
        </div>
        <div class="album-right">
            <h3 class="centered-heading">Danh sách bài hát</h3>
            <div class="album-music">
                @foreach($album->music as $k => $m)
                <div class="music-content" id="music-{{ $m->id }}" onclick="return albumPlayer({{ $album->id }}, {{ $k }})">
                    <div>
                        <h3 title="{{ $m->name }}">{{ $k + 1 }}. {{ $m->name }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
@include('front.music.mp3_player')
@endSection
