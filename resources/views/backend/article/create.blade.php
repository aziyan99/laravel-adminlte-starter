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
        <li class="breadcrumb-item active">{{ __('Tambah') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Form tambah artikel') }}
                </div>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('backend.article._form')
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Simpan') }}
                        </button>
                        <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times mr-2"></i>
                            {{ __('Batal') }}
                        </a>
                    </div>
                </form>
            </div>
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
