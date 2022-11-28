<?php
$posts = getFooterPosts();
?>
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="images/logos/footer-logo.png" alt="Images">
                            </a>
                        </div>
                        <p>
                            Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auct.Aenean, lorem quis bibendum auct. Aenean sollicitudin lorem.
                        </p>
                        <div class="footer-call-content">
                            <h3>Talk to Our Support</h3>
                            <span><a href="tel:+1002-123-4567">+1 002-123-4567</a></span>
                            <i class='bx bx-headphone'></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Services</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    IT Consultancy
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Business Solution
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Digital Services
                                </a>
                            </li>
                            <li>
                                <a href="compare.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Business Reform
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Web Development
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Cloud Computing
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Data Analysis
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>Our Blog</h3>
                        <ul class="footer-blog">
                            @if (!$posts->isEmpty())
                                @foreach ($posts as $p)
                                    @include('layouts.item_post_footer', ['item' => $p])
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h3>Newsletter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus molestie molestie. Phasellus ac rutrum massa, et volutpat nisl. Fusce ultrices suscipit nisl.</p>
                        <div class="newsletter-area">
                            <form class="newsletter-form" data-toggle="validator" method="POST">
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required autocomplete="off">
                                <button class="subscribe-btn" type="submit">
                                    <i class='bx bx-paper-plane'></i>
                                </button>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
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
