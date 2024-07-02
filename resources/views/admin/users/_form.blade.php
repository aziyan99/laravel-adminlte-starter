<div class="form-group">
    <label for="name">{{ __('Name*') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
        placeholder="Enter user fullname" value="{{ old('name', $user->name) }}">
    @error('name')
        <small class="error invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="email">{{ __('Email*') }}</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
        placeholder="Enter user email" value="{{ old('email', $user->email) }}">
    @error('email')
        <small class="error invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="roles">{{ __('Roles') }}</label>
    <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
    @error('roles')
        <small class="error invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
