<div class="row">
  @foreach ($books as $book)
  <div class="col-md-3 mb-4">
    <div class="card h-100">
      <a href="/books/{{$book->id}}">
        <img src="{{ asset($book->cover) }}" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title">
          <a href="/books/{{$book->id}}" class="text-decoration-none">{{ $book->title }}</a>
        </h5>
        <p class="card-text mb-0">
          By
          <a href="/authors/{{ $book->author->id }}">{{ $book->author->name }}</a>
        </p>
      </div>
      <div class="card-footer small text-truncate">
        Category
        <a href="/categories/{{ $book->category->id }}" class="card-link">{{ $book->category->title }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="d-flex justify-content-center">
  {{ $books->links() }}
</div>