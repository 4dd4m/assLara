@extends('home.layout.app')
@section('title', 'Comment timeline')
@section('content')

<div class="container-fluid er">
    <div class="row">

    <div class="col-2">
        <!--Rendering Sidebar -->
        @include('home.components.sidebar', [$sidebar,$sidebarCount])
    </div>

<div class="col-9">
        <!--displaying the comments --> 

    <!-- Modal -->

        <div id="cards">
        </div>
</div>  <!--fluid conatiner --> 
    @include('home.components.newCommentForm')
@endsection
