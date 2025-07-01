@extends('dashboard.layouts.main')

{{-- Tambahan style untuk modal agar selaras dengan tema --}}
<style>
    .modal-header {
        background-color: #f3f4f6;
        border-bottom: 1px solid #e5e7eb;
    }

    .modal-title {
        color: #374151;
        font-weight: 600;
    }

    .modal-body {
        color: #4b5563;
    }

    .modal-footer .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .modal-footer .btn-danger:hover {
        background-color: #bb2d3b;
    }

    .modal-footer .btn-secondary {
        background-color: #e5e7eb;
        color: #374151;
        border: none;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #d1d5db;
    }

    input.form-control,
    select.form-select {
        background-color: #f9fafb;
        border: 1px solid #d1d5db;
        color: #374151;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input.form-control:focus,
    select.form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
        background-color: #ffffff;
    }

    .input-group .btn-outline-primary {
        border-color: #0d6efd;
        color: #0d6efd;
    }

    .input-group .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }
</style>

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">News Categories</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-lg-8">

    {{-- Search & Filter --}}
    <form method="GET" class="row row-cols-lg-auto g-3 align-items-center mb-4">
        <div class="col-12">
            <input type="text" name="search" class="form-control" placeholder="Search category..." value="{{ request('search') }}">
        </div>
        <div class="col-12">
            <select name="sort" class="form-select">
                <option value="">Sort by</option>
                <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A - Z</option>
                <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z - A</option>
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Apply</button>
        </div>
    </form>

    {{-- Tombol Create --}}
    <div class="mb-3">
        <a href="/dashboard/categories/create" class="btn btn-primary">Create New Category</a>
    </div>

    {{-- Tabel Kategori --}}
    @if ($categories->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-striped table-sm align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col" style="width: 160px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info text-decoration-none">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning text-decoration-none">
                                    <span data-feather="edit"></span>
                                </a>
                                <button type="button"
                                        class="badge bg-danger border-0"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="/dashboard/categories/{{ $category->slug }}">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-secondary mt-3" role="alert">
            No categories found.
        </div>
    @endif

</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Modal --}}
<script>
    const deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const action = button.getAttribute('data-action');
        const form = document.getElementById('deleteForm');
        form.setAttribute('action', action);
    });

    document.addEventListener('DOMContentLoaded', function () {
        feather.replace();
    });
</script>
@endsection
