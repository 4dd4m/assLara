@extends('home.layout.app')
@section('title', 'Supervisor View')
@section('content')

<div class="container-fluid card-container">
    <div class="row">

    <div class="col-2">
        @include('home.components.sidebar', [$sidebar,$sidebarCount])
    </div>
<div class="col-9">
    <!--print the cards -->
    @foreach($comments as $category =>  $comments)
        @php( $replacedCategroy = str_replace("_"," ", $category)) 
        <h1 class="stcructureTitle aOffset" id="link_{{$replacedCategroy}}">{{ $replacedCategroy }}</h1>
        <button type="button" data-name="{{ $category }}" class="shadow newForm btn btn-primary btn-sm btn-block">Add a new {{ $replacedCategroy }} comment</button>

        @include('home.components.newCommentForm')

        @foreach($comments as $comment)
            @include('home.components.card', ['comment' => $comment])
        @endforeach
    @endforeach
</div>
@endsection
