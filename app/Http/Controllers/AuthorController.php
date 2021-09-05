<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{


  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function show(Author $author)
  {
    $books = $author->books()->latest()->paginate(16);

    return view('author', compact('author', 'books'));
  }
}
