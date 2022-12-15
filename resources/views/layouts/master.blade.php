<?php
$webName = !empty($cf_web_name) ? $cf_web_name : env('APP_NAME');
$title = !empty($pageTitle) ? $pageTitle : $webName;
$description = !empty($pageDescription) ? $pageDescription : '';
$keywords = !empty($pageKeywords) ? $pageKeywords : '';
$image = !empty($pageImage) ? $pageImage : '';
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

    @stack('before_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all">
    @stack('css')
</head>

<body>

    @yield('content')

    @stack('scripts')
</body>
</html>
