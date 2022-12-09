<!-- @extends('layout') -->
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un comment</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{$quack}}
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea name="content"  cols="30" rows="10" class="form-control">Contenu</textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="text" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" name="tags" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <input type="hidden" name="quack_id" value="{{$quack->id}}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter un commentaire </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection