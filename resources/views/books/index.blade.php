@extends('layout.master')
@section('title', 'Books List')
@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Books List</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('books.create') }}" class="btn btn-dark">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Book</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>judul</th>
                        <th>halaman</th>
                        <th>kategori</th>
                        <th>penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td style="width: 30%">
                                <a href="{{ route('books.show', $book->id) }}" class="text-danger">
                                    {{ $book->judul }}
                                </a>
                            </td>
                            <td>{{ $book->halaman }}</td>
                            <td>{{ $book->kategori }}</td>
                            <td>{{ $book->penerbit }}</td>
                            <td>{{ $book->description }}</td>
                            <td style="width: 20%">
                                <a href="{{ route('authors.show', $book->idpengarang) }}" class="text-danger">
                                    Lihat Pengarang
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
