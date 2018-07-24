<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;
class OrderController extends Controller
{
  //order status
  //->unsuccess success delivered


  //get list of order
  public function getListOrder()
  {
    $query = "SELECT orders.order_id, products.product_name, order_products.amount, orders.net_price, orders.address, orders.tel_number, orders.order_date, orders.order_status, users.firstname FROM orders INNER JOIN order_products ON orders.order_id = order_products.order_id INNER JOIN products ON products.product_id = order_products.product_id INNER JOIN users ON users.user_id = orders.user_id GROUP BY orders.order_id ORDER BY orders.order_date DESC";
    $list_order = DB::SELECT($query);
    return view('order.order-list',['list_order'=>$list_order]);
  }
  //get order detail
  public function getOrderDetail($order_id)
  {
    // $order = Order::find($order_id);
    // $product = Order::find($order_id)->orderProduct()->get();
    $query = "SELECT orders.order_id, products.product_name, order_products.amount, orders.net_price, orders.address, orders.tel_number, orders.order_date, orders.order_status, users.firstname, users.lastname FROM order_products INNER JOIN orders ON orders.order_id = order_products.order_id INNER JOIN products ON products.product_id = order_products.product_id INNER JOIN users ON users.user_id = orders.user_id WHERE order_products.order_id = '$order_id'" ;
    $order_details = DB::SELECT($query);
    return view('order.order-details',['order_details'=>$order_details]);
  }

  //update order status
  public function postUpdateOrderStatus(Request $request)
  {
    $order = Order::find($request->order_id);
    $order->order_status =$request->order_status;
    $order->save();
    return redirect()->route('order-list');
  }





}
