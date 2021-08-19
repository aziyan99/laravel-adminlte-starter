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
        <li class="breadcrumb-item active">{{ __('Tambah galeri') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Form tambah Galeri') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="text-right mb-3">
                    <a href="{{ route('backend.galleries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <form action="{{ route('backend.galleries.store') }}" method="POST">
                    @csrf
                    @include('backend.gallery._form')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Simpan') }}
                        </button>
                        <a href="{{ route('backend.galleries.index') }}" class="btn btn-secondary">
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
