@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Թարմացնել</div>

                    <div class="card-body">
                        <form action="{{ route('authors.update', $author->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name" class="text-primary">Անուն</label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                        value="{{ $author->first_name }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="text-primary">Ազգանուն</label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                        value="{{ $author->last_name }}">
                            </div>

                            <div class="form-group">
                                <label for="biography" class="text-primary">Կենսագրություն</label>
                                <input type="text" name="biography" id="biography" class="form-control"
                                        value="{{ $author->biography }}">
                            </div>

                            <div class="form-group">
                                <label for="book_id" class="text-primary">Գրքեր</label>
                                <select name="books_id[]" id="books_id" class="form-control" multiple>
                                    @foreach($books as $book)
                                        <option
                                            value="{{ $book->id }}" {{ in_array($book->id, $author->books->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3">Թարմացնել</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
