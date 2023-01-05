<?php
$cates = getFooterCates();
?>
<section class="footer-social">
    <div class="container-max">
        <div class="footer-social-left">
            <h3>FOLLOW SOCIALS</h3>
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
        <div class="footer-widget footer-social-right">
            <div class="newsletter-area">
                <h3>Đăng ký để nhận mail khuyến mãi</h3>
                <form class="newsletter-form" data-toggle="validator" method="POST" novalidate="true" style="display: inline-block; margin-left: 12px">
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required="" autocomplete="off">
                    <button class="subscribe-btn disabled" type="submit" style="pointer-events: all; cursor: pointer;">
                        <i class="bx bx-paper-plane"></i>
                    </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>
</section>
<footer class="footer-area footer-bg">
    <div class="container-max">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
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
                                <a href="mailto:{{ $web_email }}"><span class="__cf_email__">{{ $web_email }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Chi Nhánh') }}</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Hà Nội') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Bắc Ninh') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Hải Phòng') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Đà Nẵng') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Hồ Chí Minh') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Về VyTech') }}</h3>
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
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Chăm Sóc Khách Hàng') }}</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Dành cho đại lý') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Hướng dẫn mua hàng') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Hình thức thanh toán') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Đổi điểm thưởng') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Chính Sách/Điều Khoản') }}</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Chính sách bảo mật') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Chính sách bảo hành') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Chính sách vận chuyển, Lắp đặt') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ __('Chính sách đổi trả, hoàn tiền') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
<div class="copy-right-area">
    <div class="top-footer-social">
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
    <div class="copy-right-text">
        <p>
            Copyright © <script>
                document.write(new Date().getFullYear())
            </script> <a href="{{ url('/') }}">{{ env('APP_NAME') }}</a>. All rights reserved.
        </p>
    </div>
</div>


<!-- <div class="switch-box">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div> -->
