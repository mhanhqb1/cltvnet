@extends('layouts.master')

@section('content')
<div class="container box-cards">
    @foreach($data as $v)
    <div class="card">
        <div class="card-image">
            <a href=""><img src="{{ getImageUrl($v->image) }}" rel="noopener noreferrer" /></a>
        </div>
        <div class="card-content">
            <h2><a href="">{{ $v->name }}</a></h2>
            <p>{{ $v->description }}</p>
            <div class="card-footer">
                <span><i class="fa-solid fa-calendar-days"></i> {{ date('Y-m-d', strtotime($v->created_at)) }}</span>
                <a href="#" class="action">
                    Read more
                    <span aria-hidden="true">
                        →
                    </span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
