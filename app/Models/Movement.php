<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'tot',
    'date_move',
    'order_id',
    'note'
  ];

  public function order()
  {
    return $this->belongsTo('App\Models\Order');
  }

  public function moms()
  {
    return $this->hasMany('App\Models\Mom');
  }
}
