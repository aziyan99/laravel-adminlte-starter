@extends('layouts.admin')

@section('title', 'Add Permission')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Add a new Permission form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf

                        @include('admin.permissions._form')

                        <div class="form-group">
                            @permission('permission.create')
                                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
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
