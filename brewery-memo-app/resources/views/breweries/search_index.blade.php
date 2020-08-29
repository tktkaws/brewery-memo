@extends('app')

@section('title', '検索結果一覧')

@section('content')
@include('nav')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4 card-title m-0">{{ $keyword }}</h2>
        </div>
    </div>
    @foreach($breweries as $brewery)
    @include('breweries.card')
    @endforeach
</div>
@endsection