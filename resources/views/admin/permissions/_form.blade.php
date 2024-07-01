<div class="form-group">
    <label for="name">{{ __('Name*') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
        placeholder="Enter permission name" value="{{ old('name', $permission->name) }}">
    @error('name')
        <small class="error invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
