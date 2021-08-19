@extends('layouts.main')

@section('title', 'Assign Permission')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Assign Permission') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Assign Permission') }}</li>
        <li class="breadcrumb-item active">{{ __('Ubah') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Ubah hak akses role') }} {{ $role->name }}
                </h3>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.assignpermission.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.assignpermission.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role_id" value="{{ $role->id }}">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('Nama permission') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    name="update_role_permissions[]" value="{{ $permission->id }}"
                                                    {{ (in_array($permission->id, $role_permissions)) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-3 mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
