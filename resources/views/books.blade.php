@extends('layouts.app')

@section('title', 'Գրքեր')

@section('content')
    <div class="order-container bg-light text-dark p-xxl-5">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-dark">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text mb-4">{{ $book->description }}</p>
                            <h6 class="mb-3">Հեղինակներ։</h6>
                            <ul class="list-unstyled mb-4">
                                @foreach($book->authors as $author)
                                    <li>{{ $author->first_name }} {{ $author->last_name }}</li>
                                @endforeach
                            </ul>
                            <p class="card-text">Հրատարակվել է {{ $book->publication_year }}թ-ին</p>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Թարմացնել</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Ջնջել</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add pagination links -->
        <div class="d-flex justify-content-center">
            {{ $books->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
