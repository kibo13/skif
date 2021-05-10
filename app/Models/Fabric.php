<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'code'
    ];

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }
}
