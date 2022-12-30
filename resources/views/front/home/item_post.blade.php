<?php
$urlDetail = route('front.post.detail', $item->slug);
if (!empty($item->type)) {
    $urlDetail = route('front.product.detail', $item->slug);
}
?>
<div class="col-lg-4 col-md-6">
    <div class="blog-card">
        <div class="blog-img">
            <a href="{{ $urlDetail }}">
                <img src="{{ getImageUrl($item->image) }}" alt="{{ $item->name }}">
            </a>
            <div class="blog-tag">
                <h3>{{ date('d', strtotime($item->created_at)) }}</h3>
                <span>{{ date('M', strtotime($item->created_at)) }}</span>
            </div>
        </div>
        <div class="content">
            <ul>
                <li>
                    <a href="#"><i class='bx bxs-user'></i> Admin</a>
                </li>
                @if (!$item->cates->isEmpty())
                <li>
                    <a href="{{ route('front.post.cate_detail', $item->cates[0]->slug) }}"><i class='bx bx-purchase-tag-alt'></i>{{ $item->cates[0]->name }}</a>
                </li>
                @endif
            </ul>
            <h3>
                <a href="{{ $urlDetail }}">{{ $item->name }}</a>
            </h3>
            <p>{{ $item->description }}</p>
            <a href="{{ $urlDetail }}" class="read-btn">{{ __('Read More') }} <i class='bx bx-chevron-right'></i></a>
        </div>
    </div>
</div>
