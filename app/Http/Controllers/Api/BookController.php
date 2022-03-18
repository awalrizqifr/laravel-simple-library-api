<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return BookResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(Book $book, BookRequest $request)
    {
        $book->update($request->validated());
        return new BookResource($book);
    }

    public function destroy(Book $book) {
        $book->delete();
        return response()->noContent();
    }
}
