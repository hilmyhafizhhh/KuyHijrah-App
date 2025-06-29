@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All News</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/news/create" class="btn btn-primary mb-3">Create new news</a>

        @if ($news->isNotEmpty())
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $article)
                        <tr>
                            <td>{{ $news->firstItem() + $loop->index }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                <a href="/dashboard/news/{{ $article->slug }}" class="badge bg-info">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="/dashboard/news/{{ $article->slug }}/edit" class="badge bg-warning">
                                    <span data-feather="edit"></span>
                                </a>

                                <form action="/dashboard/news/{{ $article->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2>No news available!</h2>
        @endif

        {{-- Pagination --}}
        <div class="d-flex justify-content-end mt-4">
            {{ $news->links() }}
        </div>
    </div>
@endsection
