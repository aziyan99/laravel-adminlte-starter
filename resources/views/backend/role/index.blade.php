@extends('layouts.main')

@section('title', 'Role')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Role') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Role') }}</li>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Data Role') }}
                </h3>
            </div>
            <div class="card-body">
                @can('tambah role')
                <div class="text-right mb-3">
                    <a href="{{ route('backend.roles.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>
                        {{ __('Tambah Role') }}
                    </a>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Nama role') }}</th>
                                <th>{{ __('Guard name') }}</th>
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($role->name == "Super Admin")
                                    <i class="text-muted">{{ __('Default role') }}</i>
                                    @else
                                    @can('ubah role')
                                    <a href="{{ route('backend.roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit mr-2"></i>
                                        {{ __('Ubah') }}
                                    </a>
                                    @endcan
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <i>{{ __('Data role kosong') }}</i>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
