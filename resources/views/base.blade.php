<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link @if(request()->route()->getname()=='Task.index')active @endif" aria-current="page" href="{{ route('dashboard.show')}}">Home</a>
        </li>
      </ul>
      <div class="navbar-nav ms-auto mb-2 mb-lg-0">
          @auth
             {{Illuminate\Support\Facades\Auth::user()->name}}
             <form action="{{route('auth.logout')}}" method="post">
                @method("delete")
              @csrf
                <button class="nav-link">se Deconnecter</button>
             </form>
          @endauth
          @guest
             <div class="nav-item">
              <a href="{{route('auth.login')}}" class="nav-link">se connecter</a>
             </div>
          @endguest
      </div>
    </div>
  </div>
</nav>
</nav>
</nav>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('success')}}
        </div>
        @endif
        @yield('content')
    </div>
</body>
</html>