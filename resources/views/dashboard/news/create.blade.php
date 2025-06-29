@extends('dashboard.layouts.main')

{{-- Style tambahan --}}
<style>
    label.form-label {
        font-weight: 500;
        color: #374151;
    }

    input.form-control,
    select.form-select,
    .trix-content {
        background-color: #f9fafb;
        border: 1px solid #d1d5db;
        color: #374151;
    }

    input.form-control:focus,
    select.form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
    }

    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545;
        background-color: #fff5f5;
    }

    .invalid-feedback,
    .text-danger {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .img-preview {
        max-height: 240px;
        object-fit: contain;
        border: 1px solid #d1d5db;
        padding: 4px;
        background-color: #f8fafc;
        display: block;
    }

    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New News</h1>
    </div>

    <div class="col-lg-10">
        <form action="/dashboard/news" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                {{-- LEFT --}}
                <div class="col-md-6">
                    {{-- Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               required
                               autofocus
                               value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text"
                               class="form-control @error('slug') is-invalid @enderror"
                               id="slug"
                               name="slug"
                               placeholder="Auto-generated slug"
                               readonly
                               required
                               value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror"
                                name="category_id"
                                id="category"
                                required>
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Source --}}
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <select class="form-select @error('source_id') is-invalid @enderror"
                                name="source_id"
                                id="source"
                                required>
                            <option value="" disabled {{ old('source_id') ? '' : 'selected' }}>-- Select Source --</option>
                            @foreach ($source as $s)
                                <option value="{{ $s->id }}" {{ old('source_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('source_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-md-6">
                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">News Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-12">
                        <input class="form-control @error('image') is-invalid @enderror"
                               type="file"
                               id="image"
                               name="image"
                               onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- FULL WIDTH --}}
                <div class="col-12">
                    {{-- Body --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create News</button>
        </form>
    </div>

    {{-- Script --}}
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('input', function () {
            fetch('/dashboard/news/checkSlug?title=' + encodeURIComponent(title.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            if (image.files && image.files[0]) {
                const ofReader = new FileReader();
                ofReader.onload = function (e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                ofReader.readAsDataURL(image.files[0]);
            }
        }
    </script>
@endsection
