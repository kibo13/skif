<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'info',
    'desc'
  ];

  public function users()
  {
    return $this->belongsToMany('App\Models\User');
  }
}
