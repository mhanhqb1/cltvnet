<?php
$appName = env('APP_NAME');
$pageTitle = !empty($pageTitle) ? $pageTitle . ' - ' . $appName : $appName;
$masterDescription = "Gratis Multinacional Novelas y Series en Español. Las mejores novelas multi paises las encontraras aqui en español y completamente gratis y tambien novelas con subtitulos.";
$metaDescription = !empty($metaDescription) ? substr($metaDescription, 0, 300) . '...' : $masterDescription;
$metaKeywords = !empty($metaKeywords) ? $metaKeywords : 'novelas, novelas y series, novelas turcas, novelas peruanas, novelas mexicanas';
$pageImage = !empty($pageImage) ? $pageImage : asset('images/banner.jpg');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow, index" />
    <meta name="googlebot" content="follow, index" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <meta name='dailymotion-domain-verification' content='dmkcdbnamiml2bxsk' />
    <meta name="clckd" content="b7fff1457a1f819647c22c9c52831603" />
    <meta name="propeller" content="7607a9bfea8f301ee855c79cecc87188">
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
    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" media="all">
    <style>
        h3.movie-name {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 3;
            font-size: 14px;
            text-align: left;
            padding-top:5px;
            padding-bottom:0px !important;
            font-size:16px;
            line-height: 1.5;
        }
        .movie-item {
            margin-bottom:20px;
            min-height:330px;
            position: relative;
        }
        .cate-movie-item {
            position: relative;
        }
        .movie-label {
            position: absolute;
            top: 0;
            left: 15px;
            padding: 5px 10px;
            color: #fff;
            background: #1b2a39;
            border-bottom: 2px solid #bb3c2f;
            border: 1px solid #1b2a3900;
            z-index: 2;
            font-weight: 400;
            background-size: 200% 100%;
            background-image: linear-gradient(to right,#C02425 0%,#F0CB35 51%,#C02425 100%);
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
            -webkit-transform: translate(-50%,-50%) rotate(180deg);
            transform: translate(-50%,-50%) rotate(180deg);
        }
    </style>
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
    <!-- <script type='text/javascript' src='//pl17602848.highperformancegate.com/f1/47/cc/f147cc35ec3f391964af36aab05f0448.js'></script> -->
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
            @if(env('APP_ENV') != 'local')
            <div class="container">
                <center>
                <div class="col-sm-12">
                    <script type="text/javascript">
                        atOptions = {
                            'key': '2beb75141c9acf110403bc7a2eada0f5',
                            'format': 'iframe',
                            'height': 50,
                            'width': 320,
                            'params': {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" data-cfasync="false" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivecreativeformats.com/2beb75141c9acf110403bc7a2eada0f5/invoke.js"></scr' + 'ipt>');
                    </script>
                </div>
                </center>
            </div>
            @endif
            <div class="container">
                @yield('content')
            </div>
            @if(env('APP_ENV') != 'local')
            <!-- <div class="container">
                <script type="text/javascript" src="https://udbaa.com/bnr.php?section=General&pub=771288&format=728x90&ga=g"></script>
                <noscript><a href="https://yllix.com/publishers/771288" target="_blank"><img src="//ylx-aff.advertica-cdn.com/pub/728x90.png" style="border:none;margin:0;padding:0;vertical-align:baseline;" alt="ylliX - Online Advertising Network" /></a></noscript>
            </div> -->
            @endif
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
    <script src="{{ asset('/js/scripts.js') }}"></script>
    @stack('scripts')
    @if(env('APP_ENV') != 'local')
    <script async="async" data-cfasync="false" src="//ophoacit.com/1?z=5539747"></script>
    <script type="text/javascript" data-cfasync="false">
    /*<![CDATA[/* */
    (function(){if(window.aa9ed79e2e59da0e9d3b5799ee3e8b3a) return; window.aa9ed79e2e59da0e9d3b5799ee3e8b3a="EcAmc-Gm0imPVyL8RY3f1NCFLPlwFJEDZZVo94BDz3Uq4LkxJdox70d4GQgS3k4TTx9Zh0Z52qOif-5KP3bQC07DiuqSInA";var a=['wp0mwrHDqyrDn8OmNHBRMcO8','woDDmcKARm1Fw60=','w6BpAMKa','woLCtsOo','wp4+wrbCqCHDhcOhCH1JLcO4RxgsRRDCjlzCrwZBw59bwrvDmiDCtBvComvDicKEw4UOEg==','ZWHDo0d6FA==','GSLDvxACwpLCtsKTwo3ChMKfwpjCrw==','Y0XCgXcC','BcKzL8KVw5sO','wrHDg8Ouw51vwo5z','QMKmw4ZAwrBNw6BodcOO','wo7DmcKKWmZHw7DCmMKS','WMOYwqjDu8OmKSrDrQ==','w7vCogIGw78PPcOLw7Q3dyJj','B8KZScKIw659UcKvAcKFEw==','JMOqIsOu','wqXDqsKQIMK4PCBxw6czBVvDoDE=','QsKmw5xnwrY7wpjCnDzDgU8jOBbCnAbCgETDpcOmRBN/EcKmwqlywq7CmsKVw6LCqBDCocO0w75Uw6YCwr7CpzLDhAY=','w6TCnMK5wpArw5g2','wo0mwqLDsyjDicO8DA==','wqvDksKzMcOdIiLCp1tMw6oG','XQZXYCvDiHrDlcOKwonCoy0=','wqIWw7TDpz/DkA==','UMKIMkbDih8=','QsOUw50APTMMwqLDoF0db8KOdDQ=','w712GR/DjTBwVsKTwol8WcKdGznCozLDi8KgYQ==','VMODwr/DvsO4dmvCtg=='];(function(b,c){var f=function(g){while(--g){b['push'](b['shift']());}};f(++c);}(a,0x1c1));var c=function(b,d){b=b-0x0;var e=a[b];if(c['PEJcTV']===undefined){(function(){var h;try{var j=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');');h=j();}catch(k){h=window;}var i='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';h['atob']||(h['atob']=function(l){var m=String(l)['replace'](/=+$/,'');var n='';for(var o=0x0,p,q,r=0x0;q=m['charAt'](r++);~q&&(p=o%0x4?p*0x40+q:q,o++%0x4)?n+=String['fromCharCode'](0xff&p>>(-0x2*o&0x6)):0x0){q=i['indexOf'](q);}return n;});}());var g=function(h,l){var m=[],n=0x0,o,p='',q='';h=atob(h);for(var t=0x0,u=h['length'];t<u;t++){q+='%'+('00'+h['charCodeAt'](t)['toString'](0x10))['slice'](-0x2);}h=decodeURIComponent(q);var r;for(r=0x0;r<0x100;r++){m[r]=r;}for(r=0x0;r<0x100;r++){n=(n+m[r]+l['charCodeAt'](r%l['length']))%0x100;o=m[r];m[r]=m[n];m[n]=o;}r=0x0;n=0x0;for(var v=0x0;v<h['length'];v++){r=(r+0x1)%0x100;n=(n+m[r])%0x100;o=m[r];m[r]=m[n];m[n]=o;p+=String['fromCharCode'](h['charCodeAt'](v)^m[(m[r]+m[n])%0x100]);}return p;};c['OdZBTg']=g;c['VccUtU']={};c['PEJcTV']=!![];}var f=c['VccUtU'][b];if(f===undefined){if(c['dfxJgr']===undefined){c['dfxJgr']=!![];}e=c['OdZBTg'](e,d);c['VccUtU'][b]=e;}else{e=f;}return e;};var w=window;w[c('0x19','JC(q')]=[[c('0x6','ij4n'),0x4c0766],[c('0x12','V]Uh'),0.002],[c('0x1a','LGSD'),c('0x1','t$kF')],[c('0x4','ib1b'),0x0],[c('0x13','t$kF'),![]],[c('0x17','f0#Q'),0x0],[c('0xa','Q)Pv'),!0x0]];var j=[c('0xe','Q)Pv'),c('0x0','lh#W')],r=0x0,g,b=function(){if(!j[r])return;g=w[c('0x2','Q)Pv')][c('0x10','4n1t')](c('0x5','m37Z'));g[c('0xc','^4i[')]=c('0x7','XF%C');g[c('0x11','nQMn')]=!0x0;var d=w[c('0x16','Re^l')][c('0x8','4f)X')](c('0xf','qT6z'))[0x0];g[c('0xd','YxT1')]=c('0x9','Re^l')+j[r];g[c('0x18','gf@!')]=c('0x15','SR5e');g[c('0xb','SR5e')]=function(){r++;b();};d[c('0x14','(bHV')][c('0x3','L)@a')](g,d);};b();})();
    /*]]>/* */
    </script>
    @endif
</body>

</html>
