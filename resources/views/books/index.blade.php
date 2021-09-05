@extends('layouts.main')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif

@include('components.books-grid')

@endsection