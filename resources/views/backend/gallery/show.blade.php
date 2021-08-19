@extends('layouts.main')

@section('title', 'Galeri')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Galeri') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Galeri') }}</li>
        <li class="breadcrumb-item active">{{ __('Detail Galeri') }}</li>
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
                    {{ __('Detail Galeri') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.galleries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>{{ __('Nama galeri') }}</th>
                            <td>{{ $gallery->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Jumlah gambar') }}</th>
                            <td>
                                <span class="badge badge-info">{{ $gallery->image_count }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Tanggal dibuat') }}</th>
                            <td>{{ $gallery->created_at->diffForHumans() }}</td>
                        </tr>
                    </table>
                </div>
                @can('ubah galeri')
                <a href="{{ route('backend.galleries.edit', $gallery) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i>
                    {{ __('Ubah') }}
                </a>
                @endcan
                @can('hapus galeri')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                    <i class="fas fa-trash-alt mr-2"></i>
                    {{ __('Hapus galeri') }}
                </button>
                @endcan
            </div>
        </div>
    </div>
</div>
<div class="row">
    @can('ubah galeri')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Tambah gambar baru') }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.galleries.details.store', $gallery) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Gambar') }}</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            <i class="fas fa-image mr-2"></i>
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">{{ __('Gambar digaleri ini') }}</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Gambar') }}</th>
                                <th>{{ __('Tanggal ditambahkan') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>
                                    <a href="{{ asset('storage') . "/" . $detail->image }}" target="_blank">
                                        <img src="{{ asset('storage') . "/" . $detail->image }}" alt="img"
                                            class="img-thhumbnail" width="100">
                                    </a>
                                </td>
                                <td>{{ $detail->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('ubah galeri')
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('backend.galleries.details.destroy', $detail) }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('delete{{ $detail->id }}').submit();">
                                        <i class="fas fa-trash-alt mr-2"></i>
                                        {{ __('Hapus') }}
                                    </a>

                                    <form id="delete{{ $detail->id }}"
                                        action="{{ route('backend.galleries.details.destroy', $detail) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-muted text-center"><i>{{ __('Tidak ada gambar') }}</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 float-right">
                    {{ $details->links() }}
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
                <h5 class="modal-title" id="modalDeleteLabel">{{ __('Hapus galeri') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.galleries.destroy', $gallery) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-danger">
                        {{ __('Anda yakin menghapus galeri ini? Semua gambar dengan galeri ini akan ikut terhapus') }}
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
