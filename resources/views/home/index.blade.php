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
                            @include('elements.video_slider', ['item' => $topVideos[0]])
                        </div>
                        <div class="slider-part-two col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    @include('elements.video_slider', ['item' => $topVideos[1]])
                                </div>
                                <div class="col-md-6">
                                    @include('elements.video_slider', ['item' => $topVideos[2]])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    @include('elements.video_slider', ['item' => $topVideos[3]])
                                </div>
                                <div class="col-md-6">
                                    @include('elements.video_slider', ['item' => $topVideos[4]])
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
                    @foreach ($trendVideos as $item)
                        @include('elements.video_item', ['item' => $item])
                    @endforeach
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
                @foreach ($newVideos as $item)
                    <div class="col-md-6 col-lg-3 themeix-half">
                        @include('elements.video_item', ['item' => $item])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Wide Video Section -->
<!-- Start Review And Contribute Section -->
<div class="review-and-contribute themeix-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="review-area">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fab fa-html5" aria-hidden="true"></i></span>
                        <h3>Animal Plannet</h3>
                    </div>
                    @for($i=0; $i<=3; $i++)
                        @include('elements.video_item2')
                    @endfor
                </div>
            </div>
            <!-- Start Top Contribute -->
            <div class="col-lg-4 col-md-6">
                <div class="right-sidebar">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fab fa-html5"></i></span>
                        <h3>Top 5 Contributor</h3>
                    </div>
                    @for($i=0; $i<=3; $i++)
                        @include('elements.author_item')
                    @endfor
                    <!-- Start Subscribe Box -->
                    <div class="subscribe-box">
                        <div class="themeix-section-h">
                            <span class="heading-icon"><i class="fab fa-html5" aria-hidden="true"></i></span>
                            <h3>Subscribe now</h3>
                        </div>
                        <form action="#" class="subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Give Your Email Address" required>
                                <button type="submit">Go</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Subscribe Box -->
                </div>
                <!-- End Top Contribute -->
            </div>
        </div>
    </div>
</div>
<!-- End Review And Contribute Section -->
@endsection
