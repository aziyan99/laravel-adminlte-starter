@extends('layouts.admin')

@section('title', 'Edit Permission')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit a Permission form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('admin.permissions._form')

                        <div class="form-group">
                            @permission('permissions.update')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Update') }}</button>
                            @endpermission
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
