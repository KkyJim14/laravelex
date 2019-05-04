<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UIViewController@ShowIndex');

Route::get('/login','UIViewController@ShowLogin');

Route::get('/register','UIViewController@ShowRegister');

Route::post('/register-process','MemberController@RegisterProcess');

Route::post('/login-process','MemberController@LoginProcess');

Route::get('/logout-process','MemberController@LogoutProcess');


// Route Group Prefix
Route::prefix('admin')->group(function () {
    Route::get('/product','AdminProductController@AdminShowProduct')->name('admin-product');

    Route::get('/create-product','AdminProductController@AdminShowCreateProduct');

    Route::post('/create-product-process','AdminProductController@AdminCreateProductProcess');

    Route::get('/edit-product/{product_id}','AdminProductController@AdminShowEditProduct');

    Route::post('/edit-product-process','AdminProductController@AdminEditProductProcess');

    Route::get('/delete-product-process/{product_id}','AdminProductController@AdminDeleteProductProcess');
});
