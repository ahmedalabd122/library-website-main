@extends('layouts.main')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif

<div class="book-container">
  <div class="row">
    <div class="col-md-7">
      <h1 class="display-5">{{ $book->title }}</h1>
      <hr>
      <div class="book-meta">

        <p class="mb-2">By:
          <a href="/authors/{{$book->author->id }}">{{ $book->author->name }}</a>
        </p>
        <p class="mb-2">Category:
          <a href="/categories/{{ $book->category->id }}">{{ $book->category->title }}</a>
        </p>
      </div>
      <hr>
      <p>{{ $book->description }}</p>

      @auth
      <div class="d-flex">
        <a href="/books/{{$book->id}}/edit" class="btn btn-dark mr-2">Edit</a>
        <form action="/books/{{$book->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">Delete</button>
        </form>
      </div>
      @endauth
      
    </div>
    <div class="col-md-5">
      <img src="{{ asset($book->cover) }}" class="w-100">
    </div>
  </div>
</div>
@endsection