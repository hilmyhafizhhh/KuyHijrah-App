@extends('dashboard.layouts.main')

<style>
    .news-content {
        font-size: 1.05rem;
        color: #374151; /* gray-700 */
        line-height: 1.75;
    }

    .news-content p {
        margin-bottom: 1rem;
    }

    .news-content h1,
    .news-content h2,
    .news-content h3 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #111827; /* gray-900 */
    }

    .news-content ul,
    .news-content ol {
        padding-left: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .news-content img {
        max-width: 100%;
        height: auto;
        margin: 1rem 0;
        border-radius: 0.5rem;
    }
</style>

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">

                <!-- Title -->
                <h2 class="mb-3">{{ $news->title }}</h2>

                <!-- Action Buttons -->
                <a href="/dashboard/news" class="btn btn-success mb-2">
                    <span data-feather="arrow-left"></span> Back to All News
                </a>
                <a href="/dashboard/news/{{ $news->slug }}/edit" class="btn btn-warning mb-2">
                    <span data-feather="edit"></span> Edit
                </a>

                <!-- Delete Button (Triggers Modal) -->
                <button type="button"
                    class="btn btn-danger mb-2"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal"
                    data-action="/dashboard/news/{{ $news->slug }}">
                    <span data-feather="x-circle"></span> Delete
                </button>

                <!-- Image -->
                @if ($news->image)
                    <div class="my-3" style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $news->image) }}"
                             class="img-fluid rounded"
                             alt="{{ $news->title }}">
                    </div>
                @else
                    <div class="my-3">
                        <img src="https://picsum.photos/1200/400?{{ $news->title }}"
                             class="img-fluid rounded"
                             alt="{{ $news->title }}">
                    </div>
                @endif

                <!-- Body Content -->
                <article class="news-content my-4">
                    {!! $news->body !!}
                </article>
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
                        Are you sure you want to delete this news?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to set dynamic form action -->
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
