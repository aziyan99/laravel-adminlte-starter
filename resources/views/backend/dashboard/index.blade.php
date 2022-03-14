@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcump')
<div class="col-sm-6">
    <h1 class="m-0">{{ __('Dashboard') }}</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
    </ol>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $user_count }}</h3>
                <p>{{ __('Pengguna') }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            @can('lihat pengguna')
            <a href="{{ route('backend.users.index') }}" class="small-box-footer">{{ __('Detail') }} <i class="fas fa-arrow-circle-right"></i></a>
            @endcan
        </div>
    </div>
</div>
@endsection
