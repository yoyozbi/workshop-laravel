<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {
        $book = new Book();
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;
        $book->save();

        return view('books.index', ['books' => Book::all()])->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): View
    {
        $book = Book::findOrFail($id);

        if ($request->has('title')) {
            $book->title = $request->title;
        }

        if ($request->has('isbn')) {
            $book->isbn = $request->isbn;
        }

        if ($request->has('description')) {
            $book->description = $request->description;
        }

        if ($request->has('pages')) {
            $book->pages = $request->pages;
        }

        if ($request->has('quantity')) {
            $book->quantity = $request->quantity;
        }

        if ($book->isDirty()) {
            $book->save();
        }

        return view('books.show', ['book' => $book])->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): View
    {
        Book::destroy($id);

        return view('books.index', ['books' => Book::all()])->with('success', 'Book deleted successfully.');
    }
}
