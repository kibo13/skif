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

    public function types()
    {
        return $this->belongsToMany('App\Models\Type')->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0; 
        foreach($this->types as $type) {
            $sum += $type->getPriceForCount();
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
