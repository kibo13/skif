<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  use HasFactory;

  protected $fillable = [
    'lastname',
    'firstname',
    'surname',
    'fio',
    'position_id',
    'slug',
    'address',
    'phone'
  ];

  public function position()
  {
    return $this->belongsTo('App\Models\Position');
  }

  public function user()
  {
    return $this->hasOne('App\Models\User');
  }

  public function orders()
  {
    return $this->hasMany('App\Models\Order');
  }
}
