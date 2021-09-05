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
        <h1>Login</h1>
      </div>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label id="emaail" for="email">Email address</label>
          <input id="email" class="form-control" name="email" :value="old('email')" autofocus placeholder="example@mail.com" />
        </div>
        <div class="form-group">
          <label id="password" for="pwd">Password</label>
          <input id="password" class="form-control" type="password" name="password" autocomplete="current-password" placeholder="password" />
        </div>
        <div class="form-group">
          <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span class="ml-2">Remember me</span>
          </label>
        </div>
        <button type="submit" class="btn btn-lg btn-dark btn-block">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection