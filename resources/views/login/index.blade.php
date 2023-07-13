@extends('layout.main')
@section('container')
<div class="row justify-content-center mt-3">
    <div class="col-lg-4">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Sign In</h1>
            @if(session()->has('signupsuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('signupsuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginError') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/login" method="POST">
                @csrf
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

                <div class="form-floating mt-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                    <label for="email">Email address</label>
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not Registered? <a href="/register" class="text-decoration-none">Register Now</a></small>
        </main>
    </div>
</div>
@endsection