<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'image',
        'description',
        'note'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
