<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest',['except'=>['logout']]);
  }

  public function login(Request $request)
  {
    $this->validate($request,[
      'email' => 'required|string|email|max:255',
      'password' => 'required|string|min:6',
    ]);
    //Attempt to log the user in
    if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember) && Auth::user()->is_staff == 1) {
      return redirect()->intended(route('product-list-staff'));
    }else if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember) && Auth::user()->is_staff == 0){
      return redirect()->route('product-list-customer');
    }else{
      // return redirect()->back()->withInput($request->only('username','remember'))->with('login_fail','Username or Password is invalid');
      return redirect()->back()->withInput($request->only('email','remember'))->with('login_fail','Username or Password is invalid');
    }




  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    Session::forget('cart');
    return redirect()->route('login');

  }
}
