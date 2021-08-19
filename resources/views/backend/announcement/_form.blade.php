<div class="form-group">
    <label>{{ __('Judul pengumuman') }}</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $announcement->title) }}">
    @error('title')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>{{ __('Kategori') }}</label>
    <select name="announcement_category_id"
        class="form-control @error('announcement_category_id') is-invalid @enderror">
        @foreach ($announcementCategories as $category)
        <option value="{{ $category->id }}"
            {{ (old('announcement_category_id') == $category->id || $announcement->announcement_category_id == $category->id) ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
        @endforeach
    </select>
    @error('announcement_category_id')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>{{ __('Pengumuman') }}</label>
    <textarea name="body" cols="30" rows="8" id="editor"
        class="form-control @error('body') is-invalid @enderror">{{ old('body', $announcement->body) }}</textarea>
    @error('body')
    <small class="invalid-feedback" role="alert">{{ $message }}</small>
    @enderror
</div>
