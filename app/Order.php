<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $primaryKey = 'order_id';

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function orderProduct()
  {
    // code...
    return  $this->hasMany('App\OrderProduct');
  }

  public function coupon()
  {
    return $this->belongsTo('App\Coupon');
  }
}
