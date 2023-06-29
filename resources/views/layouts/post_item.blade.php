<?php
$postUrl = route('front.post.detail', $item->slug);
$postTitle = $item->name;
?>
<div class="card">
    <div class="card-image">
        <a href="{{ $postUrl }}"><img src="{{ getImageUrl($item->image) }}" alt="{{ $postTitle }}" rel="noopener noreferrer" /></a>
    </div>
    <div class="card-content">
        <h2><a href="{{ $postUrl }}" title="{{ $postTitle }}">{{ $postTitle }}</a></h2>
        <p>{{ $item->description }}</p>
        <div class="card-footer">
            <span><i class="fa-solid fa-calendar-days"></i> {{ date('Y-m-d', strtotime($item->created_at)) }}</span>
            <a href="{{ $postUrl }}" class="action">
                Read more
                <span aria-hidden="true">
                    →
                </span>
            </a>
        </div>
    </div>
</div>
