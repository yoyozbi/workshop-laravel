@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>{{ $book->title }}</h1>
        <p class="lead">by {{ $book->author }}</p>
        <p>{{ $book->description }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit Book</a>
    </div>
 @endsection
