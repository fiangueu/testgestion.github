@extends('base')
@section('content')
    <h1>Mes taches</h1>
    <div class="container">
        <form action="" method="post" class="form-control">
            @csrf
                <input type="text" class="form-control" name="title" placeholder="un titre a la taches">
                @error("title")
                {{$message}}
                @enderror
                <div class="form-floating mt-2">
                    <textarea class="form-control" name="contenue" placeholder="entrer la taches" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Comments</label>
                    @error("title")
                    {{$message}}
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary class-control">save</button>
        </form>
    </div>
@endsection()