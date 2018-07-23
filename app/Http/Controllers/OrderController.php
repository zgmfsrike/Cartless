<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
  //order status
  //->unsuccess success delivered


  //get list of order
  public function getListOrder()
  {
    $list_order = Order::paginate(25);
    return view('order.order-list',['list_order'=>$list_order]);
  }
  //get order detail
  public function getOrderDetail($order_id)
  {
    $order = Order::with(['orderProduct'])->find($order_id);
    return view('order.order-details',['order'=>$order]);
  }

  //update order status
  public function postUpdateOrderStatus(Request $request,$order_id)
  {
    $order = Order::find($order_id);
    $order->order_status =$request->order_status;
    $order->save();
    return redirect()->route('order-list');
  }





}
