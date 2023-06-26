@extends('base')
@section('content')
    <h1>Mes taches</h1>
    <div class="container">
        <form action="" method="post" class="form-control">
            @csrf
                <input type="text" class="form-control" name="title" placeholder="un titre a la taches" value="{{$task->title}}">
                @error("title")
                    {{$message}}
                    @enderror          
                <div class="form-floating mt-2">
                    <textarea class="form-control" name="contenue" placeholder="entrer la taches" id="floatingTextarea">{{$task->contenue}}</textarea>
                    <label for="floatingTextarea">Comments</label>
                    @error("title")
                    {{$message}}
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary form-control mt-2">save</button>
        </form>
@endsection()