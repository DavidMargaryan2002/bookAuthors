@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Ավելացնել հեղինակ</div>

                    <div class="card-body">
                        <form action="{{ route('authors.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_name" class="text-primary">Անուն</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="Անուն">
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="text-primary">Ազգանուն</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required placeholder="Ազգանուն">
                            </div>

                            <div class="form-group">
                                <label for="biography" class="text-primary">Կենսագրություն</label>
                                <textarea name="biography" id="biography" class="form-control" placeholder="Կենսագրություն"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="book_id" class="text-primary">Գրքեր</label>
                                <select name="book_ids[]" id="book_ids" class="form-control" multiple>
                                    <option value="" disabled selected>Ընտրեք գիրքը</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
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
