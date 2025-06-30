@extends('dashboard.layouts.main')

<style>
    .category-content {
        font-size: 1.05rem;
        color: #4b5563;
        line-height: 1.6;
    }

    .category-content p {
        margin-bottom: 0.75rem;
    }

    .category-content h1,
    .category-content h2,
    .category-content h3 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    .category-content ul,
    .category-content ol {
        margin-bottom: 1rem;
        padding-left: 1.25rem;
    }

    .category-content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
    }
</style>

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">

            <!-- Title -->
            <h2 class="mb-3">{{ $category->name }}</h2>

            <!-- Action Buttons -->
            <a href="/dashboard/categories" class="btn btn-success mb-2">
                <span data-feather="arrow-left"></span> Back to All Categories
            </a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning mb-2">
                <span data-feather="edit"></span> Edit
            </a>

            <!-- Trigger Delete Modal -->
            <button type="button"
                class="btn btn-danger mb-2"
                data-bs-toggle="modal"
                data-bs-target="#confirmDeleteModal"
                data-action="/dashboard/categories/{{ $category->slug }}">
                <span data-feather="x-circle"></span> Delete
            </button>

            <!-- Image -->
            @if ($category->image)
                <div class="my-3" style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="img-fluid rounded"
                         alt="{{ $category->name }}">
                </div>
            @else
                <div class="my-3">
                    <img src="https://picsum.photos/1200/400?{{ $category->name }}"
                         class="img-fluid rounded"
                         alt="{{ $category->name }}">
                </div>
            @endif

        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
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

<!-- Script: Set action URL dynamically -->
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