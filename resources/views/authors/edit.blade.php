@extends('layout.master')
@section('title', 'Edit Author')
@section('content')
    <h2>Update New Book</h2>
    <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row card-title">
            <div class="col-md-6 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') ?? $author->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-dark btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
