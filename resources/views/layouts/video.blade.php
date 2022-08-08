<?php
$imageUrl = getImageUrl(!empty($item->image) ? $item->image : $item->movie->image);
$name = !empty($item->movie->is_series) ? $item->movie->name.' - '.$item->name : $item->movie->name;
$url = empty($item->movie->is_series) ? route('home.movie_detail', $item->movie->slug) : route('home.video_detail', ['movieSlug' => $item->movie->slug, 'videoSlug' => $item->slug]);
?>
<div class="col-xs-6 col-sm-2" style="margin-bottom:20px; min-height:330px;">
    <a href="{{ $url }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" style="width:100%; height:233px;" class="lazyload" /><br />
        <center>
            <h3 style="padding-top:5px; padding-bottom:0px !important; font-size:16px;">{{ $name }}</h3>
        </center>
    </a>
</div>
