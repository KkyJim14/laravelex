@extends('admin.layouts.admin-master')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h2>Edit Product</h2>
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
      <form action="/admin/edit-product-process" method="post">
        <div class="form-group">
          <label>Product Name</label>
          <input class="form-control" type="text" name="product_name" placeholder="please set your product name" value="{{$product->product_name}}">
        </div>
        <div class="form-group">
          <label>Product Price</label>
          <input class="form-control" type="number" name="product_price" placeholder="please set your product price" value="{{$product->product_price}}">
        </div>
        <div class="form-group">
          <label>Discount %</label>
          <input class="form-control" type="number" name="product_discount" placeholder="please set your product discount price as %" value="{{$product->product_discount}}">
        </div>
        <div class="form-group">
          <label>Suggest Product</label>
          @if($product->product_suggest)
            <input type="checkbox" name="product_suggest" value="1" checked>
          @else
            <input type="checkbox" name="product_suggest" value="1">
          @endif
        </div>
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        @csrf
        <button class="btn btn-warning form-control" type="submit" name="button">Edit Product</button>
      </form>
    </div>
  </div>
</div>
@endsection
