<div class="col-lg-4 col-md-6">
    <div class="blog-card">
        <div class="blog-img">
            <a href="blog-details.html">
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
                    <a href="#"><i class='bx bxs-user'></i> By Admin</a>
                </li>
                @if (!$item->cates->isEmpty())
                <li>
                    <a href="{{ route('front.post.cate_detail', $item->cates[0]->slug) }}"><i class='bx bx-purchase-tag-alt'></i>{{ $item->cates[0]->name }}</a>
                </li>
                @endif
            </ul>
            <h3>
                <a href="{{ route('front.post.detail', $item->slug) }}">{{ $item->name }}</a>
            </h3>
            <p>{{ $item->description }}</p>
            <a href="{{ route('front.post.detail', $item->slug) }}" class="read-btn">{{ __('Read More') }} <i class='bx bx-chevron-right'></i></a>
        </div>
    </div>
</div>
