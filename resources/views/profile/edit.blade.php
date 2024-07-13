@extends('layouts.admin')

@section('title', 'Edit Profile')

@section('main')
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
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            <a href="{{ route('profile.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
