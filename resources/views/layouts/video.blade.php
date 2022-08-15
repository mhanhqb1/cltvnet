<?php
$imageUrl = getImageUrl(!empty($item->image) ? $item->image : $item->movie->image);
$name = !empty($item->movie->is_series) ? $item->movie->name.' - '.$item->name : $item->movie->name;
$url = empty($item->movie->is_series) ? route('home.movie_detail', $item->movie->slug) : route('home.video_detail', ['movieSlug' => $item->movie->slug, 'videoSlug' => $item->slug]);
?>
<div class="col-xs-6 col-sm-2 movie-item">
    <span class="movie-label">{{ !empty($item->movie->is_series) ? $item->name : $item->movie->year }}</span>
    <a href="{{ $url }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $name }}" style="width:100%; height:233px;" class="lazyload" /><br />
        <center>
            <h3 class="movie-name">{{ $name }}</h3>
        </center>
    </a>
</div>
