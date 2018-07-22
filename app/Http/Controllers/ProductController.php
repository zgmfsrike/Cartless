<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
    $product = Product::with(['productDiscount','review'])->where('product_id',$id)->get();
    return view('product.product-details',['product'=>$product,'product_id'=>$id]);
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

    $product = new Product;
    $product->product_name =$request->product_name;
    $product->product_price =$request->price;
    $product->product_description =$request->description;
    if($request->hasFile('product_image')){
      $file = $request->file('product_image');
      $extension = $request->file('product_image')->extension();
      $path = 'image/product';
      $image_name = $request->product_name."_".$time.".".$extension;
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
      $image_name = $request->product_name."_".$time.".".$extension;
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
