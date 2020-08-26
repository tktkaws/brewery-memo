@extends('app')

@section('title', '記事一覧')

@section('content')
@include('nav') {{--この行を追加--}}

<div class="container">
    @foreach($breweries as $brewery) {{--この行を追加--}}
    <div class="card mt-3">
        <div class="card-body d-flex flex-row">
            <i class="fas fa-user-circle fa-3x mr-1"></i>
            <div>
                <div class="font-weight-bold">
                    {{ $brewery->user->name }} {{--この行を変更--}}
                </div>
                <div class="font-weight-lighter">
                    {{ $brewery->created_at->format('Y/m/d H:i') }} {{--この行を変更--}}
                </div>
            </div>
        </div>
        <div class="card-body pt-0 pb-2">
            <h3 class="h4 card-title">
                {{ $brewery->title }} {{--この行を変更--}}
            </h3>
            <div class="card-text">
                {!! nl2br(e( $brewery->body )) !!} {{--この行を変更--}}
            </div>
        </div>
    </div>
    @endforeach {{--この行を追加--}}
</div>
@endsection