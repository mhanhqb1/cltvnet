<?php
$webName = !empty($cf_web_name) ? $cf_web_name : env('APP_NAME');
$webDescription = !empty($cf_web_description) ? $cf_web_description : '';
$webBanner = !empty($cf_web_banner) ? getImageUrl($cf_web_banner) : '';
$title = !empty($pageTitle) ? $pageTitle . ' - ' . $webName : $webName;
$description = !empty($pageDescription) ? $pageDescription : $webDescription;
$keywords = !empty($pageKeywords) ? $pageKeywords : '';
$image = !empty($pageImage) ? $pageImage : $webBanner;
$url = url()->full();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keywords }}" />

    <title>{{ __($title) }}</title>

    <!-- OpenGraph -->
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:site_name" content="{{ $webName }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:image:alt" content="{{ $title }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- <meta name="twitter:site" content="@calatv">
	<meta name="twitter:creator" content="@calatv"> -->
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
    <meta name="twitter:image:alt" content="{{ $title }}">

    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script type="text/javascript">
        ! function(o, c) {
            var n = c.documentElement,
                t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);
    </script>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @stack('before_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all">
    @stack('css')
</head>

<body>
    <div class="navbar-no-shadow wf-section">
        <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-no-shadow-container w-nav">
            <div class="container-regular">
                <div class="navbar-wrapper">
                    <a href="{{ route('front.home.index') }}" class="navbar-brand w-nav-brand">CALATV</a>
                    <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
                        <ul role="list" class="nav-menu w-list-unstyled">
                            <li><a href="{{ route('front.home.index') }}" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="{{ route('front.music.index') }}" class="nav-link">{{ __('Music') }}</a></li>
                            <li><a href="#" class="nav-link">{{ __('School') }}</a></li>
                            <li><a href="#" class="nav-link">{{ __('Food') }}</a></li>
                            <li><a href="#" class="nav-link">{{ __('Movies') }}</a></li>
                            <li><a href="#" class="nav-link">{{ __('Entertainment') }}</a></li>
                            <li><a href="#" class="nav-link">{{ __('Shop') }}</a></li>
                            <!-- <li>
                                <div data-hover="false" data-delay="0" class="nav-dropdown w-dropdown">
                                    <div class="nav-dropdown-toggle w-dropdown-toggle">
                                        <div class="nav-dropdown-icon w-icon-dropdown-toggle"></div>
                                        <div>Resources</div>
                                    </div>
                                    <nav class="nav-dropdown-list shadow-three mobile-shadow-hide w-dropdown-list"><a href="#" class="nav-dropdown-link w-dropdown-link">Resource Link 1</a><a href="#" class="nav-dropdown-link w-dropdown-link">Resource Link 2</a><a href="#" class="nav-dropdown-link w-dropdown-link">Resource Link 3</a></nav>
                                </div>
                            </li> -->
                        </ul>
                    </nav>
                    <div class="menu-button w-nav-button">
                        <div class="w-icon-nav-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')

    <section class="footer-subscribe wf-section">
        <div class="container">
            <div class="footer-form-two w-form">
                <form id="wf-form-Footer-Form-Two" name="wf-form-Footer-Form-Two" data-name="Footer Form Two" method="get" class="footer-form-container-two">
                    <div class="footer-form-title">Subscribe Newsletters</div>
                    <div class="footer-form-block-two"><input type="email" class="footer-form-input w-input" maxlength="256" name="Footer-Email-Two" data-name="Footer Email Two" aria-label="Enter your email" placeholder="Enter your email" id="Footer-Email-Two" required="" /><input type="submit" value="Subscribe Now" data-wait="Please wait..." class="button-primary footer-form-button w-button" /></div>
                </form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
            <div class="footer-wrapper-three">
                <div class="footer-block-three">
                    <a href="{{ route('front.home.index') }}" class="nav-link">{{ __('Home') }}</a>
                    <a href="{{ route('front.music.index') }}" class="nav-link">{{ __('Music') }}</a>
                    <a href="#" class="nav-link">{{ __('School') }}</a>
                    <a href="#" class="nav-link">{{ __('Food') }}</a>
                    <a href="#" class="nav-link">{{ __('Movies') }}</a>
                    <a href="#" class="nav-link">{{ __('Entertainment') }}</a>
                    <a href="#" class="nav-link">{{ __('Shop') }}</a>
                </div>
                <div class="footer-social-block-three">
                    <a href="#" class="footer-social-link-three w-inline-block">
                        <img src="{{ asset('images/icon_facebook.svg') }}" loading="lazy" alt="" />
                    </a>
                    <a href="#" class="footer-social-link-three w-inline-block">
                        <img src="{{ asset('images/icon_twitter.svg') }}" loading="lazy" alt="" />
                    </a>
                    <a href="#" class="footer-social-link-three w-inline-block">
                        <img src="{{ asset('images/icon_insta.svg') }}" loading="lazy" alt="" />
                    </a>
                    <a href="#" class="footer-social-link-three w-inline-block">
                        <img src="{{ asset('images/icon_youtube.svg') }}" loading="lazy" alt="" />
                    </a>
                </div>
            </div>
            <div class="footer-divider-two"></div>
            <div class="footer-bottom">
                <div class="footer-copyright">© {{ date('Y') }} <a href="https://hoanganhonline.com" target="_blank">HoangAnhOnline.com</a>. All rights reserved</div>
                <div class="footer-legal-block">
                    <a href="#" class="nav-link">{{ __('About us') }}</a>
                    <a href="#" class="nav-link">{{ __('Contact') }}</a>
                    <a href="#" class="footer-legal-link">{{ __('Terms Of Use') }}</a>
                    <a href="#" class="footer-legal-link">{{ __('Privacy Policy') }}</a>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
    <script src="{{ asset('js/js.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
