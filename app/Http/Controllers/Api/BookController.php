<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return BookResource::collection($books);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'isbn' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'released_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1)
        ]);

        $book = Book::create($attributes);
        return new BookResource($book);
    }

    public function update(Book $book, Request $request)
    {
        $attributes = $this->validate($request, [
            'isbn' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'required|max:255',
            'released_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1)
        ]);

        $book->update($request->only('isbn', 'title', 'author', 'publisher', 'released_year'));
        return new BookResource($book);
    }

    public function destroy(Book $book) {
        $book->delete();
        return response()->noContent();
    }
}
