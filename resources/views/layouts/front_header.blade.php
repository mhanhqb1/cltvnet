<?php
$cates = getFrontCates();
?>

<header class="top-header top-header-bg">
    <div class="container-fluid">
        <div class="container-max">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="top-head-left">
                        @if (!empty($web_phone))
                        <div class="top-contact">
                            <h3>Support By : <a href="tel:{{ $web_phone }}">{{ $web_phone }}</a></h3>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="top-header-right">
                        <div class="top-header-social">
                            <ul>
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
                        <!-- <div class="language-list">
                            <select class="language-list-item">
                                <option>English</option>
                                <option>العربيّة</option>
                                <option>Deutsch</option>
                                <option>Português</option>
                                <option>简体中文</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="navbar-area">

    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="/images/logos/logo-1.png" class="logo-one" alt="Logo">
            <img src="/images/logos/logo-2.png" class="logo-two" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container-fluid">
            <div class="container-max">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logos/logo-1.png" class="logo-one" alt="Logo">
                        <img src="/images/logos/logo-2.png" class="logo-two" alt="Logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link {{ in_array($routeName, ['front.home.index']) ? 'active' : '' }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    {{ __('About') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ in_array($routeName, ['front.post.index']) ? 'active' : '' }}">
                                    {{ __('Product') }}
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($cates as $cate)
                                    <li class="nav-item">
                                        <a href="{{ route('front.post.cate_detail', $cate->slug) }}" class="nav-link">
                                            {{ $cate->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ in_array($routeName, ['front.post.index']) ? 'active' : '' }}">
                                    {{ __('Post') }}
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($cates as $cate)
                                    <li class="nav-item">
                                        <a href="{{ route('front.post.cate_detail', $cate->slug) }}" class="nav-link">
                                            {{ $cate->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.contact.index') }}" class="nav-link {{ in_array($routeName, ['front.contact.index']) ? 'active' : '' }}">
                                    {{ __('Contact') }}
                                </a>
                            </li>
                        </ul>
                        <div class="nav-side d-display nav-side-mt">
                            <div class="nav-side-item">
                                <div class="search-side-widget">
                                    <form class="search-side-form">
                                        <input type="search" class="form-control" placeholder="{{ __('Search...') }}">
                                        <button type="submit">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="nav-side-item">
                                <div class="get-btn">
                                    <a href="{{ route('front.contact.index') }}" class="default-btn btn-bg-two border-radius-50">{{ __('Get A Quote') }} <i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="side-nav-responsive">
        <div class="container-max">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="in-circle circle-one"></div>
                    <div class="in-circle circle-two"></div>
                    <div class="in-circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-nav-item nav-side">
                            <div class="search-box">
                                <i class='bx bx-search'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-layer"></div>
            <div class="search-layer"></div>
            <div class="search-layer"></div>
            <div class="search-close">
                <span class="search-close-line"></span>
                <span class="search-close-line"></span>
            </div>
            <div class="search-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
