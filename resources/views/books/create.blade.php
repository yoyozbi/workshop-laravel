@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('books.index') }}"> Retour</a>
    </div>
</div>

<form action="{{route('books.store')}}" method="POST">
    @csrf

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                Nouveau livre
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputTitle">Titre</label>
                            <input type="text" name="title" class="form-control @error('title')is-invalid @elseif(null !== old('title')) is-valid @enderror" id="inputTitle" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="inputAuthor">Auteur</label>
                            <select name="author_id" id="inputAuthor" class="form-control @error('author_id') is-invalid @elseif(null !== old('author_id')) is-valid @enderror">
                                <option value="">-- Choisir un auteur --</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" @if($author->id == old('author_id')) selected @endif>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="invalid-feedback">{{ $errors->first('author_id') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="inputDescription">Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @elseif(null !== old('description')) is-valid @enderror" id="inputDescription" value="{{ old('description') }}">
                            @error('description')
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="inputIsbn">ISBN</label>
                            <input type="text" name="isbn" class="form-control  @error('isbn') is-invalid @elseif(null !== old('isbn')) is-valid @enderror" id="inputIsbn" value="{{ old('isbn') }}">
                            @error('isbn')
                                <div class="invalid-feedback">{{ $errors->first('isbn') }}</div>
                            @enderror
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Nombre de pages</label>
                                <input type="text" name="pages" class="form-control @error('pages') is-invalid @elseif(null !== old('pages')) is-valid @enderror" id="inputPages" value="{{old('pages')}}">
                                @error('pages')
                                    <div class="invalid-feedback">{{ $errors->first('pages') }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantité</label>
                                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @elseif(null !== old('quantity')) is-valid @enderror" id="inputQuantity" value="{{old('quantity')}}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
