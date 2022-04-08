@extends('home.layout.app')
@section('title', 'Comments ~:')
@section('content')

    <div class="container-fluid ">
        <div class="row">

            <div class="col-2">
                <!--Rendering Sidebar -->
                @include('home.components.sidebar', [$sidebar,$sidebarCount])
            </div>

            <div class="col-9">

                <h1 id="databaseHeader">Database</h1>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <table class="table table-hover" id="commentTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">copy</th>
                                    <th scope="col">id</th>
                                    <th scope="col">Contributor</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Tone</th>
                                    <th scope="col">Status</th>
                                    @if(Auth::check())
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>  <!--fluid conatiner --> 
            @include('home.components.newCommentForm')
            <div class="modal hidden fade" id="deleteModal" tabindex="-1" 
                role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" 
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Delete A Comment Are You Sure?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="deleteCommentId" 
                                class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" 
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            @include('home.components.scratchpad')

        @endsection
