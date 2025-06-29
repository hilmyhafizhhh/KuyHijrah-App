@extends('dashboard.layouts.main')

{{-- Style Tambahan --}}
<style>
    label.form-label {
        font-weight: 500;
        color: #374151;
    }

    input.form-control {
        background-color: #f9fafb;
        border: 1px solid #d1d5db;
        color: #374151;
    }

    input.form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff5f5;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .img-preview {
        max-height: 240px;
        object-fit: contain;
        border: 1px solid #d1d5db;
        padding: 4px;
        background-color: #f8fafc;
        display: block;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }
</style>

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>

    <div class="col-lg-6">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       name="name"
                       required
                       autofocus
                       value="{{ old('name', $category->name) }}">
                @error('name')
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
                       readonly
                       required
                       value="{{ old('slug', $category->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="hidden" name="oldImage" value="{{ $category->image }}">

                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="img-preview img-fluid mb-3 col-sm-12 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-12">
                @endif

                <input class="form-control @error('image') is-invalid @enderror"
                       type="file"
                       id="image"
                       name="image"
                       onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

    {{-- Script --}}
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('input', function () {
            fetch('/dashboard/categories/checkSlug?name=' + encodeURIComponent(name.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug);
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
