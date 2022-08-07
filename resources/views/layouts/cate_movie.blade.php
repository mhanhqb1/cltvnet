<?php
$imageUrl = getImageUrl($item->image);
?>
<div>
    <div class="categ-image" style="background-image:url({!! $imageUrl !!})">
        <a href="{{ route('home.movie_detail', $item->slug) }}"></a>
    </div>
    <div class="categ-title">
        <a href="{{ route('home.movie_detail', $item->slug) }}">{{ $item->name }}</a>
    </div>
</div>
