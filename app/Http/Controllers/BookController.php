<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->paginate(3);
        return view('books', compact('books'));
    }




    public function create()
    {
        $authors = Author::all();
        return view('addBookPage', compact('authors'));
    }

//


    public function store(AddBookRequest $request)
    {
        $validatedData = $request->validated();

        $book = new Book();
        $book->fill($validatedData);
        $book->save();

        $book->authors()->attach($validatedData['author_ids']);

        return redirect()->route('books.index');
    }

    public function edit($id)
    {

        $book = Book::where('id', $id)->first();
        $authors = Author::all();
        return view('updateBook', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $validatedData = $request->validated();
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'publication_year' => $validatedData['published_year'],
        ]);

        $book->authors()->sync($validatedData['author_id'] ?? []);
        return redirect()->route('books.index', $book->id);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
