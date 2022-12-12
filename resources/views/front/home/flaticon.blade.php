<?php

use function PHPSTORM_META\map;

$icons = [
    'flaticon-computer',
    'flaticon-cyber-security',
    'flaticon-effective',
    'flaticon-practice',
    'flaticon-help',
    'flaticon-consultant',
    'flaticon-consulting',
    'flaticon-web-development',
    'flaticon-stats',
    'flaticon-project',
    'flaticon-chip',
    'flaticon-bullhorn',
    'flaticon-consulting-1',
    'flaticon-startup',
    'flaticon-tick',
    'flaticon-android',
    'flaticon-website',
    'flaticon-apple',
    'flaticon-television',
    'flaticon-smartwatch',
    'flaticon-structure',
    'flaticon-data-analytics',
    'flaticon-implement'
];
?>
<!doctype html>
<html lang="vi">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <title>Flaticon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/fonts/flaticon.css">

    <style>
        .flaticon {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ccc;
            margin: 20px;
            text-align: center;
        }
        .flaticon h2 {
            font-size: 14px;
        }
        .flaticon i {
            font-size: 52px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($icons as $v)
                <div class="flaticon">
                    <h2>{{ $v }}</h2>
                    <i class="{{ $v }}"></i>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
