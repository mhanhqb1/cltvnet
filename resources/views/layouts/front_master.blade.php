<?php
$appName = env('APP_NAME');
$pageTitle = !empty($pageTitle) ? $pageTitle . ' - ' . $appName : $appName;
$masterDescription = "Disfruta de películas online en español gratis en VPOnline.net. Ver estrenos, clásicos y películas en HD sin cortes y sin registro. ¡Tu cine en casa!";
$metaDescription = !empty($metaDescription) ? substr($metaDescription, 0, 300) . '...' : $masterDescription;
$metaKeywords = !empty($metaKeywords) ? $metaKeywords : 'ver películas online, películas en español, películas gratis, estrenos de cine, cine en casa, películas HD, streaming gratis';
$pageImage = !empty($pageImage) ? $pageImage : asset('images/banner.jpg');
$cacheVersion = env('CACHE_VER');
$gaKey = env('GA_KEY');
$showAds = env('SHOW_ADS');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow, index" />
    <meta name="googlebot" content="follow, index" />
    @if (!empty($showAds))
    <meta name="monetag" content="b0b392e42713fd5d3190119316a39457">
    <meta name="6a97888e-site-verification" content="aeeb73fd895dfc52effd9200c7c429d1">
    <meta http-equiv="Delegate-CH" content="Sec-CH-UA https://s.magsrv.com; Sec-CH-UA-Mobile https://s.magsrv.com; Sec-CH-UA-Arch https://s.magsrv.com; Sec-CH-UA-Model https://s.magsrv.com; Sec-CH-UA-Platform https://s.magsrv.com; Sec-CH-UA-Platform-Version https://s.magsrv.com; Sec-CH-UA-Bitness https://s.magsrv.com; Sec-CH-UA-Full-Version-List https://s.magsrv.com; Sec-CH-UA-Full-Version https://s.magsrv.com;">
    <!-- <script src="https://ligheechoagool.com/88/tag.min.js" data-zone="145756" async data-cfasync="false"></script> -->
    @endif
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>{{ $pageTitle }}</title>

    <meta name="description" content="{{ $metaDescription }}" />
    <meta name="keywords" content="{{ $metaKeywords }}" />

    <!-- OpenGraph -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:site_name" content="{{ $appName }}">
    <meta property="og:image" content="{{ $pageImage }}">
    <meta property="og:image:alt" content="{{ $appName }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <!-- <meta name="twitter:site" content="@calatv">
	<meta name="twitter:creator" content="@calatv"> -->
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $pageImage }}">
    <meta name="twitter:image:alt" content="{{ $appName }}">

    <base href="{{ url('/') }}">
    <meta name="revisit-after" content="2 days">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css?'.$cacheVersion) }}" media="all">
    <style>
        .list-movie {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 12px;
            grid-auto-rows: minmax(min-content, max-content);
            margin-bottom: 12px;
        }
        .movie-name {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 2;
            font-size: 14px;
            text-align: left;
            padding-top: 5px;
            padding-bottom: 0px !important;
            font-size: 16px;
            line-height: 1.5;
            color: #232323;
            font-weight: bold;
        }
        p.movie-description {
            margin-top: 5px;
            color: #787878;
            font-size: 12px;
            -webkit-line-clamp: 3;
            display: -webkit-box;
            overflow: hidden;
            word-break: break-all;
            -webkit-box-orient: vertical;
            line-height: 18px;
        }
        .movie-cates {
            display: block;
            margin-top: 5px;
        }
        .movie-cate {
            border-radius: 4px;
            color: #fff;
            padding: 0 10px;
            font-size: 12px;
            line-height: 26px;
            background-color: #FF934B;
            margin-top: 5px;
            margin-right: 2px;
            display: inline-block;
        }
        .movie-cate-2 {
            background-color: #333333;
            color: #FFFFFF;
        }
        .movie-cate-3 {
            background-color: #FFD700;
            color: #0033CC;
        }
        .movie-cate-4 {
            background-color: #FF007F;
            color: #fff;
        }
        .movie-cate-5 {
            background-color: #A8E6CF;
            color: #222222;
        }
        .movie-cate-6 {
            background-color: #F39C12;
            color: #34495E;
        }
        .movie-cate-7 {
            background-color: #C0392B;
            color: #ECF0F1;
        }
        .movie-cate-8 {
            background-color: #00FA9A;
            color: #2C3E50;
        }
        .movie-cate-9 {
            background-color: #9B59B6;
            color: #FFFFFF;
        }
        .movie-cate-10 {
            background-color: #1E90FF;
            color: #FFF200;
        }
        .movie-cate-11 {
            background-color: #FF5733;
            color: #FFFFFF;
        }
        .movie-cate-12 {
            background-color: #4B0082;
            color: #FFFF99;
        }
        .movie-cate-13 {
            background-color: #0000FF;
            color: #FFFFFF;
        }
        .movie-cate-14 {
            background-color: #FF0000;
            color: #FFFFFF;
        }
        .movie-cate-15 {
            background-color: #FFD700;
            color: #000000;
        }
        .movie-cate-16 {
            background-color: #2ECC71;
            color: #FFFFFF;
        }
        .movie-cate-17 {
            background-color: #F39C12;
            color: #34495E;
        }

        .movie-item {
            /* margin-bottom: 20px; */
            /* min-height: 290px; */
            position: relative;
        }

        .cate-movie-item {
            position: relative;
        }

        .movie-label {
            position: absolute;
            top: 0;
            left: 5px;
            padding: 5px 10px;
            color: #fff;
            background: #1b2a39;
            border-bottom: 2px solid #bb3c2f;
            border: 1px solid #1b2a3900;
            z-index: 2;
            font-weight: 400;
            background-size: 200% 100%;
            background-image: linear-gradient(to right, #C02425 0%, #F0CB35 51%, #C02425 100%);
            transition: .7s;
        }

        .movie-label::after {
            content: '';
            border-bottom: 6px solid #dd8b52;
            border-left: 6px solid transparent;
            display: block;
            border-right: 6px solid transparent;
            bottom: -10px;
            left: 50%;
            position: absolute;
            -webkit-transform: translate(-50%, -50%) rotate(180deg);
            transform: translate(-50%, -50%) rotate(180deg);
        }
        .movie-chapters {
            display: grid !important;
            grid-template-columns: repeat(6, 1fr);
        }
        @media (max-width: 767px) {
            .list-movie {
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 12px;
            }
            .movie-item {
                /* min-height: 210px; */
                margin-bottom: 10px;
            }
            .add-image {
                max-width: 100% !important;
                margin-right: 0 !important;
            }
            .movie-chapters {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
    @stack('css')

    @if (!empty($gaKey))
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaKey }}"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ $gaKey }}');
    </script>
    @endif
</head>

<body>
    <div id="wrapper">
        <div class="header">
            @include('layouts.front_header')
        </div>
        <div class="main-container">
            <div class="container">
                <a href="{{ url('/') }}" class="bartop">
                    Welcome to <strong>{{ $appName }}</strong>
                </a>
            </div>
            <div class="container">
                @yield('content')
            </div>
        </div>
        <div class="footer" id="footer">
            <div class="container">
                <center>
                    <ul class="navbar-link footer-nav">
                        <li style="font-size:15px;">
                            <strong style="color:black;"><a href="{{ url('/') }}">{{ $appName }}</a></strong><br />
                            {{ $masterDescription }}
                        </li>
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/scripts.js?'.$cacheVersion) }}"></script>
    @stack('scripts')
</body>

</html>
