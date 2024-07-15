@extends('layouts.admin')

@section('title', 'Add Role')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Add a new Role form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf

                        @include('admin.roles._form')

                        <div class="form-group">
                            <label for="permissions">{{ __('Permissions') }}</label>
                            <select name="permissions[]" id="permissions"
                                class="form-control @error('permissions') is-invalid @enderror" multiple>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permissions')
                                <small class="error invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            @permission('roles.create')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                            @endpermission
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
