<li>
    <a href="{{ route('front.post.detail', $item->slug) }}">
        <img src="{{ getImageUrl($item->image) }}" alt="Images">
    </a>
    <div class="content">
        <h3><a href="{{ route('front.post.detail', $item->slug) }}">{{ $item->name }}</a></h3>
        <span>{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
    </div>
</li>
