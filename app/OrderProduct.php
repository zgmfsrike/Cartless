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
    return  $this->belongsTo('App\Product');

  }
  public function order()
  {
    // code.
    return  $this->belongsTo('App\Order','order_id','order_id');
  }
}
