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
                  <li><a class="dropdown-item" href="#">Online</a></li>
                  <li><a class="dropdown-item" href="#">Friend</a></li>
                  <li><a class="dropdown-item" href="{{ route('computer') }}">Computer</a></li>
                  <li><a class="dropdown-item" href="{{ route('withme') }}">Whit me</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(request()->is('/learn-chess')) echo 'active';?>" href="#">Lrean Chess</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(request()->is('/about-us')) echo 'active';?>" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if(request()->is('/contact')) echo 'active';?>" href="#">Contact</a>
              </li>
            </ul>
          </div>

        @auth
          <a href="#">Profile</a>
          <img src="" alt="Avatar">
        @endauth
          
          <a href="{{ Route('login-page') }}" class="btn btn-outline-secondary m-3">login</a>
          <a href="{{ Route('register-page') }}" class="btn btn-outline-secondary">Register</a>
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
        <div id="mainContent" class="col-10 p-4">
       
          @yield('content')

          
        </div>

      </div>
    </div>



    
    @extends('layouts.footer')



