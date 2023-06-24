<?php
$pageTitle = !empty($pageTitle) ? $pageTitle.' - CaLaTV.net' : 'CaLaTV.net';
$appName = env('APP_NAME');
$masterDescription = "Chào mừng các bạn đến với trang web của chúng tôi! Đây là nơi tổng hợp những thông tin, kiến thức và trải nghiệm hữu ích nhất về ẩm thực đa dạng, học tập hiệu quả, giải trí thú vị và mua sắm tiện lợi cho gia đình bạn.";
$metaDescription = !empty($metaDescription) ? substr($metaDescription, 0, 300).'...' : $masterDescription;
$metaKeywords = !empty($metaKeywords) ? $metaKeywords : 'thuc don cho con, thuc don gia dinh, be hoc tieng anh, ma giam gia shopee, cala food, cala learning, cala movies, cala shopping';
$pageImage = !empty($pageImage) ? $pageImage : asset('images/cala-banner.jpg');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow, index" />
    <meta name="googlebot" content="follow, index" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <title>CssCommon</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css_common.css').'?'.date('Y-m-d') }}" media="all">

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
    <header>
        <a href="{{ route('home') }}" class="logo">CaLaTV</a>
        <div class="menuToggle"></div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-solid fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="{{ route('home') }}"><i class="fa-solid fa-circle-info"></i> Giới thiệu</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-solid fa-utensils"></i> Ăn uống</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-brands fa-leanpub"></i> Học tập</a>
                    <!-- <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Dropdown</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="{{ route('cala_movies') }}"><i class="fa fa-solid fa-tv"></i> Giải trí</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-solid fa-shopping-cart"></i> Mua sắm</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container box-container">
        <div class="box">
            <div class="thumb" style="background-image: url('{{ asset('images/cala-food-banner.jpg') }}');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-utensils"></i>
                    <h3>Ăn uống</h3>
                    <a href="#">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('{{ asset('images/cala-learning-banner.jpg') }}');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-brands fa-leanpub"></i>
                    <h3>Học tập</h3>
                    <a href="#">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('{{ asset('images/cala-movies-banner.jpg') }}');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-tv"></i>
                    <h3>Giải trí</h3>
                    <a href="{{ route('cala_movies') }}">Xem thêm</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('{{ asset('images/cala-shopping-banner.jpg') }}');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-shopping-cart"></i>
                    <h3>Mua sắm</h3>
                    <a href="#">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        let menuToggle = document.querySelector('.menuToggle');
        let header = document.querySelector('header');
        menuToggle.onclick = function() {
            header.classList.toggle('active');
        };
    </script>
</body>

</html>
