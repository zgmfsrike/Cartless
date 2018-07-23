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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('product-list-staff','ProductController@getListProductStaff')->name('product-list-staff')->middleware('check_staff');
Route::post('product-add-staff','ProductController@postStoreProduct')->name('product-add-staff')->middleware('check_staff');
Route::get('product-list-customer','ProductController@getListProductCustomer')->name('product-list-customer');
Route::get('product/product-edit/{id}','ProductController@getEditProduct')->name('product-edit')->middleware('check_staff');
Route::post('product/product-update/{id}','ProductController@postUpdateProduct')->name('product-update')->middleware('check_staff');
Route::post('product/product-delete/{id}','ProductController@postDeleteProduct')->name('product-delete')->middleware('check_staff');
Route::post('product/product-delete','ProductController@postDeleteProduct')->name('product-delete-default')->middleware('check_staff');

Route::get('product/product-details/{id}','ProductController@getProductDetail')->name('product-detail');

Route::get('/product-add', function () {
    return view('product.product-add');
});
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

Route::post('/cart/remove', [
])->name('cart-remove-item-default');

Route::any('/cart/increase/{index}', [
    'uses' => 'CartController@increaseAmount',
    // 'middleware' => 'auth'
])->name('cart-increase-item');

Route::any('/cart/decrease/{index}', [
    'uses' => 'CartController@decreaseAmount',
    // 'middleware' => 'auth'
])->name('cart-decrease-item');

Route::get('/cart/clear', function () {
  Session::forget('cart');
  return  redirect()->route('cart');
});

// Route::get('/order/checkout', function () {
//   return view('order.order-checkout');
// })->name('checkout');
Route::get('/order/checkout','PaymentController@getCheckoutSummary')->name('checkout');
Route::get('/next-process','PaymentController@nextProcess')->name('next-process');
Route::post('/payment','PaymentController@payWithpaypal')->name('paypal');
Route::get('status', 'PaymentController@getPaymentStatus');

Route::post('/review/{product_id}','ReviewController@postAddReview')->name('review');

Route::get('/order/{order_id}','OrderController@getOrderDetail')->name('order-details');



// Route::get('/order', function () {
//   return view('order.order-details');
// });
// Route::get('/orders', function () {
//   return view('order.order-list');
// });

// Route::get('/order','OrderController@getOrderDetail')->name('order-detail');
Route::get('/orders','OrderController@getListOrder')->name('order-list');
Route::post('/validate-coupon','CouponController@validateCoupon')->name('validate-coupon');
