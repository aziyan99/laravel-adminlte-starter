@extends('layouts.admin')

@section('title', 'Profile')

@section('main')
    <div class="row">
        <div class="col-12 mt-3">
            @include('layouts.shared.alert')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-primary card-outline mt-3">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center mt-3">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->email }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Registered at</b> <a class="float-right">{{ $user->created_at->format('M d, Y') }}</a>
                        </li>
                    </ul>
                    @permission('profile.update')
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>
@endsection
