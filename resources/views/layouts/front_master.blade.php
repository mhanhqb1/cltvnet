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
            padding-top: 5px;
            padding-bottom: 0px !important;
            font-size: 16px;
            line-height: 1.5;
        }

        .movie-item {
            margin-bottom: 20px;
            min-height: 330px;
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
    </style>
    @if (env('APP_ENV') != 'local')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C9VY4NQ67Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-C9VY4NQ67Y');
    </script>
    @endif
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
            <script type="application/javascript"
            data-idzone="4999236"  data-ad_frequency_count="1"  data-ad_frequency_period="5"  data-type="desktop"
            data-browser_settings="1"
            data-ad_trigger_method="3"

            src="https://a.exdynsrv.com/fp-interstitial.js"></script>
            <div class="container">
                @if(!isMobile())
                <center>
                    <script type="text/javascript">
                        atOptions = {
                            'key': '4d5af8e4f94a1a3fbbac9eeabdbe9a52',
                            'format': 'iframe',
                            'height': 90,
                            'width': 728,
                            'params': {}
                        };
                        document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/4d5af8e4f94a1a3fbbac9eeabdbe9a52/invoke.js"></scr' + 'ipt>');
                    </script>
                </center>
                <iframe src="//a.exdynsrv.com/iframe.php?idzone=4997262&size=728x90" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                @else
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
                @endif
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
    <script type="application/javascript">
        var ad_idzone = "4997250",
            ad_width = "300",
            ad_height = "250",
            v_pos = "bottom",
            h_pos = "center";
    </script>
    <script type="application/javascript" src="https://a.exdynsrv.com/js.php?t=17&idzone=4997250"></script>
    <script type="application/javascript" src="https://syndication.exdynsrv.com/splash.php?idzone=4997252"></script>
    <script async="async" data-cfasync="false" src="//ophoacit.com/1?z=5539747"></script>
    <script type="application/javascript">
        (function() {

            //version 1.0.0

            var adConfig = {
            "ads_host": "a.exdynsrv.com",
            "syndication_host": "syndication.exdynsrv.com",
            "idzone": 4997254,
            "popup_fallback": false,
            "popup_force": false,
            "chrome_enabled": true,
            "new_tab": false,
            "frequency_period": 5,
            "frequency_count": 1,
            "trigger_method": 3,
            "trigger_class": "",
            "only_inline": false,
            "t_venor": false
        };

        window.document.querySelectorAll||(document.querySelectorAll=document.body.querySelectorAll=Object.querySelectorAll=function o(e,i,t,n,r){var c=document,a=c.createStyleSheet();for(r=c.all,i=[],t=(e=e.replace(/\[for\b/gi,"[htmlFor").split(",")).length;t--;){for(a.addRule(e[t],"k:v"),n=r.length;n--;)r[n].currentStyle.k&&i.push(r[n]);a.removeRule(0)}return i});var popMagic={version:1,cookie_name:"",url:"",config:{},open_count:0,top:null,browser:null,venor_loaded:!1,venor:!1,configTpl:{ads_host:"",syndication_host:"",idzone:"",frequency_period:720,frequency_count:1,trigger_method:1,trigger_class:"",popup_force:!1,popup_fallback:!1,chrome_enabled:!0,new_tab:!1,cat:"",tags:"",el:"",sub:"",sub2:"",sub3:"",only_inline:!1,t_venor:!1,cookieconsent:!0},init:function(o){if(void 0!==o.idzone&&o.idzone){void 0===o.customTargeting&&(o.customTargeting=[]),window.customTargeting=o.customTargeting||null;var e=Object.keys(o.customTargeting).filter(function(o){return o.search("ex_")>=0});for(var i in e.length&&e.forEach((function(o){return this.configTpl[o]=null}).bind(this)),this.configTpl)this.configTpl.hasOwnProperty(i)&&(void 0!==o[i]?this.config[i]=o[i]:this.config[i]=this.configTpl[i]);void 0!==this.config.idzone&&""!==this.config.idzone&&(!0!==this.config.only_inline&&this.loadHosted(),this.addEventToElement(window,"load",this.preparePop))}},getCountFromCookie:function(){if(!this.config.cookieconsent)return 0;var o=popMagic.getCookie(popMagic.cookie_name),e=void 0===o?0:parseInt(o);return isNaN(e)&&(e=0),e},shouldShow:function(){if(popMagic.open_count>=popMagic.config.frequency_count)return!1;var o=popMagic.getCountFromCookie();return popMagic.open_count=o,!(o>=popMagic.config.frequency_count)},venorShouldShow:function(){return!popMagic.config.t_venor||popMagic.venor_loaded&&"0"===popMagic.venor},setAsOpened:function(){var o=1;o=0!==popMagic.open_count?popMagic.open_count+1:popMagic.getCountFromCookie()+1,popMagic.config.cookieconsent&&popMagic.setCookie(popMagic.cookie_name,o,popMagic.config.frequency_period)},loadHosted:function(){var o=document.createElement("script");for(var e in o.type="application/javascript",o.async=!0,o.src="//"+this.config.ads_host+"/popunder1000.js",o.id="popmagicldr",this.config)this.config.hasOwnProperty(e)&&"ads_host"!==e&&"syndication_host"!==e&&o.setAttribute("data-exo-"+e,this.config[e]);var i=document.getElementsByTagName("body").item(0);i.firstChild?i.insertBefore(o,i.firstChild):i.appendChild(o)},preparePop:function(){if(!("object"==typeof exoJsPop101&&exoJsPop101.hasOwnProperty("add"))){if(popMagic.top=self,popMagic.top!==self)try{top.document.location.toString()&&(popMagic.top=top)}catch(o){}if(popMagic.cookie_name="zone-cap-"+popMagic.config.idzone,popMagic.config.t_venor&&popMagic.shouldShow()){var e=new XMLHttpRequest;e.onreadystatechange=function(){e.readyState==XMLHttpRequest.DONE&&(popMagic.venor_loaded=!0,200==e.status&&(popMagic.venor=e.responseText))};var i="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol;e.open("GET",i+"//"+popMagic.config.syndication_host+"/venor.php",!0);try{e.send()}catch(t){popMagic.venor_loaded=!0}}if(popMagic.buildUrl(),popMagic.browser=popMagic.browserDetector.detectBrowser(navigator.userAgent),popMagic.config.chrome_enabled||"chrome"!==popMagic.browser.name&&"crios"!==popMagic.browser.name){var n=popMagic.getPopMethod(popMagic.browser);popMagic.addEvent("click",n)}}},getPopMethod:function(o){return popMagic.config.popup_force||popMagic.config.popup_fallback&&"chrome"===o.name&&o.version>=68&&!o.isMobile?popMagic.methods.popup:o.isMobile?popMagic.methods.default:"chrome"===o.name?popMagic.methods.chromeTab:popMagic.methods.default},buildUrl:function(){var o,e="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol,i=top===self?document.URL:document.referrer,t={type:"inline",name:"popMagic",ver:this.version};this.url=e+"//"+this.config.syndication_host+"/splash.php?cat="+this.config.cat+"&idzone="+this.config.idzone+"&type=8&p="+encodeURIComponent(i)+"&sub="+this.config.sub+(""!==this.config.sub2?"&sub2="+this.config.sub2:"")+(""!==this.config.sub3?"&sub3="+this.config.sub3:"")+"&block=1&el="+this.config.el+"&tags="+this.config.tags+"&cookieconsent="+this.config.cookieconsent+"&scr_info="+encodeURIComponent(btoa((o=t).type+"|"+o.name+"|"+o.ver))},addEventToElement:function(o,e,i){o.addEventListener?o.addEventListener(e,i,!1):o.attachEvent?(o["e"+e+i]=i,o[e+i]=function(){o["e"+e+i](window.event)},o.attachEvent("on"+e,o[e+i])):o["on"+e]=o["e"+e+i]},addEvent:function(o,e){var i;if("3"==popMagic.config.trigger_method){for(r=0,i=document.querySelectorAll("a");r<i.length;r++)popMagic.addEventToElement(i[r],o,e);return}if("2"==popMagic.config.trigger_method&&""!=popMagic.config.trigger_method){var t,n=[];t=-1===popMagic.config.trigger_class.indexOf(",")?popMagic.config.trigger_class.split(" "):popMagic.config.trigger_class.replace(/\s/g,"").split(",");for(var r=0;r<t.length;r++)""!==t[r]&&n.push("."+t[r]);for(r=0,i=document.querySelectorAll(n.join(", "));r<i.length;r++)popMagic.addEventToElement(i[r],o,e);return}popMagic.addEventToElement(document,o,e)},setCookie:function(o,e,i){if(!this.config.cookieconsent)return!1;i=parseInt(i,10);var t=new Date;t.setMinutes(t.getMinutes()+parseInt(i));var n=encodeURIComponent(e)+"; expires="+t.toUTCString()+"; path=/";document.cookie=o+"="+n},getCookie:function(o){if(!this.config.cookieconsent)return!1;var e,i,t,n=document.cookie.split(";");for(e=0;e<n.length;e++)if(i=n[e].substr(0,n[e].indexOf("=")),t=n[e].substr(n[e].indexOf("=")+1),(i=i.replace(/^\s+|\s+$/g,""))===o)return decodeURIComponent(t)},randStr:function(o,e){for(var i="",t=e||"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",n=0;n<o;n++)i+=t.charAt(Math.floor(Math.random()*t.length));return i},isValidUserEvent:function(o){return"isTrusted"in o&&!!o.isTrusted&&"ie"!==popMagic.browser.name&&"safari"!==popMagic.browser.name||0!=o.screenX&&0!=o.screenY},isValidHref:function(o){return void 0!==o&&""!=o&&!/\s?javascript\s?:/i.test(o)},findLinkToOpen:function(o){var e=o,i=!1;try{for(var t=0;t<20&&!e.getAttribute("href")&&e!==document&&"html"!==e.nodeName.toLowerCase();)e=e.parentNode,t++;var n=e.getAttribute("target");n&&-1!==n.indexOf("_blank")||(i=e.getAttribute("href"))}catch(r){}return popMagic.isValidHref(i)||(i=!1),i||window.location.href},getPuId:function(){return"ok_"+Math.floor(89999999*Math.random()+1e7)},browserDetector:{browserDefinitions:[["firefox",/Firefox\/([0-9.]+)(?:\s|$)/],["opera",/Opera\/([0-9.]+)(?:\s|$)/],["opera",/OPR\/([0-9.]+)(:?\s|$)$/],["edge",/Edg(?:e|)\/([0-9._]+)/],["ie",/Trident\/7\.0.*rv:([0-9.]+)\).*Gecko$/],["ie",/MSIE\s([0-9.]+);.*Trident\/[4-7].0/],["ie",/MSIE\s(7\.0)/],["safari",/Version\/([0-9._]+).*Safari/],["chrome",/(?!Chrom.*Edg(?:e|))Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["chrome",/(?!Chrom.*OPR)Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["bb10",/BB10;\sTouch.*Version\/([0-9.]+)/],["android",/Android\s([0-9.]+)/],["ios",/Version\/([0-9._]+).*Mobile.*Safari.*/],["yandexbrowser",/YaBrowser\/([0-9._]+)/],["crios",/CriOS\/([0-9.]+)(:?\s|$)/]],detectBrowser:function(o){var e=o.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile|WebOS|Windows Phone/i);for(var i in this.browserDefinitions){var t=this.browserDefinitions[i];if(t[1].test(o)){var n=t[1].exec(o),r=n&&n[1].split(/[._]/).slice(0,3),c=Array.prototype.slice.call(r,1).join("")||"0";return r&&r.length<3&&Array.prototype.push.apply(r,1===r.length?[0,0]:[0]),{name:t[0],version:r.join("."),versionNumber:parseFloat(r[0]+"."+c),isMobile:e}}}return{name:"other",version:"1.0",versionNumber:1,isMobile:e}}},methods:{default:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e=o.target||o.srcElement,i=popMagic.findLinkToOpen(e);return window.open(i,"_blank"),popMagic.setAsOpened(),popMagic.top.document.location=popMagic.url,void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation()),!0},chromeTab:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o)||void 0===o.preventDefault)return!0;o.preventDefault(),o.stopPropagation();var e=top.window.document.createElement("a"),i=o.target||o.srcElement;e.href=popMagic.findLinkToOpen(i),document.getElementsByTagName("body")[0].appendChild(e);var t=new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window,screenX:0,screenY:0,clientX:0,clientY:0,ctrlKey:!0,altKey:!1,shiftKey:!1,metaKey:!0,button:0});t.preventDefault=void 0,e.dispatchEvent(t),e.parentNode.removeChild(e),window.open(popMagic.url,"_self"),popMagic.setAsOpened()},popup:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e="";if(popMagic.config.popup_fallback&&!popMagic.config.popup_force){var i,t=Math.max(Math.round(.8*window.innerHeight),300),n=Math.max(Math.round(.7*window.innerWidth),300);e="menubar=1,resizable=1,width="+n+",height="+t+",top="+(window.screenY+100)+",left="+(window.screenX+100)}var r=document.location.href,c=window.open(r,popMagic.getPuId(),e);setTimeout(function(){c.location.href=popMagic.url},200),popMagic.setAsOpened(),void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation())}}};    popMagic.init(adConfig);
        })();
    </script>
    @endif
</body>

</html>
