@extends('home.layout.app')
@section('title', 'Supervisor View')
@section('content')

<div class="container-fluid card-container">
    <div class="row">

    <div class="col-2">
        @include('home.components.sidebar', [$sidebar,$sidebarCount])
    </div>

<div class="col-9">

    <h1 class="stcructureTitle">Results</h1>

    <button type="button" data-name="" class=" shadow newForm btn btn-primary btn-sm btn-block">Add a new Soon  comment</button>

    @include('home.components.newCommentForm')

    @for($i=0;$i<count($comments);$i++)
        @include('home.components.card', ['comment' => $comments[$i]])
    @endfor



    <h1 class="stcructureTitle">Terminology</h1>
    <button type="button" data-name="" class="shadow newForm btn btn-primary btn-sm btn-block">Add a new Soon comment</button>

    @include('home.components.newCommentForm')

    @for($i=0;$i<count($comments);$i++)
        @include('home.components.card', ['comment' => $comments[$i]])
    @endfor

</div>
@endsection
