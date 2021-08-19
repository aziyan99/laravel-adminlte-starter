@extends('layouts.main')

@section('title', 'Role')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Ubah Role') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Role') }}</li>
        <li class="breadcrumb-item active">{{ __('Ubah') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{ __('Form ubah role') }}
            </div>
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('backend.role._form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Ubah') }}
                        </button>
                        <a href="{{ route('backend.roles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times mr-2"></i>
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
                <hr>
                @can('hapus role')
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteRole">
                    <i class="fas fa-trash-alt mr-2"></i>
                    {{ __('Hapus role') }}
                </button>
                @endcan
            </div>
        </div>
    </div>
</div>
@can('hapus role')
<div class="modal fade" id="deleteRole" tabindex="-1" aria-labelledby="deleteRoleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleLabel">{{ __('Hapus role') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.roles.destroy', $role) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-danger">
                        {{ __('Hapus role ini? Segala pengguna dengan role ini akan kehilangan hak aksesnya') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt mr-2"></i>
                        {{ __('Hapus') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan
@endsection
