@extends('layouts.admin')

@section('title', 'Edit User')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit a User form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('admin.users._form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
