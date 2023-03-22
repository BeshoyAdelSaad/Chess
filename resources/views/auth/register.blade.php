
@extends('layouts.nav')

@section('title', 'Register')
@section('content')

    <div class="div-login">
        <h2 class="text-center my-4">Sign up</h2>
        <div class="div-form container rounded p-4 bg-light text-center my-5">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row" >
                    <label class="col-sm-12 mb-2" for="name">Name</label>
                    <input class="col-sm-12 mb-3" type="text" name="name" value="{{ old('neme') }}" id="name">
                </div>

                <div class="row" >
                    <label class="col-sm-12 mb-2" for="email">Email</label>
                    <input class="col-sm-12 mb-3" type="email" value="{{ old('email') }}" name="email" id="email">
                </div>

                <div class="row" >
                    <label class="col-sm-12 mb-2" for="password">Password</label>
                    <input class="col-sm-12 mb-3" type="password" name="password" id="password">
                </div>

                <div class="row" >
                    <label class="col-sm-12 mb-2" for="confirm_password">Confirm password</label>
                    <input class="col-sm-12 mb-3" type="text" name="confirm_password">
                </div>

                <div class="row">
                    <input class="w-100 btn btn-primary my-3" type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>


@endsection

@extends('layouts.footer')
