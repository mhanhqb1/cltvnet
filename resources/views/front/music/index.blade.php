@extends('layouts.master')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/music.css') }}" media="all">
@endPush

@section('content')
<section class="hero-heading-left wf-section">
    <div class="container">
        <div class="hero-wrapper">
            <div class="hero-split">
                <h1>Title copy goes here</h1>
                <p class="margin-bottom-24px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt sagittis eros. Quisque quis euismod lorem. Etiam sodales ac felis id interdum.</p>
                <a href="#" class="button-primary w-button">Get Started</a>
            </div>
            <div class="hero-split"><img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a2a3312aae1_placeholder%203.svg" loading="lazy" alt="" class="shadow-two" /></div>
        </div>
    </div>
</section>

<section class="features-table wf-section">
    <div class="container">
        <h2 class="centered-heading">Top Music</h2>
        <p class="centered-subheading">Top những bài hát được nghe nhiều nhất</p>
        <div class="comparison-table music-top20">
            @foreach($top20 as $k => $v)
                <div class="music-top20-content">
                    <span>{{ $k + 1 }}</span>
                    <p style="background-image: url('{{ getImageUrl($v->image, 'music') }}');"></p>
                    <div>
                        <h3>{{ $v->name }}</h3>
                        <p>{{ $v->album->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="team-slider wf-section">
    <div class="container">
        <h2 class="centered-heading">Team section</h2>
        <p class="centered-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt sagittis eros. Quisque quis euismod lorem.</p>
        <div data-delay="4000" data-animation="slide" class="team-slider-wrapper w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="12" data-duration="500" data-infinite="true">
            <div class="w-slider-mask">
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team-slide-wrapper w-slide">
                    <div class="team-block">
                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124af1aa12aadf_placeholder%201.svg" loading="lazy" alt="" class="team-member-image-two" />
                        <div class="team-block-info">
                            <h3 class="team-member-name-two">Full Name</h3>
                            <p class="team-member-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="text-link-arrow w-inline-block">
                                <div>How we can help you</div>
                                <div class="arrow-embed w-embed">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.72 15L16.3472 10.357C16.7732 9.92932 16.7732 9.23603 16.3472 8.80962L11.72 4.16667L10.1776 5.71508L12.9425 8.4889H4.16669V10.6774H12.9425L10.1776 13.4522L11.72 15Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-slider-arrow w-slider-arrow-left">
                <div class="w-icon-slider-left"></div>
            </div>
            <div class="team-slider-arrow w-slider-arrow-right">
                <div class="w-icon-slider-right"></div>
            </div>
            <div class="team-slider-nav w-slider-nav w-slider-nav-invert w-round"></div>
        </div>
    </div>
</section>
<section class="testimonial-column-light wf-section">
    <div class="container">
        <h2 class="centered-heading">Testimonial section</h2>
        <div class="testimonial-grid-two">
            <div id="w-node-acdc8c6c-78db-210a-cab7-56836f5b3ed8-72014555" class="testimonial-card-two">
                <p class="testimonial-text-two">“Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.”</p>
                <div class="testimonial-info-three">
                    <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a28a812aad9_placeholder%202.svg" loading="lazy" alt="" class="testimonial-image" />
                    <div>
                        <h3 class="testimonial-main-heading">Author Name</h3>
                        <div>VP of Company</div>
                    </div>
                </div>
            </div>
            <div id="w-node-acdc8c6c-78db-210a-cab7-56836f5b3ee2-72014555" class="testimonial-card-two">
                <p class="testimonial-text-two">“Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.”</p>
                <div class="testimonial-info-three">
                    <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a28a812aad9_placeholder%202.svg" loading="lazy" alt="" class="testimonial-image" />
                    <div>
                        <h3 class="testimonial-main-heading">Author Name</h3>
                        <div>VP of Company</div>
                    </div>
                </div>
            </div>
            <div id="w-node-acdc8c6c-78db-210a-cab7-56836f5b3eec-72014555" class="testimonial-card-two">
                <p class="testimonial-text-two">“Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.”</p>
                <div class="testimonial-info-three">
                    <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a28a812aad9_placeholder%202.svg" loading="lazy" alt="" class="testimonial-image" />
                    <div>
                        <h3 class="testimonial-main-heading">Author Name</h3>
                        <div>VP of Company</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection
