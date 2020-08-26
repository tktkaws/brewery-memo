@extends('app')

@section('title', $tag->hashtag)

@section('content')
@include('nav')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4 card-title m-0">{{ $tag->name }}</h2>
            <div class="card-text text-right">
                {{ $tag->breweries->count() }}件
            </div>
        </div>
    </div>
    @foreach($tag->breweries as $brewery)
    @include('breweries.card')
    @endforeach
</div>
@endsection