@extends('layouts.master')

@section('content')
<div class="banner-area-two">
    <div class="container-fluid">
        <div class="container-max">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="banner-content">
                        <h1>Digital IT Service With Excellent Quality</h1>
                        <p>
                            Aenean Sollicitudin, Lorem quis Bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                        </p>
                        <div class="banner-btn">
                            <a href="{{ route('front.home.about_us') }}" class="default-btn btn-bg-two border-radius-50">Learn More <i class='bx bx-chevron-right'></i></a>
                            <a href="{{ route('front.contact.index') }}" class="default-btn btn-bg-one border-radius-50 ml-20">Get A Quote <i class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner-img">
                        <img src="/images/home-three/home-three-img.png" alt="Images">
                        <div class="banner-img-shape">
                            <img src="/images/home-three/home-three-shape.png" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="banner-sub-slider owl-carousel owl-theme">
            @if(!$topSliders->isEmpty())
            @foreach ($topSliders as $v)
            <div class="banner-sub-item">
                <img src="{{ getImageUrl($v->image) }}" alt="{{ $v->text }}">
                <div class="content">
                    <h3>{{ $v->number }}</h3>
                    <span>{{ $v->text }}</span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>


<div class="about-area about-bg pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-2">
                    <img src="/images/about/about-img3.jpg" alt="About Images">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-2 ml-20">
                    <div class="section-title">
                        <span class="sp-color1">About Us</span>
                        <h2>Right Partner for Software Innovation</h2>
                        <p>
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                            Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum auctor a ornare odio.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="about-card">
                                <div class="content">
                                    <i class="flaticon-practice"></i>
                                    <h3>Experience</h3>
                                </div>
                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="about-card">
                                <div class="content">
                                    <i class="flaticon-help"></i>
                                    <h3>Quick Support</h3>
                                </div>
                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (!$solutions->isEmpty())
<div class="security-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">IT Security & Computing</span>
            <h2>Searching for a Solution! We Provide Truly Prominent IT Solutions</h2>
        </div>
        <div class="row pt-45">
            @foreach ($solutions as $v)
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="{{ $v->icon }}"></i>
                    <h3><a href="javascript:void(0)">{{ $v->name }}</a></h3>
                    <p>{{ $v->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if (!$services->isEmpty())
<section class="services-area-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Our Services</span>
            <h2>We Provide a Wide Variety of IT Services</h2>
        </div>
        <div class="row pt-45">
            @foreach($services as $v)
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="javascript:void(0)">
                        <img src="{{ getImageUrl($v->image) }}" alt="Images">
                    </a>
                    <div class="content">
                        <i class="{{ $v->icon }}"></i>
                        <span><a href="javascript:void(0)">{{ $v->category }}</a></span>
                        <h3><a href="javascript:void(0)">{{ $v->name }}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<div class="build-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8">
                <div class="build-content">
                    <div class="section-title">
                        <span>We Carry More Than Just Good Coding Skills</span>
                        <h2>Let's Build Your Website!</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="build-btn-area">
                    <a href="{{ route('front.contact.index') }}" class="default-btn btn-bg-two border-radius-50">Contact Us <i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        </div>
        <div class="row pt-45">
            <div class="col-lg-12">
                <div class="play-btn-area">
                    <a href="https://www.youtube.com/watch?v=tUP5S4YdEJo" class="build-play popup-btn"><i class='bx bx-play'></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="case-study-area pb-70">
    <div class="container-fluid p-0">
        <div class="section-title text-center">
            <span class="sp-color2">Case Study</span>
            <h2>Introduce Our Projects and Check Recent Work </h2>
        </div>
        <div class="case-study-slider owl-carousel owl-theme pt-45">
            @if (!$products->isEmpty())
                @foreach ($products as $p)
                    @include('front.home.item_product', ['item' => $p])
                @endforeach
            @endif
        </div>
    </div>
</div>


<div class="talk-area ptb-100">
    <div class="container">
        <div class="talk-content text-center">
            <div class="section-title text-center">
                <span class="sp-color1">Let's Talk</span>
                <h2>We Are Adding Kinds of It Services That You Grow Success</h2>
            </div>
            <a href="{{ route('front.contact.index') }}" class="default-btn btn-bg-two border-radius-5">Contact Us</a>
        </div>
    </div>
</div>


<section class="technology-area-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Technology Index</span>
            <h2>We Deliver Our Best Solution With The Goal of Trusting</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-android"></i>
                    <h3>Android</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-website"></i>
                    <h3>Web</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-apple"></i>
                    <h3>ios</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-television"></i>
                    <h3>TV</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-smartwatch"></i>
                    <h3>Watch </h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-cyber-security"></i>
                    <h3>IOT</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="brand-area-two ptb-100">
    <div class="container">
        <div class="brand-slider owl-carousel owl-theme">
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style1.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style2.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style3.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style4.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style5.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="/images/brand-logo/brand-style3.png" alt="Images">
            </div>
        </div>
    </div>
</div>

@if (!$feedback->isEmpty())
<section class="clients-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Our Clients</span>
            <h2>Our Clients Feedback</h2>
        </div>
        <div class="clients-slider owl-carousel owl-theme pt-45">
            @foreach ($feedback as $v)
                @include('front.home.item_client', ['item' => $v])
            @endforeach
        </div>
    </div>
    <div class="client-circle">
        <div class="client-circle-1">
            <div class="circle"></div>
        </div>
        <div class="client-circle-2">
            <div class="circle"></div>
        </div>
        <div class="client-circle-3">
            <div class="circle"></div>
        </div>
        <div class="client-circle-4">
            <div class="circle"></div>
        </div>
        <div class="client-circle-5">
            <div class="circle"></div>
        </div>
        <div class="client-circle-6">
            <div class="circle"></div>
        </div>
        <div class="client-circle-7">
            <div class="circle"></div>
        </div>
    </div>
</section>
@endif


<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Latest Blog</span>
            <h2>Let’s Check Some Latest Blog</h2>
        </div>
        <div class="row pt-45">
            @if (!$posts->isEmpty())
                @foreach ($posts as $p)
                    @include('front.home.item_post', ['item' => $p])
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
