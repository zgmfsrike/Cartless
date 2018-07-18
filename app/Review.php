<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $table = 'reviews';
  protected $primaryKey = 'review_id';

  public function product()
  {
    return $this->belongsTo('App\Product')
  }

  public function user()
  {
    return $this->belongsTo('App\User')
  }
}
