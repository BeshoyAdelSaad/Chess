
@extends('layouts.nav')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row">
        <div class="m-auto w-50 bg-light border rounded my-2 p-5 shadow ">
            <h2 class="text-center my-2">Sign in</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @Error('email')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror    
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    @Error('password')
                    <p class="text-danger-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

    @endsection