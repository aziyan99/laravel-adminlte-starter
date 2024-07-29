@extends('layouts.admin')

@section('title', 'Edit Profile')

@section('main')
    <div class="row">
        <div class="col-12 mt-3">
            @include('layouts.shared.alert')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit profile form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name*') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Enter user fullname" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            @permission('profile.update')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            @endpermission
                            <a href="{{ route('profile.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit password form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password">{{ __('Current password*') }}</label>
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                                placeholder="Enter current password" value="{{ old('current_password') }}">
                            @error('current_password')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('New password*') }}</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter new password" value="{{ old('password') }}">
                            @error('password')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('New password confirmation*') }}</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" placeholder="Enter new password confirmation"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            @permission('profile.update')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            @endpermission
                            <a href="{{ route('profile.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
