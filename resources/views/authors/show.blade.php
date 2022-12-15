@extends('layout.master')
@section('title', $author->nama)
@section('content')
    <div class="col-md-12">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <div class="row card-title">
                    <div class="col-md-8">
                        <h2>{{ $author->nama }}</h2>
                    </div>
                </div>
            </div>
            <div class="btn-group m-3 col" role="group">
                <div class="row">
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-dark">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                        <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
