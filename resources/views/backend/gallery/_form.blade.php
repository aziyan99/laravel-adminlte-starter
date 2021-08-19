<div class="form-group">
    <label>{{ __('Nama galeri') }}</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $gallery->name) }}">
    @error('name')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
