<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'name',
    'firstname',
    'lastname',
    'surname',
    'fio',
    'country',
    'city',
    'index',
    'address',
    'phone',
    'email'
  ];

  // public function orders()
  // {
  //   return $this->hasMany('App\Models\Order');
  // }
}
