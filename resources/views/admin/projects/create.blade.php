@extends('layouts.admin')

@section('content')
    <h1>Create Project</h1>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                required maxlength="150" minlength="3">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <div class="media me-4">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="live_site">Sito live</label>
            <input type="text" class="form-control @error('live_site') is-invalid @enderror" name="live_site" id="live_site"
                required maxlength="150" minlength="3">
            @error('live_site')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="git_repository">Repo Github</label>
            <input type="text" class="form-control @error('git_repository') is-invalid @enderror" name="git_repository" id="git_repository"
                required maxlength="150" minlength="3">
            @error('git_repository')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <p>Seleziona i Tag:</p>
            @foreach ($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                    <label for="" class="form-check-label">{{ $tag->name }}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
