<div class="form-group">
    <label for="name">{{ __('Name*') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
        placeholder="Enter role name" value="{{ old('name', $role->name) }}">
    @error('name')
        <small class="error invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
