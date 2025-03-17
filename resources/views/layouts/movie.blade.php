<?php
$img = !empty($item->thumb_image) ? $item->thumb_image : $item->image;
$imageUrl = getImageUrl($img);
$description = $item->description;
$cates = $item->cates;
$url = route('home.movie_detail', $item->slug);
?>
<div class="movie-item">
    @if (!empty($item->year))
    <span class="movie-label">{{ $item->year }}</span>
    @endif
    <a href="{{ $url }}" style="display:block;" >
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $item->name }}" style="width:100%; height:70%; object-fit: cover;" class="lazyload" /><br />
    </a>
    @if (!empty($cates))
    <div class="movie-cates">
        @foreach ($cates as $cate)
        <a href="{{ route('home.cate.index', $cate->slug) }}" target="_blank" class="movie-cate movie-cate-{{ $cate->id }}">{{ $cate->name }}</a>
        @endforeach
    </div>
    @endif
    <div>
        <a href="{{ $url }}" class="movie-name">{{ $item->name }}</a>
        <p class="movie-description">{{ $description }}</p>
    </div>
</div>
