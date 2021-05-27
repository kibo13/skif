<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'date_on',
    'date_off',
    'pay',
    'state',
    'customer_id',
    'worker_id',
    'total',
    'depo',
    'debt',
    'note'
  ];

  public function tops()
  {
    return $this->belongsToMany('App\Models\Top')->withPivot('count')->withTimestamps();
  }

  public function getFullPrice()
  {
    $sum = 0;
    foreach ($this->tops as $top) {
      $sum += $top->getPriceForCount();
    }

    return $sum;
  }

  public function customer()
  {
    return $this->belongsTo('App\Models\Customer');
  }

  public function worker()
  {
    return $this->belongsTo('App\Models\Worker');
  }
}
