<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $books = Book::simplePaginate(5);
        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('books.create', ['authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCreateRequest $rqt): RedirectResponse
    {
        $book = new Book($rqt->all());
        $book->save();

        return to_route('books.index')->withSuccess('Book created successfully.');
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
        return view('books.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id): RedirectResponse
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

        return to_route('books.show')->withSuccess('Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Book::destroy($id);

        return to_route('books.index')->withSuccess('Book deleted successfully.');
    }

    public function order(): View
    {
        return view('books.order', [
            'books' => Book::where('quantity', '<=', 0)->simplePaginate(5)
        ]);
    }
}
