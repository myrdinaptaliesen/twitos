@extends('layout')
@section('content')
@foreach($quacks as $quack)




<div class="row g-0 bg-light position-relative">
    <div class="col-md-6 mb-md-0 p-md-4">
        <img src="..." class="w-100" alt="...">
    </div>
    <div class="col-md-6 p-4 ps-md-0">
    {{$quack->content}}
    <br>
    <span>{{$quack->tags}}</span>
    <br>
        <a href="#" class="stretched-link">Ajouter un commentaire</a>
    </div>
</div>

@endforeach
@endsection