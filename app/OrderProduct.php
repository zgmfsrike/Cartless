<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $table = 'order_products';

  public function product()
  {
    // code...
    return  $this->belongsTo('App\Product');

  }
  public function order()
  {
    // code.
    return  $this->belongsTo('App\Order');
  }
}
