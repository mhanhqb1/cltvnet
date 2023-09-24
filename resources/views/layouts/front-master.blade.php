<?php
$baseUrl = '';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tastebite">
    <meta name="keywords" content="Tastebite">
    <meta name="author" content="Tastebite">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Tastebite - Home</title>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    <!-- Tastebite External CSS -->
    <link href="{{ asset('css/cala-styles.css') }}" rel="stylesheet" type="text/css" media="all">
    <link rel="canonical" href="" />
</head>

<body>
    @include('layouts.elements.header')

    <section class="tstbite-section p-0">
        @yield('content')
    </section>

    @include('layouts.elements.footer')


</body>

</html>
