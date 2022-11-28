@extends('layouts.master')

@section('content')
<form action="{{ route('front.contact.save') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>{{ __('Name') }}</label>
        <input type="text" name="name" required/>
    </div>
    <div class="form-group">
        <label>{{ __('Email') }}</label>
        <input type="email" name="email" required/>
    </div>
    <div class="form-group">
        <label>{{ __('Phone') }}</label>
        <input type="text" name="phone" required/>
    </div>
    <div class="form-group">
        <label>{{ __('Message') }}</label>
        <textarea name="message" required></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="{{ __('Submit') }}"/>
    </div>
</form>
@endsection
