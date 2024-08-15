@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam sunt voluptas,
                voluptates maxime non laudantium ipsam temporibus
                dolor quod beatae culpa laborum magni odit, distinctio eveniet tenetur nesciunt error atque?
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection('content')
