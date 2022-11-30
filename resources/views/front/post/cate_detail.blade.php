@extends('layouts.master')

@section('content')
<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $pageTitle }}</h3>
            <ul>
                <li>
                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                <li>{{ __('Cates') }}</li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                <li>{{ $pageTitle }}</li>
            </ul>
        </div>
    </div>
    <div class="inner-shape">
        <img src="/images/shape/inner-shape.png" alt="Images">
    </div>
</div>
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            @if (empty($item->type))
            <span class="sp-color2">Latest Blog</span>
            <h2>Let’s Check Some Latest Blog</h2>
            @else
            <span class="sp-color2">Latest Product</span>
            <h2>Let’s Check Some Latest Product</h2>
            @endif
        </div>
        <div class="row pt-45">
            @if (!$data->isEmpty())
                @foreach($data as $item)
                    @include('front.home.item_post', ['item' => $item])
                @endforeach

                <div class="col-lg-12 col-md-12 text-center">
                    {{ $data->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
