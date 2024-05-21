@extends('layouts.app')

@section('content')

    <div class="order-container bg-light text-dark p-5">
        <h1 class="title_name text-center mb-4">Հեղինակներ</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($authors as $author)
                <div class="col">
                    <div class="card h-100 border-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->first_name }} {{ $author->last_name }}</h5>
                            <p class="card-text mb-4">{{ $author->biography }}</p>
                            <h6 class="mb-3">Գրքեր։</h6>
                            <ul class="list-unstyled mb-4">
                                @foreach($author->books as $book)
                                    <li>{{ $book->title }}</li>
                                @endforeach
                            </ul>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-primary me-md-2 mb-2 mb-md-0">Թարմացնել</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ջնջել</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $authors->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection
