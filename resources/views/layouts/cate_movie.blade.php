<?php
$imageUrl = getImageUrl($item->image);
?>
@if (!empty($item['cate_type']))
<div class="cate-movie-item">
    <div class="categ-image" style="background-image:url({!! $imageUrl !!})">
        <a href="{{ route('home.movie_detail2', $item->slug) }}"></a>
    </div>
    <div class="categ-title">
        <a href="{{ route('home.movie_detail2', $item->slug) }}">{{ $item->name }}</a>
    </div>
</div>
@else
<div class="cate-movie-item">
    <span class="movie-label">{{ $item->year }}</span>
    <div class="categ-image" style="background-image:url({!! $imageUrl !!})">
        <a href="{{ route('home.movie_detail', $item->slug) }}"></a>
    </div>
    <div class="categ-title">
        <a href="{{ route('home.movie_detail', $item->slug) }}">{{ $item->name }}</a>
    </div>
</div>
@endif
