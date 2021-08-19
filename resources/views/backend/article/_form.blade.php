<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>{{ __('Judul') }}</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $article->title) }}">
            @error('title')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('Kategori') }}</label>
            <select name="article_category_id" class="form-control @error('article_category_id') is-invalid @enderror">
                @foreach ($articleCategories as $category)
                <option value="{{ $category->id }}"
                    {{ (old('article_category_id') == $category->id || $article->article_category_id == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
            @error('article_category_id')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('Thumbnail') }}</label>
            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
            @error('thumbnail')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label>{{ __('Isi artikel') }}</label>
            <textarea name="body" cols="30" rows="10" id="editor"
                class="form-control editor @error('body') is-invalid @enderror">{{ old('body', $article->body) }}</textarea>
            @error('body')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>
