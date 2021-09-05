@extends('layouts.main')

@section('content')
<header>
  <h1 class="mb-0">Category: {{ $category->title }}</h1>
</header>

@include('components.books-grid')

@endsection