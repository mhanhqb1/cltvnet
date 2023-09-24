@extends('layouts.front-master')

@section('content')
<div class="container">
    <div class="card rounded-16 overflow-hidden border-0 bg-secondary mt-0 mt-md-4">
        <div class="row g-0">
            <div class="col-lg-7">
                <img src="{{ asset('images/menu1.jpg') }}" class="w-100" alt="Menu">
            </div>
            <div class="col-lg-5">
                <div class="p-4 p-md-5 d-flex flex-column justify-content-center h-100 position-relative">
                    <strong>
                        <svg data-name="feather-icon/trending-up" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <rect data-name="Bounding Box" width="20" height="20" fill="rgba(255,255,255,0)" />
                            <path d="M.244,11.423a.834.834,0,0,1,0-1.178L6.494,3.994a.834.834,0,0,1,1.178,0L11.25,7.571l5.9-5.9H14.167a.833.833,0,1,1,0-1.667h5A.833.833,0,0,1,20,.833v5a.834.834,0,0,1-1.667,0V2.845L11.839,9.339a.834.834,0,0,1-1.179,0L7.083,5.761l-5.66,5.661a.834.834,0,0,1-1.179,0Z" transform="translate(0 4.167)" fill="#ff642f" />
                        </svg>
                        <span class="ml-2 caption font-weight-medium">85% would make this again</span>
                    </strong>
                    <h4 class="my-3">Mighty Super Cheesecake</h4>
                    <p class="big pr-0 pr-md-5 pb-3 pb-sm-5 pb-lg-0">Look no further for a creamy and ultra smooth classic cheesecake recipe! no one can deny its simple decadence.</p>
                    <a href="#0" class="circle circle-lg tstbite-arrow">
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
            <div class="col-md-4">
                <figure class="my-3 tstbite-card">
                    <a href="#0" class="tstbite-animation rounded-6">
                        <img src="{{ asset('images/menu1.jpg') }}" class="w-100" alt="Menu">
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
                        <a href="#0" class="f-size-20 text-black d-block mt-1 font-weight-semibold">Spinach and Cheese Pasta</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Món ăn yêu thích</h5>
        <div class="row">
            <div class="col-md-4">
                <figure class="my-3 tstbite-card">
                    <a href="#0" class="tstbite-animation rounded-6">
                        <img src="{{ asset('images/menu1.jpg') }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="mt-2">
                        <div class="w-100 float-left">
                            <div class="float-left">
                                <div class="fabrx-ratings has-rating rating">
                                    <input type="radio" id="radio16" name="rate4" value="1" checked="checked">
                                    <label for="radio16" class="custom-starboxes"></label>
                                    <input type="radio" id="radio17" name="rate4" value="2">
                                    <label for="radio17" class="custom-starboxes"></label>
                                    <input type="radio" id="radio18" name="rate4" value="3">
                                    <label for="radio18" class="custom-starboxes"></label>
                                    <input type="radio" id="radio19" name="rate4" value="4">
                                    <label for="radio19" class="custom-starboxes"></label>
                                    <input type="radio" id="radio20" name="rate4" value="5">
                                    <label for="radio20" class="custom-starboxes"></label>
                                </div>
                            </div>
                        </div>
                        <a href="#0" class="f-size-20 text-black d-block mt-1 font-weight-semibold">Caramel Strawberry Milkshake</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Danh mục món ăn phổ biến</h5>
        <div class="row">
            @foreach ($mealTypes as $type => $mealType)
            <div class="col-lg-2 col-md-4 col-4">
                <figure class="my-3 text-center tstbite-card">
                    <a href="category.html" class="tstbite-animation stretched-link rounded-circle">
                        <img src="{{ $mealType['image'] }}" class="rounded-circle" alt="{{ $mealType['title'] }}">
                    </a>
                    <figcaption class="mt-2">
                        <a href="category.html" class="tstbite-category-title">{{ $mealType['title'] }}</a>
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
                <h2 class="mb-3 h1">Deliciousness to your inbox</h2>
                <p class="f-size-24 font-weight-regular">Enjoy weekly hand picked recipes <br>and recommendations</p>
                <div class="input-group custom-input-group mt-4">
                    <input type="text" class="form-control" name="email" placeholder="Email Address" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">JOIN</button>
                    </div>
                </div>
                <small class="mt-3 d-block">By joining our newsletter you agree to our <a href="#0" class="text-black d-block d-sm-inline-block"><u class="tstbite-underline">Terms and Conditions</u></a></small>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 h3 mb-0">Thực đơn mới cập nhật</h5>
        <div class="row">
            <div class="col-md-6">
                <figure class="my-3 tstbite-card">
                    <a href="#0" class="tstbite-animation stretched-link rounded-top-6">
                        <img src="{{ asset('images/menu1.jpg') }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="tstbite-collection border-top-0 rounded-bottom-6">
                        <div class="text-black pt-3 pb-4 px-4 d-lg-flex align-items-end justify-content-between text-right">
                            <h5 class="mb-3 md-lg-0 pr-0 pr-lg-4 text-left"><a href="#0" class="stretched-link">Sushi Combos for your Next Party</a></h5>
                            <span class="btn btn-sm btn-outline-dark text-nowrap">156 Recipes</span>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
    <!-- Tstbite Components, My 4, My Md 5 -->
    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Món ăn mới cập nhật</h5>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6">
                <figure class="my-3 my-md-4 tstbite-card">
                    <a href="recipe-sidebar.html" class="tstbite-animation stretched-link rounded-6">
                        <img src="{{ asset('images/menu1.jpg') }}" class="w-100" alt="Menu">
                    </a>
                    <figcaption class="mt-2">
                        <a href="recipe-sidebar.html" class="text-black d-block mt-1 font-weight-semibold big">Caramel Strawberry Milkshake</a>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="text-center py-5">
            <a href="#0" class="btn btn-outline-dark px-4 px-md-5 py-1 py-md-2 big font-weight-medium">Load More</a>
        </div>
    </section>
</div>
@endsection
