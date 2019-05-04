@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h3 class="text-center">Register</h3>
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
      <form class="" action="/register-process" method="post">
        <div class="form-group">
          <label>First Name</label>
          <input class="form-control" type="text" name="fname" value="" placeholder="Please fill your firstname">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input class="form-control" type="text" name="lname" value="" placeholder="Please fill your lastname">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="email" name="email" value="" placeholder="Please fill your email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" value="" placeholder="Please set your password">
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input class="form-control" type="password" name="confirm_password" value="" placeholder="Please confirm your password">
        </div>
        <div class="form-group">
          <label>Birthdate</label>
          <input class="form-control" type="date" name="birthdate" value="">
        </div>
        <div class="form-group">
          <label>Male</label>
          <input type="radio" name="gender" value="0">
          <label>Female</label>
          <input type="radio" name="gender" value="1">
        </div>
        @csrf
        <button class="btn btn-success form-control" type="submit" name="button">Register</button>
      </form>
    </div>
  </div>
</div>
@endsection
