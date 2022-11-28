<?php
$url = route('front.post.detail', $item->slug);
?>
<div class="case-study-item">
    <a href="{{ $url }}">
        <img src="{{ getImageUrl($item->image) }}" alt="Images">
    </a>
    <div class="content">
        <h3><a href="{{ $url }}">{{ $item->name }}</a></h3>
        @if(!$item->cates->isEmpty())
        <ul>
            @foreach ($item->cates as $k => $v)
                @if ($k < 2)
                    <li><a href="{{ route('front.post.cate_detail', $v->slug) }}">{{ $v->name }}</a></li>
                @endif
            @endforeach
        </ul>
        @endif
        <a href="{{ $url }}" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
    </div>
</div>
