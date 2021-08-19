@extends('layouts.main')

@section('title', 'Kategori Pengumuman')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Kategori Pengumuman') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Kategori Pengumuman') }}</li>
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
    @can('ubah kategori pengumuman')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Form ubah kategori pengumuman') }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.announcement.category.update', $announcementCategory) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('backend.announcement-category._form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Ubah') }}
                        </button>
                    </div>
                </form>
                <hr>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                    <i class="fas fa-trash-alt mr-2"></i>
                    {{ __('Hapus kategori') }}
                </button>
            </div>
        </div>
    </div>
    @endcan
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Data kategori pengumuman') }}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Nama kategori') }}</th>
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($announcementCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('ubah kategori pengumuman')
                                    <a href="{{ route('backend.announcement.category.edit', $category) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit mr-2"></i>
                                        {{ __('Ubah') }}
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-muted text-center"><i>{{ __('Data kosong') }}</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 float-right">
                    {{ $announcementCategories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">{{ __('Hapus kategori') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.announcement.category.destroy', $announcementCategory) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-danger">
                        {{ __('Anda yakin menghapus kategori ini? Semua pengumuman dengan kategori ini akan ikut terhapus') }}
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
@endsection
