@extends('layouts.main')
@section('container')
    <br><br><br><br><br>
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    @if(Session::has('loginError'))
    <div class="alert alert-danger">
        {{ Session::get('loginError') }}
    </div>
    @endif

    @if(Session::has('notyetAuth'))
    <div class="alert alert-danger">
        {{ Session::get('notyetAuth') }}
    </div>
    @endif
      <h1 class="text-center text-success" id="JudulLogin">Quravel</h1>
      <h6 class="text-center text-success" id="Tagline">Teman baikmu dalam liburan!</h6>
      <div class="col-md-6 mx-auto "></div>
      <form method="post" action="/login">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="Email address" class="form-control form-control-lg text-success @error('email') is-invalid @enderror"
            id="email" name="email" value ="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" placeholder="Password" class="form-control form-control-lg text-success @error('password') is-invalid @enderror"
            id="password" name="password" value ="{{ old('password') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="fw-bold mt-3 pt-1 mb-0">Don't have an account? <a href="/register"
                class="link-danger">Register</a></p>
        </div>

    </form>
@endsection
<link rel="stylesheet" type="text/css" href="{{ url('css/auth.css') }}">

