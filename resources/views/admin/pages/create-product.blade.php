@extends('admin.layouts.admin-master')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h2>Create Product</h2>
      @if ($errors->any())
        <div class="alert alert-danger mt-5 ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <form action="/admin/create-product-process" method="post">
        <div class="form-group">
          <label>Product Name</label>
          <input class="form-control" type="text" name="product_name" value="" placeholder="please set your product name">
        </div>
        <div class="form-group">
          <label>Product Price</label>
          <input class="form-control" type="number" name="product_price" value="" placeholder="please set your product price">
        </div>
        <div class="form-group">
          <label>Discount %</label>
          <input class="form-control" type="number" name="product_discount" value="" placeholder="please set your product discount price as %">
        </div>
        <div class="form-group">
          <label>Suggest Product</label>
          <input type="checkbox" name="product_suggest" value="1">
        </div>
        @csrf
        <button class="btn btn-success form-control" type="submit" name="button">Create Product</button>
      </form>
    </div>
  </div>
</div>
@endsection
