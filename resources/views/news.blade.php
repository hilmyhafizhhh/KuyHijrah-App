@extends('layouts.main')

@section('container')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600;700&display=swap');

        .news-section {
            background: linear-gradient(to bottom, #f0fdf4, #d1fae5, #fefce8);
            min-height: 96vh;
            padding: 7rem 1.25rem 2rem 1.25rem;
            font-family: 'Tajawal', sans-serif;
        }

        .card-title a {
            color: #166534;
        }

        .btn-primary {
            background-color: #16a34a;
            border-color: #16a34a;
        }

        .btn-primary:hover {
            background-color: #15803d;
            border-color: #15803d;
        }

        .btn-outline-primary {
            color: #16a34a;
            border-color: #16a34a;
        }

        .btn-outline-primary:hover {
            background-color: #16a34a;
            color: #fff;
        }

        .category-label {
            background-color: rgba(22, 101, 52, 0.8);
        }
    </style>

    <div class="news-section">
        <div class="container">
            <h1 class="mb-4 text-center fw-bold text-success">{{ $title }}</h1>

            {{-- Search Bar --}}
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                    <form action="/news">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('source'))
                            <input type="hidden" name="source" value="{{ request('source') }}">
                        @endif
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- News Content --}}
            @if ($news->count())
                {{-- First Highlighted News --}}
                <div class="card mb-5 shadow-lg border-0 rounded-4 overflow-hidden">
                    @if ($news[0]->image)
                        <div style="max-height: 400px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $news[0]->image) }}" class="img-fluid rounded mb-4"
                                alt="{{ $news[0]->category->name }}">
                        </div>
                    @else
                        <img src="https://picsum.photos/1200/400?{{ $news[0]->category->name }}" class="card-img-top"
                            alt="{{ $news[0]->category->name }}">
                    @endif

                    <div class="card-body text-center">
                        <h3 class="card-title mb-3">
                            <a href="/news/{{ $news[0]->slug }}"
                                class="text-decoration-none fw-semibold">{{ $news[0]->title }}</a>
                        </h3>
                        <p class="mb-2">
                            <small class="text-muted">
                                By <a href="/news?source={{ $news[0]->source->slug }}" class="text-decoration-none fw-medium">{{ $news[0]->source->name }}</a>
                                in <a href="/news?category={{ $news[0]->category->slug }}"
                                    class="text-decoration-none fw-medium">{{ $news[0]->category->name }}</a>
                                • {{ $news[0]->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text text-secondary">{{ $news[0]->excerpt }}</p>
                        <a href="/news/{{ $news[0]->slug }}"
                            class="btn btn-primary mt-3 px-4 py-2 rounded-pill">Read More</a>
                    </div>
                </div>

                {{-- Grid of Other News --}}
                <div class="row">
                    @foreach ($news->skip(1) as $article)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <div class="position-absolute px-3 py-2 text-white rounded-bottom-end category-label">
                                    <a href="/news?category={{ $article->category->slug }}"
                                        class="text-white text-decoration-none">{{ $article->category->name }}</a>
                                </div>

                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}"
                                        class="img-fluid mb-4" alt="{{ $article->category->name }}">
                                @else
                                    <img src="https://picsum.photos/500/400?{{ $article->category->name }}"
                                        class="card-img-top" alt="{{ $article->category->name }}">
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="/news/{{ $article->slug }}"
                                            class="text-decoration-none text-dark fw-semibold">{{ $article->title }}</a>
                                    </h5>
                                    <p class="mb-2">
                                        <small class="text-muted">
                                            By <a href="/news?source={{ $article->source->slug }}" class="text-decoration-none">{{ $article->source->name }}</a>
                                            • {{ $article->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text text-secondary">{{ $article->excerpt }}</p>
                                    <div class="mt-auto">
                                        <a href="/news/{{ $article->slug }}"
                                            class="btn btn-outline-primary rounded-pill mt-3 px-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center fs-4 text-muted">No news found.</p>
            @endif

            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
