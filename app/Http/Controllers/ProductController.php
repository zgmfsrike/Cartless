<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{

  //get list product
  public function getListProduct()
  {
    $list_product = Product::all();
    return view('product.product-list-staff',['list_product'=>$list_product]);

  }
  //get product detail

  public function getProductDetail($id)
  {
    $product = Product::with(['productDiscount'])->get();
    return view('',['product'=>$product]);
  }

  //get edit product page

  public function getEditProduct($id)
  {
    $product = Product::find($id);
    return view('',['product'=>$product]);
  }


  //store product information
  public function postStoreProduct(Request $request)
  {
    $this->validate($request,  [
      'product_name'=>'string|min:4|max:30|required',
      'product_price'=>'numeric|min:1|required',
      'product_description'=>'string|min:4|max:500|required',
      'product_image'=>'string|nullable',
    ]);

    $product = new Product;
    $product->product_name =$request->product_name;
    $product->product_price =$request->product_price;
    $product->product_description =$request->product_description;
    $product->product_image = $request->product_image;
    $product->save();

    return view();
  }

  //update product information

  public function postUpdateProduct($id)
  {

    $this->validate($request,  [
      'product_name'=>'string|min:4|max:30|required',
      'product_price'=>'numeric|min:1|required',
      'product_description'=>'string|min:4|max:500|required',
      'product_image'=>'string|nullable',
    ]);
    $product = Product::find($id);
    $product->product_name =$request->product_name;
    $product->product_price =$request->product_price;
    $product->product_description =$request->product_description;
    $product->product_image = $request->product_image;
    $product->save();

    return view();

  //delete product from database

  }
  public function postDeleteProduct($id)
  {
    $product = Product::find($id);
    $product->delete();

    return view();

  }

}
