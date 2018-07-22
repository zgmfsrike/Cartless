<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
class PaymentController extends Controller
{
    public function getCheckoutSummary()
    {
      $cart = [];
      $total_price =0;
      if(session()->has('cart')){
        $session_cart = Session::get('cart');
        foreach ($session_cart as $index => $value) {
          $id =$session_cart[$index]['id'];
          $cart[$index] = Product::find($id);
          $cart[$index]['amount'] = $session_cart[$index]['amount'];
          $cart[$index]['product_price'] = $cart[$index]['product_price']*$cart[$index]['amount'];
          $total_price += $cart[$index]['product_price'];
        }
      }

      return view('order.order-checkout',['cart'=>$cart,'total_price'=>$total_price]);

    }
}
