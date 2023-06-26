@extends('base')
@section('content')
<h2>se connecter</h2>
<div class="card">
    <div class="card-body">
        <form action="{{route('auth.login')}}" method="post">
                @csrf
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                    @error("email")
                        {{$message}}
                        @enderror
                </div>
                <div class="form-control">
                    <label for="email">Password</label>
                    <input type="password" class="form-control" name="password">
                        @error("passord")
                            {{$message}}
                            @enderror
                </div>
            <button type="submit" class="btn btn-primary class-control">se connecter</button> 
        </form>
    </div>
</div>
@endsection()