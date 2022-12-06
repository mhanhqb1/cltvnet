@extends('layouts.master')

@section('content')
<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $pageTitle }}</h3>
            <ul>
                <li>
                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                <li>{{ $pageTitle }}</li>
            </ul>
        </div>
    </div>
    <div class="inner-shape">
        <img src="/images/shape/inner-shape.png" alt="Images">
    </div>
</div>
<div class="contact-form-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>{{ $pageTitle }}</h2>
        </div>
        <div class="row pt-45">
            {!! !empty($page->content) ? $page->content : '' !!}
        </div>
    </div>
</div>
@endsection
