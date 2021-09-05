<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
    $books = Book::latest()->paginate(16);

    return view('books.index', compact('books'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $authors = Author::all();
    $categories = Category::all();

    return view('books.create', compact('authors', 'categories'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|min:3|max:255',
      'description' => 'nullable|string',
      'cover' => 'nullable|image|mimes:jpg,bmp,png',
      'author_id' => 'required',
      'category_id' => 'required',
    ]);

    if ($request->file('cover')) {
      $path = $request->file('cover')->store('covers');
      $validated['cover'] = $path;
    }

    $book = Book::create($validated);

    return redirect('/books/' . $book->id)
      ->with('success', 'Book was added succefully!');
  }


  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function show(Book $book)
  {
    return view('books.show', compact('book'));
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
    $categories = Category::all();

    return view('books.edit', compact('book', 'authors', 'categories'));
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
    $validated = $request->validate([
      'title' => 'required|string|min:3|max:255',
      'description' => 'nullable|string',
      'cover' => 'nullable|image|mimes:jpg,bmp,png',
      'author_id' => 'required',
      'category_id' => 'required',
    ]);

    if ($request->file('cover')) {
      $path = $request->file('cover')->store('covers');
      $validated['cover'] = $path;
    }

    $book->update($validated);

    return redirect('/books/' . $book->id)
      ->with('success', 'Book was edited succefully!');
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

    return redirect('/')->with('success', 'Book was deleted!');
  }
}
