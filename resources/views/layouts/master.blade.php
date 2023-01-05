<?php
$webName = !empty($web_name) ? $web_name : env('APP_NAME');
$webDescription = !empty($web_description) ? $web_description : '';
$webImage = !empty($file_header_logo) ? getImageUrl($file_header_logo) : '';
$title = !empty($pageTitle) ? $pageTitle . ' - ' . $webName : $webName;
$description = !empty($pageDescription) ? $pageDescription : $webDescription;
$keywords = !empty($pageKeywords) ? $pageKeywords : '';
$image = !empty($pageImage) ? $pageImage : $webImage;
$url = url()->full();
?>

<!doctype html>
<html lang="vi">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta name="robots" content="follow, index" />
    <meta name="googlebot" content="follow, index" />
    <link rel="shortcut icon" href="/favicon.ico">

    <title>{{ __($title) }}</title>

    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keywords }}" />

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/fonts/flaticon.css">
    <link rel="stylesheet" href="/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/nice-select.min.css">
    <link rel="stylesheet" href="/css/meanmenu.css">
    <link rel="stylesheet" href="/css/style.css?{{ time() }}">
    <link rel="stylesheet" href="/css/responsive.css?{{ time() }}">
    <link rel="stylesheet" href="/css/theme-dark.css">
    @stack('css')
</head>

<body>
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    @include('layouts.front_header')
    @yield('content')
    @include('layouts.front_footer')

    <script src="/js/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/meanmenu.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/js/form-validator.min.js"></script>
    <script src="/js/contact-form-script.js"></script>
    <script src="/js/custom.js"></script>
    @stack('scripts')
</body>

</html>
