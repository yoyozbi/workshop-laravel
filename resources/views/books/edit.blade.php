@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary" href="{{route('books.index')}}"> Retour</a>
    </div>
</div>

<form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card-header">
            Modifier un livre
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputTitle">Titre</label>
                    <input
                        type="text"
                        name="title"
                        value="{{old('title', $book->title)}}"
                        class="form-control @error('title') is-invalid @elseif(null !== old('title')) is-valid @enderror"
                        id="inputTitle">
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>

                <div class="form-group col-12">
                    <label for="inputAuthor">Auteur</label>
                    <select
                        name="author_id"
                        id="inputAuthor"
                        class="form-control @error('author_id') is-invalid @elseif(null !== old('author_id')) is-valid @enderror">
                        <option value="">-- Choisir un auteur --</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" @if($author->id == old('author_id', $book->author_id)) selected @endif>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('author_id') }}</div>
                </div>

                <div class="form-group col-12">
                    <label for="inputDescription">Description</label>
                    <input
                        type="text"
                        name="description"
                        value="{{old('description', $book->description)}}"
                        class="form-control @error('description') is-invalid @elseif(null !== old('description')) is-valid @enderror"
                        id="inputDescription">
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                </div>


                <div class="form-group col-12">
                    <label for="inputIsbn">ISBN</label>
                    <input
                        type="text"
                        name="isbn"
                        value="{{old('isbn', $book->isbn)}}"
                        class="form-control @error('isbn') is-invalid @elseif(null !== old('isbn')) is-valid @enderror"
                        id="inputIsbn">
                    <div class="invalid-feedback">{{ $errors->first('isbn') }}</div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-6">
                        <label for="inputPages">Nombre de pages</label>
                        <input
                            type="text"
                            name="pages"
                            value="{{old('pages', $book->pages)}}"
                            class="form-control @error('pages') is-invalid @elseif(null !== old('pages')) is-valid @enderror"
                            id="inputPages">
                        <div class="invalid-feedback">{{ $errors->first('pages') }}</div>
                    </div>
                    <div class="form-group col-6">
                        <label for="inputQuantity">Quantité</label>
                        <input
                            type="text"
                            name="quantity"
                            value="{{old('quantity', $book->quantity)}}"
                            class="form-control @error('quantity') is-invalid @elseif(null !== old('quantity')) is-valid @enderror"
                            id="inputQuantity">
                        <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Modifier</button>
            </div>
        </div>
    </div>

</form>
@endsection
