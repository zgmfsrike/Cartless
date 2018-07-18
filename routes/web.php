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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('product-list-staff','ProductController@getListProductStaff')->name('product-list-staff')->middleware('check_staff');
Route::post('product-add-staff','ProductController@postStoreProduct')->name('product-add-staff')->middleware('check_staff');
Route::get('product-list-customer','ProductController@getListProductCustomer')->name('product-list-customer');
// Route::get('/product-list-customer', function () {
//     return view('product.product-list-customer');
// });

Route::get('/product-add', function () {
    return view('product.product-add');
});

Route::get('/product-details', function () {
    return view('product.product-details');
});

Route::get('/shopping-cart', function () {
    return view('shopping-cart.cart');
});
