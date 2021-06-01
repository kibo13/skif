<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  use HasFactory;

  protected $fillable = [
    'tom',
    'name',
    'L',
    'B',
    'H',
    'note',
    'measure'
  ];

  public function colors()
  {
    return $this->belongsToMany('App\Models\Color');
  }
}
