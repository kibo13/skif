<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'date_in',
        'date_out',
        'customer_id',
        'product_id',
        'tree_id',
        'material_id',
        'fabric_id',
        'worker_id',
        'count',
        'sale',
        'price',
        'state'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function tree()
    {
        return $this->belongsTo('App\Models\Tree');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function fabric()
    {
        return $this->belongsTo('App\Models\Fabric');
    }

    public function worker()
    {
        return $this->belongsTo('App\Models\Worker');
    }
}
