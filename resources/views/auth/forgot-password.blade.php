@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('main')
    <form action="{{ route('password.email') }}" method="POST">
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

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
        </div>
        <p class="my-1">
            <a href="{{ route('login') }}">Go to sign in</a>
        </p>
    </form>
@endsection
