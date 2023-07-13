@extends('layout.main')
@section('container')
<div class="row justify-content-center mt-3">
    <div class="col-lg-4">
        <main class="form-signup w-100 m-auto">
            <form action="/register" method="POST">
                @csrf
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>

                <div class="form-floating mt-2">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-2">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" name="username" required value="{{ old('username') }}">
                    <label for=" username">UserName</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                    <label for=" email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                    <label for=" password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-dark mt-2" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already have Account? <a href="/login" class="text-decoration-none">Login</a></small>
        </main>
    </div>
</div>
@endsection