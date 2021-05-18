<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'salary'];

  public function workers()
  {
    return $this->hasMany('App\Models\Worker');
  }
}
