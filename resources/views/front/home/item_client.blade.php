<div class="clients-content">
    <div class="content">
        <img src="{{ getImageUrl($item->image) }}" alt="Images">
        <i class='bx bxs-quote-alt-left'></i>
        <h3>{{ $item->name }}</h3>
        <span>{{ $item->job }}</span>
    </div>
    <p>
        “{{ $item->message }}”
    </p>
</div>
