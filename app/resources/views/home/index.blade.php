@extends('home.layout.app')
@section('title', 'Supervisor View')
@section('content')

<div class="container-fluid card-container">
    <div class="row">

    <div class="col-2">
        @include('home.components.sidebar')
    </div>

<div class="col-9">

    <h1 class="stcructureTitle">{{ $section[0] }}</h1>

    <button type="button" data-name="{{ $section[0] }}" class=" shadow newForm btn btn-primary btn-sm btn-block">Add a new {{ $section[0] }} comment</button>

    @include('home.components.newCommentForm')

    @for($i=0;$i<count($comment1);$i++)
        @include('home.components.card', ['comment1' => $comment1[$i]])
    @endfor



    <h1 class="stcructureTitle">{{ $section[1] }}</h1>
    <button type="button" data-name="{{ $section[1] }}" class="shadow newForm btn btn-primary btn-sm btn-block">Add a new {{ $section[1] }} comment</button>

    @include('home.components.newCommentForm')

    @for($i=0;$i<count($comment2);$i++)
        @include('home.components.card', ['comment1' => $comment2[$i]])
    @endfor

</div>
@endsection
