@extends('layouts.front-master')

@section('content')
<section class="tstbite-components py-0 text-center">
    <img src="{{ $cate->banner }}" class="w-100" alt="Banner">
</section>
<div class="container">
    <!-- Tstbite Components, My 4, My Md 5, Desserts Box -->
    <section class="tstbite-components my-4 my-md-5 desserts-box">
        <div class="row align-items-end mb-0 mb-md-4 pt-0 pt-md-5">
            <div class="col-lg-9 col-md-8">
                <h5 class="py-3 mb-0">{{ $cate->name }}</h5>
                <p>{{ $cate->description }}</p>
            </div>
            <!-- <div class="col-lg-3 col-md-4">
                <div class="sort-filter">
                    <span>Sort by:</span>
                    <select class="form-control">
                        <option>Sort</option>
                        <option>Sort</option>
                    </select>
                </div>
            </div> -->
        </div>
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-lg-3 col-md-4 col-6">
                @include('front.menu.elements.menu-item', ['menu' => $menu])
            </div>
            @endforeach
        </div>
        @if ($menus->hasPages())
        <div class="clearfix text-center">
            {{ $menus->render('partials.pagination') }}
        </div>
        @endif
    </section>
</div>
@endsection
