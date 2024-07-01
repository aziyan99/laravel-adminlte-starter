@extends('layouts.admin')

@section('title', 'Permissions')

@section('main')
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            <a href="{{ route('admin.permissions.create') }}" class="mt-3 btn btn-primary float-right">
                <i class="fas fa-plus mr-1"></i>
                {{ __('New Permissions') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            @include('layouts.shared.alert')
        </div>
    </div>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Permissions</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables" data-route="{{ route('admin.permissions.index') }}"
                            data-configs="{{ json_encode($tableConfigs) }}" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    @for ($i = 0; $i < count($tableConfigs); $i++)
                                        <th>{{ $tableConfigs[$i]['name'] }}</th>
                                    @endfor
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="delete-form">
            </div>
        </div>
    </div>
@endsection

