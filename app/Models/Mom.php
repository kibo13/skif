<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mom extends Model
{
  use HasFactory;

  protected $fillable = [
    'movement_id',
    'material_id',
    'color_id',
    'price',
    'count',
    'measure'
  ];

  public function movement()
  {
    return $this->belongsTo('App\Models\Movement');
  }

  public function material()
  {
    return $this->belongsTo('App\Models\Material');
  }

  public function color()
  {
    return $this->belongsTo('App\Models\Color');
  }

  public function getPriceForCount()
  {
    return $this->count * $this->price;
  }
}
