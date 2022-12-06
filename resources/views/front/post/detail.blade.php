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
                <li>
                    @if (empty($item->type))
                    <a href="{{ route('front.post.index') }}">{{ __('Post') }}</a>
                    @else
                    <a href="{{ route('front.product.index') }}">{{ __('Product') }}</a>
                    @endif
                </li>
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

<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-article">
                    <div class="blog-article-img">
                        <img src="{{ getImageUrl($item->image) }}" alt="{{ $item->name }}">
                        <div class="blog-article-tag">
                            <h3>{{ date('d', strtotime($item->created_at)) }}</h3>
                            <span>{{ date('M', strtotime($item->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="blog-article-title">
                        <ul>
                            <li><i class="bx bxs-user"></i> By Admin</li>
                            <li><i class="bx bx-show-alt"></i>322 View</li>
                        </ul>
                        <h2>{{ $item->name }}</h2>
                    </div>
                    <div class="article-content">{!! $item->detail !!}</div>
                    <div class="blog-article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <div class="blog-tag">
                                    <ul>
                                        @if (!empty($item->meta_keyword))
                                        <li><i class="bx bx-purchase-tag-alt"></i> {{ __('Tags') }}:</li>
                                        @foreach (explode(',',$item->meta_keyword) as $tag)
                                        <li><a href="javascript:void(0)">{{ trim($tag) }}</a></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-5 col-md-5">
                                <ul class="social-icon">
                                    @if (!empty($facebook_url))
                                    <li>
                                        <a href="{{ $facebook_url }}" target="_blank">
                                            <i class='bx bxl-facebook'></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if (!empty($twitter_url))
                                    <li>
                                        <a href="{{ $twitter_url }}" target="_blank">
                                            <i class='bx bxl-twitter'></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if (!empty($instagram_url))
                                    <li>
                                        <a href="{{ $instagram_url }}" target="_blank">
                                            <i class='bx bxl-instagram'></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="side-bar-area">
                    <div class="search-widget">
                        <form action="{{ !empty($item->type) ? route('front.product.index') : route('front.post.index') }}" class="search-form">
                            <input type="text" name="s" class="form-control" placeholder="{{ __('Search...') }}">
                            <button type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="side-bar-widget">
                        <h3 class="title">Categories</h3>
                        <div class="side-bar-categories">
                            <?php
                            $cates = getFrontCates($item->type);
                            ?>
                            <ul>
                                @foreach ($cates as $cate)
                                <li>
                                    <div class="line-circle"></div>
                                    <a href="{{ route('front.post.cate_detail', $cate->slug) }}" target="_blank">{{ $cate->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="side-bar-widget">
                        <h3 class="title">{{ !empty($item->type) ? __('Latest Product') : __('Latest Blog') }}</h3>
                        <div class="widget-popular-post">
                            <?php
                                $posts = getLastestPosts($item->type, 5);
                            ?>
                            @foreach ($posts as $post)
                                @include('front.post.item_lastest_post', ['post' => $post])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
