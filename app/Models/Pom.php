<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pom extends Model
{
  use HasFactory;

  protected $fillable = [
    'purchase_id',
    'material_id',
    'color_id',
    'count'
  ];

  public function purchase()
  {
    return $this->belongsTo('App\Models\Purchase');
  }

  public function material()
  {
    return $this->belongsTo('App\Models\Material');
  }

  public function color()
  {
    return $this->belongsTo('App\Models\Color');
  }
}
