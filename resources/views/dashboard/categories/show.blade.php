@extends('dashboard.layouts.main')

{{-- Optional Custom Style --}}
<style>
    .category-content {
        font-size: 1.05rem;
        color: #4b5563;
        line-height: 1.6;
    }

    .category-content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 4px;
        background-color: #f9fafb;
    }

    .btn + .btn {
        margin-left: 0.5rem;
    }
</style>

@section('container')
<div class="col-lg-6">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $category->name }}</h1>
    </div>

    {{-- Action Buttons --}}
    <div class="mb-3">
        <a href="/dashboard/categories" class="btn btn-sm btn-success">
            <span data-feather="arrow-left"></span> Back
        </a>
        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-sm btn-warning">
            <span data-feather="edit"></span> Edit
        </a>
        <button type="button"
                class="btn btn-sm btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#confirmDeleteModal"
                data-action="/dashboard/categories/{{ $category->slug }}">
            <span data-feather="x-circle"></span> Delete
        </button>
    </div>

    {{-- Category Image --}}
    <div class="category-content">
        @if ($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
        @else
            <img src="https://picsum.photos/800/300?{{ $category->name }}" alt="Placeholder">
        @endif
    </div>
</div>

{{-- Modal Confirm Delete --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script: Modal delete dynamic action --}}
<script>
    const deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const action = button.getAttribute('data-action');
        const form = document.getElementById('deleteForm');
        form.setAttribute('action', action);
    });
</script>
@endsection
