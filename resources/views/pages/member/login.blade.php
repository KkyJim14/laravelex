@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h3 class="text-center">Login</h3>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger mt-5 ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <form class="" action="/login-process" method="post">
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="email" name="email" value="" placeholder="Please fill your email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" value="" placeholder="Please fill your password">
        </div>
        @csrf
        <button class="btn btn-success form-control" type="submit" name="button">Login</button>
      </form>
    </div>
  </div>
</div>
@endsection
