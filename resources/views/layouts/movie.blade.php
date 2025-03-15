<?php
$img = !empty($item->thumb_image) ? $item->thumb_image : $item->image;
$imageUrl = getImageUrl($img);
?>
<div class="col-xs-6 col-sm-3  movie-item">
    @if (!empty($item->year))
    <span class="movie-label">{{ $item->year }}</span>
    @endif
    <a href="{{ route('home.movie_detail', $item->slug) }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $item->name }}" style="width:100%; height:50%; object-fit: cover;" class="lazyload" /><br />
        <center>
            <h3 class="movie-name">{{ $item->name }}</h3>
        </center>
    </a>
</div>
