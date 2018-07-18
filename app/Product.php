<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  protected $primaryKey = 'product_id';

  protected $fillable = [
    'product_id', 'product_name', 'product_price',
    'product_description','product_image'
  ];

  public function review()
  {
    return $this->hasMany('App\Review');

  }

  public function orderProduct()
  {
    return $this->hasMany('App\OrderProduct');

  }

  public function productDiscount()
  {
    return $this->hasOne('App\ProductDiscount','product_id','product_id');

  }
}
