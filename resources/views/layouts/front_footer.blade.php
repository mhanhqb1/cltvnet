<?php
$posts = getLastestPosts(0);
$products = getLastestPosts(1);
$cates = getFooterCates();
?>
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ !empty($file_footer_logo) ? getImageUrl($file_footer_logo) : '/images/logos/footer-logo.png' }}" alt="Images" style="max-width: 200px">
                            </a>
                        </div>
                        <!-- <p>
                            {{ !empty($web_description) ? $web_description : '' }}
                        </p> -->
                        <div class="footer-contact">
                            <p>
                                <i class="bx bx-phone-call"></i>
                                <a href="tel:{{ $web_phone }}">{{ $web_phone }}</a>
                            </p>
                            <p>
                                <i class="bx bxs-map"></i>
                                <span>{{ $web_address }}</span>
                            </p>
                            <p>
                                <i class='bx bx-message'></i>
                                <a href="mailto:{{ $web_email }}"><span class="__cf_email__" >{{ $web_email }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Cates') }}</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="{{ route('front.home.about_us') }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('About us') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.product.index') }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Product') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.post.index') }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Post') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.contact.index') }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Contact') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.home.term_and_services') }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Term and Services') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>{{ __('Product') }}</h3>
                        <ul class="footer-blog">
                            @if (!$products->isEmpty())
                            @foreach ($products as $p)
                            @include('layouts.item_post_footer', ['item' => $p])
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>{{ __('Post') }}</h3>
                        <ul class="footer-blog">
                            @if (!$posts->isEmpty())
                            @foreach ($posts as $p)
                            @include('layouts.item_post_footer', ['item' => $p])
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    Copyright © <script>
                        document.write(new Date().getFullYear())
                    </script> <a href="{{ url('/') }}">{{ env('APP_NAME') }}</a>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- <div class="switch-box">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div> -->
