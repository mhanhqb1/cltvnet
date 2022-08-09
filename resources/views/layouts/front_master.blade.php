<?php
$pageTitle = !empty($pageTitle) ? $pageTitle.' - CaLaTV.net' : 'CaLaTV.net';
$appName = env('APP_NAME');
$masterDescription = "Website review phim hay ".date('Y').", chuyên review phim, tóm tắt phim hay, các bộ phim hành động, phim kinh dị, phim viễn tưởng, phim hài, phim hanh dong, tom tat phim hay, phim kinh di, review phim, vua phim, vua phim review, review phim hay review phim kinh dị hay phim hàn quốc phim hoạt hình hài hước phiêu lưu gay cấn hấp dẫn, review phim zombie anime, review phim hay 2020, review phim hay 2021, review anime, tóm tắt anime phim lẻ hay";
$metaDescription = !empty($metaDescription) ? substr($metaDescription, 0, 300).'...' : $masterDescription;
$metaKeywords = !empty($metaKeywords) ? $metaKeywords : 'tom tat phim, review phim, review phim hai, tom tat phim chau tinh tri, chau tinh tri, tom tat phim hai chau tinh tri';
$pageImage = !empty($pageImage) ? $pageImage : asset('images/banner.jpg');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="follow, index" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>{{ $pageTitle }}</title>

    <meta name="description" content="{{ $metaDescription }}" />
    <meta name="keywords" content="{{ $metaKeywords }}"/>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="all">

    <?php if (!empty(config('services.google')['ga_key'])): ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google')['ga_key'] }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', "<?php echo config('services.google')['ga_key']; ?>");
        </script>
    <?php endif; ?>
</head>

<body>
    <div id="wrapper">
        <div class="header">
            @include('layouts.front_header')
        </div>
        <div class="main-container">
            <div class="container">
                <a href="{{ url('/') }}" class="bartop">
                    Welcome to <strong>CaLaTV.net</strong>
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
                            <strong style="color:black;"><a href="{{ url('/') }}">CaLaTV.net</a></strong><br />
                            {{ $masterDescription }}
                        </li>
                    </ul>
                </center>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
</body>

</html>
