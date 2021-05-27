<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'code',
    'name',
    'material_id',
    'L',
    'B',
    'H',
    'price',
    'description'
  ];

  public function category()
  {
    return $this->belongsTo('App\Models\Category');
  }

  public function material()
  {
    return $this->belongsTo('App\Models\Material');
  }

  public function tops()
  {
    return $this->hasMany('App\Models\Top');
  }
}
