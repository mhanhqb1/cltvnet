<?php
$cates = getFrontCategories();
$cates2 = getFrontCategories(1);
$countries = getFrontCountries();
?>
<nav class="navbar navbar-site navbar-default" role="navigation" style="background: #cd1d1f;">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('cala_movies') }}" class="navbar-brand logo logo-title" style="color: #fff;">
                CaLa Movies
                <!-- <img src="" style="margin-top:-5px; max-height:70px;" height="51" width="200"> -->
            </a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form action="{{ route('home.search') }}" method="GET">
                        <div class="row search-row" style="margin-top:auto; max-width:auto;">
                            <div class="col-lg-8 col-sm-8 search-col">
                                <input type="text" name="q" id="autocomplete-ajax" class="keywords form-control input-rel searchtag-input " placeholder="Nhập tên phim cần tìm kiếm ..." value="{{ !empty($_GET['q']) ? $_GET['q'] : '' }}" autocomplete="off" style="width:400px; margin-top:-3px; font-size:15px;" required>
                            </div>
                            <div class="col-lg-4 col-sm-4 search-col pull-right">
                                <button class="botonb btn btn-primary btn-search btn-block" style="max-width:50px; float:right; background:#292d30; margin-top:-3px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="menu">
    <div class="container">
        <ul>
            <li><a href="{{ route('home.new_movie') }}">Phim mới</a></li>
            <li class="menu-child">
                <span><i class="fa fa-caret-down" aria-hidden="true"></i> &nbsp;Thể loại</span>
                <ul class="submenu">
                    @foreach ($cates as $cate)
                    <li><a href="{{ route('home.cate.index', $cate->slug) }}">{{ $cate->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="menu-child">
                <span><i class="fa fa-caret-down" aria-hidden="true"></i> &nbsp;Quốc gia</span>
                <ul class="submenu">
                    @foreach ($countries as $country)
                    <li><a href="{{ route('home.country.index', $country->slug) }}">{{ $country->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('home.not_series') }}">Phim lẻ</a></li>
            <li><a href="{{ route('home.series') }}">Phim bộ</a></li>
            <li><a href="{{ route('home.anime') }}">Phim hoạt hình</a></li>
            <li class="menu-child">
                <span><i class="fa fa-caret-down" aria-hidden="true"></i> &nbsp;Bộ sưu tập</span>
                <ul class="submenu">
                    @foreach ($cates2 as $cate)
                    <li><a href="{{ route('home.cate.index', $cate->slug) }}">{{ $cate->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
