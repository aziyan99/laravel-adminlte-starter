@extends('layouts.main')

@section('title', 'Artikel')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Artikel') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item">{{ __('Artikel') }}</li>
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
                <div class="card-title">
                    {{ __('Data artikel') }}
                </div>
            </div>
            <div class="card-body">
                @can('tambah artikel')
                <div class="text-right mb-3">
                    <a href="{{ route('backend.articles.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>
                        {{ __('Tambah artikel') }}
                    </a>
                </div>
                @endcan
                <div class="table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('Judul') }}</th>
                                <th>{{ __('Kategori') }}</th>
                                <th>{{ __('Views') }}</th>
                                @if(auth()->user()->hasRole('Super Admin'))
                                <th>{{ __('Penulis') }}</th>
                                @endif
                                <th>{{ __('Tanggal dibuat') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $article->category->name }}</span>
                                </td>
                                <td>{{ $article->views }}</td>
                                @if(auth()->user()->hasRole('Super Admin'))
                                <td>{{ $article->writer->name }}</td>
                                @endif
                                <td>{{ $article->created_at->diffForHumans() }}</td>
                                <td>
                                    @can('ubah artikel')
                                    <a href="{{ route('backend.articles.edit', $article) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit mr-2"></i>
                                        {{ __('Ubah') }}
                                    </a>
                                    @endcan
                                    @can('lihat artikel')
                                    <a href="{{ route('backend.articles.show', $article) }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye mr-2"></i>
                                        {{ __('Detail') }}
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted"><i>{{ __('Data kosong') }}</i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 float-right">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
