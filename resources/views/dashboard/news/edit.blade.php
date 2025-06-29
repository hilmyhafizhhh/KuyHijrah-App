@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit News</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/news/{{ $news->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror" id="title" name="title" required autofocus value="{{ old('title', $news->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid
                @enderror" id="slug" name="slug" placeholder="Auto-generated slug" readonly required
                    value="{{ old('slug', $news->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category" required>
                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                        -- Select Category --
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a category.
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">news Image</label>
                <input type="hidden" name="oldImage" value="{{ $news->image }}">

                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid
                @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="source" class="form-label">Source</label>
                <select class="form-select" name="source_id" id="source" required>
                    <option value="" disabled {{ old('source_id') ? '' : 'selected' }}>
                        -- Select source --
                    </option>
                    @foreach ($source as $s)
                        <option value="{{ $s->id }}" {{ old('source_id', $news->source_id) == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a source.
                </div>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $news->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update news</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('input', function () {
            fetch('/dashboard/news/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function (e) { e.preventDefault() });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>
@endsection