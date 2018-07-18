<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
  protected $table = 'product_discounts';

  protected $fillable = [
    'product_id','product_discount'
  ];

  public function product()
  {
    return $this->belongsTo('App\Product','product_id');
  }




}
