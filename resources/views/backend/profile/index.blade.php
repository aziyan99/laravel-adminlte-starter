@extends('layouts.main')

@section('title', 'Profile')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Profile') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Profile') }}</li>
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
@if (session()->has('error'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('danger') }}
        </div>
    </div>
</div>
@endif
@error('password')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Password gagal diperbarui
        </div>
    </div>
</div>
@enderror
<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('storage') . "/" . $profile->image }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $profile->name }}</h3>

                <p class="text-muted text-center">{{ $profile->email }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>{{ __('No.Hp') }}</b> <a class="float-right">{{ $profile->phone_number }}</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateImage">
                    <i class="fas fa-image mr-2"></i>
                    {{ __('Ubah gambar profil') }}
                </button>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('Tentang saya') }}</h3>
            </div>
            <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> {{ __('Alamat') }}</strong>
                <p class="text-muted">{{ $profile->address }}</p>
                <hr>
                <strong><i class="fas fa-calendar mr-1"></i> {{ __('Pengguna sejak') }}</strong>
                <p class="text-muted">
                    {{ $profile->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#selfInformation"
                            data-toggle="tab">{{ __('Informasi Pribadi') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">{{ __('Password') }}</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="selfInformation">
                        <form action="{{ route('backend.profile.update.information', $profile->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $profile->id }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Nama Lengkap') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $profile->name) }}">
                                        @error('name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Jenis Kelamin') }}</label>
                                        <select name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="male"
                                                {{ ($profile->gender == 'male' || old('gender') == 'male') ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="female"
                                                {{ ($profile->gender == 'female' || old('gender') == 'female') ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Tanggal lahir') }}</label>
                                        <input type="date"
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            name="birth_date" value="{{ old('birth_date', $profile->birth_date) }}">
                                        @error('birth_date')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Tempat lahir') }}</label>
                                        <textarea name="birth_place" cols="30" rows="2"
                                            class="form-control @error('birth_place') is-invalid @enderror">{{ old('birth_place', $profile->birth_place) }}</textarea>
                                        @error('birth_place')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $profile->email) }}">
                                        @error('email')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Nomor Hp') }}</label>
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number"
                                            value="{{ old('phone_number', $profile->phone_number) }}">
                                        @error('phone_number')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Alamat') }}</label>
                                        <textarea name="address" cols="30" rows="2"
                                            class="form-control @error('address') is-invalid @enderror">{{ old('address', $profile->address) }}</textarea>
                                        @error('address')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-save mr-2"></i>
                                        {{ __('Ubah') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="password">
                        <form action="{{ route('backend.profile.update.password', $profile->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Password baru') }}</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" required>
                                        @error('password')
                                        <small class="invalid-feedbcak" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('Ulangi password baru') }}</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            required>
                                        @error('password_confirmation')
                                        <small class="invalid-feedbcak" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-key mr-2"></i>
                                            {{ __('Update passowrd') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateImage" tabindex="-1" aria-labelledby="updateImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateImageLabel">{{ __('Update gambar profil') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('backend.profile.update.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>
                        {{ __('Batal') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        {{ __('Simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
