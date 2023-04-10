<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Chess Accademy')</title>
    <link rel="stylesheet" href={{ asset('css/mycss.css') }}>
    <link rel="stylesheet" href={{ asset('css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/chessboard-1.0.0.css') }}>
    <script src={{ asset('js/jquery-3.6.4.min.js') }}></script>
    <script src={{ asset('js/chessboard-1.0.0.min.js') }}></script>
    <script src={{ asset('js/chessboard-1.0.0.js') }}></script>

</head>
<body>

  <nav class="navbar navbar-expand-sm bg-body-tertiary">
      <div class="container-fluid d-flex justify-content-start">
        <a class="navbar-brand active" href="/">Logo</a>
        <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if(request()->is('/')) echo 'active';?>" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle <?php if(request()->is('/play-chess')) echo 'active';?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Play
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('search-online') }}">Online</a></li>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> --}}

                <li><a  data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item" href="{{ route('vs-friend') }}">Friend</a></li>
                <li><a class="dropdown-item" href="{{ route('vs-computer') }}">Computer</a></li>
                <li><a class="dropdown-item" href="{{ route('vs-me') }}">Whit me</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(request()->is('/learn-chess')) echo 'active';?>" href="#">Lrean Chess</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(request()->is('/about-us')) echo 'active';?>" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(request()->is('/contact')) echo 'active';?>" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>

        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
                <a href="#" class="btn btn-outline-primary m-3">Profile</a>
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary m-3">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-primary m-3">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary m-3">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary m-3">Register</a>
                @endif
            @endauth
        </div>
        @endif
      </div>
  </nav>
      
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 pt-4 bg-dark ">

          <div class="sidenav">
            <div class="d-flex justify-content-end align-items-baseline">
              <form class="d-flex align-items-center" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form> 
            </div>
            <button class="dropdown-btn">Puzzles 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
              <a href="/puzzles/mate-in-one">Mate in 1</a>
              <a href="/puzzles/mate-in-two">Mate in 2</a>
              <a href="/puzzles/mate-in-three">Mate in 3</a>
              <a href="/puzzles/mate-in-four">Mate in 4</a>
              <a href="/puzzles/mate-in-five">Mate in 5</a>
              <a href="/puzzles/mate-in-six">Mate in 6</a>
              <a href="/puzzles/best-move">Best Move</a>
              <a href="/puzzles/rundom-puzzle">Rundom Puzzle</a>
            </div>
            <a href="#contact">Search</a>
          </div>
        </div>

            {{-- Play With Friend Start --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Play With Friend</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('vs-friend') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="color" class="col-form-label">Color:</label>
                    <select class="form-control" id="color" name="color" required>
                      <option value="">Color</option>
                      <option value="white">White</option>
                      <option value="black">Black</option>
                    </select>
                  </div>
                  @error('color')
                  <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                  <div class="mb-3">
                    <label for="time" class="col-form-label">Time:</label>
                    <select class="form-control" id="time" name="time" required>
                      <option value="">Time</option>
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="30">30</option>
                      <option value="60">60</option>
                      <option value="90">90</option>
                    </select>
                  </div>
                  @error('color')
                  <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Play</button>
                </div>
              </form>
            </div>
          </div>
        </div>
          {{-- Play With Friend End --}}

        <div id="mainContent" class="col-10 p-4">
       
          @yield('content')

          
        </div>

      </div>
    </div>



    
    @extends('layouts.footer')



