<?php
$imageUrl = getImageUrl($item->image);
?>
<div class="col-xs-6 col-sm-2" style="margin-bottom:20px; min-height:330px;">
    <a href="{{ route('home.movie_detail', $item->slug) }}">
        <img src="{{ asset('/images/blank.png') }}" data-src="{!! $imageUrl !!}" style="width:100%; height:233px;" class="lazyload" /><br />
        <center>
            <h3 style="padding-top:5px; padding-bottom:0px !important; font-size:16px;">{{ $item->name }}</h3>
        </center>
    </a>
</div>
