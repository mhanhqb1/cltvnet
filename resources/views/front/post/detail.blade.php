<?php
    $postUrl = route('front.post.detail', $item->slug);
    $postTitle = $item->name;
?>
@extends('layouts.master')

@section('content')
<div class="container post-detail grid grid-2">
    <div class="main-content card">
        <div class="card-image">
            <img src="{{ getImageUrl($item->image) }}" alt="{{ $postTitle }}" rel="noopener noreferrer" />
        </div>
        <h2>{{ $postTitle }}</h2>
        <div class="card-content">{!! $item->detail !!}</div>
    </div>
    <div class="sidebar">
        <h2>Xem nhiều</h2>
        <div class="sidebar-content">
            @foreach ($related as $v)
                @include('layouts.post_item', ['item' => $v])
            @endforeach
        </div>
    </div>
</div>
@endsection
