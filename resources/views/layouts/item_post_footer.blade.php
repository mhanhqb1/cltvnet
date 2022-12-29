<?php
$url = route('front.post.detail', $item->slug);
if (!empty($item->type)) {
    $url = route('front.product.detail', $item->slug);
}
?>
<li>
    <a href="{{ $url }}">
        <img src="{{ getImageUrl($item->image) }}" alt="Images">
    </a>
    <div class="content">
        <h3><a href="{{ $url }}" title="{{ $item->name }}">{{ $item->name }}</a></h3>
        <span>{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
    </div>
</li>
