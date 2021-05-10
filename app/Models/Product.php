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

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }
}
