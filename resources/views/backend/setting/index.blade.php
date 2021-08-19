@extends('layouts.main')

@section('title', 'Pengaturan')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Pengaturan') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Pengaturan') }}</li>
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{ __('Ubah logo') }}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.setting.update.logo', $setting) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('Logo baru') }}</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                        @error('logo')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        @can('ubah pengaturan')
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-image mr-2"></i>
                            {{ __('Ubah logo') }}
                        </button>
                        @endcan
                    </div>
                </form>
                <hr>
                <h5>{{ __('Logo sebelumnya') }}</h5>
                <a href="{{ asset('storage') . "/" . $setting->logo }}" target="_blank">
                    <img src="{{ asset('storage') . "/" . $setting->logo }}" alt="logo" class="img-thumbnail"
                        width="250">
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Ubah informasi') }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.setting.update.information', $setting) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>{{ __('Nama') }}</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $setting->name) }}">
                        @error('name')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $setting->email) }}">
                        @error('email')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('No.hp') }}</label>
                        <input type="text" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number', $setting->phone_number) }}">
                        @error('phone_number')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('Alamat') }}</label>
                        <textarea name="address" cols="30" rows="3"
                            class="form-control @error('address') is-invalid @enderror">{{ old('address', $setting->address) }}</textarea>
                        @error('address')
                        <small class="invalid-feedback" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('Facebook') }}</label>
                                <input type="text" name="facebook"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    value="{{ old('facebook', $setting->facebook) }}">
                                @error('facebook')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('Youtube') }}</label>
                                <input type="text" name="youtube"
                                    class="form-control @error('youtube') is-invalid @enderror"
                                    value="{{ old('youtube', $setting->youtube) }}">
                                @error('youtube')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>{{ __('Instagram') }}</label>
                                <input type="text" name="instagram"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    value="{{ old('instagram', $setting->instagram) }}">
                                @error('instagram')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{ __('Twitter') }}</label>
                                <input type="text" name="twitter"
                                    class="form-control @error('twitter') is-invalid @enderror"
                                    value="{{ old('twitter', $setting->twitter) }}">
                                @error('twitter')
                                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        @can('ubah pengaturan')
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Ubah') }}
                        </button>
                        @endcan
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
