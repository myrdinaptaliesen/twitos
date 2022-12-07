@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                    <h1>toto</h1>
                        <h3>Liste des comments</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Contenu</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Quack</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->content}}</td>
                                    <td>{{$comment->image}}</td>
                                    <td>{{$comment->tags}}</td>
                                    <td>{{$comment->quack_id}}</td>
                                    <td>
                                        <a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('comments.destroy', $comment->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endsection