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
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên phim</th>
                    <th>Tập hiện tại</th>
                    <th>Tập mới bên Danfra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $k => $movie)
                <tr>
                    <td>{{ $k + 1 }}</td>
                    <td><a href="{{ route('admin.movies.edit', $movie->id) }}" target="_blank">{{ $movie->name }}</a></td>
                    <td>{{ $movie->new_chapter }}</td>
                    <td><a href="{{ $movie->danfra_url }}" target="_blank">{{ $movie->danfra_new_chapter }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
