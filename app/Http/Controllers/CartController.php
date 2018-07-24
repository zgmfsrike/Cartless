<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
class CartController extends Controller
{
  //
  public function addItems(Request $request)
  {
    $product_id = $request->product_id;
    $amount = $request->amount;

    Session::push('cart', [
      "id"=>$product_id,
      "amount"=>$amount
    ]);
    return  redirect()->route('cart');
  }

  public function getItems()
  {
    // $cart = Session::get('cart.0');
    // return $cart[0]['id'];
    $cart=[];
    $total_price = 0;

    if(session()->has('cart')){
      $session_cart = Session::get('cart');
      foreach ($session_cart as $index => $value) {
        $id =$session_cart[$index]['id'];
        $cart[$index] = Product::with(['productDiscount'])->find($id);
        $cart[$index]['amount'] = $session_cart[$index]['amount'];
        $cart[$index]['product_price'] = $cart[$index]['product_price']*((100-$cart[$index]['productDiscount']['product_discount'])/100)*$cart[$index]['amount'];
        $total_price += $cart[$index]['product_price'];
      }
    }
    if($total_price < 0 ) $total_price = 0;
    // return Session::get('cart');
    return view('shopping-cart.cart-view',['cart'=>$cart, 'total_price'=>$total_price]);

  }

  public function removeItem($index)
  {
    // $products = Session::get('products'); // Get the array
    // unset($product[$index]); // Unset the index you want
    // Session::set('products', $products); // Set the array again
    Session::forget('cart.' . $index);
    return  redirect()->route('cart');
  }

  public function increaseAmount($index)
  {
    session(['cart.'.$index.'.amount' => (Session::get('cart.'.$index.'.amount') + 1)]);
    // return Session::get('cart');
    return  redirect()->route('cart');
  }

  public function decreaseAmount($index)
  {

    $current_amount = Session::get('cart.'.$index.'.amount');
    if ($current_amount > 1)
    {
      session(['cart.'.$index.'.amount' => (Session::get('cart.'.$index.'.amount') - 1)]);
    }
    return  redirect()->route('cart');

  }
}
