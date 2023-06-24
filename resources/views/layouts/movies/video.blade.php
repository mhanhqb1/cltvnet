<?php
$imageUrl = getImageUrl(!empty($item->lastVideo[0]->image) ? $item->lastVideo[0]->image : $item->image);
$name = !empty($item->is_series) ? $item->name.' - '.$item->lastVideo[0]->name : $item->name;
$description = $item->description;
$url = empty($item->is_series) ? route('home.movie_detail', $item->slug) : route('home.video_detail', ['movieSlug' => $item->slug, 'videoSlug' => $item->lastVideo[0]->slug]);
?>
<div class="card-movie">
    <div class="poster" onclick="return window.open('{{ $url }}', '_self');">
        <img src="{{ $imageUrl }}" />
    </div>
    <div class="details">
        <div class="tags">
            @if($item->year)
            <span>{{ $item->year }}</span>
            @endif
            @if(!empty($item->country->name))
            <span>{{ $item->country->name }}</span>
            @endif
        </div>
        <div class="rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <span>4/5</span>
        </div>
        <h3><a href="{{ $url }}">{{ $name }}</a></h3>
        <div class="info">
            <p>{{ $description }}</p>
        </div>
    </div>
</div>
