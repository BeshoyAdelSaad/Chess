
@extends('layouts.nav')

@section('title', 'Login')
@section('content')

    <div class="div-login">

        <h2 class="text-center my-4">Sign in</h2>
            <div class="div-form rounded p-4 bg-light text-center my-5">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row" >
                        <label class="col-sm-12 mb-2" for="email">Email</label>
                        <input class="col-sm-12 mb-3" type="email" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="row" >
                        <label class="col-sm-12 mb-2" for="password">Password</label>
                        <input class="col-sm-12 mb-3" type="password" id="password" name="password">
                    </div>

                    <div class="row">
                        <input class="w-100 btn btn-primary my-3" type="submit" value="Register">
                    </div>
                </form>
            </div>
    </div>

@endsection

@extends('layouts.footer')
