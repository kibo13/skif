<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'date_p',
    'user_id',
    'supplier_id',
    'pay',
    'depo',
    'debt',
    'total',
    'date_off',
    'state',
    'note'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function supplier()
  {
    return $this->belongsTo('App\Models\Supplier');
  }

  public function poms()
  {
    return $this->hasMany('App\Models\Pom');
  }
}
