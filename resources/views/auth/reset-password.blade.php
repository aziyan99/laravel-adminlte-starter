@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('main')
    <form action="{{ route('password.store') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $request->email }}">
        <input type="hidden" name="token" value="{{ $request->token }}">
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
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Save new password</button>
            </div>
        </div>
        <p class="my-1">
            <a href="{{ route('login') }}">Go to sign in</a>
        </p>
    </form>
@endsection
