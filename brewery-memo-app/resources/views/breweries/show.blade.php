@extends('app')

@section('title', '投稿詳細')

@section('content')
@include('nav')
<div class="container">
    @include('breweries.card')
</div>
@endsection
