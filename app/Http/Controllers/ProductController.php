<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\ProductDiscount;
use Redirect;

class ProductController extends Controller
{

  //get list product for staff
  public function getListProductStaff()
  {
    $list_product = Product::paginate(25);
    return view('product.product-list-staff',['list_product'=>$list_product]);

  }

  public function getListProductCustomer()
  {
    $list_product = Product::paginate(9);
    return view('product.product-list-customer',['list_product'=>$list_product]);
  }

  //get product detail
  public function getProductDetail($id)
  {
    // $product = Product::with(['productDiscount','review'])->where('product_id',$id)->get();
    $product = Product::with(['productDiscount'])->where('product_id',$id)->get();
    $reviews = Review::with(['user'])->where('product_id',$id)->get();
    $rating = Review::where('product_id',$id)->avg('rating');
    $rating = round($rating, 1, PHP_ROUND_HALF_UP);
    return view('product.product-details',['product'=>$product,'product_id'=>$id,'reviews'=>$reviews,'rating'=>$rating]);
  }

  //set product discount
  public function postSetProductDiscount(Request $request)
  {
    $this->validate($request,  [
      'product_id'=>'required',
      'discount'=>'numeric|required',
    ]);

    if ( $request->discount >= 0 && $request->discount<=100 ){
      $delete_discount = ProductDiscount::where('product_id',$request->product_id)->delete();

      $product_discount = new ProductDiscount;
      $product_discount->product_id = $request->product_id;
      $product_discount->product_discount = $request->discount;
      $product_discount->save();
    }
    return Redirect::back();
  }

  //get edit product page
  public function getEditProduct($id)
  {
    $product = Product::where('product_id',$id)->get();
    return view('product.product-edit',['product'=>$product,'id'=>$id]);
  }


  //store product information
  public function postStoreProduct(Request $request)
  {
    $this->validate($request,  [
      'product_name'=>'string|min:4|max:30|required',
      'price'=>'numeric|min:1|required',
      'description'=>'string|min:4|max:500|required',
      'product_image'=>'image|nullable',
    ]);
    $time = time();
    $random_string = str_random(6);

    $product = new Product;
    $product->product_name =$request->product_name;
    $product->product_price =$request->price;
    $product->product_description =$request->description;
    if($request->hasFile('product_image')){


      $file = $request->file('product_image');
      $extension = $request->file('product_image')->extension();
      $path = 'image/product';
      $image_name = $random_string."_".$time.".".$extension;
      $file->move($path,$image_name);
      $product->product_image = $image_name;
    }
    $product->save();

    return redirect()->route('product-list-staff');
  }

  //update product information

  public function postUpdateProduct(Request $request ,$id)
  {
    $time = time();
    $random_string = str_random(6);

    $this->validate($request,  [
      'product_name'=>'string|min:4|max:30|required',
      'price'=>'numeric|min:1|required',
      'description'=>'string|min:4|max:500|required',
      'product_image'=>'image|nullable',
    ]);
    $product = Product::find($id);
    $product->product_name =$request->product_name;
    $product->product_price =$request->price;
    $product->product_description =$request->description;
    if($request->hasFile('product_image')){
      $file = $request->file('product_image');
      $extension = $request->file('product_image')->extension();
      $path = 'image/product';
      $image_name = $random_string."_".$time.".".$extension;
      $file->move($path,$image_name);
      $product->product_image = $image_name;

    }

    $product->save();

    return redirect()->route('product-list-staff');

    //delete product from database

  }
  public function postDeleteProduct($id)
  {
    $product = Product::find($id);
    $product->delete();

    return redirect()->route('product-list-staff');

  }

}
