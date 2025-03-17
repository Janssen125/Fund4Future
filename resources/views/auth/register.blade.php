@extends('layouts.auth')

@section('cssName')
login
@endsection

@section('content')
<section class="container d-flex justify-content-center align-center dvw-100">
    <form class="d-flex justify-content-center flex-sm-column w-50">
      <div>
        <h1 class="text-center">Registration</h1> <br>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Date of Birth</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
      </div>
      <button type="submit" class="btn btn-primary sign-in-btn w-100">Sign In</button>
      <hr>
      <div class="container text-center">
        <p>Already have an account?</p>
        <a href="{{ route('login') }}" class="sign-up">Sign In</a> <br>
      </div>
    </form>
  </section>
@endsection
