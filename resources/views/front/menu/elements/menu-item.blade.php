<figure class="my-3 my-md-4 tstbite-card">
    <a href="{{ route('front.menu.detail', ['slug' => $menu->slug]) }}" class="tstbite-animation stretched-link rounded-6 card-image">
        <img src="{{ $menu->image }}" class="w-100" alt="Menu">
    </a>
    <figcaption class="mt-2">
        <a href="{{ route('front.menu.detail', ['slug' => $menu->slug]) }}" class="text-black d-block mt-1 font-weight-semibold big">{{ $menu->name }}</a>
    </figcaption>
</figure>
