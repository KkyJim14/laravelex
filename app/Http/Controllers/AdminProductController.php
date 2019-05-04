<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductController extends Controller
{
    // หน้า Show ตารางสินค้า
    public function AdminShowProduct()  {
      $product = Product::all();
      return view('admin.pages.product',[
                                          //ส่งค่าไปหน้า view
                                          'product' => $product,
                                        ]);
    }

    //หน้า Show การสร้างสินค้า
    public function AdminShowCreateProduct()  {
      return view('admin.pages.create-product');
    }


    //Function สร้างสินค้า
    public function AdminCreateProductProcess(Request $request) {

      // Validate ข้อมูล Request
      $validatedData = $request->validate([
        'product_name' => 'required',
        'product_price' => 'required',
      ]);

      // สร้างสินค้า
      $product = new Product;
      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;
      $product->product_discount = $request->product_discount;
      $product->product_suggest = $request->product_suggest;
      $product->save();

      //Redirect ไป Route ชื่อ admin-product
      return redirect()->route('admin-product');
    }

    // หน้า Show แก้ไขสินค้า
    public function AdminShowEditProduct($product_id)  {
      $product = Product::find($product_id);
      return view('admin.pages.edit-product',[
                                              'product' => $product,
                                             ]);
    }

    // Function แก้ไขสินค้า
    public function AdminEditProductProcess(Request $request) {

      // Validate ข้อมูล Request
      $validatedData = $request->validate([
        'product_name' => 'required',
        'product_price' => 'required',
      ]);

      //หาสินค้าที่ต้องการ จาก id
      $product = Product::find($request->product_id);

      //แก้ไขมูลสินค้า
      $product->product_name = $request->product_name;
      $product->product_price = $request->product_price;
      $product->product_discount = $request->product_discount;
      $product->product_suggest = $request->product_suggest;
      $product->save();

      //Redirect ไป Route ชื่อ admin-product
      return redirect()->route('admin-product');
    }

    // Function ลบสินค้า
    public function AdminDeleteProductProcess($product_id) {

      //หาข้อมูลที่ต้องการจะลบ
      $product = Product::find($product_id);
      //ลบข้อมูล
      $product->delete();

      //Redirect ไป Route ชื่อ admin-product
      return redirect()->route('admin-product');
    }
}
