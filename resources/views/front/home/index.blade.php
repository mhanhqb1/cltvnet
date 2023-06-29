@extends('layouts.master')

@section('content')
<div class="container box-cards">
    @foreach($data as $v)
        @include('layouts.post_item', ['item' => $v])
    @endforeach
</div>
@endsection
