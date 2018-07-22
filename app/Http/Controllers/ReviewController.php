<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Auth;
class ReviewController extends Controller
{
  //user can review product
  public function postAddReview(Request $request,$product_id)
  {
    $user_id = Auth::user()->user_id;
    $this->validate($request,  [
      'review_context'=>'string|min:4|max:500|required',
    ]);
    $review = new Review;
    $review->product_id = $product_id;
    $review->user_id = $user_id;
    $review->review_context = $request->review_context;
    $review->rating = $request->rating;
    $review->save();

    return redirect()->back();
  }

}
