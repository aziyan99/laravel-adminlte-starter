<div class="form-group">
    <label>{{ __('Nama permission') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $permission->name) }}">
    @error('name')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>{{ __('Guard name') }}</label>
    <input type="text" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror" value="web"
        readonly>
    @error('guard_name')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
