<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  use HasFactory;

  protected $fillable = [
    'type_id',
    'code',
    'firstname',
    'lastname',
    'surname',
    'fio',
    'name',
    'email',
    'address',
    'phone'
  ];

  public function orders()
  {
    return $this->hasMany('App\Models\Order');
  }
}
