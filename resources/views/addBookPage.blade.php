@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Ավելացնել գիրք</div>
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
                        <form action="{{ route('books.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="text-primary">Գրքի Անունը</label>
                            <input type="text" name="title" id="title" class="form-control"  placeholder="Գրքի Անունը">
                        </div>

                        <div class="form-group">
                            <label for="published_year" class="text-primary">Նկարագրություն</label>
                            <input type="text" name="description" id="description" class="form-control"  placeholder="Նկարագրություն">
                        </div>
                            <div class="form-group">
                                <label for="published_year" class="text-primary">Հրատարակչության տարեթիվ</label>
                                <input type="text" name="published_year" id="published_year" class="form-control"  placeholder="Հրատարակչության տարեթիվ">
                            </div>
                        <div class="form-group">
                            <label for="author_id" class="text-primary">Հեղինակ</label>
                            <select name="author_ids[]" id="author_ids" class="form-control" multiple>
                                <option value="" disabled selected>Ընտրեք հեղինակները</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                                @endforeach
                            </select>


                        </div>

                        <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3">Պահպանել</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
