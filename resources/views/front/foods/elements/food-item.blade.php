<figure class="my-3 my-md-4 tstbite-card">
    <a href="{{ route('front.foods.detail', ['slug' => $food->slug]) }}" class="tstbite-animation stretched-link rounded-6 card-image">
        <img src="{{ $food->image }}" class="w-100" alt="Menu">
    </a>
    <figcaption class="mt-2">
        <a href="{{ route('front.foods.detail', ['slug' => $food->slug]) }}" class="text-black d-block mt-1 font-weight-semibold big">{{ $food->name }}</a>
    </figcaption>
</figure>
