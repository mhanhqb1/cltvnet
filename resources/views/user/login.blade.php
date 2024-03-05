@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>User Login</h4>
                <form action="{{ route('user.check.index') }}" method="POST">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter email address" id="email" value="{{ old('email') }}" class="form-control">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" id="password" value="{{ old('password') }}" class="form-control">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br/>
                    <a href="{{ route('user.register.index') }}">Create new account</a>
                </form>
            </div>
        </div>
    </div>
@endsection

