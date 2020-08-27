@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
@include('nav')
<div class="container">
    @include('users.user')
    @include('users.tabs', ['hasBreweries' => false, 'hasLikes' => true])
    @foreach($breweries as $brewery)
    @include('breweries.card')
    @endforeach
</div>
@endsection