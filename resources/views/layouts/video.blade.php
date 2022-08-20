<?php
$imageUrl = getImageUrl(!empty($item->lastVideo[0]->image) ? $item->lastVideo[0]->image : $item->image);
$name = !empty($item->is_series) ? $item->name.' - '.$item->lastVideo[0]->name : $item->name;
$url = empty($item->is_series) ? route('home.movie_detail', $item->slug) : route('home.video_detail', ['movieSlug' => $item->slug, 'videoSlug' => $item->lastVideo[0]->slug]);
?>
<div class="col-xs-6 col-sm-2" style="margin-bottom:20px; min-height:330px;">
    <a href="{{ $url }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" alt="{{ $name }}" style="width:100%; height:233px;" class="lazyload" /><br />
        <center>
            <h3 style="padding-top:5px; padding-bottom:0px !important; font-size:16px;">{{ $name }}</h3>
        </center>
    </a>
</div>
