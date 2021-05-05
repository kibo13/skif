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
        'fabric_id',
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

    public function fabric()
    {
        return $this->belongsTo('App\Models\Fabric');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }

        return $this->price;
    }
}
