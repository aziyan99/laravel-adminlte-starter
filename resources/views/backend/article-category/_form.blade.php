<div class="form-group">
    <label>{{ __('Nama kategori') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $articleCategory->name) }}">
    @error('name')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
