@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>User Register</h4>
                <form action="{{ route('user.create.index') }}" method="post" autocomplete="off">
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}" class="form-control">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter email address" id="email" value="{{ old('email') }}" class="form-control">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" id="password" class="form-control">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" name="cpassword" placeholder="Enter your password again" id="cpassword" class="form-control">
                        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <br/>
                    <a href="{{ route('user.login.index') }}">I already have an account</a>
                </form>
            </div>
        </div>
    </div>
@endsection
