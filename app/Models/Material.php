<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'tree_id',
        'price'
    ];

    public function tree()
    {
        return $this->belongsTo('App\Models\Tree');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color');
    }
}
