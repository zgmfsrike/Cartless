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
Route::get('product/product-edit/{id}','ProductController@getEditProduct')->name('product-edit')->middleware('check_staff');
Route::post('product/product-update/{id}','ProductController@postUpdateProduct')->name('product-update')->middleware('check_staff');
Route::delete('product/product-delete/{id}','ProductController@postDeleteProduct')->name('product-delete')->middleware('check_staff');

Route::get('product/product-details/{id}','ProductController@getProductDetail')->name('product-detail');

// Route::get('/product-add', function () {
//     return view('product.product-add');
// });
//
// Route::get('/product-details', function () {
//     return view('product.product-details');
// });

Route::get('/shopping-cart', function () {
    return view('shopping-cart.cart');
});

Route::post('/cart/add', [
    'uses' => 'CartController@addItems',
    // 'middleware' => 'auth'
])->name('add-to-cart');

Route::get('/cart', [
    'uses' => 'CartController@getItems',
    // 'middleware' => 'auth'
])->name('cart');

Route::post('/cart/remove/{index}', [
    'uses' => 'CartController@removeItem',
    // 'middleware' => 'auth'
])->name('cart-remove-item');

Route::get('/cart/increase/{index}', [
    'uses' => 'CartController@increaseAmount',
    // 'middleware' => 'auth'
]);

Route::get('/cart/decrease/{index}', [
    'uses' => 'CartController@decreaseAmount',
    // 'middleware' => 'auth'
]);
