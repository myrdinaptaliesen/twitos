@extends('layout')
@section('content')
@if (Auth::user())
<h3>Bonjour {{Auth::user()->firstName}} {{Auth::user()->lastName}}</h3>
@endif
@foreach($quacks as $quack)

<div class="border border-primary m-3">
    <div class="row g-0 bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="{{asset('storage/uploads/' . $quack->image)}}" width="100%">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            {{$quack->content}}
            <br>
            <span>{{$quack->tags}}</span><br> 
            <span>Le {{$quack->created_at->format('d/m/Y')}} à {{$quack->created_at->format('H:i:s')}}</span>
            <br>
            @if (Auth::user())
            <a href="{{ route('comments.createComment', $quack->id)}}" class="stretched-link">Ajouter un commentaire</a>
            @endif



        </div>
    </div>

    @foreach($comments as $comment) @if ($comment->quack_id == $quack->id)
    <div class="row g-0 bg-secondary position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="{{asset('storage/uploads/' . $comment->image)}}" width="100%">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            {{$comment->content}}
            <br>
            <span>{{$comment->tags}}</span>
            <br>
            <span>Le {{$comment->created_at->format('d/m/Y')}} à {{$comment->created_at->format('H:i')}}</span>
        </div>
    </div>
    @endif @endforeach
</div>
@endforeach
@endsection