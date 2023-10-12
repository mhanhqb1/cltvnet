@extends('layouts.front-master')

@section('content')
<div class="container">
    <div class="card rounded-16 overflow-hidden border-0 bg-secondary mt-0 mt-md-4">
        <div class="row g-0">
            <div class="col-lg-7 card-image card-image-top">
                <img src="{{ $favoriteMenu[0]->image }}" class="w-100" alt="Menu">
            </div>
            <div class="col-lg-5">
                <div class="p-4 p-md-5 d-flex flex-column justify-content-center h-100 position-relative">
                    <strong>
                        <svg data-name="feather-icon/trending-up" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <rect data-name="Bounding Box" width="20" height="20" fill="rgba(255,255,255,0)" />
                            <path d="M.244,11.423a.834.834,0,0,1,0-1.178L6.494,3.994a.834.834,0,0,1,1.178,0L11.25,7.571l5.9-5.9H14.167a.833.833,0,1,1,0-1.667h5A.833.833,0,0,1,20,.833v5a.834.834,0,0,1-1.667,0V2.845L11.839,9.339a.834.834,0,0,1-1.179,0L7.083,5.761l-5.66,5.661a.834.834,0,0,1-1.179,0Z" transform="translate(0 4.167)" fill="#ff642f" />
                        </svg>
                        <span class="ml-2 caption font-weight-medium">85% người dùng yêu thích thực đơn này</span>
                    </strong>
                    <h4 class="my-3">{{ $favoriteMenu[0]->name }}</h4>
                    <p class="big pr-0 pr-md-5 pb-3 pb-sm-5 pb-lg-0">{{ $favoriteMenu[0]->description }}</p>
                    <a href="{{ route('front.menu.detail', ['slug' => $favoriteMenu[0]->slug, 'id' => $favoriteMenu[0]->menu_id]) }}" class="circle circle-lg tstbite-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13.333" height="13.333" viewBox="0 0 13.333 13.333">
                            <path d="M6.077,13.089a.833.833,0,0,1,0-1.178L10.488,7.5H.833a.833.833,0,0,1,0-1.667h9.655L6.077,1.423A.834.834,0,0,1,7.256.244l5.829,5.83a.833.833,0,0,1,0,1.186L7.256,13.089a.834.834,0,0,1-1.179,0Z" fill="#ff642f" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Thực đơn yêu thích</h5>
        <div class="row">
            @foreach ($favoriteMenu as $k => $menu)
            @if ($k != 0)
            <div class="col-md-4">
                <figure class="my-3 tstbite-card">
                    <a href="{{ route('front.menu.detail', ['slug' => $menu->slug, 'id' => $menu->menu_id]) }}" class="tstbite-animation rounded-6 card-image">
                        <img src="{{ $menu->image }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="mt-2">
                        <div class="w-100 float-left">
                            <div class="float-left">
                                <div class="fabrx-ratings has-rating rating">
                                    <input type="radio" id="radio1" name="rate1" value="1" checked="checked">
                                    <label for="radio1" class="custom-starboxes"></label>
                                    <input type="radio" id="radio2" name="rate1" value="2">
                                    <label for="radio2" class="custom-starboxes"></label>
                                    <input type="radio" id="radio3" name="rate1" value="3">
                                    <label for="radio3" class="custom-starboxes"></label>
                                    <input type="radio" id="radio4" name="rate1" value="4">
                                    <label for="radio4" class="custom-starboxes"></label>
                                    <input type="radio" id="radio5" name="rate1" value="5">
                                    <label for="radio5" class="custom-starboxes"></label>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('front.menu.detail', ['slug' => $menu->slug, 'id' => $menu->menu_id]) }}" class="f-size-20 text-black d-block mt-1 font-weight-semibold">{{ $menu->name }}</a>
                    </figcaption>
                </figure>
            </div>
            @endif
            @endforeach
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Món ăn yêu thích</h5>
        <div class="row">
            @foreach($favoriteFood as $food)
            <div class="col-md-4">
                <figure class="my-3 tstbite-card">
                    <a href="{{ route('front.foods.detail', ['slug' => $food->slug, 'id' => $food->food_id]) }}" class="tstbite-animation rounded-6 card-image">
                        <img src="{{ $food->image }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="mt-2">
                        <div class="w-100 float-left">
                            <div class="float-left">
                                <div class="fabrx-ratings has-rating rating">
                                    <input type="radio" id="radio_{{ $food->food_id }}_1" name="rate_{{ $food->food_id }}" value="1" checked="checked">
                                    <label for="radio_{{ $food->food_id }}_1" class="custom-starboxes"></label>
                                    <input type="radio" id="radio_{{ $food->food_id }}_2" name="rate_{{ $food->food_id }}" value="2">
                                    <label for="radio_{{ $food->food_id }}_2" class="custom-starboxes"></label>
                                    <input type="radio" id="radio_{{ $food->food_id }}_3" name="rate_{{ $food->food_id }}" value="3">
                                    <label for="radio_{{ $food->food_id }}_3" class="custom-starboxes"></label>
                                    <input type="radio" id="radio_{{ $food->food_id }}_4" name="rate_{{ $food->food_id }}" value="4">
                                    <label for="radio_{{ $food->food_id }}_4" class="custom-starboxes"></label>
                                    <input type="radio" id="radio_{{ $food->food_id }}_5" name="rate_{{ $food->food_id }}" value="5">
                                    <label for="radio_{{ $food->food_id }}_5" class="custom-starboxes"></label>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('front.foods.detail', ['slug' => $food->slug, 'id' => $food->food_id]) }}" class="f-size-20 text-black d-block mt-1 font-weight-semibold">{{ $food->name }}</a>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Danh mục món ăn phổ biến</h5>
        <div class="row">
            @foreach ($mealTypes as $type => $mealType)
            <div class="col-lg-2 col-md-4 col-4">
                <figure class="my-3 text-center tstbite-card">
                    <a href="{{ route('front.foods.mealtype', $mealType['slug']) }}" class="tstbite-animation stretched-link rounded-circle">
                        <img src="{{ $mealType['image'] }}" class="rounded-circle" alt="{{ $mealType['title'] }}">
                    </a>
                    <figcaption class="mt-2">
                        <a href="{{ route('front.foods.mealtype', $mealType['slug']) }}" class="tstbite-category-title">{{ $mealType['title'] }}</a>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </section>
</div>
<!-- Tstbite Components Bg Primary Light, My 5, Py 5 -->
<section class="tstbite-components bg-primary-light my-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 offset-xl-3 offset-lg-2 text-center py-4 py-md-5">
                <h2 class="mb-3 h1">Ăn gì cũng được</h2>
                <p class="f-size-24 font-weight-regular">Bạn đang phân vân chưa biết ăn gì <br>Hãy nhấn vào nút bên dưới, chúng tôi sẽ giúp bạn tạo thực đơn</p>
                <div class="mt-4">
                    <a href="{{ route('front.menu.random') }}" target="_blank" class="btn btn-primary">Tạo thực đơn ngẫu nhiên</a>
                </div>
                <small class="mt-3 d-block">Chỉ mất vài giây bạn sẽ có thực đơn cho mình</small>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 h3 mb-0">Thực đơn mới cập nhật</h5>
        <div class="row">
            @foreach($lastestMenu as $menu)
            <div class="col-md-6">
                <figure class="my-3 tstbite-card">
                    <a href="{{ route('front.menu.detail', ['slug' => $menu->slug, 'id' => $menu->menu_id]) }}" class="tstbite-animation stretched-link rounded-top-6 card-image">
                        <img src="{{ $menu->image }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="tstbite-collection border-top-0 rounded-bottom-6">
                        <div class="text-black pt-3 pb-4 px-4 d-lg-flex align-items-end justify-content-between text-right">
                            <h5 class="mb-3 md-lg-0 pr-0 pr-lg-4 text-left"><a href="{{ route('front.menu.detail', ['slug' => $menu->slug, 'id' => $menu->menu_id]) }}" class="stretched-link">{{ $menu->name }}</a></h5>
                            <span class="btn btn-sm btn-outline-dark text-nowrap">{{ $menu->menu_foods_count ?? 0 }} món ăn</span>
                        </div>
                    </figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Món ăn mới cập nhật</h5>
        <div class="row">
            @foreach($lastestFood as $food)
            <div class="col-lg-3 col-md-4 col-6">
                @include('front.foods.elements.food-item', ['food' => $food])
            </div>
            @endforeach
        </div>
        <div class="text-center py-5">
            <a href="{{ route('front.foods.index') }}" class="btn btn-outline-dark px-4 px-md-5 py-1 py-md-2 big font-weight-medium">Xem tất cả</a>
        </div>
    </section>
</div>
@endsection
