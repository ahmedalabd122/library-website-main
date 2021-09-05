@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="form-container">

      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul class="mb-0 pl-4">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="text-center">
        <h1>Add Book</h1>
      </div>
      <form method="POST" action="/books" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title">Book Title</label>
          <input type="text" class="form-control" placeholder="Enter The Book's Name" name="title" id="title"
            value="{{ old('title') }}">
        </div>

        <div class="form-group">
          <label for="author_id">Author</label>
          <select name="author_id" class="form-control" id="author">
            <option value="">Select an author</option>
            @foreach ($authors as $author)
            <option value="{{ $author->id }}">
              {{ $author->name }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="category_id">Category</label>
          <select name="category_id" class="form-control" id="category">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">
              {{ $category->title }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="cover">Book Cover</label>
          <input type="file" class="form-control" name="cover" id="cover">
        </div>

        <div class="form-group">
          <label for="description">Book Decription</label>
          <textarea class="form-control" placeholder="Enter The Book's Name" name="description"
            id="description">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-dark btn-block">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection