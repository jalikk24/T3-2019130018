@extends('layout.master')
@section('title', 'Add New Authors')
@section('content')
    <h2>Add New Author</h2>
    <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-danger btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
