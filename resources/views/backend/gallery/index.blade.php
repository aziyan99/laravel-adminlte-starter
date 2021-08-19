@extends('layouts.main')

@section('title', 'Galeri')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Galeri') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Galeri') }}</li>
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
                    {{ __('Data Galeri') }}
                </h3>
            </div>
            <div class="card-body">
                @can('tambah galeri')
                <div class="text-right mb-3">
                    <a href="{{ route('backend.galleries.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>
                        {{ __('Tambah Galeri') }}
                    </a>
                </div>
                @endcan
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Nama galeri') }}</th>
                                <th>{{ __('Jumlah gambar') }}</th>
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td>{{ $gallery->name }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $gallery->image_count }}</span>
                                </td>
                                <td>{{ $gallery->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('ubah galeri')
                                    <a href="{{ route('backend.galleries.edit', $gallery) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit mr-2"></i>
                                        {{ __('Ubah') }}
                                    </a>
                                    @endcan
                                    @can('lihat galeri')
                                    <a href="{{ route('backend.galleries.show', $gallery) }}"
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
                                    <i>{{ __('Data galeri kosong') }}</i>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 float-right">
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
