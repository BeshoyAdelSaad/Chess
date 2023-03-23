<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Chess Accademy')</title>
    <link rel="stylesheet" href={{ asset('css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/mycss.css') }}>
    <link rel="stylesheet" href={{ asset('css/chessboard-1.0.0.css') }}>
    <link rel="stylesheet" href={{ asset('css/chessboard-1.0.0.min.css') }}>


</head>
<body>

    <nav class="navbar navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-start">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <div class="d-flex justify-content-end align-items-baseline">
            <form class="d-flex align-items-center" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            @auth

            @endauth

          </div>

        </div>

      </nav>
    <script src={{ asset('js/my-puzzles.js') }}></script>
    <script src={{ asset('js/jquery-3.6.4.min.js') }}></script>
    <script src={{ asset('js/chessboard-1.0.0.min.js') }}></script>
    <script src={{ asset('js/chessboard-1.0.0.js') }}></script>


    @yield('content')


    @extends('layouts.footer')



