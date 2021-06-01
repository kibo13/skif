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
    'worker_id',
    'user_id',
    'note'
  ];

  public function worker()
  {
    return $this->belongsTo('App\Models\Worker');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function moms()
  {
    return $this->hasMany('App\Models\Mom');
  }

  public function getFullPrice()
  {
    $sum = 0;
    foreach ($this->moms as $mom) {
      $sum += $mom->getPriceForCount();
    }

    return $sum;
  }
}
