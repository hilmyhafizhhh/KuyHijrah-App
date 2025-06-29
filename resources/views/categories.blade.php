@extends('layouts.main')

@section('container')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600;700&display=swap');

        .categories-section {
            background: linear-gradient(to bottom, #f0fdf4, #d1fae5, #fefce8);
            min-height: 96vh;
            padding: 7rem 1.25rem 1.5rem 1.25rem;
            font-family: 'Tajawal', sans-serif;
        }

        .category-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.03);
            z-index: 2;
        }

        .category-card .card {
            border-radius: 1rem;
            overflow: hidden;
            border: none;
            background-color: transparent;
        }

        .category-card .card-img {
            object-fit: cover;
            height: 300px;
            filter: brightness(0.8);
        }

        .category-card .card-title-overlay {
            background: rgba(22, 101, 52, 0.6); /* Dark green transparent */
            backdrop-filter: blur(2px);
            color: #fff;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .category-card .card-title-overlay h5 {
            font-size: 1.5rem;
        }

        h1 {
            color: #166534;
            font-weight: 700;
        }
    </style>

    <div class="categories-section">
        <div class="container">
            <h1 class="mb-5 text-center">{{ $title }}</h1>
            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="category-card col-md-4">
                        <a href="/news?category={{ $category->slug }}" class="text-decoration-none text-white">
                            <div class="card shadow-sm">
                                @if ($category->image)    
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img"
                                            alt="{{ $category->name }}">
                                        <div
                                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center card-title-overlay">
                                            <h5 class="text-white text-center m-0">{{ $category->name }}</h5>
                                        </div>
                                    </div>
                                @else
                                    <div class="position-relative">
                                        <img src="https://picsum.photos/500/500?{{ $category->name }}" class="card-img"
                                            alt="{{ $category->name }}">
                                        <div
                                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center card-title-overlay">
                                            <h5 class="text-white text-center m-0">{{ $category->name }}</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
