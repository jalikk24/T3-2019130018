@extends('layout.master')
@section('title', 'Edit Book')
@section('content')
    <h2>Update New Book</h2>
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row card-title">
            <div class="col-md-6 mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
                    value="{{ old('judul') ?? $book->judul }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 card-text">
                <label for="halaman">Halaman</label>
                <input type="number" class="form-control @error('halaman') is-invalid @enderror" name="halaman"
                    id="halaman" min="1" max="9999" value="{{ old('halaman') ?? $book->halaman }}">
                @error('halaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3 card-text">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" value="{{ old('kategori') ?? $book->kategori }}">
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 card-text">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                    id="penerbit" value="{{ old('penerbit') ?? $book->penerbit }}">
                @error('penerbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <p class="mt-2 mb-1">Pilih Pengarang</p>
                <select id="myselection" class="mb-3">
                    @forelse ($authors as $author)
                        <option onclick="updateBox();" value="{{ $author->id }}"
                            class="form-control @error('idpengarang') is-invalid @enderror" name="idpengarang">
                            {{ $author->nama }}</option>
                        <div class="dropdown-divider"></div>
                    @empty
                        <option>No data yet.</option>
                        <div class="dropdown-divider"></div>
                    @endforelse
                </select>
                <button onclick="updateBox();" type="button" class="btn btn-dark">INPUT</button>
                <input type="text" class="form-control @error('idpengarang') is-invalid @enderror" name="idpengarang"
                    id="idpengarang" value="{{ old('idpengarang') }}">
            </div>
        </div>
        <button class="btn btn-dark btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection

@push('js_after')
    <script>
        function updateBox() {
            var e = document.getElementById("myselection");
            var value = e.value;
            document.getElementById("idpengarang").value = value;
        }
    </script>
@endpush
