@extends('home.layout.app')
@section('title', 'Supervisor View')
@section('content')

<div class="container-fluid card-container">
    <div class="row">

    <div class="col-2">
        <!--Rendering Sidebar -->
        @include('home.components.sidebar', [$sidebar,$sidebarCount])
    </div>

<div class="col-9">
        <!--displaying the comments --> 
        @include('home.components.card', [$comments])
</div>
@endsection
