<?php
$urlDetail = !empty($post->type) ? route('front.product.detail', $post->slug) : route('front.post.detail', $post->slug);
?>
<article class="item">
    <a href="{{ $urlDetail }}" target="_blank" class="thumb">
        <span class="full-image cover" role="img" style="background-image: url('{{ getImageUrl($post->image) }}');"></span>
    </a>
    <div class="info">
        <h4 class="title-text">
            <a href="{{ $urlDetail }}" target="_blank">
                {{ $post->name }}
            </a>
        </h4>
        <p>{{ date('Y-m-d', strtotime($post->created_at)) }}</p>
    </div>
</article>
