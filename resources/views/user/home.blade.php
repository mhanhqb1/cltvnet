@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <td>
                            {{ Auth::guard('web')->user()->name }}
                        </td>
                        <td>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('js-logoutForm').submit();">Logout</a>
                            <form action="{{ route('user.logout.index') }}" method="POST" id="js-logoutForm">@csrf</form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
