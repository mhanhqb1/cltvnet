@extends('layouts.admin_master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>
                    {{ Auth::guard('admin')->user()->name }}
                </td>
                <td>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('js-logoutForm').submit();">Logout</a>
                    <form action="{{ route('admin.logout') }}" method="POST" id="js-logoutForm">@csrf</form>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;" itemscope itemtype="https://schema.org/VideoObject">
            <meta itemprop="name" content="Cười Không Nhặt Được Mồm - Review Phim Thánh Bài 2 Châu Tinh Trì - Vua Phim #2" />
            <meta itemprop="description" content="Review Phim Thánh Bài 2 Châu Tinh Trì, đỗ thánh châu tinh trì phim thần bài phần 2<br />tom tat phim hai chau tinh tri than bai II<br />" />
            <meta itemprop="uploadDate" content="2022-08-02T13:28:32.000Z" />
            <meta itemprop="thumbnailUrl" content="https://s1.dmcdn.net/v/U7Qq61YwIqz58eo1b/x180" />
            <meta itemprop="duration" content="P748S" />
            <meta itemprop="embedUrl" content="https://geo.dailymotion.com/player/x9pog.html?video=x8cti4m" />
            <iframe style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden" frameborder="0" type="text/html" src="https://geo.dailymotion.com/player/x9pog.html?video=x8cti4m" width="100%" height="100%" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
