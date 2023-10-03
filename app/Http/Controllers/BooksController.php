<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Http\Resources\BooksResource;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BooksRequest $request, Book $book)
    {
        $book = Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'publication_year' => $request->publication_year
        ]);

        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BooksRequest $request, Book $book)
    {
        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'publication_year' => $request->publication_year,
        ]);

        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response(null, 204);
    }
}
