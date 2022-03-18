
<?php
$topImage = !empty($pageImage) ? $pageImage : url('/') . '/images/logo.png';
$_siteName = 'CalaTV.net';
$_siteTitle = !empty($pageTitle) ? $pageTitle : '';
$_siteDescription = '';
$_currentUrl = url()->current();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $_siteDescription }}">
    <meta name="author" content="{{ $_siteName }}">

    <title>{{ $_siteTitle }}</title>

    <link rel="icon" type="image/png" href="images/favicon.png">

    <link rel="image_src" href="{{ $topImage }}" />
    <link rel="canonical" href="{{ $_currentUrl }}" />
    <meta property="og:site_name" content="{{ $_siteName }}">
    <meta property="og:image" content="{{ $topImage }}">
    <meta property="og:description" content="{{ $_siteDescription }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $_siteTitle }}">
    <meta property="og:type" content="article">
    <meta name="twitter:title" content="{{ $_siteTitle }}">
    <meta name="twitter:description" content="{{ $_siteDescription }}">

    <!-- LOAD CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pgwslider.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/pgwslideshow.min.css">
    <link rel="stylesheet" href="css/megamenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <?php if (!empty(config('services.google')['ga_key'])) : ?>
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
    <!-- PRE LOADER -->
      <div class="preloader">
         <div class='uil-ring-css' style='transform:scale(0.45);'><div></div></div>
      </div>
    <!-- Start Header -->
    <header>
        <div class="header-top hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-top-area">
                            <div class="site-info left">
                                <div class="mail-address">
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:nfo@themeix.com">info@themeix.com </a>
                                    <span class="sepator">|</span>
                                </div>
                                <div class="server-time">
                                    <i class="fa fa-clock-o"></i>
                                    <span>Server time : 12.00am</span>
                                </div>
                            </div>
                            <div class="user-info right">
                                <div class="upload-opt">
                                    <i class="fa fa-upload"></i>
                                    <a href="#upload-options" data-bs-toggle="modal">upload video</a>
                                    <span class="sepator">|</span>
                                </div>
                                <div class="login-info">
                                    <i class="fa fa-lock"></i>
                                    <a href="#login-info" data-bs-toggle="modal">login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.menu')
    </header>
    <!-- End Header -->
    @yield('content')

    @include('layouts.footer')
    <!-- Load JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pgwslideshow.min.js"></script>
    <script src="js/pgwslider.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.lazy.min.js"></script>
    <script src="js/jquery.lazy.plugins.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnh74UN6BKgq9U5fMNGhdZOSpmM_QnZqs"></script>
    <script src="js/megamenu.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
