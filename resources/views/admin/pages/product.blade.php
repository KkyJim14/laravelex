@extends('admin.layouts.admin-master')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <h2>Admin Product</h2>
      <a class="btn btn-success" href="/admin/create-product">สร้างสินค้า</a>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Discount %</th>
            <th scope="col">Suggest</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($product as $show_product)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$show_product->product_name}}</td>
            <td>{{$show_product->product_price}}</td>
            <td>{{$show_product->product_discount}}</td>
            @if($show_product->product_suggest)
            <td><i class="fas fa-check-circle"></i></td>
            @else
            <td><i class="fas fa-times-circle"></i></td>
            @endif
            <td><a class="btn btn-warning form-control" href="/admin/edit-product/{{$show_product->product_id}}">Edit</a> </td>
            <td><a class="btn btn-danger form-control" href="/admin/delete-product-process/{{$show_product->product_id}}">Delete</a> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
