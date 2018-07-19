<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
  //
  public function addItems($product_id, $amount)
  {
    Session::push('cart', [
      [
        "id"=>$product_id,
        "amount"=>$amount
      ]
    ]);
    return "Add cart success";
  }

  public function getItems()
  {
    // $cart = Session::get('cart.0');
    // return $cart[0]['id'];
    Session::get('cart');
    return view('shopping-cart.cart-view');
  }

  public function removeItem($index)
  {
    // $products = Session::get('products'); // Get the array
    // unset($product[$index]); // Unset the index you want
    // Session::set('products', $products); // Set the array again
    return Session::forget('cart.' . $index);;
  }

  public function increaseAmount($index)
  {
    $cart = session(['cart.'.$index.'.amount' => (Session::get('cart.'.$index.'.amount') + 1)]);
    return Session::get('cart');
  }

  public function decreaseAmount($index)
  {

    $current_amount = Session::get('cart.'.$index.'.amount');
    if ($current_amount > 1)
    {
      session(['cart.'.$index.'.amount' => (Session::get('cart.'.$index.'.amount') - 1)]);
    }

    return Session::get('cart');
  }
}
