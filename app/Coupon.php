<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
  public $incrementing = false;
  protected $keyType = 'string';
  protected $table = 'coupons';
  protected $primaryKey = 'coupon_code';
  public $timestamps = false;


  public function order()
  {
    return $this->hasMany('App\Order')
  }
}
