@extends('layouts.main')

@section('content')
<!-- Start Slider Area -->
<div class="slider-area pt-40">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider-wrapper feature-carousel owl-carousel">
                    <div class="single-feature row">
                        <div class="slider-part-one col-md-6 pr-0">
                            @include('elements.video_slider')
                        </div>
                        <div class="slider-part-two col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                @include('elements.video_slider')
                                </div>
                                <div class="col-md-6">
                                @include('elements.video_slider')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                @include('elements.video_slider')
                                </div>
                                <div class="col-md-6">
                                @include('elements.video_slider')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Slider Area -->
<!-- Start Video Carousel -->
<div class="video-carousel-area themeix-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="themeix-section-h">
                    <span class="heading-icon"><i class="fa fa-bolt"></i></span>
                    <h3>Trending Videos</h3>
                </div>
                <div class="video-carousel owl-carousel">
                    <div class="single-video">
                        <div class="video-img">
                            <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/28.jpg" alt="Video" />
                                <noscript>
                                    <img src="images/thumbnails/28.jpg" alt="video" />
                                </noscript>
                            </a>
                            <span class="video-duration">5.28</span>
                        </div>
                        <div class="video-content">
                            <h4><a href="single-video.html" class="video-title">Funny videos 2016 funny pranks try not to laugh challenge</a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>241,021</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-up like-icon"></span>
                                        <span>2140</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-down dislike-icon"></span>
                                        <span>2140</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-video">
                        <div class="video-img">
                            <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/2.jpg" alt="Video" />
                                <noscript>
                                    <img src="images/thumbnails/2.jpg" alt="video" />
                                </noscript>
                            </a>
                            <span class="video-duration">3.11</span>
                        </div>
                        <div class="video-content">
                            <h4><a href="single-video.html" class="video-title">Double Chocolate-Stuffed Mini Churros </a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>241,021</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-up like-icon"></span>
                                        <span>996</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-down dislike-icon"></span>
                                        <span>2140</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-video">
                        <div class="video-img">
                            <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/23.jpg" alt="Video" />
                                <noscript>
                                    <img src="images/thumbnails/23.jpg" alt="video" />
                                </noscript>
                            </a>
                            <span class="video-duration">5.10</span>
                        </div>
                        <div class="video-content">
                            <h4><a href="single-video.html" class="video-title">Greek-Style Pasta Bake (Pasticcio - English Recipe)</a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>241,021</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-up like-icon"></span>
                                        <span>785</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-down dislike-icon"></span>
                                        <span>2140</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-video">
                        <div class="video-img">
                            <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/4.jpg" alt="Video" />
                                <noscript>
                                    <img src="images/thumbnails/4.jpg" alt="video" />
                                </noscript>
                            </a>
                            <span class="video-duration">2.29</span>
                        </div>
                        <div class="video-content">
                            <h4><a href="single-video.html" class="video-title">Rainbow Sprinkle Cinnamon Rolls (Gougeres Video)</a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>991,021</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-up like-icon"></span>
                                        <span>7456</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-down dislike-icon"></span>
                                        <span>2140</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-video">
                        <div class="video-img">
                            <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/5.jpg" alt="Video" />
                            </a>
                            <span class="video-duration">5.28</span>
                        </div>
                        <div class="video-content">
                            <h4><a href="single-video.html" class="video-title">Buffalo Chicken Potato Skins (Gougeres English Video)</a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>241,021</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-up like-icon"></span>
                                        <span>2140</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="far fa-thumbs-down dislike-icon"></span>
                                        <span>2140</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Video Carousel -->
<!-- Start Wide Video Section -->
<div class="wide-video-section themeix-ptb themeix-info pb-0 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="themeix-section-h">
                    <span class="heading-icon"><i class="fa fa-book"></i></span>
                    <h3>Appetizers Recipe</h3>
                    <a href="#" class="see-all-link">See all videos</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/6.jpg" alt="Video" />
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Buffalo Chicken Potato Skins</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/7.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/7.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Cheesy Stuffed Plantain Tots</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/8.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/8.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">French Cheese Puffs (Gougeres)</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/9.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/9.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Cheesy Pretzel Ring Dip</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/10.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/10.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Spicy Mango Chicken Wings</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/11.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/11.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Brick Oven-Style Pizza</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/12.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/12.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Avocado Chickpea Salad </a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 themeix-half">
                <div class="single-video">
                    <div class="video-img">
                        <a href="single-video.html">
                            <img class="lazy" data-src="assets/images/thumbnails/13.jpg" alt="Video" />
                            <noscript>
                                <img src="assets/images/thumbnails/13.jpg" alt="video" />
                            </noscript>
                        </a>
                        <span class="video-duration">5.28</span>
                    </div>
                    <div class="video-content">
                        <h4><a href="single-video.html" class="video-title">Honey Lime Sriracha</a></h4>
                        <div class="video-counter">
                            <div class="video-viewers">
                                <span class="fa fa-eye view-icon"></span>
                                <span>241,021</span>
                            </div>
                            <div class="video-feedback">
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-up like-icon"></span>
                                    <span>2140</span>
                                </div>
                                <div class="video-like-counter">
                                    <span class="far fa-thumbs-down dislike-icon"></span>
                                    <span>2140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wide Video Section -->
@endsection
