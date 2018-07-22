<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Session;
class CouponController extends Controller
{
  public function validateCoupon(Request $request)
  {
    $coupon_code = $request->coupon_code;
    $coupon = Coupon::where('coupon_code',$coupon_code)->first();


    if($coupon){
      $coupon_discount = $coupon->coupon_discount;
      Session::push('coupon', [
        "coupon_discount"=>$coupon_discount
      ]);
      return redirect()->back()->with('validate_success','Success');
      // return redirect()->route('login');
    }
    else{
      return redirect()->back()->with('validate_fail','Fail');
    }
  }
}
