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
@endsection
