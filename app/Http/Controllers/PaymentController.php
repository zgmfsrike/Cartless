<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use App\Product;
use App\Order;
use Auth;
use App\OrderProduct;

class PaymentController extends Controller
{
  private $_api_context;

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

  public function nextProcess()
  {
    Session::push('next-process','next');
    return redirect()->back();
  }

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {

    /** PayPal api context **/
    $paypal_conf = \Config::get('paypal');
    $this->_api_context = new ApiContext(new OAuthTokenCredential(
      $paypal_conf['client_id'],
      $paypal_conf['secret'])
    );
    $this->_api_context->setConfig($paypal_conf['settings']);

  }

  public function payWithpaypal(Request $request)
  {
    $order_id = str_random(3) . time();

    $order = new Order();
    $order->order_id = $order_id;
    $order->user_id = Auth::user()->user_id;
    $order->net_price = $request->get('net_price');
    $order->order_status = 1;
    $order->order_date = date('d-m-y');
    $order->address = $request->get('address');
    $order->tel_number = $request->get('tel_number');
    $order->save();

    $session_cart = Session::get('cart');
    foreach ($session_cart as $index => $value) {
      $order_product = new OrderProduct();
      $order_product->order_id = $order_id;
      $order_product->product_id = $session_cart[$index]['id'];
      $order_product->amount = $session_cart[$index]['amount'];
      $order_product->save();
    }
    // return $order;

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $item_1 = new Item();

    $item_1->setName('Item 1') /** item name **/
    ->setCurrency('THB')
    ->setQuantity(1)
    ->setPrice($request->get('net_price')); /** unit price **/

    $item_list = new ItemList();
    $item_list->setItems(array($item_1));

    $amount = new Amount();
    $amount->setCurrency('THB')
    ->setTotal($request->get('net_price'));

    $transaction = new Transaction();
    $transaction->setAmount($amount)
    ->setItemList($item_list)
    ->setDescription('Bobby CARTless Shop');

    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
    ->setCancelUrl(URL::to('status'));

    $payment = new Payment();
    $payment->setIntent('Sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirect_urls)
    ->setTransactions(array($transaction));
    /** dd($payment->create($this->_api_context));exit; **/
    try {
      $payment->create($this->_api_context);

    } catch (\PayPal\Exception\PPConnectionException $ex) {

      if (\Config::get('app.debug')) {

        \Session::put('error', 'Connection timeout');
        return Redirect::to('/');

      } else {

        \Session::put('error', 'Some error occur, sorry for inconvenient');
        return Redirect::to('/');

      }

    }catch(\PayPal\Exception\PayPalConnectionException $e){
      return $e->getData();
    }

    foreach ($payment->getLinks() as $link) {

      if ($link->getRel() == 'approval_url') {

        $redirect_url = $link->getHref();
        break;

      }

    }

    /** add payment ID to session **/
    Session::put('paypal_payment_id', $payment->getId());
    Session::put('order_id', $order_id);

    if (isset($redirect_url)) {

      /** redirect to paypal **/
      return Redirect::away($redirect_url);

    }

    \Session::put('error', 'Unknown error occurred');
    return Redirect::to('/');

  }

  public function getPaymentStatus()
  {
    /** Get the payment ID before session clear **/
    $payment_id = Session::get('paypal_payment_id');
    $order_id = Session::get('order_id');

    /** clear the session payment ID **/
    Session::forget('paypal_payment_id');
    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

      return redirect()->route('checkout')->with('error','Payment failed.');

    }

    $payment = Payment::get($payment_id, $this->_api_context);
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));

    /**Execute the payment **/
    $result = $payment->execute($execution, $this->_api_context);

    if ($result->getState() == 'approved') {
      $order = Order::find($order_id);
      $order->order_status = 2;
      $order->save();
      return redirect()->route('order-details',$order_id)->with('success','Payment Success.');
    }

    return redirect()->route('checkout')->with('error','Payment failed');
  }
}
