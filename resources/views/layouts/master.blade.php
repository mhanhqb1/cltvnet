<?php
$webName = !empty($cf_web_name) ? $cf_web_name : env('APP_NAME');
$webDescription = !empty($cf_web_description) ? $cf_web_description : '';
$webBanner = !empty($cf_web_banner) ? getImageUrl($cf_web_banner) : '';
$title = !empty($pageTitle) ? $pageTitle.' - '.$webName : $webName;
$description = !empty($pageDescription) ? $pageDescription : $webDescription;
$keywords = !empty($pageKeywords) ? $pageKeywords : '';
$image = !empty($pageImage) ? $pageImage : $webBanner;
$url = url()->full();
$baseUrl = route('front.home.index');
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

    @stack('before_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?v=1.0.1') }}" media="all">
    @stack('css')

    @if (env('APP_ENV') != 'local' && env('GA'))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GA') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', "{{ env('GA') }}");
    </script>
    @endif
</head>

<body>
<header>
        <a href="{{ $baseUrl }}" class="logo">{{ $webName }}</a>
        <div class="menuToggle"></div>
        <nav>
            <ul>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa fa-solid fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa-solid fa-circle-info"></i> Tin tức</a>
                </li>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa fa-solid fa-tv"></i> Giải trí</a>
                </li>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa-solid fa-shirt"></i> Thời trang</a>
                </li>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa-solid fa-fan"></i> Làm đẹp</a>
                </li>
                <li>
                    <a href="{{ $baseUrl }}"><i class="fa fa-solid fa-shopping-cart"></i> Mua sắm</a>
                </li>
            </ul>
        </nav>
    </header>
    @yield('content')

    <script>
        let menuToggle = document.querySelector('.menuToggle');
        let header = document.querySelector('header');
        menuToggle.onclick = function() {
            header.classList.toggle('active');
        };

        document.addEventListener('DOMContentLoaded', () => {
            var imgs = document.querySelectorAll('img');
            imgs.forEach(function(img) {
                var source = img.getAttribute('data-original');
                if (source) {
                    img.setAttribute('src', source);
                }
            });
        });
    </script>
    @stack('scripts')

    @if (env('APP_ENV') != 'local')
    <script async="async" data-cfasync="false" src="//ophoacit.com/1?z=5982523"></script>
    @endif
</body>
</html>
