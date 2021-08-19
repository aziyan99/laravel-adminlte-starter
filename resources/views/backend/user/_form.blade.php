<div class="form-group">
    <label>{{ __('Nama') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $user->name) }}">
    @error('name')
    <small class="invalid-feedback" role="alert">
        {{ $message }}
    </small>
    @enderror
</div>
<div class="form-group">
    <label>{{ __('Email') }}</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $user->email) }}">
    @error('email')
    <small class="invalid-feedback" role="alert">
        {{ $message }}
    </small>
    @enderror
</div>
<div class="form-group">
    <label>{{ __('Role') }}</label>
    <table class="table table-sm table-bordered table-hover">
        <thead>
            <tr>
                <th>{{ __('Nama role') }}</th>
                <th>{{ __('Is active?') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    <input type="checkbox" class="" value="{{ $role->id }}" name="roles[]"
                    {{ (in_array($role->id, $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
