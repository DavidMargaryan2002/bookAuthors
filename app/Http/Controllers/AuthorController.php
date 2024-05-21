<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\AddAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(3);
        $books = Book::with('authors')->first();
        return view('Authors', compact('authors', 'books'));
    }

    public function create()
    {
        $books = book::all();
        return view('addAuthorPage', compact('books'));
    }

    public function store(AddAuthorRequest $request)
    {
        $validatedData = $request->validated();

        $author = new Author();
        $author->first_name = $validatedData['first_name'];
        $author->last_name = $validatedData['last_name'];
        $author->biography = $validatedData['biography'];
        $author->save();

        $author->books()->attach($request->input('book_ids', []));

        return redirect()->route('authors.index');
    }

    public function edit($id)
    {

        $author = Author::where('id', $id)->first();
        $books = Book::all();
        return view('updateAuthor', compact('author', 'books'));
    }


    public function update(UpdateAuthorRequest $request, $id)
    {
        $validatedData = $request->validated();
        $author = Author::findOrFail($id);
        $author->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'biography' => $validatedData['biography'],
        ]);

        $author->books()->sync($request->input('books_id', []));

        return redirect()->route('authors.index', $author->id);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index');
    }

}
