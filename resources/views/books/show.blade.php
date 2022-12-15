@extends('layout.master')
@section('title', $book->title)
@section('content')
    <div class="col-md-12">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <div class="row card-title">
                    <div class="col-md-8">
                        <h2>{{ $book->judul }}</h2>
                    </div>
                </div>
                <p>
                <ul class="list-inline card-text">
                    <li class="list-inline-item mr-3">
                        Halaman :
                    </li>
                    <li class="list-inline-item">
                        <span class="badge badge-dark row">
                            <i class="fa fa-star fa-fw"></i>
                            {{ $book->halaman }}
                        </span>
                    </li>
                </ul>
                </p>
                <p>
                <ul class="list-inline card-text">
                    <li class="list-inline-item">
                        Kategori :
                    </li>
                    <li class="list-inline-item">
                        <i class="fa fa-th-large fa-fw"></i>
                        <em>{{ $book->kategori }}</em>
                    </li>
                </ul>
                </p>
                <p>
                <ul class="list-inline card-text">
                    <li class="list-inline-item">
                        Penerbit :
                    </li>
                    <li class="list-inline-item">
                        {{ $book->penerbit }}
                    </li>
                </ul>
                </p>
                <p>
                <ul class="list-inline card-text">
                    <li class="list-inline-item">
                        Pengarang :
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('authors.show', $book->idpengarang) }}" class="text-danger">
                            {{ $author->nama }}
                        </a>
                    </li>
                </ul>
                </p>
            </div>
            <div class="btn-group m-3 col" role="group">
                <div class="row">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-dark">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
