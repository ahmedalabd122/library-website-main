@extends('layouts.main')

@section('content')
<header>
  <h1 class="mb-0">Author: {{ $author->name }}</h1>
</header>

@include('components.books-grid')

@endsection