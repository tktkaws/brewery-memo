@extends('app')

@section('title', '投稿詳細')

@section('content')
@include('nav')
<div class="container">
    @include('breweries.card')
    <div id="map-container-google-1" class="z-depth-1-half map-container">
        <iframe src='https://www.google.com/maps/embed/v1/search?key={{ env('GOOGLE_MAP_API') }}&q={{ $brewery->name }}'
            width='100%' height='480' frameborder='0' style="border:0">
        </iframe>
    </div>
</div>
@endsection