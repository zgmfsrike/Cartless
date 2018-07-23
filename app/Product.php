<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'product_id';
  public $timestamps = false;

  protected $fillable = [
    'product_id', 'product_name', 'product_price',
    'product_description','product_image'
  ];

  public function review()
  {
    return $this->hasMany('App\Review','product_id','product_id');

  }

  public function orderProduct()
  {
    return $this->hasMany('App\OrderProduct','product_id','product_id');

  }
  // public function order()
  // {
  //   // code...
  //   return  $this->belongsToMany('App\Order','order_products','order_id','product_id');
  // }


  public function productDiscount()
  {
    return $this->hasOne('App\ProductDiscount','product_id','product_id');

  }
}
