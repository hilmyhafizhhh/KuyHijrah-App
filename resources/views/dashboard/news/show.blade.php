@extends('dashboard.layouts.main')

    <style>
        .news-content {
            font-size: 1.05rem;
            color: #4b5563; /* Tailwind gray-700 */
            line-height: 1.6;
        }

        .news-content p {
            margin-bottom: 0.75rem;
        }

        .news-content h1,
        .news-content h2,
        .news-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .news-content ul,
        .news-content ol {
            margin-bottom: 1rem;
            padding-left: 1.25rem;
        }

        .news-content img {
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
                <h2 class="mb-3">{{ $news->title }}</h2>

                <!-- Action Buttons -->
                <a href="/dashboard/news" class="btn btn-success mb-2">
                    <span data-feather="arrow-left"></span> Back to All News
                </a>
                <a href="/dashboard/news/{{ $news->slug }}/edit" class="btn btn-warning mb-2">
                    <span data-feather="edit"></span> Edit
                </a>
                <form action="/dashboard/news/{{ $news->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')">
                        <span data-feather="x-circle"></span> Delete
                    </button>
                </form>

                <!-- Image -->
                @if ($news->image)
                    <div class="my-3" style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $news->image) }}"
                             class="img-fluid rounded"
                             alt="{{ $news->category->name }}">
                    </div>
                @else
                    <div class="my-3">
                        <img src="https://picsum.photos/1200/400?{{ $news->category->name }}"
                             class="img-fluid rounded"
                             alt="{{ $news->category->name }}">
                    </div>
                @endif

                <!-- Content -->
                <article class="news-content">
                    {!! $news->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
