<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
  use HasFactory;

  protected $fillable = [
    'product_id',
    'color_id',
    'image',
    'note'
  ];

  public function product()
  {
    return $this->belongsTo('App\Models\Product');
  }

  public function color()
  {
    return $this->belongsTo('App\Models\Color');
  }

  public function orders()
  {
    return $this->belongsToMany('App\Models\Order');
  }

  public function getPriceForCount()
  {
    if (!is_null($this->pivot)) {
      return $this->pivot->count * $this->product->price;
    }

    return $this->product->price;
  }
}
