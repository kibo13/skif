<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'L',
        'B',
        'H',
        'price',
        'image',
        'note',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // public function tree()
    // {
    //     return $this->belongsTo('App\Models\Tree');
    // }

    // public function material()
    // {
    //     return $this->belongsTo('App\Models\Material');
    // }

    // public function fabric()
    // {
    //     return $this->belongsTo('App\Models\Fabric');
    // }
}
