@extends('layouts.admin')

@section('title', 'Edit Role')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit a Role form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('admin.roles._form')

                        <div class="form-group">
                            <label for="permissions">{{ __('Permissions') }}</label>
                            <select name="permissions[]" id="permissions"
                                class="form-control @error('permissions') is-invalid @enderror" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'selected' : ''}}>{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
