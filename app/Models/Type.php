<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'plate_id',
        'fabric_id',
        'image',
        'note'
    ];

    public function plate()
    {
        return $this->belongsTo('App\Models\Plate');
    }

    public function fabric()
    {
        return $this->belongsTo('App\Models\Fabric');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->product->price;
        }

        return $this->product->price;
    }
}