@extends('layouts.main')
@section('container')
    <br><br><br><br><br>
    <div class="rowd-flex align-items-center">
        <h1 class="text-center text-success" id="JudulLogin">Quravel</h1>
        <h6 class="text-center text-success" id="Tagline">Ayo ikut menjadi teman baik Quravel!</h6>
        <div class="col-md-6 mx-auto "></div>
    </div>
    <form method="post" action="/register">
        @csrf
        <div class="form-group">
            <label for="username" class="form-label " >Username</label>
            <input type="text" placeholder="Username" class="form-control form-control-lg text-success @error('username') is-invalid @enderror"
            id="username" name="name" value ="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
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
            <button type="submit" class="btn btn-success" style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
            <p class="fw-bold mt-3 pt-1 mb-0">Have an account? <a href="/login"
                class="link-danger">Please Login</a></p>
        </div>

    </form>

@endsection
<link rel="stylesheet" type="text/css" href="{{ url('css/auth.css') }}">
