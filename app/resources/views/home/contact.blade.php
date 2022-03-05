@extends('home.layout.app')
@section('title', 'Another Comment')
@section('content')

<div class="container-fluid card-container">
    <div class="row">

    <div class="col-2">
    @include('home.components.sidebar')
    </div>

<div class="col-9">

    @for($i=1;$i<=$cards;$i++)
        @include('home.components.card')
    @endfor
</div>
    </div>
</div>
@endsection
