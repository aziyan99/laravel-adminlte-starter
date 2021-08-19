@extends('layouts.main')

@section('title', 'Pengguna')

@section('breadcump')
    <div class="col-sm-6">
        <h1 class="m-0">{{ __('Pengguna') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Pengguna') }}</li>
            <li class="breadcrumb-item active">{{ __('Ubah') }}</li>
        </ol>
    </div>
@endsection

@section('main')
@if (session()->has('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Form ubah data Pengguna') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('backend.user._form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Ubah') }}
                        </button>
                        <a href="{{ route('backend.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times mr-2"></i>
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
                <hr>
                @can('ubah pengguna')
                <button class="btn btn-warning"  data-toggle="modal" data-target="#resetPassword">
                    <i class="fas fa-key mr-2"></i>
                    {{ __('Reset password') }}
                </button>
                @endcan
                @can('hapus pengguna')
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteUser">
                    <i class="fas fa-trash-alt mr-2"></i>
                    {{ __('Hapus pengguna') }}
                </button>
                @endcan
            </div>
        </div>
    </div>
</div>

@can('ubah pengguna')
{{-- Reset user password --}}
<div class="modal fade" id="resetPassword" tabindex="-1" aria-labelledby="resetPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetPasswordLabel">{{ __('Reset password pengguna') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.users.reset.password', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-info">
                        {{ __('Reset password pengguna ini? Password akan direset menjadi email pengguna ini') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key mr-2"></i>
                        {{ __('Reset') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endcan

@can('hapus pengguna')
{{-- Delete user --}}
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">{{ __('Hapus pengguna') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-danger">
                        {{ __('Hapus pengguna ini?') }}
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
