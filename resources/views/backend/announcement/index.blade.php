@extends('layouts.main')

@section('title', 'Pengumuman')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Pengumuman') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Pengumuman') }}</li>
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
                    {{ __('Data Pengumuman') }}
                </h3>
            </div>
            <div class="card-body">
                @can('tambah pengumuman')
                <div class="text-right mb-3">
                    <a href="{{ route('backend.announcements.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>
                        {{ __('Tambah Pengumuman') }}
                    </a>
                </div>
                @endcan
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Judul') }}</th>
                                <th>{{ __('Kategori') }}</th>
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement->id }}</td>
                                <td>{{ $announcement->title }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $announcement->category->name }}</span>
                                </td>
                                <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('ubah pengumuman')
                                    <a href="{{ route('backend.announcements.edit', $announcement) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit mr-2"></i>
                                        {{ __('Ubah') }}
                                    </a>
                                    @endcan
                                    @can('lihat pengumuman')
                                    <a href="{{ route('backend.announcements.show', $announcement) }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye mr-2"></i>
                                        {{ __('Detail') }}
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <i>{{ __('Data pengumuman kosong') }}</i>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 float-right">
                    {{ $announcements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
