
@extends('layouts.nav')

@section('title', 'Register')
@section('content')

<div class="container">
    <div class="row">
        <div class="m-auto w-50 bg-light border rounded my-2 p-5 shadow ">
            <h2 class="text-center my-2">Sign up</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name">
                </div>
                @error('name')
                <div class="fw-bold text-danger">
                    {{ $message }}
                  </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" value="{{ old('email') }}" name="email" id="email">
                </div>
                @error('email')
                <div class="fw-bold text-danger">
                    {{ $message }}
                  </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                @error('password')
                <div class="fw-bold text-danger">
                    {{ $message }}
                  </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirm password</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
                @error('password_confirmation')
                <div class="fw-bold text-danger">
                   {{ $message }}
                  </div>
                @enderror

                <div class="row">
                    <input class="w-100 btn btn-primary my-3" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
