<?php
$imageUrl = getImageUrl($item->image);
?>
<div class="col-xs-6 col-sm-2  movie-item">
    <span class="movie-label">{{ $item->year }}</span>
    <a href="{{ route('home.movie_detail', $item->slug) }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $item->name }}" style="width:100%; height:233px; object-fit: cover;" class="lazyload" /><br />
        <center>
            <h3 class="movie-name">{{ $item->name }}</h3>
        </center>
    </a>
</div>
