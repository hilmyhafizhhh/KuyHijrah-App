@extends('layouts.main')

@section('container')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600;700&display=swap');

        .article-section {
            /* background: linear-gradient(to bottom, #fefce8, #d1fae5, #f0fdf4); */
            background: linear-gradient(to bottom right, #e8f5e9, #f0fdf4);
            min-height: 96vh;
            padding: 6rem 1.25rem 3rem 1.25rem;
            font-family: 'Tajawal', sans-serif;
        }

        .article-title {
            color: #166534;
        }

        .article-meta {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .article-body {
            line-height: 1.8;
            font-size: 1.125rem;
            color: #374151;
            border-left: 4px solid #16a34a;
            padding-left: 1rem;
            margin-top: 1.5rem;
        }

        .btn-outline-primary {
            color: #166534;
            border-color: #166534;
        }

        .btn-outline-primary:hover {
            background-color: #166534;
            color: white;
        }
    </style>

    <div class="article-section">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                {{-- Judul --}}
                <h2 class="mb-3 fw-bold article-title">{{ $article->title }}</h2>

                {{-- Meta --}}
                <p class="article-meta mb-4">
                    By <a href="/news?source={{ $article->source->slug }}" class="text-decoration-none text-success">{{ $article->source->name }}</a>
                    in <a href="/news?category={{ $article->category->slug }}"
                        class="text-decoration-none text-success">{{ $article->category->name }}</a>
                    • {{ $article->created_at->diffForHumans() }}
                </p>

                {{-- Gambar --}}
                @if ($article->image)
                    <div style="max-height: 400px; overflow: hidden;" class="mb-4 rounded">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded shadow-sm"
                            alt="{{ $article->category->name }}">
                    </div>
                @else
                    <img src="https://picsum.photos/1200/400?{{ $article->category->name }}"
                        class="img-fluid rounded mb-4 shadow-sm"
                        alt="{{ $article->category->name }}">
                @endif

                {{-- Konten --}}
                <article class="article-body">
                    {!! $article->body !!}
                </article>

                {{-- Tombol back --}}
                <a href="/news" class="btn btn-outline-primary mt-5 rounded-pill px-4">
                    ← Back to News
                </a>
            </div>
        </div>
    </div>
@endsection
