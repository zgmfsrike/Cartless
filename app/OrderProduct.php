<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $table = 'order_products';
  public $timestamps = false;

  public function product()
  {
    // code...
    return  $this->belongsToMany('App\Product','product_id','product_id');

  }
  public function order()
  {
    // code.
    return  $this->belongsToMany('App\Order','order_id','order_id');
  }
}
