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
        <li class="breadcrumb-item active">{{ __('Ubah') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Form ubah artikel') }}
                </div>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('backend.article._form')
                    <div class="form-group">
                        <div><b>{{ __('Thumbnail sebelumnya') }}</b></div>
                        <a href="{{ asset('storage') . "/" . $article->thumbnail }}" target="_blank">
                            <img src="{{ asset('storage') . "/" . $article->thumbnail }}" alt="img" class="img-thumbnail" width="100">
                        </a>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Ubah') }}
                        </button>
                        <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times mr-2"></i>
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
                <hr>
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
@push('css')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
@endpush
@push('js')
<script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('#editor').summernote({
            height: 500
        });
    });
</script>
@endpush
