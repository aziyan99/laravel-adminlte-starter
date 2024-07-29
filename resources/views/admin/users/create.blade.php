@extends('layouts.admin')

@section('title', 'Add User')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Add a new User form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        @include('admin.users._form')

                        <div class="form-group">
                            <label for="password">{{ __('Password*') }}</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter user password">
                            @error('password')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Password Confirmation*') }}</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" placeholder="Retype user password">
                            @error('password_confirmation')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            @permission('users.create')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            @endpermission
                            <a href="{{ route('admin.users.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
