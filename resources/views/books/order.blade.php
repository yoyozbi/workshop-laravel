@extends('layouts.app')

@section('content')

<h1>Commandes</h1>

<a href="{{ route('books.create') }}" class="btn btn-primary float-right mb-2">Ajouter un livre</a>
@if($books->count() > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Description</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantité</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>@if(null !== $book->author_id) {{ $book->author->name }} @else No author @endif</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
                    <td class="row">
                    <a class="btn" href="{{ route('books.show', ['book' => $book->id]) }}"><i class="bi bi-eye"></i></a>
                    <a class="btn" href="{{ route('books.edit', ['book' => $book->id]) }}"><i class="bi bi-pen"></i></a>
                    <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="bi bi-x"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@else
    <p>Il n'y a pas de livre a commandé</p>
@endif
{{ $books->links() }}
@endsection
