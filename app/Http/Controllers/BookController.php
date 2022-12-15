<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $book = Book::select('judul')->get();
        $author = Author::where('id', '=', $book)->first();
        return view('books.index', compact('books', 'author', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:1|max:9999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'idpengarang' => 'required|integer'
        ]);

        $book = Book::create($validateData);

        $book->save();

        $request->session()->flash('success', "Successfully adding {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $author = Author::where('id', '=', $book->idpengarang)->first();
        return view('books.show', compact('book', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:1|max:9999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'idpengarang' => 'required|integer'
        ]);

        $book->update($validateData);

        $book->save();

        $request->session()
            ->flash('success', "Successfully updating {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with(
            'success',
            "Successfully deleting {$book['judul']}!"
        );
    }
}
