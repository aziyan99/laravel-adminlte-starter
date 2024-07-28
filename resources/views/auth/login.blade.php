@extends('layouts.auth')

@section('title', 'Sign In')

@section('main')
    <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="error invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="error invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </div>
        <p class="my-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
    </form>
@endsection
