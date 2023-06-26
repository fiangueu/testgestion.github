@extends('base')
@section('content')
    <h1>Mes taches</h1>
    @foreach($posts as $post)
        <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Contenue</th>
                    <th scope="colspan=2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td style="width: 10%;">{{$post->title}}</td>
                    <td  style="width: 10%;">{{$post->contenue}}</td>
                    <td><button class="btn btn-primary"><a href="{{route('task.edit',['task'=>$post->id])}}" class="text-light">modifier</a></button></td>
                    <td><button class="btn btn-danger"><a href="{{route('task.delete',['task'=>$post->id])}}" class="text-light">supprimer</a></button></td>
                    <td><button class="btn btn-primary"><a href="{{route('task.show',['id'=>$post->id])}}" class="text-light">voir plus</a></button></td>
                    </tr>
                </tbody>
    </table>
    @endforeach
    <button class="btn btn-primary"><a href="{{route('task.new')}}" class=" text-end text-light">ajouter une tache</a></button>
    {{ $posts->links() }}
@endsection()