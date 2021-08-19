@extends('layouts.main')

@section('title', 'Pengumuman')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Pengumuman') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Pengumuman') }}</li>
        <li class="breadcrumb-item active">{{ __('Tambah pengumuman') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Form tambah Pengumuman') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.announcements.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.announcements.store') }}" method="POST">
                    @csrf
                    @include('backend.announcement._form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Simpan') }}
                        </button>
                        <a href="{{ route('backend.announcements.index') }}" class="btn btn-secondary">
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
