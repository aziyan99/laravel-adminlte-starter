@extends('layouts.main')

@section('title', 'Artikel')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Dashboard') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Artikel') }}</li>
        <li class="breadcrumb-item active">{{ __('Detail') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Detail data artikel') }}
                </div>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>{{ __('Judul') }}</th>
                            <td>{{ $article->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Kategori') }}</th>
                            <td>{{ $article->category->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Penulis') }}</th>
                            <td>{{ $article->writer->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Views') }}</th>
                            <td>{{ $article->views }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Tanggal dibuat') }}</th>
                            <td>{{ $article->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Thumbnail') }}</th>
                            <td>
                                <a href="{{ asset('storage') . "/" . $article->thumbnail }}" target="_blank">
                                    <img src="{{ asset('storage') . "/" . $article->thumbnail }}" alt="img"
                                        class="img-thumbnail" width="100">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Isi artikel') }}</th>
                            <td>{!! $article->body !!}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        @can('edit artikel')
                        <a href="{{ route('backend.articles.edit', $article) }}" class="btn btn-warning">
                            <i class="fas fa-edit mr-2"></i>
                            {{ __('Ubah') }}
                        </a>
                        @endcan
                        @can('hapus artikel')
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                            <i class="fas fa-trash-alt mr-2"></i>
                            {{ __('Hapus artikel') }}
                        </button>
                        @endcan
                    </div>
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
                <h5 class="modal-title" id="modalDeleteLabel">{{ __('Hapus artikel') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.articles.destroy', $article) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-danger">
                        {{ __('Anda yakin menghapus artikel ini?') }}
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
