<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'state'
        // 'code',
        // 'customer_id',
        // 'date_in',
        // 'date_out',
        // 'product_id',
        // 'material_id',
        // 'fabric_id',
        // 'worker_id',
        // 'count',
        // 'price',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('count', 'color_id')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0; 
        foreach($this->products as $product) {
            $sum += $product->getPriceForCount();
        }

        return $sum;
    }

    // public function customer()
    // {
    //     return $this->belongsTo('App\Models\Customer');
    // }

    // public function worker()
    // {
    //     return $this->belongsTo('App\Models\Worker');
    // }
}
