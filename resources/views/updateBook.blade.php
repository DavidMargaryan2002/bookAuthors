@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Թարմացնել գիրքը</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title" class="text-primary">Անվանում</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{ $book->title }}"
                                       placeholder="Անվանում">
                            </div>
                            <div class="form-group">
                                <label for="description" class="text-primary">Նկարագրություն</label>
                                <input type="text" name="description" id="description" class="form-control"
                                       value="{{ $book->description }}"
                                       placeholder="Նկարագրություն">
                            </div>

                            <div class="form-group">
                                <label for="published_year" class="text-primary">Հրատարակման տարեթիվ</label>
                                <input type="text" name="published_year" id="published_year" class="form-control"
                                       value="{{ $book->publication_year }}" placeholder="Հրատարակման տարեթիվ">
                            </div>

                            <div class="form-group">
                                <label for="author_id" class="text-primary">Հեղինակ</label>
                                <select name="author_id[]" id="author_id" class="form-control" multiple>
                                    @foreach($authors as $author)
                                        <option
                                            value="{{ $author->id }}" {{ in_array($author->id, $book->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $author->first_name }} {{ $author->last_name }}
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
