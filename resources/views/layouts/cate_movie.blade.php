<?php
$imageUrl = getImageUrl($item->image);
?>
<div>
    <div class="categ-image" style="background-image:url({!! $imageUrl !!})">
        <a href="#"></a>
    </div>
    <div class="categ-title">
        <a href="#">{{ $item->name }}</a>
    </div>
</div>
