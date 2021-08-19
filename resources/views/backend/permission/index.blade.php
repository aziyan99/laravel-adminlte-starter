@extends('layouts.main')

@section('title', 'Permission')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Permission') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Permission') }}</li>
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
                    {{ __('Data Permission') }}
                </h3>
            </div>
            <div class="card-body">
                @if (config('app.debug') == true)
                @can('tambah permission')
                <div class="text-right mb-3">
                    <a href="{{ route('backend.permissions.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>
                        {{ __('Tambah Permission') }}
                    </a>
                </div>
                @endcan
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Nama permission') }}</th>
                                <th>{{ __('Guard name') }}</th>
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at->diffForHumans() }}</td>
                                <td>
                                    @if (config('app.debug') == true)
                                    @can('ubah permission')
                                    <a href="{{ route('backend.permissions.edit', $permission->id) }}"
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
                                    <i>{{ __('Data permission kosong') }}</i>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mb-3 mt-3 float-right">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
