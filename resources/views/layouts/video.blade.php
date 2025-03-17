<?php
$img = !empty($item->thumb_image) ? $item->thumb_image : $item->image;
$imageUrl = getImageUrl(!empty($item->lastVideo[0]->image) ? $item->lastVideo[0]->image : $img);
$name = !empty($item->is_series) ? $item->name.' - '.$item->lastVideo[0]->name : $item->name;
$description = $item->description;
$label = !empty($item->is_series) ? $item->lastVideo[0]->name : $item->year;
$cates = $item->cates;
$url = empty($item->is_series) ? route('home.movie_detail', $item->slug) : route('home.video_detail', ['movieSlug' => $item->slug, 'videoSlug' => $item->lastVideo[0]->slug]);
?>
<div class="movie-item">
    @if (!empty($label))
    <span class="movie-label">{{ $label }}</span>
    @endif
    <a href="{{ $url }}" style="display: block;">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $name }}" style="width:100%; height:70%; object-fit: cover;" class="lazyload" /><br />
    </a>
    @if (!empty($cates))
    <div class="movie-cates">
        @foreach ($cates as $cate)
        <a href="{{ route('home.cate.index', $cate->slug) }}" target="_blank" class="movie-cate movie-cate-{{ $cate->id }}">{{ $cate->name }}</a>
        @endforeach
    </div>
    @endif
    <div>
        <a href="{{ $url }}" class="movie-name">{{ $name }}</a>
        <p class="movie-description">{{ $description }}</p>
    </div>
</div>
