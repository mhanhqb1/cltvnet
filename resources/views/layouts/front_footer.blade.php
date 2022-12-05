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
                                <img src="/images/logos/footer-logo.png" alt="Images">
                            </a>
                        </div>
                        <p>
                            {{ !empty($web_description) ? $web_description : '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>{{ __('Cates') }}</h3>
                        <ul class="footer-list">
                            @foreach ($cates as $v)
                            <li>
                                <a href="{{ route('front.post.cate_detail', $v->slug) }}" target="_blank">
                                    <i class="bx bx-chevron-right"></i>
                                    {{ $v->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>{{ __('Our Product') }}</h3>
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
                        <h3>{{ __('Our Blog') }}</h3>
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
