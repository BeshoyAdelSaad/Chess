@extends('layouts.nav')
@section('title', 'Home')

@section('content')

<div class="container">
    <h1 class="text-center mb-3">Contact Form</h1>
<form id="contact_form" name="contact_form" method="post">
    <div class="mb-3 row">
        <div class="col">
            <label>First Name</label>
            <input type="text" required maxlength="50" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="col">
            <label>Last Name</label>
            <input type="text" required maxlength="50" class="form-control" id="last_name" name="last_name">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <label for="email_addr">Email address</label>
            <input type="email" required maxlength="50" class="form-control" id="email_addr" name="email"
                placeholder="name@example.com">
        </div>
        <div class="col">
            <label for="phone_input">Phone</label>
            <input type="tel" required maxlength="50" class="form-control" id="phone_input" name="Phone"
                placeholder="Phone">
        </div>
    </div>
    <div class="mb-3">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary px-4 btn-lg">Post</button>
</form>

</div>
@endsection