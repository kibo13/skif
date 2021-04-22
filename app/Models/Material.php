<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'tree_id', 
        'color_id',
        'price'
    ];

    public function tree()
    {
        return $this->hasOne('App\Models\Tree');
    }

    public function color()
    {
        return $this->hasOne('App\Models\Color');
    }
}
